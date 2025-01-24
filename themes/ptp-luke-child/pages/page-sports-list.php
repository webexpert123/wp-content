<?php
/* Template Name: All Sports */

require locate_template('layouts/header.php') ;
?>
<style>
.breadcrumb-area {
  background: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/coach_listing_banner.jpg') no-repeat center center;
  background-position: center center;
  background-repeat: no-repeat;
  padding-top: 100px;
  padding-bottom: 100px;
  position: relative;
  z-index: 1;
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
  backdrop-filter: blur(5px);
  background-size: cover;
}
</style>
        <div id="frontend-main">
            <!--Start breadcrumb area-->     
            <section class="breadcrumb-area">
                <div class="overlay-banner"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumbs">
                                <h1>All Available Sports</h1>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End breadcrumb area-->

            <!--Start blog area-->
            <section id="coach-find-area" class="section-spacing " data-aos="fade-top" data-aos-duration="1500">
                <div class="container">
                    <div class="coach-find-main">
                        <div class="coach-find-content">
                            <div class="coach-find-box">
                                <div class="row">
                                    <?php 
                                    $sports = $wpdb->get_results($wpdb->prepare("SELECT * FROM `{$wpdb->prefix}sports` ORDER BY sport_name ASC"));
                                    foreach($sports as $sport){
                                       $imageid = $sport->image;
                                       if( $imageid ) {
                                         $img_link = wp_get_attachment_image_url($imageid, 'thumbnail');
                                       }else{
                                         $img_link = get_stylesheet_directory_uri()."/assets/images/profile_img.png";
                                       }
                                       $coach_count = $wpdb->get_var($wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->usermeta} WHERE meta_key = %s AND meta_value = %s", "_sport", $sport->sportID ) ); ?>
                                      <div class="col-md-3 col-lg-2" onclick="window.location.href='<?php echo site_url("coach-list/?sport=".$sport->sportID); ?>';">
                                        <div class="coach-find-image">
                                            <img src="<?php echo $img_link; ?>" alt="" />
                                        </div>
                                        <div class="coach-find-item">
                                            <h5><?php echo $sport->sport_name; ?></h5>
                                            <div class="d-flex">
                                                <span><?php echo $coach_count; ?> Coaches</span>
                                            </div>
                                        </div>
                                      </div>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End blog area--> 
        </div>
        
<?php
require locate_template('layouts/footer.php') ;
?>
