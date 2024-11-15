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
        $new_template = locate_template(array('single.php')); // Replace with your custom template
        if (!empty($new_template)) {
            return $new_template; // Return the custom template if found
        }
    }
    return $template; // Return the default template if conditions aren't met
}
add_filter('template_include', 'my_custom_single_template');
