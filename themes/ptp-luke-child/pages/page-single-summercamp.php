<?php
/* Template Name: Single Summercamp */

require locate_template('layouts/header.php') ;
global $wpdb;
$camp_slug = get_query_var('camp_slug');
$post = get_posts([
    'name'        => $camp_slug,
    'post_type'   => 'summer-camps',
    'post_status' => 'publish',
    'numberposts' => 1,
]);

if (!empty($post)) {
    $post_details = $post[0];
    $post_title = $post_details->post_title;
    $post_content = $post_details->post_content;
} else {
    wp_redirect(site_url());
}
?>
<div id="frontend-main">
    <!-- Profile page design -->
    <section id="profile-layout" class="section-spacing pt-5 pb-0 camp-main">
        <div class="container">
            <!-- profile top start -->
            <div class="profile-top" data-aos="fade-right" data-aos-duration="1500">
                <div class="row">
                    <!-- <span class="price">$70<br><span>For Weekly Lesson</span></span> -->
                    <div class="col-md-5 col-lg-5">
                        <div class="profile-sidebar">
                            <div class="coach-card">
                                <div class="card">
                                    <div class="card-header p-0">
                                        <?php
                                           $post_id = $post_details->ID;
                                           $featured_image_url = get_the_post_thumbnail_url($post_id, 'large');
                                           if($featured_image_url){
                                               echo "<img src='".$featured_image_url."' class='img-fluid'>";
                                           }
                                           $author_id = get_post_field('post_author', $post_id);
                                           $event_start = get_post_meta($post_id, "_event_from_date", true);
                                           $event_start_date = date("d/m/Y h:i A", strtotime($event_start));
                                           $event_end = get_post_meta($post_id, "_event_to_date", true);
                                           $event_end_date = date("d/m/Y h:i A", strtotime($event_end));
                                           $event_location = get_post_meta($post_id, "_event_location", true);
                                           $event_price = get_post_meta($post_id, "_event_price", true);
                                           $product_id = get_post_meta($post_id, "_product_id", true);
                                           $short_desc = get_post_meta($post_id, "short_description_summer_camp", true);
                                           $only_for = get_post_meta($post_id, "summer_camp_for", true);
                                           $gallery = get_post_meta($post_id, "gallery_images_of_summer_camp", true);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-7">
                        <div class="profile-top-content">
                            <div class="profiler-id">
                                <div class="camp-title">
                                    <h3><?php echo $post_title; ?></h3>
                                    <!-- <span>What are the rules of pickleball?</span> -->
                                </div>
                                <div class="about-profiler">
                                    <div class="profiler-detail">
                                        <div class="profile-meta">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="meta-category">
                                                    <?php  if(!empty($only_for)){ ?>
                                                       <label>Only For:</label>
                                                       <?php  foreach($only_for as $only){ ?>
                                                       <span class="badge badge-pill badge-warning"><?php echo $only; ?></span>
                                                    <?php }} ?>
                                                </div>
                                                <span class="price"><span>Price: </span>$<?php echo $event_price; ?></span>
                                            </div>
                                            <div class="pd-left">
                                                <ul class="mt-3">
                                                    <li>
                                                        <a href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map">
                                                                <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6" />
                                                                <line x1="8" y1="2" x2="8" y2="18" />
                                                                <line x1="16" y1="6" x2="16" y2="22" />
                                                            </svg>&nbsp;<?php echo $event_location; ?></a>
                                                    </li>
                                                    <br>
                                                    <li>
                                                        <a href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99998 1.75C7.19889 1.75 7.38965 1.82902 7.53031 1.96967C7.67096 2.11032 7.74998 2.30109 7.74998 2.5V3.263C8.41198 3.25 9.14098 3.25 9.94298 3.25H14.056C14.859 3.25 15.588 3.25 16.25 3.263V2.5C16.25 2.30109 16.329 2.11032 16.4696 1.96967C16.6103 1.82902 16.8011 1.75 17 1.75C17.1989 1.75 17.3897 1.82902 17.5303 1.96967C17.671 2.11032 17.75 2.30109 17.75 2.5V3.327C18.01 3.347 18.2563 3.37233 18.489 3.403C19.661 3.561 20.61 3.893 21.359 4.641C22.107 5.39 22.439 6.339 22.597 7.511C22.75 8.651 22.75 10.106 22.75 11.944V14.056C22.75 15.894 22.75 17.35 22.597 18.489C22.439 19.661 22.107 20.61 21.359 21.359C20.61 22.107 19.661 22.439 18.489 22.597C17.349 22.75 15.894 22.75 14.056 22.75H9.94498C8.10698 22.75 6.65098 22.75 5.51198 22.597C4.33998 22.439 3.39098 22.107 2.64198 21.359C1.89398 20.61 1.56198 19.661 1.40398 18.489C1.25098 17.349 1.25098 15.894 1.25098 14.056V11.944C1.25098 10.106 1.25098 8.65 1.40398 7.511C1.56198 6.339 1.89398 5.39 2.64198 4.641C3.39098 3.893 4.33998 3.561 5.51198 3.403C5.74531 3.37233 5.99164 3.347 6.25098 3.327V2.5C6.25098 2.30126 6.32986 2.11065 6.47029 1.97002C6.61073 1.8294 6.80124 1.75026 6.99998 1.75ZM5.70998 4.89C4.70498 5.025 4.12498 5.279 3.70198 5.702C3.27898 6.125 3.02498 6.705 2.88998 7.71C2.86731 7.88 2.84798 8.05967 2.83198 8.249H21.168C21.152 8.05967 21.1326 7.87967 21.11 7.709C20.975 6.704 20.721 6.124 20.298 5.701C19.875 5.278 19.295 5.024 18.289 4.889C17.262 4.751 15.907 4.749 14 4.749H9.99998C8.09298 4.749 6.73898 4.752 5.70998 4.89ZM2.74998 12C2.74998 11.146 2.74998 10.403 2.76298 9.75H21.237C21.25 10.403 21.25 11.146 21.25 12V14C21.25 15.907 21.248 17.262 21.11 18.29C20.975 19.295 20.721 19.875 20.298 20.298C19.875 20.721 19.295 20.975 18.289 21.11C17.262 21.248 15.907 21.25 14 21.25H9.99998C8.09298 21.25 6.73898 21.248 5.70998 21.11C4.70498 20.975 4.12498 20.721 3.70198 20.298C3.27898 19.875 3.02498 19.295 2.88998 18.289C2.75198 17.262 2.74998 15.907 2.74998 14V12Z"
                                                                fill="black" />
                                                            </svg>&nbsp;Start Date: <?php echo $event_start_date; ?></a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99998 1.75C7.19889 1.75 7.38965 1.82902 7.53031 1.96967C7.67096 2.11032 7.74998 2.30109 7.74998 2.5V3.263C8.41198 3.25 9.14098 3.25 9.94298 3.25H14.056C14.859 3.25 15.588 3.25 16.25 3.263V2.5C16.25 2.30109 16.329 2.11032 16.4696 1.96967C16.6103 1.82902 16.8011 1.75 17 1.75C17.1989 1.75 17.3897 1.82902 17.5303 1.96967C17.671 2.11032 17.75 2.30109 17.75 2.5V3.327C18.01 3.347 18.2563 3.37233 18.489 3.403C19.661 3.561 20.61 3.893 21.359 4.641C22.107 5.39 22.439 6.339 22.597 7.511C22.75 8.651 22.75 10.106 22.75 11.944V14.056C22.75 15.894 22.75 17.35 22.597 18.489C22.439 19.661 22.107 20.61 21.359 21.359C20.61 22.107 19.661 22.439 18.489 22.597C17.349 22.75 15.894 22.75 14.056 22.75H9.94498C8.10698 22.75 6.65098 22.75 5.51198 22.597C4.33998 22.439 3.39098 22.107 2.64198 21.359C1.89398 20.61 1.56198 19.661 1.40398 18.489C1.25098 17.349 1.25098 15.894 1.25098 14.056V11.944C1.25098 10.106 1.25098 8.65 1.40398 7.511C1.56198 6.339 1.89398 5.39 2.64198 4.641C3.39098 3.893 4.33998 3.561 5.51198 3.403C5.74531 3.37233 5.99164 3.347 6.25098 3.327V2.5C6.25098 2.30126 6.32986 2.11065 6.47029 1.97002C6.61073 1.8294 6.80124 1.75026 6.99998 1.75ZM5.70998 4.89C4.70498 5.025 4.12498 5.279 3.70198 5.702C3.27898 6.125 3.02498 6.705 2.88998 7.71C2.86731 7.88 2.84798 8.05967 2.83198 8.249H21.168C21.152 8.05967 21.1326 7.87967 21.11 7.709C20.975 6.704 20.721 6.124 20.298 5.701C19.875 5.278 19.295 5.024 18.289 4.889C17.262 4.751 15.907 4.749 14 4.749H9.99998C8.09298 4.749 6.73898 4.752 5.70998 4.89ZM2.74998 12C2.74998 11.146 2.74998 10.403 2.76298 9.75H21.237C21.25 10.403 21.25 11.146 21.25 12V14C21.25 15.907 21.248 17.262 21.11 18.29C20.975 19.295 20.721 19.875 20.298 20.298C19.875 20.721 19.295 20.975 18.289 21.11C17.262 21.248 15.907 21.25 14 21.25H9.99998C8.09298 21.25 6.73898 21.248 5.70998 21.11C4.70498 20.975 4.12498 20.721 3.70198 20.298C3.27898 19.875 3.02498 19.295 2.88998 18.289C2.75198 17.262 2.74998 15.907 2.74998 14V12Z"
                                                                fill="black" />
                                                            </svg>&nbsp;End Date: <?php echo $event_end_date; ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="meta-about">
                                                <p><?php echo nl2br(esc_html(wp_unslash($short_desc))); ?></p>
                                            </div>
                                            <div class="pd-right custom-button">
                                                <button type="button" class="btn btn-round btn-fill add_to_cart_btn" data-id="<?php echo $product_id; ?>">BOOK NOW <div class="spinner-border" id="spinner" style="display:none;"></div> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="summer-content mt-5 mb-5">
                            <h2 class="mb-3">About the event</h2>
                            <p><?php echo nl2br(esc_html(wp_unslash($post_content))); ?></p>
                        </div>
                        <div class="map-area mt-4 mb-5">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d214592.19404833476!2d-96.89690307815748!3d32.818684635908625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864c19f77b45974b%3A0xb9ec9ba4f647678f!2sDallas%2C%20TX%2C%20USA!5e0!3m2!1sen!2sin!4v1737524631232!5m2!1sen!2sin"
                            width="100%" height="470" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="section-title mt-4 mb-4">
                            <h2>Gallery </h2>
                        </div>
                        <div class="gallery-block">
                            <?php if(empty($gallery)){ echo "<p class='text-danger'>No gallery images found for this summer camp !</p>"; } ?>
                            <div id="profile-gallery" class="card-column owl-carousel">
                                <?php foreach($gallery as $image_id){
                                $url = wp_get_attachment_url($image_id);
                                if(!$url){continue;} ?>
                                   <div class="card">
                                      <img class="card-img-top" src="<?php echo $url; ?>" alt="">
                                   </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
        
<?php
require locate_template('layouts/footer.php') ;
?>

<script>
    jQuery('.add_to_cart_btn').on('click', function() {
        <?php
        $user = wp_get_current_user();
        if (!in_array('athlete', $user->roles) || !is_user_logged_in()) {
            $htmlLink = '';
            if(!is_user_logged_in()){
                $htmlLink = '<a href=javascript:void(0);" class="text-warning text-center" onclick="set_login_url()">Click here to login or register as athlete</a>';
            }
            echo 'Swal.fire({
                title: "Only athletes can book summer camps!",
                html: `'.$htmlLink.'`,
                icon: "error"
            }); return false;';
        }
        ?>
        var pid = $(this).data('id');
        jQuery("#spinner").show();
        jQuery('.add_to_cart_btn').attr("disabled", true);
        jQuery.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'POST',
            data: {action:"ajax_add_to_cart", productid:pid}, 
            success: function(response) {
                if (response.data.alert_type === 'success') {
                    window.location.href = "<?php echo wc_get_checkout_url(); ?>"; 
                    Swal.fire({
                        title: response.data.message,
                        text: '',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading(); 
                        }
                    });
                }else{
                  Swal.fire({ title: response.data.message, text: '', icon: response.data.alert_type});
                }
                jQuery("#spinner").show();
            }
        });
    }); 

$("#profile-gallery").owlCarousel({
    items: 4,
    itemsDesktop: [1000, 4],
    itemsDesktopSmall: [979, 2],
    itemsTablet: [768, 2],
    margin: 20,
    pagination: false,
    navigation: true,
    autowidth: true,
    navigationText: [
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>'
    ],
    autoPlay: true
});
</script>
