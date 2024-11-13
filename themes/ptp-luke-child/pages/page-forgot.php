<?php
/* Template Name: Forgot Password */
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PTP-Forgot Password</title>
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/main.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- animation library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="auth-layout login">
    <main>
        <div id="auth-main">
            <section id="auth-section" class="auth-block auth-bg register-bg">
                <div class="auth-block">
                  <div class="row">
                    <div class="col-12">
                      <div class="auth-content-block">
                        <div class="d-flex align-items-center justify-content-between auth-head">
                          <div class="auth-logo">
                            <a href="<?php echo site_url(); ?>">
                              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" class="img-fluid" alt="">
                            </a>
                          </div>
                          <div class="auth-link">
                            <div class="alternet-access">
                              <p>Don't have an account ?  <a href="<?php echo site_url(); ?>/register">&nbsp; <strong>Register Now!</strong></a></p>
                            </div>
                          </div>
                        </div>
                        <div class="video-bg">
                          <div class="video-overlay"></div>
                            <video autoplay muted loop>
                                <source src="https://mediumpurple-gazelle-798875.hostingersite.com/ptp_design/home_video.mov" type="video/mp4">
                            </video>
                        </div>
                        <div class="video-content">
                          <div class="row align-items-center">
                          <div class="col-md-12">
                            <div class="form-block">
                                <div class="form-area">
                                  <div class="auth-form-block-header">
                                    <h1>Forgot Password</h1>
                                  </div>
                                  <div class="auth-input-block">
                                  <form action="" method="post" id="forgotForm">
                                    <div class="form-group">
                                      <input type="email" name="email" class="form-control" id="emailAddress" placeholder="Email Address" required>
                                      <label for="input-text"><i class="fa-regular fa-envelope"></i></label>
                                    </div>
                                    <button type="submit" id="forgotSubmit" class="btn">Request Password Reset <div id="spinner" class="spinner-border text-dark" style="display:none;"></div></button>
                                  </form>
                                  </div>
                                  
                              </div>
                            </div>
                          </div>
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
        var email = jQuery('#emailAddress').val();
        jQuery('#spinner').show();
        jQuery("#forgotSubmit").attr("disabled",true);
        jQuery.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'POST',
            data: {action:"forgot_password_submit_user", email:email}, 
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