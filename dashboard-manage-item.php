<?php $curr_page = basename(__FILE__); ?>
<?php require_once "header.php"; ?>
<?php check_mem(); ?>
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
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="dashboard.php">Dashboard</a>
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
                        <?php require_once "module/dashboard_nav.php";  ?>
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
                                    <?php
                                    $conn = config();
                                    if (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
                                        $user_id = base64_decode($_COOKIE['mem_user_id']);
                                        $mem_user_name = base64_decode($_COOKIE['mem_user_name']);
                                    } elseif (isset($_SESSION['member_id']) || isset($_SESSION['member_user'])) {
                                        $user_id = $_SESSION['member_id'];
                                        $mem_user_name = $_SESSION['member_user'];
                                    } else {
                                        $user_id = -1;
                                    }
                                    $mem_pro_sql = "SELECT * FROM mem_products WHERE author = :author  ORDER BY mem_pro_id DESC";
                                    $stmt_mem = $conn->prepare($mem_pro_sql);
                                    $stmt_mem->execute([
                                        ':author' => $mem_user_name
                                    ]);
                                    $rows = $stmt_mem->rowCount();
                                    if ($rows <= 0) {
                                        echo "<p class='alert alert-danger'>Sorry Product Is Not Uploaded</p>";
                                    } else {
                                        $total_found = $rows; ?>
                                    <span><?php echo $total_found; ?></span> Products

                                    <?php } ?>
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
                <?php
                $conn = config();
                if (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
                    $user_id = base64_decode($_COOKIE['mem_user_id']);
                    $mem_user_name = base64_decode($_COOKIE['mem_user_name']);
                } elseif (isset($_SESSION['member_id']) || isset($_SESSION['member_user'])) {
                    $user_id = $_SESSION['member_id'];
                    $mem_user_name = $_SESSION['member_user'];
                } else {
                    $user_id = -1;
                }
                $mem_pro_sql = "SELECT * FROM mem_products WHERE author = :author  ORDER BY mem_pro_id DESC";
                $stmt_mem = $conn->prepare($mem_pro_sql);
                $stmt_mem->execute([
                    ':author' => $mem_user_name
                ]);
                while ($rows_mem_pro = $stmt_mem->fetch(PDO::FETCH_ASSOC)) {
                    $name = $rows_mem_pro['mem_pro_name'];
                    $detail = $rows_mem_pro['mem_pro_detail'];
                    $image = $rows_mem_pro['mem_pro_image'];
                    $category = $rows_mem_pro['category_id'];
                    $tag = $rows_mem_pro['tag'];
                    $at = $rows_mem_pro['at'];
                    $by = $rows_mem_pro['author'];
                    $views = $rows_mem_pro['pro_views'];
                    $price = $rows_mem_pro['price'];
                ?>
                <div class="col-lg-4 col-md-6">
                    <!-- start .single-product -->
                    <div class="product product--card">

                        <div class="product__thumbnail">
                            <img width="361px" height="230px"
                                src="admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>"
                                alt="Product Image">

                            <div class="prod_option">
                                <a href="#" id="drop2" class="dropdown-trigger" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                    <span class="lnr lnr-cog setting-icon"></span>
                                </a>

                                <div class="options dropdown-menu" aria-labelledby="drop2">
                                    <ul>
                                        <li>
                                            <a href="edit-item.php">
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
                                <h4><?php echo $name; ?></h4>
                            </a>
                            <ul class="titlebtm">
                                <?php
                                    $conn = config();
                                    $mem_img_sql = "SELECT * FROM members WHERE mem_id =:id";
                                    $stmt_img = $conn->prepare($mem_img_sql);
                                    $stmt_img->execute([
                                        ':id' => $user_id
                                    ]);
                                    $rows = $stmt_img->fetch(PDO::FETCH_ASSOC);
                                    $user_image = $rows['mem_image'];
                                    $mem_name = $rows['mem_user_name'];
                                    ?>
                                <li>
                                    <img class="auth-img" width="30px" height="30px"
                                        src="admin/img/member_avatars/<?php echo $mem_name; ?>/<?php echo $user_image; ?>"
                                        alt="author image">
                                    <p>
                                        <a href="#"><?php echo $by; ?></a>
                                    </p>
                                </li>
                                <li class="product_cat">
                                    <a href="#">
                                        <?php
                                            $pro_cat = "SELECT * FROM category WHERE cat_id = :id";
                                            $stmt_cat = $conn->prepare($pro_cat);
                                            $stmt_cat->execute([
                                                ':id' => $category
                                            ]);
                                            $rows_cat = $stmt_cat->fetch(PDO::FETCH_ASSOC);
                                            $cat_name = $rows_cat['cat_name'];
                                            ?>
                                        <span class="lnr lnr-book"></span><?php echo $cat_name; ?></a>
                                </li>
                            </ul>

                            <p><?php echo $detail; ?>.</p>
                        </div>
                        <!-- end /.product-desc -->

                        <div class="product-purchase">
                            <div class="price_love">
                                <span>$<?php echo $price; ?></span>
                                <p>
                                    <span class="lnr lnr-heart"></span> <?php echo rand(0, 400); ?>
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