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
                        <a class="nav-link <?php if($section=="summercamp"){echo "active";} ?>" data-toggle="collapse" href="#sub3" aria-expanded="false" aria-controls="sub3">
                            <i class="fa-solid fa-person-hiking"></i>
                            Summer Camps
                        </a>
                        <ul class="sub collapse" id="sub3">
                            <li class="nav-item">
                                <a class="nav-link" href="?section=summercamp">All Summer Camps</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">Registered Student</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($section=="messages"){echo "active";} ?>" href="?section=messages"><i class="bx bx-chat"></i>Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($section=="students"){echo "active";} ?>" href="?section=students"><i class="bx bx-book-reader"></i>Students Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($section=="profile"){echo "active";} ?>" href="?section=profile"><i class="bx bx-user-circle"></i>My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($section=="subscription"){echo "active";} ?>" href="?section=subscription"><i class="bx bx-money"></i>Manage
                            Subscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" onclick="logout_user()"><i class="bx bx-power-off"></i>Logout</a>
                    </li>
                </ul>
            </nav>