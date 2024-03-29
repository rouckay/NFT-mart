<?php $curr_page = basename(__FILE__); ?>
<?php require_once "header.php"; ?>
<!--================================
        START SEARCH AREA
    =================================-->
<section class="search-wrapper">
    <div class="search-area2 bgimage">
        <div class="bg_image_holder">
            <img src="images/search.jpg" alt="">
        </div>
        <div class="container content_above">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="search">
                        <div class="search__title">
                            <h3>
                                <span>35,270</span> website templates from our creative community
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
                    <div class="filter__option filter--text pull-left">
                        <a href="#">New Products</a>
                        <a href="#">Popular Products</a>
                    </div>
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
                                <?php require_once "module/category.php"; ?>
                            </ul>
                        </div>
                        <!-- end /.collapsible_content -->
                    </div>
                    <!-- end /.sidebar-card -->

                    <div class="sidebar-card card--filter">
                        <a class="card-title" href="#collapse2" role="button" data-toggle="collapse"
                            aria-expanded="false" aria-controls="collapse2">
                            <h4>Filter Products
                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>
                        <div class="collapse show collapsible-content" id="collapse2">
                            <ul class="card-content">
                                <li>
                                    <div class="custom-checkbox2">
                                        <input type="checkbox" id="opt1" class="" name="filter_opt">
                                        <label for="opt1">
                                            <span class="circle"></span>Trending Products</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-checkbox2">
                                        <input type="checkbox" id="opt2" class="" name="filter_opt">
                                        <label for="opt2">
                                            <span class="circle"></span>Popular Products</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-checkbox2">
                                        <input type="checkbox" id="opt3" class="" name="filter_opt">
                                        <label for="opt3">
                                            <span class="circle"></span>New Products</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-checkbox2">
                                        <input type="checkbox" id="opt4" class="" name="filter_opt">
                                        <label for="opt4">
                                            <span class="circle"></span>Best Seller</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-checkbox2">
                                        <input type="checkbox" id="opt5" class="" name="filter_opt">
                                        <label for="opt5">
                                            <span class="circle"></span>Best Rating</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-checkbox2">
                                        <input type="checkbox" id="opt6" class="" name="filter_opt">
                                        <label for="opt6">
                                            <span class="circle"></span>Free Support</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-checkbox2">
                                        <input type="checkbox" id="opt7" class="" name="filter_opt">
                                        <label for="opt7">
                                            <span class="circle"></span>On Sale</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end /.sidebar-card -->

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
                <!-- start .single-product -->
                <?php
                $conn = config();
                $category_sql = "SELECT * FROM category";
                $stmt = $conn->prepare($category_sql);
                $stmt->execute();
                while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $id = $rows['cat_id'];
                    $name = $rows['cat_name'];
                    $image = $rows['cat_image'];
                    $total_pro = $rows['cat_total_pro'];
                    $at = $rows['created_at'];
                    $by = $rows['created_by'];
                ?>
                <div class="product product--list product--list-small">

                    <div class="product__thumbnail">
                        <img width="230px" height="210px"
                            src="admin/img/cat_image/<?php echo $name ?>/<?php echo $image; ?>" alt="Product Image">
                        <div class="prod_btn">
                            <a href="category_products.php?cat_id=<?php echo $id; ?>"
                                class="transparent btn--sm btn--round">More Info</a>
                            <a href="single-product.html" class="transparent btn--sm btn--round">Live Demo</a>
                        </div>
                        <!-- end /.prod_btn -->
                    </div>
                    <!-- end /.product__thumbnail -->

                    <div class="product__details">
                        <div class="product-desc">
                            <a href="#" class="product_title">
                                <h4><?php echo $name; ?></h4>
                            </a>
                            <p></p>

                            <ul class="titlebtm">
                                <li class="product_cat">
                                    <a href="#">
                                        <span class="lnr lnr-book"></span><?php echo $at; ?></a>
                                </li>
                            </ul>
                            <!-- end /.titlebtm -->
                        </div>
                        <!-- end /.product-desc -->

                        <div class="product-meta">
                            <div class="author">
                                <img class="auth-img" src="images/auth3.jpg" alt="author image">
                                <p>
                                    <a href="#"><?php echo $by; ?></a>
                                </p>
                            </div>
                            <!-- end /.author -->

                            <div class="love-comments">
                                <p>
                                    <span class="lnr lnr-heart"></span> <?php echo rand(0, 1000); ?> loves
                                </p>
                                <p>
                                    <span class="lnr lnr-bubble"></span> <?php echo rand(0, 300); ?> Comments
                                </p>
                            </div>
                            <!-- end /.love-comments -->

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
                                <span class="rating__count">(34)</span>
                            </div>
                            <!-- end /.rating -->
                        </div>
                        <!-- end /.product-meta -->

                        <div class="product-purchase">
                            <div class="price_love">
                                <span>$10 - $50</span>
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
                <!-- end /.single-product -->
            </div>
            <!-- end /.col-md-9 -->
        </div>
        <!-- end /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="pagination-area pull-right">
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

<!--================================
        START SEARCH AREA
    =================================-->
<section class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
    </div>
</section>
<!--================================
       END SEARCH AREA
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