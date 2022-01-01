<?php $curr_page = basename(__FILE__); ?>
<?php require_once "header.php"; ?>
<!--================================
        START SEARCH AREA
    =================================-->
<section class="search-wrapper">
    <div class="search-area2 ">
        <div class="bg_image_holder">
            <img src="img/abstract.jpg" id="imgBack">
        </div>
        <div class="container content_above">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="search">
                        <div class="search__title">
                            <h3>
                                <span>35,270</span> Total Founded Products
                            </h3>
                        </div>
                        <div class="search__field">
                            <form action="#">
                                <div class="field-wrapper">
                                    <input class="relative-field rounded" type="text" placeholder="Search your products">
                                    <button class="btn btn--round" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="breadcrumb">
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li class="active">
                                    <a href="#">All Category</a>
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
                            <a href="category.php">
                                <div class="svg-icon">
                                    <img class="svg" src="images/svg/grid.svg" alt="it's just a layout control folks!">
                                </div>
                            </a>
                            <a href="category-list.php">
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
                <?php require_once 'module/category_module.php'; ?>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <?php
                    $conn = config();
                    $count_sql = "SELECT * FROM category WHERE status = :status ";
                    $stmt_count = $conn->prepare($count_sql);
                    $stmt_count->execute([
                        ':status' => 'publish'
                    ]);
                    $total_cats = $stmt_count->rowCount();
                    $category_per_page = 6;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        if ($page == 1) {
                            $page_id = 0;
                        } else {
                            $page_id = ($page * $category_per_page) - $category_per_page;
                        }
                    } else {
                        $page = 1;
                        $page_id = 0;
                    }
                    $total_pages = ceil($total_cats / $category_per_page);
                    $count_sql = "SELECT * FROM category WHERE status = :status ORDER BY cat_id LIMIT $page_id,$category_per_page";
                    $stmt = $conn->prepare($count_sql);
                    $stmt->execute([
                        ':status' => 'publish'
                    ]);
                    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $id = $rows['cat_id'];
                        $name = $rows['cat_name'];
                        $image = $rows['cat_image'];
                        $total_pro = $rows['cat_total_pro'];
                        $at = $rows['created_at'];
                        $by = $rows['created_by'];
                    ?>
                        <div class="col-lg-4 col-md-6">
                            <!-- start .single-product -->
                            <div class="product product--card product--card-small">

                                <div class="product__thumbnail">
                                    <img width="361px" height="230px" src="admin/img/cat_image/<?php echo $name;  ?>/<?php echo $image; ?>" alt="Product Image">
                                    <div class="prod_btn">
                                        <a href="category_products.php?cat_id = <?php echo $id ?>" class="transparent btn--sm btn--round">More Info</a>
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
                                                <a href="#"><?php echo $by; ?></a>
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
        <?php if ($total_cats > $category_per_page) { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="pagination-area categorised_item_pagination">
                        <nav class="navigation pagination" role="navigation">
                            <div class="nav-links">

                                <a class="prev page-numbers" href="#">
                                    <span class="lnr lnr-arrow-left"></span>
                                </a>

                                <?php
                                for ($i = 1; $i <= $total_pages; $i++) {
                                ?>
                                    <?php if ($i == $page) { ?>
                                        <a class="page-numbers current" href="category.php?page=<?php echo $id; ?>"><?php echo $i; ?></a>
                                    <?php } else { ?>
                                        <a class="page-numbers" href="category.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                                <?php }
                                } ?>
                                <a class="next page-numbers" href="#">
                                    <span class="lnr lnr-arrow-right"></span>
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->

</section>
<!--================================
        END PRODUCTS AREA
    =================================-->
<?php require_once "footer.php";  ?>