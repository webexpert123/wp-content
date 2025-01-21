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
                            <?php echo $name; ?> <small>PTP-Athlete</small>
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
                        <a class="nav-link <?php if($section=="profile"){echo "active";} ?>" href="?section=profile"><i class="bx bx-user-circle"></i>My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($section=="sessions"){echo "active";} ?>" href="?section=sessions"><i class="bx bx-book-reader"></i>Session Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($section=="summercamps"){echo "active";} ?>" href="?section=summercamps"><i class="fa-solid fa-person-hiking"></i>Summer Camp Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" onclick="logout_user()"><i class="bx bx-power-off"></i>Logout <div class="spinner-border text-dark spinner-logout" style="display:none;"></div></a>
                    </li>
                </ul>
            </nav>