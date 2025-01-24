<?php
/* Template Name: Blogs */

require locate_template('layouts/header.php') ;
$current_page_id = get_queried_object_id();

$hero_section = get_field('hero_section');
?>
<style>
.breadcrumb-area {
  background: url('<?php echo isset($hero_section["background_image"]) ? $hero_section["background_image"] : ""; ?>') no-repeat center center;
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
</style>
        <div id="frontend-main">
            <!--Start breadcrumb area-->     
            <section class="breadcrumb-area">
                <div class="overlay-banner"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumbs">
                                <h1><?php echo isset($hero_section["heading"]) ? $hero_section["heading"] : ""; ?></h1>
                                <p><?php echo isset($hero_section["description"]) ? $hero_section["description"] : ""; ?></p>
                                <div class="filter-form">
                                    <!-- <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Your Keyword..." aria-label="" aria-describedby="basic-addon1">
                                        <div class="input-group-append">
                                          <button class="btn btn-success" type="button"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 20 20">
                                            <path fill="#000000" d="M18.869 19.162l-5.943-6.484c1.339-1.401 2.075-3.233 2.075-5.178 0-2.003-0.78-3.887-2.197-5.303s-3.3-2.197-5.303-2.197-3.887 0.78-5.303 2.197-2.197 3.3-2.197 5.303 0.78 3.887 2.197 5.303 3.3 2.197 5.303 2.197c1.726 0 3.362-0.579 4.688-1.645l5.943 6.483c0.099 0.108 0.233 0.162 0.369 0.162 0.121 0 0.242-0.043 0.338-0.131 0.204-0.187 0.217-0.503 0.031-0.706zM1 7.5c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5-2.916 6.5-6.5 6.5-6.5-2.916-6.5-6.5z"></path>
                                            </svg></button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End breadcrumb area-->

            <!--Start blog area-->
            <section id="blog-area" class="blog-default-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="blog-post">
                                <div class="row">
                                    <?php
                                    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; 
                                    $args = array(
                                        'post_type'      => 'post',       
                                        'posts_per_page' => 10,           
                                        'paged'          => $paged,       
                                        'orderby'        => 'ID',         
                                        'order'          => 'DESC', 
                                    );
                                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                                        $args['s'] = sanitize_text_field($_GET['search']);
                                    }
                                    $query = new WP_Query($args);
                                    if ($query->have_posts()) :
                                        while ($query->have_posts()) : $query->the_post();
                                            $post_id = get_the_ID();
                                            $post_title = get_the_title();
                                            $post_excerpt = wp_trim_words(get_the_excerpt(), 20, '...'); 
                                            $post_date = get_the_date('F j, Y'); 
                                            $post_permalink = get_permalink($post_id);
                                            if (has_post_thumbnail()) {
                                                $post_image_url = get_the_post_thumbnail_url($post_id, 'full');
                                            } else {
                                                $post_image_url = get_stylesheet_directory_uri().'/assets/images/default-post.png';
                                            }
                                            $comment_count = get_comments_number();
                                            $categories = get_the_category($post_id);


                                            $category_name = "";
                                            if (!empty($categories)) {
                                                $category_name = $categories[0]->name;
                                                $category_name = $category_name;
                                            }

                                    ?>
                                    <!--Start single blog post-->
                                    <div class="col-md-6">   
                                        <div class="single-blog-item wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0"  onclick="window.location.href='<?php echo $post_permalink; ?>';">
                                            <div class="img-holder">
                                                <img class="img-fluid" src="<?php echo $post_image_url; ?>" alt="">
                                                <?php if($category_name !==""){ ?>
                                                   <div class="categories">
                                                       <a href="javascript:void(0);"><?php echo $category_name; ?></a>
                                                   </div> 
                                                <?php } ?>
                                            </div>
                                            <div class="text-holder">
                                                <ul class="meta-info">
                                                    <li><a href="#"><?php echo $post_date; ?></a></li>
                                                    <li><a href="#"><?php echo $comment_count; ?> Comments</a></li>
                                                </ul>
                                                <a href="blog-single.html">
                                                    <h3 class="blog-title"><?php echo $post_title; ?></h3>
                                                </a>
                                                <div class="text">
                                                    <p><?php echo $post_excerpt; ?></p>
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
                        <!--Start sidebar Wrapper-->
                        <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
                            <div class="sidebar-wrapper">
                                <!--Start single sidebar-->
                                <div class="single-sidebar wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                                    <div class="sec-title">
                                        <h3>Categories</h3>
                                    </div>
                                    <ul class="categories clearfix">
                                        <?php $categories = get_categories();
                                         foreach ($categories as $category){ ?>
                                           <li><a href="<?php echo site_url()."/category/".esc_html($category->slug); ?>"><?php echo esc_html($category->name); ?><span>(<?php echo $category->count; ?>)</span></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <!--End single sidebar-->
                                <!--Start single sidebar--> 
                                <div class="single-sidebar wow fadeInUp d-none" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                                    <div class="sec-title">
                                        <h3>Popular Post</h3>
                                    </div>
                                    <ul class="popular-post">
                                        <li>
                                            <div class="img-holder">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-image/blog-1.jpg" alt="Awesome Image">
                                                <div class="overlay-style-one">
                                                    <div class="box">
                                                        <div class="content">
                                                            <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="title-holder">
                                                <a href="#"><h5 class="post-title">What is a “Healthy” Food?<br> The Answer ...</h5></a>
                                                <h6 class="post-date">February 14, 2017</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="img-holder">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-image/blog-2.jpg" alt="Awesome Image">
                                                <div class="overlay-style-one">
                                                    <div class="box">
                                                        <div class="content">
                                                            <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="title-holder">
                                                <a href="#"><h5 class="post-title">Build an Athletic Body With<br>In Eight ...</h5></a>
                                                <h6 class="post-date">February 05, 2017</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="img-holder">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-image/blog-3.jpg" alt="Awesome Image">
                                                <div class="overlay-style-one">
                                                    <div class="box">
                                                        <div class="content">
                                                            <a href="#"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="title-holder">
                                                <a href="#"><h5 class="post-title">Stop Getting Annoyed If You <br>Want Better ...</h5></a>
                                                <h6 class="post-date">January 22, 2017</h6>
                                            </div>
                                        </li>
                                       
                                       
                                    </ul>
                                </div>
                                <!--End single sidebar-->
                            </div>    
                        </div>
                        <!--End Sidebar Wrapper-->  
                    </div>
                </div>
            </section> 
            <!--End blog area--> 
        </div>
        
<?php
require locate_template('layouts/footer.php') ;
?>
