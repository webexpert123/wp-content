<div class="dashboard-main">
    <div class="row">
        <div class="col page-title">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="m-0">Manage Subscription</h2>
                <div class="d-flex align-items-center pd-3">
                    <ul class="breadcrumbs">
                        <li><a href="#">Home</a></li>
                        <li>Manage Subscription</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- top cols of dashboard -->
    <div class="profile-page">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title mb-4">
                                    <h5 class="">Current Plan</h5>
                                </div>
                                <div class="subscription-plans">
                                    <div class="subscription-list px-4 py-4 mb-3">
                                        <div class="subscription-start d-flex flex-column">
                                            <div class="plans-new d-flex">
                                                <div class="subscription-icon col-auto mr-4">
                                                    <i class="bx bx-credit-card-front"></i>
                                                </div>
                                                <div class="subscription-info">
                                                <?php
                                                if ( is_user_logged_in() ) {
                                                    $subscriptions = wcs_get_users_subscriptions( $user_id );
                                                    if ( ! empty( $subscriptions ) ) {

                                                        foreach ( $subscriptions as $subscription ) {

                                                            if ( $subscription->has_status( 'active' ) ) {

                                                                $items = $subscription->get_items();

                                                                if ( ! empty( $items ) ) {
                                                                    foreach ( $items as $item ) {
                                                                        $product = $item->get_product();
                                                                        $product_price = $product->get_price();
                                                                        if ( $product ) {
                                                                            $subscription_id = $subscription->get_id();
                                                                            $subscription_name = $product->get_name();  
                                                                            $product_id = $product->get_id();  
                                                                            $subscription_price = wc_price( $product_price );
                                                                            $subscription_status = $subscription->get_status();
                                                                            $subscription_start = $subscription->get_date('start');
                                                                            $subscription_nxt_pay = $subscription->get_date('next_payment');
                                                                        }
                                                                    } ?>
                                                                    <h3 class="mb-0"><?php echo $subscription_name; ?></h3>
                                                                    <span><?php echo $subscription_price; ?> /Month</span>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="badge badge-success mr-2">
                                                                            <?php echo ucwords($subscription_status); ?>
                                                                        </div>
                                                                        <span>Next Payment on <?php echo date("F d, Y", strtotime($subscription_nxt_pay)); ?>.</span>
                                                                    </div>
                                                                    <?php
                                                                } else {
                                                                    echo '<p class="text-light">No valid items found in this subscription.</p>';
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                       echo '<p class="text-light">You do not have any active subscriptions.</p>';
                                                    }
                                                } else {
                                                    echo '<p class="text-light">Please log in to view your subscription details.</p>';
                                                }
                                                ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title mb-4">
                                    <h5 class="">Pick your package</h5>
                                </div>
                                <?php
                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => -1, 
                                    'post_status' => 'publish',
                                    'orderby' => 'ID',
                                    'order' => 'ASC',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field'    => 'slug',
                                            'terms'    => 'memberships', 
                                            'operator' => 'IN',
                                        ),
                                    ),
                                );
                                $subscription_query = new WP_Query( $args );

                                if ( $subscription_query->have_posts() ) {
                                    while ( $subscription_query->have_posts() ) {
                                        $subscription_query->the_post();
                                        $product = wc_get_product( get_the_ID() );
                                        if ( $product && $product->is_type( 'subscription' ) && !$product->is_type( 'variable-subscription' ) ) {
                                           $name = $product->get_name(); 
                                           $pid = $product->get_id(); 
                                           $description = $product->get_description(); 
                                           $price = wc_price( $product->get_price() );
                                           $add_to_cart = esc_url( $product->add_to_cart_url() ); ?>
                                           <div class="subscription-plans <?php if($product_id==$pid){echo "d-none";} ?>">
                                                <div class="subscription-list px-4 py-4 mb-3">
                                                    <div class="subscription-start d-flex flex-column">
                                                        <div class="plans-new d-flex align-items-center">
                                                            <div class="subscription-icon col-auto mr-4">
                                                                <i class="fas fa-gem"></i>
                                                            </div>
                                                            <div class="subscription-info">
                                                                <h3 class="mb-0"><?php echo $name; ?></h3>
                                                                <span><a href="javascript:void(0);" class="show_details"  data-toggle="modal" data-target="#add_t-plans" data-title="<?php echo $name; ?>" data-description="<?php the_content(); ?>">Show Subscription Details</a></span>
                                                            </div>
                                                            <div class="subscription-action ms-auto">
                                                                <div class="page-save-action">
                                                                    <a href="<?php echo $add_to_cart; ?>" class="udpate_btn btn btn-success">Subscribe</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    }
                                        wp_reset_postdata();
                                } else {
                                    echo '<p>No membership subscription plans available at the moment.</p>';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


                    <div class="modal fade" id="add_t-plans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Subscription Details</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-light" id="plan_heading"></h4>
                                        <div class="text-light" id="plan_content"></div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>

<script>
   jQuery('.show_details').on('click', function() {
        jQuery("#plan_heading").html($(this).data('title'));
        jQuery("#plan_content").html($(this).data('description'));
    });
</script>