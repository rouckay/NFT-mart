<?php require_once "admin/include/functions.php"; ?>
<?php require_once "admin/include/user_functions.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MartPlace - Complete Online Multipurpose Marketplace HTML Template">
    <meta name="keywords" content="marketplace, easy digital download, digital product, digital, html5">

    <title><?php echo $curr_page; ?></title>
    <script src="js/jquery.js"></script>
    <script src="js/frontscript.js"></script>
    <!-- inject:css -->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/lnr-icon.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/trumbowyg.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/NFTcard.css">
    <link rel="stylesheet" href="style.css">
    <!-- endinject -->
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/icon.png">
</head>
<!-- class  -->

<body class="<?php echo  $curr_page == "dashboard-manage-item.php" ? "preload dashboard-edit" : "preload home1 mutlti-vendor";  ?>">

    <!-- ================================
    START MENU AREA
================================= -->
    <div class="menu-area" id="menu-area">
        <!-- start .top-menu-area -->
        <div class="top-menu-area">
            <!-- start .container -->
            <div class="container">
                <!-- start .row -->
                <div class="row">
                    <!-- start .col-md-3 -->
                    <div class="col-lg-3 col-md-3 col-6 v_middle">
                        <div class="logo">
                            <img src="img/marketplace.png" alt="logo image" id="logo" class="img-fluid">
                        </div>
                    </div>
                    <!-- start .col-md-5 -->
                    <div class="col-lg-8 offset-lg-1 col-md-9 col-6 v_middle">
                        <!-- start .author-area -->

                        <?php include_once('module/member_auth.php'); ?>

                        <!-- end /.mobile_content -->
                    </div>
                    <!-- end /.col-md-5 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end  -->

        <!-- start .mainmenu_area -->
        <div class="mainmenu">
            <!-- start .container -->
            <div class="container">
                <!-- start .row-->
                <div class="row">
                    <!-- start .col-md-12 -->
                    <div class="col-md-12">
                        <div class="navbar-header">
                            <!-- start mainmenu__search -->
                            <div class="mainmenu__search">
                                <form action="search.php" method="POST">
                                    <div class="searc-wrap">
                                        <input type="text" name="s_text" placeholder="Search product">
                                        <button type="submit" name="main_menu_search" class="search-wrap__btn">
                                            <span class="lnr lnr-magnifier"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- start mainmenu__search -->
                        </div>

                        <nav class="navbar navbar-expand-md navbar-light mainmenu__menu">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="has_dropdown">
                                        <a href="index.php">HOME</a>
                                    </li>
                                    <!-- <li class="has_dropdown">
                                        <a href="about.php">About Us</a>
                                    </li> -->
                                    <li class="has_dropdown">
                                        <a href="products.php">Marketplace</a>
                                    </li>
                                    <li class="has_dropdown">
                                        <a href="category.php">categories</a>
                                    </li>
                                    <li>
                                        <a href="auction.php">Auction</a>
                                    </li>
                                    <li>
                                        <a href="contact.php">contact</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var menuArea = document.querySelector('#menu-area');
        var logo = document.querySelector('#logo');

        // logo.onclick = function() {
        // menuArea.classList = 'menu-area menu--style3';
        // }

        logo.addEventListener('mouseover', function() {
            menuArea.classList = 'menu-area menu--style3';
            // menuArea.classList = 'menu-area';
        })
        logo.addEventListener('mouseout', function() {
            menuArea.classList = 'menu-area';
        })
    </script>