<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>
<?php
if (isset($_SESSION['member_user']) || isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) { ?>
    <?php

    if (isset($_SESSION['member_id']) || isset($_SESSION['member_user'])) {
        $mem_id = $_SESSION['member_id'];
        $user = $_SESSION['member_user'];
    } elseif (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
        $mem_id = $_COOKIE['mem_user_id'];
        $user = $_COOKIE['mem_user_name'];
    } else {
        $mem_id = -1;
        $user = -1;
    }


    ?>
    <div class="author-area">
        <!-- <a href="signup.php" class="author-area__seller-btn inline">Become a Seller</a> -->

        <div class="author__notification_area">
            <ul>
                <li class="has_dropdown">
                    <div class="icon_wrap">
                        <a href="notification.php"><span class="lnr lnr-alarm"></span></a>
                        <?php $pro_notif =  notifcations($mem_id);
                        echo $pro_notif >= 1 ? "<span class='notification_count noti'>$pro_notif</span>" : '';
                        ?>
                    </div>
                    <?php
                    $notif = proNotif($user);
                    // Check Variable notif That is Not Null
                    if ($notif == null) {
                    } else {
                        foreach ($notif as $notif_data) {
                            $product_id = $notif_data['with_pro_id'];
                            $proFromTbl = showProductsById($product_id);
                            foreach ($proFromTbl as $proTblInfo) {
                                $pro_name = $proTblInfo['mem_pro_name'];
                                $pro_image = $proTblInfo['mem_pro_image'];
                    ?>
                                <div class="dropdowns notification--dropdown">
                                    <div class="dropdown_module_header">
                                        <h4>My Notifications</h4>
                                        <a href="notification.php">View All</a>
                                    </div>

                                    <div class="notifications_module">
                                        <div class="notification">
                                            <div class="notification__info">
                                                <div class="info_avatar">
                                                    <img width="100px" height="50px" src="admin/img/member_product/<?php echo $pro_name; ?>/<?php echo $pro_image; ?>" alt="<?php echo $pro_name; ?>">
                                                </div>
                                                <div class="info">
                                                    <p>
                                                        <span><?php echo $pro_name; ?></span><a href="dashboard-withdrawal.php#productConfirmPlace">Someone Want TO buy This</a>
                                                    </p>
                                                    <p class="time"><?php echo $notif_data['with_date'] ?></p>
                                                </div>
                                            </div>
                                            <div class="notification__icons ">
                                                <span class="lnr lnr-cart purchased noti_icon"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php  }
                        }
                    }
                    ?>

                </li>

                <li class="has_dropdown">
                    <?php
                    $conn = config();
                    $msg_notif = "SELECT * FROM messages WHERE msg_state=:state AND reciever = :reciever";
                    $stmt_notif = $conn->prepare($msg_notif);
                    $stmt_notif->execute([
                        ':state' => '0',
                        ':reciever' => $mem_id
                    ]);
                    $count_msg = $stmt_notif->rowCount();
                    ?>
                    <div class="icon_wrap">
                        <span class="lnr lnr-envelope"></span>

                        <?php echo $count_msg >= 1 ? "<span class='notification_count msg'> $count_msg</span>" : ""; ?>
                    </div>

                    <!-- Badge is Not Exist! Because The Message is Not Exist -->
                    <div class="dropdowns messaging--dropdown">
                        <div class="dropdown_module_header">
                            <h4>My Messages</h4>
                            <a href="message.php">View All</a>
                        </div>

                        <div class="messages active">
                            <?php while ($rows_msg = $stmt_notif->fetch(PDO::FETCH_ASSOC)) {
                                $msg_id = $rows_msg['msg_id'];
                                $msg_user = $rows_msg['msg_user_name'];
                                $msg_detail = $rows_msg['msg_detail'];
                                $msg_date = $rows_msg['msg_date'];
                            ?>
                                <a href="message.php?msg_id=<?php echo $msg_id; ?>" class="message">
                                    <div class="message__actions_avatar">
                                        <?php
                                        // query for Sender info
                                        $sender_sql = "SELECT * FROM members WHERE mem_user_name=:mem_user_name";
                                        $stmt_sender = $conn->prepare($sender_sql);
                                        $stmt_sender->execute([
                                            ':mem_user_name' => $msg_user
                                        ]);
                                        $rows_sender = $stmt_sender->fetch(PDO::FETCH_ASSOC);
                                        $sender_user_name = $rows_sender['mem_user_name'];
                                        $sender_image = $rows_sender['mem_image'];
                                        ?>
                                        <div class="avatar">
                                            <img src="admin/img/member_avatars/<?php echo $msg_user; ?>/<?php echo $sender_image; ?>" alt="<?php echo $msg_user; ?>">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <span class="lnr lnr-envelope"></span>
                                                <p><?php echo $msg_user; ?></p>
                                            </div>

                                            <span class="time"><?php echo $msg_date; ?></span>
                                            <p><?php echo substr($msg_detail, 0, 25); ?> ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </a>
                            <?php } ?>
                            <!-- end /.message -->
                        </div>
                    </div>
                </li>
                <?php
                $sql_cart = "SELECT * FROM cart WHERE who_adding_id = :cart_owner limit 0,3";
                $stmt_cart = $conn->prepare($sql_cart);
                $stmt_cart->execute([
                    ':cart_owner' => $mem_id
                ]);
                $count_rows_in_cart = $stmt_cart->rowCount();
                ?>
                <li class="has_dropdown">
                    <div class="icon_wrap">
                        <a href="cart.php"><span class="lnr lnr-cart"></span></a>
                        <!-- Cart Badge -->

                        <?php echo $count_rows_in_cart >= 1 ? "<span class='notification_count purch'>  $count_rows_in_cart </span>"
                            : '';
                        ?>

                        <!-- END Cart Badge -->
                    </div>
                    <?php
                    while ($rows_cart = $stmt_cart->fetch(PDO::FETCH_ASSOC)) {
                        $cart_product = $rows_cart['pro_id'];
                        $cart_owner = $rows_cart['pro_author'];

                        $sql_pro_cart = "SELECT * FROM mem_products WHERE mem_pro_id=:mem_pro_id AND author = :author_cart";
                        $stmt_pro = $conn->prepare($sql_pro_cart);
                        $stmt_pro->execute([
                            ':mem_pro_id' => $cart_product,
                            ':author_cart' => $cart_owner
                        ]); ?>

                        <?php
                        while ($rows_product = $stmt_pro->fetch(PDO::FETCH_ASSOC)) {
                            $pro_cart_id = $rows_product['mem_pro_id'];
                            $name = $rows_product['mem_pro_name'];
                            $image = $rows_product['mem_pro_image'];
                            $price = $rows_product['price'];
                        ?>
                            <div class="dropdowns dropdown--cart">
                                <div class="cart_area">
                                    <div class="cart_product">
                                        <div class="product__info">
                                            <div class="thumbn">
                                                <!-- Image OR Video -->
                                                <?php
                                                $exp = explode(".", $image);
                                                $ext = end($exp);
                                                if ($ext == "jpg" or $ext == "png" or $ext == "jpeg" or $ext == 'gif') { ?>
                                                    <img class="round" height="80px" width="80px" src="./admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>" alt="Product Image">

                                                <?php } else { ?>
                                                    <div class="card">
                                                        <video width="80px" height="80px" autoplay muted loop poster="placeholder.png">
                                                            <source src="./admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>">
                                                        </video>
                                                    </div>
                                                <?php } ?>
                                                <!-- END Image OR Video -->
                                            </div>

                                            <div class="info">
                                                <a class="title" href="single-product.php"><?php echo $name; ?></a>
                                                <!-- <div class="cat">
                                                    <a href="#">
                                                        <img src="images/catword.png" alt="">Wordpress</a>
                                                </div> -->
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
                                        <!-- <p>
                                            <span>Total :</span>$80
                                        </p> -->
                                    </div>
                                    <div class="cart_action">
                                        <a class="go_cart" href="cart.php">View Cart</a>
                                        <a class="go_checkout" href="dashboard-withdrawal.php">white list</a>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </li>
            </ul>
        </div>
        <!--start .author__notification_area -->
        <!-- User info -->
        <?php
        $conn = config();

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
                <img class='rounded' width="50px" height="50px" src="admin/img/member_avatars/<?php echo $name ?>/<?php echo $image; ?>" alt="user avatar">

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
                        <a href="dashboard-purchase.php">
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
                    <img width="50px" height="50px" class="rounded" src="admin/img/member_avatars/<?php echo $name ?>/<?php echo $image; ?>" alt="user avatar">
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
                                <?php echo $pro_notif >= 1 ? "<span class='notification_count noti'>$pro_notif</span>" : ''; ?>
                            </div>
                        </a>
                    </li>

                    <li>

                        <a href="message.php">
                            <div class="icon_wrap">
                                <span class="lnr lnr-envelope"></span>
                                <?php echo $count_msg >= 1 ? "<span class='notification_count msg'>$count_msg</span>" : ''; ?>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="cart.php">
                            <div class="icon_wrap">
                                <span class="lnr lnr-cart"></span>
                                <?php echo $count_rows_in_cart >= 1 ? "<span class='notification_count purch'>  $count_rows_in_cart </span>"
                                    : ''; ?>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!--END mobile Notification .author__notification_area -->

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
                        <span class="lnr lnr-alarm"></span>
                    </div>

                    <!-- Removed Some Code for notifications  -->
                </li>


                <li class="has_dropdown">
                    <div class="icon_wrap">
                        <span class="lnr lnr-envelope"></span>
                    </div>
                </li>
                <li class="has_dropdown">
                    <div class="icon_wrap">
                        <span class="lnr lnr-cart"></span>
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