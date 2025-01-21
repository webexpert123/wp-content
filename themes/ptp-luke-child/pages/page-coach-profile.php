<?php
/* Template Name: Coach Profile Front */

require locate_template('layouts/header.php') ;

?>
<div id="frontend-main">
    <?php
    global $wpdb;
    $coach_slug = get_query_var('coach_slug');

    if ($coach_slug) {
        $user = get_user_by('slug', $coach_slug);
        if ($user) {
            $coach_name = $user->display_name;
            $coach_sport_id = get_user_meta($user->ID, '_sport', true);  
            $session_price = get_user_meta($user->ID, '_session_price', true);  
            $description = get_user_meta($user->ID, '_about_myself', true);  
            $full_address = get_user_meta($user->ID, '_full_address', true);
            $levels_tags = get_user_meta($user->ID, '_levels_tags', true);
            $teaches_tags = get_user_meta($user->ID, '_teaches_tags', true);
            $facebook = get_user_meta($user->ID, '_facebook', true);
            $instagram = get_user_meta($user->ID, '_instagram', true);
            $tiktok = get_user_meta($user->ID, '_tiktok', true);
            $profile_pic_id = get_user_meta($user->ID, '_profile_pic_id', true);
            $coach_sport = $wpdb->get_var("SELECT sport_name FROM {$wpdb->prefix}sports WHERE sportID = '$coach_sport_id'");

            if(isset($_POST['add_review'])) {
                $table_name = $wpdb->prefix . 'coach_reviews';
                $current_user_id = get_current_user_id();
                $query = $wpdb->prepare("INSERT INTO `wp_coach_reviews` (`coach_id`, `athlete_id`, `description`, `rating`) VALUES (%d, %d, %s, %d)", $user->ID, $current_user_id, $_POST['description'], $_POST['rating']);
                $result = $wpdb->query($query);

                if ($result !== false) {
                    echo '<script>Swal.fire({ title: "Review Added Successfully", text: "", icon: "success"});</script>';
                } else {
                    echo '<script>Swal.fire({ title: "Something is wrong !", text: "", icon: "error"});</script>';
                }
            }

        ?>
            <!-- Profile page design -->
            <section id="profile-layout" class="section-spacing pt-5 pb-0">
                <div class="container">
                    <!-- profile top start -->
                    <div class="profile-top" data-aos="fade-right" data-aos-duration="1500">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center profile-header">
                                    <h2>Learn <?php echo $coach_sport; ?> with <?php echo $coach_name; ?></h2>
                                    <span class="price">$<?php echo $session_price; ?><br><span>For Per Session</span></span>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="profile-sidebar">
                                    <div class="coach-card">
                                        <div class="card">
                                            <div class="card-header p-0">
                                                <?php
                                                if($profile_pic_id){
                                                    if( $profile_pic_id ) {
                                                       $profile_img_link = wp_get_attachment_image_url($profile_pic_id, 'thumbnail');
                                                    }else{
                                                       $profile_img_link = get_stylesheet_directory_uri()."/assets/images/profile_img.png";
                                                    }
                                                }else{
                                                  $profile_img_link = get_stylesheet_directory_uri()."/assets/images/profile_img.jpg";
                                                }
                                                ?>
                                                <img src="<?php echo $profile_img_link; ?>" >
                                            </div>
                                            <div class="card-body">
                                                <div class="coach-content">
                                                    <div class="profile-social">
                                                        <ul>
                                                          <?php
                                                          if(!empty($facebook)){
                                                            echo '<li><a href="'.$facebook.'" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>';
                                                          }
                                                          if(!empty($instagram)){
                                                            echo '<li><a href="'.$instagram.'" target="_blank"><i class="fa-brands  fa-instagram"></i></a></li>';
                                                          }
                                                          if(!empty($tiktok)){
                                                            echo '<li><a href="'.$tiktok.'" target="_blank"><i class="fa-brands  fa-tiktok"></i></a></li>';
                                                          }
                                                          ?>
                                                        </ul>
                                                    </div>
                                                    <div class="custom-button mt-3">
                                                        <button type="button" class="btn btn-round btn-fill" data-toggle="modal" data-target="#session_book_modal">Book Now
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                                <line x1="5" y1="12" x2="19" y2="12" />
                                                                <polyline points="12 5 19 12 12 19" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-8">
                                <div class="profile-top-content">
                                    <div class="profiler-id">
                                        <div class="about-profiler">
                                            <div class="profiler-detail">
                                                <div class="d-flex align-items-start justify-content-between">
                                                    <div class="pd-left">
                                                        <h4>Meet your coach, <?php echo $coach_name; ?></h4>
                                                        <ul class="mt-3 mb-3">
                                                            <?php if($full_address!=""){ ?>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map">
                                                                        <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6" />
                                                                        <line x1="8" y1="2" x2="8" y2="18" />
                                                                        <line x1="16" y1="6" x2="16" y2="22" />
                                                                    </svg>&nbsp;<?php echo $full_address; ?></a>
                                                            </li>
                                                            <?php } ?>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle">
                                                                        <circle cx="12" cy="12" r="10" />
                                                                        <line x1="12" y1="8" x2="12" y2="12" />
                                                                        <line x1="12" y1="16" x2="12.01" y2="16" />
                                                                    </svg>&nbsp;Great Availability</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield">
                                                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                                                    </svg>&nbsp;Verified</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="pd-right custom-button">
                                                        <button type="button" class="btn btn-round btn-fill">Have any questions?</button>
                                                    </div>
                                                </div>
                                                <div class="profile-meta">
                                                    <div class="d-flex align-items-center">
                                                        <?php if($levels_tags!=""){ ?>
                                                        <div class="meta-category">
                                                            <label>Levels taught:</label>
                                                            <?php $levels_arr = explode("," ,$levels_tags);
                                                            foreach($levels_arr as $levels){
                                                               if($levels==""){continue;}
                                                               echo '<span class="badge badge-pill badge-success">'.$levels.'</span>';
                                                            } ?>
                                                        </div>
                                                        <?php }
                                                        if($teaches_tags!=""){ ?>
                                                        <div class="meta-category">
                                                            <label>Teaches:</label>
                                                            <?php $teaches_arr = explode("," ,$teaches_tags);
                                                            foreach($teaches_arr as $teaches){
                                                                if($teaches==""){continue;}
                                                                echo '<span class="badge badge-pill badge-warning">'.$teaches.'</span>';
                                                            } ?>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                    <?php if($description!=""){ ?>
                                                    <div class="meta-about">
                                                       <?php echo $description; ?>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="profile-risk d-flex">
                                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="40px" width="40px" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                            </svg>
                                            <p>Try <?php echo $coach_name; ?> risk free. If you don't love your first lesson with <?php echo $coach_name; ?>, we'll switch you to another coach or give you a full refund. <a href="#"><strong>Learn more</strong></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="lesson-coordinator mt-5 mb-5">
                                    <div class="lesson-inner">
                                        <div class="lesson-img">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/lesson_coordinator.png" alt="lesson coordinator">
                                        </div>
                                        <div class="lesson-content">
                                            <h3>For any queries, please contact our Lesson Coordinator</h3>
                                            <p>If you have any questions or need assistance with lesson scheduling, course details, or any other educational inquiries, our Lesson Coordinator is here to help!</p>
                                            <div class="custom-button mt-3">
                                                <button type="button" class="btn btn-round btn-fill">Contact Now!</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="summer-camp review-profile mb-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="section-title mt-4">
                                    <h2>Reviews</h2>
                                </div>
                                <div class="coach-rating row align-items-center">
                                    <div class="col-md-8 col-lg-7">
                                        <div class="row">
                                            <div class="col-lg-3 rating-box">
                                                <span>Total reviews</span>
                                                <span class="large-font">38</span>
                                            </div>
                                            <div class="col-lg-5 rating-box">
                                                <span>Average Ratings</span>
                                                <div class="d-flex align-items-end">
                                                    <span class="large-font">4.87</span>
                                                    <div class="rating-stars">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-5">
                                        <div class="custom-button d-flex justify-content-end">
                                            <button type="button" class="btn btn-round btn-fill" data-toggle="modal" data-target="#add_review_modal">Add Review</button>&nbsp;&nbsp;
                                            <button type="button" class="btn btn-round btn-fill">View All Reviews</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-main-carousel owl-carousel">
                                    <div class="camp-item">
                                        <div class="loc-top-content">
                                            <div class="d-flex align-items-center">
                                                <div class="camp-image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-1.png" alt="camp image" />
                                                </div>
                                                <div class="loc-title">
                                                    <h4>Yasmine D'Souza</h4>
                                                    <p><span><i class="fa-regular fa-map"></i>&nbsp; W 13th St, New York, NY 10011, USA&nbsp;</span></p>
                                                    <div class="rating-strars">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Christian is an excellent teacher. Felt so much more comfortable with the basics of the game in just an hour. He focused on improving our beginning skills. Made up some fun drills to build confidence. Practiced keeping
                                                score and feel comfortable to go out on the court next time. Highly recommend him.</p>
                                        </div>
                                    </div>
                                    <div class="camp-item">
                                        <div class="loc-top-content">
                                            <div class="d-flex align-items-center">
                                                <div class="camp-image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-1.png" alt="camp image" />
                                                </div>
                                                <div class="loc-title">
                                                    <h4>Yasmine D'Souza</h4>
                                                    <p><span><i class="fa-regular fa-map"></i>&nbsp; W 13th St, New York, NY 10011, USA&nbsp;</span></p>
                                                    <div class="rating-strars">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Christian is an excellent teacher. Felt so much more comfortable with the basics of the game in just an hour. He focused on improving our beginning skills. Made up some fun drills to build confidence. Practiced keeping
                                                score and feel comfortable to go out on the court next time. Highly recommend him.</p>
                                        </div>
                                    </div>
                                    <div class="camp-item">
                                        <div class="loc-top-content">
                                            <div class="d-flex align-items-center">
                                                <div class="camp-image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-1.png" alt="camp image" />
                                                </div>
                                                <div class="loc-title">
                                                    <h4>Yasmine D'Souza</h4>
                                                    <p><span><i class="fa-regular fa-map"></i>&nbsp; W 13th St, New York, NY 10011, USA&nbsp;</span></p>
                                                    <div class="rating-strars">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Christian is an excellent teacher. Felt so much more comfortable with the basics of the game in just an hour. He focused on improving our beginning skills. Made up some fun drills to build confidence. Practiced keeping
                                                score and feel comfortable to go out on the court next time. Highly recommend him.</p>
                                        </div>
                                    </div>
                                    <div class="camp-item">
                                        <div class="loc-top-content">
                                            <div class="d-flex align-items-center">
                                                <div class="camp-image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-1.png" alt="camp image" />
                                                </div>
                                                <div class="loc-title">
                                                    <h4>Yasmine D'Souza</h4>
                                                    <p><span><i class="fa-regular fa-map"></i>&nbsp; W 13th St, New York, NY 10011, USA&nbsp;</span></p>
                                                    <div class="rating-strars">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Christian is an excellent teacher. Felt so much more comfortable with the basics of the game in just an hour. He focused on improving our beginning skills. Made up some fun drills to build confidence. Practiced keeping
                                                score and feel comfortable to go out on the court next time. Highly recommend him.</p>
                                        </div>
                                    </div>
                                    <div class="camp-item">
                                        <div class="loc-top-content">
                                            <div class="d-flex align-items-center">
                                                <div class="camp-image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-1.png" alt="camp image" />
                                                </div>
                                                <div class="loc-title">
                                                    <h4>Yasmine D'Souza</h4>
                                                    <p><span><i class="fa-regular fa-map"></i>&nbsp; W 13th St, New York, NY 10011, USA&nbsp;</span></p>
                                                    <div class="rating-strars">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Christian is an excellent teacher. Felt so much more comfortable with the basics of the game in just an hour. He focused on improving our beginning skills. Made up some fun drills to build confidence. Practiced keeping
                                                score and feel comfortable to go out on the court next time. Highly recommend him.</p>
                                        </div>
                                    </div>
                                    <div class="camp-item">
                                        <div class="loc-top-content">
                                            <div class="d-flex align-items-center">
                                                <div class="camp-image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-1.png" alt="camp image" />
                                                </div>
                                                <div class="loc-title">
                                                    <h4>Yasmine D'Souza</h4>
                                                    <p><span><i class="fa-regular fa-map"></i>&nbsp; W 13th St, New York, NY 10011, USA&nbsp;</span></p>
                                                    <div class="rating-strars">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Christian is an excellent teacher. Felt so much more comfortable with the basics of the game in just an hour. He focused on improving our beginning skills. Made up some fun drills to build confidence. Practiced keeping
                                                score and feel comfortable to go out on the court next time. Highly recommend him.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- profile top End -->
                    <div class="profile-bottom section-spacing pt-4 pb-5" data-aos="fade-left" data-aos-duration="1500">
                        <div class="profile-tab-start">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="gallery-tab" data-toggle="tab" data-target="#gallery" type="button" role="tab" aria-controls="gallery" aria-selected="true">Gallery</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="location-tab" data-toggle="tab" data-target="#location" type="button" role="tab" aria-controls="location" aria-selected="false">Where I Teach</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="available-tab" data-toggle="tab" data-target="#available" type="button" role="tab" aria-controls="available" aria-selected="false">Availability</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="faq-tab" data-toggle="tab" data-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="false">FAQ'S</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="policy-tab" data-toggle="tab" data-target="#policy" type="button" role="tab" aria-controls="policy" aria-selected="false">Cancellation Policy</button>
                                </li>
                            </ul>
                            <div class="tab-content tabs-main" id="myTabContent">
                                <div class="tab-pane fade show active" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                                    <div class="tab-inside">
                                        <div class="gallery-block">
                                            <div id="profile-gallery" class="card-column owl-carousel">
                                                <div class="card">
                                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about/about-two.jpg" alt="Card image cap">
                                                </div>
                                                <div class="card">
                                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about/about-one.jpg" alt="Card image cap">
                                                </div>
                                                <div class="card">
                                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gallery/03.JPG" alt="Card image cap">
                                                </div>
                                                <div class="card">
                                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gallery/04.jpg" alt="Card image cap">
                                                </div>
                                                <div class="card">
                                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gallery/05.jpg" alt="Card image cap">
                                                </div>
                                                <div class="card">
                                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gallery/01.jpg" alt="Card image cap">
                                                </div>
                                                <div class="card">
                                                    <video autoplay muted loop>
                                                        <source src="https://ewvfbezbkbxmtghxhiij.supabase.co/storage/v1/object/public/media/568f8ae4-1a91-42ba-a408-63cec16eaa8c--2023-09-05T19:36:51.537Z.mp4" type="video/mp4">
                                                    </video>
                                                </div>
                                                <div class="card">
                                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gallery/07.JPG" alt="Card image cap">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
                                    <div class="tab-inside">
                                        <div class="section-title mb-4">
                                            <h2>Where I teach</h2>
                                        </div>
                                        <div class="location-map">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24434.156332886923!2d-75.40395994617643!3d40.04708537873419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c694d91b6ed159%3A0x92cd6e0d0562ffa9!2sWayne%2C%20PA%2C%20USA!5e0!3m2!1sen!2sin!4v1729765333834!5m2!1sen!2sin"
                                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                        <div id="location-slider" class="owl-carousel">
                                            <!-- location item -->
                                            <div class="location-item">
                                                <div class="loc-top-content">
                                                    <div class="loc-title">
                                                        <h4>Hamilton Lakes Athletic Club (CC)</h4>
                                                        <p>8,105 miles away</p>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                    </div>
                                                </div>
                                                <div class="loc-btm-content">
                                                    <span class="badge badge-pill badge-dark">OUTDOOR</span>
                                                    <span class="badge badge-pill badge-warning">$45 FEE</span>
                                                </div>
                                            </div>
                                            <!-- location item end-->
                                            <!-- location item -->
                                            <div class="location-item">
                                                <div class="loc-top-content">
                                                    <div class="loc-title">
                                                        <h4>Athletic Field Park</h4>
                                                        <p>8,105 miles away</p>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                    </div>
                                                </div>
                                                <div class="loc-btm-content">
                                                    <span class="badge badge-pill badge-dark">OUTDOOR</span>
                                                    <span class="badge badge-pill badge-warning">$45 FEE</span>
                                                </div>
                                            </div>
                                            <!-- location item end-->
                                            <!-- location item -->
                                            <div class="location-item">
                                                <div class="loc-top-content">
                                                    <div class="loc-title">
                                                        <h4>Lake View YMCA</h4>
                                                        <p>8,105 miles away</p>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                    </div>
                                                </div>
                                                <div class="loc-btm-content">
                                                    <span class="badge badge-pill badge-dark">OUTDOOR</span>
                                                    <span class="badge badge-pill badge-warning">$45 FEE</span>
                                                </div>
                                            </div>
                                            <!-- location item end-->
                                            <!-- location item -->
                                            <div class="location-item">
                                                <div class="loc-top-content">
                                                    <div class="loc-title">
                                                        <h4>SPF Chicago</h4>
                                                        <p>8,105 miles away</p>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                    </div>
                                                </div>
                                                <div class="loc-btm-content">
                                                    <span class="badge badge-pill badge-dark">OUTDOOR</span>
                                                    <span class="badge badge-pill badge-warning">$45 FEE</span>
                                                </div>
                                            </div>
                                            <!-- location item end-->
                                            <!-- location item -->
                                            <div class="location-item">
                                                <div class="loc-top-content">
                                                    <div class="loc-title">
                                                        <h4>Bauler Park</h4>
                                                        <p>8,105 miles away</p>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                    </div>
                                                </div>
                                                <div class="loc-btm-content">
                                                    <span class="badge badge-pill badge-dark">OUTDOOR</span>
                                                    <span class="badge badge-pill badge-warning">$45 FEE</span>
                                                </div>
                                            </div>
                                            <!-- location item end-->
                                            <!-- location item -->
                                            <div class="location-item">
                                                <div class="loc-top-content">
                                                    <div class="loc-title">
                                                        <h4>ParkChicago</h4>
                                                        <p>8,105 miles away</p>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                    </div>
                                                </div>
                                                <div class="loc-btm-content">
                                                    <span class="badge badge-pill badge-dark">OUTDOOR</span>
                                                    <span class="badge badge-pill badge-warning">$45 FEE</span>
                                                </div>
                                            </div>
                                            <!-- location item end-->
                                            <!-- location item -->
                                            <div class="location-item">
                                                <div class="loc-top-content">
                                                    <div class="loc-title">
                                                        <h4>ParkChicago</h4>
                                                        <p>8,105 miles away</p>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                    </div>
                                                </div>
                                                <div class="loc-btm-content">
                                                    <span class="badge badge-pill badge-dark">OUTDOOR</span>
                                                    <span class="badge badge-pill badge-warning">$45 FEE</span>
                                                </div>
                                            </div>
                                            <!-- location item end-->
                                            <!-- location item -->
                                            <div class="location-item">
                                                <div class="loc-top-content">
                                                    <div class="loc-title">
                                                        <h4>ParkChicago</h4>
                                                        <p>8,105 miles away</p>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                    </div>
                                                </div>
                                                <div class="loc-btm-content">
                                                    <span class="badge badge-pill badge-dark">OUTDOOR</span>
                                                    <span class="badge badge-pill badge-warning">$45 FEE</span>
                                                </div>
                                            </div>
                                            <!-- location item end-->
                                            <!-- location item -->
                                            <div class="location-item">
                                                <div class="loc-top-content">
                                                    <div class="loc-title">
                                                        <h4>ParkChicago</h4>
                                                        <p>8,105 miles away</p>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                    </div>
                                                </div>
                                                <div class="loc-btm-content">
                                                    <span class="badge badge-pill badge-dark">OUTDOOR</span>
                                                    <span class="badge badge-pill badge-warning">$45 FEE</span>
                                                </div>
                                            </div>
                                            <!-- location item end-->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="available" role="tabpanel" aria-labelledby="available-tab">
                                    <div class="tab-inside">
                                        <div class="section-title mb-5">
                                            <h2>When I'm usually available</h2>
                                        </div>
                                        <div class="calendar">
                                            <iframe src="https://calendar.google.com/calendar/embed?src=webexpert987%40gmail.com&ctz=Asia%2FKolkata" style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                                    <div class="tab-inside">
                                        <div id="faqs-main">
                                            <div class="section-title mb-5">
                                                <h2>Frequently Asked Questions</h2>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-lg-6">
                                                    <div class="faq-block">
                                                        <div class="accordion" id="accordionExample">
                                                            <div class="card">
                                                                <div class="card-header" id="headingOne">
                                                                    <h2 class="mb-0">
                                                                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                            What if I don't love my first lesson?
                                                                          </button>
                                                                        </h2>
                                                                </div>
                                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        Our risk free guarantee has you covered. If it's not a good fit or you just don't love your first lesson, we'll help find you another coach and give you an extra lesson for free. If things just don't work out, we'll provide a full refund.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header" id="headingTwo">
                                                                    <h2 class="mb-0">
                                                                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                            Can I have a trial lesson?
                                                                          </button>
                                                                        </h2>
                                                                </div>
                                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        While we do not offer a free trial lesson, every TeachMe.To purchase comes with a quality guarantee. If you don't love your experience for any reason, just let us know after your first lesson and we'll help you find a different coach or provide a full
                                                                        refund. Your choice.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header" id="headingThree">
                                                                    <h2 class="mb-0">
                                                                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                            How do I book and what does it cost?
                                                                          </button>
                                                                        </h2>
                                                                </div>
                                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        Booking a pickleball lesson is simple and convenient. You can choose one of the following methods: Online Simply tap the blue “Schedule now” button on the lower righthand side of the screen to begin the booking process online. We offer fast and convenient
                                                                        instant booking, backed by our 100% risk-free guarantee. Phone Text us at 650-900-3835 to speak directly with our staff, who can help you schedule your lesson and answer any questions you
                                                                        may have. Lesson Costs We offer competitive pricing for our lessons, with options to fit different budgets and needs. View pricing breakdown Group Lessons Pricing varies based on the number
                                                                        of participants. Each additional participant costs just 50% of the base lesson cost, creating group purchasing savings. Payment Options We accept various payment methods, including credit/debit
                                                                        cards, and online payment platforms. Payment can be made at the time of booking or before the start of the lesson. By offering flexible booking options and transparent pricing, we aim to
                                                                        make it as easy as possible for you to start or continue your pickleball journey with us.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header" id="headingFour">
                                                                    <h2 class="mb-0">
                                                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                                                What happens after I book?
                                                                            </button>
                                                                          </h2>
                                                                </div>
                                                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        After you book you will gain access to the TeachMe.To App where you will immediately be connected with your coach as well as our world class support team. This is where you can chat with your coach, schedule and reschedule lessons, and keep track of your
                                                                        progress.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-6">
                                                    <div class="faq-block">
                                                        <div class="accordion" id="accordionExample2">
                                                            <div class="card">
                                                                <div class="card-header" id="headingfive">
                                                                    <h2 class="mb-0">
                                                                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                                                            What if I don't love my first lesson?
                                                                          </button>
                                                                        </h2>
                                                                </div>
                                                                <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        Our risk free guarantee has you covered. If it's not a good fit or you just don't love your first lesson, we'll help find you another coach and give you an extra lesson for free. If things just don't work out, we'll provide a full refund.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header" id="headingSix">
                                                                    <h2 class="mb-0">
                                                                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                                                            Can I have a trial lesson?
                                                                          </button>
                                                                        </h2>
                                                                </div>
                                                                <div id="collapsesix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        While we do not offer a free trial lesson, every TeachMe.To purchase comes with a quality guarantee. If you don't love your experience for any reason, just let us know after your first lesson and we'll help you find a different coach or provide a full
                                                                        refund. Your choice.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header" id="headingseven">
                                                                    <h2 class="mb-0">
                                                                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                            How do I book and what does it cost?
                                                                          </button>
                                                                        </h2>
                                                                </div>
                                                                <div id="collapseSeven" class="collapse" aria-labelledby="headingseven" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        Booking a pickleball lesson is simple and convenient. You can choose one of the following methods: Online Simply tap the blue “Schedule now” button on the lower righthand side of the screen to begin the booking process online. We offer fast and convenient
                                                                        instant booking, backed by our 100% risk-free guarantee. Phone Text us at 650-900-3835 to speak directly with our staff, who can help you schedule your lesson and answer any questions you
                                                                        may have. Lesson Costs We offer competitive pricing for our lessons, with options to fit different budgets and needs. View pricing breakdown Group Lessons Pricing varies based on the number
                                                                        of participants. Each additional participant costs just 50% of the base lesson cost, creating group purchasing savings. Payment Options We accept various payment methods, including credit/debit
                                                                        cards, and online payment platforms. Payment can be made at the time of booking or before the start of the lesson. By offering flexible booking options and transparent pricing, we aim to
                                                                        make it as easy as possible for you to start or continue your pickleball journey with us.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header" id="headingEight">
                                                                    <h2 class="mb-0">
                                                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                                What happens after I book?
                                                                            </button>
                                                                          </h2>
                                                                </div>
                                                                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        After you book you will gain access to the TeachMe.To App where you will immediately be connected with your coach as well as our world class support team. This is where you can chat with your coach, schedule and reschedule lessons, and keep track of your
                                                                        progress.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="policy" role="tabpanel" aria-labelledby="policy-tab">
                                    <div class="tab-inside">
                                        <div class="section-title mb-4">
                                            <h2>Cancellation Policy</h2>
                                        </div>
                                        <div class="policy-main">
                                            <p>We totally understand that life can be unpredictable and plans might change. That's why we've got your back with our flexible cancellation policy, designed to give you peace of mind when booking private sports lessons
                                                with our awesome local instructors!</p>
                                            <p>If you need to cancel your lesson, no worries! You can get a full refund if you cancel within 24 hours of making your booking. We want to make the process as hassle-free as possible for you.</p>
                                            <p>And if you simply want to reschedule your lesson, change the date and time, or adjust the number of students joining, we've got you covered there too. You can easily make these changes within 24 hours of booking, and
                                                up to 72 hours before your lesson starts.</p>
                                            <p>Our goal is to make your experience smooth, enjoyable, and worry-free. So go ahead and book with confidence, knowing that we're here to accommodate your needs every step of the way!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
            </section>
            <section id="summer-camp-area" class="section-spacing pt-0 pb-0">
                <div class="container">
                    <div class="summer-camp mt-2 mb-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="section-title mb-3">
                                    <h2>Unleash Your Summer Spirit!</h2>
                                </div>
                                <div class="summer-camp-carousel owl-carousel">
                                    <?php
                                        $args = [
                                            'post_type' => 'summer-camps', 
                                            'posts_per_page' => -1, 
                                            'post_status'    => array('publish')
                                        ];
                                        $query = new WP_Query($args);
                                        if ($query->have_posts()) {
                                            $i = 0;
                                            while ($query->have_posts()) {
                                                $query->the_post();
                                                $post_id = get_the_ID();
                                                $created_date = get_the_date('F j, Y', $post_id);
                                                $post_status = get_post_status($post_id);
                                                $post_content = get_the_content();
                                                $event_start = get_post_meta($post_id, "_event_from_date", true);
                                                $event_start_date = date("d/m/Y h:i A", strtotime($event_start));
                                                $event_end = get_post_meta($post_id, "_event_to_date", true);
                                                $event_end_date = date("d/m/Y h:i A", strtotime($event_end));
                                                $event_location = get_post_meta($post_id, "_event_location", true);
                                                $event_price = get_post_meta($post_id, "_event_price", true);
                                                $productID = get_post_meta($post_id, "_product_id", true);
                                                $post_slug = get_post_field( 'post_name', get_the_ID() );
                                                $attachment_id = get_post_meta($post_id, "_thumbnail_id", true);
                                                if( $attachment_id ) {
                                                   $thumbnail_url = wp_get_attachment_image_url($attachment_id, 'thumbnail');
                                                }else{
                                                   $thumbnail_url = get_stylesheet_directory_uri()."/assets/images/default-post.png";
                                                }

                                                $current_date = date("Y-m-d h:i:s");

                                                $assign_coach = get_post_meta($post_id, "assign_coach", true) ?: array();
                                                if (!in_array($user->ID, $assign_coach) OR $event_start < $current_date){ continue; }
                                                ++$i; ?>
                                                <div class="camp-item">
                                                    <div class="loc-top-content">
                                                        <div class="d-flex align-items-center">
                                                            <div class="camp-image">
                                                                <img src="<?php echo $thumbnail_url; ?>" alt="camp image" />
                                                            </div>
                                                            <div class="loc-title">
                                                                <h4><?php echo get_the_title(); ?></h4>
                                                                <p><span><i class="bx bx-pin"></i>&nbsp; <?php echo $event_location; ?>&nbsp;</span></p>
                                                                <p><span><i class="bx bx-calendar"></i>&nbsp; <?php echo $event_start_date; ?> To <?php echo $event_end_date; ?>&nbsp;</span></p>
                                                                <div class="loc-btm-content">
                                                                    <span class="badge badge-pill badge-warning">$<?php echo $event_price; ?> FEE</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="custom-button">
                                                            <button type="button" class="btn-outliner" onclick="window.location.href='<?php echo site_url('summercamp/'.$post_slug.'/?referral_id='.$user->ID); ?>'">Join Now!</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php }
                                        }
                                        wp_reset_postdata(); ?>  

                                </div>
                                <?php if($i==0){echo 'No summer camps found for you !';} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Reward Section Start-->
            <section id="reward-block" class="section-spacing pt-4">
                <div class="container">
                    <div class="reward-main">
                        <div class="reward-inner">
                            <div class="reward-top-title">
                                <h2>Unlock Rewards: Discover Our Simple <br>Referral Process!</h2>
                                <p>Refer a friend and both of you can enjoy exclusive benefits!</p>
                                <div class="custom-button mt-4">
                                    <button type="button" class="btn btn-round btn-fill">Learn More</button>
                                </div>
                            </div>
                            <div class="reward-step row">
                                <div class="col-md-4 col-lg-4">
                                    <div class="reward-box">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/referrel_image.png">
                                        <h3>Step 1: Refer a Friend</h3>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="reward-box second">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/register_image.png">
                                        <h3>Step 2: They Sign Up</h3>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="reward-box">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/reward_image.png">
                                        <h3>Step 3: Earn Rewards</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Reward Section End-->
            <!-- Coach Find Section start-->
            <section id="coach-find-area" class="section-spacing " data-aos="fade-top" data-aos-duration="1500">
                <div class="container">
                    <div class="coach-find-main">
                        <div class="section-title mb-3 d-flex align-items-center justify-content-between">
                            <h2>Coach Near You</h2>
                            <div class="custom-button view-more">
                                <button type="button" class="btn btn-round btn-fill">View More</button>
                            </div>
                        </div>
                        <div class="coach-find-content">
                            <div class="coach-find-box">
                                <div class="row">
                                    <div class="col-md-3 col-lg-2">
                                        <div class="coach-find-image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/find_01.jpg" alt=" Find Image" />
                                        </div>
                                        <div class="coach-find-item">
                                            <h5>Baseball</h5>
                                            <div class="d-flex">
                                                <span>17 Coaches</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-2">
                                        <div class="coach-find-image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/find_02.jpg" alt=" Find Image" />
                                        </div>
                                        <div class="coach-find-item">
                                            <h5>Basketball</h5>
                                            <div class="d-flex">
                                                <span>17 Coaches</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-2">
                                        <div class="coach-find-image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/find_03.png" alt=" Find Image" />
                                        </div>
                                        <div class="coach-find-item">
                                            <h5>Football</h5>
                                            <div class="d-flex">
                                                <span>17 Coaches</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-2">
                                        <div class="coach-find-image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/find_04.png" alt=" Find Image" />
                                        </div>
                                        <div class="coach-find-item">
                                            <h5>Hockey</h5>
                                            <div class="d-flex">
                                                <span>05 Coaches</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-2">
                                        <div class="coach-find-image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/find_05.png" alt=" Find Image" />
                                        </div>
                                        <div class="coach-find-item">
                                            <h5>Leesburg, VA</h5>
                                            <div class="d-flex">
                                                <span>17 Coaches</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-2">
                                        <div class="coach-find-image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/find_06.png" alt=" Find Image" />
                                        </div>
                                        <div class="coach-find-item">
                                            <h5>Ice Hockey</h5>
                                            <div class="d-flex">
                                                <span>17 Coaches</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Coach Find Section End-->
            <!-- New risk free section -->
            <section id="risk-block" class="section-spacing">
                <div class="container">
                    <div class="risk-main">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-12">
                                <div class="risk-content d-flex align-items-end justify-content-between">
                                    <div>
                                        <div class="sub-heading">Risk Free Session</div>
                                        <h2>Experience Our Risk-Free Session</h2>
                                        <p>At PTP, we believe in the power of firsthand experience.</p>
                                    </div>
                                    <div class="custom-button">
                                        <button type="button" class="btn btn-round btn-fill">View More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 mt-5">
                                <div class="risk-columns">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="risk-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 48">
                                                    <g fill="none" class="nc-icon-wrapper">
                                                        <path d="M6.98611 28.2169C6.90127 30.5674 7.28039 32.9115 8.10181 35.1154C8.92322 37.3193 10.1708 39.3398 11.7734 41.0614C11.8405 41.1334 11.8929 41.2179 11.9274 41.3102C11.9619 41.4024 11.9779 41.5006 11.9745 41.599C11.9711 41.6975 11.9483 41.7943 11.9075 41.8839C11.8666 41.9735 11.8085 42.0542 11.7365 42.1214C11.6645 42.1886 11.5799 42.2409 11.4877 42.2754C11.3954 42.3099 11.2973 42.3259 11.1989 42.3225C11.1004 42.3191 11.0036 42.2963 10.914 42.2555C10.8244 42.2147 10.7437 42.1566 10.6765 42.0846C8.41168 39.6592 6.80927 36.6917 6.02344 33.4677C5.23762 30.2437 5.29484 26.8718 6.18961 23.6763C6.21624 23.5815 6.26129 23.4928 6.32218 23.4154C6.38307 23.338 6.45861 23.2733 6.5445 23.2251C6.63038 23.1768 6.72492 23.146 6.82272 23.1343C6.92053 23.1226 7.01967 23.1303 7.1145 23.157C7.20933 23.1836 7.29798 23.2286 7.3754 23.2895C7.45282 23.3504 7.51749 23.426 7.56571 23.5118C7.61394 23.5977 7.64477 23.6923 7.65646 23.7901C7.66815 23.8879 7.66046 23.987 7.63383 24.0818C7.25755 25.4302 7.04017 26.818 6.98611 28.2169ZM42.4664 29.6146C42.454 34.0677 40.9228 38.024 38.0382 41.0559C37.9011 41.2001 37.8268 41.3927 37.8318 41.5916C37.8367 41.7904 37.9204 41.9792 38.0646 42.1163C38.2087 42.2534 38.4013 42.3277 38.6002 42.3227C38.7991 42.3178 38.9878 42.234 39.1249 42.0899C42.2759 38.7784 43.9499 34.4706 43.9664 29.6318C44.0961 26.1288 43.4374 22.5017 42.0083 18.8506C40.7399 15.61 38.8994 12.4227 36.538 9.37725C36.4147 9.22423 36.2364 9.12568 36.0412 9.1028C35.8461 9.07992 35.6497 9.13453 35.4944 9.2549C35.3391 9.37527 35.2373 9.55178 35.2107 9.74647C35.1842 9.94116 35.2352 10.1385 35.3526 10.296C40.1744 16.5144 42.7009 23.3659 42.4668 29.5882C42.4664 29.5969 42.4664 29.6062 42.4664 29.6146ZM9.84464 21.4973C12.2858 16.7597 11.4507 10.6005 11.2457 9.89053C11.2103 9.76809 11.2067 9.63865 11.2352 9.51442C11.2637 9.3902 11.3234 9.27528 11.4087 9.18053C11.4939 9.08578 11.6019 9.01432 11.7224 8.97289C11.843 8.93146 11.9721 8.92143 12.0975 8.94375C14.298 9.33459 16.1065 10.608 17.4839 12.7337C19.0682 11.2128 19.8871 8.78484 19.1245 3.20644C19.1075 3.08169 19.1222 2.95468 19.1671 2.8371C19.2121 2.71951 19.286 2.61515 19.3819 2.53363C19.4779 2.4521 19.5928 2.39604 19.7161 2.3706C19.8394 2.34517 19.9671 2.35119 20.0875 2.38809C26.24 4.275 30.1852 8.5125 32.1483 15.3432C32.1729 15.4302 32.2257 15.5066 32.2983 15.5604C32.371 15.6142 32.4595 15.6424 32.5499 15.6405C32.6403 15.6386 32.7275 15.6068 32.7978 15.55C32.8682 15.4933 32.9178 15.4148 32.9387 15.3268C33.1943 14.2596 33.2563 12.9758 33.1229 11.5126C33.1081 11.3511 33.1462 11.1891 33.2313 11.051C33.3164 10.9129 33.4439 10.8061 33.5949 10.7466C33.7458 10.6872 33.9119 10.6783 34.0683 10.7212C34.2248 10.7642 34.3631 10.8567 34.4625 10.9849C36.6689 13.8302 38.3839 16.7957 39.56 19.7991C40.8658 23.1335 41.4649 26.4236 41.3407 29.5785C41.3375 33.6472 40.0623 37.1275 37.5502 39.923C35.0994 42.6502 32.0658 44.0548 29.799 44.7698V46.5C29.799 46.6989 29.7199 46.8897 29.5793 47.0303C29.4386 47.171 29.2479 47.25 29.049 47.25C28.85 47.25 28.6593 47.171 28.5186 47.0303C28.378 46.8897 28.299 46.6989 28.299 46.5V40.425C28.299 40.2261 28.378 40.0354 28.5186 39.8948L33.7405 34.6729C33.8986 34.5207 34.0235 34.3374 34.1074 34.1346C34.1913 33.9318 34.2323 33.7139 34.228 33.4944V28.5563C34.2335 28.2131 34.1307 27.8769 33.9342 27.5954C33.7378 27.3139 33.4577 27.1015 33.1336 26.9883L32.5102 26.7607L25.4175 29.4816L25.8799 30.2838C26.0941 30.6617 26.4285 30.9573 26.8298 31.1236C27.2312 31.2898 27.6766 31.3172 28.0953 31.2014L31.7459 30.221C31.938 30.1694 32.1427 30.1962 32.315 30.2956C32.4874 30.3949 32.6132 30.5587 32.6647 30.7508C32.7163 30.9429 32.6895 31.1476 32.5901 31.32C32.4908 31.4923 32.327 31.6181 32.1349 31.6697L29.9175 32.2653L30.2175 33.7581C30.2521 33.9306 30.2251 34.1097 30.141 34.2643C30.0569 34.4188 29.9212 34.5389 29.7575 34.6035L26.8342 35.7566C25.824 36.1563 25.2705 36.4741 25.0501 37.1013L24.662 38.2045C24.6297 38.2979 24.5792 38.3839 24.5135 38.4576C24.4478 38.5314 24.3682 38.5915 24.2792 38.6344C24.1902 38.6773 24.0937 38.7022 23.995 38.7077C23.8964 38.7132 23.7977 38.6991 23.7045 38.6663C23.6113 38.6335 23.5255 38.5827 23.4521 38.5166C23.3786 38.4506 23.3189 38.3707 23.2764 38.2816C23.2339 38.1924 23.2094 38.0957 23.2044 37.9971C23.1993 37.8984 23.2138 37.7997 23.247 37.7067L23.635 36.6038C24.1225 35.2163 25.4227 34.7019 26.283 34.3615L28.6232 33.4382L28.4657 32.6544C27.73 32.8538 26.9489 32.8027 26.2455 32.5091C25.5421 32.2155 24.9563 31.6962 24.5806 31.033L23.9002 29.8528C23.7907 29.8776 23.6788 29.8901 23.5665 29.8903H22.38L22.4163 30.1039C22.481 30.485 22.392 30.8763 22.1687 31.1919C21.9454 31.5075 21.606 31.7217 21.225 31.7875C21.183 31.7948 21.1403 31.7984 21.0976 31.7984H19.1125C18.2528 31.7984 17.8556 31.2818 17.7706 30.7983L17.0364 26.4919C17.0198 26.3948 17.0226 26.2954 17.0444 26.1993C17.0663 26.1033 17.1069 26.0125 17.1638 25.9322C17.2788 25.7699 17.4536 25.6599 17.6497 25.6265C17.8458 25.593 18.0471 25.6389 18.2094 25.7539C18.3717 25.8689 18.4817 26.0437 18.5151 26.2398L19.207 30.2984H20.9279L20.77 29.3722C20.748 29.3042 20.7359 29.2333 20.7341 29.1618L19.7487 23.3835L17.7242 23.7304C17.7102 23.7327 17.6161 23.757 17.4263 24.0918L16.136 26.3479C15.9855 26.5978 15.9084 26.885 15.9135 27.1767V35.1307C15.9095 35.4242 15.9871 35.7131 16.1375 35.9651L17.745 38.7495C17.8108 38.8635 17.8455 38.9929 17.8455 39.1245V46.5C17.8455 46.6989 17.7664 46.8897 17.6258 47.0303C17.4851 47.171 17.2944 47.25 17.0955 47.25C16.8965 47.25 16.7058 47.171 16.5651 47.0303C16.4245 46.8897 16.3455 46.6989 16.3455 46.5V43.2916C13.7365 41.771 11.5913 39.5681 10.1403 36.9198C8.68939 34.2714 7.98762 31.2777 8.11045 28.2605C8.1993 25.9082 8.79061 23.6021 9.84464 21.4973ZM23.5665 28.391C23.5739 28.3902 23.5808 28.387 23.586 28.3818C23.5912 28.3766 23.5945 28.3697 23.5952 28.3624V21.1552C23.5945 21.1478 23.5912 21.1409 23.586 21.1357C23.5808 21.1305 23.5739 21.1272 23.5665 21.1265H21.2704C21.2631 21.1272 21.2562 21.1304 21.2509 21.1357C21.2457 21.1409 21.2425 21.1478 21.2417 21.1552V23.2162L22.1242 28.3913L23.5665 28.391ZM27.4459 27.0972V21.1552C27.4457 21.1481 27.443 21.1413 27.4382 21.136C27.4335 21.1307 27.427 21.1274 27.42 21.1265H25.1212C25.1142 21.1273 25.1077 21.1307 25.1029 21.136C25.0981 21.1413 25.0954 21.1481 25.0952 21.1552V27.9989L27.4459 27.0972ZM31.7538 21.2457C31.7534 21.2143 31.7407 21.1842 31.7185 21.162C31.6962 21.1398 31.6662 21.1271 31.6348 21.1268H29.065C29.0338 21.1279 29.0042 21.1408 28.9821 21.1629C28.96 21.1849 28.9471 21.2145 28.9459 21.2457V26.5206L31.7538 25.4437V21.2457ZM11.1821 22.1767C9.54014 25.4776 9.1587 29.2642 10.1093 32.8263C11.0599 36.3885 13.2772 39.4815 16.3455 41.5255V39.3263L14.838 36.7152C14.5565 36.2349 14.4098 35.6876 14.4135 35.1308V27.1771C14.4077 26.6232 14.5536 26.0783 14.8353 25.6013L16.123 23.3499C16.3574 22.9374 16.7536 22.3711 17.4754 22.2516L19.5363 21.8988C19.6043 21.8876 19.673 21.8813 19.7419 21.88V21.1553C19.7424 20.75 19.9036 20.3614 20.1902 20.0748C20.4767 19.7882 20.8653 19.627 21.2706 19.6266H23.5665C23.8406 19.6268 24.1095 19.7013 24.3447 19.8422C24.5793 19.7014 24.8477 19.6269 25.1213 19.6266H27.42C27.7066 19.6267 27.9873 19.7082 28.2293 19.8616C28.481 19.708 28.7702 19.6267 29.0651 19.6266H31.6349C32.0641 19.627 32.4756 19.7978 32.7792 20.1013C33.0827 20.4048 33.2534 20.8163 33.2539 21.2455V25.4355L33.6489 25.5798C34.261 25.7995 34.7898 26.2039 35.1622 26.7371C35.5347 27.2702 35.7324 27.9059 35.728 28.5563V33.4941C35.7339 33.9107 35.6548 34.3241 35.4954 34.7091C35.3361 35.0941 35.0999 35.4426 34.8014 35.7332L29.799 40.7355V43.1858C33.0101 42.0555 39.8407 38.5855 39.8407 29.564C39.8407 29.554 39.8407 29.544 39.8414 29.534C40.0419 24.5306 38.2155 19.0182 34.6653 13.8112C34.6301 14.4399 34.5404 15.0644 34.3972 15.6776C34.2989 16.0875 34.0677 16.4532 33.7396 16.7179C33.4116 16.9825 33.0052 17.1311 32.5838 17.1404C32.1625 17.1498 31.7499 17.0195 31.4104 16.7697C31.0709 16.5199 30.8237 16.1648 30.7072 15.7598C28.9916 9.7905 25.8147 6.08841 20.7561 4.19878C21.0245 6.72487 20.957 8.66766 20.5519 10.2488C20.0934 12.0386 19.2007 13.382 17.7424 14.477C17.6565 14.5415 17.5577 14.5868 17.4527 14.6098C17.3477 14.6328 17.2391 14.633 17.134 14.6103C17.029 14.5876 16.93 14.5427 16.8439 14.4784C16.7577 14.4142 16.6864 14.3322 16.6347 14.238C15.6602 12.4627 14.4078 11.2815 12.9016 10.7138C13.0374 11.9125 13.0819 13.1196 13.0348 14.325C12.9585 16.4142 12.575 19.4736 11.1821 22.1767ZM37.4421 4.77938C37.4421 4.97829 37.3631 5.16905 37.2224 5.30971C37.0818 5.45036 36.891 5.52938 36.6921 5.52938C36.0222 5.53012 35.3799 5.79657 34.9062 6.27027C34.4326 6.74396 34.1661 7.38622 34.1654 8.05612C34.1654 8.25504 34.0863 8.4458 33.9457 8.58645C33.805 8.72711 33.6143 8.80612 33.4154 8.80612C33.2164 8.80612 33.0257 8.72711 32.885 8.58645C32.7444 8.4458 32.6654 8.25504 32.6654 8.05612C32.6642 7.38588 32.3972 6.74348 31.923 6.2698C31.4488 5.79612 30.8061 5.52985 30.1359 5.52938C29.937 5.52938 29.7462 5.45036 29.6056 5.30971C29.4649 5.16905 29.3859 4.97829 29.3859 4.77938C29.3859 4.58046 29.4649 4.3897 29.6056 4.24904C29.7462 4.10839 29.937 4.02938 30.1359 4.02938C30.8065 4.02863 31.4494 3.76191 31.9236 3.28772C32.3978 2.81354 32.6646 2.17061 32.6654 1.5C32.6654 1.30109 32.7444 1.11032 32.885 0.96967C33.0257 0.829018 33.2164 0.75 33.4154 0.75C33.6143 0.75 33.805 0.829018 33.9457 0.96967C34.0863 1.11032 34.1654 1.30109 34.1654 1.5C34.1659 2.17023 34.4321 2.8129 34.9058 3.28706C35.3795 3.76123 36.0219 4.02818 36.6921 4.02938C36.891 4.02938 37.0818 4.10839 37.2224 4.24904C37.3631 4.3897 37.4421 4.58046 37.4421 4.77938ZM34.3544 4.77938C33.9918 4.5197 33.6745 4.20215 33.4151 3.83944C33.1554 4.20217 32.8379 4.51972 32.4751 4.77938C32.8379 5.0388 33.1554 5.35616 33.4151 5.71875C33.6745 5.35612 33.9918 5.03887 34.3544 4.77938ZM0.0175781 18.2611C0.0175781 18.0622 0.0965957 17.8714 0.237248 17.7308C0.3779 17.5901 0.568666 17.5111 0.767578 17.5111C1.43749 17.5103 2.07974 17.2439 2.55344 16.7702C3.02713 16.2965 3.29358 15.6543 3.29433 14.9843C3.29433 14.7854 3.37335 14.5947 3.514 14.454C3.65465 14.3134 3.84542 14.2343 4.04433 14.2343C4.24324 14.2343 4.43401 14.3134 4.57466 14.454C4.71531 14.5947 4.79433 14.7854 4.79433 14.9843C4.79552 15.6546 5.06247 16.297 5.53664 16.7706C6.01081 17.2443 6.65348 17.5106 7.3237 17.5111C7.52262 17.5111 7.71338 17.5901 7.85403 17.7308C7.99468 17.8714 8.0737 18.0622 8.0737 18.2611C8.0737 18.46 7.99468 18.6508 7.85403 18.7914C7.71338 18.9321 7.52262 19.0111 7.3237 19.0111C6.6531 19.0118 6.01017 19.2786 5.53599 19.7528C5.0618 20.2269 4.79507 20.8699 4.79433 21.5405C4.79433 21.7394 4.71531 21.9301 4.57466 22.0708C4.43401 22.2115 4.24324 22.2905 4.04433 22.2905C3.84542 22.2905 3.65465 22.2115 3.514 22.0708C3.37335 21.9301 3.29433 21.7394 3.29433 21.5405C3.29383 20.8702 3.02755 20.2276 2.55387 19.7534C2.0802 19.2792 1.4378 19.0123 0.767578 19.0111C0.568666 19.0111 0.3779 18.9321 0.237248 18.7914C0.0965957 18.6508 0.0175781 18.46 0.0175781 18.2611ZM3.10523 18.2611C3.46778 18.5207 3.78512 18.8382 4.04452 19.2009C4.30417 18.8383 4.62169 18.5209 4.98436 18.2614C4.62167 18.0019 4.30412 17.6845 4.04442 17.322C3.78502 17.6845 3.46772 18.0016 3.10523 18.2611Z"
                                                        fill="currentColor"></path>
                                                    </g>
                                                </svg>
                                                <!-- <i class="fa-solid fa-person-chalkboard"></i> -->
                                                <h4>Proof of quality</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="risk-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                                    <g fill="none" class="nc-icon-wrapper">
                                                        <path d="M26.2674 42.1912C28.3404 42.5397 30.4632 42.4545 32.5016 41.9409C34.5401 41.4274 36.4498 40.4967 38.1101 39.2077C39.7705 37.9187 41.1453 36.2993 42.1478 34.452C43.1503 32.6047 43.7587 30.5695 43.9344 28.4752C44.1102 26.3808 43.8495 24.2728 43.1689 22.2843C42.4882 20.2958 41.4025 18.4701 39.9802 16.9225C38.5578 15.3749 36.8299 14.1391 34.9056 13.2931C32.9812 12.4472 30.9023 12.0095 28.8002 12.0078C26.3001 12.0062 23.8383 12.6218 21.6333 13.7998C19.4283 14.9779 17.5483 16.682 16.1602 18.7608L17.4898 19.6518C18.8493 17.6212 20.7313 15.9945 22.9376 14.9431C25.1439 13.8918 27.593 13.4546 30.0269 13.6776C32.4608 13.9006 34.7895 14.7756 36.768 16.2104C38.7464 17.6452 40.3013 19.5867 41.269 21.8307C42.2367 24.0746 42.5814 26.5378 42.2668 28.9611C41.9522 31.3844 40.9899 33.6781 39.4813 35.6006C37.9726 37.5232 35.9735 39.0035 33.6942 39.8858C31.415 40.768 28.94 41.0196 26.5298 40.6139L26.2674 42.1912Z"
                                                        fill="currentColor"></path>
                                                        <path d="M26.4004 27.2027C26.4004 27.839 26.6533 28.4494 27.1034 28.8994C27.5534 29.3494 28.1639 29.6022 28.8004 29.6022C29.4369 29.6022 30.0474 29.3494 30.4975 28.8994C30.9476 28.4494 31.2004 27.839 31.2004 27.2027C31.1971 27.0889 31.1856 26.9756 31.166 26.8635L39.63 21.479L38.7708 20.1289L30.4188 25.443C30.0774 25.1255 29.6506 24.9148 29.191 24.8368C28.7313 24.7587 28.2589 24.8168 27.8318 25.0038C27.4047 25.1908 27.0417 25.4986 26.7873 25.8893C26.533 26.28 26.3985 26.7365 26.4004 27.2027ZM28.8004 26.4028C28.9586 26.4028 29.1133 26.4497 29.2449 26.5376C29.3764 26.6255 29.479 26.7504 29.5395 26.8966C29.6001 27.0427 29.6159 27.2035 29.585 27.3587C29.5542 27.5138 29.478 27.6564 29.3661 27.7682C29.2542 27.8801 29.1117 27.9563 28.9565 27.9871C28.8013 28.018 28.6404 28.0021 28.4943 27.9416C28.3481 27.8811 28.2231 27.7785 28.1352 27.647C28.0473 27.5155 28.0004 27.3608 28.0004 27.2027C28.0004 26.9905 28.0847 26.7871 28.2347 26.6371C28.3848 26.4871 28.5882 26.4028 28.8004 26.4028Z"
                                                        fill="currentColor"></path>
                                                        <path d="M46.9651 12.5729C47.1151 12.4229 47.1993 12.2195 47.1993 12.0074C47.1993 11.7953 47.1151 11.5919 46.9651 11.4419L44.5651 9.0424C44.4151 8.89245 44.2116 8.80822 43.9995 8.80822C43.7874 8.80822 43.5839 8.89245 43.4339 9.0424L40.4867 11.989C38.0281 10.0943 35.1451 8.82657 32.0867 8.29535C32.788 7.63612 33.2749 6.7813 33.4841 5.8419C33.6932 4.9025 33.6151 3.92192 33.2598 3.02749C32.9044 2.13307 32.2883 1.36611 31.4914 0.826232C30.6946 0.286351 29.7538 -0.00151861 28.7912 6.02496e-06C27.8286 0.00153066 26.8887 0.292379 26.0935 0.834782C25.2984 1.37719 24.6847 2.14608 24.3322 3.04163C23.9797 3.93718 23.9046 4.91801 24.1168 5.85674C24.329 6.79547 24.8185 7.64874 25.5219 8.30575C22.4661 8.84642 19.5851 10.1138 17.1219 12.001L14.1619 9.0416C14.0119 8.89165 13.8084 8.80742 13.5963 8.80742C13.3842 8.80742 13.1807 8.89165 13.0307 9.0416L10.6307 11.4411C10.4807 11.5911 10.3965 11.7945 10.3965 12.0066C10.3965 12.2187 10.4807 12.4221 10.6307 12.5721L13.5755 15.5163C12.7704 16.5548 12.0755 17.6742 11.5019 18.8564L12.9419 19.5538C13.6235 18.1503 14.4907 16.8447 15.5203 15.6722C15.6683 15.5027 15.8227 15.3371 15.9771 15.1723C16.1667 14.9724 16.3539 14.7724 16.5523 14.5797C16.5819 14.5501 16.6147 14.5237 16.6451 14.4949C19.7988 11.4678 23.9692 9.7269 28.3396 9.61313C32.7099 9.49936 36.9653 11.0209 40.2723 13.8798C40.5278 14.1 40.7771 14.3274 41.0203 14.5621C41.1616 14.6996 41.3014 14.8393 41.4395 14.9812C41.6747 15.2243 41.9022 15.4736 42.1219 15.729C44.3238 18.279 45.7467 21.4077 46.2211 24.7429C46.6956 28.0782 46.2017 31.4795 44.7982 34.5421C43.3947 37.6047 41.1407 40.1998 38.3044 42.0184C35.4682 43.8371 32.169 44.8028 28.7995 44.8007C27.5125 44.8007 26.2292 44.6609 24.9723 44.3839L24.6267 45.946C27.4338 46.5674 30.3446 46.5512 33.1446 45.8985C35.9446 45.2459 38.5624 43.9735 40.8053 42.175C43.0481 40.3766 44.8588 38.0979 46.1039 35.507C47.349 32.916 47.9968 30.0788 47.9995 27.2043C48.0027 22.976 46.6023 18.8663 44.0179 15.5195L46.9651 12.5729ZM15.5483 13.3367C15.4139 13.4647 15.2851 13.5983 15.1547 13.7302C14.9723 13.915 14.7787 14.0886 14.6043 14.2805L12.3307 12.0074L13.5995 10.7389L15.8731 13.012C15.7595 13.1152 15.6587 13.2311 15.5483 13.3367ZM29.5995 7.89463V5.6087H30.3995V4.00903H27.1995V5.6087H27.9995V7.89463C27.2454 7.69996 26.5882 7.23699 26.151 6.5925C25.7139 5.94801 25.5269 5.16625 25.625 4.39375C25.7232 3.62126 26.0997 2.91107 26.6841 2.39631C27.2685 1.88154 28.0207 1.59754 28.7995 1.59754C29.5784 1.59754 30.3305 1.88154 30.9149 2.39631C31.4993 2.91107 31.8759 3.62126 31.974 4.39375C32.0721 5.16625 31.8851 5.94801 31.448 6.5925C31.0109 7.23699 30.3536 7.69996 29.5995 7.89463ZM42.7419 14.0278C42.495 13.7665 42.2406 13.5121 41.9787 13.2647C41.8923 13.1847 41.8139 13.092 41.7259 13.012L43.9995 10.7389L45.2683 12.0074L42.9947 14.2805C42.9147 14.1925 42.8243 14.1142 42.7419 14.0278Z"
                                                        fill="currentColor"></path>
                                                        <path d="M29.6 15.207H28V18.407H29.6V15.207Z" fill="currentColor"></path>
                                                        <path d="M29.6 36.0039H28V39.2039H29.6V36.0039Z" fill="currentColor"></path>
                                                        <path d="M23.4932 16.4151L22.1074 17.2148L23.7074 19.9861L25.0932 19.1864L23.4932 16.4151Z" fill="currentColor"></path>
                                                        <path d="M33.8936 34.4229L32.5078 35.2227L34.1078 37.9939L35.4936 37.1942L33.8936 34.4229Z" fill="currentColor"></path>
                                                        <path d="M36.8217 30.9113L36.0215 32.2969L38.7929 33.8967L39.593 32.5112L36.8217 30.9113Z" fill="currentColor"></path>
                                                        <path d="M40.7996 26.4062H37.5996V28.0063H40.7996V26.4062Z" fill="currentColor"></path>
                                                        <path d="M34.1082 16.4125L32.5078 19.1836L33.8935 19.9835L35.4938 17.2124L34.1082 16.4125Z" fill="currentColor"></path>
                                                        <path d="M25.1488 41.754C25.1488 41.5419 25.0644 41.3385 24.9144 41.1885L23.4456 39.72C23.8111 39.046 24.1058 38.336 24.3248 37.6012H26.4C26.6122 37.6012 26.8157 37.517 26.9657 37.367C27.1157 37.217 27.2 37.0135 27.2 36.8014V32.0024C27.2 31.7903 27.1157 31.5868 26.9657 31.4368C26.8157 31.2868 26.6122 31.2026 26.4 31.2026H24.3248C24.1055 30.4678 23.8106 29.7577 23.4448 29.0838L24.9136 27.6153C25.0636 27.4653 25.1478 27.2619 25.1478 27.0498C25.1478 26.8377 25.0636 26.6343 24.9136 26.4843L21.52 23.0898C21.37 22.9399 21.1665 22.8556 20.9544 22.8556C20.7423 22.8556 20.5388 22.9399 20.3888 23.0898L18.92 24.5583C18.2456 24.1928 17.5352 23.8982 16.8 23.6793V21.6045C16.8 21.3924 16.7157 21.189 16.5657 21.039C16.4157 20.889 16.2122 20.8047 16 20.8047H11.2C10.9878 20.8047 10.7843 20.889 10.6343 21.039C10.4843 21.189 10.4 21.3924 10.4 21.6045V23.6793C9.66507 23.8985 8.95487 24.1934 8.2808 24.5591L6.812 23.0906C6.66198 22.9407 6.45853 22.8564 6.2464 22.8564C6.03427 22.8564 5.83082 22.9407 5.6808 23.0906L2.2856 26.4835C2.13562 26.6335 2.05137 26.8369 2.05137 27.049C2.05137 27.2611 2.13562 27.4645 2.2856 27.6145L3.7544 29.083C3.3888 29.7572 3.09416 30.4675 2.8752 31.2026H0.8C0.587827 31.2026 0.384344 31.2868 0.234315 31.4368C0.0842854 31.5868 0 31.7903 0 32.0024V36.8014C0 37.0135 0.0842854 37.217 0.234315 37.367C0.384344 37.517 0.587827 37.6012 0.8 37.6012H2.8752C3.09446 38.336 3.38937 39.0461 3.7552 39.72L2.2856 41.1885C2.13562 41.3385 2.05137 41.5419 2.05137 41.754C2.05137 41.9661 2.13562 42.1695 2.2856 42.3195L5.68 45.7132C5.83002 45.8631 6.03347 45.9474 6.2456 45.9474C6.45773 45.9474 6.66118 45.8631 6.8112 45.7132L8.28 44.2455C8.95436 44.611 9.66483 44.9056 10.4 45.1245V47.1993C10.4 47.4114 10.4843 47.6148 10.6343 47.7648C10.7843 47.9148 10.9878 47.9991 11.2 47.9991H16C16.2122 47.9991 16.4157 47.9148 16.5657 47.7648C16.7157 47.6148 16.8 47.4114 16.8 47.1993V45.1245C17.5349 44.9053 18.2451 44.6104 18.9192 44.2447L20.388 45.7124C20.538 45.8623 20.7415 45.9466 20.9536 45.9466C21.1657 45.9466 21.3692 45.8623 21.5192 45.7124L24.9144 42.3203C24.9888 42.2459 25.0478 42.1576 25.088 42.0605C25.1282 41.9633 25.1489 41.8591 25.1488 41.754ZM20.9536 44.0167L19.6168 42.6802C19.4894 42.5527 19.3227 42.472 19.1436 42.4511C18.9646 42.4302 18.7838 42.4703 18.6304 42.565C17.7607 43.1022 16.8105 43.4964 15.816 43.7328C15.6407 43.7742 15.4845 43.8736 15.3727 44.0148C15.2609 44.1561 15.2 44.3309 15.2 44.511V46.3994H12V44.511C12 44.3309 11.9391 44.1561 11.8273 44.0148C11.7155 43.8736 11.5593 43.7742 11.384 43.7328C10.3895 43.4964 9.43928 43.1022 8.5696 42.565C8.41625 42.4703 8.2354 42.4302 8.05636 42.4511C7.87732 42.472 7.7106 42.5527 7.5832 42.6802L6.2464 44.0167L3.9832 41.754L5.32 40.4175C5.44752 40.2901 5.52828 40.1234 5.54919 39.9444C5.5701 39.7654 5.52993 39.5846 5.4352 39.4313C4.89795 38.5618 4.50361 37.6118 4.2672 36.6174C4.22576 36.4422 4.12636 36.286 3.98509 36.1742C3.84382 36.0624 3.66895 36.0016 3.4888 36.0016H1.6V32.8022H3.4888C3.66895 32.8022 3.84382 32.7414 3.98509 32.6296C4.12636 32.5178 4.22576 32.3616 4.2672 32.1864C4.50361 31.192 4.89795 30.242 5.4352 29.3725C5.52993 29.2192 5.5701 29.0384 5.54919 28.8594C5.52828 28.6804 5.44752 28.5137 5.32 28.3863L3.9832 27.0498L6.2464 24.7871L7.5832 26.1236C7.7106 26.2511 7.87732 26.3318 8.05636 26.3527C8.2354 26.3736 8.41625 26.3335 8.5696 26.2388C9.43928 25.7016 10.3895 25.3074 11.384 25.071C11.5593 25.0296 11.7155 24.9302 11.8273 24.789C11.9391 24.6477 12 24.4729 12 24.2928V22.4044H15.2V24.2928C15.2 24.4729 15.2609 24.6477 15.3727 24.789C15.4845 24.9302 15.6407 25.0296 15.816 25.071C16.8105 25.3074 17.7607 25.7016 18.6304 26.2388C18.7838 26.3335 18.9646 26.3736 19.1436 26.3527C19.3227 26.3318 19.4894 26.2511 19.6168 26.1236L20.9536 24.7871L23.2168 27.0498L21.88 28.3863C21.7525 28.5137 21.6717 28.6804 21.6508 28.8594C21.6299 29.0384 21.6701 29.2192 21.7648 29.3725C22.302 30.242 22.6964 31.192 22.9328 32.1864C22.9742 32.3616 23.0736 32.5178 23.2149 32.6296C23.3562 32.7414 23.531 32.8022 23.7112 32.8022H25.6V36.0016H23.7112C23.531 36.0016 23.3562 36.0624 23.2149 36.1742C23.0736 36.286 22.9742 36.4422 22.9328 36.6174C22.6964 37.6118 22.302 38.5618 21.7648 39.4313C21.6701 39.5846 21.6299 39.7654 21.6508 39.9444C21.6717 40.1234 21.7525 40.2901 21.88 40.4175L23.2168 41.754L20.9536 44.0167Z"
                                                        fill="currentColor"></path>
                                                        <path d="M13.5984 27.2031C12.1744 27.2031 10.7824 27.6253 9.59833 28.4163C8.4143 29.2073 7.49146 30.3315 6.94651 31.6469C6.40156 32.9623 6.25897 34.4096 6.53679 35.806C6.8146 37.2024 7.50033 38.485 8.50727 39.4918C9.51421 40.4985 10.7971 41.1841 12.1938 41.4619C13.5905 41.7396 15.0381 41.5971 16.3538 41.0522C17.6694 40.5074 18.7939 39.5847 19.585 38.4009C20.3762 37.2171 20.7984 35.8254 20.7984 34.4016C20.7963 32.4931 20.0371 30.6634 18.6873 29.3139C17.3375 27.9643 15.5073 27.2052 13.5984 27.2031ZM13.5984 40.0005C12.4909 40.0005 11.4082 39.6721 10.4872 39.0569C9.56633 38.4417 8.84857 37.5673 8.42472 36.5442C8.00086 35.5212 7.88997 34.3954 8.10604 33.3094C8.32212 32.2233 8.85547 31.2257 9.63864 30.4427C10.4218 29.6596 11.4196 29.1264 12.5059 28.9104C13.5922 28.6943 14.7182 28.8052 15.7415 29.229C16.7647 29.6527 17.6393 30.3704 18.2547 31.2911C18.87 32.2118 19.1984 33.2943 19.1984 34.4016C19.1965 35.886 18.6059 37.309 17.5561 38.3585C16.5063 39.4081 15.0831 39.9986 13.5984 40.0005Z"
                                                        fill="currentColor"></path>
                                                        <path d="M13.6004 31.2031C12.9675 31.2031 12.3488 31.3908 11.8226 31.7423C11.2963 32.0939 10.8862 32.5935 10.644 33.1781C10.4018 33.7627 10.3384 34.406 10.4619 35.0266C10.5854 35.6472 10.8901 36.2173 11.3377 36.6647C11.7852 37.1122 12.3554 37.4169 12.9761 37.5403C13.5968 37.6638 14.2403 37.6004 14.825 37.3583C15.4097 37.1161 15.9095 36.7061 16.2611 36.1799C16.6127 35.6538 16.8004 35.0352 16.8004 34.4025C16.8004 33.5539 16.4633 32.7402 15.8631 32.1402C15.263 31.5402 14.4491 31.2031 13.6004 31.2031ZM13.6004 36.0021C13.2839 36.0021 12.9746 35.9083 12.7115 35.7325C12.4484 35.5568 12.2433 35.3069 12.1222 35.0146C12.0011 34.7223 11.9694 34.4007 12.0311 34.0904C12.0929 33.7801 12.2453 33.495 12.469 33.2713C12.6928 33.0476 12.9779 32.8953 13.2882 32.8335C13.5986 32.7718 13.9203 32.8035 14.2127 32.9246C14.505 33.0456 14.7549 33.2507 14.9307 33.5137C15.1066 33.7768 15.2004 34.0861 15.2004 34.4025C15.2004 34.8267 15.0318 35.2336 14.7318 35.5336C14.4317 35.8336 14.0247 36.0021 13.6004 36.0021Z"
                                                        fill="currentColor"></path>
                                                    </g>
                                                </svg>
                                                <!-- <i class="fa-solid fa-sack-dollar"></i> -->
                                                <h4>No cost until you hire</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="risk-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 20 20">
                                                    <path fill="#000000" d="M18.5 18h-17c-0.827 0-1.5-0.673-1.5-1.5v-13c0-0.827 0.673-1.5 1.5-1.5h17c0.827 0 1.5 0.673 1.5 1.5v13c0 0.827-0.673 1.5-1.5 1.5zM1.5 3c-0.276 0-0.5 0.224-0.5 0.5v13c0 0.276 0.224 0.5 0.5 0.5h17c0.276 0 0.5-0.224 0.5-0.5v-13c0-0.276-0.224-0.5-0.5-0.5h-17z"
                                                    />
                                                    <path fill="#000000" d="M9.5 6h-6c-0.276 0-0.5-0.224-0.5-0.5s0.224-0.5 0.5-0.5h6c0.276 0 0.5 0.224 0.5 0.5s-0.224 0.5-0.5 0.5z" />
                                                    <path fill="#000000" d="M9.5 9h-6c-0.276 0-0.5-0.224-0.5-0.5s0.224-0.5 0.5-0.5h6c0.276 0 0.5 0.224 0.5 0.5s-0.224 0.5-0.5 0.5z" />
                                                    <path fill="#000000" d="M9.5 11h-6c-0.276 0-0.5-0.224-0.5-0.5s0.224-0.5 0.5-0.5h6c0.276 0 0.5 0.224 0.5 0.5s-0.224 0.5-0.5 0.5z" />
                                                    <path fill="#000000" d="M9.5 13h-6c-0.276 0-0.5-0.224-0.5-0.5s0.224-0.5 0.5-0.5h6c0.276 0 0.5 0.224 0.5 0.5s-0.224 0.5-0.5 0.5z" />
                                                    <path fill="#000000" d="M8.5 15h-5c-0.276 0-0.5-0.224-0.5-0.5s0.224-0.5 0.5-0.5h5c0.276 0 0.5 0.224 0.5 0.5s-0.224 0.5-0.5 0.5z" />
                                                    <path fill="#000000" d="M17.943 6.544l-0.813-0.591-0.311-0.956h-1.005l-0.813-0.591-0.813 0.591h-1.005l-0.311 0.956-0.813 0.591 0.311 0.956-0.311 0.956 0.813 0.591 0.132 0.406c-0.002 0.016-0.002 0.031-0.002 0.047v5c0 0.202 0.122 0.385 0.309 0.462s0.402 0.035 0.545-0.108l1.146-1.146 1.146 1.146c0.096 0.096 0.223 0.147 0.354 0.146 0.064 0 0.129-0.012 0.191-0.038 0.187-0.077 0.309-0.26 0.309-0.462v-5c0-0.016-0.001-0.032-0.002-0.047l0.132-0.406 0.813-0.591-0.311-0.956 0.311-0.956zM13.233 6.926l0.488-0.355 0.187-0.574h0.604l0.488-0.355 0.488 0.355h0.604l0.187 0.574 0.488 0.355-0.187 0.574 0.187 0.574-0.488 0.355-0.187 0.574h-0.604l-0.488 0.355-0.488-0.355h-0.604l-0.187-0.574-0.488-0.355 0.187-0.574-0.187-0.574zM15.354 12.646c-0.195-0.195-0.512-0.195-0.707 0l-0.646 0.646v-3.29h0.187l0.813 0.591 0.813-0.591h0.187v3.29l-0.646-0.646z"
                                                    />
                                                </svg>
                                                <!-- <i class="fa-solid fa-user-shield"></i> -->
                                                <h4>Safe and secure</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="risk-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                                    <g fill="none" class="nc-icon-wrapper">
                                                        <path d="M7.99971 45.6264V47.2C7.99971 47.6416 8.35732 48 8.79972 48H21.6C22.0424 48 22.4 47.6416 22.4 47.2V41.5999H25.6V47.2C25.6 47.6416 25.9576 48 26.4 48H39.2003C39.6427 48 40.0003 47.6416 40.0003 47.2V45.6264C40.0003 39.4471 41.8651 33.1157 45.394 27.3181C47.2244 24.31 48.1212 20.8467 47.9868 17.3011C47.6404 8.15133 40.2139 0.564801 31.0809 0.0311919C28.6289 -0.110411 26.2352 0.232795 24.0032 1.02001C21.7728 0.231995 19.3783 -0.110411 16.9199 0.0311919C7.78611 0.564801 0.359571 8.15133 0.013165 17.3019C-0.121237 20.8467 0.775579 24.31 2.60601 27.3181C6.13488 33.1166 7.99971 39.4471 7.99971 45.6264ZM21.6 39.9999H15.9999V30.3997C15.9999 29.9581 15.6422 29.5997 15.1998 29.5997H9.88774L12.3878 21.5996H23.6688L21.8344 23.434L22.9656 24.5652L26.1656 21.3652C26.4784 21.0523 26.4784 20.5467 26.1656 20.2339L22.9656 17.0339L21.8344 18.1651L23.6688 19.9995H12.8878L13.4998 18.0411C13.5734 17.9227 13.6158 17.7851 13.6182 17.6395C13.6742 15.0634 14.3318 12.6082 15.4894 10.3994H19.9999V8.79934H16.4455C17.1463 7.77052 17.9567 6.80491 18.8975 5.93689C20.4111 4.54007 22.1432 3.47925 24.0008 2.74804C25.8584 3.47925 27.5889 4.54007 29.1025 5.93689C30.0433 6.80491 30.8529 7.77052 31.5545 8.79934H24.332L26.1664 6.96491L25.0352 5.83369L21.8352 9.03374C21.5224 9.34655 21.5224 9.85216 21.8352 10.165L25.0352 13.365L26.1664 12.2338L24.3312 10.3994H32.5106C33.6682 12.6082 34.3258 15.0634 34.3818 17.6395C34.385 17.7851 34.4274 17.9227 34.5002 18.0411L35.1122 19.9995H28.8001V21.5996H35.6122L38.1123 29.5997H32.8002C32.3577 29.5997 32.0001 29.9581 32.0001 30.3997V39.9999H26.4H21.6ZM11.1998 19.9995C8.55252 19.9995 6.39968 17.8467 6.39968 15.1994C6.39968 12.5522 8.55252 10.3994 11.1998 10.3994H13.687C12.6782 12.5666 12.1054 14.933 12.0238 17.3987L11.2118 19.9995H11.1998ZM36.7882 19.9995L35.9754 17.3987C35.8938 14.933 35.321 12.5666 34.3122 10.3994H36.8002C39.4475 10.3994 41.6003 12.5522 41.6003 15.1994C41.6003 17.8467 39.4475 19.9995 36.8002 19.9995H36.7882ZM30.9865 1.62882C39.3067 2.11523 46.0716 9.02654 46.3884 17.3627C46.51 20.5931 45.694 23.7476 44.0268 26.4868C40.3459 32.5349 38.4003 39.1535 38.4003 45.6264V46.4H27.2001V41.5999H32.8002C33.2426 41.5999 33.6002 41.2415 33.6002 40.7999V31.1997H39.2003C39.4547 31.1997 39.6939 31.0789 39.8451 30.8733C39.9963 30.6677 40.0403 30.4037 39.9635 30.1605L37.281 21.5756C40.5851 21.3276 43.2003 18.5659 43.2003 15.1994C43.2003 11.6706 40.3291 8.79934 36.8002 8.79934H33.4634C32.5834 7.32411 31.4897 5.96249 30.1873 4.76087C29.0001 3.66565 27.6961 2.75284 26.3064 2.02643C27.8185 1.67922 29.3889 1.53522 30.9865 1.62882ZM1.61159 17.3627C1.9276 9.02574 8.69252 2.11523 17.0135 1.62882C18.6135 1.53602 20.1847 1.68002 21.696 2.02723C20.3047 2.75444 18.9991 3.66645 17.8127 4.76167C16.5103 5.96329 15.4166 7.32491 14.5366 8.80014H11.1998C7.6709 8.80014 4.79965 11.6714 4.79965 15.2002C4.79965 18.5667 7.4149 21.3284 10.719 21.5764L8.03651 30.1621C7.95971 30.4053 8.00451 30.6693 8.15491 30.8749C8.30532 31.0805 8.54532 31.1997 8.79972 31.1997H14.3998V40.7999C14.3998 41.2415 14.7574 41.5999 15.1998 41.5999H20.7999V46.4H9.59974V45.6264C9.59974 39.1535 7.6541 32.5349 3.97324 26.486C2.30601 23.7476 1.48919 20.5923 1.61159 17.3627Z"
                                                        fill="currentColor"></path>
                                                        <path d="M24.7992 28H23.1992V29.6H24.7992V28Z" fill="currentColor"></path>
                                                        <path d="M24.7992 31.1992H23.1992V32.7992H24.7992V31.1992Z" fill="currentColor"></path>
                                                        <path d="M28.0004 31.1992H26.4004V32.7992H28.0004V31.1992Z" fill="currentColor"></path>
                                                        <path d="M21.6 31.1992H20V32.7992H21.6V31.1992Z" fill="currentColor"></path>
                                                    </g>
                                                </svg>
                                                <!-- <i class="fa-solid fa-sack-dollar"></i> -->
                                                <h4>Discover</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div id="fixed-booking" class="shadow-sm fixed-bottom">
                <div class="f-booking text-center ">
                    <img src="<?php echo $profile_img_link; ?>" alt="">
                    <div class="f-content">
                        <h5><?php echo $coach_name; ?></h5>
                    </div>
                </div>
                <div class="custom-button mt-3">
                    <button type="button" class="btn btn-round btn-outliner">Have any questions?</button>
                    <button type="button" class="btn btn-round btn-fill" data-toggle="modal" data-target="#session_book_modal">Book Now
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>
                </div>
            </div>
    <?php
    } else {
            // Handle case when coach is not found
            wp_die('Coach not found');
        }
    }
    ?>
    </div>

       
<?php
require locate_template('layouts/footer.php') ;
?>

<!-- The Session Modal -->
  <div class="modal" id="session_book_modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">BOOK A SESSION</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                <?php 
                $current_user = wp_get_current_user();
                if (!in_array('athlete', $current_user->roles) || !is_user_logged_in()) {
                    echo '<div class="col-md-12"><p class="text-danger">Only registered athletes can book a session of coach !</p></div>';
                }
                else if(!empty(get_user_meta($user->ID, "_session_quantity", true)) && !empty(get_user_meta($user->ID, "_session_price", true))){ ?>
                <div class="col-md-12">
                    <div class="form-group">
                        <b class="text-success">NOTE: <?php echo get_user_meta($user->ID, "_session_quantity", true); ?> peoples can join a session, and the per-session rate is $<?php echo get_user_meta($user->ID, "_session_price", true); ?>.</b>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Select Date & Time</label>
                        <input type="text" class="form-control" id="datetimepicker" readonly />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="button" class="btn btn-warning btn-block" id="session_book_btn" onclick="book_session();">BOOK NOW <div class="spinner-border" style="display: none;" id="spinner1"></div></button>
                    </div>
                </div>
                <?php }
                else{ ?>
                  <div class="col-md-12">
                    <div class="form-group">
                      <b class="text-danger text-center">Booking is not available because the coach has not set their per-session rate.</b>
                    </div>
                  </div>
                <?php } ?>
            </div>
        </div>
        
      </div>
    </div>
  </div>
<!-- The Session Modal -->

<!-- The add-review Modal -->
  <div class="modal" id="add_review_modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ADD REVIEW</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="" method="POST">
                <div class="row">
                    <?php 
                    if (!in_array('athlete', $current_user->roles) || !is_user_logged_in()) {
                        echo '<div class="col-md-12"><p class="text-danger">Only registered athletes can add review for coach !</p></div>';
                    }
                    else{ ?>
                        <div class="col-md-12 for-group">
                            <label>Rating<b class="text-danger">*</b></label>
                            <select class="form-control" name="rating" required>
                                <option value="">Select rating number</option>
                                <?php
                                for($i=0; $i<=5; $i++){
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                ?>
                            </select><br>
                        </div>

                        <div class="col-md-12 for-group">
                            <label>Message<b class="text-danger">*</b></label>
                            <textarea class="form-control" name="message" required></textarea><br>
                        </div>

                        <div class="col-md-12 for-group">
                            <button type="submit" class="btn btn-warning" name="add_review">Submit</button>
                        </div>
                    <?php } ?>
                </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>
<!-- The add-review Modal -->

<style>
    .gj-icon{
        position: static !important;
    }
</style>

<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>

<script>
function book_session(){
    var datetime = $("#datetimepicker").val();
    if(datetime==""){
        Swal.fire({ title: "Please select date and time !", text: '', icon: "error"});
        return false;
    }
    else{
      $("#spinner1").show();
      $("#session_book_btn").attr("disabled",true);
      jQuery.ajax({
         url: "/wp-admin/admin-ajax.php",
         type: 'POST',
         dataType: "json",
         data: {action: "book_session_action", datetime: datetime, coach_id: "<?php echo $user->ID; ?>"},
         success: function(response) {
            if(response.status===1){
                window.location.href = "<?php echo wc_get_checkout_url(); ?>"; 
                Swal.fire({
                    title: 'Please Wait..',
                    text: 'Redirecting you for payment process',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
            }else{
                $("#spinner1").hide();
                $("#session_book_btn").attr("disabled",false);
                Swal.fire({title: 'Something is wrong !', text: 'Try again later', icon: 'error' });
            }
         }
      });
    }
}

$('#datetimepicker').datetimepicker({
    uiLibrary: 'bootstrap5',
    modal: true,
    footer: true,
    format: 'mm/dd/yyyy hh:MM TT'
}).on('change', function (e) {
    const selectedDate = new Date(e.target.value);
    const today = new Date();

    if (selectedDate < today) {
        $(this).val(''); 
        Swal.fire({ title: "Please select a future date!", text: '', icon: "warning"});
    }
});


    $(document).ready(function() {
        $("#location-slider").owlCarousel({
            items: 5,
            itemsDesktop: [1000, 5],
            itemsDesktopSmall: [979, 2],
            itemsTablet: [768, 2],
            margin: 20,
            pagination: false,
            navigation: true,
            autowidth: true,
            navigationText: [
                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>'
            ],
            autoPlay: true
        });
        $("#profile-gallery").owlCarousel({
            items: 4,
            itemsDesktop: [1000, 4],
            itemsDesktopSmall: [979, 2],
            itemsTablet: [768, 2],
            margin: 20,
            pagination: false,
            navigation: true,
            autowidth: true,
            navigationText: [
                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>'
            ],
            autoPlay: true
        });
        $(".summer-camp-carousel").owlCarousel({
            items: 3,
            itemsDesktop: [1000, 3],
            itemsDesktopSmall: [979, 2],
            itemsTablet: [768, 2],
            margin: 20,
            pagination: false,
            navigation: true,
            autowidth: true,
            navigationText: [
                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>'
            ],
            autoPlay: false
        });
        $(".review-main-carousel").owlCarousel({
            items: 2,
            itemsDesktop: [1000, 2],
            itemsDesktopSmall: [979, 2],
            itemsTablet: [768, 2],
            margin: 20,
            pagination: false,
            navigation: false,
            autowidth: true,
            navigationText: [
                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>'
            ],
            autoPlay: true
        });
    });
    
    const videos = document.querySelectorAll(".video-intro");
    videos.forEach(video => {
        video.addEventListener("mouseover", function() {
            this.play();
        });
        video.addEventListener("mouseout", function() {
            this.pause();
        });
        video.addEventListener("touchstart", function() {
            this.play();
        });
        video.addEventListener("touchend", function() {
            this.pause();
        });
    });

    // on scrolled booking sticky
    $(document).ready(function() {
        $(window).scroll(function() {
            // Check if the window is at the top
            if ($(window).scrollTop() == 0) {
                $('#fixed-booking').removeClass('scrolled-top');

            } else {
                $('#fixed-booking').addClass('scrolled-top');
            }
        });
    });

    $(document).ready(function() {
    var year = new Date().getFullYear() - 18; 
    var defaultDate = new Date(year, 0, 1);
    
    $('#datepicker').datepicker({
      dateFormat: 'dd-mm-yy',
      changeYear: true,               
      yearRange: '1900:' + (new Date().getFullYear() - 18), 
      defaultDate: defaultDate  
   });
}); 
</script>