<?php $curr_page = basename(__FILE__);
require_once('header.php'); ?>
<section class="section--padding2 bgcolor">
    <div class="container">
        <div class="row">
            <div class="col-md-12">



                <div class="shortcode_modules">
                    <div class="modules__title">
                        <h3>Support</h3>
                    </div>
                    <div class="myPanel">&#128161; When You Send Issue We Will Give you Response In Th FAQ Bellow If Your Probleme Not Solve Then We Are Solve Indevidual For You.</div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="modules__content center">
                                <button class="btn btn-lg inline"><span class="fa fa-user"></span> Contact Developer</button>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="modules__content center">
                                <button class="btn btn-lg inline">&#127970; Register Campany</button>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="modules__content center">
                                <div class="inline">
                                    <a href="#" id="drop2" class="dropdown-toggle btn btn--bordered btn-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Select Issue <span class="fa fa-arrow-down"></span>
                                    </a>

                                    <ul class="custom_dropdown messaging_dropdown dropdown-menu" aria-labelledby="drop2">
                                        <li>
                                            <button class='btn btn-sm' id="designIssue">
                                                &#127752; Design Issue
                                            </button>
                                        </li>
                                        <li>
                                            <button id="technicalIssueBtn" class="btn btn-sm">
                                                <span>&#128736;</span> Technical Issue</button>
                                        </li>
                                        <li>
                                            <button class="btn btn-sm">
                                                <span>&#10004;</span> Account Activation</button>
                                        </li>
                                        <li>
                                            <button class="btn btn-sm">
                                                <span>&#10067;</span> Other</button>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Design Issue TextBox -->

                                <div id="inputDesignIssue" style="display: none;">
                                    <span id="responseDesign"></span>
                                    <label for=""><span id="closeDesignInput">&#10060;</span> Please Explain What is Wrong With Design </label>
                                    <input type="text" id="designText" class='form-control'><br>
                                    <button id="save_desing" class="btn btn-sm">Send To Designer:</button>
                                </div>
                                <!-- ***********END Design Issue TextBox -->
                                <!-- Technical Issue TextBox -->
                                <div id="inputTechnicalIssue" style="display: none;">
                                    <div id="techResp"></div>
                                    <label for=""><span id="closeTechnicalInput">&#10060;</span> Please Explain Technical Issue</label>
                                    <input type="text" id="technical" class='form-control'><br>
                                    <button class="btn btn-sm" id="button">Send Support</button>
                                </div>
                                <!-- ************ END Technical Issue TextBox -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shortcode_modules">
                    <div class="modules__title">
                        <h3>&#128161; Support Also Include &#129302; bot Answer</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-8 offset-md-2 col-sm-12">
                            <div class="shortcode_modules">
                                <div class="modules__content">
                                    <div class="panel-group accordion" role="tablist" id="accordion">
                                        <div class="panel accordion__single" id="panel-one">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse1" class="collapsed" aria-expanded="false" data-target="#collapse1" aria-controls="collapse1">
                                                        <span>&#129302; How To Add My First Product?</span>
                                                        <i class="lnr lnr-chevron-down indicator"></i>
                                                    </a>
                                                </h4>
                                            </div>

                                            <div id="collapse1" class="panel-collapse collapse" aria-labelledby="panel-one" data-parent="#accordion">
                                                <div class="panel-body">
                                                    <p>Simply Login In Into Your Account ->dashboard->upload Item.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.accordion__single -->
                                        <div class="panel accordion__single" id="panel-two">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse2" class="collapsed" aria-expanded="false" data-target="#collapse2" aria-controls="collapse2">
                                                        <span>&#129302; How To See My Purchase And Saled history?</span>
                                                        <i class="lnr lnr-chevron-down indicator"></i>
                                                    </a>
                                                </h4>
                                            </div>

                                            <div id="collapse2" class="panel-collapse collapse" aria-labelledby="panel-two" data-parent="#accordion">
                                                <div class="panel-body">
                                                    <p>Pretty easy Login->dashboard->Statements Menu.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.accordion__single -->
                                        <div class="panel accordion__single" id="panel-three">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse3" class="collapsed" aria-expanded="false" data-target="#collapse3" aria-controls="collapse3">
                                                        <span>How to create an account on DigiPro?</span>
                                                        <i class="lnr lnr-chevron-down indicator"></i>
                                                    </a>
                                                </h4>
                                            </div>

                                            <div id="collapse3" class="panel-collapse collapse" aria-labelledby="panel-three" data-parent="#accordion">
                                                <div class="panel-body">
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceleris
                                                        que the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis.
                                                        Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                                                        apparel, butcher. Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                        justo ut sceleris que the mattis, leo quam aliquet congue placerat mi id
                                                        nisi interdum mollis. Aliquip placeat salvia cillum iphone. Seitan aliquip
                                                        quis cardigan american apparel, butcher .</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.accordion__single -->
                                        <div class="panel accordion__single" id="panel-four">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse4" class="collapsed" aria-expanded="false" data-target="#collapse4" aria-controls="collapse4">
                                                        <span>How to write the changelog for theme updates?</span>
                                                        <i class="lnr lnr-chevron-down indicator"></i>
                                                    </a>
                                                </h4>
                                            </div>

                                            <div id="collapse4" class="panel-collapse collapse" aria-labelledby="panel-four" data-parent="#accordion">
                                                <div class="panel-body">
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceleris
                                                        que the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis.
                                                        Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                                                        apparel, butcher. Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                        justo ut sceleris que the mattis, leo quam aliquet congue placerat mi id
                                                        nisi interdum mollis. Aliquip placeat salvia cillum iphone. Seitan aliquip
                                                        quis cardigan american apparel, butcher .</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.accordion__single -->
                                        <div class="panel accordion__single" id="panel-five">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse5" class="collapsed" aria-expanded="false" data-target="#collapse5" aria-controls="collapse5">
                                                        <span>Do you recommend using a download manager software?</span>
                                                        <i class="lnr lnr-chevron-down indicator"></i>
                                                    </a>
                                                </h4>
                                            </div>

                                            <div id="collapse5" class="panel-collapse collapse" aria-labelledby="panel-five" data-parent="#accordion">
                                                <div class="panel-body">
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceleris
                                                        que the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis.
                                                        Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                                                        apparel, butcher. Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                        justo ut sceleris que the mattis, leo quam aliquet congue placerat mi id
                                                        nisi interdum mollis. Aliquip placeat salvia cillum iphone. Seitan aliquip
                                                        quis cardigan american apparel, butcher .</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.accordion__single -->
                                        <div class="panel accordion__single" id="panel-six">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse6" class="collapsed" aria-expanded="false" data-target="#collapse6" aria-controls="collapse6">
                                                        <span>&#129302; How to purchase an item on DigiPro?</span>
                                                        <i class="lnr lnr-chevron-down indicator"></i>
                                                    </a>
                                                </h4>
                                            </div>

                                            <div id="collapse6" class="panel-collapse collapse" aria-labelledby="panel-six" data-parent="#accordion">
                                                <div class="panel-body">
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceleris
                                                        que the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis.
                                                        Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                                                        apparel, butcher. Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                        justo ut sceleris que the mattis, leo quam aliquet congue placerat mi id
                                                        nisi interdum mollis. Aliquip placeat salvia cillum iphone. Seitan aliquip
                                                        quis cardigan american apparel, butcher .</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.accordion__single -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end .col-md-6 -->
            </div>
            <!-- end .row -->
        </div>
        <!-- end .container -->
</section>
<script>
    // *****************Design Issue JS
    const designIssue = document.querySelector('#designIssue');
    const inputDesignIssue = document.querySelector('#inputDesignIssue');
    const closeDesignInput = document.querySelector('#closeDesignInput');
    designIssue.addEventListener('click', showDesignIssueTextBox);
    closeDesignInput.addEventListener('click', closeDesignFunc);

    function closeDesignFunc() {
        inputDesignIssue.setAttribute('style', 'display:none');
    }

    function showDesignIssueTextBox() {
        inputDesignIssue.setAttribute('style', 'display:true');
    }
    //********************** */ END Design Issue JS
    //********************** */ Technical Issue JS
    const technicalIssueBtn = document.querySelector('#technicalIssueBtn');
    const inputTechnicalIssue = document.querySelector('#inputTechnicalIssue')
    const closeTechnicalInput = document.querySelector('#closeTechnicalInput');
    technicalIssueBtn.addEventListener('click', technicalIssueFunc)
    closeTechnicalInput.addEventListener('click', technicalCloseFun);

    function technicalCloseFun() {
        inputTechnicalIssue.setAttribute('style', 'display:none');
    }

    function technicalIssueFunc() {
        inputTechnicalIssue.setAttribute('style', 'display:true');
    }
    //********************** */ END Technical Issue JS
    // AJAX
    $(document).ready(function() {
        $('#save_desing').click(function(e) {
            var designText = $('#designText').val();
            e.preventDefault();
            $.ajax({
                url: 'AJAX/DesignFeedBack.php',
                method: 'POST',
                data: {
                    designText: designText
                },
                success: function(responseDesignFeed) {
                    $('#responseDesign').html(responseDesignFeed);
                }
            });
        });
        $('#button').click(function(e) {
            e.preventDefault();
            var technical = $('#technical').val();
            $.ajax({
                url: 'AJAX/DesignFeedBack.php',
                method: 'POST',
                data: {
                    technical: technical
                },
                success: function(techResp) {
                    $('#techResp').html(techResp);
                }
            });
        })
    });
    // END AJAX
</script>
<?php require_once('footer.php'); ?>