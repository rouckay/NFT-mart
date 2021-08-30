<?php $curr_page = basename(__FILE__); ?>
<!-- Header -->
<?php require_once "header.php"; ?>
<!-- END Header -->
<!--================================
        START BREADCRUMB AREA
    =================================-->
<section class="breadcrumb">
    <video width="100%" height="100%" autoplay muted loop>
        <source src="video.mp4">
    </video>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <a href="#">Products</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Products</h1>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<!--================================
        END BREADCRUMB AREA
    =================================-->

<!--================================
            START SIGNUP AREA
    =================================-->
<section class="section--padding2 bgcolor">
    <div class="shortcode_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shortcode_module_title">
                        <div class="dashboard__title">
                            <h3>Latest Products</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- start .col-md-4 -->
                <?php
                $conn = config();
                $home_pro_sql = "SELECT * FROM products ORDER BY pro_id ASC LIMIT 0,6";
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
                <div class="col-lg-4 col-md-6">
                    <!-- start .single-product -->
                    <div class="product product--card">

                        <div class="product__thumbnail">
                            <!-- Image & video Show -->
                            <?php
                                $exp = explode(".", $image);
                                $ext = end($exp);
                                if ($ext == "jpg" or $ext == "png" or $ext == "jpeg") { ?>
                            <!-- height="230px" -->
                            <img height="350px" width="361px"
                                src="./admin/img/product/<?php echo $name; ?>/<?php echo $image; ?>"
                                alt="Product Image">

                            <?php } else { ?>
                            <video width="100%" height="30%" autoplay muted loop>
                                <source src="./admin/img/product/<?php echo $name; ?>/<?php echo $image; ?>">
                            </video>
                            <?php } ?>
                            <!-- END Image & video Show -->
                            <div class="prod_btn">
                                <a href="single-product.html" class="transparent btn--sm btn--round">More Info</a>
                                <a href="single-product.html" class="transparent btn--sm btn--round">Live Demo</a>
                            </div>
                            <!-- end /.prod_btn -->
                        </div>
                        <!-- end /.product__thumbnail -->

                        <div class="product-desc">
                            <a href="single-product.html" class="product_title">
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
                                        <span class="lnr lnr-book"></span><?php echo $category; ?></a>
                                </li>
                            </ul>

                            <p><?php echo $detail; ?>.</p>
                        </div>
                        <!-- end /.product-desc -->

                        <div class="product-purchase">
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
                        </div>
                        <!-- end /.product-purchase -->
                    </div>
                    <!-- end /.single-product -->
                </div>
                <?php } ?>
                <!-- end /.col-md-4 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end /.container -->
    </div>






    <div class="shortcode_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shortcode_module_title">
                        <div class="dashboard__title">
                            <h3>Top Rated Products</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $conn = config();
                $home_pro_sql = "SELECT * FROM products ORDER BY pro_id DESC LIMIT 0,6";
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
                <div class="col-lg-4 col-md-7">
                    <!-- start .single-product -->
                    <div class="product product--card product--card-small">

                        <div class="product__thumbnail">
                            <!-- Image & video Show -->
                            <?php
                                $exp = explode(".", $image);
                                $ext = end($exp);
                                if ($ext == "jpg" or $ext == "png" or $ext == "jpeg") { ?>
                            <img height="350px" width="361px"
                                src="./admin/img/product/<?php echo $name; ?>/<?php echo $image; ?>"
                                alt="Product Image">

                            <?php } else { ?>
                            <video width="100%" height="100%" autoplay muted loop>
                                <source src="./admin/img/product/<?php echo $name; ?>/<?php echo $image; ?>">
                            </video>
                            <?php } ?>
                            <!-- END Image & video Show -->

                            <div class="prod_btn">
                                <a href="single-product.html" class="transparent btn--sm btn--round">More Info</a>
                                <a href="single-product.html" class="transparent btn--sm btn--round">Live Demo</a>
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
                                    <img class="auth-img" src="images/auth3.jpg" alt="author image">
                                    <p>
                                        <a href="#"><?php echo $author; ?></a>
                                    </p>
                                </li>
                                <li class="out_of_class_name">
                                    <div class="sell">
                                        <p>
                                            <span class="lnr lnr-cart"></span>
                                            <span>27</span>
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
                                                <span class="fa fa-star-half-o"></span>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>

                        </div>
                        <!-- end /.product-desc -->

                        <div class="product-purchase">
                            <div class="price_love">
                                <span>$<?php echo $price; ?></span>
                            </div>
                            <a href="#">
                                <span class="lnr lnr-book"></span><?php echo $category; ?></a>
                        </div>
                        <!-- end /.product-purchase -->
                    </div>
                    <!-- end /.single-product -->
                </div>
                <?php } ?>
                <!-- end /.col-md-4 -->



            </div>
        </div>
    </div>
</section>
<!--================================
            END SIGNUP AREA
    =================================-->
<?php require_once "footer.php"; ?>