<div class="dashboard-main">
                    <div class="row">
                        <div class="col page-title">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2 class="m-0">Summer Camps</h2>
                                <div class="d-flex align-items-center pd-3">
                                    <ul class="breadcrumbs">
                                        <li><a href="#">Home</a></li>
                                        <li>Summer Camps</li>
                                    </ul>
                                    <div class="page-edit-action">
                                        <button type="button" data-toggle="modal" data-target="#add_t-plans"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>&nbsp;Create Summer Camps</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- top cols of dashboard -->
                    <div class="profile-page">
                        <div class="row">
                        <div class="col-lg-12 event_listing">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 event_listing_items">
                                        <?php
                                        $args = array(
                                            'post_type' => 'summer-camps', 
                                            'posts_per_page' => -1, 
                                            'author' => $user_id,
                                            'post_status'    => array('publish', 'draft') 
                                        );
                                        $query = new WP_Query($args);
                                        while ($query->have_posts()) {
                                            $query->the_post();
                                            $post_id = get_the_ID();
                                            $created_date = get_the_date('F j, Y', $post_id);
                                            $post_status = get_post_status($post_id);
                                            $post_content = get_the_content();
                                            $event_start = get_post_meta($post_id, "_event_from_date", true);
                                            $event_start_date = date("d/m/Y h:i A", strtotime($event_start));
                                            $event_end = get_post_meta($post_id, "_event_to_date", true);
                                            $event_end_date = date("d/m/Y h:i A", strtotime($event_end));
                                            $event_location = get_post_meta($post_id, "_event_location", true);
                                            $event_price = get_post_meta($post_id, "_event_price", true);
                                            $productID = get_post_meta($post_id, "_product_id", true);
                                            $attachment_id = get_post_meta($post_id, "_thumbnail_id", true);
                                            if( $attachment_id ) {
                                                $thumbnail_url = wp_get_attachment_image_url($attachment_id, 'thumbnail');
                                            }else{
                                                $thumbnail_url = get_stylesheet_directory_uri()."/assets/images/default-post.png";
                                            } ?>
                                            <div class="event-item p-4 d-flex align-items-start mb-3">
                                                    <div class="event-heading">
                                                        <h3><?php echo get_the_title(); ?></h3>
                                                        <div class="d-flex align-items-center"><span><i class="bx bx-pin"></i>&nbsp; <?php echo $event_location; ?>&nbsp;</span><span><i class="bx bx-calendar"></i>&nbsp; <?php echo $event_start_date; ?> to <?php echo $event_end_date; ?>&nbsp;</span></div>
                                                    </div>
                                                    <div class="event-pricing">
                                                        <h4>$<?php echo $event_price; ?></h4>
                                                    </div>
                                                    <div class="text-light">
                                                        <b>Create at:</b> <?php echo $created_date; ?><br>
                                                        <b>Status:</b> <?php echo strtoupper($post_status); ?>
                                                    </div>
                                                <div class="event-action">
                                                    <a href="javascript:void(0)" class="edit_action" data-toggle="modal" data-target="#edit_modal" data-id="<?php echo $post_id; ?>" data-title="<?php echo get_the_title(); ?>" data-content="<?php echo base64_encode($post_content); ?>" data-price="<?php echo $event_price; ?>" data-from_date="<?php echo date("Y-m-d h:i A", strtotime($event_start)); ?>" data-end_date="<?php echo date("Y-m-d h:i A", strtotime($event_end)); ?>" data-location="<?php echo $event_location; ?>"  data-status="<?php echo $post_status; ?>"  data-productid="<?php echo $productID; ?>" data-imageurl="<?php echo $thumbnail_url; ?>"><i class="bx bx-edit-alt"></i></a>
                                                    <a href="javascript:void(0)" class="delete_action" data-id="<?php echo $post_id; ?>"><i class="bx bx-trash-alt"></i></a>
                                                </div>
                                            </div>
                                        <?php }
                                        wp_reset_postdata(); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="add_t-plans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Create Summer Camp</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="eventSubmitFrom" action="" method="post" enctype="multipart/form-data">
                                            <div class="row mb-3 profile-overview">
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Event Title<b class="text-danger">*</b></label>
                                                        <input type="text" class="form-control" id="" name="event_title" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Pricing<b class="text-danger">*</b></label>
                                                        <input type="number" class="form-control" id="" name="event_price" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Event From<b class="text-danger">*</b></label>
                                                        <input type="text" class="form-control" id="datetimepicker" name="event_date_from" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Event To<b class="text-danger">*</b></label>
                                                        <input type="text" class="form-control" id="datetimepicker2" name="event_date_to" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Location<b class="text-danger">*</b></label>
                                                        <input type="text" class="form-control" id="" name="event_location" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Image<b class="text-danger">*</b></label>
                                                        <input type="file" class="form-control" id="" name="event_image" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Description</label>
                                                        <textarea type="text" class="form-control" name="event_description"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-warning" name="add_event" id="eventSubmit">Save <div id="spinner" class="spinner-border text-dark" style="display:none;"></div></button>
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

                    <!--START EDIT MODAL-->
                    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Summer Camp</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="eventEditSubmitFrom" action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" id="postid" name="postid" value="">
                                            <input type="hidden" id="productid" name="productid" value="">
                                            <div class="row mb-3 profile-overview">
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group" id="post_image">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Event Title<b class="text-danger">*</b></label>
                                                        <input type="text" class="form-control" id="event_title" name="event_title" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Pricing<b class="text-danger">*</b></label>
                                                        <input type="number" class="form-control" id="event_price" name="event_price" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Event From<b class="text-danger">*</b></label>
                                                        <input type="text" class="form-control" id="Edit_datetimepicker" name="event_date_from" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Event To<b class="text-danger">*</b></label>
                                                        <input type="text" class="form-control" id="Edit_datetimepicker2" name="event_date_to" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Location<b class="text-danger">*</b></label>
                                                        <input type="text" class="form-control" id="event_location" name="event_location" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Change Image (Optional)</label>
                                                        <input type="file" class="form-control" id="" name="event_image">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Status<b class="text-danger">*</b></label>
                                                        <select type="text" class="form-control" id="event_status" name="event_status" required>
                                                            <option value="">Select Status</option>
                                                            <option value="publish">Publish</option>
                                                            <option value="draft">Draft</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="">Description</label>
                                                        <textarea type="text" class="form-control" id="event_description" name="event_description"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-warning" name="add_event" id="eventEditSubmit">Save <div id="Editspinner" class="spinner-border text-dark" style="display:none;"></div></button>
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
                    <!--END EDIT MODAL-->
                </div>
<script>
    jQuery('#eventSubmitFrom').on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        formData.append('action', 'submit_summercamp_event');

        jQuery('#spinner').show();
        jQuery("#eventSubmit").attr("disabled",true);

        jQuery.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false, 
            success: function(response) {
                if (response.data.alert_type === 'success') {jQuery('#eventSubmitFrom')[0].reset();}
                Swal.fire({ 
                    title: response.data.message, text: '', icon: response.data.alert_type
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
                jQuery('#spinner').hide();
                jQuery("#eventSubmit").attr("disabled",false);
            }
        });
    });

    jQuery('#eventEditSubmitFrom').on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        formData.append('action', 'update_summercamp_event');

        jQuery('#Editspinner').show();
        jQuery("#eventEditSubmit").attr("disabled",true);

        jQuery.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'POST',
            data: formData, 
            contentType: false,
            processData: false,
            success: function(response) {
                Swal.fire({ 
                    title: response.data.message, text: '', icon: response.data.alert_type
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
                jQuery('#Editspinner').hide();
                jQuery("#eventEditSubmit").attr("disabled",false);
            }
        });
    });

    jQuery('.edit_action').on('click', function() {
        jQuery("#postid").val($(this).data('id'));
        jQuery("#productid").val($(this).data('productid'));
        jQuery("#event_title").val($(this).data('title'));
        jQuery("#event_description").val(atob($(this).data('content')));
        jQuery("#Edit_datetimepicker").val($(this).data('from_date'));
        jQuery("#Edit_datetimepicker2").val($(this).data('end_date'));
        jQuery("#event_location").val($(this).data('location'));
        jQuery("#event_price").val($(this).data('price'));
        jQuery("#event_status").val($(this).data('status'));
        jQuery("#event_status").trigger('change');
        var imageurl = $(this).data('imageurl');
        jQuery("#post_image").html("<img src='"+imageurl+"' class='img-fluid'>");
    });

    jQuery('.delete_action').on('click', function() {
        var postid = $(this).data('id');
        Swal.fire({
          title: "Delete Confirmation",
          text: "Are you sure you want to delete this ?",
          icon: "question",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Confirm"
        }).then((result) => {
          if (result.isConfirmed) {
            jQuery.ajax({
                url: "/wp-admin/admin-ajax.php",
                type: 'POST',
                data: {action:"delete_summercamp", postid:postid}, 
                success: function(response) {
                    if (response.data.alert_type == 'success') {
                        Swal.fire({ 
                            title: "Deleted Successfully", text: '', icon: 'success'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }else{
                      Swal.fire({ title: "Something is wrong !", text: '', icon: "error"});
                    }
                }
            });
          }
        });
    });
  </script>