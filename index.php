<?php $curr_page = basename(__FILE__); ?>
<!-- Header -->
<?php require_once 'header.php'; ?>
<!-- END Header -->
<!--================================
    START HERO AREA
=================================-->
<!-- Current user Info -->
<?php

require_once "module/cookie_session.php";

?>
<?php


if (isset($_SESSION['member_id'])) {
    $mem_id = $_SESSION['member_id'];
} elseif (isset($_COOKIE['mem_user_id'])) {
    $mem_id = base64_decode($_COOKIE['mem_user_id']);
} else {
    $mem_id = -1;
}
?>
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
    $user = -1;
}
?>
<!-- END Current user Info -->
<section class="hero-area bgimage">

    <div class="bg_image_holder">
        <?php
        $conn = config();
        $sql_image = "SELECT * FROM background_img WHERE status = :status LIMIT 0,1";
        $stmt_img = $conn->prepare($sql_image);
        $stmt_img->execute([
            ':status' => 'publish'
        ]);
        while ($rows_img = $stmt_img->fetch(PDO::FETCH_ASSOC)) {
            $name_image = $rows_img['name'];
            $background_image = $rows_img['wallpaper'];
        ?>
            <img width="1920px" height="745px" src="admin/img/home_bg_image/<?php echo $name_image; ?>/<?php echo $background_image; ?>" alt="background-image">
        <?php } ?>
    </div>
    <!-- start hero-content -->
    <div class="hero-content content_above">
        <!-- start .contact_wrapper -->
        <div class="content-wrapper">
            <!-- start .container -->
            <div class="container">
                <!-- start row -->
                <div class="row">
                    <!-- start col-md-12 -->
                    <div class="col-md-12">
                        <div class="hero__content__title">
                            <h1>
                                <span class="light">Create Your Store</span>
                                <span class="bold">Medical Marketplace</span>
                            </h1>
                            <p class="tagline">Welcome to The Biggest Medical MartPlace</p>
                        </div>

                        <!-- start .hero__btn-area-->
                        <div class="hero__btn-area">
                            <a href="products.php" class="btn btn--round btn--lg">View All Products</a>
                            <a href="products.php" class="btn btn--round btn--lg">Popular Products</a>
                        </div>
                        <!-- end .hero__btn-area-->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end .contact_wrapper -->
    </div>
    <!-- end hero-content -->

    <!--start search-area -->
    <div class="search-area">
        <!-- start .container -->
        <div class="container">
            <!-- start .container -->
            <div class="row">
                <!-- start .col-sm-12 -->
                <div class="col-sm-12">
                    <!-- start .search_box -->
                    <div class="search_box">
                        <form action="search.php" method="POST">
                            <input type="text" name="s_text" class="text_field" placeholder="Search your products...">

                            <div class="search__select select-wrap">
                                <!-- <select name="category" class="select--field" id="blah">
                                    <option value="">All Categories</option>
                                </select> -->
                                <span class="lnr lnr-chevron-down"></span>
                            </div>
                            <button type="submit" name="btn_s" class="search-btn btn--lg">Search Now</button>
                        </form>
                    </div>
                    <!-- end ./search_box -->
                </div>
                <!-- end /.col-sm-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!--start /.search-area -->
</section>


<!--================================
END HERO AREA
=================================-->

<section class="featured-products bgcolor2 section--padding">
    <div class="container">
        <div class="row">
            <!-- start col-md-12 -->
            <div class="col-md-12">
                <div class="section-title">
                    <h1>Our Featured
                        <span class="highlighted">Products</span>
                    </h1>
                    <p>This Is the Most Popular Featured Product In Market Today, So Any Seller Product can be Most Popular Featured Product by selling Most Of that Products In This Market.</p>
                </div>
            </div>
            <!-- end /.col-md-12 -->
        </div>

        <div class="row">
            <?php
            $popular_pro =  popular_pro();
            foreach ($popular_pro as $popular_data) {
                $id = $popular_data['mem_pro_id'];
                $image = $popular_data['mem_pro_image'];
                $name = $popular_data['mem_pro_name'];
                $detail = $popular_data['mem_pro_detail'];
                $price = $popular_data['price'];
                $category = $popular_data['category_id'];
                $tags = $popular_data['tag'];
                $author = $popular_data['author'];
            }
            ?>
            <div class="col-md-12">
                <div class="featured-product-slider prod-slider2">
                    <div class="featured__single-slider">
                        <div class="featured__preview-img">
                            <!-- Image & video Show -->
                            <?php
                            $exp = explode(".", $image);
                            $ext = end($exp);
                            if ($ext == "jpg" or $ext == "png" or $ext == "jpeg" or $ext == "gif") { ?>
                                <img height="450px" width="555px" src="./admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>" alt="Product Image">

                            <?php } else { ?>
                                <div class='author-info author-info--dashboard mcolorbg4'><strong>
                                        Please upload you product Image that contain one of These Extensions "jpg , png, jpeg, gif"</strong>
                                </div>
                            <?php } ?>
                            <!-- END Image & video Show -->
                        </div>
                        <!-- end /.featured__preview-img -->

                        <div class="featured__product-description">
                            <div class="product-desc desc--featured">
                                <a href="single-product.php?id=<?php echo $id; ?>" class="product_title">
                                    <h4><?php echo $name; ?></h4>
                                </a>
                                <ul class="titlebtm">
                                    <li>
                                        <img class="auth-img" src="images/auth.jpg" alt="author image">
                                        <p>
                                            <a href="#"><?php echo $author; ?></a>
                                        </p>
                                    </li>
                                    <li class="product_cat">
                                        <a href="category.php?id=<?php echo $id; ?>">
                                            <span class="lnr lnr-book"></span> <?php echo $category; ?></a>
                                    </li>
                                </ul>
                                <!-- end /.titlebtm -->

                                <p><?php echo $detail; ?>.</p>
                            </div>
                            <!-- end /.product-desc -->

                            <div class="product_data">
                                <div class="tags tags--round">
                                    <ul>
                                        <li>
                                            <a href="#"><?php echo $tags; ?></a>
                                        </li>

                                    </ul>
                                </div>
                                <!-- end /.tags -->
                                <div class="product-purchase featured--product-purchase">
                                    <div class="price_love">
                                        <span>$<?php echo $price; ?></span>
                                        <p>
                                            <span class="lnr lnr-heart"></span> 90
                                        </p>
                                    </div>
                                    <div class="sell">
                                        <p>
                                            <span class="lnr lnr-cart"></span>
                                            <span>16</span>
                                        </p>
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
                                                <span class="fa fa-star"></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end /.product-purchase -->
                            </div>
                        </div>
                        <!-- end /.featured__product-description -->
                    </div>
                    <!--end /.featured__single-slider-->
                </div>
                <span class="lnr lnr-chevron-left prod_slide_prev"></span>
                <span class="lnr lnr-chevron-right prod_slide_next"></span>
            </div>
        </div>
        <!-- end /.featured__preview-img -->
    </div>
    <!-- end /.featured-product-slider -->
</section>

<!--================================
    START PRODUCTS AREA
=================================-->
<div class="container">
    <div class="row">
        <!-- start col-md-12 -->
        <div class="col-md-12">
            <div class="product-title-area bg-warning">
                <div class="product__title">
                    <h2 class="text-white">New Arrivel Products</h2>
                </div>

                <div class="filter__menu">
                    <p class="text-white">Filter by:</p>
                    <div class="filter__menu_icon bg-white">
                        <a href="#" id="drop1" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="svg" src="images/svg/menu.svg" alt="menu icon">
                        </a>

                        <ul class="filter_dropdown dropdown-menu" aria-labelledby="drop1">
                            <li>
                                <a href="#">Trending items</a>
                            </li>
                            <li>
                                <a href="#">Best seller</a>
                            </li>
                            <li>
                                <a href="#">Best rating</a>
                            </li>
                            <li>
                                <a href="#">Low price</a>
                            </li>
                            <li>
                                <a href="#">High price</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="product-title-area">
                <div class="product__title">
                    <h2>Newest Release Products</h2>
                </div>

                <div class="filter__menu">
                    <p>Filter by:</p>
                    <div class="filter__menu_icon">
                        <a href="#" id="drop1" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="svg" src="images/svg/menu.svg" alt="menu icon">
                        </a>

                        <ul class="filter_dropdown dropdown-menu" aria-labelledby="drop1">
                            <li>
                                <a href="#">Trending items</a>
                            </li>
                            <li>
                                <a href="#">Best seller</a>
                            </li>
                            <li>
                                <a href="#">Best rating</a>
                            </li>
                            <li>
                                <a href="#">Low price</a>
                            </li>
                            <li>
                                <a href="#">High price</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end /.col-md-12 -->
        <div class="col-md-12">
        </div>
        <!-- end /.col-md-12 -->
        <div class="col-lg-12">
            <div class="sorting">
                <ul>
                    <?php require_once "module/category.php"; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- end /.col-md-12 -->
</div>

<section class="products section--padding2">
    <!-- start container -->
    <div class="container">
        <!-- start .row -->
        <div class="row">
            <div class="col-lg-3">
                <?php require_once 'module/category_module.php'; ?>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <?php $home_pro_sql = "SELECT * FROM mem_products ORDER BY mem_pro_id DESC LIMIT 0,6";
                    $stmt_pro = $conn->prepare($home_pro_sql);
                    $stmt_pro->execute();
                    while ($row_home_pro = $stmt_pro->fetch(PDO::FETCH_ASSOC)) {
                        $id = $row_home_pro['mem_pro_id'];
                        $image = $row_home_pro['mem_pro_image'];
                        $name = $row_home_pro['mem_pro_name'];
                        $detail = $row_home_pro['mem_pro_detail'];
                        $price = $row_home_pro['price'];
                        $category = $row_home_pro['category_id'];
                        $tags = $row_home_pro['tag'];
                        $author = $row_home_pro['author'];

                    ?>
                        <div class="col-lg-4 col-md-6">
                            <!-- start .single-product -->
                            <div class="product product--card " style="border-radius:15px 15px 15px 15px;">
                                <div style="border-radius: 40px;" class="product__thumbnail">
                                    <!-- Image & video Show -->
                                    <?php
                                    $exp = explode(".", $image);
                                    $ext = end($exp);
                                    if ($ext == "jpg" or $ext == "png" or $ext == "jpeg" or $ext == 'gif') { ?>
                                        <img width="361px" height="240px" style="border-radius:15px 15px 15px 15px;" src="./admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>" alt="Product Image">

                                    <?php } else { ?>
                                        <div class="card">
                                            <video width="361px" height="240px" autoplay muted loop poster="placeholder.png" controls style="background-size:contain">
                                                <source src="./admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>">
                                            </video>
                                        </div>
                                    <?php } ?>
                                    <!-- END Image & video Show -->
                                    <div class="prod_btn">
                                        <a href="single-product.php?id=<?php echo $id; ?>" class="transparent btn--sm btn--round">More Info</a>
                                    </div>
                                    <!-- end /.prod_btn -->
                                </div>
                                <!-- end /.product__thumbnail -->

                                <div style="margin-bottom: -75px;" class="product-desc">
                                    <a href="single-product.php?id=<?php echo $id ?>" class="product_title">
                                        <h4><?php echo $name; ?></h4>
                                    </a>
                                    <ul class="titlebtm">
                                        <!-- Author Image and Info -->
                                        <?php
                                        $conn = config();
                                        $auth_sql = "SELECT * FROM members WHERE mem_user_name = :auth";
                                        $stmt_auth = $conn->prepare($auth_sql);
                                        $stmt_auth->execute([
                                            ':auth' => $author
                                        ]);
                                        while ($rows_auth = $stmt_auth->fetch(PDO::FETCH_ASSOC)) {
                                            $auth_id = $rows_auth['mem_id'];
                                            $auth_img = $rows_auth['mem_image'];
                                            $auth_user_name = $rows_auth['mem_user_name'];
                                        ?>
                                            <li>
                                                <img class="auth-img" src="admin/img/member_avatars/<?php echo $auth_user_name; ?>/<?php echo $auth_img; ?>" alt="<?php echo $auth_user_name; ?>">
                                                <p>
                                                    <a href="public_auth.php?auth=<?php echo $auth_id;  ?>"><?php echo $auth_user_name; ?></a>
                                                </p>
                                            </li>
                                        <?php } ?>
                                        <li class="product_cat">
                                            <a href="#">
                                                <span class="lnr lnr-book"></span><?php echo $tags; ?></a>
                                        </li>
                                    </ul>

                                    <p><?php echo substr($detail, 0, 40) . "..."; ?>.</p>
                                </div>
                                <?php
                                if (isset($_POST['btn_add_fav'])) {
                                    $fav_pro_id = $_POST['pro_id'];
                                    $fav_pro_author = $_POST['pro_author'];
                                    add_to_favourite($fav_pro_id, $fav_pro_author, $mem_id);
                                }
                                // } else {
                                //     header('location:login.php');
                                // }
                                ?>
                                <div class="product-purchase">
                                    <div class="price_love">
                                        <form action="index.php" method="POST">
                                            <input type="hidden" name="pro_id" value="<?php echo $id; ?>">
                                            <input type="hidden" name="pro_author" value="<?php echo $author; ?>">
                                            <p>
                                                <button type="submit" name="btn_add_fav" class="btn btn--round btn-sm btn-light"><span class="lnr lnr-heart"></span>
                                                </button>
                                        </form>
                                        </p>
                                    </div>
                                    <div class="sell">
                                        <p>

                                            <?php

                                            if (isset($_POST['btn_add_to_cart'])) {
                                                $pro_id = $_POST['cart_pro_id'];
                                                $pro_author = $_POST['cart_pro_author'];
                                                $who = $_POST['who_adding_to_cart'];
                                            }
                                            ?>
                                        <form method="POST">
                                            <input type="hidden" id="cart_pro_id" name="cart_pro_id" value="<?php echo $id; ?>">
                                            <input type="hidden" id="cart_pro_author" name="cart_pro_author" value="<?php echo $author; ?>">
                                            <input type="hidden" id="who_adding_to_cart" name="who_adding_to_cart" value="<?php echo $user_id; ?>">
                                            <!-- Count Total Added To Cart -->
                                            <?php
                                            if ($user == $author) { ?>
                                                <div class="btn btn--round btn--bordered btn-sm btn-success"><span>&#10004;</span></div>
                                            <?php } else { ?>
                                                <button id="btn_add_to_cart" name="btn_add_to_cart" class="btn btn--round btn--bordered btn-sm btn-success"><span class="lnr lnr-cart">$<?php echo $price; ?></span> </button>
                                            <?php }
                                            ?>
                                            <!-- Count Total Added To Cart -->
                                            </p>
                                    </div>
                                    <div id="response"></div>
                                </div>
                                </form>
                                <!-- end /.product-purchase -->
                            </div>
                            <!-- end /.single-product -->
                            <!-- New Style Started -->
                            <!-- ENDED Style Started -->
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end /.container -->

</section>

<section class="promotion-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 v_middle">
                <div class="promotion-img">
                    <img width="555px" height="420px" src="admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>" alt="Promotion image">
                </div>
            </div>

            <div class="col-lg-5 offset-lg-1 col-md-6 v_middle">
                <div class="promotion-content">
                    <h3 class="promotion__subtitle"><?php echo  $name; ?></h3>
                    <h1 class="promotion__title">Get Them All For Only $<?php echo $price; ?>!
                        <span>Save 35%</span>
                    </h1>
                    <p><?php echo $detail; ?>!</p>
                    <a href="single-product.php?id=<?php echo $id; ?>" class="btn btn--lg btn--round">View Details</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="why_choose section--padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h1>Why Choose
                        <span class="highlighted">MartPlace</span>
                    </h1>
                    <p>This Market Will Boost your Product In the Whole Afghanistan All Your Products can be seen in 34 Provence Of Afghanistan,If Someone Loved Your Product They Can Buy your Products And We Will Deliver your Product To Buyer.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="feature2">
                    <span class="feature2__count">01</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-license pcolor"></span>
                        <h3 class="feature2-title">One Time Payment</h3>
                        <p>You Can Pay Once For Every Product, That will Never Happen to Dublicate Payment We have Analyzer to Analyize Every Transsiction to Check.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="feature2">
                    <span class="feature2__count">02</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-magic-wand scolor"></span>
                        <h3 class="feature2-title">Quality Products</h3>
                        <p>We Have Maney Seller They Selling Their Products And They Rating Each Products And Puting Comment on it, That Find Best Products.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="feature2">
                    <span class="feature2__count">03</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-lock mcolor1"></span>
                        <h3 class="feature2-title">100% Secure Paymentt</h3>
                        <p>We Using HesabPay As Payment Method The Most Secure Method For Paying Money In The Afghanistan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // $(document).ready(function() {
    //     $('#btn_add_to_cart').click(function(e) {
    //         e.preventDefault();
    //         var cart_pro_id = $('#cart_pro_id').val();
    //         var cart_pro_author = $('#cart_pro_author').val();
    //         var who_adding_to_cart = $('#who_adding_to_cart').val();
    //         $.ajax({
    //                 url: 'phpscripts/add_to_cartAjax.php',
    //                 method: 'post',
    //                 data: {
    //                     cart_pro_id: cart_pro_id,
    //                     cart_pro_author: cart_pro_author,
    //                     who_adding_to_cart: who_adding_to_cart
    //                 }
    //             })
    //             .done(function(resp) {
    //                 $('#response').html(resp);
    //             })
    //     });
    // });
</script>
<!-- Footer -->

<?php require_once "footer.php"; ?>
<!-- END Footer -->