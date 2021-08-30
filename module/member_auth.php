<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>
<?php
if (isset($_SESSION['member_user']) || isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) { ?>
<div class="author-area">
    <!-- <a href="signup.php" class="author-area__seller-btn inline">Become a Seller</a> -->

    <div class="author__notification_area">
        <ul>
            <li class="has_dropdown">
                <div class="icon_wrap">
                    <span class="lnr lnr-alarm"></span>
                    <span class="notification_count noti">25</span>
                </div>

                <div class="dropdowns notification--dropdown">

                    <div class="dropdown_module_header">
                        <h4>My Notifications</h4>
                        <a href="notification.php">View All</a>
                    </div>

                    <div class="notifications_module">

                        <!-- end /.notifications -->

                        <div class="notification">
                            <div class="notification__info">
                                <div class="info_avatar">
                                    <img src="images/notification_head2" alt="">
                                </div>
                                <div class="info">
                                    <p>
                                        <span>Mahmood</span> commented on
                                        <a href="#">MartPlace Extension Bundle</a>
                                    </p>
                                    <p class="time">Just now</p>
                                </div>
                            </div>
                            <!-- end /.notifications -->

                            <div class="notification__icons ">
                                <span class="lnr lnr-bubble commented noti_icon"></span>
                            </div>
                            <!-- end /.notifications -->
                        </div>
                    </div>
                    <!-- end /.dropdown -->
                </div>
            </li>

            <li class="has_dropdown">
                <?php
                    $conn = config();
                    if (isset($_SESSION['member_id']) || isset($_SESSION['member_user'])) {
                        $mem_id = $_SESSION['member_id'];
                        $user = $_SESSION['member_user'];
                    } elseif (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
                        $mem_id = base64_decode($_COOKIE['mem_user_id']);
                        $user = base64_decode($_COOKIE['mem_user_name']);
                    } else {
                        $mem_id = -1;
                    }
                    $msg_notif = "SELECT * FROM messages WHERE reciever = :reciever";
                    $stmt_notif = $conn->prepare($msg_notif);
                    $stmt_notif->execute([
                        ':reciever' => $mem_id
                    ]);
                    $count_msg = $stmt_notif->rowCount();
                    ?>
                <div class="icon_wrap">
                    <span class="lnr lnr-envelope"></span>
                    <span class="notification_count msg"><?php echo $count_msg; ?></span>
                </div>

                <div class="dropdowns messaging--dropdown">
                    <div class="dropdown_module_header">
                        <h4>My Messages</h4>
                        <a href="message.php">View All</a>
                    </div>

                    <div class="messages">
                        <?php while ($rows_msg = $stmt_notif->fetch(PDO::FETCH_ASSOC)) {
                                $msg_user = $rows_msg['msg_user_name'];
                                $msg_detail = $rows_msg['msg_detail'];
                                $msg_date = $rows_msg['msg_date'];
                            ?>
                        <a href="message.php" class="message active">
                            <div class="message__actions_avatar">
                                <div class="avatar">
                                    <img src="images/notification_head4.png" alt="">
                                </div>
                            </div>
                            <!-- end /.actions -->

                            <div class="message_data">
                                <div class="name_time">
                                    <div class="name">
                                        <p><?php echo $msg_user; ?></p>
                                        <span class="lnr lnr-envelope"></span>
                                    </div>

                                    <span class="time"><?php echo substr($msg_date, 0, 10); ?></span>
                                    <p><?php echo substr($msg_detail, 0, 35); ?> ...</p>
                                </div>
                            </div>
                            <!-- end /.message_data -->
                        </a>
                        <?php } ?>
                        <!-- end /.message -->
                    </div>
                </div>
            </li>
            <li class="has_dropdown">
                <div class="icon_wrap">
                    <span class="lnr lnr-cart"></span>
                    <span class="notification_count purch">2</span>
                </div>

                <div class="dropdowns dropdown--cart">
                    <div class="cart_area">
                        <div class="cart_product">
                            <div class="product__info">
                                <div class="thumbn">
                                    <img src="images/capro1.jpg" alt="cart product thumbnail">
                                </div>

                                <div class="info">
                                    <a class="title" href="single-product.php">Finance and
                                        Consulting Business Theme</a>
                                    <div class="cat">
                                        <a href="#">
                                            <img src="images/catword.png" alt="">Wordpress</a>
                                    </div>
                                </div>
                            </div>

                            <div class="product__action">
                                <a href="#">
                                    <span class="lnr lnr-trash"></span>
                                </a>
                                <p>$60</p>
                            </div>
                        </div>
                        <div class="cart_product">
                            <div class="product__info">
                                <div class="thumbn">
                                    <img src="images/capro2.jpg" alt="cart product thumbnail">
                                </div>

                                <div class="info">
                                    <a class="title" href="single-product.php">Flounce -
                                        Multipurpose OpenCart Theme</a>
                                    <div class="cat">
                                        <a href="#">
                                            <img src="images/catword.png" alt="">Wordpress</a>
                                    </div>
                                </div>
                            </div>

                            <div class="product__action">
                                <a href="#">
                                    <span class="lnr lnr-trash"></span>
                                </a>
                                <p>$60</p>
                            </div>
                        </div>
                        <div class="total">
                            <p>
                                <span>Total :</span>$80
                            </p>
                        </div>
                        <div class="cart_action">
                            <a class="go_cart" href="cart.php">View Cart</a>
                            <a class="go_checkout" href="checkout.php">Checkout</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!--start .author__notification_area -->
    <!-- User info -->
    <?php
        $conn = config();
        if (isset($_COOKIE['mem_user_id'])) {
            $mem_id = base64_decode($_COOKIE['mem_user_id']);
        } elseif (isset($_SESSION['member_id'])) {
            $mem_id = $_SESSION['member_id'];
        } else {
            $mem_id = -1;
        }
        $data_mem = "SELECT * FROM members WHERE mem_id = :id";
        $stmt_mem = $conn->prepare($data_mem);
        $stmt_mem->execute([
            ':id' => $mem_id
        ]);
        $rows = $stmt_mem->fetch(PDO::FETCH_ASSOC);
        $image = $rows['mem_image'];
        $name = $rows['mem_user_name'];
        ?>
    <!-- END User info -->
    <!--start .author-author__info-->
    <div class="author-author__info inline has_dropdown">
        <div class="author__avatar">
            <img class='rounded' width="50px" height="50px"
                src="admin/img/member_avatars/<?php echo $name ?>/<?php echo $image; ?>" alt="user avatar">

        </div>
        <div class="autor__info">
            <p class="name">
                <?php if (isset($_SESSION['member_user'])) {
                        echo $_SESSION['member_user'];
                    } elseif (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
                        echo $dec_name = base64_decode($_COOKIE['mem_user_name']);
                    } ?>
            </p>
            <p class="ammount">$<?php echo rand(0, 500); ?></p>
        </div>

        <div class="dropdowns dropdown--author">
            <ul>
                <li>
                    <a href="author.php">
                        <span class="lnr lnr-user"></span>Profile</a>
                </li>
                <li>
                    <a href="dashboard.php">
                        <span class="lnr lnr-home"></span> Dashboard</a>
                </li>
                <li>
                    <a href="dashboard-setting.php">
                        <span class="lnr lnr-cog"></span> Setting</a>
                </li>
                <li>
                    <a href="cart.php">
                        <span class="lnr lnr-cart"></span>Purchases</a>
                </li>
                <li>
                    <a href="favourites.php">
                        <span class="lnr lnr-heart"></span> Favourite</a>
                </li>
                <li>
                    <a href="dashboard-add-credit.php">
                        <span class="lnr lnr-dice"></span>Add Credits</a>
                </li>
                <li>
                    <a href="dashboard-statement.php">
                        <span class="lnr lnr-chart-bars"></span>Sale Statement</a>
                </li>
                <li>
                    <a href="dashboard-upload.php">
                        <span class="lnr lnr-upload"></span>Upload Item</a>
                </li>
                <li>
                    <a href="dashboard-manage-item.php">
                        <span class="lnr lnr-book"></span>Manage Item</a>
                </li>
                <li>
                    <a href="dashboard-withdrawal.php">
                        <span class="lnr lnr-briefcase"></span>Withdrawals</a>
                </li>
                <li>
                    <a name="reset" href="module/logout.php">
                        <span class="lnr lnr-exit"></span>Logout</a>
                </li>
            </ul>
        </div>
    </div>
    <!--end /.author-author__info-->
</div>

<!-- author area restructured for mobile -->
<div class="mobile_content ">
    <span class="lnr lnr-user menu_icon"></span>

    <!-- offcanvas menu -->
    <div class="offcanvas-menu closed">
        <span class="lnr lnr-cross close_menu"></span>
        <div class="author-author__info">
            <div class="author__avatar v_middle">
                <img width="50px" height="50px" class="rounded"
                    src="admin/img/member_avatars/<?php echo $name ?>/<?php echo $image; ?>" alt="user avatar">
            </div>
            <div class="autor__info v_middle">
                <p class="name">
                    <?php echo $name; ?>
                </p>
                <p class="ammount">$<?php echo rand(0, 500); ?></p>
            </div>
        </div>
        <!--end /.author-author__info-->

        <div class="author__notification_area">
            <ul>
                <li>
                    <a href="notification.php">
                        <div class="icon_wrap">
                            <span class="lnr lnr-alarm"></span>
                            <span class="notification_count noti">25</span>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="message.php">
                        <div class="icon_wrap">
                            <span class="lnr lnr-envelope"></span>
                            <span class="notification_count msg">6</span>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="cart.php">
                        <div class="icon_wrap">
                            <span class="lnr lnr-cart"></span>
                            <span class="notification_count purch">2</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <!--start .author__notification_area -->

        <div class="dropdowns dropdown--author">
            <ul>
                <li>
                    <a href="author.php">
                        <span class="lnr lnr-user"></span>Profile</a>
                </li>
                <li>
                    <a href="dashboard.php">
                        <span class="lnr lnr-home"></span> Dashboard</a>
                </li>
                <li>
                    <a href="dashboard-setting.php">
                        <span class="lnr lnr-cog"></span> Setting</a>
                </li>
                <li>
                    <a href="cart.php">
                        <span class="lnr lnr-cart"></span>Purchases</a>
                </li>
                <li>
                    <a href="favourites.php">
                        <span class="lnr lnr-heart"></span> Favourite</a>
                </li>
                <li>
                    <a href="dashboard-add-credit.php">
                        <span class="lnr lnr-dice"></span>Add Credits</a>
                </li>
                <li>
                    <a href="dashboard-statement.php">
                        <span class="lnr lnr-chart-bars"></span>Sale Statement</a>
                </li>
                <li>
                    <a href="dashboard-upload.php">
                        <span class="lnr lnr-upload"></span>Upload Item</a>
                </li>
                <li>
                    <a href="dashboard-manage-item.php">
                        <span class="lnr lnr-book"></span>Manage Item</a>
                </li>
                <li>
                    <a href="dashboard-withdrawal.php">
                        <span class="lnr lnr-briefcase"></span>Withdrawals</a>
                </li>
                <li>
                    <a name="reset" href="module/logout.php">
                        <span class="lnr lnr-exit"></span>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Not Loggened end .author-area -->
<?php } else { ?>
<div class="author-area">
    <a href="signup.php" class="author-area__seller-btn inline">Register And Become a Seller</a>

    <div class="author__notification_area">
        <ul>
            <li class="has_dropdown">
                <div class="icon_wrap">
                    <span class="fas fa-bell"></span>
                </div>

                <div class="dropdowns notification--dropdown">

                    <div class="dropdown_module_header">
                        <h4>My Notifications</h4>
                        <a href="notification.php">View All</a>
                    </div>

                    <div class="notifications_module">

                        <!-- end /.notifications -->

                        <div class="notification">
                            <a href="login.php" class="author-area__seller-btn inline">Sign In</a>

                            <!-- <div class="notification__info">
                                <div class="info_avatar">
                                    <img src="images/notification_head2.png" alt="">
                                </div>
                                <div class="info">
                                    <p>
                                        <span>Mahmood</span> commented on
                                        <a href="#">MartPlace Extension Bundle</a>
                                    </p>
                                    <p class="time">Just now</p>
                                </div>
                            </div> -->
                            <!-- end /.notifications -->

                            <div class="notification__icons ">
                                <span class="lnr lnr-bubble commented noti_icon"></span>
                            </div>
                            <!-- end /.notifications -->
                        </div>
                    </div>
                    <!-- end /.dropdown -->
                </div>
            </li>


            <li class="has_dropdown">
                <div class="icon_wrap">
                    <span class="fa fa-shopping-cart"></span>
                </div>
            </li>
            <li class="has_dropdown">
                <div class="icon_wrap">
                    <i class="fas fa-wallet"></i>
                </div>
            </li>
        </ul>
    </div>
    <!--start .author__notification_area -->

    <!--start .author-author__info-->
    <div class="author-author__info inline has_dropdown">
        <div class="author__avatar">

        </div>
        <!-- <div class="autor__info">
                <p class="name">
                    Mahmood Qazi
                </p>
                <p class="ammount">$20000000000.45</p>
            </div> -->
        <a href="login.php" class="author-area__seller-btn inline">Sign In</a>


    </div>
    <!--end /.author-author__info-->
</div>
<!-- end .author-area -->

<!-- author area restructured for mobile -->
<div class="mobile_content ">
    <span class="lnr lnr-user menu_icon"></span>

    <!-- offcanvas menu -->
    <div class="offcanvas-menu closed">
        <span class="lnr lnr-cross close_menu"></span>
        <div class="author-author__info">
            <div class="author__avatar v_middle">
                <a href="login.php" class="author-area__seller-btn inline">Sign In</a>
            </div>
        </div>
        <!--end /.author-author__info-->

        <div class="author__notification_area">

        </div>
        <!--start .author__notification_area -->

        <div class="dropdowns dropdown--author">

        </div>

        <div class="text-center">
            <a href="signup.php" class="author-area__seller-btn inline">Become a Seller</a>
        </div>
    </div>
</div>

<?php } ?>