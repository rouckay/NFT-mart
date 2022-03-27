<?php $page = basename(__FILE__);
$ready = explode('.', $page);
$curr_page = strtoupper($ready[0]);
?>
<!-- Header -->
<?php require_once "header.php"; ?>

<!-- END Header -->
<?php // require_once "module/cookie_session.php"; 
?>
<!-- END user ID AND name -->
<!--================================
            START SIGNUP AREA
    =================================-->
<section class="section--padding2 bgcolor">
    <div class="shortcode_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shortcode_module_title">
                        <div class="dashboard__title">
                            <h3>Latest Products</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Products -->
                <?php latestProducts(10); ?>
                <!-- END Products -->
            </div>
        </div>
        <!-- end /.container -->
    </div>

</section>
<!--================================
            END SIGNUP AREA
    =================================-->
<?php require_once "footer.php"; ?>