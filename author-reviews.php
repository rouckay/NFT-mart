<?php $curr_page = basename(__FILE__); ?>
<?php require_once "header.php"; ?>
<!-- Check Member If that is sign In Or Not -->
<?php check_mem(); ?>
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
                            <a href="<?php echo $curr_page; ?>">Author Profile</a>
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
$u_info = "SELECT * FROM members WHERE mem_id =:id";
$stmt_ad = $conn->prepare($u_info);
$stmt_ad->execute([
    ':id' => $mem_id,
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
                <aside class="sidebar sidebar_author">
                    <div class="author-card sidebar-card">
                        <div class="author-infos">
                            <div class="author_avatar">
                                <img width="100px" height="100px" src="admin/img/member_avatars/<?php echo $user_name; ?>/<?php echo $image; ?>" alt="Presenting the broken author avatar :D">
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
                                        <span data-toggle="tooltip" data-placement="bottom" title="Has sold more than $10k">
                                            <img src="images/svg/author_level_3.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom" title="Referred 10+ members">
                                            <img src="images/svg/affiliate_level_1.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom" title="Has Collected 2+ Items">
                                            <img src="images/svg/collection_level_1.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom" title="Exclusive Author">
                                            <img src="images/svg/exclusive_author.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom" title="Weekly Featured Author">
                                            <img src="images/svg/featured_author.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom" title="Member for 2 Year">
                                            <img src="images/svg/members_years.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom" title="The seller is recommended by authority">
                                            <img src="images/svg/recommended.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom" title="Won a contest">
                                            <img src="images/svg/contest_winner.svg" alt="" class="svg">
                                        </span>
                                    </li>
                                    <li>
                                        <span data-toggle="tooltip" data-placement="bottom" title="Helped to resolve copyright issues">
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
                                        ':so_id' => $mem_id
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
                    <?php require_once './module/author_items_followers.php'; ?>
                    <!-- end /.author-menu -->

                    <div class="sidebar-card freelance-status">
                        <div class="custom-radio">
                            <input type="radio" id="opt1" class="" name="filter_opt" checked>
                            <label for="opt1">
                                <span class="circle"></span>Available for Freelance work</label>
                        </div>
                    </div>
                    <!-- end /.author-card -->
                    <?php require_once './module/message_system.php'; ?>
                    <!-- end /.freelance-status -->
                </aside>
            </div>
            <!-- end /.sidebar -->

            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <?php
                    $conn = config();
                    // if (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
                    //     $user_id = base64_decode($_COOKIE['mem_user_id']);
                    //     $mem_user_name = base64_decode($_COOKIE['mem_user_name']);
                    // } elseif (isset($_SESSION['member_id']) || isset($_SESSION['member_user'])) {
                    //     $user_id = $_SESSION['member_id'];
                    //     $mem_user_name = $_SESSION['member_user'];
                    // } else {
                    //     $user_id = -1;
                    // }
                    $mem_pro_sql = "SELECT * FROM mem_products WHERE author = :author  ORDER BY mem_pro_id DESC";
                    $stmt_mem = $conn->prepare($mem_pro_sql);
                    $stmt_mem->execute([
                        ':author' => $user
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
                                <img src="admin/img/member_cover_photo/<?php echo $user_name; ?>/<?php echo $cover_image; ?>" alt="author image">
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- end /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="product-title-area">
                            <div class="product__title">
                                <h2>
                                    <span class="bold">26</span> Customer Reviews
                                </h2>
                            </div>
                        </div>
                        <!-- end /.product-title-area -->

                        <div class="thread thread_review thread_review2">
                            <ul class="media-list thread-list">
                                <li class="single-thread">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="images/m1.png" alt="Commentator Avatar">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <div class="media-heading">
                                                        <a href="author.html">
                                                            <h4>Themexylum</h4>
                                                        </a>
                                                        <a href="#" class="rev_item">Mini - Responsive Bootstrap Dashboard</a>
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
                                                    <span class="review_tag">support</span>
                                                </div>

                                                <div class="pull-right rev_time">9 Hours Ago</div>
                                            </div>
                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceleris
                                                que the mattis, leo quam aliquet congue placerat mi id nisi interdum
                                                mollis.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <!-- end single comment thread /.comment-->

                                <li class="single-thread">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="images/m4.png" alt="Commentator Avatar">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <div class="media-heading">
                                                        <a href="author.html">
                                                            <h4>Codepoet_Biplob</h4>
                                                        </a>
                                                        <a href="#" class="rev_item">Beidea - One Page Parallax</a>
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
                                                    <span class="review_tag">code quality</span>
                                                </div>

                                                <div class="pull-right rev_time">3 Hours Ago</div>
                                            </div>
                                            <p>Awesome theme. All in one Business Website Solutions.</p>
                                        </div>
                                    </div>
                                </li>
                                <!-- end single comment thread /.comment-->

                                <li class="single-thread">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="images/m5.png" alt="Commentator Avatar">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <div class="media-heading">
                                                        <a href="author.html">
                                                            <h4>PaglaGhora</h4>
                                                        </a>
                                                        <a href="#" class="rev_item">Carlos - Creative Agency Template</a>
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
                                                    <span class="review_tag">design quality</span>
                                                </div>

                                                <div class="pull-right rev_time">4 Days Ago</div>
                                            </div>
                                            <p>Best theme ever....</p>
                                        </div>
                                    </div>
                                </li>
                                <!-- end single comment thread /.comment-->

                                <li class="single-thread">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="images/m6.png" alt="Commentator Avatar">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <div class="media-heading">
                                                        <a href="author.html">
                                                            <h4>Hearingorg</h4>
                                                        </a>
                                                        <a href="#" class="rev_item">Appspress - applanding page</a>
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
                                                    <span class="review_tag">support</span>
                                                </div>

                                                <div class="pull-right rev_time">4 Days Ago</div>
                                            </div>
                                            <p>Very helpful support - above and beyond is my experience and I have purchased
                                                this theme many times for my clients.</p>
                                        </div>
                                    </div>
                                </li>
                                <!-- end single comment thread /.comment-->

                                <li class="single-thread">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="images/m7.png" alt="Commentator Avatar">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <div class="media-heading">
                                                        <a href="author.html">
                                                            <h4>ecom1206</h4>
                                                        </a>
                                                        <a href="#" class="rev_item">Rida-Onepage vcard portfolio theme</a>
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
                                                    <span class="review_tag">code quality</span>
                                                </div>

                                                <div class="pull-right rev_time">42 minutes ago</div>
                                            </div>
                                            <p>Awesome theme. All in one Business Website Solutions.</p>
                                        </div>
                                    </div>
                                </li>
                                <!-- end single comment thread /.comment-->

                                <li class="single-thread">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="images/m8.png" alt="Commentator Avatar">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <div class="media-heading">
                                                        <a href="author.html">
                                                            <h4>Mr.Mango</h4>
                                                        </a>
                                                        <a href="#" class="rev_item">Tamabill - Multi-Purpose HTML Template</a>
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
                                                                <span class="fa fa-star-o" aria-hidden="true"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star-o" aria-hidden="true"></span>
                                                            </li>
                                                            <li>
                                                                <span class="fa fa-star-o" aria-hidden="true"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <span class="review_tag">design quality</span>
                                                </div>

                                                <div class="pull-right rev_time">1 years ago</div>
                                            </div>
                                            <p>Retina logo won't work retina logo won't work</p>
                                        </div>
                                    </div>
                                </li>
                                <!-- end single comment thread /.comment-->

                                <li class="single-thread">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="images/m6.png" alt="Commentator Avatar">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <div class="media-heading">
                                                        <a href="author.html">
                                                            <h4>Hearingorg</h4>
                                                        </a>
                                                        <a href="#" class="rev_item">Khadim - Extension Bundle</a>
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
                                                    <span class="review_tag">support</span>
                                                </div>

                                                <div class="pull-right rev_time">27 Days Ago</div>
                                            </div>
                                            <p>Very helpful support - above and beyond is my experience and I have purchased
                                                this theme many times for my clients.</p>
                                        </div>
                                    </div>
                                </li>
                                <!-- end single comment thread /.comment-->

                                <li class="single-thread">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="images/m9.png" alt="Commentator Avatar">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <div class="media-heading">
                                                        <a href="author.html">
                                                            <h4>Tueld</h4>
                                                        </a>
                                                        <a href="#" class="rev_item">Elpis - A Simple Design For Bloggers</a>
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
                                                    <span class="review_tag">code quality</span>
                                                </div>

                                                <div class="pull-right rev_time">3 months</div>
                                            </div>
                                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceleris
                                                que the mattis, leo quam aliquet congue placerat mi id nisi interdum
                                                mollis. </p>
                                        </div>
                                    </div>
                                </li>
                                <!-- end single comment thread /.comment-->

                                <li class="single-thread">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="images/m3.png" alt="Commentator Avatar">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <div class="media-heading">
                                                        <a href="author.html">
                                                            <h4>Living Potato</h4>
                                                        </a>
                                                        <span>3 months ago</span>
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
                                                    <span class="review_tag">customization</span>
                                                </div>

                                                <div class="pull-right rev_time">2456454 years ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- end single comment thread /.comment-->

                                <li class="single-thread">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="images/m6.png" alt="Commentator Avatar">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <div class="media-heading">
                                                        <a href="author.html">
                                                            <h4>Visual-Eggs</h4>
                                                        </a>
                                                        <a href="#" class="rev_item">Dhalua - WordPress Theme for Personal Blog</a>
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
                                                    <span class="review_tag">support</span>
                                                </div>

                                                <div class="pull-right rev_time">39 second ago</div>
                                            </div>
                                            <p>This is the finest art in the history of whateverland. Pastor: No it's a
                                                witchcraft.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <!-- end single comment thread /.comment-->
                            </ul>
                            <!-- end /.media-list -->

                            <div class="pagination-area pagination-area2">
                                <nav class="navigation pagination " role="navigation">
                                    <div class="nav-links">
                                        <a class="page-numbers current" href="#">1</a>
                                        <a class="page-numbers" href="#">2</a>
                                        <a class="page-numbers" href="#">3</a>
                                        <a class="next page-numbers" href="#">
                                            <span class="lnr lnr-arrow-right"></span>
                                        </a>
                                    </div>
                                </nav>
                            </div>
                            <!-- end /.comment pagination area -->
                        </div>
                        <!-- end /.comments -->
                    </div>
                    <!-- end /.col-md-12 -->
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
<script>
    // $(document).ready(function() {
    //     $('#save_bio').click(function() {
    //         $('#save_bio').attr('disabled', 'disabled');
    //         $('#bio_form')[0].reset();
    //         var bio = $('#bio').val();
    //         var mem_id = $('#mem_id').val();
    //         $.ajax({
    //             url: 'admin/include/user_functions.php',
    //             method: 'POST',
    //             data: {
    //                 bio: bio,
    //                 mem_id: mem_id
    //             },
    //             success: function(dataResault) {
    //                 var dataResault = JSON.parse(dataResault);
    //             }
    //         });
    //     });
    // });
</script>

<?php require_once "footer.php"; ?>