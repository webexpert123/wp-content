<?php
/* Template Name: Checkout */

require locate_template('layouts/header.php') ;
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
                              
                          </div>
                    </div>
                </section>
            </div>
            <!-- /Hero Section End-->

             <!-- /client Section start-->
             <section id="client-logos">
                <div class="container">
                    <?php echo do_shortcode('[woocommerce_checkout]'); ?>
                </div>
             </section>
             
        </div>
        
<?php
require locate_template('layouts/footer.php') ;
?>
