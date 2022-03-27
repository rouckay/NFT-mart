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
        </div>
    </div>
</section>

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
            <div class="shortcode_wrapper">
                <div class="row">
                    <?php latestProducts(4); ?>
                </div>
            </div>
            <!-- end /.container -->
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
                    <!-- ---------------------------Products Grade -->
                    <?php productsGrade(6); ?>
                    <!-- ---------------------------END Products Grade -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end /.container -->

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
    // $(document).ready(function() {
    //     $('#btn_add_fav').submit(function(e){
    //         e.preventDefault();
    //         console.log(e.target.parentElement);
    //     });
    // });
</script>
<!-- Footer -->

<?php require_once "footer.php"; ?>
<!-- END Footer -->