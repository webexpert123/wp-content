<?php
$current_user = wp_get_current_user();
$user_id = $current_user->ID;

if (!in_array('athlete', $current_user->roles)) {
    wp_redirect(site_url()."/user-login");
}

$name = (null !== get_user_meta($user_id, "fullname", true)) ? get_user_meta($user_id, "fullname", true) : "";
if(get_user_meta($user_id, "_profile_pic_id", true)){
    $attachment_id = get_user_meta($user_id, "_profile_pic_id", true);
    if( $attachment_id ) {
       $profile_img_link = wp_get_attachment_image_url($attachment_id, 'thumbnail');
    }else{
       $profile_img_link = get_stylesheet_directory_uri()."/assets/images/profile_img.png";
    }
}else{
  $profile_img_link = get_stylesheet_directory_uri()."/assets/images/profile_img.jpg";
}

$role = "Athlete";

$page = isset($_REQUEST["section"]) ? $_REQUEST["section"] : "dashboard";
?>
<div class="dashbaord-header d-flex justify-content-end">
                <nav class="navbar navbar-expand-sm navbar-light justify-content-end bg-faded">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                        <ul class="navbar-nav mr-auto nav-pills">
                            <!-- <li class="nav-item <?php if($page=="dashboard" OR $page==""){echo "active";} ?>">
                                <a class="nav-link" href="?section=dashboard">Dashboard<span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item <?php if($page=="bookings"){echo "active";} ?>">
                                <a class="nav-link" href="?section=bookings">Booking</a>
                            </li>
                            <li class="nav-item <?php if($page=="calender"){echo "active";} ?>">
                                <a class="nav-link" href="?section=calender">Calendar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url(); ?>" target="_blank">Visit Site</a>
                            </li> -->
                        </ul>

                        <div class="navbar-action">
                            <ul>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="javascript:void(0);" onclick="logout_user()">Sign Out <div class="spinner-border text-dark spinner-logout" style="display:none;"></div></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>