<?php $curr_page = basename(__FILE__);
require_once('header.php'); ?>
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
                        <li>
                            <a href="dashboard-statement.html">Statement</a>
                        </li>
                        <li class="active">
                            <a href="#">Invoice</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Invoice</h1>
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
    <!-- end /.dashboard_menu_area -->
    <?php if (isset($_GET['id'])) {
        echo $_GET['id'];
    } else {
        echo "Not Seted";
    } ?>
    <div class="dashboard_contents">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard_title_area">
                        <div class="pull-left">
                            <div class="dashboard__title">
                                <h3>Invoice</h3>
                            </div>
                        </div>

                        <div class="pull-right">
                            <a href="#" class="btn btn--round print_btn">
                                <span class="lnr lnr-printer"></span>Print</a>
                            <a href="#" class="btn btn--round btn--sm">Download</a>
                        </div>
                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="invoice">
                        <div class="invoice__head">
                            <div class="invoice_logo">
                                <img src="images/logo.png" alt="">
                            </div>

                            <div class="info">
                                <h4>Invoice info</h4>
                                <p>Order # MP810094</p>
                            </div>
                        </div>
                        <!-- end /.invoice__head -->

                        <div class="invoice__meta">
                            <div class="address">
                                <h5 class="bold">AazzTech</h5>
                                <p>1355 Market Street, Suite 900</p>
                                <p>San Francisco, CA 94103</p>
                                <p>United States</p>
                            </div>

                            <div class="date_info">
                                <p>
                                    <span>Invoice Date</span>May 05, 2019
                                </p>
                                <p>
                                    <span>Due Date</span>May 10, 2019
                                </p>
                                <p class="status">
                                    <span>Status</span>Sale
                                </p>
                            </div>
                        </div>
                        <!-- end /.invoice__meta -->

                        <div class="invoice__detail">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>AazzTech</th>
                                            <th>Item</th>
                                            <th>License</th>
                                            <th>Unit Cost</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <tr>
                                            <td>03 Jul 2019</td>
                                            <td class="author">AazzTech</td>
                                            <td class="detail">
                                                <a href="#">Multipurpose Blog Template</a>
                                            </td>
                                            <td>Regular</td>
                                            <td>$30</td>
                                            <td>$30</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="pricing_info">
                                <p>Sub - Total amount: $30</p>
                                <p class="bold">Total : $30</p>
                            </div>
                        </div>
                        <!-- end /.invoice_detail -->
                    </div>
                    <!-- end /.invoice -->


                </div>
                <!-- end /.row -->
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

<!--================================
        START FOOTER AREA
    =================================-->
<footer class="footer-area">
    <div class="footer-big section--padding">
        <!-- start .container -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="info-footer">
                        <div class="info__logo">
                            <img src="images/flogo.png" alt="footer logo">
                        </div>
                        <p class="info--text">Nunc placerat mi id nisi interdum they mollis. Praesent pharetra,
                            justo ut scel erisque the mattis,
                            leo quam.</p>
                        <ul class="info-contact">
                            <li>
                                <span class="lnr lnr-phone info-icon"></span>
                                <span class="info">Phone: +6789-875-2235</span>
                            </li>
                            <li>
                                <span class="lnr lnr-envelope info-icon"></span>
                                <span class="info">support@aazztech.com</span>
                            </li>
                            <li>
                                <span class="lnr lnr-map-marker info-icon"></span>
                                <span class="info">202 New Hampshire Avenue Northwest #100, New York-2573</span>
                            </li>
                        </ul>
                    </div>
                    <!-- end /.info-footer -->
                </div>
                <!-- end /.col-md-3 -->

                <div class="col-lg-5 col-md-6">
                    <div class="footer-menu">
                        <h4 class="footer-widget-title text--white">Our Company</h4>
                        <ul>
                            <li>
                                <a href="#">How to Join Us</a>
                            </li>
                            <li>
                                <a href="#">How It Work</a>
                            </li>
                            <li>
                                <a href="#">Buying and Selling</a>
                            </li>
                            <li>
                                <a href="#">Testimonials</a>
                            </li>
                            <li>
                                <a href="#">Copyright Notice</a>
                            </li>
                            <li>
                                <a href="#">Refund Policy</a>
                            </li>
                            <li>
                                <a href="#">Affiliates</a>
                            </li>
                        </ul>
                    </div>
                    <!-- end /.footer-menu -->

                    <div class="footer-menu">
                        <h4 class="footer-widget-title text--white">Help and FAQs</h4>
                        <ul>
                            <li>
                                <a href="#">How to Join Us</a>
                            </li>
                            <li>
                                <a href="#">How It Work</a>
                            </li>
                            <li>
                                <a href="#">Buying and Selling</a>
                            </li>
                            <li>
                                <a href="#">Testimonials</a>
                            </li>
                            <li>
                                <a href="#">Copyright Notice</a>
                            </li>
                            <li>
                                <a href="#">Refund Policy</a>
                            </li>
                            <li>
                                <a href="#">Affiliates</a>
                            </li>
                        </ul>
                    </div>
                    <!-- end /.footer-menu -->
                </div>
                <!-- end /.col-md-5 -->

                <div class="col-lg-4 col-md-12">
                    <div class="newsletter">
                        <h4 class="footer-widget-title text--white">Newsletter</h4>
                        <p>Subscribe to get the latest news, update and offer information. Don't worry, we won't
                            send spam!</p>
                        <div class="newsletter__form">
                            <form action="#">
                                <div class="field-wrapper">
                                    <input class="relative-field rounded" type="text" placeholder="Enter email">
                                    <button class="btn btn--round" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>

                        <!-- start .social -->
                        <div class="social social--color--filled">
                            <ul>
                                <li>
                                    <a href="#">
                                        <span class="fa fa-facebook"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="fa fa-twitter"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="fa fa-google-plus"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="fa fa-pinterest"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="fa fa-linkedin"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="fa fa-dribbble"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- end /.social -->
                    </div>
                    <!-- end /.newsletter -->
                </div>
                <!-- end /.col-md-4 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!-- end /.footer-big -->

    <div class="mini-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright-text">
                        <p>&copy; 2019
                            <a href="#">MartPlace</a>. All rights reserved. Created by
                            <a href="#">AazzTech</a>
                        </p>
                    </div>

                    <div class="go_top">
                        <span class="lnr lnr-chevron-up"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--================================
        END FOOTER AREA
    =================================-->

<!--//////////////////// JS GOES HERE ////////////////-->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0C5etf1GVmL_ldVAichWwFFVcDfa1y_c"></script>
<!-- inject:js -->
<script src="js/vendor/jquery/jquery-1.12.3.js"></script>
<script src="js/vendor/jquery/popper.min.js"></script>
<script src="js/vendor/jquery/uikit.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/chart.bundle.min.js"></script>
<script src="js/vendor/grid.min.js"></script>
<script src="js/vendor/jquery-ui.min.js"></script>
<script src="js/vendor/jquery.barrating.min.js"></script>
<script src="js/vendor/jquery.countdown.min.js"></script>
<script src="js/vendor/jquery.counterup.min.js"></script>
<script src="js/vendor/jquery.easing1.3.js"></script>
<script src="js/vendor/owl.carousel.min.js"></script>
<script src="js/vendor/slick.min.js"></script>
<script src="js/vendor/tether.min.js"></script>
<script src="js/vendor/trumbowyg.min.js"></script>
<script src="js/vendor/waypoints.min.js"></script>
<script src="js/dashboard.js"></script>
<script src="js/main.js"></script>
<script src="js/map.js"></script>
<!-- endinject -->
</body>

</html>