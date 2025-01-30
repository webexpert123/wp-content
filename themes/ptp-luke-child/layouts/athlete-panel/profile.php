<?php
if(isset($_POST['save_profile_details'])){
    update_user_meta($user_id, 'fullname', $_POST['fullname']);
    update_user_meta($user_id, 'first_name', $_POST['fullname']);
    update_user_meta($user_id, 'phone', $_POST['phone']);
    update_user_meta($user_id, '_zipcode', $_POST['zipcode']);
    update_user_meta($user_id, '_city', $_POST['city']);
    update_user_meta($user_id, '_strength', $_POST['strength']);
    update_user_meta($user_id, '_weakness', $_POST['weakness']);
    update_user_meta($user_id, '_intrests', $_POST['intrests']);
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


$fullname = get_user_meta($user_id, 'fullname', true);
$email = $current_user->user_email;
$phone = get_user_meta($user_id, 'phone', true);
$zipcode = get_user_meta($user_id, '_zipcode', true);
$my_country = get_user_meta($user_id, '_my_country_code', true);
$card_details = get_user_meta($user_id, '_card_details', true);
$city = get_user_meta($user_id, '_city', true);
$strength = get_user_meta($user_id, '_strength', true);
$weakness = get_user_meta($user_id, '_weakness', true);
$intrests = get_user_meta($user_id, '_intrests', true);
$card_number = "";
$expiry_date = "";
$cvv_number = "";
if($card_details){
  $unserialized_card = unserialize($card_details);
  $card_number = $unserialized_card["card_number"];
  $expiry_date = $unserialized_card["expiry_date"];
  $cvv_number = $unserialized_card["cvv_number"];
}

?>
<div class="dashboard-main">
    <div class="row">
        <div class="col page-title">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="m-0">My Profile Details</h2>
                <div class="d-flex align-items-center pd-3">
                    <ul class="breadcrumbs">
                        <li><a href="#">Home</a></li>
                        <li>My Profile</li>
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
                            <!-- <h5 class="">Account Information</h5> -->
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
                                                        <h5 class="">Card Details</h5>
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
                                                    <!-- <h5 class="">My Profile Details</h5> -->
                                                </div>
                                                <div class="tabs-inner row p-4">
                                                    <div class="col-lg-4 card profile-block">
                                                        <div class="card-body">
                                                            <div class="d-flex flex-xl-row flex-lg-column flex-md-column align-items-xl-start text-center">
                                                                <img src="<?php echo $profile_img_link; ?>" alt="Admin" class="avatar_img rounded-circle p-1" width="110">
                                                                <div class="text-xl-left mx-3">
                                                                    <h5 class="m-0"><?php echo $name; ?></h5>
                                                                    <small class="mb-0 d-inline-block w-100">PTP-Athlete</small>
                                                                    <form id="file_upload_form" action="" method="post" enctype="multipart/form-data">
                                                                      <div class="upload-image">
                                                                        <div class="upload-form">
                                                                            <input class="form-control" type="file" id="formFileMultiple" name="file_name" accept=".jpg, .jpeg, .png">
                                                                            <span>Change Image</span>
                                                                        </div>
                                                                      </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <hr class="my-4">
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
                                                                                <label for="">City<b class="text-danger">*</b></label>
                                                                                <input type="text" class="form-control" name="city" value="<?php echo $city; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label for="">Zip Code<b class="text-danger">*</b></label>
                                                                                <input type="number" class="form-control" name="zipcode" value="<?php echo $zipcode; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-2">
                                                                            <div class="form-group">
                                                                                <label for="">Strength<b class="text-danger">*</b></label>
                                                                                <input type="text" class="form-control" name="strength" value="<?php echo $strength; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-2">
                                                                            <div class="form-group">
                                                                                <label for="">Weakness<b class="text-danger">*</b></label>
                                                                                <input type="text" class="form-control" name="weakness" value="<?php echo $weakness; ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-2">
                                                                            <div class="form-group">
                                                                                <label for="">Intrests<b class="text-danger">*</b></label>
                                                                                <input type="text" class="form-control" name="intrests" value="<?php echo $intrests; ?>" required>
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


        // Function to handle tag addition
        function handleTagInput(inputSelector, tagDivSelector, tagStringSelector) {
            const input = document.getElementById(inputSelector);
            input.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    const tagContent = input.value.trim();
                    if (tagContent !== '') {
                        jQuery(`#${tagDivSelector}`).append(
                            `<span class="badge badge-pill badge-warning">${tagContent} <span aria-hidden="true">&times;</span></span>`
                        );
                        updateTagString(tagDivSelector, tagStringSelector);
                        input.value = "";
                    }
                }
            });
        }

        // Function to handle tag removal
        function handleTagRemoval(tagDivSelector, tagStringSelector) {
            $(document).on("click", `#${tagDivSelector} span[aria-hidden='true']`, function () {
                $(this).closest('.badge').remove();
                updateTagString(tagDivSelector, tagStringSelector);
            });
        }

        // Function to update tag string
        function updateTagString(tagDivSelector, tagStringSelector) {
            let tagString = $(`#${tagDivSelector} span.badge`).map(function () {
                return $(this).contents().get(0).nodeValue.trim();
            }).get().join(",");
            jQuery(`#${tagStringSelector}`).val(tagString);
        }

        // Initialize for each input
        handleTagInput('levels-tag-input', 'levels-tag-div', 'levels-tags-string');
        handleTagRemoval('levels-tag-div', 'levels-tags-string');

        handleTagInput('teaches-tag-input', 'teaches-tag-div', 'teaches-tags-string');
        handleTagRemoval('teaches-tag-div', 'teaches-tags-string');

    </script>