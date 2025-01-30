<div class="dashboard-main">
                    <div class="row">
                        <div class="col page-title">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2 class="m-0">My Athletes List</h2>
                                <div class="d-flex align-items-center pd-3">
                                    <ul class="breadcrumbs">
                                        <li><a href="#">Home</a></li>
                                        <li>My Athletes </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- top cols of dashboard -->
                    <div class="profile-page">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="student-info">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>S. No.</th>
                                                                <th>IMAGE</th>
                                                                <th>ATHLETE NAME</th>
                                                                <th>CONTACT</th>
                                                                <th>SESSION BOOKED</th>
                                                                <th>ACTION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            global $wpdb;
                                                            $i=0;
                                                            $results = $wpdb->get_results($wpdb->prepare("SELECT meta_value, MIN(order_id) AS order_id FROM {$wpdb->prefix}wc_orders_meta WHERE meta_key = '_session_booked_by' GROUP BY meta_value "));
                                                            foreach ($results as $oid) {
                                                              $athleteID = $oid->meta_value;
                                                              $athlete_name = get_user_meta($athleteID, "fullname", true);
                                                              $athlete_phone = get_user_meta($athleteID, "phone", true);
                                                              $athlete_info = get_userdata($athleteID);
                                                              $athlete_email = $athlete_info->user_email;
                                                              $attachment_id = get_user_meta($athleteID, "_profile_pic_id", true);
                                                              if( $attachment_id ) {
                                                                $profile_img_link = wp_get_attachment_image_url($attachment_id, 'thumbnail');
                                                              }else{
                                                                $profile_img_link = get_stylesheet_directory_uri()."/assets/images/profile_img.png";
                                                              } ?>
                                                            <tr>
                                                               <th><?php echo ++$i; ?>.</th>
                                                               
                                                               <td><img src="<?php echo $profile_img_link; ?>" class="img-fluid" width="70" height="70"></td>

                                                               <td><?php echo $athlete_name; ?><br>  

                                                               <a class="text-success text-underline" href="javascript:void(0);" data-toggle="modal" data-target="#myModal<?php echo $athleteID; ?>">See full details</a>

                                                               <div class="modal" id="myModal<?php echo $athleteID; ?>">
                                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                  <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      <h4 class="modal-title text-light">FULL DETAILS OF ATHLETE</h4>
                                                                      <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body text-light">
                                                                      <table class="table table-bordered bg-dark">
                                                                          <tr>
                                                                              <th>ATHLETE NAME</th>
                                                                              <td><?php echo $athlete_name; ?></td>
                                                                          </tr>
                                                                          <tr>
                                                                              <th>CITY</th>
                                                                              <td><?php echo get_user_meta($athleteID, "_city", true); ?></td>
                                                                          </tr>
                                                                          <tr>
                                                                              <th>ZIPCODE</th>
                                                                              <td><?php echo get_user_meta($athleteID, "_zipcode", true); ?></td>
                                                                          </tr>
                                                                          <tr>
                                                                              <th>STRENGTH</th>
                                                                              <td><?php echo get_user_meta($athleteID, "_strength", true); ?></td>
                                                                          </tr>
                                                                          <tr>
                                                                              <th>WEAKNESS</th>
                                                                              <td><?php echo get_user_meta($athleteID, "_weakness", true); ?></td>
                                                                          </tr>
                                                                          <tr>
                                                                              <th>INTRESTS</th>
                                                                              <td><?php echo get_user_meta($athleteID, "_intrests", true); ?></td>
                                                                          </tr>
                                                                      </table>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                               </td>

                                                               <td><b>Email:</b> <?php echo $athlete_email; ?><br>
                                                               <b>Phone:</b> <?php echo $athlete_phone; ?></td>

                                                               <td><?php echo $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) AS booked_session_count FROM {$wpdb->prefix}wc_orders_meta WHERE meta_key = '_session_booked_by' AND meta_value='$athleteID' ")); ?></td>

                                                               <td><a href="<?php echo site_url('my-account-coach/?section=messages&rid='.md5($athleteID)); ?>" class="btn btn-success btn-sm">MESSAGE</a>
                                                                <a href="?section=students-history&student_id=<?php echo $athleteID; ?>" class="btn btn-success btn-sm">HISTORY</a></td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>S. No.</th>
                                                                <th>IMAGE</th>
                                                                <th>ATHLETE NAME</th>
                                                                <th>CONTACT</th>
                                                                <th>SESSION BOOKED</th>
                                                                <th>ACTION</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>