<?php $curr_page = basename(__FILE__); ?>
<?php require_once "header.php"; ?>
<?php
check_mem();
session_cookie($mem_id, $user);
?>
<!-- Buyer Author info -->
<?php
$buyer_info =  fetch_mem_info_by_id($mem_id);
foreach ($buyer_info  as $buyer_data) {
    $member_name = $buyer_data['mem_name'];
}
?>
<!-- END Buyer Author info -->
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
                            <a href="add-payment-method.php" id="addPaymentMethod" class="btn btn-info btn--md">Add Payment Method</a>
                        </div>
                    </div>
                    <!-- end /.dashboard_title_area -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->

            <!-- <div class="row">
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
                                </div>
                            </div>
             
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
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col-md-12">
                    <div class="withdraw_module withdraw_history">
                        <div class="withdraw_table_header">
                            <h3>Withdrawal History</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table withdraw__table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Amount</th>
                                        <th>Price</th>
                                        <th>Product Author</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $Retrive_with = fetch_Withdrawal($mem_id);
                                    foreach ($Retrive_with as $withdrawal_data) {
                                        $product_id =  $withdrawal_data['with_pro_id'];
                                        $product_withdrawal_date = $withdrawal_data['with_date'];
                                        $who_want_to_by = $withdrawal_data['with_buyer_id'];
                                        $with_auth = $withdrawal_data['with_pro_author'];
                                        $amount = $withdrawal_data['amount'];
                                        $status = $withdrawal_data['status'];
                                        $productRetrive = showProductsById($product_id);
                                        foreach ($productRetrive as $pro_data) {
                                            $pro_name =  $pro_data['mem_pro_name'];
                                            $image =  $pro_data['mem_pro_image'];
                                            $price =  $pro_data['price'];

                                    ?>
                                            <tr>
                                                <td><?php echo $pro_name; ?></td>
                                                <td><img height="80px" width="80px" src="admin/img/member_product/<?php echo $pro_name; ?>/<?php echo $image; ?>"></td>
                                                <td class="bold"><?php echo $amount; ?></td>
                                                <td class="bold">$<?php echo $price; ?></td>
                                                <td class="bold"><?php echo $with_auth; ?></td>
                                                <td class="<?php echo $status == 'approved' ? 'paid' : 'pending'; ?>">
                                                    <span><?php echo $status == 'approved' ? 'Paid' : 'Pending'; ?></span>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row bg-success">
                <div class="col-md-12 ">
                    <div class="withdraw_module withdraw_history">
                        <div class="withdraw_table_header" id="productConfirmPlace">
                            <h3 class='text-success'>People They Want to Buy your Products Just Approved It</h3>
                        </div>
                        <div id="responseDeny" class="type mcolorbg1"></div>
                        <div class="table-responsive">
                            <table class="table withdraw__table table-striped">
                                <!-- <div id="response"></div> -->
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Amount</th>
                                        <th>Who Want To Buy</th>
                                        <th>Delete</th>
                                        <th>Save</th>
                                    </tr>
                                </thead>

                                <tbody id="table">
                                    <?php
                                    $ownerFunc =  showProductForOwnerwithdrawal($user);
                                    foreach ($ownerFunc as $ownerPro_info) {
                                        $with_id = $ownerPro_info['with_id'];
                                        $product_id = $ownerPro_info['with_pro_id'];
                                        $mem_id = $ownerPro_info['with_buyer_id'];
                                        $amount_or_products = $ownerPro_info['amount'];
                                        $buyer_info = fetch_mem_info_by_id($mem_id);
                                        foreach ($buyer_info as $buyer_name_fetch) {
                                            $buyer_name = $buyer_name_fetch['mem_name'];
                                            $buyer_id = $buyer_name_fetch['mem_id'];
                                            $productRetrive = showProductsById($product_id);
                                            foreach ($productRetrive as $pro_data) {
                                                $pro_name =  $pro_data['mem_pro_name'];
                                                $image =  $pro_data['mem_pro_image'];
                                                $price =  $pro_data['price']; ?>
                                                <tr>
                                                    <div id="response_with"></div>
                                                    <div id="response_deliv"></div>
                                                    <td><?php echo $pro_name; ?></td>
                                                    <td><img height="80px" width="80px" src="admin/img/member_product/<?php echo $pro_name; ?>/<?php echo $image; ?>"></td>
                                                    <td class="bold">$<?php echo $price; ?></td>
                                                    <td class="bold"><?php echo $amount_or_products; ?></td>
                                                    <td class="bold"><span class="btn btn--icon btn-md btn--round btn-success"><span class="lnr lnr-user"></span><?php echo $buyer_name; ?></span> </td>
                                                    <td>
                                                        <input type="hidden" id="with_id" value="<?php echo $with_id; ?>">
                                                        <button class="btn btn-sm btn-danger" id="btn_deny">Deny</button>
                                                        <input type="hidden" id="with_pro_id" value="<?php echo $product_id; ?>">
                                                        <input type="hidden" id="buyer_id" value="<?php echo $buyer_id; ?>">
                                                        <input type="hidden" id="buyer_name" value="<?php echo $member_name; ?>">
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-success" type="submit" name="approvedBtn" id="btn_approve">Approve</button>
                                                    </td>
                                                </tr>
                                                <?php // echo  "<div class='bg-danger' >$thereIsNoProducts</div>" 
                                                ?>
                                    <?php }
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if (isset($_POST['approvedBtn'])) {
    header('refresh:2url=dashboard-withdrawal.php#productConfirmPlace');
} ?>
<script>
    $(document).ready(function() {
        $('#btn_approve').click(function(e) {
            e.preventDefault();
            var with_pro_id = $('#with_pro_id').val();
            var buyer_id = $('#buyer_id').val();
            var amount = $('#amount').val();
            var buyer_name = $('#buyer_name').val();
            $.ajax({
                url: 'phpscripts/withdrawal_process.php',
                method: 'POST',
                data: {
                    with_pro_id: with_pro_id,
                    buyer_id: buyer_id,
                    buyer_name: buyer_name
                },
                success: function(response) {
                    $('#response_with').html(response);
                    location.href = 'delivery_time.php';
                }
            })
            e.reset();
        });
        // $('#btn_approve').click(function(e) {
        //     e.preventDefault();
        //     var with_pro_id = $('#with_pro_id').val();
        //     var buyer_id = $('#buyer_id').val();
        //     var amount = $('#amount').val();
        //     var buyer_name = $('#buyer_name').val();
        //     $.ajax({
        //         url: 'delivery_time.php',
        //         method: 'POST',
        //         data: {
        //             with_pro_id: with_pro_id,
        //             buyer_id: buyer_id,
        //             buyer_name: buyer_name
        //         },
        //         success: function(response_deliv) {
        //             $('#response_deliv').html(response_deliv);
        //             location.href = 'delivery_time.php';
        //         }
        //     })
        // })
        // start Deny Button
        $('#btn_deny').click(function(e) {
            e.preventDefault();
            var with_id = $('#with_id').val();
            $.ajax({
                url: 'phpscripts/denySell.php',
                method: 'POST',
                data: {
                    with_id: with_id
                },
                success: function(responseDeny) {
                    $('#responseDeny').html(responseDeny);
                    location.href = "dashboard-withdrawal.php";
                }
            })
        })

    });
    // Add PayMent Method
    // const addPaymentMethod = document.querySelector('#addPaymentMethod');
    // addPaymentMethod.style = 'background-color:gray'
</script>

<?php require_once "footer.php"; ?>