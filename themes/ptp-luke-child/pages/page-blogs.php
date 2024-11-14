<?php
/* Template Name: Blogs */

require locate_template('layouts/header.php') ;
$current_page_id = get_queried_object_id();

?>
<div id="frontend-main">
            <!--Start breadcrumb area-->     
<section class="breadcrumb-area">
    <div class="overlay-banner"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <h1>Blog Listing</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End breadcrumb area-->

<!--Start breadcrumb bottom area-->     
<section class="breadcrumb-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-between">
                <div class="left pull-left">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                        <li class="active">Blog Listing</li>
                    </ul>
                </div>
                <div class="right pull-right d-none">
                    <a href="#">
                        <span class="text-light"><i class="fa fa-share-alt" aria-hidden="true"></i>Share</span> 
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
                                 if (has_post_thumbnail()) {
                                    $post_image_url = get_the_post_thumbnail_url($post_id, 'full');
                                } else {
                                    $post_image_url = get_stylesheet_directory_uri().'/assets/images/default-post.png'; 
                                }
                                $comment_count = get_comments_number();
                        ?>
                            <div class="col-md-6">   
                                <div class="single-blog-item wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                                    <div class="img-holder">
                                        <img class="img-fluid" src="<?php echo $post_image_url; ?>" alt="Post Image">
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
                        <?php endwhile;

                        wp_reset_postdata();

                        else :
                            echo '<p class="text-light">No posts found.</p>';
                        endif; ?>
                        <!--End single blog post-->
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
                        <form method="GET" class="search-form" action="<?php echo site_url(); ?>/blogs/">
                            <input placeholder="Search..." type="text" name="search" value="<?php echo isset($_REQUEST['search']) ? $_REQUEST['search'] : ''; ?>">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <!--End single sidebar-->
                    <!--Start single sidebar-->
                    <div class="single-sidebar wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                        <div class="sec-title">
                            <h3>Categories</h3>
                        </div>
                        <ul class="categories clearfix">
                            <?php $categories = get_categories();
                             foreach ($categories as $category){ ?>
                               <li><a href="<?php echo esc_html($category->slug); ?>"><?php echo esc_html($category->name); ?><span>(<?php echo $category->count; ?>)</span></a></li>
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
                                    <img src="./assets/images/blog-image/blog-1.jpg" alt="Awesome Image">
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
                                    <img src="./assets/images/blog-image/blog-2.jpg" alt="Awesome Image">
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
                                    <img src="./assets/images/blog-image/blog-3.jpg" alt="Awesome Image">
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
