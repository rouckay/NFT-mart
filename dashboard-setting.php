<?php $curr_page = basename(__FILE__); ?>
<?php require_once "header.php"; ?>
<?php check_mem();  ?>
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
<section class="dashboard-area">
    <div class="dashboard_menu_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="dashboard_menu">
                        <?php include_once("module/dashboard_nav.php"); ?>
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
                    <div class="dashboard_title_area">
                        <div class="dashboard__title">
                            <h3>Account Settings</h3>
                        </div>
                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
            <?php
            if (isset($_COOKIE['mem_user_id'])) {
                $mem_id = base64_decode($_COOKIE['mem_user_id']);
            } elseif ($_SESSION['member_id']) {
                $mem_id = $_SESSION['member_id'];
            } else {
                $mem_id = -1;
            }

            $conn = config();
            $member_acc_sql = "SELECT * FROM members WHERE mem_id = :id";
            $stmt_acc_set = $conn->prepare($member_acc_sql);
            $stmt_acc_set->execute([
                ':id' => $mem_id
            ]);
            $mem_set_rows = $stmt_acc_set->fetch(PDO::FETCH_ASSOC);
            $id = $mem_set_rows['mem_id'];
            $name = $mem_set_rows['mem_name'];
            $user_name = $mem_set_rows['mem_user_name'];
            $image = $mem_set_rows['mem_image'];
            $email = $mem_set_rows['mem_email'];
            $password = $mem_set_rows['mem_pass'];
            $at = $mem_set_rows['created_at'];

            ?>
            <?php
            if (isset($_POST['up_mem_info'])) {
                $id = $_POST['mem_id'];
                $up_data = $_POST['frm'];
                if ($up_data['password'] != $up_data['confirm_password']) {
                    echo "<div class='alert alert-danger' role='alert'>
                    <span class='alert_icon lnr lnr-danger'></span>
                     '<strong>Oh No!</strong> Sorry, Password Doesn't Match!
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span class='lnr lnr-cross' aria-hidden='true'></span>
                                </button>
                            </div>";
                } else {
                    update_member_info($up_data, $id);
                }
            }
            ?>
            <?php
            if (isset($_GET['success_msg'])) {
                echo "<div class='alert alert-success' role='alert'>
                <span class='alert_icon lnr lnr-checkmark-circle'></span>
                <span class='alert_icon lnr lnr-success'></span>
                 '<strong>Correct!</strong> Done, Your Profile Updated Successfully.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span class='lnr lnr-cross' aria-hidden='true'></span>
                            </button>
                        </div>";
            }
            ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="information_module">
                        <a class="toggle_title" href="#collapse2" role="button" data-toggle="collapse"
                            aria-expanded="false" aria-controls="collapse1">
                            <h4>Personal Information
                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>

                        <form action="dashboard-setting.php" method="POST" class="setting_form">
                            <input type="hidden" name="mem_id" value="<?php echo $id; ?>">
                            <div class="information__set toggle_module collapse show" id="collapse2">
                                <div class="information_wrapper form--fields">
                                    <div class="form-group">
                                        <label for="acname">Account Name
                                            <sup>*</sup>
                                        </label>
                                        <input type="text" name="frm[name]" value="<?php echo $name; ?>"
                                            class="text_field" placeholder="First Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="usrname">Username
                                            <sup>*</sup>
                                        </label>
                                        <input type="text" id="usrname" name="frm[user_name]"
                                            value="<?php echo $user_name; ?>" class="text_field"
                                            placeholder="Account name">
                                        <p>Your MartPlace URL: https://martplace.com/
                                            <span><?php echo $name; ?></span>
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <label for="emailad">Email Address
                                            <sup>*</sup>
                                        </label>
                                        <input type="text" id="emailad" name="frm[email]" value="<?php echo $email; ?>"
                                            class="text_field" placeholder="Email address">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password
                                                    <sup>*</sup>
                                                </label>
                                                <input type="text" value="<?php echo $password; ?>" id="password"
                                                    class="text_field" name="frm[password]" placeholder="Email address">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="conpassword">Confirm Password
                                                    <sup>*</sup>
                                                </label>
                                                <input type="text" id="conpassword" name="frm[confirm_password]"
                                                    class="text_field" placeholder="re-enter password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="text" name="frm[website]" disabled id="website" class="text_field"
                                            placeholder="Website">
                                    </div>

                                    <div class="form-group">
                                        <label for="country">Country
                                            <sup>*</sup>
                                        </label>
                                        <div class="select-wrap select-wrap2">
                                            <select disabled name="country" id="country" class="text_field">
                                                <option value="">Select one</option>
                                            </select>
                                            <span class="lnr lnr-chevron-down"></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="prohead">Profile Heading</label>
                                        <input type="text" disabled id="prohead" class="text_field"
                                            placeholder="Ex: Webdesign & Development Service">
                                    </div>

                                    <div class="form-group">
                                        <label for="authbio">Author Bio</label>
                                        <textarea name="author_bio" disabled id="authbio" class="text_field"
                                            placeholder="Short brief about yourself or your account..."></textarea>
                                    </div>
                                    <div class="dashboard_setting_btn">
                                        <button type="submit" name="up_mem_info" class="btn btn--round btn--md">Save
                                            Change</button>
                                    </div>
                                </div>
                                <!-- end /.information_wrapper -->
                            </div>
                        </form>
                        <!-- end /.information__set -->
                    </div>
                    <!-- end /.information_module -->

                    <div class="information_module">
                        <a class="toggle_title" href="#collapse1" role="button" data-toggle="collapse"
                            aria-expanded="false" aria-controls="collapse1">
                            <h4>Biling Information
                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>

                        <div class="information__set toggle_module collapse" id="collapse1">
                            <div class="information_wrapper form--fields">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="first_name" class="text_field"
                                                placeholder="First Name" value="Ron">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name">last Name
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="last_name" class="text_field" placeholder="last name"
                                                value="Doe">
                                        </div>
                                    </div>
                                </div>
                                <!-- end /.row -->

                                <div class="form-group">
                                    <label for="email">Company Name
                                        <sup>*</sup>
                                    </label>
                                    <input type="text" id="email" class="text_field" placeholder="AazzTech"
                                        value="AazzTech">
                                </div>

                                <div class="form-group">
                                    <label for="email1">Email Adress
                                        <sup>*</sup>
                                    </label>
                                    <input type="text" id="email1" class="text_field" placeholder="Email address"
                                        value="contact@aazztech.com">
                                </div>

                                <div class="form-group">
                                    <label for="country1">Country
                                        <sup>*</sup>
                                    </label>
                                    <div class="select-wrap select-wrap2">
                                        <select name="country" id="country" class="text_field">
                                            <option value="">Select one</option>
                                        </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="address1">Address Line 1</label>
                                    <input type="text" id="address1" class="text_field" placeholder="Address line one">
                                </div>

                                <div class="form-group">
                                    <label for="address2">Address Line 2</label>
                                    <input type="text" id="address2" class="text_field" placeholder="Address line two">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">City / State
                                                <sup>*</sup>
                                            </label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="city" id="city" class="text_field">
                                                    <option value="">Select one</option>
                                                    <option value="dhaka">Dhaka</option>
                                                    <option value="sydney">Sydney</option>
                                                    <option value="newyork">New York</option>
                                                    <option value="london">London</option>
                                                    <option value="mexico">New Mexico</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zipcode">Zip / Postal Code
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="zipcode" class="text_field"
                                                placeholder="zip/postal code">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end /.information__set -->
                    </div>
                    <!-- end /.information_module -->
                </div>
                <!-- end /.col-md-6 -->
                <!-- Image & Cover Photo Uploader -->
                <?php require_once "image_uploader.php"; ?>
                <!-- END Image & Cover Photo Uploader -->
                <!-- end /.information_module -->

                <?php if (isset($_POST['btn_social'])) {
                    $social_data = $_POST['frm'];
                    add_social($social_data);
                } ?>
                <div class="information_module">
                    <a class="toggle_title" href="#collapse5" role="button" data-toggle="collapse" aria-expanded="false"
                        aria-controls="collapse1">
                        <h4>Social Profiles
                            <span class="lnr lnr-chevron-down"></span>
                        </h4>
                    </a>
                    <?php
                    session_cookie($mem_id, $user);
                    $put_so = "SELECT * FROM mem_social_profiles WHERE mem_id=:mem_id";
                    $stmt_so = $conn->prepare($put_so);
                    $stmt_so->execute([
                        ':mem_id' => $mem_id
                    ]);
                    $rows = $stmt_so->fetch(PDO::FETCH_ASSOC);
                    $face = $rows['facebook'];
                    $twit = $rows['twitter'];
                    $goo = $rows['google'];
                    $beh = $rows['behance'];
                    $drib = $rows['dribbble'];

                    ?>
                    <form action="dashboard-setting.php" method="POST">
                        <div class="information__set social_profile toggle_module collapse " id="collapse5">
                            <div class="information_wrapper">
                                <div class="social__single">
                                    <div class="social_icon">
                                        <span class="fa fa-facebook"></span>
                                    </div>

                                    <div class="link_field">
                                        <input type="text" name="frm[facebook]" value="<?php echo $face; ?>"
                                            class="text_field" placeholder="ex: /ahmad">
                                    </div>
                                </div>
                                <!-- end /.social__single -->

                                <div class="social__single">
                                    <div class="social_icon">
                                        <span class="fa fa-twitter"></span>
                                    </div>

                                    <div class="link_field">
                                        <input type="text" name="frm[twitter]" value="<?php echo $twit; ?>"
                                            class="text_field" placeholder="ex: /ahmad">
                                    </div>
                                </div>
                                <!-- end /.social__single -->

                                <div class="social__single">
                                    <div class="social_icon">
                                        <span class="fa fa-google-plus"></span>
                                    </div>

                                    <div class="link_field">
                                        <input type="text" class="text_field" name="frm[google]"
                                            value="<?php echo $goo; ?>" placeholder="ex: /ahmad">
                                    </div>
                                </div>
                                <!-- end /.social__single -->

                                <div class="social__single">
                                    <div class="social_icon">
                                        <span class="fa fa-behance"></span>
                                    </div>

                                    <div class="link_field">
                                        <input type="text" name="frm[behance]" value="<?php echo $beh; ?>"
                                            class="text_field" placeholder="ex: /ahmad">
                                    </div>
                                </div>
                                <!-- end /.social__single -->

                                <div class="social__single">
                                    <div class="social_icon">
                                        <span class="fa fa-dribbble"></span>
                                    </div>

                                    <div class="link_field">
                                        <input type="text" name="frm[dribbble]" value="<?php echo $drib; ?>"
                                            class="text_field" placeholder="ex: /ahmad">
                                    </div>
                                </div>
                                <?php
                                check_social($rows);
                                if ($rows >= 1) {
                                    echo "<div class='alert alert-info' role='alert'>
                                    <span class='alert_icon lnr lnr-info'></span>
                                     '<strong>Dear Saler!</strong> Sorry, You Can Update Your Social Medai Because You Uploaded Before!
                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                    <span class='lnr lnr-cross' aria-hidden='true'></span>
                                                </button>
                                            </div>";
                                } else { ?>

                                <button type="submit" name="btn_social" class="btn btn--sm btn--round"
                                    aria-hidden="true">Add Social Media</button>
                                <?php }
                                ?>
                                <!-- end /.social__single -->
                            </div>
                            <!-- end /.information_wrapper -->
                        </div>
                        <?php //} 
                        ?>
                    </form>
                    <!-- end /.social_profile -->
                </div>
                <!-- end /.information_module -->

                <div class="information_module">
                    <a class="toggle_title" href="#collapse4" role="button" data-toggle="collapse" aria-expanded="false"
                        aria-controls="collapse1">
                        <h4>Email Settings
                            <span class="lnr lnr-chevron-down"></span>
                        </h4>
                    </a>

                    <div class="information__set mail_setting toggle_module collapse" id="collapse4">
                        <div class="information_wrapper">
                            <div class="custom_checkbox">
                                <input type="checkbox" id="opt1" class="" name="mail_rating_reminder" checked>
                                <label for="opt1">
                                    <span class="shadow_checkbox"></span>
                                    <span class="radio_title">Rating Reminders</span>
                                    <span class="desc">Send an email reminding me to rate an item after
                                        purchase</span>
                                </label>
                            </div>
                            <!-- end /.custom-radio -->

                            <div class="custom_checkbox">
                                <input type="checkbox" id="opt2" class="" name="mail_update_noti" checked>
                                <label for="opt2">
                                    <span class="shadow_checkbox"></span>
                                    <span class="radio_title">Item Update Notifications</span>
                                    <span class="desc">Send an email when an item I've purchased is
                                        updated</span>
                                </label>
                            </div>
                            <!-- end /.custom_checkbox -->

                            <div class="custom_checkbox">
                                <input type="checkbox" id="opt3" class="" name="mail_comment_noti" checked>
                                <label for="opt3">
                                    <span class="shadow_checkbox"></span>
                                    <span class="radio_title">Item Comment Notifications</span>
                                    <span class="desc">Send me an email when someone comments on one of my
                                        items</span>
                                </label>
                            </div>
                            <!-- end /.custom_checkbox -->

                            <div class="custom_checkbox">
                                <input type="checkbox" id="opt4" class="" name="mail_item_review_noti" checked>
                                <label for="opt4">
                                    <span class="shadow_checkbox"></span>
                                    <span class="radio_title">Item Review Notifications</span>
                                    <span class="desc">Send me an email when my items are approved or
                                        rejected</span>
                                </label>
                            </div>
                            <!-- end /.custom_checkbox -->

                            <div class="custom_checkbox">
                                <input type="checkbox" id="opt5" class="" name="mail_review_noti" checked>
                                <label for="opt5">
                                    <span class="shadow_checkbox"></span>
                                    <span class="radio_title">Buyer Review Notifications</span>
                                    <span class="desc">Send me an email when someone leaves a review with their
                                        rating</span>
                                </label>
                            </div>
                            <!-- end /.custom_checkbox -->

                            <div class="custom_checkbox">
                                <input type="checkbox" id="opt6" class="" name="mail_support_noti" checked>
                                <label for="opt6">
                                    <span class="shadow_checkbox"></span>
                                    <span class="radio_title">Support Notifications</span>
                                    <span class="desc">Send me emails showing my soon to expire support
                                        entitlements</span>
                                </label>
                            </div>
                            <!-- end /.custom_checkbox -->

                            <div class="custom_checkbox">
                                <input type="checkbox" id="opt7" class="" name="mail_weekly">
                                <label for="opt7">
                                    <span class="shadow_checkbox"></span>
                                    <span class="radio_title">Weekly Summary Emails</span>
                                    <span class="desc">Send me emails showing my soon to expire support
                                        entitlements</span>
                                </label>
                            </div>
                            <!-- end /.custom_checkbox -->

                            <div class="custom_checkbox">
                                <input type="checkbox" id="opt8" class="" name="mail_newsletter">
                                <label for="opt8">
                                    <span class="shadow_checkbox"></span>
                                    <span class="radio_title">MartPlace Newsletter</span>
                                    <span class="desc">Get update about latest news, update and more.</span>
                                </label>
                            </div>
                            <!-- end /.custom_checkbox -->
                        </div>
                        <!-- end /.information_wrapper -->
                    </div>
                    <!-- end /.information_module -->
                </div>
                <!-- end /.information_module -->
            </div>
            <!-- end /.col-md-6 -->

            <div class="col-md-12">
                <div class="dashboard_setting_btn">
                    <button type="submit" class="btn btn--round btn--md">Save Change</button>
                </div>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
        <!-- end /form -->
    </div>
    <!-- end /.container -->
    </div>
    <!-- end /.dashboard_menu_area -->
</section>
<!--================================
            END DASHBOARD AREA
    =================================-->
<?php require_once "footer.php"; ?>