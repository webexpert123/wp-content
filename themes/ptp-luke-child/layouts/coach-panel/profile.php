<?php
if(isset($_POST['save_profile_details'])){
    update_user_meta($user_id, 'fullname', $_POST['fullname']);
    update_user_meta($user_id, 'first_name', $_POST['fullname']);
    update_user_meta($user_id, 'phone', $_POST['phone']);
    update_user_meta($user_id, '_zipcode', $_POST['zipcode']);
    update_user_meta($user_id, '_experience', $_POST['experience']);
    update_user_meta($user_id, '_about_myself', $_POST['about_myself']);
    $user = get_userdata($user_id);
    $user->user_email = $_POST['email_addr'];
    $emailError = "";
    $update_result = wp_update_user($user);
    if (is_wp_error($update_result)) {
        $emailError = 'Error updating email: ' . $update_result->get_error_message();
    } 
    echo "<script>Swal.fire({ title: 'Updated Successfully! '".$emailError.", text: '', icon: 'success' });</script>";
    $redirect = home_url( add_query_arg( null, null ) ) ;
    echo "<script>window.location.href='".$redirect."';</script>";
}

if(isset($_FILES['file_name'])){
    $thumbnail_id = custom_upload_and_get_thumbnail_id('file_name');

    if (!is_wp_error($thumbnail_id)) {
        update_user_meta( $user_id, '_profile_pic_id', $thumbnail_id);
        echo "<script>Swal.fire({ title: 'Profile Image Updated! ', text: '', icon: 'success' });</script>";
        $redirect = home_url( add_query_arg( null, null ) ) ;
        echo "<script>window.location.href='".$redirect."';</script>";
    }else{
        echo "<script>Swal.fire({ title: 'Image not updated !', text: 'Try again later', icon: 'error' });</script>";
    }
}

if(isset($_POST['save_country'])){
    $country = explode("-", $_POST['my_country']);
    update_user_meta( $user_id, '_my_country', $country[1]);
    update_user_meta( $user_id, '_my_country_code', $country[0]);
    echo "<script>Swal.fire({ title: 'Country Updated Successfully! ', text: '', icon: 'success' });</script>";
    $redirect = home_url( add_query_arg( null, null ) ) ;
    echo "<script>window.location.href='".$redirect."';</script>";
}


if(isset($_POST['save_cards'])){
    $card = array(
        'card_number' => $_POST['card_number'], 
        'expiry_date' => $_POST['expiry_date'],
        'cvv_number' => $_POST['cvv_number']
    );
    $serialized_card = serialize($card);
    update_user_meta( $user_id, '_card_details', $serialized_card);
    echo "<script>Swal.fire({ title: 'Card Details Updated Successfully! ', text: '', icon: 'success' });</script>";
    $redirect = home_url( add_query_arg( null, null ) ) ;
    echo "<script>window.location.href='".$redirect."';</script>";
}

if(isset($_POST["update_password"])){
    if($_POST["new_password"]==$_POST["confirm_password"]){
        wp_set_password($_POST["new_password"], $user_id);
       echo "<script>Swal.fire({ title: 'Password Updated!', text: '', icon: 'success' });</script>";
    }else{
       echo "<script>Swal.fire({ title: 'Both passwords are not same !', text: '', icon: 'error' });</script>";
    }
    $redirect = home_url( add_query_arg( null, null ) ) ;
    echo "<script>window.location.href='".$redirect."';</script>";
}

$session_price = get_user_meta($user_id, "_session_price", true);
$session_price = isset($session_price) && $session_price !== '' ? $session_price : '';

$fullname = get_user_meta($user_id, 'fullname', true);
$email = $current_user->user_email;
$phone = get_user_meta($user_id, 'phone', true);
$zipcode = get_user_meta($user_id, '_zipcode', true);
$experience = get_user_meta($user_id, '_experience', true);
$about_myself = get_user_meta($user_id, '_about_myself', true);
$my_country = get_user_meta($user_id, '_my_country_code', true);
$card_details = get_user_meta($user_id, '_card_details', true);
$card_number = "";
$expiry_date = "";
$cvv_number = "";
if($card_details){
  $unserialized_card = unserialize($card_details);
  $card_number = $unserialized_card["card_number"];
  $expiry_date = $unserialized_card["expiry_date"];
  $cvv_number = $unserialized_card["cvv_number"];
}


function get_user_subscription_history($user_id) {
    // Query for subscriptions without filtering by status
    $args = array(
        'post_type' => 'shop_subscription',
        'posts_per_page' => -1,
        'author' => $user_id, // Get subscriptions for this user
    );

    // Get the subscriptions for the user
    $subscriptions = get_posts($args);

    // Check if subscriptions exist
    if (empty($subscriptions)) {
        return 'No subscriptions found for this user.';
    }

    // Prepare an array to store subscription history
    $subscription_history = [];

    // Loop through each subscription
    foreach ($subscriptions as $subscription_post) {
        // Get subscription object
        $subscription = wcs_get_subscription($subscription_post->ID);

        // Check if the subscription object is valid
        if (!$subscription) {
            continue;  // Skip if subscription is invalid
        }

        // Get subscription details
        $plan_id = $subscription->get_id();  // Plan ID
        $plan_name = $subscription->get_product()->get_name();  // Plan Name
        $start_date = $subscription->get_date_created()->date('Y-m-d');  // Start Date
        $next_payment_date = $subscription->get_date_next_payment()->date('Y-m-d');  // Next Payment Date
        $price = $subscription->get_total();  // Total Price (for the subscription)
        
        // Optional: You can use get_view_order_url() for the subscription view URL
        $view_url = $subscription->get_view_order_url();  // View URL

        // Add subscription details to the array
        $subscription_history[] = [
            'plan_id' => $plan_id,
            'plan_name' => $plan_name,
            'start_date' => $start_date,
            'next_payment' => $next_payment_date,
            'price' => $price,
            'view_url' => $view_url
        ];
    }

    return $subscription_history;
}



?>
<div class="dashboard-main">
    <div class="row">
        <div class="col page-title">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="m-0">My Account</h2>
                <div class="d-flex align-items-center pd-3">
                    <ul class="breadcrumbs">
                        <li><a href="#">Home</a></li>
                        <li>My Account</li>
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
                        <div class="card-title mb-4">
                            <h5 class="">Account Information</h5>
                        </div>
                        <div class="my-account-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="subscription-tab" data-toggle="tab" data-target="#subscription" type="button" role="tab" aria-controls="subscription" aria-selected="false">Profile Details
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="payment-tab" data-toggle="tab" data-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="true">Payment Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="auth-tab" data-toggle="tab" data-target="#auth" type="button" role="tab" aria-controls="auth" aria-selected="false">Update Password</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="order-tab" data-toggle="tab" data-target="#order" type="button" role="tab" aria-controls="order" aria-selected="false">Order History
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                                    <div class="tabs-inner row p-4">
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title mb-4">
                                                        <h5 class="">Add Country/Region</h5>
                                                    </div>
                                                    <form action="" method="post">
                                                      <div class="row mb-3 profile-overview">
                                                        <div class="col-md-12 mb-2">
                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput">Select Country<b class="text-danger">*</b>
                                                                </label>
                                                                <select class="form-control" name="my_country" required>
                                                                    <option value="">Select Country</option>
                                                                    <?php
                                                                    global $wpdb;
                                                                    $countries = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}countries" ) );
                                                                    foreach ($countries as $country) { ?>
                                                                        <option value="<?php echo esc_attr($country->code); ?>-<?php echo esc_html($country->name); ?>" <?php if($my_country==$country->code){echo "selected";} ?> ><?php echo esc_html($country->name); ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="page-save-action d-flex align-items-center ms-2">
                                                                <button type="submit" name="save_country">Save</button>
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title mb-4">
                                                        <h5 class="">Payment Method</h5>
                                                        <!-- <span>Add New Card</span> -->
                                                    </div>
                                                    <form action="" method="post">
                                                        <div class="row mb-3 profile-overview">
                                                            <div class="col-md-12 mb-2">
                                                                <div class="form-group">
                                                                    <label for="formGroupExampleInput">Card Number<b class="text-danger">*</b>
                                                                    </label>
                                                                    <input type="number" class="form-control" name="card_number" value="<?php echo $card_number; ?>" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="formGroupExampleInput">Expiry Date (MM/YY)<b class="text-danger">*</b>
                                                                    </label>
                                                                    <input type="text" class="form-control" name="expiry_date" value="<?php echo $expiry_date; ?>" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="formGroupExampleInput">CVV Number<b class="text-danger">*</b>
                                                                    </label>
                                                                    <input type="number" class="form-control" name="cvv_number" value="<?php echo $cvv_number; ?>" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="page-save-action d-flex align-items-center ms-2">
                                                                    <button type="submit" name="save_cards">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade show active" id="subscription" role="tabpanel" aria-labelledby="subscription-tab">
                                    <div class="tabs-inner p-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title mb-4">
                                                    <h5 class="">My Profile Details</h5>
                                                </div>
                                                <div class="tabs-inner row p-4">
                                                    <div class="col-lg-4 card profile-block">
                                                        <div class="card-body">
                                                            <div class="d-flex flex-xl-row flex-lg-column flex-md-column align-items-xl-start text-center">
                                                                <img src="<?php echo $profile_img_link; ?>" alt="Admin" class="avatar_img rounded-circle p-1" width="110">
                                                                <div class="text-xl-left mx-3">
                                                                    <h5 class="m-0"><?php echo $name; ?></h5>
                                                                    <small class="mb-0 d-inline-block w-100"><?php echo $my_sport; ?> <?php echo $role; ?></small>
                                                                    <!-- <small class="mb-2 font-size-sm d-inline-block w-100">Bay Area, San Francisco, CA</small> -->
                                                                    <form id="file_upload_form" action="" method="post" enctype="multipart/form-data">
                                                                      <div class="upload-image">
                                                                        <div class="upload-form">
                                                                            <input class="form-control" type="file" id="formFileMultiple" name="file_name" accept=".jpg, .jpeg, .png">
                                                                            <span>Change Image</span>
                                                                        </div>
                                                                      </div>
                                                                    </form>
                                                                </div>
                                                                <div class="ms-auto profile-rate text-center">
                                                                    <h4 class="m-0">$<?php echo $session_price; ?></h4>
                                                                    <span>/Session</span>
                                                                </div>
                                                            </div>
                                                            <hr class="my-4">
                                                            <div class="copy-link">
                                                                <div class="d-flex align-items-center justify-content-between mb-2 px-2">
                                                                    <label>Profile Link</label>
                                                                    <i class="bx bx-copy" onclick="copy_link();"></i>
                                                                </div>
                                                                <a href="javascript:void(0)" id="profile_link" onclick="copy_link();"><?php echo site_url(); ?>/coach-profile/<?php echo $current_user->user_nicename; ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="card-title mb-4">
                                                                    <h5 class="">Profile Overview</h5>
                                                                </div>
                                                                <form action="" method="post" enctype="multipart/form-data">
                                                                   <div class="row mb-3 profile-overview">
                                                                        <div class="col-md-12 mb-2">
                                                                            <div class="form-group">
                                                                                <label for="">Full Name<b class="text-danger">*</b></label>
                                                                                <input type="text" class="form-control" name="fullname" value="<?php echo $fullname; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label for="">Email<b class="text-danger">*</b></label>
                                                                                <input type="email" class="form-control" name="email_addr" value="<?php echo $email; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label for="">Phone<b class="text-danger">*</b></label>
                                                                                <input type="number" class="form-control" name="phone" value="<?php echo $phone; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label for="">Zip Code<b class="text-danger">*</b></label>
                                                                                <input type="number" class="form-control" name="zipcode" value="<?php echo $zipcode; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label for="">Years of Experience</label>
                                                                                <input type="number" class="form-control" name="experience" value="<?php echo $experience; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-2">
                                                                            <div class="form-group">
                                                                                <label for="">Tell Us About Yourself</label>
                                                                                <textarea class="form-control" name="about_myself" rows="3"><?php echo $about_myself; ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-2">
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-warning" name="save_profile_details">Save</button>
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
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>


                                <div class="tab-pane fade" id="auth" role="tabpanel" aria-labelledby="auth-tab">
                                    <div class="tabs-inner row p-4">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title mb-4">
                                                        <h5 class="">Update Password</h5>
                                                    </div>
                                                    <form action="" method="POST">
                                                      <div class="row mb-3 profile-overview">
                                                        <div class="col-md-12 mb-2">
                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput">New Password</label>
                                                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mb-2">
                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput">Re-Enter Password</label>
                                                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                                            </div>
                                                            <b id="password_err" class="text-danger" style="display:none;">Both Password Not Same !</b>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="page-save-action d-flex align-items-center ms-2">
                                                                <button type="submit" id="update_btn" class="update_btn" name="update_password">Update Password</button>
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab">
                                    <div class="tabs-inner p-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title mb-4">
                                                    <h5 class="">Order History</h5>
                                                </div>
                                                <div class="order-history">
                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>PLAN</th>
                                                                <th>START DATE</th>
                                                                <th>NEXT PAYMENT</th>
                                                                <th>PRICING</th>
                                                                <th>VIEW</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $subscription_history = get_user_subscription_history($user_id);
                                                            foreach($subscription_history as $history){ ?>
                                                            <tr>
                                                                <td>#<?php echo $history['plan_id']; ?></td>
                                                                <td>Pro Tier</td>
                                                                <td>2024-08-25</td>
                                                                <td>2024-09-25</td>
                                                                <td>$300</td>
                                                                <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                            </tr>
                                                            <?php } ?>
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
                </div>
            </div>
        </div>
    </div>
    <script>
        function copy_link(){
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($("#profile_link").html()).select();
            document.execCommand("copy");
            $temp.remove();
            Swal.fire({ title: 'Profile Link Copied !', text: '', icon: '' });
        }

        $('#formFileMultiple').on('change', function() {
            $('#file_upload_form').submit();
        });

        jQuery("#new_password, #confirm_password").keyup(function(){
          var password_a = jQuery("#new_password").val();
          var confirm_password_a = jQuery("#confirm_password").val();
          if(password_a!="" && confirm_password_a!=""){
            if (password_a !== confirm_password_a) {
              jQuery("#password_err").show();
              jQuery("#update_btn").attr("disabled", true);
            }else{
              jQuery("#password_err").hide();
              jQuery("#update_btn").attr("disabled", false);
            }
          }
        });
    </script>