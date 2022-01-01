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
                            <a href="#">Statement</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Sales Statements</h1>
            </div>
        </div>
    </div>
</section>
<section class="dashboard-area">
    <div class="dashboard_menu_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="dashboard_menu">
                        <?php require_once('module/dashboard_nav.php') ?>
                    </ul>
                    <!-- end /.dashboard_menu -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!-- end /.dashboard_menu_area :) -->

    <div class="dashboard_contents dashboard_statement_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard_title_area">
                        <div class="dashboard__title">
                            <h3>Sales Statements</h3>
                            <div class="date_area">
                                <form action="#">
                                    <div class="input_with_icon">
                                        <input type="text" class="dattaPikkara" placeholder="From">
                                        <span class="lnr lnr-calendar-full"></span>
                                    </div>

                                    <div class="input_with_icon">
                                        <input type="text" class="dattaPikkara" placeholder="To">
                                        <span class="lnr lnr-calendar-full"></span>
                                    </div>
                                    <div class="select-wrap">
                                        <select name="transaction_type" id="#">
                                            <option value="all">All Transaction</option>
                                            <option value="sale">Sale</option>
                                            <option value="sale">Purchase</option>
                                            <option value="credited">Withdraw</option>
                                        </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>

                                    <button type="submit" class="btn btn--sm btn--round btn--color1">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="statement_info_card">
                        <div class="info_wrap">
                            <span class="lnr lnr-tag icon mcolorbg1"></span>
                            <div class="info">
                                <p>$4,563</p>
                                <span>Total Sales</span>
                            </div>
                        </div>
                        <!-- end /.info_wrap -->
                    </div>
                    <!-- end /.statement_info_card -->
                </div>
                <!-- end /.col-md-3 -->

                <div class="col-lg-3 col-md-3">
                    <div class="statement_info_card">
                        <div class="info_wrap">
                            <span class="lnr lnr-cart icon mcolorbg2"></span>
                            <div class="info">
                                <p>$340</p>
                                <span>Total Purchases</span>
                            </div>
                        </div>
                        <!-- end /.info_wrap -->
                    </div>
                    <!-- end /.statement_info_card -->
                </div>
                <!-- end /.col-md-3 -->

                <div class="col-lg-3 col-md-3">
                    <div class="statement_info_card">
                        <div class="info_wrap">
                            <span class="lnr lnr-dice icon mcolorbg3"></span>
                            <div class="info">
                                <p>$680</p>
                                <span>Total Credited</span>
                            </div>
                        </div>
                        <!-- end /.info_wrap -->
                    </div>
                    <!-- end /.statement_info_card -->
                </div>
                <!-- end /.col-md-3 -->

                <div class="col-lg-3 col-md-3">
                    <div class="statement_info_card">
                        <div class="info_wrap">
                            <span class="lnr lnr-briefcase icon mcolorbg4"></span>
                            <div class="info">
                                <p>$3,690</p>
                                <span>Total Withdraw</span>
                            </div>
                        </div>
                        <!-- end /.info_wrap -->
                    </div>
                    <!-- end /.statement_info_card -->
                </div>
                <!-- end /.col-md-3 -->
            </div>
            <!-- end /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="statement_table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Order ID</th>
                                    <th>Author</th>
                                    <th>Detail</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Earning</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- purchased -->
                                <?php
                                $purchased =  fetchParchased($buyer_id);
                                foreach ($purchased as $purchasedInfo) {
                                    $product_id = $purchasedInfo['pro_id'];
                                    $purchased_pro_author = $purchasedInfo['pro_author'];
                                    $purchased_pro_Date = $purchasedInfo['date'];
                                    $fromProTble = showProductsById($product_id);
                                    foreach ($fromProTble as $proTbleInfo) {
                                        $proName = $proTbleInfo['mem_pro_name'];
                                        $proPrice = $proTbleInfo['price'];
                                ?>
                                        <tr>
                                            <td><?php echo $purchased_pro_Date; ?></td>
                                            <td>MP810094</td>
                                            <td class="author"><?php echo $purchased_pro_author ?></td>
                                            <td class="detail">
                                                <a href="single-product.html"><?php echo $proName; ?></a>
                                            </td>
                                            <td class="type">
                                                <span class="purchase">Purchased</span>
                                            </td>
                                            <td>$<?php echo $proPrice; ?></td>
                                            <td class="earning">-$29</td>
                                            <td class="action">
                                                <a href="invoice.html">view</a>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                                <!-- END purchased -->
                                <!-- Selled -->
                                <?php
                                $selled =  fetchParchasedwithSeller($user);
                                foreach ($selled as $selledInfo) {
                                    $product_id = $selledInfo['pro_id'];
                                    $purchased_pro_author = $selledInfo['pro_author'];
                                    $purchased_pro_Date = $selledInfo['date'];
                                    // Mem Name ID
                                    $author = $user;
                                    $mem_info = mem_pro_author($author);
                                    foreach ($mem_info as $MemData) {
                                        $mem_name = $MemData['mem_name'];
                                        $fromProTble = showProductsById($product_id);
                                        foreach ($fromProTble as $proTbleInfo) {
                                            $proName = $proTbleInfo['mem_pro_name'];
                                            $proPrice = $proTbleInfo['price'];
                                ?>
                                            <tr>
                                                <td><?php echo $purchased_pro_Date; ?></td>
                                                <td>MP810094</td>
                                                <td class="author"><?php echo $mem_name; ?></td>
                                                <td class="detail">
                                                    <a href="single-product.html"><?php echo $proName; ?></a>
                                                </td>
                                                <td class="type">
                                                    <span class="sale">Sale</span>
                                                </td>
                                                <td>$<?php echo $proPrice; ?></td>
                                                <td class="earning">-$29</td>
                                                <td class="action">
                                                    <a href="invoice.html">view</a>
                                                </td>
                                            </tr>
                                <?php }
                                    }
                                } ?>
                                <!-- END Selled -->
                                <!-- withdrawal -->
                                <?php
                                $withdrawal =  proNotif($user);
                                foreach ($withdrawal as $withdrawalInfo) {
                                    $product_id = $withdrawalInfo['with_pro_id'];
                                    $purchased_pro_author = $withdrawalInfo['with_pro_author'];
                                    $purchased_pro_Date = $withdrawalInfo['with_date'];
                                    $fromProTble = showProductsById($product_id);
                                    foreach ($fromProTble as $proTbleInfo) {
                                        $proName = $proTbleInfo['mem_pro_name'];
                                        $proPrice = $proTbleInfo['price'];
                                ?>
                                        <tr>
                                            <td><?php echo $purchased_pro_Date; ?></td>
                                            <td>MP810094</td>
                                            <td class="author"><?php echo $purchased_pro_author ?></td>
                                            <td class="detail">
                                                <a href="single-product.html"><?php echo $proName; ?></a>
                                            </td>
                                            <td class="type">
                                                <span class="withdrawal">withdrawal</span>
                                            </td>
                                            <td>$<?php echo $proPrice; ?></td>
                                            <td class="earning">-$29</td>
                                            <td class="action">
                                                <a href="invoice.html">view</a>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                                <!-- END Withdawal -->
                            </tbody>
                        </table>

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
                    </div>
                </div>
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
<!-- Footer -->
<?php require_once 'footer.php'; ?>
<!-- END Footer -->