<div class="dashboard-main">
                    <div class="row">
                        <div class="col page-title">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2 class="m-0">My Session Bookings</h2>
                                <div class="d-flex align-items-center pd-3">
                                    <ul class="breadcrumbs">
                                        <li><a href="#">Home</a></li>
                                        <li>Session Bookings</li>
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
                                                                <th>ORDER ID</th>
                                                                <th>SESSION DETAILS</th>
                                                                <th>TOTAL AMOUNT</th>
                                                                <th>CREATED DTAE</th>
                                                                <th>ACTION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            global $wpdb;
                                                            $results = $wpdb->get_col($wpdb->prepare("SELECT order_id FROM {$wpdb->prefix}wc_orders_meta WHERE meta_key = '_session_booked_by' AND meta_value = '$user_id' ORDER BY order_id DESC"));
                                                            foreach ($results as $oid) {
                                                                $order = wc_get_order($oid);
                                                                $order_status = $order->get_status();
                                                                $order_date = $order->get_date_created()->date('Y-m-d H:i:s');
                                                                $session_coach_id = $order->get_meta( 'session_coach_id' );
                                                                $coach_name = get_user_meta($session_coach_id, "fullname", true);
                                                                $session_date = $order->get_meta( 'session_date' );
                                                                $total_amount = $order->get_total();
                                                                $pdf_url = wp_nonce_url( admin_url( 'admin-ajax.php?action=generate_wpo_wcpdf&template_type=invoice&my-account=true&order_ids=' . $oid ), 'generate_wpo_wcpdf' ); ?>
                                                                <tr>
                                                                    <td>#<?php echo $order->get_id(); ?></td>
                                                                    <td><b>Coach Name:</b> <?php echo $coach_name; ?><br>
                                                                        <b>Session Date & Time:</b> <?php echo date("m/d/Y h:i A", strtotime($session_date)); ?></td>
                                                                    <td>$<?php echo $total_amount; ?></td>
                                                                    <td><?php echo $order_date; ?></td>
                                                                    <th><a href="<?php echo $pdf_url; ?>" class="button btn-sm btn-success" target="_blank">INVOICE</a></th>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>ORDER ID</th>
                                                                <th>SESSION DETAILS</th>
                                                                <th>TOTAL AMOUNT</th>
                                                                <th>CREATED DTAE</th>
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