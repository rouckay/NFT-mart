<?php $curr_page = basename(__FILE__); ?>
<!-- Header -->
<?php require_once 'header.php'; ?>
<!-- END Header -->
<!--================================
    START HERO AREA
=================================-->
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
        <img width="1920px" height="745px"
            src="admin/img/home_bg_image/<?php echo $name_image; ?>/<?php echo $background_image; ?>"
            alt="background-image">
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
                                <span class="light">Create Your Own</span>
                                <span class="bold">Digital Product Marketplace</span>
                            </h1>
                            <p class="tagline">MartPlace is the most powerful, & customizable template for Easy
                                Digital Downloads Products</p>
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
                    <p>Laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats.
                        Lid
                        est laborum dolo rumes fugats untras.</p>
                </div>
            </div>
            <!-- end /.col-md-12 -->
        </div>

        <div class="row">
            <?php
            $conn =  config();
            $home_pro_sql = "SELECT * FROM products ORDER BY pro_id ASC LIMIT 0,1";
            $stmt_pro = $conn->prepare($home_pro_sql);
            $stmt_pro->execute();
            while ($row_home_pro = $stmt_pro->fetch(PDO::FETCH_ASSOC)) {
                $id = $row_home_pro['pro_id'];
                $image = $row_home_pro['pro_image'];
                $name = $row_home_pro['pro_name'];
                $detail = $row_home_pro['pro_detail'];
                $price = $row_home_pro['pro_price'];
                $category = $row_home_pro['pro_category_id'];
                $tags = $row_home_pro['pro_tag'];
                $author = $row_home_pro['pro_author'];

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
                            <img height="450px" width="555px"
                                src="./admin/img/product/<?php echo $name; ?>/<?php echo $image; ?>"
                                alt="Product Image">

                            <?php } else { ?>
                            <video width="100%" height="30%" autoplay muted loop>
                                <source src="./admin/img/product/<?php echo $name; ?>/<?php echo $image; ?>">
                            </video>
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
            <?php } ?>
        </div>
        <!-- end /.featured__preview-img -->
    </div>
    <!-- end /.featured-product-slider -->
</section>
<!--================================
    START PRODUCTS AREA
=================================-->
<section class="products section--padding">
    <!-- start container -->
    <div class="container">
        <!-- start row -->
        <div class="row">
            <!-- start col-md-12 -->
            <div class="col-md-12">
                <div class="product-title-area">
                    <div class="product__title">
                        <h2>Newest Release Products</h2>
                    </div>

                    <div class="filter__menu">
                        <p>Filter by:</p>
                        <div class="filter__menu_icon">
                            <a href="#" id="drop1" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
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
        </div>
        <!-- end /.row -->

        <!-- start row -->
        <div class="row">
            <!-- start .col-md-12 -->
            <div class="col-md-12">
                <div class="sorting">
                    <ul>
                        <?php require_once "module/category.php"; ?>
                    </ul>
                </div>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->

        <!-- start .row -->
        <div class="row">
            <?php $home_pro_sql = "SELECT * FROM mem_products ORDER BY mem_pro_id DESC LIMIT 0,20";
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
            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <!-- start .single-product -->
                <div class="product product--card">

                    <div class="product__thumbnail">
                        <!-- Image & video Show -->
                        <?php
                            $exp = explode(".", $image);
                            $ext = end($exp);
                            if ($ext == "jpg" or $ext == "png" or $ext == "jpeg" or $ext == 'gif') { ?>
                        <img height="350px" width="361px"
                            src="./admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>"
                            alt="Product Image">

                        <?php } else { ?>
                        <div class="card">
                            <video max-width="100%" autoplay muted loop>
                                <source src="./admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>">
                            </video>
                        </div>
                        <?php } ?>
                        <!-- END Image & video Show -->
                        <div class="prod_btn">
                            <a href="single-product.php?id=<?php echo $id; ?>"
                                class="transparent btn--sm btn--round">More Info</a>
                            <a href="single-product.php?id=<?php echo $id; ?>"
                                class="transparent btn--sm btn--round">Live Demo</a>
                        </div>
                        <!-- end /.prod_btn -->
                    </div>
                    <!-- end /.product__thumbnail -->

                    <div class="product-desc">
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
                                <img class="auth-img"
                                    src="admin/img/member_avatars/<?php echo $auth_user_name; ?>/<?php echo $auth_img; ?>"
                                    alt="<?php echo $auth_user_name; ?>">
                                <p>
                                    <a
                                        href="public_auth.php?auth=<?php echo $auth_id;  ?>"><?php echo $auth_user_name; ?></a>
                                </p>
                            </li>
                            <?php } ?>
                            <li class="product_cat">
                                <a href="#">
                                    <span class="lnr lnr-book"></span><?php echo $tags; ?></a>
                            </li>
                        </ul>

                        <p><?php echo substr($detail, 0, 10) . "..."; ?>.</p>
                    </div>
                    <!-- end /.product-desc -->
                    <?php
                        // if (isset($_SESSION['member_id']) || isset($_SESSION['member_user']) || isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_user'])) {
                        // check_mem();
                        if (isset($_POST['btn_add_fav'])) {
                            $fav_data = $_POST['pro_id_fav'];
                        }
                        // } else {
                        //     header('location:login.php');
                        // }
                        ?>
                    <form action="admin/include/user_functions.php" method="POST">
                        <input type="hidden" name="pro_id" value="<?php echo $id; ?>">
                        <div class="product-purchase">
                            <div class="price_love">
                                <span>$<?php echo $price; ?></span>
                                <p>
                                    <button type="submit" name="btn_add_fav"
                                        class="btn btn-danger btn-sm rounded-circle"><span class="lnr lnr-heart"></span>
                                    </button>
                                </p>
                            </div>
                            <div class="sell">
                                <p>
                                    <span class="lnr lnr-cart"></span>
                                    <span>16</span>
                                </p>
                            </div>
                        </div>
                    </form>
                    <!-- end /.product-purchase -->
                </div>
                <!-- end /.single-product -->
            </div>
            <?php } ?>
            <!-- end /.col-md-4 -->
        </div>
        <!-- start .row -->
        <div class="row">
            <?php $home_pro_sql = "SELECT * FROM products LIMIT 0,6";
            $stmt_pro = $conn->prepare($home_pro_sql);
            $stmt_pro->execute();
            while ($row_home_pro = $stmt_pro->fetch(PDO::FETCH_ASSOC)) {
                $id = $row_home_pro['pro_id'];
                $image = $row_home_pro['pro_image'];
                $name = $row_home_pro['pro_name'];
                $detail = $row_home_pro['pro_detail'];
                $price = $row_home_pro['pro_price'];
                $category = $row_home_pro['pro_category_id'];
                $tags = $row_home_pro['pro_tag'];
                $author = $row_home_pro['pro_author'];

            ?>
            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <!-- start .single-product -->
                <div class="product product--card">

                    <div class="product__thumbnail">
                        <!-- Image & video Show -->
                        <?php
                            $exp = explode(".", $image);
                            $ext = end($exp);
                            if ($ext == "jpg" or $ext == "png" or $ext == "jpeg") { ?>
                        <img height="350px" width="361px"
                            src="./admin/img/product/<?php echo $name; ?>/<?php echo $image; ?>" alt="Product Image">

                        <?php } else { ?>
                        <div class="card">
                            <video max-width="100%" autoplay muted loop>
                                <source src="./admin/img/product/<?php echo $name; ?>/<?php echo $image; ?>">
                            </video>
                        </div>
                        <?php } ?>
                        <!-- END Image & video Show -->
                        <div class="prod_btn">
                            <a href="single-product.php?id=<?php echo $id; ?>"
                                class="transparent btn--sm btn--round">More Info</a>
                            <a href="single-product.php?id=<?php echo $id; ?>"
                                class="transparent btn--sm btn--round">Live Demo</a>
                        </div>
                        <!-- end /.prod_btn -->
                    </div>
                    <!-- end /.product__thumbnail -->

                    <div class="product-desc">
                        <a href="single-product.php?id=<?php echo $id ?>" class="product_title">
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
                                <a href="#">
                                    <span class="lnr lnr-book"></span><?php echo $tags; ?></a>
                            </li>
                        </ul>

                        <p><?php echo substr($detail, 0, 10) . "..."; ?>.</p>
                    </div>
                    <!-- end /.product-desc -->
                    <?php
                        if (isset($_POST['btn_add_fav'])) {
                            $fav_data = $_POST['pro_id_fav'];
                        }
                        ?>
                    <form action="admin/include/user_functions.php" method="POST">
                        <input type="text" name="pro_id_fav" value="<?php echo $id; ?>">
                        <div class="product-purchase">
                            <div class="price_love">
                                <span>$<?php echo $price; ?></span>
                                <p>
                                    <button type="submit" name="btn_add_fav" class="btn btn-danger"><span
                                            class="lnr lnr-heart">Add</span> </button>
                                </p>
                            </div>
                            <div class="sell">
                                <p>
                                    <span class="lnr lnr-cart"></span>
                                    <span>16</span>
                                </p>
                            </div>
                        </div>
                    </form>
                    <!-- end /.product-purchase -->
                </div>
                <!-- end /.single-product -->
            </div>
            <?php } ?>
            <!-- end /.col-md-4 -->
        </div>
        <!-- end /.row -->

        <!-- start .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="more-product">
                    <a href="products.php" class="btn btn--lg btn--round">All New Products</a>
                </div>
            </div>
            <!-- end ./col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<!--================================
    END PRODUCTS AREA
=================================-->


<!--================================
    START COUNTER UP AREA
=================================-->
<section class="counter-up-area bgimage">
    <div class="bg_image_holder">
        <img width="1920px" height="350px" src="img/abstract.jpg" alt="">
    </div>
    <!-- start .container -->
    <div class="container content_above">
        <!-- start .col-md-12 -->
        <div class="col-md-12">
            <div class="counter-up">
                <div class="counter mcolor2">
                    <span class="lnr lnr-briefcase"></span>
                    <span class="count">38,436</span>
                    <p>items for sale</p>
                </div>
                <div class="counter mcolor3">
                    <span class="lnr lnr-cloud-download"></span>
                    <span class="count">38,436</span>
                    <p>total Sales</p>
                </div>
                <div class="counter mcolor1">
                    <span class="lnr lnr-smile"></span>
                    <span class="count">38,436</span>
                    <p>appy customers</p>
                </div>
                <div class="counter mcolor4">
                    <span class="lnr lnr-users"></span>
                    <span class="count">38,436</span>
                    <p>members</p>
                </div>
            </div>
        </div>
        <!-- end /.col-md-12 -->
    </div>
    <!-- end /.container -->
</section>
<!--================================
    END COUNTER UP AREA
=================================-->


<section class="why_choose section--padding">
    <!-- start container -->
    <div class="container">
        <!-- start row -->
        <div class="row">
            <!-- start col-md-12 -->
            <div class="col-md-12">
                <div class="section-title">
                    <h1>Why Choose
                        <span class="highlighted">MartPlace</span>
                    </h1>
                    <p>Laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis
                        fugats. Lid
                        est laborum dolo rumes fugats untras.</p>
                </div>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->

        <!-- start row -->
        <div class="row">
            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <!-- start .reason -->
                <div class="feature2">
                    <span class="feature2__count">01</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-license pcolor"></span>
                        <h3 class="feature2-title">One Time Payment</h3>
                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                            mattis,
                            leo quam aliquet diam congue is laoreet elit metus.</p>
                    </div>
                    <!-- end /.feature2__content -->
                </div>
                <!-- end /.feature2 -->
            </div>
            <!-- end /.col-md-4 -->

            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <!-- start .feature2 -->
                <div class="feature2">
                    <span class="feature2__count">02</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-magic-wand scolor"></span>
                        <h3 class="feature2-title">Quality Products</h3>
                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                            mattis,
                            leo quam aliquet diam congue is laoreet elit metus.</p>
                    </div>
                    <!-- end /.feature2__content -->
                </div>
                <!-- end /.feature2 -->
            </div>
            <!-- end /.col-md-4 -->

            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <!-- start .feature2 -->
                <div class="feature2">
                    <span class="feature2__count">03</span>
                    <div class="feature2__content">
                        <span class="lnr lnr-lock mcolor1"></span>
                        <h3 class="feature2-title">100% Secure Paymentt</h3>
                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                            mattis,
                            leo quam aliquet diam congue is laoreet elit metus.</p>
                    </div>
                    <!-- end /.feature2__content -->
                </div>
                <!-- end /.feature2 -->
            </div>
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<!--================================
    END COUNTER UP AREA
=================================-->

<!--================================
    START SELL BUY
=================================-->
<section class="proposal-area">

    <!-- start container-fluid -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 no-padding">
                <div class="proposal proposal--left bgimage">
                    <div class="bg_image_holder">
                        <img src="images/bbg.png" alt="prop image">
                    </div>
                    <div class="content_above">
                        <div class="proposal__icon ">
                            <img src="images/buy.png" alt="Buy icon">
                        </div>
                        <div class="proposal__content ">
                            <h1 class="text--white">Sell Your Products</h1>
                            <p class="text--white">Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                justo ut scelerisque the mattis,
                                leo quam aliquet diamcongue is laoreet elit metus.</p>
                        </div>
                        <a href="#" class="btn--round btn btn--lg btn--white">Become an Author</a>
                    </div>
                </div>
                <!-- end /.proposal -->
            </div>

            <div class="col-md-6 no-padding">
                <div class="proposal proposal--right">
                    <div class="bg_image_holder">
                        <img src="images/sbg.png" alt="this is magic">
                    </div>
                    <div class="content_above">
                        <div class="proposal__icon">
                            <img src="images/sell.png" alt="Sell icon">
                        </div>
                        <div class="proposal__content ">
                            <h1 class="text--white">Start Shopping Today</h1>
                            <p class="text--white">Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                justo ut scelerisque the mattis,
                                leo quam aliquet diamcongue is laoreet elit metus.</p>
                        </div>
                        <a href="#" class="btn--round btn btn--lg btn--white">Start Shopping</a>
                    </div>
                </div>
                <!-- end /.proposal -->
            </div>
        </div>
    </div>
    <!-- start container-fluid -->
</section>
<!--================================
    END SELL BUY
=================================-->


<!-- Footer -->
<?php require_once "footer.php"; ?>
<!-- END Footer -->