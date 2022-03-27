<?php $curr_page = basename(__FILE__); ?>
<?php require_once "header.php"; ?>
<!--================================
        START BREADCRUMB AREA
    =================================-->
<section class="breadcrumb-area breadcrumb--center breadcrumb--smsbtl">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page_title">
                    <h3>Contact Us</h3>
                    <p class="subtitle">You came to the right place</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
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
        START AFFILIATE AREA
    =================================-->
<section class="contact-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <!-- start col-md-12 -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h1>How can We
                                <span class="highlighted">Help?</span>
                            </h1>
                            <p>Laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis
                                fugats.
                                Lid est laborum dolo rumes fugats untras.</p>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="contact_tile">
                            <span class="tiles__icon lnr lnr-map-marker"></span>
                            <h4 class="tiles__title">Office Address</h4>
                            <div class="tiles__content">
                                <p>202 New Hampshire Avenue , Northwest #100, New York-2573</p>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-lg-4 col-md-6 -->

                    <div class="col-lg-4 col-md-6">
                        <div class="contact_tile">
                            <span class="tiles__icon lnr lnr-phone"></span>
                            <h4 class="tiles__title">Phone Number</h4>
                            <div class="tiles__content">
                                <p>+(0) 789 888 666</p>
                                <p>+(0) 789 888 666</p>
                            </div>
                        </div>
                        <!-- end /.contact_tile -->
                    </div>
                    <!-- end /.col-lg-4 col-md-6 -->

                    <div class="col-lg-4 col-md-6">
                        <div class="contact_tile">
                            <span class="tiles__icon lnr lnr-inbox"></span>
                            <h4 class="tiles__title">Phone Number</h4>
                            <div class="tiles__content">
                                <p>support@nijat.com</p>
                                <p>support@nijta.com</p>
                            </div>
                        </div>
                        <!-- end /.contact_tile -->
                    </div>
                    <!-- end /.col-lg-4 col-md-6 -->

                    <div class="col-md-12">
                        <div class="contact_form cardify">
                            <div class="contact_form__title">
                                <h3>Leave Your Messages</h3>
                            </div>

                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <div class="contact_form--wrapper">
                                        <div id="resp"></div>
                                        <form action="" id="messageForm">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" id="user_name" placeholder="Name">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" id="email" placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>

                                            <textarea cols="30" rows="10" id="message" placeholder="Yout text here"></textarea>

                                            <div class="sub_btn">
                                                <button type="submit" id="send_btn" class="btn btn--round btn--default">Send
                                                </button>
                                                <img style="margin-left: auto; margin-right:auto; display:none" src="img/heartBeat.gif" id="loading" alt="">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end /.col-md-8 -->
                            </div>
                            <!-- end /.row -->
                        </div>
                        <!-- end /.contact_form -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>

<!-- Start /.map -->
<div id="map"></div>
<!-- end /.map -->
<!------------------------------------------------ Script ---------------------------------------------------------->
<script>
    var form = document.querySelector('#messageForm');
    var btn = document.querySelector('#send_btn');
    var user_name = document.querySelector('#user_name');
    var email = document.querySelector('#email');
    var message = document.querySelector('#message');
    var img = document.querySelector('#loading');
    // EventListener
    events();

    function events() {
        document.addEventListener('DOMContentLoaded', loadOnLoad);
        user_name.addEventListener('blur', validateField);
        email.addEventListener('blur', validateField);
        message.addEventListener('blur', validateField);
    }
    // functions 
    // -------------------------load on load-----------------------------
    function loadOnLoad() {
        btn.disabled = true;
    }
    // ----------------------------validate Length ---------------------
    function validateLength(length) {
        if (length.value === '') {
            length.classList.add('error');
            length.style.borderBottom = '1px solid red';
        } else {
            length.classList.remove('error');
            length.style.borderBottom = '1px solid green';
        }
    }
    // ----------------------------END validate Length ---------------------
    // ------------------------- Validate Fields ------------------------
    function validateField() {
        validateLength(this);
        var errors = document.querySelectorAll('.error');
        if (user_name.value !== '' && email.value !== '' && message.value !== '') {
            if (errors.length === 0) {
                btn.disabled = false;
            }
        } else {
            btn.disabled = true;
        }
    }
    // -------------- JQuery -----------------
    $(document).ready(function() {
        $('#send_btn').click(function(e) {
            e.preventDefault();
            var user_nameA = $('#user_name').val();
            var EmailA = $('#email').val();
            var messageA = $('#message').val();
            $.ajax({
                method: 'POST',
                url: 'AJAX/site_message.php',
                data: {
                    user_name: user_nameA,
                    email: EmailA,
                    message: messageA
                }
            }).done(function(resp) {
                $('#messageForm')[0].reset();
                var sendBtn = document.querySelector('#send_btn');
                img.style.display = 'block';
                setTimeout(() => {
                    $('#resp').html(resp);
                    img.style.display = 'none';
                }, 2000);
            });
        });
    });
    // -------------- END JQuery -----------------
</script>
<!--------------------- END Script ------------------------------------------------------>
<?php require_once "footer.php"; ?>