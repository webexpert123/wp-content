     </main>   
<footer data-aos="fade-down" data-aos-duration="1500">
            <div class="footer-cta">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="cta-content">
                            <h2>Shape Champions: Start Your Coaching Journey Today!</h2>
                            <p>Extend your knowledge to athletes across the country and make a lasting impact on their performance and development!</p>
                            <div class="custom-button view-more d-flex align-items-center gap-2 mt-2">
                                <button type="button" class="btn btn-round btn-fill">Become a Coach</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cta_img.png" alt="" />
                    </div>
                </div>
            </div>
            <section id="footer" class="section-spacing ">
                <div class="footer-shape">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 102" preserveAspectRatio="xMinYMin">
                        <polygon fill="#F3F3F3" points="0,65 220,35 562,63 931,10 1410,68 1920,16 1920,103 0,103 "></polygon>
                        <polygon fill="#FFF" points="0,82 219,51 562,78 931,26 1409,83 1920,32 1920,103 0,103 "></polygon>
                    </svg>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <div class="footer-widget about-widget">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo_yellow.png" class="img-fluid" alt="logo image" />
                                <p>In today's soccer landscape, there's immense pressure to excel under team coaches, yet often, these coaches don't provide the essential skills needed for peak performance. </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-2">
                            <div class="footer-widget link-widget">
                                <h4>Navigation</h4>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Athlete</a></li>
                                    <li><a href="#">Coach</a></li>
                                    <li><a href="#">Booking</a></li>
                                    <li><a href="#">Summer Camp</a></li>
                                    <li><a href="<?php echo site_url(); ?>/blogs">Our Blog</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="footer-widget link-widget">
                                <h4>Important Links</h4>
                                <ul>
                                    <li><a href="#">Sign Up</a></li>
                                    <li><a href="#">Login</a></li>
                                    <li><a href="#">Contact</a></li>
                                    <li><a href="#">Locations</a></li>
                                    <li><a href="#">Partners</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="footer-widget social-widget">
                                <h4>Social Media</h4>
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="copyright-area text-center">
                <p>Copyright © 2024 PTP. All Rights Reserved</p>
            </div>
        </footer>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg video-modal" role="document">
          <div class="modal-content">
            <div class="modal-body" style="background-color: #000;">
                <video controls style="width: 100%;">
                    <source src="https://mediumpurple-gazelle-798875.hostingersite.com/ptp_design/home_video.mov" type="video/mp4">
                </video>
            </div>
          </div>
        </div>
      </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    $(document).ready(function(){
        $("#social-slider").owlCarousel({
        items:4,
        itemsDesktop:[1000,4],
        itemsDesktopSmall:[979,3],
        itemsTablet:[768,2],
        margin:20,
        stagePadding: 100,
        pagination:false,
        navigation:false,
        navigationText:["",""],
        autoPlay:true
    });
    $("#testimonial-slider").owlCarousel({
        items:1,
        itemsDesktop:[1000,1],
        itemsDesktopSmall:[979,1],
        itemsTablet:[768,1],
        margin:20,
        pagination:false,
        navigation:true,
        navigationText:["",""],
        autoPlay:true
    });
    $("#ambassedor-carousel").owlCarousel({
        items:5,
        itemsDesktop:[1000,5],
        itemsDesktopSmall:[979,3],
        itemsTablet:[768,2],
        margin:20,
        stagePadding: 100,
        pagination:false,
        navigation:false,
        navigationText:["",""],
        autoPlay:true
    });
    $(".case-study-carousel").owlCarousel({
        items:3,
        itemsDesktop:[1000,3],
        itemsDesktopSmall:[979,2],
        itemsTablet:[768,2],
        margin:20,
        stagePadding: 100,
        pagination:true,
        navigation:false,
        navigationText:["",""],
        autoPlay:true
    });
    $(".brand-ic-main").owlCarousel({
        items:5,
        itemsDesktop:[1000,5],
        itemsDesktopSmall:[979,2],
        itemsTablet:[768,2],
        margin:20,
        stagePadding: 10,
        pagination:true,
        navigation:false,
        navigationText:["",""],
        autoPlay:true
    });
});

    function set_login_url(){
        var currentUrl = window.location.href;
        var date = new Date();
        date.setDate(date.getDate() + 1);
        var expires = "expires=" + date.toUTCString();
        document.cookie = "custom_login_url=" + currentUrl + "; path=/; " + expires;
        window.location.href = "<?php echo site_url('user-login'); ?>";
    }
  </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/main.js"></script>
</html>