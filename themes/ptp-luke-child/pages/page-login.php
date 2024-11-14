<?php
/* Template Name: User Login */
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PTP-Login</title>
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
                                    <h1>Login Now</h1>
                                  </div>
                                  <div class="auth-input-block">
                                  <form action="" method="post" id="LoginForm">
                                    <div class="form-group">
                                      <input type="email" name="email" class="form-control" id="inputText" placeholder="Email Address" required>
                                      <label for="input-text"><i class="fa-regular fa-envelope"></i></label>
                                    </div>
                                    <div class="form-group pass-block">
                                      <input type="password" name="pass" class="form-control" id="inputPass" placeholder="Password" oninput="updateProgressBar()" required>
                                      <label for="input-pass"><i class="fas fa-lock"></i></label>
                                      <div class="pass-toggler-btn">
                                        <i id="eye" class="lar la-eye"></i>
                                        <i id="eye-slash" class="lar la-eye-slash"></i>
                                      </div>
                                    
                                    </div>
                                    <div id="suggestions" class="mt-2 d-inline-block">
                                     <!--  <p class="suggestion">
                                        Minimum 8 characters long and containing at least one numeric, uppercase, lowercase, and special character.
                                      </p> -->
                                    </div>
                                    <div class="form-group">
                                      <?php wp_nonce_field('user_login', 'user_login_nonce'); ?>
                                      <a href="<?php site_url(); ?>/forgot-password/">Forgot Password ?</a>
                                      <!-- <div class="custom-checkbox">
                                        <input type="checkbox" name="checkbox" class="custom-control-input" id="customControlValidation1" required>
                                        <label class="custom-control-label" for="customControlValidation1">I accept the <a href="#" target="_blank">Term of Conditions</a> and <a href="#">Privacy Policy</a></label>
                                      </div> -->
                                    </div>
                                    <button type="submit" class="btn" id="loginSubmit">Login Now <div id="spinner" class="spinner-border text-dark" style="display:none;"></div></button>
                                  </form>
                                  </div>
                                  <div class="auth-block-separator">
                                    <p>Or</p> 
                                  </div>
                                  <div class="auth-third-party-login">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/auth/google.png" alt=""> Login with Google</a>
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
                  </div>
                </div>
            </section>
        </div>
       
    </main>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/main.js"></script>
<script>
    AOS.init();

    jQuery('#LoginForm').on('submit', function(event) {
        event.preventDefault();
        var formData = jQuery(this).serialize(); 
        formData += '&action=login_submit_user';

        jQuery('#spinner').show();
        jQuery("#loginSubmit").attr("disabled",true);
        jQuery.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'POST',
            data: formData, 
            success: function(response) {
                if (response.data.alert_type === 'success') { window.location.href = response.data.redirectURL; }
                Swal.fire({ title: response.data.message, text: '', icon: response.data.alert_type});
                jQuery('#spinner').hide();
                jQuery("#loginSubmit").attr("disabled",false);
            }
        });
    });
  </script>
</html>