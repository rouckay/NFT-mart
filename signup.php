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
                            <a href="#">Signup</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Sign up</h1>
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
            START SIGNUP AREA
    =================================-->
<section class="signup_area section--padding2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <?php if (isset($_POST['btn_mem_up'])) {

                    $signup_data = $_POST['frm'];
                    $avatar = $_FILES['avatar']['name'];
                    if ($signup_data['password'] != $signup_data['confirm']) { ?>
                <div class="alert alert-danger" role="alert">
                    <span class="alert_icon lnr lnr-warning"></span>
                    <strong>Oh No!</strong> The Password Is Not Match!.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                    </button>
                </div>
                <?php } else {
                        signup_member($signup_data, $avatar);
                    }
                } ?>
                <form action="signup.php" method="POST" enctype="multipart/form-data">
                    <div class="cardify signup_form">
                        <div class="login--header">
                            <h3>Create Your Account</h3>
                            <p>Please fill the following fields with appropriate information to register a new MartPlace
                                account.
                            </p>
                        </div>
                        <!-- end .login_header -->

                        <div class="login--form">

                            <div class="form-group">
                                <label for="urname">Your Name</label>
                                <input id="urname" type="text" name="frm[name]" class="text_field"
                                    placeholder="Enter your Name">
                            </div>

                            <div class="form-group">
                                <label for="email_ad">Email Address</label>
                                <input id="email_ad" type="text" name="frm[email]" class="text_field"
                                    placeholder="Enter your email address">
                            </div>

                            <div class="form-group">
                                <label for="user_name">Username</label>
                                <input id="user_name" type="text" name="frm[user_name]" class="text_field"
                                    placeholder="Enter your username...">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" name="frm[password]" class="text_field"
                                    placeholder="Enter your password...">
                            </div>

                            <div class="form-group">
                                <label for="con_pass">Confirm Password</label>
                                <input id="con_pass" type="password" name="frm[confirm]" class="text_field"
                                    placeholder="Confirm password">
                            </div>
                            <!-- Image Upload Start -->
                            <div class="modules__content">
                                <div class="form-group">
                                    <div class="upload_wrapper">
                                        <p>Upload Avatar Thumbnail
                                            <span>(JPEG or PNG 100x100px)</span>
                                        </p>

                                        <div class="custom_upload">
                                            <label for="thumbnail">
                                                <input type="file" name="avatar" id="thumbnail" class="files">
                                                <span class="btn btn--round btn--sm">Choose File</span>
                                            </label>
                                        </div>

                                        <div class="progress_wrapper">
                                            <div class="labels clearfix">
                                                <p>Thumbnail.jpg</p>
                                                <span data-width="89">89%</span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 89%;">
                                                    <span class="sr-only">70% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.progress_wrapper -->

                                        <span class="lnr upload_cross lnr-cross"></span>
                                    </div>
                                </div>
                                <!-- end /.upload_modules -->
                                <button class="btn btn--md btn--round register_btn" type="submit"
                                    name="btn_mem_up">Register
                                    Now</button>

                                <div class="login_assist">
                                    <p>Already have an account?
                                        <a href="login.php">Login</a>
                                    </p>
                                </div>
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
            END SIGNUP AREA
    =================================-->
<?php require_once "footer.php"; ?>