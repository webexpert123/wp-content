<?php
global $wpdb;

$results = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$wpdb->prefix}have_questions_coach WHERE coach_id = '$user_id' ORDER BY id DESC"));

$wpdb->query($wpdb->prepare("UPDATE {$wpdb->prefix}have_questions_coach SET status = %d WHERE coach_id = %d", 1,  $user_id  ));
?>
<div class="dashboard-main">
                    <div class="row">
                        <div class="col page-title">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2 class="m-0">Questions asked by visitors</h2>
                                <div class="d-flex align-items-center pd-3">
                                    <ul class="breadcrumbs">
                                        <li><a href="#">Home</a></li>
                                        <li>Questions</li>
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
                                        <div class="student-info">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>S. No.</th>
                                                                <th>FULL NAME</th>
                                                                <th>EMAIL</th>
                                                                <th>PHONE</th>
                                                                <th>MESSAGE</th>
                                                                <th>DATE</th>
                                                                <th>ACTION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i=0;
                                                            foreach ($results as $row) {  ?>
                                                            <tr>
                                                               <th><?php echo ++$i; ?>.</th>
                                                               
                                                               <td><?php echo $row->fullname; ?></td>

                                                               <td><?php echo $row->email; ?></td>

                                                               <td><?php echo $row->phone; ?></td>

                                                               <td><?php echo $row->message; ?></td>

                                                               <td><?php echo $row->created_date; ?></td>

                                                               <td><button type="button" class="btn btn-danger btn-sm" onclick="delete_question(<?php echo $row->id; ?>);">DELETE</button></td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>S. No.</th>
                                                                <th>FULL NAME</th>
                                                                <th>EMAIL</th>
                                                                <th>PHONE</th>
                                                                <th>MESSAGE</th>
                                                                <th>DATE</th>
                                                                <th>ACTION</th>
                                                            </tr>
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

<script>
        function delete_question(qid){
            Swal.fire({
              title: "Are you sure?",
              text: "You won't be able to revert this!",
              icon: "question",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes, delete it!"
            }).then((result) => {
              if (result.isConfirmed) {
                jQuery.ajax({
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    data: { action:"delete_question", qid:qid },
                    method: "POST",
                    datatype:"text",
                    success: function (html) {
                        Swal.fire({
                            title: "Successfully Deleted",
                            text: "",
                            icon: "success",
                            allowOutsideClick: false, 
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                });
              }
            });
        }
</script>