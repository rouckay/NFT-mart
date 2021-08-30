<?php $curr_page = basename(__FILE__); ?>
<?php require_once "header.php"; ?>
<!--================================
        START SEARCH AREA
    =================================-->
<section class="search-wrapper">
    <div class="search-area2 bgimage">
        <div class="bg_image_holder">
            <img src="img/NFT.jpg" alt="">
        </div>
        <div class="container content_above">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="search">
                        <div class="search__title">
                            <?php
                            if (isset($_GET['cat_id'])) {
                                $cat_id = $_GET['cat_id'];
                                $conn = config();
                                $category_pro_sql = "SELECT * FROM category WHERE status = :status AND cat_id = :id";
                                $stmt_cat_title = $conn->prepare($category_pro_sql);
                                $stmt_cat_title->execute([
                                    ':id' => $cat_id,
                                    ':status' => "publish"
                                ]);
                                $fetch_data = $stmt_cat_title->fetch(PDO::FETCH_ASSOC);
                                $rows_found = $stmt_cat_title->rowCount();
                                if ($rows_found <= 0) {
                                    $error_not_found = "Sorry there is no product in this Product";
                                } else {
                                    //
                                }

                            ?>
                            <h3>
                                <span>Total Products ( <?php echo $rows_found; ?> ) In </span>
                                <?php echo $fetch_data['cat_name']; ?>
                            </h3>
                        </div>
                        <div class="search__field">
                            <form action="#">
                                <div class="field-wrapper">
                                    <input class="relative-field rounded" type="text"
                                        placeholder="Search your products">
                                    <button class="btn btn--round" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                        <?php } else {
                                header('location:category.php');
                            } ?>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">All Products</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!-- end /.search-area2 -->
</section>
<!--================================
        END SEARCH AREA
    =================================-->

<!--================================
        START FILTER AREA
    =================================-->
<div class="filter-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="filter-bar filter--bar2">
                    <div class="pull-right">
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
                            <a href="category-grid.html">
                                <div class="svg-icon">
                                    <img class="svg" src="images/svg/grid.svg" alt="it's just a layout control folks!">
                                </div>
                            </a>
                            <a href="category-list.html">
                                <div class="svg-icon">
                                    <img class="svg" src="images/svg/list.svg" alt="it's just a layout control folks!">
                                </div>
                            </a>
                        </div>
                    </div>
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
<section class="products section--padding2">
    <!-- start container -->
    <div class="container">
        <!-- start .row -->
        <div class="row">
            <!-- start .col-md-3 -->
            <div class="col-lg-3">
                <!-- start aside -->
                <aside class="sidebar product--sidebar">
                    <div class="sidebar-card card--category">
                        <a class="card-title" href="#collapse1" role="button" data-toggle="collapse"
                            aria-expanded="false" aria-controls="collapse1">
                            <h4>Categories
                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>
                        <div class="collapse show collapsible-content" id="collapse1">
                            <ul class="card-content">
                                <?php include_once('module/category.php'); ?>
                            </ul>
                        </div>
                        <!-- end /.collapsible_content -->
                    </div>

                    <div class="sidebar-card card--slider">
                        <a class="card-title" href="#collapse3" role="button" data-toggle="collapse"
                            aria-expanded="false" aria-controls="collapse3">
                            <h4>Filter Products
                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>
                        <div class="collapse show collapsible-content" id="collapse3">
                            <div class="card-content">
                                <div class="range-slider price-range"></div>

                                <div class="price-ranges">
                                    <span class="from rounded">$30</span>
                                    <span class="to rounded">$300</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.sidebar-card -->
                </aside>
                <!-- end aside -->
            </div>
            <!-- end /.col-md-3 -->

            <!-- start col-md-9 -->
            <div class="col-lg-9">
                <div class="row">



                    <?php
                    $cat_id = $_GET['cat_id'];
                    $conn = config();
                    $category_pro_sql = "SELECT * FROM products WHERE pro_category_id = :id";
                    $stmt = $conn->prepare($category_pro_sql);
                    $stmt->execute([
                        ':id' => $cat_id
                    ]);
                    while ($rows_data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $id = $rows_data['pro_id'];
                        $name = $rows_data['pro_name'];
                        $image = $rows_data['pro_image'];
                        $total_pro = $rows_data['pro_detail'];

                    ?>
                    <div class="col-lg-4 col-md-6">
                        <?php if (isset($error_not_found)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <span class="alert_icon lnr lnr-warning"></span>
                            <strong>Oh No!</strong> <?php echo $error_not_found; ?>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="lnr lnr-cross" aria-hidden="true"></span>
                            </button>
                        </div>
                        <?php } ?>
                        <!-- start .single-product -->
                        <div class="product product--card product--card-small">
                            <div class="product__thumbnail">
                                <!-- Image & video Show -->
                                <?php
                                    $exp = explode(".", $image);
                                    $ext = end($exp);
                                    if ($ext == "jpg" or $ext == "png" or $ext == "jpeg") { ?>
                                <img height="230px" width="361px"
                                    src="./admin/img/product/<?php echo $name; ?>/<?php echo $image; ?>"
                                    alt="Product Image">

                                <?php } else { ?>
                                <video width="100%" height="100%" autoplay muted loop>
                                    <source src="./admin/img/product/<?php echo $name; ?>/<?php echo $image; ?>">
                                </video>
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
                                <a href="#" class="product_title">
                                    <h4><?php echo $name; ?></h4>
                                </a>
                                <ul class="titlebtm">

                                    <li class="out_of_class_name">
                                        <div class="sell">
                                            <p>
                                                <span class="lnr lnr-cart"></span>
                                                <span>27</span>
                                            </p>
                                        </div>
                                        <div class="rating product--rating">
                                            <ul>
                                                <!-- rate -->
                                            </ul>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                            <!-- end /.product-desc -->
                        </div>
                        <!-- end /.single-product -->
                    </div>
                    <?php } ?>
                    <!-- end /.col-md-4 -->
                </div>
            </div>
            <!-- end /.col-md-9 -->
        </div>
        <!-- end /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="pagination-area categorised_item_pagination">
                    <nav class="navigation pagination" role="navigation">
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
            </div>
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->

</section>
<!--================================
        END PRODUCTS AREA
    =================================-->
<?php require_once "footer.php";  ?>