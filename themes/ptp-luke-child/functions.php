<?php
function my_theme_enqueue_styles() {
    $parent_style = 'parent-style'; // This is 'twentytwentyone-style' for the Twenty Twenty-One theme.

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style)
    );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

// Add Author column to custom post type
function add_author_column_to_custom_post_type($columns) {
    $columns['author'] = __('Created By');
    return $columns;
}
add_filter('manage_summer-camps_posts_columns', 'add_author_column_to_custom_post_type');

// Display Author in the column
function display_author_in_custom_post_type_column($column, $post_id) {
    if ($column == 'author') {
        $author = get_the_author_meta('display_name', get_post_field('post_author', $post_id));
        echo $author;
    }
}
add_action('manage_summer-camps_posts_custom_column', 'display_author_in_custom_post_type_column', 10, 2);


function add_custom_roles() {
    // Add Coach Role
    add_role('coach', 'Coach', array(
        'read' => true, // Allow reading content
        'edit_posts' => true, // Allow editing posts
        'delete_posts' => false, // Disable deleting posts
        'publish_posts' => true, // Allow publishing posts
    ));

    // Add Athlete Role
    add_role('athlete', 'Athlete', array(
        'read' => true, // Allow reading content
        'edit_posts' => false, // Disable editing posts
        'delete_posts' => false, // Disable deleting posts
        'publish_posts' => false, // Disable publishing posts
    ));
}
add_action('init', 'add_custom_roles');

function add_sport_menu() {
    add_menu_page(
        'Sports', // Page title
        'Sports', // Menu title
        'manage_options', // Capability required to view this menu
        'sports', // Menu slug
        'sports_menu_page', // Callback function to display the content of the page
        'dashicons-heart', // Icon (optional, use any Dashicon)
        6 // Position (optional)
    );
}
add_action( 'admin_menu', 'add_sport_menu' );

function sports_menu_page() {
  include( get_stylesheet_directory() . '/admin_modules/manage_sports.php');
}



function check_user_email(){
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    if ( email_exists( $email ) ) {
      echo json_encode(array('status' => 1));
    } else {
      echo json_encode(array('status' => 0));
    }
    exit;
}
add_action( 'wp_ajax_nopriv_check_user_email', 'check_user_email' );
add_action( 'wp_ajax_check_user_email', 'check_user_email' );


function get_referral_code_count($referralCode){
    global $wpdb;
    $referralCode = isset($referralCode) ? sanitize_text_field($referralCode) : '';

    $query = $wpdb->prepare(
        "SELECT COUNT(*) FROM {$wpdb->prefix}usermeta WHERE meta_key = %s AND meta_value = %s",
        '_my_referralCode',
        $referralCode       
    );
    $count = $wpdb->get_var($query);
    return $count;
}

function check_user_referralCode() {
    $count = get_referral_code_count($_POST['referralCode']);
    echo json_encode(array('count' => $count));
    exit; 
}
add_action( 'wp_ajax_nopriv_check_user_referralCode', 'check_user_referralCode' );
add_action( 'wp_ajax_check_user_referralCode', 'check_user_referralCode' );


function new_user_email_send($fullname, $role, $email, $phone, $refcode){
    $message = "<p>Hi ".$fullname.",</p>";
    $message .= "<p>Thank you for registering with <b>PTP-Luke</b></p>";
    $message .= "<p>We are excited to welcome you to our community of ".$role.". Your registration was successful, and you now have access to all the features and benefits of being part of our network.<br><br> Your Account Details:</p>";
    $message .= "<b>Full Name: </b>".$fullname." <br><b>Email Address: </b>".$email." <br><b>Phone: </b>".$phone." <br><b>Role: </b>".$role." <br><b>Referral Code: </b>".$refcode;
    $message .= "<p>Best regards, <br> The PTP-Luke Team <br>".site_url()."</p>";
    $headers = array('Content-Type: text/html; charset=UTF-8');
    wp_mail($email, "Welcome to ".ucwords($role)."Hub – Your Registration is Complete!", $message, $headers);
}


function register_user_ajax(){
    if (!isset($_POST['full_name'], $_POST['email'], $_POST['password'], $_POST['phone'])) {
        wp_send_json_error(['alert_type' => 'error', 'message' => 'Missing form data.']);
    }
    $fullname = sanitize_text_field($_POST['full_name']);
    $email = sanitize_email($_POST['email']);
    $password = sanitize_text_field($_POST['password']);
    $phone = sanitize_text_field($_POST['phone']);
    $zipcode = sanitize_text_field($_POST['zipcode']);
    $sport = sanitize_text_field($_POST['sport']);
    $experience = sanitize_text_field($_POST['experience']);
    $refrence_referralCode = sanitize_text_field($_POST['referralCode']);
    $user_role = sanitize_text_field($_POST['user_role']);

    if (email_exists($email)) {
        wp_send_json_error(['alert_type' => 'error', 'message' => 'Email is already registered.']);
    }

    // Create the user
    $user_id = wp_create_user($email, $password, $email);  

    if (is_wp_error($user_id)) {
        wp_send_json_error(['alert_type' => 'error', 'message' => 'Error creating user: ' . $user_id->get_error_message()]);
    }

    $user = new WP_User($user_id);
    $user->set_role($user_role);

    $random_string = strtoupper(bin2hex(random_bytes(5)));
    $referral_code = 'REF_' . $user_id .'_'. $random_string;

    update_user_meta($user_id, '_my_referralCode', $referral_code);
    update_user_meta($user_id, 'first_name', $fullname);
    update_user_meta($user_id, 'fullname', $fullname);
    update_user_meta($user_id, 'phone', $phone);
    update_user_meta($user_id, '_zipcode', $zipcode);
    update_user_meta($user_id, '_sport', $sport);
    update_user_meta($user_id, '_experience', $experience);

    $count = get_referral_code_count($refrence_referralCode);
    if($count != 0){
      update_user_meta($user_id, '_reference_referralCode', $refrence_referralCode);
    }

    new_user_email_send($fullname, $user_role, $email, $phone, $referral_code);
    wp_send_json_success(['alert_type' => 'success', 'message' => 'You are successfully registered as '.$user_role.'.']);
    exit;
}
add_action( 'wp_ajax_nopriv_register_user_ajax', 'register_user_ajax' );
add_action( 'wp_ajax_register_user_ajax', 'register_user_ajax' );


function forgot_password_submit_user(){
    $email = sanitize_email($_POST['email']);
    if ($email === "") {
        wp_send_json_error(['alert_type' => 'error', 'message' => 'Please enter a valid email address !']);
    }
    elseif (!email_exists($email)) {
        wp_send_json_error(['alert_type' => 'error', 'message' => 'This email is not registered with us !']);
    }
    else{    
       $user = get_user_by('email', $email);
       $user_id = $user->ID;
       $link = site_url()."/reset-password?uid=".md5($user_id);
       $fullname = get_user_meta($user_id, "fullname", true);
       $message = "<p>Hi ".$fullname.",</p>";
       $message .= "<p>We received a request to reset your password on ".site_url().". If you did not request this, please ignore this email, and your password will remain unchanged.</p>
       <p>To reset your password, please click the link below: <br> ".$link."</p>
       <p>If you need further assistance, or if you didn't request a password reset, feel free to contact us at support@ptpluke.com.</p>
       <p>Thanks,<br> The PTP-Luke Team<br>".site_url()."</p>";
       $headers = array('Content-Type: text/html; charset=UTF-8');
       wp_mail($email, "Reset Your Password on PTP-Luke", $message, $headers);
       wp_send_json_error(['alert_type' => 'success', 'message' => 'A password reset link has been sent to your email address.']);
    }
}
add_action( 'wp_ajax_nopriv_forgot_password_submit_user', 'forgot_password_submit_user' );
add_action( 'wp_ajax_forgot_password_submit_user', 'forgot_submit_password_user' );


function reset_password_submit_user(){
    $password = sanitize_text_field($_POST['password']);
    $confirm_password = sanitize_text_field($_POST['confirm_password']);
    $user_id = sanitize_text_field($_POST['userid']);
    if ($password === "" OR $confirm_password === "") {
       wp_send_json_error(['alert_type' => 'error', 'message' => 'Please fill required fields !']);
    }
    else{
        wp_set_password($password, $user_id);
        $user = get_userdata($user_id);
        $email = $user->user_email;
        $fullname = get_user_meta($user_id, "fullname", true);
        $subject = 'Your Password Has Been Successfully Changed - PTP-Luke';
        $message = 'Hello '.$fullname . ",\n\n" .
        'This is to inform you that your password has been successfully changed.' . "\n\n" .
        'Thank you for being part of our community!' . "\n\n" .
        'Best regards,' . "\n" .
        'The PTP-Luke Team'. "\n" .site_url();
        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail($email, $subject, $message, $headers);
        wp_send_json_error(['alert_type' => 'success', 'message' => 'Your Password Has Been Successfully Changed !']);
    }
}
add_action( 'wp_ajax_nopriv_reset_password_submit_user', 'reset_password_submit_user' );
add_action( 'wp_ajax_reset_password_submit_user', 'reset_password_submit_user' );


function login_submit_user(){
    if (!isset($_POST['user_login_nonce']) || !wp_verify_nonce($_POST['user_login_nonce'], 'user_login')) {
       wp_send_json_error(['alert_type' => 'error', 'message' => 'Permission denied !']);
    }

    $user_email = sanitize_email($_POST['email']);
    $user_password = $_POST['pass'];
    $user = wp_authenticate($user_email, $user_password);

    if (is_wp_error($user)) {
       wp_send_json_error(['alert_type' => 'error', 'message' => 'Login failed. Please check your credentials.']);
    } else {
       wp_set_auth_cookie($user->ID);
       $user = get_userdata($user->ID);
       $roles = $user->roles;
       $primary_role = $roles[0]; 
       if($primary_role=="coach"){
         $redirectURL = site_url()."/my-account-coach"; 
       }
       elseif($primary_role=="athlete"){
         $redirectURL = site_url()."/my-account-athlete"; 
       }
       else{
        $redirectURL = home_url();
       }
       wp_send_json_error(['alert_type' => 'success', 'message' => 'Redirecting to your dashbord..', 'redirectURL' => $redirectURL]);
    }
    exit;  
}
add_action( 'wp_ajax_nopriv_login_submit_user', 'login_submit_user' );
add_action( 'wp_ajax_login_submit_user', 'login_submit_user' );

function handle_logout_user() {
    if (is_user_logged_in()) {
        wp_logout();
        wp_send_json_success(array('ajax_status' => 'success', 'redirect_url' => site_url()."/user-login"));
    } else {
        wp_send_json_error(array('ajax_status' => 'error', 'message' => 'You are not logged in.'));
    }
}
add_action('wp_ajax_logout_user', 'handle_logout_user');
add_action('wp_ajax_nopriv_logout_user', 'handle_logout_user'); 

function redirect_logged_in_users_from_templates($template) {
    if (is_user_logged_in()) {
        if (strpos($template, 'page-login.php') !== false ||
            strpos($template, 'page-register.php') !== false ||
            strpos($template, 'page-forgot.php') !== false ||
            strpos($template, 'page-reset.php') !== false) {
              $user = wp_get_current_user();
              $roles = $user->roles; 
              if (in_array('coach', $roles)) {
                 wp_redirect(site_url()."/my-account-coach");
              }
              elseif (in_array('athlete', $roles)) {
                 wp_redirect(site_url()."/my-account-athlete");
              }
              else {
                 wp_redirect(home_url());
              }
              exit(); 
        }
    }
    else if (!is_user_logged_in()) {
        if (strpos($template, 'page-coach-dashbord.php') !== false){
            wp_redirect(site_url()."/user-login");
        }
    }
    return $template;
}
add_filter('template_include', 'redirect_logged_in_users_from_templates');

function my_custom_single_template($template) {
    // Check if we are viewing a single post
    if (is_single()) {
        $new_template = locate_template(array('single.php')); 
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('template_include', 'my_custom_single_template');


//When adding summercamp from backend create also a product with it
function create_woocommerce_product_for_summer_camp( $post_id, $post, $update ) {
    if ( 'summer-camps' !== $post->post_type ) {
        return;
    }

    $summer_camp_title = get_the_title( $post_id );
    $summer_camp_description = get_post_field( 'post_content', $post_id );
    $summer_camp_price = get_post_meta( $post_id, '_event_price', true );

    if ( empty( $summer_camp_price ) ) {
        return; 
    }

    $existing_product = get_posts( array(
        'post_type'   => 'product',
        'title'       => "Summer-Camp: " . $summer_camp_title,
        'posts_per_page' => 1
    ) );

    if ( ! empty( $existing_product ) ) {
        $product_id = $existing_product[0]->ID;
        wp_update_post( array(
            'ID'           => $product_id,
            'post_title'   => "Summer-Camp: ".$summer_camp_title, 
            'post_content' => $summer_camp_description,
        ));
    } else {
        $product_data = array(
            'post_title'   => "Summer-Camp: ".$summer_camp_title,
            'post_content' => $summer_camp_description,
            'post_status'  => 'publish',
            'post_type'    => 'product',
        );
        $product_id = wp_insert_post( $product_data );
    }

    if ( is_wp_error( $product_id ) ) {
        return; 
    }
    update_post_meta( $product_id, '_regular_price', $summer_camp_price );
    update_post_meta( $product_id, '_price', $summer_camp_price );

    $category_id = 21; 
    if ( term_exists( $category_id, 'product_cat' ) ) {
        wp_set_object_terms( $product_id, $category_id, 'product_cat' );
    }
    update_post_meta( $post_id, '_product_id', $product_id );
}
add_action( 'save_post', 'create_woocommerce_product_for_summer_camp', 10, 3 );

//add summercamp by user programatically
function submit_summercamp_event(){
    $current_user_id = get_current_user_id(); 

    $post_data = array(
        'post_title'   => $_POST['event_title'],
        'post_content' => $_POST['event_description'],
        'post_author'  => $current_user_id, 
        'post_status'  => 'publish', 
        'post_type'    => 'summer-camps'
    );
    $post_id = wp_insert_post( $post_data );

    $file_input_name = 'event_image';
    $thumbnail_id = custom_upload_and_get_thumbnail_id($file_input_name);

    if (!is_wp_error($thumbnail_id)) {
        update_post_meta( $post_id, '_thumbnail_id', $thumbnail_id);
    }


    update_post_meta( $post_id, '_event_from_date', date("Y-m-d h:i:s", strtotime($_POST['event_date_from']) ));
    update_post_meta( $post_id, '_event_to_date', date("Y-m-d h:i:s", strtotime($_POST['event_date_to']) ));
    update_post_meta( $post_id, '_event_location', $_POST['event_location'] );
    update_post_meta( $post_id, '_event_price', $_POST['event_price'] );

    //Add product for event
    $existing_product = get_posts( array(
        'post_type'   => 'product',
        'title'       => "Summer-Camp: " . $_POST['event_title'],
        'posts_per_page' => 1
    ) );


    if (empty( $existing_product ) ) {
        $product_data = array(
            'post_title'   => "Summer-Camp: ".$_POST['event_title'],
            'post_content' => $_POST['event_description'],
            'post_status'  => 'publish',
            'post_type'    => 'product',
        );
        $product_id = wp_insert_post( $product_data );

        if ( is_wp_error( $product_id ) ) {
            return; 
        }
        update_post_meta( $product_id, '_regular_price', $_POST['event_price'] );
        update_post_meta( $product_id, '_price', $_POST['event_price'] );

        $category_id = 21; 
        if ( term_exists( $category_id, 'product_cat' ) ) {
            wp_set_object_terms( $product_id, $category_id, 'product_cat' );
        }
        update_post_meta( $post_id, '_product_id', $product_id );
    }
    wp_send_json_success(['alert_type' => 'success', 'message' => 'Successfully Added !']);
}
add_action('wp_ajax_submit_summercamp_event', 'submit_summercamp_event');
add_action('wp_ajax_nopriv_submit_summercamp_event', 'submit_summercamp_event'); 


//UPDATE summercamp by user programatically
function update_summercamp_event(){
   if (empty($_POST["postid"]) || !is_numeric($_POST["postid"])) {
      wp_send_json_error(['alert_type' => 'error', 'message' => 'Invalid Post ID !']);
   }

    $post = get_post($_POST["postid"]);
    if (!$post) {
      wp_send_json_error(['alert_type' => 'error', 'message' => 'Post not found.']);
    }

    $post_data = array(
       'ID'           => $_POST["postid"],       
       'post_title'   => $_POST["event_title"],       
       'post_content' => $_POST["event_description"],     
       'post_status'  => $_POST["event_status"]
    );
    $updated_post_id = wp_update_post($post_data);

    $file_input_name = 'event_image';
    $thumbnail_id = custom_upload_and_get_thumbnail_id($file_input_name);

    if (!is_wp_error($thumbnail_id)) {
        update_post_meta( $updated_post_id, '_thumbnail_id', $thumbnail_id);
    }

    update_post_meta( $updated_post_id, '_event_from_date', date("Y-m-d h:i:s", strtotime($_POST['event_date_from']) ));
    update_post_meta( $updated_post_id, '_event_to_date', date("Y-m-d h:i:s", strtotime($_POST['event_date_to']) ));
    update_post_meta( $updated_post_id, '_event_location', $_POST['event_location'] );
    update_post_meta( $updated_post_id, '_event_price', $_POST['event_price'] );

    //update linked product price-
    update_post_meta( $_POST['productid'], '_regular_price', $_POST['event_price'] );
    update_post_meta( $_POST['productid'], '_price', $_POST['event_price'] );

    wp_send_json_success(['alert_type' => 'success', 'message' => 'Updated Successfully']);
}
add_action('wp_ajax_update_summercamp_event', 'update_summercamp_event');
add_action('wp_ajax_nopriv_update_summercamp_event', 'update_summercamp_event'); 

function custom_upload_and_get_thumbnail_id($file_input_name) {
    if (isset($_FILES[$file_input_name])) {
        $file = $_FILES[$file_input_name];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            return new WP_Error('upload_error', 'There was an error uploading the file.');
        }

        require_once(ABSPATH . 'wp-admin/includes/media.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');

        $upload = wp_handle_upload($file, array('test_form' => false));

        if (isset($upload['error'])) {
            return new WP_Error('upload_failed', 'File upload failed: ' . $upload['error']);
        }

        $file_path = $upload['file'];

        $attachment = array(
            'post_mime_type' => $upload['type'],
            'post_title'     => sanitize_file_name($file['name']),
            'post_content'   => '',
            'post_status'    => 'inherit',
        );

        $attachment_id = wp_insert_attachment($attachment, $file_path);

        if (is_wp_error($attachment_id)) {
            return $attachment_id;
        }

        $attachment_data = wp_generate_attachment_metadata($attachment_id, $file_path);
        wp_update_attachment_metadata($attachment_id, $attachment_data);

        $thumbnail_id = get_post_thumbnail_id($attachment_id);
        return $thumbnail_id ? $thumbnail_id : $attachment_id;
    }

    return new WP_Error('no_file', 'No file was uploaded.');
}


function add_custom_meta_box() {
    // Only show the meta box for the 'summer-camps' post type
    add_meta_box(
        'custom_html_after_title', // Unique ID for the meta box
        'Linked Product', // Meta box title
        'display_custom_html_after_title', // Callback function to display the content
        'summer-camps', // Post type slug
        'normal', // Where to display: normal (default), side, advanced
        'high' // Priority: high (default), low, default
    );
}
add_action('add_meta_boxes', 'add_custom_meta_box');

function display_custom_html_after_title($post) {
    // You can add any custom HTML here
    $productID = get_post_meta( $post->ID, '_product_id', true );
    echo '<div class="custom-html-content">';
    echo '<a href="' . admin_url('post.php?post=' . $productID . '&action=edit') . '" target="_blank">View Product</a>';
    echo '</div>';
}

function delete_summercamp_func(){
   if (empty($_POST["postid"]) || !is_numeric($_POST["postid"])) {
      wp_send_json_error(['alert_type' => 'error', 'message' => 'Invalid Post ID !']);
   }

    $post = get_post($_POST["postid"]);
    if (!$post) {
      wp_send_json_error(['alert_type' => 'error', 'message' => 'Post not found.']);
    }

    if ($post->post_type !== 'summer-camps') {
      wp_send_json_error(['alert_type' => 'error', 'message' => 'Invalid post type.']);
    }
    
    $deleted = wp_delete_post($_POST["postid"], true);

    if ($deleted) {
      wp_send_json_success(['alert_type' => 'success', 'message' => 'Deleted Successfully']);
    } else {
      wp_send_json_error(['alert_type' => 'error', 'message' => 'Error in deleting !']);
    }
}
add_action('wp_ajax_delete_summercamp', 'delete_summercamp_func');
add_action('wp_ajax_nopriv_delete_summercamp', 'delete_summercamp_func'); 





