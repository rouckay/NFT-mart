<?php $curr_page = basename(__FILE__); ?>
<!-- Header -->
<?php require_once "header.php"; ?>
<?php $conn = config(); ?>
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
<!-- user ID AND name -->
<?php require_once "module/cookie_session.php"; ?>
<!-- END user ID AND name -->
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
                            <img width="361px" height="240px"
                                src="./admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>"
                                alt="Product Image">

                            <?php } else { ?>
                            <div class="card">
                                <video width="361px" height="240px" autoplay muted loop poster="placeholder.png"
                                    controls style="background-size:contain">
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
                        <div class="product-purchase">
                            <div class="price_love">
                                <form action="admin/include/user_functions.php" method="POST">
                                    <input type="hidden" name="pro_id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="pro_author" value="<?php echo $author; ?>">
                                    <span>$<?php echo $price; ?></span>
                                    <p>
                                        <button type="submit" name="btn_add_fav"
                                            class="btn btn-danger btn-sm btn--round"><span class="lnr lnr-heart"></span>
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
                                            // add_to_cart_func($pro_id,$pro_author,$who);
                                        }
                                        ?>
                                <form action="index.php" method="POST">
                                    <input type="hidden" name="cart_pro_id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="cart_pro_author" value="<?php echo $author; ?>">
                                    <input type="hidden" name="who_adding_to_cart" value="<?php echo $user_id; ?>">
                                    <!-- Count Total Added To Cart -->
                                    <?php
                                        $count_total_added = total_added_to_cart_count($id); ?>
                                    <button type="submit" class="btn btn--round btn-sm" name="btn_add_to_cart"><span
                                            class="lnr lnr-cart"></span>
                                        <?php echo $count_total_added >= 1 ? "$count_total_added" : ""; ?> </button>
                                    <!-- Count Total Added To Cart -->
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