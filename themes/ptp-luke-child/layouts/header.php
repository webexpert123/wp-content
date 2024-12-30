<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PTP-Players Teaching Players</title>
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/main.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- animation library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- owl carousel library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
</head>
<body class="home">
    <!-- Header start -->
    <header>
        <!-- <div class="top-header text-center">
            <div class="container">
                <p>Sign up today and save 50% on your first 2 months! Offer ends Dec 31, 2024. <a href="register.html"><b>Get Started.</b></a></p>
            </div>
            <div class="cancel-btn"><i class="fa-solid fa-xmark"></i></div>
        </div> -->
        <section class="header-main navbar js-sticky-header w-100">
            <div class="container-fluid">
                <div class="header-blocks">
                    <div class="brand">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo_yellow.png" alt="brand image" />
                    </div>
                    <div class="menu-block">
                        <ul>
                            <!-- <li id="hamburIcon"><span title="Hide main menu"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                                </span></li> -->
                            <li><a href="javascript:void(0);">About Us</a></li>
                            <li><a href="javascript:void(0);">Parents & Athlete</a></li>
                            <li><a href="javascript:void(0);">Apply to Coach</a></li>
                            <li><a href="javascript:void(0);">Summer Camp</a></li>
                            <li><a href="javascript:void(0);">Our Blog</a></li>
                            <li><a href="javascript:void(0);">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="action-block">
                        <div class="auth-action">
                            <?php if (!is_user_logged_in()) { ?>
                                <button type="button" class="btn outliner btn-round" onclick="window.location.href='<?php echo site_url(); ?>/user-login'">Log In</button>
                                <button type="button" class="btn btn-round btn-fill" onclick="window.location.href='<?php echo site_url(); ?>/register'">Sign Up</button>
                                <?php }else{
                                $current_user = wp_get_current_user();
                                $user_id = $current_user->ID;
                                $user = get_userdata($user_id);
                                $roles = $user->roles;
                                $primary_role = $roles[0]; 
                                if($primary_role=="coach"){
                                  $redirectURL = site_url()."/my-account-coach"; 
                                }
                                elseif($primary_role=="athlete"){
                                  $redirectURL = site_url()."/my-account-athlete"; 
                                }
                                else{
                                  $redirectURL = site_url()."/wp-admin";
                                }
                                ?>
                                <button type="button" class="btn btn-round btn-fill" onclick="window.location.href='<?php echo $redirectURL; ?>'">My Account</button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <!-- Header End -->
    <main>