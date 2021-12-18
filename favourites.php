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
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <a href="#">Favorites</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Your Favourites</h1>
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
        START FILTER AREA
    =================================-->
<?php
// if (isset($_GET['already_exist'])) {
//     echo $dublicate_product_err_msg = "<div class='alert alert-danger'>This Item Is Already Exist! </div>";
// }
// elseif($_GET['items_add'])
?>
<div class="filter-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="filter-bar filter-bar3">
                    <div class="filter__option filter--text pull-left">
                        <p>
                            <?php
                            $conn = config();
                            if (isset($_SESSION['member_id']) || isset($_SESSION['member_user'])) {
                                $id = $_SESSION['member_id'];
                                $user_name = $_SESSION['member_user'];
                            } elseif (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
                                $id = base64_decode($_COOKIE['mem_id']);
                                $user_name = base64_decode($_COOKIE['mem_user_name']);
                            } else {
                                $id = -1;
                                $user_name = -1;
                            }
                            $fav_pro_tab = "SELECT * FROM favourite WHERE  mem_id = :mem_id";
                            $stmt_fav_tab = $conn->prepare($fav_pro_tab);
                            $stmt_fav_tab->execute([
                                ':mem_id' => $id
                            ]);
                            $count_fav = $stmt_fav_tab->rowCount();

                            ?>
                            <span><?php if (isset($count_fav)) {
                                        echo "<span class='text text-success'>$count_fav Items</span>";
                                    } ?></span>
                        </p>
                    </div>

                    <div class="pull-right">
                        <div class="filter__option filter--dropdown">
                            <a href="#" id="drop2" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Filter By
                                <span class="lnr lnr-chevron-down"></span>
                            </a>

                            <ul class="custom_dropdown dropdown-menu" aria-labelledby="drop2">
                                <li>
                                    <a href="#">Trending items</a>
                                </li>
                                <li>
                                    <a href="#">Popular items</a>
                                </li>
                                <li>
                                    <a href="#">New items </a>
                                </li>
                                <li>
                                    <a href="#">Best seller </a>
                                </li>
                                <li>
                                    <a href="#">Best rating </a>
                                </li>
                            </ul>
                        </div>
                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <select name="price">
                                    <option value="low">Price : Low to High</option>
                                    <option value="high">Price : High to low</option>
                                </select>
                                <span class="lnr lnr-chevron-down"></span>
                            </div>
                        </div>
                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <select name="price">
                                    <option value="12">12 Items per page</option>
                                    <option value="15">15 Items per page</option>
                                    <option value="25">25 Items per page</option>
                                </select>
                                <span class="lnr lnr-chevron-down"></span>
                            </div>
                        </div>
                        <div class="filter__option filter--layout">
                            <div class="svg-icon">
                                <img class="svg" src="images/svg/grid.svg" alt="it's just a layout control folks!">
                            </div>
                            <div class="svg-icon">
                                <img class="svg" src="images/svg/list.svg" alt="it's just a layout control folks!">
                            </div>
                        </div>
                    </div>
                    <!-- end /.pull-right -->
                </div>
                <!-- end filter-bar -->
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end filter-bar -->
    </div>
</div>
<!--================================
        END FILTER AREA
    =================================-->


<!--================================
        START PRODUCTS AREA
    =================================-->
<section class="products">
    <!-- start container -->
    <div class="container">

        <!-- start .row -->
        <div class="row">
            <!-- start .col-md-4 -->
            <!-- start .single-product -->
            <?php
            $conn = config();
            if (isset($_SESSION['member_id']) || isset($_SESSION['member_user'])) {
                $id = $_SESSION['member_id'];
                $user_name = $_SESSION['member_user'];
            } elseif (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
                $id = base64_decode($_COOKIE['mem_id']);
                $user_name = base64_decode($_COOKIE['mem_user_name']);
            } else {
                $id = -1;
                $user_name = -1;
            }
            $fav_pro_tab = "SELECT * FROM favourite WHERE  mem_id = :mem_id";
            $stmt_fav_tab = $conn->prepare($fav_pro_tab);
            $stmt_fav_tab->execute([
                ':mem_id' => $id
            ]);
            $count_fav = $stmt_fav_tab->rowCount();
            if ($count_fav == 0) { ?>
                <div class="alert alert-info"><strong>Sorry,</strong>You Did Not Added Your Favourite Products</div>
            <?php } ?>
            <?php
            while ($rows_tab = $stmt_fav_tab->fetch(PDO::FETCH_ASSOC)) {
                $mem_id = $rows_tab['mem_id'];
                $pro_author = $rows_tab['pro_author'];
                $pro_id = $rows_tab['pro_id'];
            ?>
                <?php


                $fav_pro_sql = "SELECT * FROM mem_products WHERE author = :author AND mem_pro_id = :pro_id";
                $stmt_fav = $conn->prepare($fav_pro_sql);
                $stmt_fav->execute([
                    ':author' => $pro_author,
                    ':pro_id' => $pro_id
                ]);

                while ($rows_fav_fetched = $stmt_fav->fetch(PDO::FETCH_ASSOC)) {
                    $id = $rows_fav_fetched['mem_pro_id'];
                    $image = $rows_fav_fetched['mem_pro_image'];
                    $name = $rows_fav_fetched['mem_pro_name'];
                    $detail = $rows_fav_fetched['mem_pro_detail'];
                    $price = $rows_fav_fetched['price'];
                    $category = $rows_fav_fetched['category_id'];
                    $tags = $rows_fav_fetched['tag'];
                    $author = $rows_fav_fetched['author'];

                ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="product product--card product--card-small">

                            <div class="product__thumbnail">
                                <!-- product Image size in this page = 361px X 230px -->
                                <img width="361px" height="230px" style="background-position: center;background-size:cover;" src="admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>" alt="<?php echo $name; ?>">
                                <div class="prod_btn">
                                    <a href="single-product.php?id=<?php echo $id; ?>" class="transparent btn--sm btn--round">More Info</a>
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
                                        <img class="auth-img" src="admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>" alt="author image">
                                        <p>
                                            <a href="#"><?php echo $author; ?></a>
                                        </p>
                                    </li>
                                    <li class="product_cat">
                                        <a href="#">
                                            <span class="lnr lnr-book"></span><?php echo $category; ?></a>
                                    </li>
                                </ul>

                                <p><?php echo substr($detail, 0, 75); ?>.</p>
                            </div>
                            <!-- end /.product-desc -->

                            <div class="product-purchase">
                                <div class="price_love">
                                    <span>$<?php echo $price; ?></span>
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
                    </div>
                <?php } ?>
            <?php } ?>
            <!-- end /.single-product -->
            <!-- end /.col-md-4 -->
        </div>
        <!-- end /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="pagination-area">
                    <nav class="navigation pagination" role="navigation">
                        <div class="nav-links">
                            <a class="prev page-numbers" href="http://localhost/wordpress1/page/3/">
                                <span class="lnr lnr-arrow-left"></span>
                            </a>
                            <a class="page-numbers current" href="http://localhost/wordpress1/">1</a>
                            <a class="page-numbers" href="http://localhost/wordpress1/page/2/">2</a>
                            <a class="page-numbers" href="http://localhost/wordpress1/page/3/">3</a>
                            <a class="next page-numbers" href="http://localhost/wordpress1/page/3/">
                                <span class="lnr lnr-arrow-right"></span>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<!--================================
        END PRODUCTS AREA
    =================================-->


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
<!--================================
        END CALL TO ACTION AREA
    =================================-->
<?php require_once "footer.php"; ?>