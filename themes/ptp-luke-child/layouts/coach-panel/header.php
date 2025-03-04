<?php
$current_user = wp_get_current_user();
$user_id = $current_user->ID;

if (!in_array('coach', $current_user->roles)) {
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
  $profile_img_link = get_stylesheet_directory_uri()."/assets/images/profile_img.png";
}

$role = "Coach";

$my_sport_id = get_user_meta($user_id, '_sport', true);
if($my_sport_id){
  $my_sport = get_sport_name($my_sport_id);
}else{
  $my_sport = "";
}

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
                            <li class="nav-item <?php if($page=="dashboard" OR $page==""){echo "active";} ?>">
                                <a class="nav-link" href="?section=dashboard">Dashboard<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item <?php if($page=="students"){echo "active";} ?>">
                                <a class="nav-link" href="?section=students">Booking</a>
                            </li>
                            <li class="nav-item <?php if($page=="calender"){echo "active";} ?>">
                                <a class="nav-link" target="_blank" href="<?php echo site_url("/coach-profile/".$current_user->user_nicename); ?>">Open Profile Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url(); ?>" target="_blank">Visit Site</a>
                            </li>
                        </ul>

                        <div class="navbar-action">
                            <ul>
                                <li class="dropdown d-none">
                                    <span>
                                        <a class="dropdown-toggle" href="" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/dashboard/bell.svg" alt=""></a>
                                        <div class="dropdown-menu notification_dropdown"
                                            aria-labelledby="dropdownMenuButton">
                                            <a href="javascript:;">
                                                <div class="msg-header">
                                                    <p class="msg-header-title">Notifications</p>
                                                    <p class="msg-header-badge">8 New</p>
                                                </div>
                                            </a>
                                            <div class="header-notifications-list ps">
                                                <a class="dropdown-item" href="javascript:;">
                                                    <div class="d-flex align-items-center">
                                                        <div class="user-online">
                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-1.png"
                                                                class="msg-avatar" alt="user avatar">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="msg-name">Daisy Anderson<span
                                                                    class="msg-time float-end">5 sec
                                                                    ago</span></h6>
                                                            <p class="msg-info">The standard chunk of lorem</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <div class="d-flex align-items-center">
                                                        <div class="notify bg-light-danger text-danger">dc
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="msg-name">New Orders <span
                                                                    class="msg-time float-end">2 min
                                                                    ago</span></h6>
                                                            <p class="msg-info">You have recived new orders</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <div class="d-flex align-items-center">
                                                        <div class="user-online">
                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-2.png"
                                                                class="msg-avatar" alt="user avatar">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="msg-name">Althea Cabardo <span
                                                                    class="msg-time float-end">14
                                                                    sec ago</span></h6>
                                                            <p class="msg-info">Many desktop publishing packages</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <div class="d-flex align-items-center">
                                                        <div class="notify bg-light-success text-success">
                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-4.png" width="25"
                                                                alt="user avatar">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="msg-name">Account Created<span
                                                                    class="msg-time float-end">28 min
                                                                    ago</span></h6>
                                                            <p class="msg-info">Successfully created new email</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <div class="d-flex align-items-center">
                                                        <div class="notify bg-light-info text-info">Ss
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="msg-name">New Product Approved <span
                                                                    class="msg-time float-end">2 hrs ago</span></h6>
                                                            <p class="msg-info">Your new product has approved</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <div class="d-flex align-items-center">
                                                        <div class="user-online">
                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-1.png"
                                                                class="msg-avatar" alt="user avatar">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="msg-name">Katherine Pechon <span
                                                                    class="msg-time float-end">15
                                                                    min ago</span></h6>
                                                            <p class="msg-info">Making this the first true generator</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <div class="d-flex align-items-center">
                                                        <div class="notify bg-light-success text-success"><i
                                                                class="bx bx-check-square"></i>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="msg-name">Your item is shipped <span
                                                                    class="msg-time float-end">5 hrs
                                                                    ago</span></h6>
                                                            <p class="msg-info">Successfully shipped your item</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <div class="d-flex align-items-center">
                                                        <div class="notify bg-light-primary">
                                                            <img src="assets/images/app/github.png" width="25"
                                                                alt="user avatar">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="msg-name">New 24 authors<span
                                                                    class="msg-time float-end">1 day
                                                                    ago</span></h6>
                                                            <p class="msg-info">24 new authors joined last week</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <div class="d-flex align-items-center">
                                                        <div class="user-online">
                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-2.png"
                                                                class="msg-avatar" alt="user avatar">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="msg-name">Peter Costanzo <span
                                                                    class="msg-time float-end">6 hrs
                                                                    ago</span></h6>
                                                            <p class="msg-info">It was popularised in the 1960s</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                    <div class="ps__thumb-x" tabindex="0"
                                                        style="left: 0px; width: 0px;"></div>
                                                </div>
                                                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                    <div class="ps__thumb-y" tabindex="0"
                                                        style="top: 0px; height: 0px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                </li>
                                <li><a href="<?php echo site_url('my-account-coach/?section=profile'); ?>">My Account</a></li>
                                <li><a href="javascript:void(0);" onclick="logout_user()">Sign Out <div class="spinner-border text-dark spinner-logout" style="display:none;"></div></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>