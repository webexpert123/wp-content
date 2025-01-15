<?php
if(isset($_POST['udpate_btn'])){
    update_user_meta($user_id ,"_session_quantity", $_POST['session_quantity']);
    update_user_meta($user_id ,"_session_price", $_POST['session_price']);
    echo "<script>Swal.fire({ title: 'Updated Successfully', text: '', icon: 'success' });</script>";
}
$session_quantity = get_user_meta($user_id, "_session_quantity", true);
$session_quantity = isset($session_quantity) && $session_quantity !== '' ? $session_quantity : '';

$session_price = get_user_meta($user_id, "_session_price", true);
$session_price = isset($session_price) && $session_price !== '' ? $session_price : '';
?>
<div class="dashboard-main">
                    <div class="row">
                        <div class="col page-title">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2 class="m-0">My Per Session Rate</h2>
                                <div class="d-flex align-items-center pd-3">
                                    <ul class="breadcrumbs">
                                        <li><a href="#">Home</a></li>
                                        <li>Session Rate</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- top cols of dashboard -->
                    <div class="profile-page">
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="card custom-plan session-rate">
                                <div class="card-title mb-4">
                                    <h5 class="">What to keep in mind</h5>
                                </div>
                                <div class="card-body">
                                    <div class="t-plan-fees-main">
                                            <ul>
                                                <li>The minimum session rate you can offer is $30.</li>
                                                <li>The average AU session rate is $65.</li>
                                                <li>You can change your session rate at any time.</li>
                                            </ul> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card session-rate">
                                <div class="card-title mb-4">
                                    <h5 class="">Set your session rate</h5>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="row mb-3">
                                            <div class="col-md-12 mb-2">
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput">Number of People<b class="text-danger">*</b></label>
                                                    <select class="form-control" name="session_quantity" required>
                                                        <option value="">Select number of people</option>
                                                        <?php for($i=1 ; $i<=10 ; $i++){ ?>
                                                            <option value="<?php echo $i; ?>" <?php if($session_quantity==$i){echo "selected";} ?>><?php echo $i; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput">Session Price ($)<b class="text-danger">*</b></label>
                                                    <input type="number" class="form-control" id="session_price" placeholder="Enter Price" name="session_price" value="<?php echo $session_price; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <div class="page-save-action mt-4">
                                                    <button type="submit" class="udpate_btn" name="udpate_btn">Save</button>
                                                </div>
                                                <div class="t-plan-fees d-flex justify-content-between align-items-center mt-5">
                                                    <h6 class="mb-0">PTP Fees *<br><span>20%</span></h6>
                                                    <h6 class="mb-0">Earnings/Session<br><span>$ <span id="my_amount">24.00</span></span></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<script>
    $( document ).ready(function() {
        calculate_my_amount();
    });

    function calculate_my_amount(){
        var session_price = $("#session_price").val();
        var discount_percentage = 20;
        var discount = session_price * (discount_percentage / 100);
        var remaining_price = session_price - discount;
        var remaining_price = remaining_price.toFixed(2);
        $("#my_amount").text(remaining_price);
    }

    $("#session_price").keyup(function(){
        calculate_my_amount();
    });
</script>