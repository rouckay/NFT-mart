<?php $curr_page = basename(__FILE__); ?>
<?php require_once('header.php'); ?>
<?php
if (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
    $mem_id = base64_decode($_COOKIE['mem_user_id']);
    $user = base64_decode($_COOKIE['mem_user_name']);
} elseif (isset($_SESSION['member_id']) || isset($_SESSION['member_user'])) {
    $mem_id = $_SESSION['member_id'];
    $user = $_SESSION['member_user'];
} else {
    $mem_id = -1;
    $user = -1;
}
?>
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <a href="#">Notifications</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">All Notifications</h1>
            </div>
        </div>
    </div>
</section>
<section class="dashboard-area">

    <div class="dashboard_contents">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard_title_area">
                        <div class="dashboard__title">
                            <h3>Your Notifications</h3>
                        </div>
                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="cardify notifications_module">
                        <?php

                        $conn = config();
                        $fetchSQL = "SELECT * FROM notification WHERE notificationFor = :owner";
                        $stmtFetch = $conn->prepare($fetchSQL);
                        $stmtFetch->execute([
                            ':owner' => $mem_id
                        ]);
                        while ($rows = $stmtFetch->fetch(PDO::FETCH_ASSOC)) {
                            $notif_id = $rows['ID'];
                            $type = $rows['type'];
                            $date = $rows['notif_at'];
                            $from = $rows['notificationFrom'];
                            $senderInfo = fetch_mem_info_by_id($from);
                            foreach ($senderInfo as $senderData) {
                                $senderImage = $senderData['mem_image'];
                                $senderName = $senderData['mem_name'];
                                $senderUserName = $senderData['mem_user_name'];
                        ?>
                                <div class="notification">
                                    <span class="line"></span>
                                    <div class="notification__info">
                                        <div class="info_avatar">
                                            <img src="admin/img/member_avatars/<?php echo $senderUserName; ?>/<?php echo $senderImage; ?>" alt="">
                                        </div>
                                        <div class="info">
                                            <p>
                                                <?php if ($type == "Message") { ?>
                                                    <span><?php echo $senderName; ?></span> Send Message To you
                                                    <a href="message.php">View Message</a>
                                            </p>
                                            <p class="time"><?php echo $date; ?></p>
                                        </div>
                                    </div>
                                    <!-- end /.notifications -->

                                    <div class="notification__icons ">
                                        <span class="lnr lnr-envelope commented noti_icon"></span>
                                        <span class="lnr lnr-cross"></span>
                                    </div>
                                <?php } else if ($type == 'Comment') { ?>

                                    <span><?php echo $senderName; ?></span> Commented On Your Products
                                    <a href="">View Comment</a>
                                    </p>
                                    <p class="time"><?php echo $date; ?></p>
                                </div>
                    </div>
                    <!-- end /.notifications -->

                    <div class="notification__icons ">
                        <span class="lnr lnr-bubble commented noti_icon text-info"></span>
                        <span class="lnr lnr-cross"></span>
                    </div>
                <?php } else if ($type == 'Favourite') { ?>
                    <span><?php echo $senderName; ?></span> Added Your Product To Favourite
                    <a href="">View Product</a>
                    </p>
                    <p class="time"><?php echo $date; ?></p>
                </div>
            </div>
            <!-- end /.notifications -->

            <div class="notification__icons ">
                <span class="lnr lnr-heart loved noti_icon text-danger"></span>
                <span class="lnr lnr-cross"></span>
            </div>
        <?php } else if ($type == "Reply") { ?>
            <span><?php echo $senderName; ?></span> Replied To Comment
            <a href="">View Reply</a>
            </p>
            <p class="time"><?php echo $date; ?></p>
        </div>
    </div>
    <!-- end /.notifications -->

    <div class="notification__icons ">
        <span class="lnr lnr-bubble commented noti_icon"></span>
        <span class="lnr lnr-cross"></span>
    </div>
<?php } else if ($type == "Add To Cart") { ?>
    <span><?php echo $senderName; ?></span> Add To Cart Your Product
    <a href="">View View Product</a>
    </p>
    <p class="time"><?php echo $date; ?></p>
    </div>
    </div>
    <!-- end /.notifications -->

    <div class="notification__icons ">
        <span class="lnr lnr-cart purchased noti_icon
        "></span>
        <span class="lnr lnr-cross"></span>
    </div>
<?php } ?>
<!-- end /.notifications -->
</div>
<!-- end /.notifications -->
<?php }
                        } ?>
<!-- end /.notifications -->


<!-- pagination -->
<div class="pagination-area pagination-area2">
    <nav class="navigation pagination " role="navigation">
        <div class="nav-links">
            <a class="prev page-numbers" href="#">
                <span class="lnr lnr-arrow-left"></span>
            </a>
            <a class="page-numbers current" href="#">1</a>
            <a class="page-numbers" href="#">2</a>
            <a class="page-numbers" href="#">3</a>
            <a class="next page-numbers" href="#">
                <span class="lnr lnr-arrow-right"></span>
            </a>
        </div>
    </nav>
</div>
<!-- end /.pagination -->
</div>
<!-- end /.notifications_modules -->
</div>
<!-- end /.col-md-12 -->
</div>
<!-- end /.row -->
</div>
<!-- end /.container -->
</div>
<!-- end /.dashboard_menu_area -->
</section>
<?php
require_once('footer.php');

?>
<script>
    swal("Hello world!");
</script>