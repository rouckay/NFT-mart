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
                        <div class="dashboard__title dashboard__title pull-right">

                            <a id="hide_btn" href='dashboard-manage-item.php?show_hidden_products' class="btn btn--round btn--md">Show Hidden
                                Products</a>
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
                                    $mem_pro_sql = "SELECT * FROM mem_products WHERE author = :author AND status =:status  ORDER BY mem_pro_id DESC";
                                    $stmt_mem = $conn->prepare($mem_pro_sql);
                                    $stmt_mem->execute([
                                        ':author' => $mem_user_name,
                                        ':status' => "publish"
                                    ]);
                                    $rows = $stmt_mem->rowCount();
                                    if ($rows <= 0) {
                                        echo "<p class='alert alert-danger'>Sorry Product Is Not Uploaded</p>";
                                    } else {
                                        $total_found = $rows; ?>
                                        <span><?php echo "<span class='text-success'>$total_found: Items</span>" ?></span>

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
                $mem_pro_sql = "SELECT * FROM mem_products WHERE author = :author AND status = :status LIMIT 0,6";
                $stmt_mem = $conn->prepare($mem_pro_sql);
                $stmt_mem->execute([
                    ':author' => $mem_user_name,
                    ':status' => 'publish'
                ]);
                while ($rows_mem_pro = $stmt_mem->fetch(PDO::FETCH_ASSOC)) {
                    $id = $rows_mem_pro['mem_pro_id'];
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
                    <?php
                    if (isset($_GET['show_hidden_products'])) {
                        require_once "module/hidden_mem_products.php";
                    } else {
                    ?>
                        <div class="col-lg-4 col-md-6">
                            <!-- start .single-product -->
                            <div class="product product--card">

                                <div class="product__thumbnail">
                                    <!-- <img width="361px" height="230px"
                                src="admin/img/member_product/<?php //echo $name; 
                                                                ?>/<?php // echo $image; 
                                                                    ?>"
                                alt="Product Image"> -->
                                    <!-- Image & video Show AND Size: height 450px , width 555px  -->

                                    <img width="361px" height="230px" src="./admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>" alt="Product Image">
                                    <div class="prod_option">
                                        <a href="#" id="drop2" class="dropdown-trigger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <span class="lnr lnr-cog setting-icon"></span>
                                        </a>

                                        <div class="options dropdown-menu" aria-labelledby="drop2">
                                            <ul>
                                                <?php
                                                if (isset($_POST['btn_edit_pro'])) {
                                                    header('location:edit_mem_product.php');
                                                }

                                                ?>
                                                <li>
                                                    <form action="edit_mem_product.php" method="POST">
                                                        <input type="hidden" name="pro_id" value="<?php echo $id; ?>">
                                                        <a href="edit_mem_product.php" type="submit" name="btn_edit_pro" class="fa fa-edit">
                                                            Edit </a>
                                                    </form>
                                                </li>
                                                <li>
                                                    <?php if (isset($_POST['hide_pro'])) {
                                                        $pro_id = $_POST['pro_id'];
                                                        hideProduct($pro_id);
                                                    } ?>
                                                    <form method="POST" action="dashboard-manage-item.php">
                                                        <input type="hidden" name="pro_id" value="<?php echo $id; ?>">
                                                        <button class="fa fa-hidden" style="border: none;color:blue" id="hidePro" type="submit" name="hide_pro">
                                                            <span class="lnr lnr-eye"></span> Hide</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <?php
                                                    if (isset($_POST['delete_mem_pro'])) {
                                                        $author = $_POST['author'];
                                                        $pro_id = $_POST['pro_id'];
                                                        delet_mem_pro_from_dash($pro_id, $author);
                                                    }
                                                    ?>
                                                    <form action="dashboard-manage-item.php" method="POST">
                                                        <input type="hidden" name="pro_id" value="<?php echo $id; ?>">
                                                        <input type="hidden" name="author" value="<?php echo $by; ?>">
                                                        <button class="fa fa-trash" style="border: none;color:red" type="submit" id="delete_mem_pro" name="delete_mem_pro" class="delete"> Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end /.product__thumbnail -->

                                <div style="margin-bottom: -60px;" class="product-desc">
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
                                            <img class="auth-img" width="30px" height="30px" src="admin/img/member_avatars/<?php echo $mem_name; ?>/<?php echo $user_image; ?>" alt="author image">
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

                                    <p><?php echo substr($detail, 0, 75) . '..'; ?>.</p>
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

                <?php } ?>
                <!-- end /.col-md-4 -->
            </div>
            <script>
                $(document).ready(function() {
                    $('#hide_btn').click(function() {
                        $('#hide_btn').fadeOut(5000);
                        $('#hide_btn').html('Here Below is Your Hidden Products!');
                    });
                })
            </script>
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
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const delete_mem_pro = document.querySelector('#delete_mem_pro');
    const hidePro = document.querySelector('#hidePro');
    delete_mem_pro.setAttribute('style', 'border:none; color:red')
    hidePro.setAttribute('style', 'border:none; color:blue')
</script>
<?php require_once "footer.php"; ?>