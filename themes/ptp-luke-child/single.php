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
                    <h1><?php the_title(); ?></h1>
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
                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                        <li><a href="<?php echo site_url(); ?>/blogs">Blogs</a></li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                        <li class="active"><?php the_title(); ?></li>
                    </ul>
                </div>
                <div class="right pull-right">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
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
                            <div class="col-md-12"> 
                            	<div class="post-featured-image">
							       <?php
							       $post_id = get_the_ID();
							       if (has_post_thumbnail()) {
							           $featured_image_url = get_the_post_thumbnail_url($post_id, 'large');
							           echo "<img src='".$featured_image_url."' class='img-fluid'>";
							       }
							       $author_id = get_post_field('post_author', $post_id);
							       ?>
							    </div>

							    <div class="post-details mt-5 text-light">
							    	<b class="text-warning">Published On : </b> <span><?php echo get_the_date('F j, Y', $post_id); ?></span> 
							    	<span class="seperate"> | </span>
							    	<b class="text-warning">Author : </b> <span><?php echo get_the_author_meta('display_name', $author_id);  ?></span>
							    </div>

							    <h2 class="text-warning mt-5"><?php the_title(); ?></h2>
							    <div class="post-content mt-5 text-light"> <?php the_content(); ?></div>
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
                    <div class="single-sidebar wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                        <form method="GET" class="search-form" action="<?php echo site_url(); ?>/blogs/">
                            <input placeholder="Search..." type="text" name="search" value="<?php echo isset($_REQUEST['search']) ? $_REQUEST['search'] : ''; ?>" required>
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
