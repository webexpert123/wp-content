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
                              <!-- <div class="auth-third-party-login">
                                  <div class="row">
                                      <div class="col-md-12 col-lg-6">
                                          <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/auth/google.png" alt=""> Login with Google</a>
                                      </div>
                                      <div class="col-md-12 col-lg-6">
                                          <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/auth/facebook.png" alt=""> Login with Facebook</a>
                                      </div>
                                  </div>
                              </div>
                              <div class="auth-block-separator">
                                <p>Or</p> 
                              </div> -->
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="coach" role="tabpanel" aria-labelledby="coach-tab">
                                  <div class="auth-input-block">
                                    <form action="register-complete.html" id="commentForm">
                                      <div class="form-group">
                                        <input type="text" name="text" class="form-control" id="inputText" placeholder="Full Name" required>
                                        <label for="input-text"><i class="far fa-user"></i></label>
                                      </div>
                                      <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="inputText" placeholder="Email Address" required>
                                        <label for="input-text"><i class="fa-regular fa-envelope"></i></label>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="number" name="Phone Number" class="form-control" id="inputPass" placeholder="Phone Number" required>
                                            <label for="input-pass"><i class="fas fa-phone"></i></label>
                                          </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="number" name="Zip Code" class="form-control" id="inputPass" placeholder="Zip Code" required>
                                            <label for="input-pass"><i class="fas fa-sort-numeric-up-alt"></i></label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="password" name="pass" class="form-control" id="inputPass" placeholder="Password" oninput="updateProgressBar()" required>
                                            <label for="input-pass"><i class="fas fa-lock"></i></label>
                                            <div class="pass-toggler-btn">
                                              <i id="eye" class="lar la-eye"></i>
                                              <i id="eye-slash" class="lar la-eye-slash"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="password" name="Confirm Password" class="form-control" id="inputPass" placeholder="Confirm Password" oninput="updateProgressBar()" required>
                                            <label for="input-pass"><i class="fas fa-lock"></i></label>
                                            <div class="pass-toggler-btn">
                                              <i id="eye" class="lar la-eye"></i>
                                              <i id="eye-slash" class="lar la-eye-slash"></i>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <select class="form-control" id="exampleFormControlSelect1">
                                              <option>Sports</option>
                                              <option>Rugby</option>
                                              <option>Soccer</option>
                                              <option>Taekwon-DO</option>
                                              <option>Martial Art</option>
                                            </select>
                                            <label for="input-pass"><i class="fas fa-running"></i></label>
                                          </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="number" name="experience" class="form-control" id="inputPass" placeholder="Year of Experience" required>
                                            <label for="input-pass"><i class="fas fa-sort-numeric-up-alt"></i></label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <input type="text" name="text" class="form-control" id="inputText" placeholder="Referal Code" required>
                                        <label for="input-text"><i class="far fa-user"></i></label>
                                      </div>
                                      <div id="suggestions" class="mt-2 d-inline-block">
                                        <p class="suggestion">
                                          Minimum 8 characters long and containing at least one numeric, uppercase, lowercase, and special character.
                                        </p>
                                      </div>
                    
                                      <div class="form-group">
                                        <div class="custom-checkbox">
                                          <input type="checkbox" name="checkbox" class="custom-control-input" id="customControlValidation1" required>
                                          <label class="custom-control-label" for="customControlValidation1">I accept the <a href="#" target="_blank">Term of Conditions</a> and <a href="#">Privacy Policy</a></label>
                                        </div>
                                      </div>
                                      <button type="submit" class="btn">Sign up Now</button>
                                    </form>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="athlete" role="tabpanel" aria-labelledby="athlete-tab">
                                  <div class="auth-input-block">
                                    <form action="register-complete.html" id="commentForm">
                                      <div class="form-group">
                                        <input type="text" name="text" class="form-control" id="inputText" placeholder="Full Name" required>
                                        <label for="input-text"><i class="far fa-user"></i></label>
                                      </div>
                                      <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="inputText" placeholder="Email Address" required>
                                        <label for="input-text"><i class="fa-regular fa-envelope"></i></label>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="number" name="Phone Number" class="form-control" id="inputPass" placeholder="Phone Number" required>
                                            <label for="input-pass"><i class="fas fa-phone"></i></label>
                                          </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="number" name="Zip Code" class="form-control" id="inputPass" placeholder="Zip Code" required>
                                            <label for="input-pass"><i class="fas fa-sort-numeric-up-alt"></i></label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="password" name="pass" class="form-control" id="inputPass" placeholder="Password" oninput="updateProgressBar()" required>
                                            <label for="input-pass"><i class="fas fa-lock"></i></label>
                                            <div class="pass-toggler-btn">
                                              <i id="eye" class="lar la-eye"></i>
                                              <i id="eye-slash" class="lar la-eye-slash"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <input type="password" name="Confirm Password" class="form-control" id="inputPass" placeholder="Confirm Password" oninput="updateProgressBar()" required>
                                            <label for="input-pass"><i class="fas fa-lock"></i></label>
                                            <div class="pass-toggler-btn">
                                              <i id="eye" class="lar la-eye"></i>
                                              <i id="eye-slash" class="lar la-eye-slash"></i>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group pass-block">
                                            <select class="form-control" id="exampleFormControlSelect1">
                                              <option>Sports</option>
                                              <option>Rugby</option>
                                              <option>Soccer</option>
                                              <option>Taekwon-DO</option>
                                              <option>Martial Art</option>
                                            </select>
                                            <label for="input-pass"><i class="fas fa-running"></i></label>
                                          </div>
                                        </div>
                                        <div class="col-md-12 col-lg-6">
                                          <div class="form-group">
                                            <input type="text" name="text" class="form-control" id="inputText" placeholder="Referal Code" required>
                                            <label for="input-text"><i class="far fa-user"></i></label>
                                          </div>
                                        </div>
                                      </div>
                                      <div id="suggestions" class="mt-2 d-inline-block">
                                        <p class="suggestion">
                                          Minimum 8 characters long and containing at least one numeric, uppercase, lowercase, and special character.
                                        </p>
                                      </div>
                    
                                      <div class="form-group">
                                        <div class="custom-checkbox">
                                          <input type="checkbox" name="checkbox" class="custom-control-input" id="customControlValidation1" required>
                                          <label class="custom-control-label" for="customControlValidation1">I accept the <a href="#" target="_blank">Term of Conditions</a> and <a href="#">Privacy Policy</a></label>
                                        </div>
                                      </div>
                                      <button type="submit" class="btn">Sign up Now</button>
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
                        <p>Already have an account ?  <a href="login.html">&nbsp; <strong>Sign In Now!</strong></a></p>
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
</html>