<?php
/* Template Name: Reset Password */
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PTP-Reset Password</title>
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/main.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- animation library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="auth-layout login">
  <?php
  $userID = 0;
  if( isset($_REQUEST['uid']) && $_REQUEST['uid'] != "" ){
    global $wpdb;
    $md5_uid = $_REQUEST['uid'];
    $result = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM {$wpdb->prefix}users WHERE MD5(ID) ='$md5_uid' "));
    if ($result > 0) {
        $userID = $wpdb->get_var($wpdb->prepare("SELECT ID FROM {$wpdb->prefix}users WHERE md5(ID) = '$md5_uid' "));
    }
    else{ ?>
    <script>
       Swal.fire({
        title: 'Invalid URL !',
        text: '',
        icon: 'error',
        backdrop: true, 
        allowOutsideClick: false, 
        allowEscapeKey: false,    
        showConfirmButton: false, 
        showCancelButton: false,  
        focusConfirm: false
      });
    </script>
    <?php 
    }
  }else{ ?>
    <script>
       Swal.fire({
        title: 'Invalid URL !',
        text: '',
        icon: 'error',
        backdrop: true, 
        allowOutsideClick: false, 
        allowEscapeKey: false,    
        showConfirmButton: false, 
        showCancelButton: false,  
        focusConfirm: false
      });
    </script>
  <?php
  }
  ?>
    <main>
        <div id="auth-main">
            <section id="auth-section" class="auth-block auth-bg register-bg">
                <div class="auth-block">
                  <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5">
                      <div class="form-block">
                            <div class="auth-logo">
                                <a href="index.html">
                                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" class="img-fluid" alt="">
                                </a>
                              </div>
                              <div class="form-area">
                                <div class="auth-form-block-header">
                                  <h1>Reset Password</h1>
                                  <p>Set your new password.</p>
                                </div>
                                <!-- <div class="auth-third-party-login">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/auth/google.png" alt=""> Login with Google</a>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/auth/facebook.png" alt=""> Login with Facebook</a>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="auth-block-separator">
                                  <p>Or</p> 
                                </div> -->
                                <div class="auth-input-block">
                                  <form action="" method="post" id="forgotForm">
                                    <input type="hidden" name="userid" value="<?php echo $userID; ?>">
                                    <div class="form-group">
                                      <input type="password" name="password" class="form-control" id="password" placeholder="Enter new password" required>
                                      <label for="input-text"><i class="fa-regular fas fa-lock"></i></label>
                                    </div>
                                    <div class="form-group">
                                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Re-enter new password" required>
                                      <label for="input-text"><i class="fa-regular fas fa-lock"></i></label>
                                    </div>
                                    <button type="submit" id="forgotSubmit" class="btn">Change Password <div id="spinner" class="spinner-border text-dark" style="display:none;"></div></button>
                                  </form>
                                </div>
                            </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-7">
                      <div class="auth-content-block">
                        <div class="video-bg">
                          <div class="video-overlay"></div>
                            <video autoplay muted loop>
                                <source src="https://mediumpurple-gazelle-798875.hostingersite.com/ptp_design/home_video.mov" type="video/mp4">
                            </video>
                        </div>
                        <div class="auth-link">
                          <div class="alternet-access">
                            <p>Don't have an account ?  <a href="register.html">&nbsp; <strong>Register Now!</strong></a></p>
                          </div>
                        </div>
                        <div class="video-content">
                          <h1>Welcome to <span>PTP!</span><br> Connect with the perfect coach to elevate your game.</h1>
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the</p>
                          <div class="custom-button view-more mt-4">
                            <button type="button" class="btn btn-round btn-fill">Register Now!</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </section>
        </div>
       
    </main>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/main.js"></script>
  <script>
    AOS.init();

    jQuery('#forgotForm').on('submit', function(event) {
        event.preventDefault();
        var formData = jQuery(this).serialize(); 
        formData += '&action=reset_password_submit_user';
        var password = jQuery("#password").val();
        var confirmPassword = jQuery("#confirm_password").val();

        if (password !== confirmPassword) {
            Swal.fire({ title: 'Password and confirm password are not same !', text: '', icon: 'error'});
            return false;
        }

        jQuery('#spinner').show();
        jQuery("#forgotSubmit").attr("disabled",true);
        jQuery.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'POST',
            data: formData, 
            success: function(response) {
                if (response.data.alert_type === 'success') {jQuery('#forgotForm')[0].reset();}
                Swal.fire({ title: response.data.message, text: '', icon: response.data.alert_type});
                jQuery('#spinner').hide();
                jQuery("#forgotSubmit").attr("disabled",false);
            }
        });
    });
  </script>
</html>