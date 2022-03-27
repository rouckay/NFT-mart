<?php $curr_page = basename(__FILE__); ?>
<?php require_once "header.php"; ?>
<?php
if (isset($_SESSION['member_id'])) {
    $mem_id = $_SESSION['member_id'];
} elseif (isset($_COOKIE['mem_user_id'])) {
    $mem_id = base64_decode($_COOKIE['mem_user_id']);
} else {
    $mem_id = -1;
}
?>
<?php
if (isset($_SESSION['member_id']) || isset($_SESSION['member_user'])) {
    $mem_id = $_SESSION['member_id'];
    $user = $_SESSION['member_user'];
} elseif (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
    $mem_id = base64_decode($_COOKIE['mem_user_id']);
    $user = base64_decode($_COOKIE['mem_user_name']);
} else {
    $mem_id = -1;
    $user = -1;
}
?>
<?php
if (isset($_POST['btn_s']) || isset($_POST['main_menu_search'])) {
    $conn = config();
    $result = $_POST['s_text'];
    $s_sql = "SELECT * FROM mem_products WHERE mem_pro_id LIKE :id OR mem_pro_name LIKE :name OR mem_pro_detail LIKE :detail OR price LIKE :price OR category_id LIKE :category";
    $stmt_s = $conn->prepare($s_sql);
    $stmt_s->execute([
        ':id' => '%' . $result . '%',
        ':name' => '%' . $result . '%',
        ':detail' => '%' . $result . '%',
        ':price' => '%' . $result . '%',
        ':category' => '%' . $result . '%'
    ]);
    $pros = $stmt_s->fetch(PDO::FETCH_ASSOC);
    $rows = $stmt_s->rowCount();
    if ($rows == 0) {
        $no_product = "Please Enter Try Another Keyword for Search!";
    }
?>
    <section class="search-wrapper">
        <div class="search-area2 bgimage">
            <div class="bg_image_holder">
                <img src="img/abstract.jpg" alt="">
            </div>
            <div class="container content_above">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="search">
                            <div class="search__title">
                                <h3>
                                    <span> Total Result ( <?php echo $rows; ?></span> ) Founded<br>Searched For (
                                    <?php echo $result; ?>
                                    )
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
                                        <a href="#">All Products</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
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
            </div>
        </div>
    </div>
</div>
<section class="products section--padding2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <aside class="sidebar product--sidebar">
                    <div class="sidebar-card card--category">
                        <a class="card-title" href="#collapse1" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
                            <h4>Categories
                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>
                        <div class="collapse show collapsible-content" id="collapse1">
                            <ul class="card-content">
                                <?php include_once('module/category.php'); ?>
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-card card--slider">
                        <a class="card-title" href="#collapse3" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse3">
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
                </aside>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <?php if (isset($no_product)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <span class="alert_icon lnr lnr-warning"></span>
                            <strong>Oh No!</strong> <?php echo $no_product; ?>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="lnr lnr-cross" aria-hidden="true"></span>
                            </button>
                        </div>
                    <?php  } ?>
                    <?php
                    if (isset($_POST['btn_s']) || isset($_POST['main_menu_search'])) {
                        $conn = config();

                        $s_sql = "SELECT * FROM mem_products WHERE mem_pro_id LIKE :id OR mem_pro_name LIKE :name OR mem_pro_detail LIKE :detail OR price LIKE :price OR category_id LIKE :category";
                        $stmt_s = $conn->prepare($s_sql);
                        $stmt_s->execute([
                            ':id' => '%' . $result . '%',
                            ':name' => '%' . $result . '%',
                            ':detail' => '%' . $result . '%',
                            ':price' => '%' . $result . '%',
                            ':category' => '%' . $result . '%'
                        ]);
                        while ($pros = $stmt_s->fetch(PDO::FETCH_ASSOC)) {
                            $id = $pros['mem_pro_id'];
                            $image = $pros['mem_pro_image'];
                            $name = $pros['mem_pro_name'];
                            $detail = $pros['mem_pro_detail'];
                            $price = $pros['price'];
                            $category = $pros['category_id'];
                            $tags = $pros['tag'];
                            $views = $pros['pro_views'];
                            $author = $pros['author'];
                            $amount = $pros['pro_amount'];

                    ?>

                            <div class="col-lg-4 col-md-6">
                                <!-- start .single-product -->
                                <div class="product product--card " style="border-radius:15px 15px 15px 15px;">
                                    <div style="border-radius: 40px;" class="product__thumbnail">
                                        <!-- Image & video Show -->
                                        <?php
                                        $exp = explode(".", $image);
                                        $ext = end($exp);
                                        if ($ext == "jpg" or $ext == "png" or $ext == "jpeg" or $ext == 'gif') { ?>
                                            <img width="361px" height="240px" style="border-radius:15px 15px 15px 15px;" src="./admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>" alt="Product Image">

                                        <?php } else { ?>
                                            <div class="card">
                                                <video width="361px" height="240px" autoplay muted loop poster="placeholder.png" controls style="background-size:contain">
                                                    <source src="./admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>">
                                                </video>
                                            </div>
                                        <?php } ?>
                                        <!-- END Image & video Show -->
                                        <div class="prod_btn">
                                            <a href="single-product.php?id=<?php echo $id; ?>" class="transparent btn--sm btn--round">More Info</a>
                                        </div>
                                        <!-- end /.prod_btn -->
                                    </div>
                                    <!-- end /.product__thumbnail -->

                                    <div style="margin-bottom: -75px;" class="product-desc">
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
                                                    <img class="auth-img" src="admin/img/member_avatars/<?php echo $auth_user_name; ?>/<?php echo $auth_img; ?>" alt="<?php echo $auth_user_name; ?>">
                                                    <p>
                                                        <a href="public_auth.php?auth=<?php echo $auth_id;  ?>"><?php echo $auth_user_name; ?></a>
                                                    </p>
                                                </li>
                                            <?php } ?>
                                            <li class="product_cat" style=" float:right;">
                                                <span>&#128230; <?php echo "<span style='padding: 2px;' class='rounded bg-primary text-white'>$amount</span>"; ?></span><span style="font-size: 20px;">&#128065;<span style="font-size: 15px;"><?php echo $views; ?></span> </span>
                                            </li>
                                        </ul>

                                        <p><?php echo substr($detail, 0, 40) . "..."; ?>.</p>
                                    </div>
                                    <?php
                                    if (isset($_POST['btn_add_fav'])) {
                                        $fav_pro_id = $_POST['pro_id'];
                                        $fav_pro_author = $_POST['pro_author'];
                                        add_to_favourite($fav_pro_id, $fav_pro_author, $mem_id);
                                    }
                                    // } else {
                                    //     header('location:login.php');
                                    // }
                                    ?>
                                    <div class="product-purchase">
                                        <div class="price_love">
                                            <form action="index.php" method="POST">
                                                <input type="hidden" name="pro_id" value="<?php echo $id; ?>">
                                                <input type="hidden" name="pro_author" value="<?php echo $author; ?>">
                                                <p>
                                                    <button type="submit" name="btn_add_fav" class="btn btn--round btn-sm btn-light"><span class="lnr lnr-heart"></span>
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
                                                }
                                                ?>
                                            <form method="POST">
                                                <input type="hidden" id="cart_pro_id" name="cart_pro_id" value="<?php echo $id; ?>">
                                                <input type="hidden" id="cart_pro_author" name="cart_pro_author" value="<?php echo $author; ?>">
                                                <input type="hidden" id="who_adding_to_cart" name="who_adding_to_cart" value="<?php echo $mem_id; ?>">
                                                <!-- Count Total Added To Cart -->
                                                <?php
                                                if ($user == $author) { ?>
                                                    <div class="btn btn--round btn--bordered btn-sm btn-success"><span>&#10004;</span></div>
                                                <?php } else { ?>
                                                    <button id="btn_add_to_cart" name="btn_add_to_cart" class="btn btn--round btn--bordered btn-sm btn-success"><span class="lnr lnr-cart">$<?php echo $price; ?></span> </button>
                                                <?php }
                                                ?>
                                                <!-- Count Total Added To Cart -->
                                                </p>
                                            </form>
                                        </div>
                                        <div id="response"></div>
                                    </div>
                                    <!-- end /.product-purchase -->
                                </div>
                                <!-- end /.single-product -->
                                <!-- New Style Started -->
                                <!-- ENDED Style Started -->
                            </div>
                    <?php }
                    } else {
                        header('location:index.php');
                    } ?>
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