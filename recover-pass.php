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
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <a href="#">Recover-Password</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Recover password</h1>
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
<section class="pass_recover_area section--padding2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <form action="#">
                    <div class="cardify recover_pass">
                        <div class="login--header">
                            <p>Please enter the email address for your account. A verification code will be sent to you.
                                Once you have received the verification code, you will be able to choose a new password
                                for your account.</p>
                        </div>
                        <!-- end .login_header -->

                        <div class="login--form">
                            <div class="form-group">
                                <label for="email_ad">Email Address</label>
                                <input id="email_ad" type="text" class="text_field"
                                    placeholder="Enter your email address">
                            </div>

                            <button class="btn btn--md btn--round register_btn" type="submit">Register Now</button>
                        </div>
                        <!-- end .login--form -->
                    </div>
                    <!-- end .cardify -->
                </form>
            </div>
            <!-- end .col-md-6 -->
        </div>
        <!-- end .row -->
    </div>
    <!-- end .container -->
</section>
<!--================================
            END DASHBOARD AREA
    ===============================-->
<?php require_once "footer.php"; ?>