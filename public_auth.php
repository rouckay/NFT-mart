<?php $curr_page = basename(__FILE__); ?>
<?php require_once "header.php"; ?>
<!--================================
        START BREADCRUMB AREA
    =================================-->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
                            <a href="#">Author Profile</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Author's Profile</h1>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<!--================================
        END BREADCRUMB AREA
        || isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])
    =================================-->
<?php

// if (isset($_SESSION['member_id']) || isset($_SESSION['member_user'])) {
//     $mem_id = $_SESSION['member_id'];
//     $user = $_SESSION['member_user'];
// } elseif (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
//     $mem_id = base64_decode($_COOKIE['mem_user_id']);
//     $user = base64_decode($_COOKIE['mem_user_name']);
// } else {
//     $mem_id = -1;
// }
$conn = config();
$auth_id = $_GET['auth'];
$u_info = "SELECT * FROM members WHERE mem_id =:id";
$stmt_ad = $conn->prepare($u_info);
$stmt_ad->execute([
    ':id' => $auth_id,
]);
$row_user = $stmt_ad->fetch(PDO::FETCH_ASSOC);
$id = $row_user['mem_id'];
$name = $row_user['mem_name'];
$image = $row_user['mem_image'];
$user_name = $row_user['mem_user_name'];
$email = $row_user['mem_email'];
$at = $row_user['created_at'];
?>
<!--================================
        START AUTHOR AREA
    =================================-->
<section class="author-profile-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <?php if (isset($_GET['success_send'])) { ?>
                <span class='alert_icon lnr lnr-warning'></span>
                <strong>Correct!</strong> Your Message Successfully Sended To saller.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span class='lnr lnr-cross' aria-hidden='true'></span>
                </button>
                <?php } ?>
                <aside class="sidebar sidebar_author">
                    <div class="author-card sidebar-card">
                        <div class="author-infos">
                            <div class="author_avatar">
                                <img width="100px" height="100px"
                                    src="admin/img/member_avatars/<?php echo $user_name; ?>/<?php echo $image; ?>"
                                    alt="Presenting the broken author avatar :D">
                            </div>

                            <div class="author">
                                <h4><?php echo $name; ?></h4>
                                <p>Signed Up: <?php echo $at; ?></p>
                            </div>
                            <!-- end /.author -->

                            <div class="author-badges">
                                <ul class="list-unstyled">
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom" title="Diamnond Author">
                                            <img src="images/svg/author_rank_diamond.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom"
                                            title="Has sold more than $10k">
                                            <img src="images/svg/author_level_3.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom"
                                            title="Referred 10+ members">
                                            <img src="images/svg/affiliate_level_1.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom"
                                            title="Has Collected 2+ Items">
                                            <img src="images/svg/collection_level_1.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom" title="Exclusive Author">
                                            <img src="images/svg/exclusive_author.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom"
                                            title="Weekly Featured Author">
                                            <img src="images/svg/featured_author.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom" title="Member for 2 Year">
                                            <img src="images/svg/members_years.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom"
                                            title="The seller is recommended by authority">
                                            <img src="images/svg/recommended.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom" title="Won a contest">
                                            <img src="images/svg/contest_winner.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom"
                                            title="Helped to resolve copyright issues">
                                            <img src="images/svg/copyright.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.author-badges -->

                            <div class="social social--color--filled">
                                <ul>
                                    <?php
                                    $socia_prof = "SELECT * FROM mem_social_profiles WHERE mem_id = :so_id";
                                    $stmt_so = $conn->prepare($socia_prof);
                                    $stmt_so->execute([
                                        ':so_id' => $auth_id
                                    ]);
                                    $rows_soc = $stmt_so->fetch(PDO::FETCH_ASSOC);
                                    $facebook = $rows_soc['facebook'];
                                    $twitter = $rows_soc['twitter'];
                                    $Google = $rows_soc['google'];
                                    ?>
                                    <li>
                                        <a target="_blink" href="<?php echo $facebook; ?>">
                                            <span class="fa fa-facebook"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $twitter; ?>">
                                            <span class="fa fa-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $Google; ?>">
                                            <span class="fa fa-google-plus"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.social -->

                            <div class="author-btn">
                                <a href="" class="btn btn--md btn--round">Follow</a>
                            </div>
                            <!-- end /.author-btn -->
                        </div>
                        <!-- end /.author-infos -->


                    </div>
                    <!-- end /.author-card -->

                    <div class="sidebar-card author-menu">
                        <ul>
                            <li>
                                <a href="#" class="active">Profile</a>
                            </li>
                            <li>
                                <a href="author-items.php">Author Items</a>
                            </li>
                            <li>
                                <a href="author-reviews.php">Customer Reviews</a>
                            </li>
                            <li>
                                <a href="author-followers.php">Followers (67)</a>
                            </li>
                            <li>
                                <a href="author-following.php">Following (39)</a>
                            </li>
                        </ul>
                    </div>
                    <!-- end /.author-menu -->

                    <div class="sidebar-card freelance-status">
                        <div class="custom-radio">
                            <input type="radio" id="opt1" class="" name="filter_opt" checked>
                            <label for="opt1">
                                <span class="circle"></span>Available for Freelance work</label>
                        </div>
                    </div>
                    <!-- end /.author-card -->
                    <?php
                    if (isset($_SESSION['member_id']) || isset($_SESSION['member_user']) || isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
                        if (isset($_SESSION['member_id']) || isset($_SESSION['member_user'])) {
                            $user_id = $_SESSION['member_id'];
                            $user_name = $_SESSION['member_user'];
                        } elseif (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
                            $user_id = $_COOKIE['mem_user_id'];
                            $user_name = $_COOKIE['mem_user_user'];
                        } else {
                            $user_id = -1;
                            $user_name = -1;
                        }
                        $user_info = "SELECT * FROM members WHERE mem_id = :id";
                        $stmt_us = $conn->prepare($user_info);
                        $stmt_us->execute([
                            ':id' => $user_id
                        ]);
                        $rows_us = $stmt_us->fetch(PDO::FETCH_ASSOC);
                        $mem_user_name = $rows_us['mem_user_name'];
                        $mem_email = $rows_us['mem_email'];
                    ?>
                    <div class="sidebar-card message-card">
                        <div class="card-title">
                            <h4>Product Information</h4>
                        </div>
                        <?php
                            if (isset($_POST['send_msg'])) {
                                $msg_user_name = $_POST['user_name'];
                                $reciever = $_POST['reciever'];
                                $msg_email = $_POST['mem_email'];
                                $message = $_POST['message'];
                                message_to_mem($msg_user_name, $msg_email, $message, $reciever);
                            } ?>
                        <div class="message-form">
                            <form action="public_auth.php?auth=<?php echo $id; ?>&success_send" method="POST">
                                <!-- Hidden Textbox -->
                                <input type="hidden" name="reciever" value="<?php echo $id; ?>">
                                <input type="hidden" name="user_name" value="<?php echo $mem_user_name; ?>">
                                <input type="hidden" name="mem_email" value="<?php echo $mem_email; ?>">
                                <!-- END Hidden Textbox -->
                                <div class="form-group">
                                    <textarea name="message" class="text_field" id="author-message"
                                        placeholder="Your message..."></textarea>
                                </div>

                                <div class="msg_submit">
                                    <button type="submit" name="send_msg" class="btn btn--md btn--round">send
                                        message</button>
                                </div>
                            </form>
                            <?php //} 
                                ?>

                        </div>
                        <!-- end /.message-form -->
                    </div>
                    <?php } else { ?>
                    <div class="sidebar-card message-card">
                        <div class="card-title">
                            <h3>To Send Message Sign In First!</h3>
                        </div>
                        <div class="msg_submit">
                            <a href="login.php" style="text-align:center" class="btn btn--md btn--round">Sign
                                In</a>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- end /.freelance-status -->
                </aside>
            </div>
            <!-- end /.sidebar -->

            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <?php
                    $conn = config();
                    $mem_name_sql = "SELECT * FROM members WHERE mem_id = :id";
                    $stmt_m_id = $conn->prepare($mem_name_sql);
                    $stmt_m_id->execute([
                        ':id' => $auth_id
                    ]);
                    $rows_mem_id = $stmt_m_id->fetch(PDO::FETCH_ASSOC);
                    $mem_user_name = $rows_mem_id['mem_user_name'];
                    $mem_pro_sql = "SELECT * FROM mem_products WHERE author = :author  ORDER BY mem_pro_id DESC";
                    $stmt_mem = $conn->prepare($mem_pro_sql);
                    $stmt_mem->execute([
                        ':author' => $mem_user_name
                    ]);
                    $rows = $stmt_mem->rowCount();
                    if ($rows <= 0) {
                        echo "<p class='alert alert-danger'>Sorry Product Is Not Uploaded</p>";
                    } else {
                        $total_found = $rows;
                    ?>
                    <div class="col-md-4 col-sm-4">
                        <div class="author-info mcolorbg4">
                            <p>Total Items</p>
                            <h3><?php echo $total_found; ?></h3>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- end /.col-md-4 -->

                    <div class="col-md-4 col-sm-4">
                        <div class="author-info pcolorbg">
                            <p>Total sales</p>
                            <h3><?php echo rand(0, 8); ?></h3>
                        </div>
                    </div>
                    <!-- end /.col-md-4 -->

                    <div class="col-md-4 col-sm-4">
                        <div class="author-info scolorbg">
                            <p>Total Ratings</p>
                            <div class="rating product--rating">
                                <ul>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-half-o"></span>
                                    </li>
                                </ul>
                                <span class="rating__count">(26)</span>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-4 -->

                    <div class="col-md-12 col-sm-12">
                        <div class="author_module">
                            <!-- Image Size 750 X 370 -->
                            <?php
                            // session_cookie($mem_id, $user);
                            $cover_sql = "SELECT * FROM member_cover_photo WHERE mem_user_name = :mem_user_cov";
                            $stmt_cov = $conn->prepare($cover_sql);
                            $stmt_cov->execute([
                                ':mem_user_cov' => $user_name
                            ]);
                            while ($rows_cover = $stmt_cov->fetch(PDO::FETCH_ASSOC)) {
                                $cover_image = $rows_cover['cover_image']
                            ?>
                            <img src="admin/img/member_cover_photo/<?php echo $user_name; ?>/<?php echo $cover_image; ?>"
                                alt="author image">
                            <?php } ?>
                        </div>

                        <div class="author_module about_author">
                            <h2>About
                                <span><?php echo $user_name; ?></span>
                            </h2>
                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                                mattisleo
                                quam aliquet congue. Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo
                                ut scelerisque the mattisleo quam aliquet congue. Nunc placerat mi id nisi interdum
                                mollis.
                                Prae sent pharetra, justo ut scelerisque the mattisleo quam aliquet congue.</p>
                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                                mattisleo
                                quam aliquet congue. Nunc placerat mi id nisi interdum mollis. Praesent pharetra.</p>
                        </div>
                    </div>
                </div>
                <!-- end /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="product-title-area">
                            <div class="product__title">
                                <h2>Newest Products</h2>
                            </div>

                            <a href="#" class="btn btn--sm">See all Items</a>
                        </div>
                        <!-- end /.product-title-area -->
                    </div>
                    <!-- end /.col-md-12 -->
                    <!-- Author Products -->
                    <?php $auth_pros = "SELECT * FROM mem_products WHERE author = :auth ORDER BY mem_pro_id DESC LIMIT 0,4";
                    $stmt_auth_pro = $conn->prepare($auth_pros);
                    $stmt_auth_pro->execute([
                        ':auth' => $mem_user_name
                    ]);
                    while ($rows_auth_pro = $stmt_auth_pro->fetch(PDO::FETCH_ASSOC)) {
                        $id = $rows_auth_pro['mem_pro_id'];
                        $image = $rows_auth_pro['mem_pro_image'];
                        $name = $rows_auth_pro['mem_pro_name'];
                        $detail = $rows_auth_pro['mem_pro_detail'];
                        $price = $rows_auth_pro['price'];
                        $category = $rows_auth_pro['category_id'];
                        $tags = $rows_auth_pro['tag'];
                        $author = $rows_auth_pro['author'];
                    ?>
                    <!-- start .col-md-4 -->
                    <div class="col-lg-6 col-md-6">
                        <!-- start .single-product -->
                        <div class="product product--card">
                            <!-- Product Template image size 361 X 230 -->
                            <div class="product__thumbnail">
                                <img width="361px" height="230px"
                                    src="admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>"
                                    alt="Product Image">
                                <div class="prod_btn">
                                    <a href="single-product.php?id=<?php echo $auth_id ?>"
                                        class="transparent btn--sm btn--round">More Info</a>
                                    <a href="single-product.php?id=<?php echo $auth_id ?>"
                                        class="transparent btn--sm btn--round">Live Demo</a>
                                </div>
                                <!-- end /.prod_btn -->
                            </div>
                            <!-- end /.product__thumbnail -->

                            <div class="product-desc">
                                <a href="#" class="product_title">
                                    <h4><?php echo $name; ?></h4>
                                </a>
                                <ul class="titlebtm">
                                    <li>
                                        <!-- avatar Code -->
                                        <?php
                                            $u_avatar = "SELECT * FROM members WHERE mem_id =:id";
                                            $stmt_ava = $conn->prepare($u_avatar);
                                            $stmt_ava->execute([
                                                ':id' => $auth_id
                                            ]);
                                            while ($rows_ava = $stmt_ava->fetch(PDO::FETCH_ASSOC)) {
                                                $author_name = $rows_ava['mem_user_name'];
                                                $author_image = $rows_ava['mem_image'];
                                            ?>
                                        <img class="auth-img"
                                            src="admin/img/member_avatars/<?php echo $author_name; ?>/<?php echo $author_image; ?>"
                                            alt="author image">
                                        <p>
                                            <a href=""><?php echo $author_name; ?></a>
                                        </p>
                                        <?php } ?>
                                    </li>
                                    <li class="product_cat">
                                        <a href="#">
                                            <!-- Category Image -->
                                            <?php $cat_sql = "SELECT * FROM category WHERE cat_id = :cat_id";
                                                $stmt_cat = $conn->prepare($cat_sql);
                                                $stmt_cat->execute([
                                                    ':cat_id' => $category
                                                ]);
                                                while ($rows_cat = $stmt_cat->fetch(PDO::FETCH_ASSOC)) {
                                                    $cat_name = $rows_cat['cat_name'];
                                                    $cat_image = $rows_cat['cat_image'];
                                                ?>
                                            <img src="admin/img/cat_image/<?php echo $cat_name; ?>/<?php echo $cat_image ?>"
                                                alt="category image">
                                            <?php echo $cat_name; ?>
                                            <?php } ?>
                                        </a>
                                    </li>
                                </ul>

                                <p><?php echo $detail; ?>.</p>
                            </div>
                            <!-- end /.product-desc -->

                            <div class="product-purchase">
                                <div class="price_love">
                                    <span>$<?php echo $price; ?></span>
                                </div>

                                <div class="rating product--rating">
                                    <ul>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-half-o"></span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="sell">
                                    <p>
                                        <span class="lnr lnr-cart"></span>
                                        <span>50</span>
                                    </p>
                                </div>
                            </div>
                            <!-- end /.product-purchase -->
                        </div>
                        <!-- end /.single-product -->
                    </div>
                    <?php } ?>
                    <!-- end /.col-md-4 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.col-md-8 -->

        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<!--================================
        END AUTHOR AREA
    =================================-->

<?php
//  } else {
//     header("location:index.php");
// } 
?>
<!--================================
        START CALL TO ACTION AREA
    =================================-->
<section class="call-to-action bgimage">
    <div class="bg_image_holder">
        <img src="images/calltobg.jpg" alt="">
    </div>
    <div class="container content_above">
        <div class="row">
            <div class="col-md-12">
                <div class="call-to-wrap">
                    <h1 class="text--white">Ready to Join Our Marketplace!</h1>
                    <h4 class="text--white">Over 25,000 designers and developers trust the MartPlace.</h4>
                    <a href="#" class="btn btn--lg btn--round btn--white callto-action-btn">Join Us Today</a>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
// $(document).ready(function() {
//     $(".alert").fadeOut(5000);
// })
</script>
<!--================================
        END CALL TO ACTION AREA
    =================================-->
<?php require_once "footer.php"; ?>