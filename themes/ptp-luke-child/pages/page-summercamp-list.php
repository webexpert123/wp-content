<?php
/* Template Name: Summer Camp List */

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
.post-pagination{
    margin-top: 20px;
    width: 100%;
}
#frontend-main .summer-camp .card {
  background: transparent;
  border: none;
}
#frontend-main .summer-camp .card .card-body {
  background: transparent;
  padding: 0;
}
.summer-listing .camp-item {
  border-radius: 15px;
  padding: 15px;
  background: #161616;
  min-height: 131px;
}
.summer-listing .camp-item .loc-top-content .camp-image {
  max-width: 120px;
  border-radius: 10px;
  overflow: hidden;
  height: 120px;
}
.summer-listing .camp-item .loc-top-content .camp-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.summer-listing .camp-item .loc-top-content .loc-title h4 {
  font-size: 18px;
  margin-bottom: 10px;
  color: var(--aceent0-color);
}
.summer-listing .camp-item .loc-top-content .loc-title p {
  font-size: 13px;
  color: var(--secondary-color);
  margin-bottom: 5px;
  font-weight: 300;
}
.summer-listing .camp-item .loc-top-content .d-flex {
  gap: 20px;
}
.summer-listing .camp-item .loc-top-content .custom-button button {
  width: 100%;
  border-radius: 25px;
  padding: 7px 20px;
  margin-top: 15px;
  font-size: 14px;
  background-color: var(--secondary-color);
  border-width: 0;
  color: var(--primary-color);
}
.summer-listing .camp-item .loc-top-content .custom-button button:hover {
  border: none;
}
.summer-item{margin-bottom: 20px;}
.badge_price{
    font-size: 20px;
    margin-top: 10px;
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
                                <h1>Upcoming Summer Camps</h1>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End breadcrumb area-->

            <!--Start blog area-->
            <section id="blog-area" class="blog-default-area summer-listing">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="blog-post">
                                <div class="row">
                                    <?php
                                    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; 
                                    $args = array(
                                        'post_type'      => 'summer-camps',       
                                        'posts_per_page' => 12,           
                                        'paged'          => $paged,       
                                        'orderby'        => 'ID',         
                                        'order'          => 'DESC', 
                                        'meta_query'     => array(
                                            array(
                                                'key'     => '_event_from_date',  
                                                'value'   => current_time('Y-m-d'), 
                                                'compare' => '>=',              
                                                'type'    => 'DATE',            
                                            ),
                                        ),
                                    );
                                    $query = new WP_Query($args);
                                    if ($query->have_posts()) :
                                        while ($query->have_posts()) : $query->the_post();
                                            $post_id = get_the_ID();
                                            $post_title = get_the_title();
                                            $post_excerpt = wp_trim_words(get_the_excerpt(), 20, '...'); 
                                            $event_start = get_post_meta($post_id, "_event_from_date", true);
                                            $event_start_date = date("d/m/Y h:i A", strtotime($event_start));
                                            $event_end = get_post_meta($post_id, "_event_to_date", true);
                                            $event_end_date = date("d/m/Y h:i A", strtotime($event_end));
                                            $event_location = get_post_meta($post_id, "_event_location", true);
                                            $event_price = get_post_meta($post_id, "_event_price", true);
                                            $productID = get_post_meta($post_id, "_product_id", true);
                                            $post_slug = get_post_field( 'post_name', get_the_ID() );

                                            if (has_post_thumbnail()) {
                                                $post_image_url = get_the_post_thumbnail_url($post_id, 'full');
                                            } else {
                                                $post_image_url = get_stylesheet_directory_uri().'/assets/images/default-post.png';
                                            }

                                    ?>
                                    <!--Start single blog post-->
                                    <div class="col-md-4 summer-item"> 
                                        <div class="camp-item">
                                            <div class="loc-top-content">
                                                <div class="d-flex align-items-center">
                                                    <div class="camp-image">
                                                        <img src="<?php echo $post_image_url; ?>" alt="camp image" />
                                                    </div>
                                                    <div class="loc-title">
                                                        <h4><?php echo $post_title; ?></h4>
                                                        <p><i class="fa-solid fa-location-dot"></i>&nbsp; <?php echo $event_location; ?></p>
                                                        <p><i class="fa-solid fa-calendar-days"></i>&nbsp; <?php echo $event_start_date; ?> To <?php echo $event_end_date; ?></p>
                                                        <div class="loc-btm-content">
                                                            <span class="badge badge-pill badge-warning badge_price">$<?php echo $event_price; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="custom-button">
                                                    <button type="button" class="btn-outliner" onclick="window.location.href='<?php echo site_url('summercamp/'.$post_slug.'/'); ?>'">Join Now <i class="fa-solid fa-angles-right"></i></button>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <!--End single blog post-->
                                    <?php endwhile; 
                                    wp_reset_postdata();
                                    else :
                                        echo '<p>No posts found.</p>';
                                    endif; ?>
                                </div>
                                <!--Start post pagination-->
                                <div class="row">
                                    <div class="col-md-12"> 
                                        <?php
                                        $pagination_args = array(
                                          'total'        => $query->max_num_pages, 
                                          'current' => max( 1, get_query_var( 'paged' ) ), // Current page number
                                          'prev_text' => '&laquo;', // Previous page text
                                          'next_text' => '&raquo;', // Next page text
                                          'type' => 'array',
                                        );
                                        $pagination_links = paginate_links($pagination_args);
                                        ?>
                                        <ul class="post-pagination text-center">
                                            <?php
                                            if ( !empty( $pagination_links ) ) {
                                              foreach ( $pagination_links as $link ) {
                                                $active="";
                                                if ( strpos( $link, $paged ) !== false ) {$active="active";}
                                                echo '<li class="'.$active.'">' . $link . '</li>';
                                              }
                                            } ?>
                                        </ul>
                                    </div> 
                                </div>
                                <!--End post pagination-->
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
