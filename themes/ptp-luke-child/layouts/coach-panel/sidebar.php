<nav class="sidebar">
                <a class="navbar-brand" href="javascript:;">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo_white.png" class="align-top" alt="">
                </a>
                <ul class="nav">
                    <li class="nav-profile">
                        <div class="image">
                            <a href="javascript:;"><img src="<?php echo $profile_img_link; ?>" alt=""></a>
                        </div>
                        <div class="info">
                            <?php echo $name; ?> <small><?php echo $my_sport; ?> <?php echo $role; ?></small>
                        </div>
                    </li>
                </ul>
                <?php $section = isset($_REQUEST["section"]) ? $_REQUEST["section"] : "dashboard"; ?>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link  <?php if($section=="dashboard"){echo "active";} ?>" href="<?php echo site_url(); ?>/my-account-coach/"><i class="bx bx-home-alt"></i>Dashboard<span
                                class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php if($section=="sessions"){echo "active";} ?>" href="?section=sessions"><i class="bx bx-diamond"></i>Session Rate</a>
                    </li>

                    <li class="nav-item has-sub">
                        <a class="nav-link <?php if($section=="summercamp" OR $section=="registered_students"){echo "active";} ?>" data-toggle="collapse" href="#sub3" aria-expanded="false" aria-controls="sub3">
                            <i class="fa-solid fa-person-hiking"></i>
                            Summer Camps
                        </a>
                        <ul class="sub collapse" id="sub3">
                            <li class="nav-item">
                                <a class="nav-link" href="?section=summercamp">All Summer Camps</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?section=registered_students">Registered Student</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php if($section=="messages"){echo "active";} ?>" href="?section=messages"><i class="bx bx-chat"></i>Messages
                            <?php 
                            $unread_msg = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM {$wpdb->prefix}chat_messages WHERE receiver_id = %d AND read_status = 0", $user_id));
                            if($unread_msg != 0){
                                echo '&nbsp;<span class="badge badge-pill badge-danger">'.$unread_msg.'</span>';
                            } ?>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php if($section=="questions"){echo "active";} ?>" href="?section=questions"><i class="fa-solid fa-circle-question"></i>Questions asked 
                            <?php 
                            $question_new_row = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM {$wpdb->prefix}have_questions_coach WHERE coach_id = '$user_id' AND status='0' "));
                            if($question_new_row!=0){
                                echo '&nbsp;<span class="badge badge-pill badge-danger">New</span>';
                            } ?>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php if($section=="students"){echo "active";} ?>" href="?section=students"><i class="bx bx-book-reader"></i>Booked Sessions</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php if($section=="profile"){echo "active";} ?>" href="?section=profile"><i class="bx bx-user-circle"></i>My Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php if($section=="subscription"){echo "active";} ?>" href="?section=subscription"><i class="bx bx-money"></i>Manage
                            Subscription</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" onclick="logout_user()"><i class="bx bx-power-off"></i>Logout <div class="spinner-border text-dark spinner-logout" style="display:none;"></div></a>
                    </li>
                </ul>
            </nav>