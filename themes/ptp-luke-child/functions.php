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


function custom_page_templates($template) {
    if (is_page('home')) {
        $template = locate_template('pages/page-home.php');
    } elseif (is_page('contact')) {
        $template = locate_template('pages/page-contact.php');
    } elseif (is_page('about')) {
        $template = locate_template('pages/page-about.php');
    }
    return $template;
}
//add_filter('page_template', 'custom_page_templates');

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