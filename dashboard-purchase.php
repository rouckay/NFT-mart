<?php
$curr_page = basename(__FILE__);
require_once 'header.php'; ?>
<?php
session_cookie($mem_id, $user);
$buyer_id = $mem_id;
?>
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
                            <a href="#">Settings</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Author's Settings</h1>
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
<section class="dashboard-area dashboard_purchase">
    <div class="dashboard_menu_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="dashboard_menu">
                        <li>
                            <a href="dashboard.html">
                                <span class="lnr lnr-home"></span>Dashboard</a>
                        </li>
                        <li>
                            <a href="dashboard-setting.html">
                                <span class="lnr lnr-cog"></span>Setting</a>
                        </li>
                        <li class="active">
                            <a href="dashboard-purchase.html">
                                <span class="lnr lnr-cart"></span>Purchase</a>
                        </li>
                        <li>
                            <a href="dashboard-add-credit.html">
                                <span class="lnr lnr-dice"></span>Add Credits</a>
                        </li>
                        <li>
                            <a href="dashboard-statement.html">
                                <span class="lnr lnr-chart-bars"></span>Statements</a>
                        </li>
                        <li>
                            <a href="dashboard-upload.html">
                                <span class="lnr lnr-upload"></span>Upload Items</a>
                        </li>
                        <li>
                            <a href="dashboard-manage-item.html">
                                <span class="lnr lnr-briefcase"></span>Manage Items</a>
                        </li>
                        <li>
                            <a href="dashboard-withdrawal.html">
                                <span class="lnr lnr-briefcase"></span>Withdrawals</a>
                        </li>
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
                    <div class="filter-bar clearfix filter-bar2">

                        <div class="dashboard__title pull-left">
                            <h3>Your Purchases</h3>
                        </div>

                        <div class="pull-right">
                            <div class="filter__option filter--text">
                                <p>
                                    <span>230</span> Products Purchased
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
                        </div>
                        <!-- end /.pull-right -->
                    </div>
                    <!-- end /.filter-bar -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->

            <div class="product_archive">
                <div class="title_area">
                    <div class="row">
                        <div class="col-md-5">
                            <h4>Product Details</h4>
                        </div>
                        <div class="col-md-3">
                            <h4 class="add_info">Additional Info</h4>
                        </div>
                        <div class="col-md-2">
                            <h4>Price</h4>
                        </div>
                        <div class="col-md-2">
                            <h4>Download</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php
                    $conn = config();
                    $pur_data = fetchParchased($buyer_id);
                    foreach ($pur_data as $pur_list) {
                        $pro_id = $pur_list['pro_id'];
                        $sql_pro = "SELECT * FROM mem_products WHERE mem_pro_id = :mem_pro_id";
                        $stmt_pro = $conn->prepare($sql_pro);
                        $stmt_pro->execute([
                            ':mem_pro_id' => $pro_id
                        ]);
                        while ($row_list_of_mem_pro = $stmt_pro->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <div class="col-md-12">
                                <div class="single_product clearfix">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="product__description">
                                                <img width="150px" height="120px" style="border-radius:15px" src="admin/img/member_product/<?php echo $row_list_of_mem_pro['mem_pro_name']; ?>/<?php echo $row_list_of_mem_pro['mem_pro_image']; ?>" alt="Purchase image">
                                                <div class="short_desc">
                                                    <h4><?php echo $row_list_of_mem_pro['mem_pro_name'] ?></h4>
                                                    <p><?php echo $row_list_of_mem_pro['mem_pro_detail'] ?></p>
                                                </div>
                                            </div>
                                            <!-- end /.product__description -->
                                        </div>
                                        <!-- end /.col-md-5 -->

                                        <div class="col-lg-3 col-md-3 col-6 xs-fullwidth">
                                            <div class="product__additional_info">
                                                <ul>
                                                    <li>
                                                        <p>
                                                            <span>Date: </span><?php echo $row_list_of_mem_pro['at'] ?>
                                                        </p>
                                                    </li>
                                                    <li class="license">
                                                        <p>
                                                            <span>Licence:</span> Regular
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <p>
                                                            <span>Author:</span> <?php echo $row_list_of_mem_pro['author'] ?>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="images/catword.png" alt="">Wordpress</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- end /.product__additional_info -->
                                        </div>
                                        <!-- end /.col-md-3 -->

                                        <div class="col-lg-4 col-md-4 col-6 xs-fullwidth">
                                            <div class="product__price_download">
                                                <div class="item_price v_middle">
                                                    <span>$<?php echo $row_list_of_mem_pro['price'] ?></span>
                                                </div>
                                                <div class="item_action v_middle">
                                                    <a href="#" class="btn btn--md btn--round">Download Item</a>
                                                    <a href="#" class="btn btn--md btn--round btn--white rating--btn not--rated" data-toggle="modal" data-target="#myModal">
                                                        <P class="rate_it">Rate Now</P>
                                                        <div class="rating product--rating">
                                                            <ul>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </a>
                                                    <!-- end /.rating_btn -->
                                                </div>
                                                <!-- end /.item_action -->
                                            </div>
                                            <!-- end /.product__price_download -->
                                        </div>
                                        <!-- end /.col-md-4 -->
                                    </div>
                                </div>
                                <!-- end /.single_product -->
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <div class="col-md-12">
                        <div class="pagination-area pagination-area2">
                            <nav class="navigation pagination " role="navigation">
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
            <!-- end /.product_archive2 -->
        </div>
        <!-- end /.container -->
    </div>
    <!-- end /.dashboard_menu_area -->
</section>
<!--================================
            END DASHBOARD AREA
    =================================-->
<?php require_once 'footer.php';  ?>