<div class="dashboard-main">
                    <div class="row">
                        <div class="col page-title">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>Hello, <?php echo $name; ?></h2>
                                <ul class="breadcrumbs">
                                    <li>Home</li>
                                    <li><a href="#">Dashboard</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- top cols of dashboard -->
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                        <div class="col">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <p class="mb-0 text-white">Total Earnings</p>
                                            <h4 class="my-1 text-white">$75</h4>
                                            <!-- <p class="mb-0 font-13 text-white">
                                                <i class="bx bxs-up-arrow align-middle"></i>$34 from last week
                                            </p> -->
                                        </div>
                                        <div class="widgets-icons bg-light-transparent text-white ms-auto"><i
                                                class="bx bxs-wallet"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <p class="mb-0 text-white">Last 30-Days Earnings</p>
                                            <h4 class="my-1 text-white">$101</h4>
                                            <!-- <p class="mb-0 font-13 text-white">
                                                <i class="bx bxs-up-arrow align-middle"></i>1.6K from last week
                                            </p> -->
                                        </div>
                                        <div class="widgets-icons bg-light-transparent text-white ms-auto"><i
                                                class="bx bxs-group"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <p class="mb-0 text-white">30-Day Sessions</p>
                                            <h4 class="my-1 text-white">$120</h4>
                                            <!-- <p class="mb-0 font-13 text-white">
                                                <i class="bx bxs-down-arrow align-middle"></i>2.4K from last week
                                            </p> -->
                                        </div>
                                        <div class="widgets-icons bg-light-transparent text-white ms-auto"><i
                                                class="bx bxs-binoculars"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <p class="mb-0 text-white">Total Students</p>
                                            <h4 class="my-1 text-white">30</h4>
                                            <!-- <p class="mb-0 font-13 text-white">
                                                <i class="bx bxs-down-arrow align-middle"></i>12.2% from last week
                                            </p> -->
                                        </div>
                                        <div class="widgets-icons bg-light-transparent text-white"><i
                                                class="bx bx-line-chart-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- calendar & Notification -->
                    <div class="row">
                        <div class="col-12 col-lg-8 col-xl-8 d-flex">
                            <div class="card radius-10 w-100">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h5 class="mb-4">Calendar</h5>
                                        <div class="calendar" id='calendar'></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-xl-4">
                            <div class="card radius-10 overflow-hidden w-100">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="card-title mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="">New Students</h5>
                                            <a href="#">View All</a>
                                        </div>
                                        <div class="student-list">
                                            <div
                                                class="customers-list-item d-flex align-items-center p-2 cursor-pointer">
                                                <div class="">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-4.png"
                                                        class="rounded-circle" width="46" height="46" alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-14">Emy Jackson</h6>
                                                    <p class="mb-0 font-13 text-light-2">emy_jac@xyz.com</p>
                                                </div>
                                                <div class="list-inline d-flex customers-contacts ms-auto"> <a
                                                        href="javascript:;" class="list-inline-item"><i
                                                            class="bx bxs-envelope"></i></a>
                                                    <a href="javascript:;" class="list-inline-item"><i
                                                            class="bx bxs-microphone"></i></a>
                                                    <a href="javascript:;" class="list-inline-item"><i
                                                            class="bx bx-dots-vertical-rounded"></i></a>
                                                </div>
                                            </div>
                                            <div
                                                class="customers-list-item d-flex align-items-center p-2 cursor-pointer">
                                                <div class="">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-2.png"
                                                        class="rounded-circle" width="46" height="46" alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-14">Emy Jackson</h6>
                                                    <p class="mb-0 font-13 text-light-2">emy_jac@xyz.com</p>
                                                </div>
                                                <div class="list-inline d-flex customers-contacts ms-auto"> <a
                                                        href="javascript:;" class="list-inline-item"><i
                                                            class="bx bxs-envelope"></i></a>
                                                    <a href="javascript:;" class="list-inline-item"><i
                                                            class="bx bxs-microphone"></i></a>
                                                    <a href="javascript:;" class="list-inline-item"><i
                                                            class="bx bx-dots-vertical-rounded"></i></a>
                                                </div>
                                            </div>
                                            <div
                                                class="customers-list-item d-flex align-items-center p-2 cursor-pointer">
                                                <div class="">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-11.png"
                                                        class="rounded-circle" width="46" height="46" alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-14">Emy Jackson</h6>
                                                    <p class="mb-0 font-13 text-light-2">emy_jac@xyz.com</p>
                                                </div>
                                                <div class="list-inline d-flex customers-contacts ms-auto"> <a
                                                        href="javascript:;" class="list-inline-item"><i
                                                            class="bx bxs-envelope"></i></a>
                                                    <a href="javascript:;" class="list-inline-item"><i
                                                            class="bx bxs-microphone"></i></a>
                                                    <a href="javascript:;" class="list-inline-item"><i
                                                            class="bx bx-dots-vertical-rounded"></i></a>
                                                </div>
                                            </div>
                                            <div
                                                class="customers-list-item d-flex align-items-center p-2 cursor-pointer">
                                                <div class="">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-2.png"
                                                        class="rounded-circle" width="46" height="46" alt="">
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-1 font-14">Emy Jackson</h6>
                                                    <p class="mb-0 font-13 text-light-2">emy_jac@xyz.com</p>
                                                </div>
                                                <div class="list-inline d-flex customers-contacts ms-auto"> <a
                                                        href="javascript:;" class="list-inline-item"><i
                                                            class="bx bxs-envelope"></i></a>
                                                    <a href="javascript:;" class="list-inline-item"><i
                                                            class="bx bxs-microphone"></i></a>
                                                    <a href="javascript:;" class="list-inline-item"><i
                                                            class="bx bx-dots-vertical-rounded"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card radius-10 overflow-hidden w-100 d-none">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="card-title mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="">Notification</h5>
                                            <a href="#">View All</a>
                                        </div>
                                        <div class="notification-main">
                                            <div class="notification-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-online">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-2.png"
                                                            class="msg-avatar" alt="user avatar">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Daisy Anderson<span
                                                                class="msg-time float-end">5 sec
                                                                ago</span></h6>
                                                        <p class="msg-info">The standard chunk of lorem</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notification-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-online">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-2.png"
                                                            class="msg-avatar" alt="user avatar">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Daisy Anderson<span
                                                                class="msg-time float-end">5 sec
                                                                ago</span></h6>
                                                        <p class="msg-info">The standard chunk of lorem</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notification-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-online">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/outlook.png"
                                                            class="msg-avatar" alt="user avatar">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Daisy Anderson<span
                                                                class="msg-time float-end">5 sec
                                                                ago</span></h6>
                                                        <p class="msg-info">The standard chunk of lorem</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notification-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-online">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/avatar-1.png"
                                                            class="msg-avatar" alt="user avatar">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Daisy Anderson<span
                                                                class="msg-time float-end">5 sec
                                                                ago</span></h6>
                                                        <p class="msg-info">The standard chunk of lorem</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notification-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-online">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/avatars/outlook.png"
                                                            class="msg-avatar" alt="user avatar">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">Daisy Anderson<span
                                                                class="msg-time float-end">5 sec
                                                                ago</span></h6>
                                                        <p class="msg-info">The standard chunk of lorem</p>
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

                
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>   
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/main.min.js'></script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                <?php 
                $my_sessions = $wpdb->get_results($wpdb->prepare("SELECT order_id FROM {$wpdb->prefix}wc_orders_meta WHERE meta_key = 'session_coach_id' AND meta_value='$user_id' "));
                foreach($my_sessions as $sess){
                  $order = wc_get_order($sess->order_id);
                  $session_date = $order->get_meta( 'session_date' ); ?>
                  { title: 'Booked for <?php echo date("h:i A", strtotime($session_date)); ?>', date: '<?php echo date("Y-m-d", strtotime($session_date)); ?>', },
                <?php } ?>
            ]
        });
        calendar.render();
    });
</script>