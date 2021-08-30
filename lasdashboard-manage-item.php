<?php $curr_page = basename(__FILE__);
$curr_page == "dashboard-manage-item.php" ? "Manage items" : "";
?>
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
                        <li>
                            <a href="dashboard.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <a href="#">Manage Item</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Manage Item</h1>
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
            START DASHBOARD AREA
    =================================-->
<section class="dashboard-area">
    <div class="dashboard_menu_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="dashboard_menu">
                        <?php require_once "module/dashboard_nav.php"; ?>
                    </ul>
                    <!-- end /.dashboard_menu -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!-- end /.dashboard_menu_area -->

    <div class="dashboard_contents">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="filter-bar dashboard_title_area clearfix filter-bar2">
                        <div class="dashboard__title dashboard__title pull-left">
                            <h3>Manage Items</h3>
                        </div>

                        <div class="pull-right">
                            <div class="filter__option filter--text">
                                <p>
                                    <span>26</span> Products
                                </p>
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
                        </div>
                        <!-- end /.pull-right -->
                    </div>
                    <!-- end /.filter-bar -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->

            <div class="row">
                <!-- start .col-md-4 -->
                <div class="col-lg-4 col-md-6">
                    <!-- start .single-product -->
                    <div class="product product--card">

                        <div class="product__thumbnail">
                            <img src="images/p1.jpg" alt="Product Image">

                            <div class="prod_option">
                                <a href="#" id="drop2" class="dropdown-trigger" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                    <span class="lnr lnr-cog setting-icon"></span>
                                </a>

                                <div class="options dropdown-menu" aria-labelledby="drop2">
                                    <ul>
                                        <li>
                                            <a href="edit-item.html">
                                                <span class="lnr lnr-pencil"></span>Edit</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-eye"></span>Hide</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myModal2" class="delete">
                                                <span class="lnr lnr-trash"></span>Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end /.product__thumbnail -->

                        <div class="product-desc">
                            <a href="#" class="product_title">
                                <h4>MartPlace Extension Bundle</h4>
                            </a>
                            <ul class="titlebtm">
                                <li>
                                    <img class="auth-img" src="images/auth.jpg" alt="author image">
                                    <p>
                                        <a href="#">AazzTech</a>
                                    </p>
                                </li>
                                <li class="product_cat">
                                    <a href="#">
                                        <span class="lnr lnr-book"></span>Plugin</a>
                                </li>
                            </ul>

                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                                mattis,
                                leo quam aliquet congue.</p>
                        </div>
                        <!-- end /.product-desc -->

                        <div class="product-purchase">
                            <div class="price_love">
                                <span>$10 - $50</span>
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
                <!-- end /.col-md-4 -->

                <!-- start .col-md-4 -->
                <div class="col-lg-4 col-md-6">
                    <!-- start .single-product -->
                    <div class="product product--card">

                        <div class="product__thumbnail">
                            <img src="images/p2.jpg" alt="Product Image">

                            <div class="prod_option">
                                <a href="#" id="drop1" class="dropdown-trigger" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                    <span class="lnr lnr-cog setting-icon"></span>
                                </a>

                                <div class="options dropdown-menu" aria-labelledby="drop1">
                                    <ul>
                                        <li>
                                            <a href="edit-item.html">
                                                <span class="lnr lnr-pencil"></span>Edit</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-eye"></span>Hide</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myModal2" class="delete">
                                                <span class="lnr lnr-trash"></span>Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end /.product__thumbnail -->

                        <div class="product-desc">
                            <a href="#" class="product_title">
                                <h4>Mccarther Coffee Shop</h4>
                            </a>
                            <ul class="titlebtm">
                                <li>
                                    <img class="auth-img" src="images/auth2.jpg" alt="author image">
                                    <p>
                                        <a href="#">AazzTech</a>
                                    </p>
                                </li>
                                <li class="product_cat">
                                    <a href="#">
                                        <span class="lnr lnr-book"></span>Plugin</a>
                                </li>
                            </ul>

                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                                mattis,
                                leo quam aliquet congue.</p>
                        </div>
                        <!-- end /.product-desc -->

                        <div class="product-purchase">
                            <div class="price_love">
                                <span>$10</span>
                                <p>
                                    <span class="lnr lnr-heart"></span> 48
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

                            <div class="sell">
                                <p>
                                    <span class="lnr lnr-cart"></span>
                                    <span>50</span>
                                </p>
                            </div>
                        </div>
                        <!-- end /.product-purchase -->
                    </div>
                    <!-- end /.single-product -->
                </div>
                <!-- end /.col-md-4 -->

                <!-- start .col-md-4 -->
                <div class="col-lg-4 col-md-6">
                    <!-- start .single-product -->
                    <div class="product product--card">

                        <div class="product__thumbnail">
                            <img src="images/p3.jpg" alt="Product Image">

                            <div class="prod_option">
                                <a href="#" id="drop4" class="dropdown-trigger" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                    <span class="lnr lnr-cog setting-icon"></span>
                                </a>

                                <div class="options dropdown-menu" aria-labelledby="drop4">
                                    <ul>
                                        <li>
                                            <a href="edit-item.html">
                                                <span class="lnr lnr-pencil"></span>Edit</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-eye"></span>Hide</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myModal2" class="delete">
                                                <span class="lnr lnr-trash"></span>Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end /.product__thumbnail -->

                        <div class="product-desc">
                            <a href="#" class="product_title">
                                <h4>Visibility Manager Subscriptions</h4>
                            </a>
                            <ul class="titlebtm">
                                <li>
                                    <img class="auth-img" src="images/auth3.jpg" alt="author image">
                                    <p>
                                        <a href="#">AazzTech</a>
                                    </p>
                                </li>
                                <li class="product_cat">
                                    <a href="#">
                                        <span class="lnr lnr-book"></span>Plugin</a>
                                </li>
                            </ul>

                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                                mattis,
                                leo quam aliquet congue.</p>
                        </div>
                        <!-- end /.product-desc -->

                        <div class="product-purchase">
                            <div class="price_love">
                                <span>Free</span>
                                <p>
                                    <span class="lnr lnr-heart"></span> 24
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

                            <div class="sell">
                                <p>
                                    <span class="lnr lnr-cart"></span>
                                    <span>27</span>
                                </p>
                            </div>
                        </div>
                        <!-- end /.product-purchase -->
                    </div>
                    <!-- end /.single-product -->
                </div>
                <!-- end /.col-md-4 -->

                <!-- start .col-md-4 -->
                <div class="col-lg-4 col-md-6">
                    <!-- start .single-product -->
                    <div class="product product--card">

                        <div class="product__thumbnail">
                            <img src="images/p4.jpg" alt="Product Image">

                            <div class="prod_option">
                                <a href="#" id="drop5" class="dropdown-trigger" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                    <span class="lnr lnr-cog setting-icon"></span>
                                </a>

                                <div class="options dropdown-menu" aria-labelledby="drop5">
                                    <ul>
                                        <li>
                                            <a href="edit-item.html">
                                                <span class="lnr lnr-pencil"></span>Edit</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-eye"></span>Hide</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myModal2" class="delete">
                                                <span class="lnr lnr-trash"></span>Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end /.product__thumbnail -->

                        <div class="product-desc">
                            <a href="#" class="product_title">
                                <h4>Ajax Live Search</h4>
                            </a>
                            <ul class="titlebtm">
                                <li>
                                    <img class="auth-img" src="images/auth.jpg" alt="author image">
                                    <p>
                                        <a href="#">AazzTech</a>
                                    </p>
                                </li>
                                <li class="product_cat">
                                    <a href="#">
                                        <span class="lnr lnr-book"></span>Plugin</a>
                                </li>
                            </ul>

                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                                mattis,
                                leo quam aliquet congue.</p>
                        </div>
                        <!-- end /.product-desc -->

                        <div class="product-purchase">
                            <div class="price_love">
                                <span>$10 - $50</span>
                                <p>
                                    <span class="lnr lnr-heart"></span> 90
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
                <!-- end /.col-md-4 -->

                <!-- start .col-md-4 -->
                <div class="col-lg-4 col-md-6">
                    <!-- start .single-product -->
                    <div class="product product--card">

                        <div class="product__thumbnail">
                            <img src="images/p5.jpg" alt="Product Image">

                            <div class="prod_option">
                                <a href="#" id="drop6" class="dropdown-trigger" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                    <span class="lnr lnr-cog setting-icon"></span>
                                </a>

                                <div class="options dropdown-menu" aria-labelledby="drop6">
                                    <ul>
                                        <li>
                                            <a href="edit-item.html">
                                                <span class="lnr lnr-pencil"></span>Edit</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-eye"></span>Hide</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myModal2" class="delete">
                                                <span class="lnr lnr-trash"></span>Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end /.product__thumbnail -->

                        <div class="product-desc">
                            <a href="#" class="product_title">
                                <h4>Mccarther Coffee Shop</h4>
                            </a>
                            <ul class="titlebtm">
                                <li>
                                    <img class="auth-img" src="images/auth2.jpg" alt="author image">
                                    <p>
                                        <a href="#">AazzTech</a>
                                    </p>
                                </li>
                                <li class="product_cat">
                                    <a href="#">
                                        <span class="lnr lnr-book"></span>Plugin</a>
                                </li>
                            </ul>

                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                                mattis,
                                leo quam aliquet congue.</p>
                        </div>
                        <!-- end /.product-desc -->

                        <div class="product-purchase">
                            <div class="price_love">
                                <span>$10</span>
                                <p>
                                    <span class="lnr lnr-heart"></span> 48
                                </p>
                            </div>
                            <div class="sell">
                                <p>
                                    <span class="lnr lnr-cart"></span>
                                    <span>50</span>
                                </p>
                            </div>
                        </div>
                        <!-- end /.product-purchase -->
                    </div>
                    <!-- end /.single-product -->
                </div>
                <!-- end /.col-md-4 -->

                <!-- start .col-md-4 -->
                <div class="col-lg-4 col-md-6">
                    <!-- start .single-product -->
                    <div class="product product--card">

                        <div class="product__thumbnail">
                            <img src="images/p6.jpg" alt="Product Image">

                            <div class="prod_option">
                                <a href="#" id="drop7" class="dropdown-trigger" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                    <span class="lnr lnr-cog setting-icon"></span>
                                </a>

                                <div class="options dropdown-menu" aria-labelledby="drop7">
                                    <ul>
                                        <li>
                                            <a href="edit-item.html">
                                                <span class="lnr lnr-pencil"></span>Edit</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-eye"></span>Hide</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myModal2" class="delete">
                                                <span class="lnr lnr-trash"></span>Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end /.product__thumbnail -->

                        <div class="product-desc">
                            <a href="#" class="product_title">
                                <h4>Visibility Manager Subscriptions</h4>
                            </a>
                            <ul class="titlebtm">
                                <li>
                                    <img class="auth-img" src="images/auth3.jpg" alt="author image">
                                    <p>
                                        <a href="#">AazzTech</a>
                                    </p>
                                </li>
                                <li class="product_cat">
                                    <a href="#">
                                        <span class="lnr lnr-book"></span>WordPress</a>
                                </li>
                            </ul>

                            <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the
                                mattis,
                                leo quam aliquet congue.</p>
                        </div>
                        <!-- end /.product-desc -->

                        <div class="product-purchase">
                            <div class="price_love">
                                <span>Free</span>
                                <p>
                                    <span class="lnr lnr-heart"></span> 24
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

                            <div class="sell">
                                <p>
                                    <span class="lnr lnr-cart"></span>
                                    <span>27</span>
                                </p>
                            </div>
                        </div>
                        <!-- end /.product-purchase -->
                    </div>
                    <!-- end /.single-product -->
                </div>
                <!-- end /.col-md-4 -->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="pagination-area">
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
                    <!-- end /.pagination-area -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!-- end /.dashboard_menu_area -->
</section>
<!--================================
            END DASHBOARD AREA
    =================================-->
<?php require_once "footer.php"; ?>