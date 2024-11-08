     </main>   
     <footer data-aos="fade-down" data-aos-duration="1500">
            <div class="footer-cta">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="cta-content">
                            <h2>Shape Champions: Start Your Coaching Journey Today!</h2>
                            <p>Extend your knowledge to athletes across the country and make a lasting impact on their performance and development!</p>
                            <div class="custom-button view-more d-flex align-items-center gap-2 mt-2">
                                <button type="button" class="btn btn-round btn-fill">View Plans</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cta_img.png" alt="" />
                    </div>
                </div>
            </div>
            <section id="footer" class="section-spacing ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <div class="footer-widget about-widget">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" class="img-fluid" alt="logo image" />
                                <p>In today's soccer landscape, there's immense pressure to excel under team coaches, yet often, these coaches don't provide the essential skills needed for peak performance. </p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-2">
                            <div class="footer-widget link-widget">
                                <h4>Navigation</h4>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Athlete</a></li>
                                    <li><a href="#">Coach</a></li>
                                    <li><a href="#">Features</a></li>
                                    <li><a href="#">Training Plans</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="footer-widget link-widget">
                                <h4>Important Links</h4>
                                <ul>
                                    <li><a href="<?php echo site_url(); ?>/register">Sign Up</a></li>
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
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    $(document).ready(function(){
    $('#social-slider').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        autoplay:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:5,
                nav:true,
                loop:false
            }
        }
    });
});

    $(document).ready(function(){
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
});
  </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/main.js"></script>
</html>