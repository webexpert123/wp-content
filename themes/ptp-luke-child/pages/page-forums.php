<?php
/* Template Name: Forums */

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
                        <h1>PTP Community</h1>
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
            <div class="main-body p-0">
                <div class="inner-wrapper">

                    <!-- Inner main -->
                    <div class="inner-main">
                        <!-- Inner main header -->

                        <!-- /Inner main header -->

                        <!-- Inner main body -->

                        <!-- Forum List -->
                        <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
                            <div class="inner-main-header d-flex align-items-center">
                                <div class="input-group mb-3">
                                    <button class="btn btn-warning badge-pill" type="button" data-toggle="modal" data-target="#threadModal">New Discussion</button>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search Forum..">
                                    <div class="input-group-append">
                                        <button type="button" class="input-group-text btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </div>
                            </div>
                            <?php for($i=1;$i<5;$i++){ ?>
                            <div class="card mb-2">
                                <div class="card-body p-2 p-sm-3">
                                    <div class="media forum-item">
                                        <a href="#"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-circle" width="50" alt="User" /></a>
                                        <div class="media-body">
                                            <h6><a href="#">Realtime fetching data</a></h6>
                                            <p class="text-secondary">
                                                lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet
                                            </p>
                                            <p class="text-muted"><a href="javascript:void(0)">drewdan</a> replied <span class="text-secondary font-weight-bold">13 minutes ago</span></p>
                                        </div>
                                        <div class="text-muted small text-center align-self-center">
                                            <!-- <span class="d-none d-sm-inline-block"><i class="far fa-eye"></i> 19</span> -->
                                            <span><i class="far fa-comment ml-2"></i> 3</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <ul class="pagination pagination-sm pagination-circle justify-content-center mb-0">
                                <li class="page-item disabled">
                                    <span class="page-link has-icon"><i class="material-icons">chevron_left</i></span>
                                </li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                                <li class="page-item active"><span class="page-link">2</span></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                <li class="page-item">
                                    <a class="page-link has-icon" href="javascript:void(0)"><i class="material-icons">chevron_right</i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /Forum List -->
                    </div>
                    <!-- /Inner main -->
                </div>

                <!-- New Thread Modal -->
                <div class="modal fade" id="threadModal" tabindex="-1" role="dialog" aria-labelledby="threadModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center bg-dark">
                                <h6 class="modal-title mb-0 text-light" id="threadModalLabel">New Discussion</h6>
                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title<b class="text-danger">*</b></label>
                                                <input class="form-control" name="forum_title" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description<b class="text-danger">*</b></label>
                                                <textarea class="form-control" name="forum_desc" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer col-md-12">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Post</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
