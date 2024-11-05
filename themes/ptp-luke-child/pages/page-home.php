<?php
/* Template Name: Home */

require locate_template('layouts/header.php') ;
$current_page_id = get_queried_object_id();

?>
        <div id="frontend-main">
            <!-- /Hero Section start-->
            <div class="hero-wrapper">
                <section id="hero" class="hero section light-background">
                    <div class="fluid-container">
                        <div class="bloc-video">
                            <div class="video-overlay"></div>
                            <video autoplay muted loop>
                                <source src="https://mediumpurple-gazelle-798875.hostingersite.com/ptp_design/home_video.mov" type="video/mp4">
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
                                            <li><span><?php echo get_post_meta($current_page_id, "top_video_sub_title", true); ?></span></li>
                                        </ul>
                                    </div>
                                    <h1><?php echo get_post_meta($current_page_id, "top_video_title", true); ?></h1>
                                    <p><?php echo get_post_meta($current_page_id, "top_video_text", true); ?></p>
                                    <div class="filter-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Enter Your Sports" aria-label="" aria-describedby="basic-addon1">
                                            <div class="input-group-append">
                                              <button class="btn btn-success" type="button">Find Your Coach</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                          </div>
                    </div>
                </section>
            </div>
            <!-- /Hero Section End-->
            <!-- /client Section start-->
             <section id="client-logos">
                <div class="container">
                    <div class="row align-items-center">
                        <?php $logos = get_field('logos_below_video', $current_page_id);
                        foreach ($logos as $logo) {
                          $logo_link = $logo['video_bottom_select_logo']; ?>
                          <div class="col-md-2 text-center"><img src="<?php echo $logo_link; ?>" alt="" /></div>
                        <?php } ?>
                    </div>
                </div>
             </section>
            <!-- Client Section End-->
             <!-- About section Start -->
             <section id="about-block" class="section-spacing">
                <div class="container">
                    <div class="row align-items-center" data-aos="fade-left" data-aos-duration="1500">
                        <div class="col-md-6 col-lg-5">
                            <div class="about-image">
                                <div class="about-box-image">
                                    <img class="img-fluid" src="<?php echo get_field('trainer_of_the_month_image', $current_page_id); ?>" alt="Start of the Month" />
                                </div>
                                <div class="star_box d-flex align-items-center gap-2">
                                    <div class="star_icon d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <div class="star_content">
                                        <h5><?php echo get_field('trainer_of_the_month_title', $current_page_id); ?></h5>
                                        <p><?php echo get_field('trainer_of_the_month_sub_title', $current_page_id); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-7 about-content">
                            <div class="about-inner">
                                <div class="sub-title mb-2"><?php echo get_field('sub_title_of_box_trainer_right', $current_page_id); ?></div>
                                <h2><?php echo get_field('title_of_box_trainer_right', $current_page_id); ?></h2>
                                <div class="quote-text mt-4">
                                    <p><?php echo get_field('text_of_box_trainer_right', $current_page_id); ?></p>
                                </div>
                                <div class="custom-button mt-4">
                                    <button type="button" class="btn btn-round btn-fill"><?php echo get_field('button_text_of_box_trainer_right', $current_page_id); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </section>
             <!-- About section End -->
              <!-- Why Choose Section Start-->
             <section id="why-section" class="section-spacing pt-0" data-aos="fade-right" data-aos-duration="1500">
                <div class="container">
                    <div class="section-title mb-5">
                        <h2><?php echo get_field('everyone_love_section_title', $current_page_id); ?></h2>
                        <p><?php echo get_field('everyone_love_section_text', $current_page_id); ?></p>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-12">
                           <div class="why-block-grid row">
                            <!-- box-item strat -->
                                <div class="col-md-4 mb-4">
                                   <div class="box-item">
                                        <div class="box-header mb-4">
                                            <div class="box-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 150 150" fill="none">
                                                    <path d="M109.375 84.9937C107.3 84.707 105.216 84.5006 103.125 84.375C98.1522 84.375 93.3831 86.3504 89.8667 89.8667C86.3504 93.383 84.375 98.1522 84.375 103.125V109.375H113.606C114.877 109.374 116.13 109.081 117.269 108.518C118.407 107.954 119.401 107.136 120.172 106.126C120.944 105.117 121.472 103.943 121.716 102.697C121.961 101.45 121.914 100.163 121.581 98.9375L112.5 65.225M43.75 128.125H150M43.75 146.875C37.5 146.875 32.8125 137.5 32.8125 137.5C28.125 128.125 28.125 121.875 28.125 112.5V106.25L3.125 85.9375V84.375L14.3063 53.0687C15.6068 49.4271 18.0016 46.2766 21.1624 44.0489C24.3232 41.8212 28.0955 40.6253 31.9625 40.625H40.625V62.1625C40.6245 63.8967 41.0883 65.5994 41.9683 67.0938C42.8483 68.5881 44.1124 69.8196 45.6292 70.6603C47.146 71.501 48.8602 71.9202 50.5938 71.8744C52.3274 71.8286 54.0172 71.3195 55.4875 70.4L78.125 56.25M3.125 148.437C3.125 148.437 12.5 131.25 12.5 109.375M149.063 89.8875C141.533 89.0071 134.008 88.0925 126.488 87.1437L149.063 89.8875ZM71.875 99.375C71.875 99.375 65.625 109.375 57.8125 109.375C54.9117 109.375 52.1297 108.223 50.0785 106.171C48.0273 104.12 46.875 101.338 46.875 98.4375C46.875 92.4 51.7687 87.525 57.8125 87.525C65.625 87.525 71.875 97.5 71.875 97.5V99.375ZM109.375 65.625C106.06 65.625 102.88 64.308 100.536 61.9638C98.192 59.6196 96.875 56.4402 96.875 53.125C96.875 49.8098 98.192 46.6304 100.536 44.2862C102.88 41.942 106.06 40.625 109.375 40.625C112.69 40.625 115.87 41.942 118.214 44.2862C120.558 46.6304 121.875 49.8098 121.875 53.125C121.875 56.4402 120.558 59.6196 118.214 61.9638C115.87 64.308 112.69 65.625 109.375 65.625ZM44.375 28.125C44.375 28.125 34.375 21.875 34.375 14.0625C34.375 11.165 35.526 8.38619 37.5749 6.33735C39.6237 4.28852 42.4025 3.1375 45.3 3.1375C48.1975 3.1375 50.9763 4.28852 53.0251 6.33735C55.074 8.38619 56.225 11.165 56.225 14.0625C56.225 21.875 46.25 28.125 46.25 28.125H44.375Z" stroke="black" stroke-width="4"/>
                                                </svg>
                                            </div>
                                            <h4><?php echo get_field('box_1', $current_page_id)["box_1_title"]; ?></h4>
                                        </div>
                                        <ul class="ordered-list">
                                            <?php
                                            $features1 = get_field('box_1', $current_page_id)["features_box_1"];
                                            foreach($features1 as $feature1){ ?>
                                              <li><p><?php echo $feature1["features_of_box1"] ; ?></p></li>
                                            <?php } ?>
                                        </ul>
                                        <div class="custom-button mt-2">
                                            <button type="button" class="btn btn-round btn-outliner"><?php echo get_field('box_1', $current_page_id)["button_text_box_1"]; ?></button>
                                        </div>
                                   </div>
                                </div>
                                <!-- box-item strat -->
                                <div class="col-md-4">
                                    <div class="box-item">
                                         <div class="box-header mb-4">
                                             <div class="box-icon">
                                                <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_18_9)">
                                                    <path d="M2.08337 75V95.8333M10.4167 70.8333V100M72.9167 75V95.8333M64.5834 70.8333V100M10.4167 85.4167H64.5834M56.25 85.4167L52.0834 68.75C52.0834 68.75 45.8334 64.5833 37.5 64.5833C29.1667 64.5833 22.9167 68.75 22.9167 68.75L18.75 85.4167M97.9167 37.5V58.3333M89.5834 33.3333V62.5M54.1667 47.9167H89.5834M81.25 47.9167L77.0834 31.25C77.0834 31.25 70.8334 27.0833 62.5 27.0833C54.1667 27.0833 47.9167 31.25 47.9167 31.25L46.875 35.4167M36.875 56.25C36.875 56.25 30.2084 52.0833 30.2084 46.875C30.2084 44.9434 30.9757 43.0908 32.3416 41.7249C33.7075 40.359 35.5601 39.5917 37.4917 39.5917C39.4234 39.5917 41.2759 40.359 42.6418 41.7249C44.0077 43.0908 44.775 44.9434 44.775 46.875C44.775 52.0833 38.125 56.25 38.125 56.25H36.875ZM61.875 18.75C61.875 18.75 55.2084 14.5833 55.2084 9.37501C55.2084 7.44335 55.9757 5.5908 57.3416 4.22491C58.7075 2.85902 60.5601 2.09167 62.4917 2.09167C64.4234 2.09167 66.2759 2.85902 67.6418 4.22491C69.0077 5.5908 69.775 7.44335 69.775 9.37501C69.775 14.5833 63.125 18.75 63.125 18.75H61.875Z" stroke="#0E0E0E" stroke-width="3"/>
                                                    </g>
                                                    <defs>
                                                    <clipPath id="clip0_18_9">
                                                    <rect width="100" height="100" fill="white"/>
                                                    </clipPath>
                                                    </defs>
                                                </svg>                                                    
                                             </div>
                                             <h4><?php echo get_field('box_2', $current_page_id)["box_2_title"]; ?></h4>
                                         </div>
                                         <ul class="ordered-list">
                                            <?php
                                            $features2 = get_field('box_2', $current_page_id)["features_box_2"];
                                            foreach($features2 as $feature2){ ?>
                                              <li><p><?php echo $feature2["features_of_box2"] ; ?></p></li>
                                            <?php } ?>
                                         </ul>
                                         <div class="custom-button mt-2">
                                             <button type="button" class="btn btn-round btn-outliner"><?php echo get_field('box_2', $current_page_id)["button_text_box_2"]; ?></button>
                                         </div>
                                    </div>
                                 </div>
                                 <!-- box-item strat -->
                                <div class="col-md-4">
                                    <div class="box-item">
                                         <div class="box-header mb-4">
                                             <div class="box-icon">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 150 150" fill="none">
                                                     <path d="M109.375 84.9937C107.3 84.707 105.216 84.5006 103.125 84.375C98.1522 84.375 93.3831 86.3504 89.8667 89.8667C86.3504 93.383 84.375 98.1522 84.375 103.125V109.375H113.606C114.877 109.374 116.13 109.081 117.269 108.518C118.407 107.954 119.401 107.136 120.172 106.126C120.944 105.117 121.472 103.943 121.716 102.697C121.961 101.45 121.914 100.163 121.581 98.9375L112.5 65.225M43.75 128.125H150M43.75 146.875C37.5 146.875 32.8125 137.5 32.8125 137.5C28.125 128.125 28.125 121.875 28.125 112.5V106.25L3.125 85.9375V84.375L14.3063 53.0687C15.6068 49.4271 18.0016 46.2766 21.1624 44.0489C24.3232 41.8212 28.0955 40.6253 31.9625 40.625H40.625V62.1625C40.6245 63.8967 41.0883 65.5994 41.9683 67.0938C42.8483 68.5881 44.1124 69.8196 45.6292 70.6603C47.146 71.501 48.8602 71.9202 50.5938 71.8744C52.3274 71.8286 54.0172 71.3195 55.4875 70.4L78.125 56.25M3.125 148.437C3.125 148.437 12.5 131.25 12.5 109.375M149.063 89.8875C141.533 89.0071 134.008 88.0925 126.488 87.1437L149.063 89.8875ZM71.875 99.375C71.875 99.375 65.625 109.375 57.8125 109.375C54.9117 109.375 52.1297 108.223 50.0785 106.171C48.0273 104.12 46.875 101.338 46.875 98.4375C46.875 92.4 51.7687 87.525 57.8125 87.525C65.625 87.525 71.875 97.5 71.875 97.5V99.375ZM109.375 65.625C106.06 65.625 102.88 64.308 100.536 61.9638C98.192 59.6196 96.875 56.4402 96.875 53.125C96.875 49.8098 98.192 46.6304 100.536 44.2862C102.88 41.942 106.06 40.625 109.375 40.625C112.69 40.625 115.87 41.942 118.214 44.2862C120.558 46.6304 121.875 49.8098 121.875 53.125C121.875 56.4402 120.558 59.6196 118.214 61.9638C115.87 64.308 112.69 65.625 109.375 65.625ZM44.375 28.125C44.375 28.125 34.375 21.875 34.375 14.0625C34.375 11.165 35.526 8.38619 37.5749 6.33735C39.6237 4.28852 42.4025 3.1375 45.3 3.1375C48.1975 3.1375 50.9763 4.28852 53.0251 6.33735C55.074 8.38619 56.225 11.165 56.225 14.0625C56.225 21.875 46.25 28.125 46.25 28.125H44.375Z" stroke="black" stroke-width="4"/>
                                                 </svg>
                                             </div>
                                             <h4><?php echo get_field('box_3', $current_page_id)["box_3_title"]; ?></h4>
                                         </div>
                                         <ul class="ordered-list">
                                            <?php
                                            $features3 = get_field('box_3', $current_page_id)["features_box_3"];
                                            foreach($features3 as $feature3){ ?>
                                              <li><p><?php echo $feature3["features_of_box3"] ; ?></p></li>
                                            <?php } ?>
                                         </ul>
                                         <div class="custom-button mt-2">
                                             <button type="button" class="btn btn-round btn-outliner"><?php echo get_field('box_3', $current_page_id)["button_text_box_3"]; ?></button>
                                         </div>
                                    </div>
                                 </div>
                           </div>
                        </div>
                    </div>
                </div>
             </section>
             <!-- Why Choose Section End-->
              <section id="feed_block" class="section-spacing" data-aos="fade-in" data-aos-duration="1500">
                    <div class="fluid-container">
                        <div class="section-title mb-5 text-center">
                            <div class="sub-heading">Trending</div>
                            <h2>Join the Conversation</h2>
                        </div>
                        <div class="social-feeds">
                            <div id="social-slider" class="owl-carousel">
                                <div class="social_item">
                                    <div class="feed_single">
                                        <div class="feed_overlay"></div>
                                        <div class="feed-image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about/about-one.jpg" alt="">
                                        </div>
                                        <div class="feed_content">
                                            <div class="top-content">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                            <div class="bottom-content">
                                                <div class="feed_user d-flex align-items-center gap-2">
                                                    <div class="feed-user-img">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="feed user image" />
                                                    </div>
                                                    <span>@Playerstrainingplayers</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- feed item -->
                                <div class="social_item">
                                    <div class="feed_single">
                                        <div class="feed_overlay"></div>
                                        <div class="feed-image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about/about-two.jpg" alt="">
                                        </div>
                                        <div class="feed_content">
                                            <div class="top-content">
                                                <i class="fa-brands fa-instagram"></i>
                                            </div>
                                            <div class="bottom-content">
                                                <div class="feed_user d-flex align-items-center gap-2">
                                                    <div class="feed-user-img">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="feed user image" />
                                                    </div>
                                                    <Span>@Playerstrainingplayers</Span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!-- feed item -->
                                 <div class="social_item">
                                    <div class="feed_single">
                                        <div class="feed_overlay"></div>
                                        <div class="feed-image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-image/Project-2_59-1-1024x576.jpg" alt="">
                                        </div>
                                        <div class="feed_content">
                                            <div class="top-content">
                                                <i class="fa-brands fa-tiktok"></i>
                                            </div>
                                            <div class="bottom-content">
                                                <div class="feed_user d-flex align-items-center gap-2">
                                                    <div class="feed-user-img">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="feed user image" />
                                                    </div>
                                                    <Span>@Playerstrainingplayers</Span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!-- feed item -->
                                 <div class="social_item">
                                    <div class="feed_single">
                                        <div class="feed_overlay"></div>
                                        <div class="feed-image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-image/blog-2.jpg" alt="">
                                        </div>
                                        <div class="feed_content">
                                            <div class="top-content">
                                                <i class="fa-brands fa-instagram"></i>
                                            </div>
                                            <div class="bottom-content">
                                                <div class="feed_user d-flex align-items-center gap-2">
                                                    <div class="feed-user-img">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="feed user image" />
                                                    </div>
                                                    <Span>@Playerstrainingplayers</Span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!-- feed item -->
                                 <div class="social_item">
                                    <div class="feed_single">
                                        <div class="feed_overlay"></div>
                                        <div class="feed-image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-image/blog-3.jpg" alt="">
                                        </div>
                                        <div class="feed_content">
                                            <div class="top-content">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                            <div class="bottom-content">
                                                <div class="feed_user d-flex align-items-center gap-2">
                                                    <div class="feed-user-img">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="feed user image" />
                                                    </div>
                                                    <Span>@Playerstrainingplayers</Span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!-- feed item -->
                                 <div class="social_item">
                                    <div class="feed_single">
                                        <div class="feed_overlay"></div>
                                        <div class="feed-image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-image/Project-2_59-1-1024x576.jpg" alt="">
                                        </div>
                                        <div class="feed_content">
                                            <div class="top-content">
                                                <i class="fa-brands fa-tiktok"></i>
                                            </div>
                                            <div class="bottom-content">
                                                <div class="feed_user d-flex align-items-center gap-2">
                                                    <div class="feed-user-img">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="feed user image" />
                                                    </div>
                                                    <Span>@Playerstrainingplayers</Span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!-- feed item -->
                                 <div class="social_item">
                                    <div class="feed_single">
                                        <div class="feed_overlay"></div>
                                        <div class="feed-image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-image/blog-2.jpg" alt="">
                                        </div>
                                        <div class="feed_content">
                                            <div class="top-content">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                            <div class="bottom-content">
                                                <div class="feed_user d-flex align-items-center gap-2">
                                                    <div class="feed-user-img">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="feed user image" />
                                                    </div>
                                                    <Span>@Playerstrainingplayers</Span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!-- feed item -->
                                 <div class="social_item">
                                    <div class="feed_single">
                                        <div class="feed_overlay"></div>
                                        <div class="feed-image">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-image/blog-3.jpg" alt="">
                                        </div>
                                        <div class="feed_content">
                                            <div class="top-content">
                                                <i class="fa-brands fa-tiktok"></i>
                                            </div>
                                            <div class="bottom-content">
                                                <div class="feed_user d-flex align-items-center gap-2">
                                                    <div class="feed-user-img">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="feed user image" />
                                                    </div>
                                                    <Span>@Playerstrainingplayers</Span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </section>
              <!--Reward Section Start-->
              <section id="reward-block" class="section-spacing">
                <div class="container">
                    <div class="reward-main" style="background: url('<?php echo get_field('refer_section_bg_img', $current_page_id); ?>') no-repeat center center;">
                        <div class="reward-inner">
                            <div class="reward-top-title">
                                <h2><?php echo get_field('refer_section_title', $current_page_id); ?></h2>
                                <p><?php echo get_field('refer_section_sub_title', $current_page_id); ?></p>
                            </div>
                            <div class="reward-step row">
                                <div class="col-md-4 col-lg-4">
                                    <div class="reward-box">
                                        <h3><?php echo get_field('box1_refer', $current_page_id)["refer_box_1_title"]; ?></h3>
                                        <p><?php echo get_field('box1_refer', $current_page_id)["refer_box_1_txt"]; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="reward-box">
                                        <h3><?php echo get_field('box2_refer', $current_page_id)["refer_box_2_title"]; ?></h3>
                                        <p><?php echo get_field('box2_refer', $current_page_id)["refer_box_2_txt"]; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="reward-box">
                                        <h3><?php echo get_field('box3_refer_copy', $current_page_id)["refer_box_3_title"]; ?></h3>
                                        <p><?php echo get_field('box3_refer_copy', $current_page_id)["refer_box_3_txt"]; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </section>
              <!--Reward Section End-->
              <!-- Coach Find Section start-->
              <section id="coach-find-area" class="section-spacing pt-0" data-aos="fade-top" data-aos-duration="1500">
                <div class="container">
                    <div class="coach-find-main">
                        <div class="section-title mb-5">
                            <h2>Find A Private Coach Near You</h2>
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
                                <div class="custom-button view-more d-flex align-items-center gap-2 justify-content-center mt-5">
                                    <button type="button" class="btn btn-round btn-fill">View More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </section>
              <!-- Coach Find Section End-->
                <!-- risk free section -->
                <section id="risk-block" class="section-spacing pt-0">
                    <div class="container" data-aos="fade-right" data-aos-duration="1500">
                        <div class="risk-main">
                            <div class="row">
                                <div class="col-md-6 col-lg-5">
                                    <div class="risk-image">
                                        <img class="img-fluid" src="<?php echo get_field('risk_free_sess_img', $current_page_id); ?>" alt="risk image" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-7">
                                    <div class="risk-content">
                                      <h2><?php echo get_field('risk_free_sess_title', $current_page_id); ?></h2>
                                      <p><?php echo get_field('risk_free_sess_text', $current_page_id); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </section>
                <!-- Testimonial Section Start-->
                <section id="testimonial-block" class="section-spacing">
                    <div class="container" data-aos="fade-left" data-aos-duration="1500">
                        <div class="section-title mb-5">
                            <div class="sub-heading black"><?php echo get_field('testimonial_subtitle', $current_page_id); ?></div>
                            <h1><?php echo get_field('testimonial_title', $current_page_id); ?></h1>
                        </div>
                        <div id="testimonial-slider" class="owl-carousel">
                            <!-- testimonial item -->
                             <?php $testimonials = get_field('add_testimonials', $current_page_id);
                             foreach ($testimonials as $testimonial) { ?>
                                <div class="testimonial-item">
                                    <div class="row align-items-center">
                                        <div class="col-md-5 col-lg-4">
                                            <div class="testimonial-image">
                                                <img class="img-fluid" src="<?php echo $testimonial["testimonial_image"]; ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-8">
                                            <div class="testimonial-content">
                                                <div class="testimonial-quote">
                                                    <p><?php echo $testimonial["testimonial_content"]; ?></p>
                                                    <div class="author-info mt-4">
                                                        <h3><?php echo $testimonial["testimonial_title"]; ?></h3>
                                                        <span><?php echo $testimonial["testimonial_designation"]; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- testimonial item End-->
                        </div>
                    </div>
                </section>
               <!-- Security Section start-->
               <section id="steps-area" class="section-spacing">
                <div class="container">
                    <div class="steps-main">
                        <div class="steps-content">
                                <div class="row">
                                    <div class="col-md-6 col-lg-8" data-aos="fade-left" data-aos-duration="1500">
                                        <div class="steps-content-inner">
                                            <div class="section-title mb-5">
                                                <h1><?php echo get_field('Benefits_of_Joining_Our_Community_Title', $current_page_id); ?></h1>
                                            </div>
                                            <div class="step-list">
                                                <ul>
                                                    <li>
                                                        <div class="d-flex step-item">
                                                            <i class="fa-solid fa-person-chalkboard"></i>
                                                            <div class="s-list-content">
                                                                <h2><?php echo get_field('Row1_Content', $current_page_id)["community_row_1_title"]; ?></h2>
                                                                <p><?php echo get_field('Row1_Content', $current_page_id)["community_row_1_subtitle"]; ?></p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex step-item">
                                                            <i class="fa-solid fa-sack-dollar"></i>
                                                            <div class="s-list-content">
                                                                <h2><?php echo get_field('Row2_Content', $current_page_id)["community_row_2_title"]; ?></h2>
                                                                <p><?php echo get_field('Row2_Content', $current_page_id)["community_row_2_subtitle"]; ?></p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex step-item">
                                                            <i class="fa-solid fa-user-shield"></i>
                                                            <div class="s-list-content">
                                                                <h2><?php echo get_field('Row3_Content', $current_page_id)["community_row_3_title"]; ?></h2>
                                                                <p><?php echo get_field('Row3_Content', $current_page_id)["community_row_3_subtitle"]; ?></p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4" data-aos="fade-right" data-aos-duration="2500">
                                        <div class="steps-image">
                                            <img class="img-fluid" src="<?php echo get_field('community_right_sec_img', $current_page_id); ?>" alt="" />
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                </section>
               <!-- Security Section End-->
                <section id="blog-block" class="section-spacing pt-2 pb-0">
                    <div class="container">
                        <div class="blog-main">
                            <div class="section-title mb-5">
                                <h1>Our Blog</h1>
                            </div>
                            <div class="blog-widget">
                                <div class="row">
                                    <!-- blog grid -->
                                    <div class="col-md-4 col-lg-4">
                                        <div class="blog-card">
                                            <a href="javascript:void(0);">
                                                <div class="blog-image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-image/karen-parnell-guest-post-1024x576.jpg" alt="" />
                                                </div>
                                                <div class="blog-card-content">
                                                    <span class="blog-meta">June 18, 2017  |  10 Comments</span>
                                                    <h3>Stop Getting Annoyed If You Want Better Health</h3>
                                                    <p>pleasure and praising pain was born I will give you a complete account of the system, and expound actual teachings great.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- blog grid -->
                                    <div class="col-md-4 col-lg-4">
                                        <div class="blog-card">
                                            <a href="javascript:void(0);">
                                                <div class="blog-image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-image/Project-2_59-1-1024x576.jpg" alt="" />
                                                </div>
                                                <div class="blog-card-content">
                                                    <span class="blog-meta">June 18, 2017  |  10 Comments</span>
                                                    <h3>Stop Getting Annoyed If You Want Better Health</h3>
                                                    <p>pleasure and praising pain was born I will give you a complete account of the system, and expound actual teachings great.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- blog grid -->
                                    <div class="col-md-4 col-lg-4">
                                        <div class="blog-card">
                                            <a href="javascript:void(0);">
                                                <div class="blog-image">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-image/summit-og-1024x576.jpg" alt="" />
                                                </div>
                                                <div class="blog-card-content">
                                                    <span class="blog-meta">June 18, 2017  |  10 Comments</span>
                                                    <h3>Stop Getting Annoyed If You Want Better Health</h3>
                                                    <p>pleasure and praising pain was born I will give you a complete account of the system, and expound actual teachings great.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
               
             
        </div>
        
<?php
require locate_template('layouts/footer.php') ;
?>
