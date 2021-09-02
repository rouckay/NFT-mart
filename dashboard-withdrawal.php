<?php $curr_page = basename(__FILE__); ?>
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
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <a href="#">Withdraw</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Withdrawals</h1>
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
                    <div class="dashboard_title_area clearfix">
                        <div class="dashboard__title pull-left">
                            <h3>Withdrawals</h3>
                        </div>

                        <div class="pull-right">
                            <a href="add-payment-method.php" class="btn btn--round btn--md">Add Payment Method</a>
                        </div>
                    </div>
                    <!-- end /.dashboard_title_area -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="withdraw_module cardify">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="modules__title">
                                    <h3>Payment Methods</h3>
                                </div>

                                <div class="modules__content">
                                    <p class="subtitle">Select your Payment Method for
                                        <a href="#">Withdraw Earnings</a>
                                    </p>
                                    <div class="options">
                                        <div class="custom-radio">
                                            <input type="radio" id="opt1" class="" name="filter_opt">
                                            <label for="opt1">
                                                <span class="circle"></span>Payoneer Debit Card</label>
                                        </div>

                                        <div class="custom-radio">
                                            <input type="radio" id="opt2" class="" name="filter_opt">
                                            <label for="opt2">
                                                <span class="circle"></span>Paypal</label>
                                        </div>

                                        <div class="custom-radio">
                                            <input type="radio" id="opt3" class="" name="filter_opt">
                                            <label for="opt3">
                                                <span class="circle"></span>Direct to Local Bank (USD) - Account ending
                                                in 5790 (Minimum $50)</label>
                                        </div>
                                    </div>
                                    <!-- end /.options -->
                                </div>
                                <!-- end /.modules__content -->
                            </div>
                            <!-- end /.col-md-6 -->

                            <div class="col-lg-6">
                                <div class="modules__title">
                                    <h3>Withdraw Amount</h3>
                                </div>

                                <div class="modules__content">
                                    <p class="subtitle">How much amount would you like to Withdraw?</p>
                                    <div class="options">
                                        <div class="custom-radio">
                                            <input type="radio" id="opt4" class="" name="filter_opt">
                                            <label for="opt4">
                                                <span class="circle"></span>Available balance:
                                                <span class="bold">$690.50</span>
                                            </label>
                                        </div>

                                        <div class="custom-radio">
                                            <input type="radio" id="opt5" class="" name="filter_opt">
                                            <label for="opt5">
                                                <span class="circle"></span>A partial amount...</label>
                                        </div>

                                        <div class="withdraw_amount">
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" id="rlicense" class="text_field" placeholder="00.00">
                                            </div>
                                            <span class="fee">$2 USD Fee per withdrawal</span>
                                        </div>
                                    </div>

                                    <div class="button_wrapper">
                                        <button type="submit" class="btn btn--round btn--md">Submit Withdrawal</button>
                                        <a href="#" class="btn btn--round btn-sm cancel_btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.col-md-6 -->
                        </div>
                        <!-- end /.row -->
                    </div>
                    <!-- end /.withdraw_module -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="withdraw_module withdraw_history">
                        <div class="withdraw_table_header">
                            <h3>Withdrawal History</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table withdraw__table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Payment Method</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>09 Jul 2019</td>
                                        <td>Payoneer</td>
                                        <td class="bold">$568.50</td>
                                        <td class="pending">
                                            <span>Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>20 May 2019</td>
                                        <td>Payoneer</td>
                                        <td class="bold">$1300.50</td>
                                        <td class="paid">
                                            <span>Paid</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>16 Dec 2016</td>
                                        <td>Local Bank (USD) - Account ending in 5790</td>
                                        <td class="bold">$2380</td>
                                        <td class="paid">
                                            <span>Paid</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>09 Jul 2019</td>
                                        <td>Payoneer</td>
                                        <td class="bold">$568.50</td>
                                        <td class="pending">
                                            <span>Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>20 May 2019</td>
                                        <td>Payoneer</td>
                                        <td class="bold">$1300.50</td>
                                        <td class="paid">
                                            <span>Paid</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>16 Dec 2016</td>
                                        <td>Local Bank (USD) - Account ending in 5790</td>
                                        <td class="bold">$2380</td>
                                        <td class="paid">
                                            <span>Paid</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end /.container -->
    </div>
    <!-- end /.dashboard_menu_area -->
</section>
<!--================================
            END DASHBOARD AREA
    =================================-->
<?php require_once "footer.php"; ?>