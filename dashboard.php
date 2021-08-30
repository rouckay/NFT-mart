<?php $curr_page = basename(__FILE__); ?>
<?php require_once "header.php"; ?>
<?php
check_mem();
?>
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
                    </ul>
                </div>
                <h1 class="page-title">Author's Dashboard</h1>
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
                <div class="col-lg-3 col-md-6">
                    <div class="author-info author-info--dashboard mcolorbg4">
                        <p>Total Items</p>
                        <h3>4,369</h3>
                    </div>
                </div>
                <!-- end /.col-md-3 -->

                <div class="col-lg-3 col-md-6">
                    <div class="author-info author-info--dashboard mcolorbg2">
                        <p>Monthly Sales</p>
                        <h3>$273.00</h3>
                    </div>
                </div>
                <!-- end /.col-md-3 -->

                <div class="col-lg-3 col-md-6">
                    <div class="author-info author-info--dashboard mcolorbg3">
                        <p>Yearly Sales</p>
                        <h3>$2,249.00</h3>
                    </div>
                </div>
                <!-- end /.col-md-3 -->

                <div class="col-lg-3 col-md-6">
                    <div class="author-info author-info--dashboard mcolorbg1">
                        <p>Lifetime Sales</p>
                        <h3>$5,583.00</h3>
                    </div>
                </div>
                <!-- end /.col-md-3 -->
            </div>
            <!-- end /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="dashboard_module statistics_module">
                        <div class="dashboard__title">
                            <h4>Sales and Views Statistics</h4>

                            <div class="pull-right">
                                <div id="stat_legend" class="legend"></div>
                                <div class="select-wrap">
                                    <select name="mon" class="period_selector">
                                        <option value="jan">Jan</option>
                                        <option value="feb">Feb</option>
                                        <option value="mar">Mar</option>
                                    </select>
                                    <span class="lnr lnr-chevron-down"></span>
                                </div>
                            </div>
                        </div>

                        <div class="dashboard__content">
                            <canvas id="myChart"></canvas>

                            <div class="statistics_data">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="single_stat_data">
                                            <h4 class="single_stat__title">478</h4>
                                            <p>Total
                                                <span>Sales</span> This Month
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-center col-sm-4">
                                        <div class="single_stat_data">
                                            <h4 class="single_stat__title">$2,478</h4>
                                            <p>Total
                                                <span>Earnings</span> This Month
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-right col-sm-4">
                                        <div class="single_stat_data">
                                            <h4 class="single_stat__title">1,878</h4>
                                            <p>Total
                                                <span>Views</span> This Month
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end /.col-md-12 -->

                <div class="col-lg-6">
                    <div class="dashboard_module chart country_statistics">
                        <div class="dashboard__title">
                            <h4>Country Statistics</h4>
                            <div class="select-wrap">
                                <select name="months" class="period_selector">
                                    <option value="jan">Jan</option>
                                    <option value="feb">Feb</option>
                                    <option value="mar">Mar</option>
                                </select>
                                <span class="lnr lnr-chevron-down"></span>
                            </div>
                        </div>

                        <div class="dashboard__content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Country</th>
                                        <th>Visitors</th>
                                        <th>Sales</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="country_flag">
                                                <img src="images/flam.jpg" alt="Country Flag">
                                            </div>
                                            <span>United States</span>
                                        </td>
                                        <td>546</td>
                                        <td>$230</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="country_flag">
                                                <img src="images/flg2.png" alt="Country Flag">
                                            </div>
                                            <span>United Kingdom</span>
                                        </td>
                                        <td>246</td>
                                        <td>$80</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="country_flag">
                                                <img src="images/flg3.png" alt="Country Flag">
                                            </div>
                                            <span>Canada</span>
                                        </td>
                                        <td>170</td>
                                        <td>$65</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="country_flag">
                                                <img src="images/flg4.png" alt="Country Flag">
                                            </div>
                                            <span>Newzland</span>
                                        </td>
                                        <td>78</td>
                                        <td>$24</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end /.dashboard_module -->
                </div>
                <!-- end /.col-md-6 -->

                <div class="col-lg-6">
                    <div class="dashboard_module visit_data">
                        <div class="dashboard__content">
                            <div class="chart_top">
                                <div class="v_refer">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li>
                                            <a href="#visit_source" class="active" aria-controls="visit_source"
                                                role="tab" data-toggle="tab">Visit Source</a>
                                        </li>
                                        <li>
                                            <a href="#referrals" aria-controls="referrals" role="tab"
                                                data-toggle="tab">Referrals</a>
                                        </li>
                                    </ul>
                                    <div class="select-wrap">
                                        <select name="month" class="period_selector">
                                            <option value="jan">Jan</option>
                                            <option value="feb">Feb</option>
                                            <option value="mar">Mar</option>
                                        </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>

                                <div class="charts">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade show active" id="visit_source">
                                            <canvas id="piechart"></canvas>

                                            <div id="pie-legend" class="legend"></div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade show referrals_data" id="referrals">
                                            <ul>
                                                <li>
                                                    <p class="site">google.com</p>
                                                    <p class="visit">
                                                        <span>visitors:</span>250
                                                    </p>
                                                </li>

                                                <li>
                                                    <p class="site">dribbble.com</p>
                                                    <p class="visit">
                                                        <span>visitors:</span>450
                                                    </p>
                                                </li>

                                                <li>
                                                    <p class="site">behance.com</p>
                                                    <p class="visit">
                                                        <span>visitors:</span>341
                                                    </p>
                                                </li>

                                                <li>
                                                    <p class="site">domain.com</p>
                                                    <p class="visit">
                                                        <span>visitors:</span>98
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.dashboard_module -->
                </div>
                <!-- end /.col-md-6 -->

                <div class="col-lg-8">
                    <div class="dashboard_module recent_sells">
                        <div class="dashboard__title">
                            <h4>Recent Items Sales</h4>

                            <div class="loading">
                                <a href="#">
                                    <span class="lnr lnr-sync"></span>
                                </a>
                            </div>
                        </div>

                        <div class="dashboard__content">
                            <ul>
                                <li>
                                    <div class="single_sell">
                                        <div class="single_sell__thumb-title">
                                            <div class="prod_thumbnail">
                                                <img src="images/prodthumb.png" alt="product thumbnail">
                                            </div>
                                            <div class="prod_title">
                                                <h4>Finance and Consulting Business Theme</h4>
                                                <div class="category">
                                                    <img src="images/catword.png" alt="category">
                                                    <span>Wordpress</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ammount">
                                            <p>$34.25</p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="single_sell">
                                        <div class="single_sell__thumb-title">
                                            <div class="prod_thumbnail">
                                                <img src="images/prodthumb2.jpg" alt="product thumbnail">
                                            </div>
                                            <div class="prod_title">
                                                <h4>Best Free Responsive ReactJS Admin Themes</h4>
                                                <div class="category">
                                                    <img src="images/catword.png" alt="category">
                                                    <span>Wordpress</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ammount">
                                            <p>$34.25</p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="single_sell">
                                        <div class="single_sell__thumb-title">
                                            <div class="prod_thumbnail">
                                                <img src="images/prodthumb3.jpg" alt="product thumbnail">
                                            </div>
                                            <div class="prod_title">
                                                <h4>Best YouTube Channels For UI/UX Designers</h4>
                                                <div class="category">
                                                    <img src="images/catword.png" alt="category">
                                                    <span>Wordpress</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ammount">
                                            <p>$34.25</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end /.dashboard_module -->
                </div>
                <!-- end /.col-md-8 -->


                <div class="col-lg-4">
                    <div class="dashboard_module recent_buyers">
                        <div class="dashboard__title">
                            <h4>Recent Buyers</h4>
                            <div class="loading">
                                <a href="#">
                                    <span class="lnr lnr-sync"></span>
                                </a>
                            </div>
                        </div>

                        <div class="dashboard__content">
                            <ul>
                                <li>
                                    <div class="single_buyer">
                                        <div class="buyer__thumb_title">
                                            <div class="thumb">
                                                <img src="images/buyr1.jpg" alt="Buyer Images">
                                            </div>
                                            <div class="title">
                                                <h4>James Anderson</h4>
                                                <p>United States</p>
                                            </div>
                                        </div>

                                        <div class="price">
                                            <p>$29</p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="single_buyer">
                                        <div class="buyer__thumb_title">
                                            <div class="thumb">
                                                <img src="images/buyr2.png" alt="Buyer Images">
                                            </div>
                                            <div class="title">
                                                <h4>Tarashi Hamada</h4>
                                                <p>Japan</p>
                                            </div>
                                        </div>

                                        <div class="price">
                                            <p>$26</p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="single_buyer">
                                        <div class="buyer__thumb_title">
                                            <div class="thumb">
                                                <img src="images/buyr3.jpg" alt="Buyer Images">
                                            </div>
                                            <div class="title">
                                                <h4>Shah Hossain</h4>
                                                <p>Biplobland</p>
                                            </div>
                                        </div>

                                        <div class="price">
                                            <p>$19</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end /.col-md-4 -->

                <div class="col-lg-6">
                    <div class="dashboard_module recent_comment">
                        <div class="dashboard__title">
                            <h4>Recent Comments</h4>
                        </div>

                        <div class="dashboard__content">
                            <div class="thread">
                                <ul class="media-list thread-list">
                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m1.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <div class="media-heading">
                                                        <a href="author.php">
                                                            <h4>Themexylum</h4>
                                                        </a>
                                                        <span>9 Hours Ago</span>
                                                    </div>
                                                    <span class="comment-tag buyer">Purchased</span>
                                                    <a href="#" class="reply-link">Reply</a>
                                                </div>
                                                <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra,
                                                    justo
                                                    ut sceleris que the mattis.</p>
                                            </div>
                                        </div>

                                        <!-- comment reply -->
                                        <div class="media depth-2 reply-comment">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m2.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea class="bla" name="reply-comment"
                                                        placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--md btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </li>
                                    <!-- end single comment thread /.comment-->

                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m3.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <div class="media-heading">
                                                        <a href="author.html">
                                                            <h4>Fierce Coder</h4>
                                                        </a>
                                                        <span>9 Hours Ago</span>
                                                    </div>
                                                    <a href="#" class="reply-link">Reply</a>
                                                </div>
                                                <p>Nunc placerat mi id nisi interdum mollis. Praesent phare tra, justo
                                                    ut
                                                    sceleris que the mattis, leo quam.</p>
                                            </div>
                                        </div>

                                        <!-- comment reply -->
                                        <div class="media depth-2 reply-comment">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m2.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea name="reply-comment"
                                                        placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--sm btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </li>
                                    <!-- end single comment thread /.comment-->
                                </ul>
                                <!-- end /.media-list -->
                            </div>
                            <!-- end /.comments -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="dashboard_module recent_message">
                        <div class="dashboard__title">
                            <h4>Recent Message</h4>
                            <div class="loading">
                                <a href="#">View All</a>
                            </div>
                        </div>

                        <div class="dashboard__content">
                            <div class="messages">
                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch1">
                                                <label for="ch1">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="avatar">
                                            <img src="images/notification_head4.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>NukeThemes</p>
                                                <span class="lnr lnr-envelope"></span>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hello John Smith! Nunc placerat mi ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->

                                <div class="message">
                                    <div class="message__actions_avatar">
                                        <div class="actions">
                                            <span class="fa fa-star-o"></span>
                                            <div class="custom_checkbox">
                                                <input type="checkbox" id="ch2">
                                                <label for="ch2">
                                                    <span class="shadow_checkbox"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="avatar">
                                            <img src="images/notification_head5.png" alt="">
                                        </div>
                                    </div>
                                    <!-- end /.actions -->

                                    <div class="message_data">
                                        <div class="name_time">
                                            <div class="name">
                                                <p>Crazy Coder</p>
                                                <span class="lnr lnr-envelope"></span>
                                            </div>

                                            <span class="time">Just now</span>
                                            <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                        </div>
                                    </div>
                                    <!-- end /.message_data -->
                                </div>
                                <!-- end /.message -->

                                <div class="message_composer">
                                    <div class="composer_field" id="trumbowyg-demo"></div>
                                    <!-- end /.trumbowyg-demo -->

                                    <div class="attached"></div>

                                    <div class="btns">
                                        <button class="btn send btn--sm btn--round">Reply</button>
                                        <label for="att">
                                            <input type="file" class="attachment_field" id="att" multiple="">
                                            <span class="lnr lnr-paperclip"></span>Attachment</label>
                                    </div>
                                    <!-- end /.message_composer -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end /.col-md-6 -->

                <div class="col-lg-8">
                    <div class="dashboard_module recent_notification">
                        <div class="dashboard__title">
                            <h4>Recent Notification</h4>
                            <div class="loading">
                                <a href="#">View All</a>
                            </div>
                        </div>
                        <div class="dashboard__content">
                            <div class="notifications_module">
                                <div class="notification">
                                    <span class="line"></span>
                                    <div class="notification__info">
                                        <div class="info_avatar">
                                            <img src="images/notification_head.png" alt="">
                                        </div>
                                        <div class="info">
                                            <p>
                                                <span>Anderson</span> added to Favourite
                                                <a href="#">Mccarther Coffee Shop</a>
                                            </p>
                                            <p class="time">Just now</p>
                                        </div>
                                    </div>
                                    <!-- end /.notifications -->

                                    <div class="notification__icons ">
                                        <span class="lnr lnr-heart loved noti_icon"></span>
                                        <span class="lnr lnr-cross"></span>
                                    </div>
                                    <!-- end /.notifications -->
                                </div>
                                <!-- end /.notifications -->

                                <div class="notification">
                                    <div class="notification__info">
                                        <div class="info_avatar">
                                            <img src="images/notification_head2.png" alt="">
                                        </div>
                                        <div class="info">
                                            <p>
                                                <span>Michael Jorden</span> commented on
                                                <a href="#">MartPlace Extension Bundle</a>
                                            </p>
                                            <p class="time">Just now</p>
                                        </div>
                                    </div>
                                    <!-- end /.notifications -->

                                    <div class="notification__icons ">
                                        <span class="lnr lnr-bubble commented noti_icon"></span>
                                        <span class="lnr lnr-cross"></span>
                                    </div>
                                    <!-- end /.notifications -->
                                </div>
                                <!-- end /.notifications -->

                                <div class="notification">
                                    <div class="notification__info">
                                        <div class="info_avatar">
                                            <img src="images/notification_head3.png" alt="">
                                        </div>
                                        <div class="info">
                                            <p>
                                                <span>Khamoka </span>purchased
                                                <a href="#"> Visibility Manager Subscriptions</a>
                                            </p>
                                            <p class="time">Just now</p>
                                        </div>
                                    </div>
                                    <!-- end /.notifications -->

                                    <div class="notification__icons ">
                                        <span class="lnr lnr-cart purchased noti_icon"></span>
                                        <span class="lnr lnr-cross"></span>
                                    </div>
                                    <!-- end /.notifications -->
                                </div>
                                <!-- end /.notifications -->

                                <div class="notification">
                                    <div class="notification__info">
                                        <div class="info_avatar">
                                            <img src="images/notification_head4.png" alt="">
                                        </div>
                                        <div class="info">
                                            <p>
                                                <span>Anderson</span> added to Favourite
                                                <a href="#">Mccarther Coffee Shop</a>
                                            </p>
                                            <p class="time">Just now</p>
                                        </div>
                                    </div>
                                    <!-- end /.notifications -->

                                    <div class="notification__icons ">
                                        <span class="lnr lnr-star reviewed noti_icon"></span>
                                        <span class="lnr lnr-cross"></span>
                                    </div>
                                    <!-- end /.notifications -->
                                </div>
                                <!-- end /.notifications -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="dashboard_module product_que">
                        <div class="dashboard__title">
                            <h4>Product Upload Queue</h4>
                        </div>

                        <div class="dashboard__content">
                            <ul>
                                <li>
                                    <div class="uploaded_product">
                                        <h4>Job Portal HTML Template</h4>
                                        <p>8 days ago</p>
                                    </div>

                                    <a href="#" class="cross" data-toggle="modal" data-target="#myModal">
                                        <span class="lnr lnr-cross"></span>
                                    </a>
                                </li>

                                <li>
                                    <div class="uploaded_product">
                                        <h4>Classic WordPress Blog Theme</h4>
                                        <p>12 days ago</p>
                                    </div>

                                    <a href="#" class="cross" data-toggle="modal" data-target="#myModal">
                                        <span class="lnr lnr-cross"></span>
                                    </a>
                                </li>

                                <li>
                                    <div class="uploaded_product">
                                        <h4>Biplob Vai is Boss Public</h4>
                                        <p>8 days ago</p>
                                    </div>

                                    <a href="#" class="cross" data-toggle="modal" data-target="#myModal">
                                        <span class="lnr lnr-cross"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="dashboard_module single_item_visitor">
                        <div class="dashboard__title">
                            <h4>Single Items Visitors</h4>
                            <div class="pull-right">
                                <div class="select-wrap">
                                    <select name="months" class="period_selector">
                                        <option value="jan">Jan</option>
                                        <option value="feb">Feb</option>
                                        <option value="mar">Mar</option>
                                    </select>
                                    <span class="lnr lnr-chevron-down"></span>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard__content">
                            <canvas id="single_item_visit"></canvas>

                            <div class="item_info">
                                <div class="select-wrap">
                                    <select name="item" class="period_selector">
                                        <option value="mattheme">Material Admin - Responsive Admin Theme</option>
                                        <option value="reactAdmin">Best Free Responsive ReactJS Admin Themes</option>
                                        <option value="design">Best YouTube Channels For UI/UX Designers</option>
                                    </select>
                                    <span class="lnr lnr-chevron-down"></span>
                                </div>

                                <div class="info">
                                    <h4 class="indicate">+60%</h4>
                                    <p>Compared to Last Month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="dashboard_module single_item_visitor">
                        <div class="dashboard__title">
                            <h4>Total Revenue</h4>
                            <div id="visit_legend" class="legend"></div>
                        </div>
                        <div class="dashboard__content">
                            <canvas id="revenue"></canvas>
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
<?php require_once "footer.php"; ?>