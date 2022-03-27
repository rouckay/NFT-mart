<?php $curr_page = basename(__FILE__); ?>
<?php require_once "header.php"; ?>
<!-- If your Is Loged In Then Redirect to Home page -->


<!-- END If your Is Loged In Then Redirect to Home page -->
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
                            <a href="#">Login</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Login</h1>
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
            START LOGIN AREA
    =================================-->
<section class="login_area section--padding2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">

                <form action="login.php" id="form" method="POST">
                    <?php if (isset($_POST['btn_mem_sign'])) {
                        $mem_sign = $_POST['frm'];
                        mem_sign($mem_sign);
                    ?>
                        <!-- <div class='alert alert-warning' role='alert'>
                            <span class='alert_icon lnr lnr-warning'></span>
                            <strong>Dear User!</strong> For That You Have To Login First!
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span class='lnr lnr-cross' aria-hidden='true'></span>
                            </button>
                        </div> -->
                    <?php } ?>
                    <div class="cardify login">
                        <!-- end .login_header -->

                        <div class="login--form">
                            <div class="form-group">
                                <label for="user_name">Username</label>
                                <input id="user_name" autofocus name="frm[user_name]" type="text" class="text_field" placeholder="Enter your username...">
                            </div>

                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input id="pass" type="password" name="frm[password]" class="text_field" placeholder="&#128273; Enter your password...">
                            </div>

                            <div class="form-group">
                                <div class="custom-checkbox2">
                                    <input type="checkbox" name="frm[check]" id="opti6" class="" name="filter_opt">
                                    <label for="opti6">
                                        <span class="circle"></span>Remember Me For 24 Hourse</label>
                                </div>
                            </div>
                            <button class="btn btn--md btn--round" id="logBtn" name="btn_mem_sign" type="submit">Login Now</button>
                            <div class="login_assist">
                                <p class="recover">Lost your
                                    <a href="recover-pass.php">username</a> or
                                    <a href="recover-pass.php">password</a>?
                                </p>
                                <p class="signup">Don't have an
                                    <a href="signup.php">account</a>?
                                </p>
                                <p class="signup" style="float:left">Register Company
                                    <a href="signup.php">account</a>?
                                </p>
                                <p>To Activate your Account Click <a href="support.php" class='text-white btn btn-sm btn-primary' style="float: right;">Support</a></p>
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
<script>
    var form = document.querySelector('#form');
    var logBtn = document.querySelector('#logBtn');
    var userE = document.querySelector('#user_name');
    var passForm = document.querySelector('#pass');
    // Form submit EventListener
    events();

    function events() {
        // OnLoad Event
        document.addEventListener('DOMContentLoaded', loadOnLoad);
        userE.addEventListener('blur', validateFields);
        passForm.addEventListener('keyup', validateFields)
        // form.addEventListener('submit', formSubmit);

    }
    // END Form submit EventListener
    // Functions
    // Load ON load fun
    function loadOnLoad() {
        logBtn.disabled = true;
    }
    // Validate UserName
    var errors = document.querySelectorAll('.error');

    function validateFields() {
        validateLength(this)
        if (userE.value !== '' && passForm.value !== '') {
            if (errors.length === 0) {
                logBtn.disabled = false;
            }
        }
    }

    function validateLength(fields) {
        if (fields.value.length > 0) {
            fields.style.border = '1px solid green';
            fields.classList.remove('error');
        } else {
            fields.style.borderBottom = '2px solid red';
            fields.classList.add('error');
        }
    }
</script>
<!--================================
            END LOGIN AREA
    =================================-->
<?php require_once "footer.php"; ?>