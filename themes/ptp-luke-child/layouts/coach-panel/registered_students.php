<div class="dashboard-main">
                    <div class="row">
                        <div class="col page-title">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2 class="m-0">List of registered students in summer camps</h2>
                                <div class="d-flex align-items-center pd-3">
                                    <ul class="breadcrumbs">
                                        <li><a href="#">Home</a></li>
                                        <li>Registered Students</li>
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
                                                                <th>STUDENT</th>
                                                                <th>SUMMERCAMP</th>
                                                                <th>DATE OF EVENT</th>
                                                                <th>ORDER STATUS</th>
                                                                <th>CREATED DTAE</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            global $wpdb;
                                                            $results = $wpdb->get_col($wpdb->prepare("SELECT order_id FROM {$wpdb->prefix}wc_orders_meta WHERE meta_key = '_referral_id' AND meta_value = '$user_id' "));
                                                            foreach ($results as $oid) {
                                                                $order = wc_get_order($oid);
                                                                $customer_name = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
                                                                $order_status = $order->get_status();
                                                                $order_date = $order->get_date_created()->date('Y-m-d H:i:s');
                                                                foreach ($order->get_items() as $item_id => $item) {
                                                                    $product_id = $item->get_product_id();
                                                                    $product_name = $item->get_name();
                                                                    $product_price = $item->get_total();
                                                                    $args = [
                                                                        'post_type'  => 'any',
                                                                        'meta_query' => [
                                                                            [
                                                                                'key'   => '_product_id',
                                                                                'value' => $product_id,
                                                                            ],
                                                                        ],
                                                                        'fields' => 'ids', 
                                                                        'numberposts' => 1,
                                                                    ];
                                                                    $post_id = get_posts($args);
                                                                    $post_id = $post_ids[0];
                                                                    $event_start = get_post_meta($post_id, "_event_from_date", true);
                                                                    $event_start_date = date("d/m/Y h:i A", strtotime($event_start));
                                                                    $event_end = get_post_meta($post_id, "_event_to_date", true);
                                                                    $event_end_date = date("d/m/Y h:i A", strtotime($event_end));
                                                                } ?>
                                                                <tr>
                                                                    <td>#<?php echo $oid; ?></td>
                                                                    <td><?php echo $customer_name; ?></td>
                                                                    <td><?php echo $product_name; ?><br> Price: $<?php echo $product_price; ?></td>
                                                                    <td><?php echo $event_start_date; ?> to <?php echo $event_end_date; ?></td>
                                                                    <td><?php echo ucwords($order_status); ?></td>
                                                                    <td><?php echo $order_date; ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>ORDER ID</th>
                                                                <th>STUDENT</th>
                                                                <th>SUMMERCAMP</th>
                                                                <th>DATE OF EVENT</th>
                                                                <th>ORDER STATUS</th>
                                                                <th>CREATED DTAE</th>
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