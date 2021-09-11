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
                        <li class="active">
                            <a href="#">Shopping Cart</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Shopping Cart</h1>
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
<!-- Essential Info -->
<?php
$conn = config();
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
<!-- END Essential Info -->
<!--================================
            START DASHBOARD AREA
    =================================-->
<section class="cart_area section--padding2 bgcolor">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product_archive added_to__cart">
                    <div class="title_area">
                        <div class="row">
                            <div class="col-md-5">
                                <h4>Product Details</h4>
                            </div>
                            <div class="col-md-3">
                                <h4 class="add_info">Category</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Price</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Remove</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Message Of Deleting cart -->
                    <?php if (isset($_GET['Successfully_Deleted'])) { ?>
                    <div class='alert alert-success' role='alert'>
                        <span class='alert_icon lnr lnr-warning'></span>
                        <strong>Correct!</strong> Your Delete Operation Was Seccessful.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span class='lnr lnr-cross' aria-hidden='true'></span>
                        </button>
                    </div>
                    <?php } ?>
                    <!--END Message Of Deleting cart -->
                    <!-- Row Count Of Cart -->
                    <?php $count_cart_pro =  count_row_cart($mem_id);
                    if ($count_cart_pro >= 1) {


                    ?>
                    <!-- END Row Count Of Cart -->
                    <?php
                        $cart_value = cart_page_fetch($mem_id);
                        foreach ($cart_value as $cart_mem_pro_info) {
                        ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="single_product clearfix">
                                <div class="col-lg-5 col-md-7 v_middle">
                                    <div class="product__description">
                                        <img width="150px" height="120px"
                                            src="admin/img/member_product/<?php echo $cart_mem_pro_info['mem_pro_name'] ?>/<?php echo $cart_mem_pro_info['mem_pro_image'] ?>"
                                            alt="<?php echo $cart_mem_pro_info['mem_pro_name'] ?>">
                                        <div class="short_desc">
                                            <a href="#">
                                                <h4><?php echo $cart_mem_pro_info['mem_pro_name']; ?></h4>
                                            </a>
                                            <p><?php echo $cart_mem_pro_info['mem_pro_detail'] ?></p>
                                        </div>
                                    </div>
                                    <!-- end /.product__description -->
                                </div>
                                <!-- end /.col-md-5 -->

                                <div class="col-lg-3 col-md-2 v_middle">
                                    <div class="product__additional_info">
                                        <ul>
                                            <?php $category = "SELECT * FROM category WHERE cat_id= :cat_id";
                                                    $stmt_cat = $conn->prepare($category);
                                                    $stmt_cat->execute([
                                                        ':cat_id' => $cart_mem_pro_info['category_id']
                                                    ]);
                                                    while ($fetch_cat = $stmt_cat->fetch(PDO::FETCH_ASSOC)) {
                                                        $cat_name = $fetch_cat['cat_name'];
                                                        $cat_image = $fetch_cat['cat_image'];
                                                    ?>
                                            <li>
                                                <a href="#">
                                                    <img width="70px" height="70px" class="btn btn--round"
                                                        src="admin/img/cat_image/<?php echo $cat_name; ?>/<?php echo $cat_image; ?>"
                                                        alt="<?php echo $cat_name; ?>"><?php echo $cat_name; ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <!-- end /.product__additional_info -->
                                </div>
                                <!-- end /.col-md-3 -->

                                <div class="col-lg-4 col-md-3 v_middle">
                                    <div class="product__price_download">
                                        <div class="item_price v_middle">
                                            <span>$<?php echo $cart_mem_pro_info['price']; ?></span>
                                        </div>
                                        <div class="item_action v_middle">
                                            <?php if (isset($_POST['btn_del_cart'])) {
                                                        $cart_pro_id = $_POST['cart_id'];
                                                        $cart_adder = $_POST['who_added'];
                                                        delete_cart_pro($cart_pro_id, $cart_adder);
                                                    } ?>
                                            <form action="cart.php" method="POST">
                                                <input type="hidden" name="cart_id"
                                                    value="<?php echo $cart_mem_pro_info['mem_pro_id']; ?>">
                                                <input type="hidden" name="who_added" value="<?php echo $mem_id ?>">
                                                <button type="submit" name="btn_del_cart"
                                                    class="remove_from_cart btn--round">
                                                    <span class="lnr lnr-trash"></span>
                                                </button>
                                            </form>
                                        </div>
                                        <!-- end /.item_action -->
                                    </div>
                                    <!-- end /.product__price_download -->
                                </div>
                                <!-- end /.col-md-4 -->
                            </div>
                            <!-- end /.single_product -->
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-6 offset-md-6">
                            <div class="cart_calculation">
                                <div class="cart--subtotal">
                                    <p>
                                        <span>Cart Subtotal</span>$0
                                    </p>
                                </div>
                                <div class="cart--total">
                                    <p>
                                        <span>total</span>$0
                                    </p>
                                </div>

                                <a href="checkout.html" class="btn btn--round btn--md checkout_link">Proceed To
                                    Checkout</a>
                            </div>
                        </div>
                        <!-- end .col-md-12 -->
                    </div>
                    <!-- end .row -->
                    <?php } else { ?>
                    <div class='alert alert-warning' role='alert'>
                        <span class='alert_icon lnr lnr-warning'></span>
                        <strong>Sorry!</strong> You Don't Add Any Product To your Cart!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span class='lnr lnr-cross' aria-hidden='true'></span>
                        </button>
                    </div>
                    <?php } ?>

                    <!-- end /.row -->

                </div>
                <!-- end /.product_archive2 -->
            </div>
            <!-- end .col-md-12 -->
        </div>
        <!-- end .row -->

    </div>
    <!-- end .container -->
</section>
<!--================================
            END DASHBOARD AREA
    =================================-->
<?php require_once "footer.php"; ?>