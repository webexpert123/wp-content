<?php
/* Template Name: Register */
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PTP-Register</title>
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/main.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- animation library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="auth-layout">
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
                              <h1>Sign up Now</h1>
                              <p>Create a free account to connect with coaches and athletes, <br>and take your skills to the next level!</p>
                              <!-- auth tabs nav -->
                              <div class="auth-tabs">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="coach-tab" data-toggle="tab" data-target="#coach" type="button" role="tab" aria-controls="coach" aria-selected="true">Become a Coach</button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="athlete-tab" data-toggle="tab" data-target="#athlete" type="button" role="tab" aria-controls="athlete" aria-selected="false">As a Athlete</button>
                                  </li>
                                </ul>
                              </div>
                              <!-- auth tabs nav end -->
                             </div>

                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="coach" role="tabpanel" aria-labelledby="coach-tab">
                                  <div class="auth-input-block">
                                    <form action="" id="signupCoach" method="post">
                                      <input type="hidden" name="user_role" value="coach">
                                      <div class="form-group">
                                        <input type="text" name="full_name" class="form-control" id="inputText" placeholder="Full Name*" required>
                                        <label for="input-text"><i class="far fa-user"></i></label>
                                      </div>
                                      <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="emailCoach" placeholder="Email Address*" required>
                                        <label for="input-text"><i class="fa-regular fa-envelope"></i></label>
                                      </div>
                                      <p class="text-danger" id="email_alert_coach" style="display:none;">This email is already exists !</p>
                                      <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="number" name="phone" class="form-control" id="inputPass" placeholder="Phone Number*" required>
                                            <label for="input-pass"><i class="fas fa-phone"></i></label>
                                          </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="number" name="zipcode" class="form-control" id="inputPass" placeholder="Zip Code*" required>
                                            <label for="input-pass"><i class="fas fa-sort-numeric-up-alt"></i></label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="password" name="password" class="form-control" id="password_c" placeholder="Password*" oninput="updateProgressBar()" required>
                                            <label for="input-pass"><i class="fas fa-lock"></i></label>
                                            <div class="pass-toggler-btn">
                                              <i id="eye" class="lar la-eye"></i>
                                              <i id="eye-slash" class="lar la-eye-slash"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="password" name="confirm_password" class="form-control" id="confirm_password_c" placeholder="Confirm Password*" oninput="updateProgressBar()" required>
                                            <label for="input-pass"><i class="fas fa-lock"></i></label>
                                            <div class="pass-toggler-btn">
                                              <i id="eye" class="lar la-eye"></i>
                                              <i id="eye-slash" class="lar la-eye-slash"></i>
                                            </div>
                                          </div>
                                          <p class="text-danger" id="pass_alert_coach" style="display:none;">Both passwords are not same !</p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <select name="sport" class="form-control" id="exampleFormControlSelect1" required>
                                              <option value="">Choose Sport*</option>
                                              <?php
                                              global $wpdb; 
                                              $table = $wpdb->prefix.'sports';
                                              $results = $wpdb->get_results("SELECT * FROM  $table ORDER BY sport_name ASC");
                                              foreach ($results as $row) { ?>
                                                <option value="<?php echo $row->sportID; ?>"><?php echo $row->sport_name; ?></option>
                                              <?php } ?>
                                            </select>
                                            <label for="input-pass"><i class="fas fa-running"></i></label>
                                          </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="number" name="experience" class="form-control" id="inputPass" placeholder="Year of Experience">
                                            <label for="input-pass"><i class="fas fa-sort-numeric-up-alt"></i></label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <input type="text" name="referralCode" class="form-control" id="referralCode_coach" placeholder="Referal Code">
                                        <label for="input-text"><i class="far fa-user"></i></label>
                                      </div>
                                      <p class="text-danger" id="referral_alert_coach" style="display:none;">Invalid Referal Code!</p>
                                      <div id="suggestions" class="mt-2 d-inline-block">
                                        <!-- <p class="suggestion">
                                          Minimum 8 characters long and containing at least one numeric, uppercase, lowercase, and special character.
                                        </p> -->
                                      </div>
                    
                                      <div class="form-group">
                                        <div class="custom-checkbox">
                                          <input type="checkbox" name="checkbox" class="custom-control-input" id="customControlValidation1" required>
                                          <label class="custom-control-label" for="customControlValidation1">I accept the <a href="#" target="_blank">Term of Conditions</a> and <a href="#">Privacy Policy</a></label>
                                        </div>
                                      </div>
                                      <button type="submit" class="btn" id="submitCoach">Sign up Now <div id="coach_spinner" class="spinner-border text-dark" style="display:none;"></div></button>
                                    </form>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="athlete" role="tabpanel" aria-labelledby="athlete-tab">
                                  <div class="auth-input-block">
                                    <form action="" id="signupAthlete" method="post">
                                      <input type="hidden" name="user_role" value="athlete">
                                      <div class="form-group">
                                        <input type="text" name="full_name" class="form-control" id="inputText" placeholder="Full Name" required>
                                        <label for="input-text"><i class="far fa-user"></i></label>
                                      </div>
                                      <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="emailAthlete" placeholder="Email Address" required>
                                        <label for="input-text"><i class="fa-regular fa-envelope"></i></label>
                                      </div>
                                      <p class="text-danger" id="email_alert_athlete" style="display:none;">This email is already exists !</p>
                                      <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="number" name="phone" class="form-control" id="inputPass" placeholder="Phone Number" required>
                                            <label for="input-pass"><i class="fas fa-phone"></i></label>
                                          </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="number" name="zipcode" class="form-control" id="inputPass" placeholder="Zip Code" required>
                                            <label for="input-pass"><i class="fas fa-sort-numeric-up-alt"></i></label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="password" name="password" class="form-control" id="password_a" placeholder="Password" oninput="updateProgressBar()" required>
                                            <label for="input-pass"><i class="fas fa-lock"></i></label>
                                            <div class="pass-toggler-btn">
                                              <i id="eye" class="lar la-eye"></i>
                                              <i id="eye-slash" class="lar la-eye-slash"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="password" name="confirm_password" class="form-control" id="confirm_password_a" placeholder="Confirm Password" oninput="updateProgressBar()" required>
                                            <label for="input-pass"><i class="fas fa-lock"></i></label>
                                            <div class="pass-toggler-btn">
                                              <i id="eye" class="lar la-eye"></i>
                                              <i id="eye-slash" class="lar la-eye-slash"></i>
                                            </div>
                                          </div>
                                          <p class="text-danger" id="pass_alert_athlete" style="display:none;">Both passwords are not same !</p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <!--<div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <select class="form-control" id="exampleFormControlSelect1">
                                              <option value="">Choose Sport</option>
                                              <?php
                                              foreach ($results as $row) { ?>
                                                <option value="<?php echo $row->sportID; ?>"><?php echo $row->sport_name; ?></option>
                                              <?php } ?>
                                            </select>
                                            <label for="input-pass"><i class="fas fa-running"></i></label>
                                          </div>
                                        </div>-->
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group">
                                            <input type="text" name="referralCode" class="form-control" id="referralCode_Athlete" placeholder="Referal Code" onkeyup="check_valid_referral(this)" required>
                                            <label for="input-text"><i class="far fa-user"></i></label>
                                          </div>
                                          <p class="text-danger" id="referral_alert_athlete" style="display:none;">Invalid Referal Code!</p>
                                        </div>
                                      </div>
                                      <div id="suggestions" class="mt-2 d-inline-block">
                                        <!-- <p class="suggestion">
                                          Minimum 8 characters long and containing at least one numeric, uppercase, lowercase, and special character.
                                        </p> -->
                                      </div>
                    
                                      <div class="form-group">
                                        <div class="custom-checkbox">
                                          <input type="checkbox" name="checkbox" class="custom-control-input" id="customControlValidation2" required>
                                          <label class="custom-control-label" for="customControlValidation2">I accept the <a href="#" target="_blank">Term of Conditions</a> and <a href="#">Privacy Policy</a></label>
                                        </div>
                                      </div>
                                      <button type="submit" class="btn" id="submitAthlete">Sign up Now <div id="athlete_spinner" class="spinner-border text-dark" style="display:none;"></div></button>
                                    </form>
                                  </div>
                               </div>
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
                        <p>Already have an account ?  <a href="<?php echo site_url(); ?>/user-login">&nbsp; <strong>Sign In Now!</strong></a></p>
                      </div>
                    </div>
                    <div class="video-content">
                      <h1>Welcome to <span>PTP!</span><br> Connect with the perfect coach to elevate your game.</h1>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the</p>
                      <div class="custom-button view-more mt-4">
                        <button type="button" class="btn btn-round btn-fill">Login Now!</button>
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
<script src="./js/main.js"></script>
<script>
jQuery(document).ready(function($) {
    jQuery('#signupCoach').on('submit', function(event) {
        event.preventDefault();
        var formData = jQuery(this).serialize(); 
        formData += '&action=register_user_ajax';

        var password = getFormFieldValue(formData, 'password');
        var confirmPassword = getFormFieldValue(formData, 'confirm_password');

        if (password !== confirmPassword) {
            Swal.fire({ title: 'Password and confirm password are not same !', text: '', icon: 'error'});
            return false;
        }
        jQuery('#coach_spinner').show();
        jQuery("#submitCoach").attr("disabled",true);
        jQuery.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'POST',
            data: formData, 
            success: function(response) {
                if (response.data.alert_type === 'success') {jQuery('#signupCoach')[0].reset();}
                Swal.fire({ title: response.data.message, text: '', icon: response.data.alert_type});
                jQuery('#coach_spinner').hide();
                jQuery("#submitCoach").attr("disabled",false);
            }
        });
    });

    jQuery('#signupAthlete').on('submit', function(event) {
        event.preventDefault();
        var formData = jQuery(this).serialize(); 
        formData += '&action=register_user_ajax';

        var password = getFormFieldValue(formData, 'password');
        var confirmPassword = getFormFieldValue(formData, 'confirm_password');

        if (password !== confirmPassword) {
            Swal.fire({ title: 'Password and confirm password are not same !', text: '', icon: 'error'});
            return false;
        }
        jQuery('#athlete_spinner').show();
        jQuery("#submitAthlete").attr("disabled",true);
        jQuery.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'POST',
            data: formData, 
            success: function(response) {
                if (response.data.alert_type === 'success') {jQuery('#signupAthlete')[0].reset();}
                Swal.fire({ title: response.data.message, text: '', icon: response.data.alert_type});
                jQuery('#athlete_spinner').hide();
                jQuery("#submitAthlete").attr("disabled",false);
            }
        });
    });
});

function getFormFieldValue(formData, fieldName) {
  var fieldValue = '';
  var dataArray = formData.split('&');
  jQuery.each(dataArray, function(index, value) {
    var pair = value.split('=');
    if (pair[0] === fieldName) {
      fieldValue = decodeURIComponent(pair[1].replace(/\+/g, ' '));
      return false;
    }
  });
  return fieldValue;
}

function check_email(email,msg,submit){
  jQuery.ajax({
    url: "/wp-admin/admin-ajax.php",
    type: 'POST',
    data: {action:"check_user_email", email:email}, 
    success: function(response) {
      var result = JSON.parse(response); 
      if(result.status === 1){
        $(msg).show();
        $(submit).attr("disabled",true);
      }
      else{
        $(msg).hide();
        $(submit).attr("disabled",false);
      }
    }
  });
}

jQuery("#emailCoach").change(function(){
   var email = jQuery("#emailCoach").val(); 
   check_email(email, "#email_alert_coach", "#submitCoach");
});

jQuery("#password_c, #confirm_password_c").change(function(){
  var password_c = jQuery("#password_c").val();
  var confirm_password_c = jQuery("#confirm_password_c").val();
  if(password_c!="" && confirm_password_c!=""){
    if (password_c !== confirm_password_c) {
      jQuery("#pass_alert_coach").show();
    }else{
      jQuery("#pass_alert_coach").hide();
    }
  }
});

jQuery("#referralCode_coach").keyup(function(){
   var referralCode = jQuery("#referralCode_coach").val(); 
   check_referralCode(referralCode, "#referral_alert_coach", "#submitCoach");
});

function check_referralCode(referralCode,msg,submit){
  if(referralCode===""){
    $(msg).hide();
    return false;
  }

  jQuery.ajax({
    url: "/wp-admin/admin-ajax.php",
    type: 'POST',
    data: {action:"check_user_referralCode", referralCode:referralCode}, 
    success: function(response) {
      var result = JSON.parse(response); 
      if(result.count == 0){
        $(msg).show();
      }
      else{
        $(msg).hide();
      }
    }
  });
}


jQuery("#emailAthlete").change(function(){
   var email = jQuery("#emailAthlete").val(); 
   check_email(email, "#email_alert_athlete", "#submitAthlete");
});

jQuery("#password_a, #confirm_password_a").change(function(){
  var password_a = jQuery("#password_a").val();
  var confirm_password_a = jQuery("#confirm_password_a").val();
  if(password_a!="" && confirm_password_a!=""){
    if (password_a !== confirm_password_a) {
      jQuery("#pass_alert_athlete").show();
    }else{
      jQuery("#pass_alert_athlete").hide();
    }
  }
});

function check_valid_referral(inputElement){
  var referralCode = $(inputElement).val();console.log("referralCode",referralCode); 
  check_referralCode(referralCode, "#referral_alert_athlete", "#submitAthlete");
}
</script>
</html>