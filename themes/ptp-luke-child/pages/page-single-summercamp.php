<?php
/* Template Name: Single Summercamp */

require locate_template('layouts/header.php') ;
global $wpdb;
$camp_slug = get_query_var('camp_slug');
$post = get_posts([
    'name'        => $camp_slug,
    'post_type'   => 'summer-camps',
    'post_status' => 'publish',
    'numberposts' => 1,
]);

if (!empty($post)) {
    $post_details = $post[0];
    $post_title = $post_details->post_title;
    $post_content = $post_details->post_content;
} else {
    wp_redirect(site_url());
}
?>
<div id="frontend-main">
            <!--Start breadcrumb area-->     
<section class="breadcrumb-area">
    <div class="overlay-banner"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <h1><?php echo $post_title; ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->

<!--Start breadcrumb bottom area-->     
<section class="breadcrumb-bottom-area d-none">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-between">
                <!-- <div class="left pull-left">
                    <ul>
                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                        <li><a href="<?php echo site_url(); ?>/blogs">Blogs</a></li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                        <li class="active"><?php the_title(); ?></li>
                    </ul>
                </div> -->
                <div class="right pull-right">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                        <span><i class="fa fa-share-alt" aria-hidden="true"></i>Share</span> 
                    </a>   
                </div>    
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb bottom area-->

<!--Start blog area-->
<section id="blog-area" class="blog-default-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="blog-post">
                    <div class="row">
                        <!--Start single blog post-->
                            <div class="col-md-12"> 
                            	<div class="post-featured-image">
							       <?php
							       $post_id = $post_details->ID;
                                   $featured_image_url = get_the_post_thumbnail_url($post_id, 'large');
                                   if($featured_image_url){
							           echo "<img src='".$featured_image_url."' class='img-fluid'>";
                                   }
							       $author_id = get_post_field('post_author', $post_id);
                                   $event_start = get_post_meta($post_id, "_event_from_date", true);
                                   $event_start_date = date("d/m/Y h:i A", strtotime($event_start));
                                   $event_end = get_post_meta($post_id, "_event_to_date", true);
                                   $event_end_date = date("d/m/Y h:i A", strtotime($event_end));
                                   $event_location = get_post_meta($post_id, "_event_location", true);
                                   $event_price = get_post_meta($post_id, "_event_price", true);
							       ?>
							    </div>

							    <h2 class="text-warning mt-5"><?php echo $post_title; ?></h2>
							    <div class="post-content mt-5"><?php echo $post_content; ?></div>
                            </div>
                        <!--End single blog post-->
                    </div>
                    <!--Start post pagination-->
                    <div class="row">
                        <div class="col-md-12"> 
                           
                        </div> 
                    </div>
                    <!--End post pagination-->
                </div>
            </div>
            <!--Start sidebar Wrapper-->
            <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
                <div class="sidebar-wrapper">
                    <!--Start single sidebar-->
                    <table class="table table-bordered">
                        <tr class="bg-dark text-light">
                            <th colspan="2" class="text-center">SUMMER CAMP DETAILS</th>
                                        </tr>
                                        <tr>
                                            <th>DATE & TIMINGS</th>
                                            <td><?php echo $event_start_date; ?> to <?php echo $event_end_date; ?></td>
                                        </tr>
                                        <tr>
                                            <th>LOCATION</th>
                                            <td><?php echo $event_location; ?></td>
                                        </tr>
                                        <tr>
                                            <th>FEE</th>
                                            <th>$<?php echo $event_price; ?></th>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="text-center"><button type="button" class="btn btn-block btn-warning btn-lg">BOOK NOW</button></th>
                                        </tr>
                                    </table>
                    <!--End single sidebar-->
                </div>    
            </div>
            <!--End Sidebar Wrapper-->  
        </div>
    </div>

<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-dark">SHARE THIS BLOG</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body text-center">
          <?php echo do_shortcode('[Sassy_Social_Share]'); ?>
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
