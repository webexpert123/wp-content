<?php
/* Template Name: Home */

require locate_template('layouts/header.php') ;
$current_page_id = get_queried_object_id();


$top_main_video_section = get_field('top_main_video_section');
$client_logos = get_field('client_logos');
$star_of_the_month = get_field('star_of_the_month');
$team_coaches = get_field('team_coaches');
$why_ptp = get_field('why_ptp');
$student_stories = get_field('student_stories');
$insta_feeds = get_field('insta_feeds');
$case_study_section = get_field('case_study_section');
?>
        <div id="frontend-main">
            <!-- /Hero Section start-->
            <div class="hero-wrapper">
                <section id="hero" class="hero section light-background">
                    <div class="fluid-container">
                        <div class="bloc-video">
                            <div class="video-overlay"></div>
                            <video autoplay muted loop>
                                <source src="<?php echo site_url('wp-content/uploads/2024/12/home_video.mov'); ?>" type="video/mp4">
                            </video>
                            <div class="content-video">
                                <div class="hero-filter text-center">
                                    <div class="hero-rating d-flex justify-content-center">
                                        <ul>
                                            <li>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="136" height="25"
                                                    viewBox="0 0 136 25" fill="none">
                                                    <mask id="mask0_48_281" style="mask-type:luminance"
                                                        maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="25">
                                                        <path d="M24 0.5H0V24.5H24V0.5Z" fill="white" />
                                                    </mask>
                                                    <g mask="url(#mask0_48_281)">
                                                        <path
                                                            d="M12 17.77L18.18 21.5L16.54 14.47L22 9.74L14.81 9.13L12 2.5L9.19 9.13L2 9.74L7.46 14.47L5.82 21.5L12 17.77Z"
                                                            fill="#2E813A" />
                                                    </g>
                                                    <mask id="mask1_48_281" style="mask-type:luminance"
                                                        maskUnits="userSpaceOnUse" x="27" y="0" width="25" height="24">
                                                        <path d="M51.5801 0H27.5801V24H51.5801V0Z" fill="white" />
                                                    </mask>
                                                    <g mask="url(#mask1_48_281)">
                                                        <path
                                                            d="M39.5801 17.27L45.7601 21L44.1201 13.97L49.5801 9.24L42.3901 8.63L39.5801 2L36.7701 8.63L29.5801 9.24L35.0401 13.97L33.4001 21L39.5801 17.27Z"
                                                            fill="#2E813A" />
                                                    </g>
                                                    <mask id="mask2_48_281" style="mask-type:luminance"
                                                        maskUnits="userSpaceOnUse" x="55" y="0" width="25" height="24">
                                                        <path d="M79.5801 0H55.5801V24H79.5801V0Z" fill="white" />
                                                    </mask>
                                                    <g mask="url(#mask2_48_281)">
                                                        <path
                                                            d="M67.5801 17.27L73.7601 21L72.1201 13.97L77.5801 9.24L70.3901 8.63L67.5801 2L64.7701 8.63L57.5801 9.24L63.0401 13.97L61.4001 21L67.5801 17.27Z"
                                                            fill="#2E813A" />
                                                    </g>
                                                    <mask id="mask3_48_281" style="mask-type:luminance"
                                                        maskUnits="userSpaceOnUse" x="83" y="0" width="25" height="24">
                                                        <path d="M107.58 0H83.5801V24H107.58V0Z" fill="white" />
                                                    </mask>
                                                    <g mask="url(#mask3_48_281)">
                                                        <path
                                                            d="M95.5801 17.27L101.76 21L100.12 13.97L105.58 9.24L98.3901 8.63L95.5801 2L92.7701 8.63L85.5801 9.24L91.0401 13.97L89.4001 21L95.5801 17.27Z"
                                                            fill="#2E813A" />
                                                    </g>
                                                    <mask id="mask4_48_281" style="mask-type:luminance"
                                                        maskUnits="userSpaceOnUse" x="111" y="0" width="25" height="24">
                                                        <path d="M135.58 0H111.58V24H135.58V0Z" fill="white" />
                                                    </mask>
                                                    <g mask="url(#mask4_48_281)">
                                                        <path
                                                            d="M123.58 17.27L129.76 21L128.12 13.97L133.58 9.24L126.39 8.63L123.58 2L120.77 8.63L113.58 9.24L119.04 13.97L117.4 21L123.58 17.27Z"
                                                            fill="#2E813A" />
                                                    </g>
                                                </svg>
                                            </li>
                                            <li><span><?php echo $top_main_video_section["rating_text"]; ?></span></li>
                                        </ul>
                                    </div>
                                    <h1><?php echo $top_main_video_section["heading"]; ?></h1>
                                    <p><?php echo $top_main_video_section["description"]; ?></p>
                                    <form action="<?php echo site_url('coach-list'); ?>" method="GET">
                                    <div class="filter-form">
                                        <div class="input-group">
                                            <select name="sport" type="text" class="form-control" placeholder="What Sport" aria-label="" aria-describedby="basic-addon1" style="min-height: 56px;">
                                                <option value="">What Sport</option>
                                                <?php
                                                global $wpdb; 
                                                $table = $wpdb->prefix.'sports';
                                                $results = $wpdb->get_results("SELECT * FROM  $table ORDER BY sport_name ASC");
                                                foreach ($results as $row) { ?>
                                                  <option value="<?php echo $row->sportID; ?>"><?php echo $row->sport_name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="input-group-append">
                                              <button class="btn btn-success" type="submit"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 20 20">
                                                <path fill="#000000" d="M18.869 19.162l-5.943-6.484c1.339-1.401 2.075-3.233 2.075-5.178 0-2.003-0.78-3.887-2.197-5.303s-3.3-2.197-5.303-2.197-3.887 0.78-5.303 2.197-2.197 3.3-2.197 5.303 0.78 3.887 2.197 5.303 3.3 2.197 5.303 2.197c1.726 0 3.362-0.579 4.688-1.645l5.943 6.483c0.099 0.108 0.233 0.162 0.369 0.162 0.121 0 0.242-0.043 0.338-0.131 0.204-0.187 0.217-0.503 0.031-0.706zM1 7.5c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5-2.916 6.5-6.5 6.5-6.5-2.916-6.5-6.5z"/>
                                                </svg></button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                          </div>
                    </div>
                </section>
            </div>
            <!-- /Hero Section End-->
             <!-- /client Section start-->
             <section id="client-logos">
                <div class="container">
                    <!-- <div class="section-title">
                        <h3>Our Trusted Partners</h3>
                    </div> -->
                    <div class="row">
                        <div class="col-md-2"><img src="<?php echo $client_logos["logo_1"]; ?>" alt="" /></div>
                        <div class="col-md-2"><img src="<?php echo $client_logos["logo_2"]; ?>" alt="" /></div>
                        <div class="col-md-2"><img src="<?php echo $client_logos["logo_3"]; ?>" alt="" /></div>
                        <div class="col-md-2"><img src="<?php echo $client_logos["logo_4"]; ?>" alt="" /></div>
                        <div class="col-md-2"><img src="<?php echo $client_logos["logo_5"]; ?>" alt="" /></div>
                        <div class="col-md-2"><img src="<?php echo $client_logos["logo_6"]; ?>" alt="" /></div>
                    </div>
                </div>
             </section>
            <!-- Client Section End-->
             <!-- About section Start -->
             <section id="about-block" class="section-spacing">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-lg-3">
                            <div class="about-image">
                                <div class="about-box-image">
                                    <img class="img-fluid" src="<?php echo $star_of_the_month["star_image"]; ?>" alt="" />
                                </div>
                                <div class="star_box">
                                    <div class="star_icon">
                                        <i class="fa-solid fa-trophy"></i>
                                    </div>
                                    <div class="star_content text-center">
                                        <h5><?php echo $star_of_the_month["image_text"]; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-9 about-content">
                            <div class="about-inner">
                                <div class="sub-title"><?php echo $star_of_the_month["badge_text"]; ?></div>
                                <h2><?php echo $star_of_the_month["heading"]; ?></h2>
                                <div class="quote-text">
                                    <?php echo $star_of_the_month["description"]; ?>
                                </div>
                                <div class="d-flex align-items-center star-bt mt-3">
                                    <img src="<?php echo $star_of_the_month["star_image"]; ?>" alt="Start of the Month" >
                                    <div class="star-info"><p><?php echo $star_of_the_month["star_name"]; ?> <br><span>(<?php echo $star_of_the_month["star_role"]; ?>)</span></p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </section>
              <!-- Feature Coaches section Start -->
             <section id="team-coaches" class="section-spacing bg-white">
                <div class="container">
                    <div class="section-title mb-5 text-center">
                        <h2><?php echo $team_coaches["heading"]; ?></h2>
                        <p><?php echo $team_coaches["description"]; ?></p>
                    </div>
                    <div class="coaches-image pt-5">
                        <img class="img-fluid" src="<?php echo $team_coaches["image"]; ?>" alt="feature image">
                    </div>
                </div>
             </section>
             <!-- Feature Coaches section Start -->
             <section id="team-coaches" class="why_ptp_area section-spacing pb-0">
                <div class="container">
                    <div class="section-title mb-5 text-start d-flex justify-content-between align-items-center">
                        <div class="">
                            <h2><?php echo $why_ptp["heading"]; ?></h2>
                            <p><?php echo $why_ptp["description"]; ?></p>
                        </div>
                        <div class="custom-button">
                            <button type="button" class="btn btn-round btn-fill" onclick="window.location.href='<?php echo $why_ptp["button_link"]; ?>';"><?php echo $why_ptp["button_text"]; ?></button>
                        </div>
                    </div>
                    <div class="coaches-image pt-5">
                        <img class="img-fluid" src="<?php echo $why_ptp["image"]; ?>" alt="feature image">
                        <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/step_arrow.svg" alt="step arrow"></span>
                    </div>
                </div>
             </section>
             <!-- About section End --> 
               <!-- Why PTP Section Start-->
             <!-- <section id="why-section" class="section-spacing" data-aos="fade-right" data-aos-duration="1500">
                <div class="container">
                    <div class="section-title mb-5">
                        <h2>Why everyone loves <span>PTP?</span> </h2>
                        <p>Is expertly designed to offer flexible approaches to:</p>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-12">
                           <div class="why-block-grid row">
                            
                                <div class="col-md-4 mb-4">
                                   <div class="box-item">
                                        <div class="box-header mb-4">
                                            <div class="box-icon">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/plan_ic.svg">
                                            </div>
                                            <h4>Plans</h4>
                                        </div>
                                        <p>Choose from personalized coaching plans designed to meet your goals, whether you're looking to improve your performance, recover from injury, or reach new milestones.</p>
                                   </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="box-item">
                                         <div class="box-header mb-4">
                                             <div class="box-icon">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mentoring_ic.svg">                                                 
                                             </div>
                                             <h4>Mentoring</h4>
                                         </div>
                                         <p>Unlock your full potential with one-on-one mentoring. Receive guidance, motivation, and expert advice tailored to your unique journey, and achieve lasting success.</p>
                                    </div>
                                 </div>
                                 
                                <div class="col-md-4">
                                    <div class="box-item">
                                         <div class="box-header mb-4">
                                             <div class="box-icon">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/trainer_ic.svg">
                                             </div>
                                             <h4>Top Trainers</h4>
                                         </div>
                                         <p>Work with experienced and dedicated trainers who are committed to helping you reach your goals. Our top trainers provide expert guidance.</p>
                                    </div>
                                 </div>
                           </div>
                        </div>
                    </div>
                </div>
             </section> -->
             <!-- Why PTP Section End-->
              <section id="offer-area" class="section-spacing mt-3 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="d-flex multi-video">
                                <div class="story-videos full">
                                    <div class="section-title mb-2">
                                        <div class="sub-heading"><?php echo $student_stories["sub_heading"]; ?></div>
                                        <h2 class="w-100"><?php echo $student_stories["heading"]; ?></h2>
                                    </div>
                                   <div class="video-contents">
                                    <p><?php echo $student_stories["description"]; ?></p>
                                    <div class="custom-button mt-4">
                                        <button type="button" class="btn btn-round btn-fill"  onclick="window.location.href='<?php echo $student_stories["button_link"]; ?>';" ><?php echo $student_stories["button_text"]; ?></button>
                                    </div>
                                   </div>
                                </div>
                                <div class="story-videos full-video">
                                    <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-image/Project-2_59-1-1024x576.jpg" alt=" video thumb 02">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/play_button.svg" alt="play button"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="d-flex multi-video">
                                <div class="story-videos first">
                                    <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/video_thumb-01.jpg" alt=" video thumb 01">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/play_button.svg" alt="play button"></a>
                                </div>
                                <div class="story-videos second">
                                    <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/video_thumb-02.jpg" alt=" video thumb 02">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/play_button.svg" alt="play button"></a>
                                </div>
                                <div class="story-videos first">
                                    <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about/about-one.jpg" alt=" video thumb 01">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/play_button.svg" alt="play button"></a>
                                </div>
                                <div class="story-videos second">
                                    <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about/about-two.jpg" alt=" video thumb 02">
                                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/play_button.svg" alt="play button"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </section>
              <!-- Why Choose Section End-->
              <section id="feed_block" class="section-spacing p-0" data-aos="fade-in" data-aos-duration="1500">
                <div class="">
                    
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="section-title row mb-4 align-items-center pr-5 pl-5">
                                <div class="sub-heading"><?php echo $insta_feeds["subheading"]; ?></div>
                                <h2 class="w-100"><?php echo $insta_feeds["heading"]; ?></h2>
                                <p><?php echo $insta_feeds["description"]; ?></p>
                                <div class="custom-button mt-4">
                                    <button type="button" class="btn btn-round btn-fill"  onclick="window.location.href='<?php echo $insta_feeds["button_link"]; ?>';" ><?php echo $insta_feeds["button_text"]; ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 pr-0">
                            <div class="collarge">
                                <div class="grid-column">
                                    <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/risk_image.png">
                                    <div class="feed_content">
                                        <div class="top-content">
                                            <i class="fa-brands fa-instagram"></i>
                                        </div>
                                        <div class="bottom-content">
                                            <div class="feed_user d-flex align-items-center gap-2">
                                                <div>
                                                    <p>#ptptraining</p>
                                                    <span>@Playerstrainingplayers</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column">
                                    <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/reward_bg.jpg">
                                    <div class="feed_content">
                                        <div class="top-content">
                                            <i class="fa-brands fa-instagram"></i>
                                        </div>
                                        <div class="bottom-content">
                                            <div class="feed_user d-flex align-items-center gap-2">
                                                <div>
                                                    <p>#ptptraining</p>
                                                    <span>@Playerstrainingplayers</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column">
                                    <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-image/facebook-feed.jpg">
                                    <div class="feed_content">
                                        <div class="top-content">
                                            <i class="fa-brands fa-instagram"></i>
                                        </div>
                                        <div class="bottom-content">
                                            <div class="feed_user d-flex align-items-center gap-2">
                                                <div>
                                                    <p>#ptptraining</p>
                                                    <span>@Playerstrainingplayers</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column">
                                    <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-image/blog-4.jpg">
                                    <div class="feed_content">
                                        <div class="top-content">
                                            <i class="fa-brands fa-instagram"></i>
                                        </div>
                                        <div class="bottom-content">
                                            <div class="feed_user d-flex align-items-center gap-2">
                                                <div>
                                                    <p>#ptptraining</p>
                                                    <span>@Playerstrainingplayers</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-column">
                                    <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-image/Project-2_59-1-1024x576.jpg">
                                    <div class="feed_content">
                                        <div class="top-content">
                                            <i class="fa-brands fa-instagram"></i>
                                        </div>
                                        <div class="bottom-content">
                                            <div class="feed_user d-flex align-items-center gap-2">
                                                <div>
                                                    <p>#ptptraining</p>
                                                    <span>@Playerstrainingplayers</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </section>
              <!-- case studies section design -->
              <section id="case_studies" class="section-spacing bg-white" data-aos="fade-in" data-aos-duration="1500">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col text-center">
                            <h2><?php echo $case_study_section["heading"]; ?></h2>
                            <p class="w-50 ml-auto mr-auto"><?php echo $case_study_section["description"]; ?></p>
                        </div>
                    </div>
                    <div class="case-study-carousel row">
                        <div class="case-study-item">
                            <div class="detail-review-person">
                                <div class="author-review">
                                    <figure>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-2.png" alt="nadira davis" title="nadira davis">
                                    </figure>
                                    <div>
                                        <span class="review-name">Nadira Davis</span>
                                        <span class="review-position">Tennis Player</span>
                                    </div>
                                </div>
                                <div class="detail-review-item">
                                    <p>“Posting content for 21 different communities has been easier, thanks to PTP excellent user-friendliness.”</p>
                                </div>
                            </div>
                            <div class="case-bottom text-center">
                                <p>user-friendly UI/UX boosts
                                    team productivity by <b>saving 50% of content creation time.</b></p>
                                <a href="#">See Full Story&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
                            </div>
                        </div>
                        <div class="case-study-item">
                            <div class="detail-review-person">
                                <div class="author-review">
                                    <figure>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-1.png" alt="nadira davis" title="nadira davis">
                                    </figure>
                                    <div>
                                        <span class="review-name">David</span>
                                        <span class="review-position">Rugby Player</span>
                                    </div>
                                </div>
                                <div class="detail-review-item">
                                    <p>“Posting content for 21 different communities has been easier, thanks to PTP excellent user-friendliness.”</p>
                                </div>
                            </div>
                            <div class="case-bottom text-center">
                                <p>user-friendly UI/UX boosts
                                    team productivity by <b>saving 50% of content creation time.</b></p>
                                <a href="#">See Full Story&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>    
                            </div>
                        </div>
                        <div class="case-study-item">
                            <div class="detail-review-person">
                                <div class="author-review">
                                    <figure>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-4.png" alt="nadira davis" title="nadira davis">
                                    </figure>
                                    <div>
                                        <span class="review-name">Micheal John</span>
                                        <span class="review-position">Hockey Player</span>
                                    </div>
                                </div>
                                <div class="detail-review-item">
                                    <p>“Posting content for 21 different communities has been easier, thanks to PTP excellent user-friendliness.”</p>
                                </div>
                            </div>
                            <div class="case-bottom text-center">
                                <p>user-friendly UI/UX boosts
                                    team productivity by <b>saving 50% of content creation time.</b></p>
                                <a href="#">See Full Story&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>    
                            </div>
                        </div>
                        <div class="case-study-item">
                            <div class="detail-review-person">
                                <div class="author-review">
                                    <figure>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-4.png" alt="nadira davis" title="nadira davis">
                                    </figure>
                                    <div>
                                        <span class="review-name">Micheal John</span>
                                        <span class="review-position">Hockey Player</span>
                                    </div>
                                </div>
                                <div class="detail-review-item">
                                    <p>“Posting content for 21 different communities has been easier, thanks to PTP excellent user-friendliness.”</p>
                                </div>
                            </div>
                            <div class="case-bottom text-center">
                                <p>user-friendly UI/UX boosts
                                    team productivity by <b>saving 50% of content creation time.</b></p>
                                <a href="#">See Full Story&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>    
                            </div>
                        </div>
                        <div class="case-study-item">
                            <div class="detail-review-person">
                                <div class="author-review">
                                    <figure>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-4.png" alt="nadira davis" title="nadira davis">
                                    </figure>
                                    <div>
                                        <span class="review-name">Micheal John</span>
                                        <span class="review-position">Hockey Player</span>
                                    </div>
                                </div>
                                <div class="detail-review-item">
                                    <p>“Posting content for 21 different communities has been easier, thanks to PTP excellent user-friendliness.”</p>
                                </div>
                            </div>
                            <div class="case-bottom text-center">
                                <p>user-friendly UI/UX boosts
                                    team productivity by <b>saving 50% of content creation time.</b></p>
                                <a href="#">See Full Story&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>    
                            </div>
                        </div>
                    </div>
                </div>
              </section>
                <!-- case studies section design -->
              <!-- brand ambassador Start -->
               <section id="brand-icon" class="section-spacing">
                        <div class="section-title mb-5 text-center">
                            <h2>Our PTP Ambassador</h2>
                            <p>Our brand ambassador plays a key role in connecting with our target audience.</p>
                        </div>
                        <div class="brand-ic-main owl-carousel">
                            <div class="brand-item">
                                <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/01.jpg">
                                <div class="brand-contents">
                                    <h3>Janalia D'Souza</h3>
                                    <p>Runner</p>
                                </div>
                            </div>
                            <div class="brand-item">
                                <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/02.jpg">
                                <div class="brand-contents">
                                    <h3>Cody Harman</h3>
                                    <p>Football Player</p>
                                </div>
                            </div>
                            <div class="brand-item">
                                <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/03.jpg">
                                <div class="brand-contents">
                                    <h3>Alexandra Bruin</h3>
                                    <p>Yoga Specialist</p>
                                </div>
                            </div>
                            <div class="brand-item">
                                <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/04.jpg">
                                <div class="brand-contents">
                                    <h3>Lexie Ward</h3>
                                    <p>Weight Lifter</p>
                                </div>
                            </div>
                            <div class="brand-item">
                                <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/01.jpg">
                                <div class="brand-contents">
                                    <h3>Janalia D'Souza</h3>
                                    <p>Runner</p>
                                </div>
                            </div>
                            <div class="brand-item">
                                <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/02.jpg">
                                <div class="brand-contents">
                                    <h3>Michelle Riley</h3>
                                    <p>Football Player</p>
                                </div>
                            </div>
                            <div class="brand-item">
                                <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/03.jpg">
                                <div class="brand-contents">
                                    <h3>Alexandra Bruin</h3>
                                    <p>Yoga Specialist</p>
                                </div>
                            </div>
                            <div class="brand-item">
                                <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/04.jpg">
                                <div class="brand-contents">
                                    <h3>Lexie Ward</h3>
                                    <p>Weight Lifter</p>
                                </div>
                            </div>
                        </div>
               </section>
             
        </div>
        
<?php
require locate_template('layouts/footer.php') ;
?>
