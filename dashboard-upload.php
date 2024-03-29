<?php $curr_page = basename(__FILE__);  ?>
<?php require_once "header.php"; ?>
<?php check_mem(); ?>
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
                            <a href="<?php echo $curr_page; ?>">Upload Item</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Upload Item</h1>
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
            <!-- Messaging -->
            <?php if (isset($_GET['success_added'])) {
                echo "<div class='alert alert-success' role='alert'>
                <span class='alert_icon lnr lnr-checkmark-circle'></span>
                <span class='alert_icon lnr lnr-success'></span>
                 '<strong>Correct!</strong> Your Product Successfully Uploaded.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span class='lnr lnr-cross' aria-hidden='true'></span>
                            </button>
                        </div>";
            } ?>
            <!-- END Messaging -->
            <!-- Item Upload Start -->
            <?php if (isset($_POST['btn_uploade'])) {
                $item_data = $_POST['frm'];
                $image = $_FILES['image']['name'];
                uploader_mem_pro($item_data, $image);
            }  ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard_title_area">
                        <div class="pull-left">
                            <div class="dashboard__title">
                                <h3>Upload Your Item</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <form action="dashboard-upload.php" method="POST" enctype="multipart/form-data">
                        <div class="upload_modules">
                            <div class="modules__title">
                                <h3>Item Name & Description</h3>
                            </div>
                            <!-- end /.module_title -->

                            <div class="modules__content">
                                <!-- row first Two Column -->
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 co-sm-12 col-xs-12">
                                        <label for="product_name">Product Name
                                            <span>(Max 100 characters)</span>
                                        </label>
                                        <input type="text" name="frm[name]" required autofocus id="product_name" class="text_field" placeholder="Enter your product...">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12 co-sm-12 col-xs-12">
                                        <label for="category">Select Category</label>
                                        <div class="select-wrap select-wrap2">
                                            <select name="frm[category]" required id="category" class="text_field">
                                                <?php
                                                $conn = config();
                                                $cat_sql = "SELECT * FROM category WHERE status = :status";
                                                $stmt_uplo = $conn->prepare($cat_sql);
                                                $stmt_uplo->execute([
                                                    ':status' => 'publish'
                                                ]);
                                                while ($rows_cat = $stmt_uplo->fetch(PDO::FETCH_ASSOC)) {
                                                    $id = $rows_cat['cat_id'];
                                                    $cat_name = $rows_cat['cat_name'];
                                                ?>
                                                    <option value="<?php echo $id; ?>"><?php echo  $cat_name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="lnr lnr-chevron-down"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 co-sm-12 col-xs-12">
                                        <label for="product_name">Product Details
                                            <span>(Max 500 characters)</span>
                                        </label>
                                        <input type="text" name="frm[detail]" required id="product_name" class="text_field" placeholder="Enter your product name here...">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12 co-sm-12 col-xs-12">
                                        <label for="product_name">Expire Date
                                            <span>(Max 500 characters)</span>
                                        </label>
                                        <input type="date" name="frm[expireDate]" required id="product_name" class="text_field" placeholder="Enter your product name here...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="upload_wrapper">
                                        <p>Upload Image
                                            <span>(JPEG or PNG 100x100px)</span>
                                        </p>

                                        <div class="custom_upload">
                                            <label for="thumbnail">
                                                <input type="file" required accept="image/*" name="image" id="thumbnail" class="files">
                                                <span class="btn  btn--sm">Choose Image</span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_upload -->

                                        <div class="progress_wrapper">
                                            <div class="labels clearfix">
                                                <!-- <p>Thumbnail.jpg</p> -->
                                                <span id="valueShower"></span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar" id="progressUpload" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                                    <span class="sr-only"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 co-sm-12 col-xs-12">
                                        <label for="tags">Item Tags
                                            <span>(Max 10 tags)</span>
                                        </label>
                                        <textarea name="frm[tag]" name="tags" id="tags" class="text_field" placeholder="Enter your item tags here..."></textarea>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12 co-sm-12 col-xs-12">
                                        <label for="rlicense">Amount</label>
                                        <div class="input-group">
                                            <input type="text" required name="frm[amount]" id="rlicense" class="text_field" placeholder="0 OR cc OR kg">
                                        </div>
                                        <label for="rlicense">Regular License</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input required type="text" name="frm[price]" id="rlicense" class="text_field" placeholder="00.00">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group no-margin">
                                    <p class="label">Product Description</p>
                                    <div id="trumbowyg-demo"></div>
                                </div> -->
                            </div>
                            <!-- end /.modules__content -->
                        </div>
                        <!-- end /.upload_modules -->

                        <div class="upload_modules module--upload">

                        </div>

                        <!-- <div class="upload_modules"> -->

                        <!-- <div class="modules__content"> -->

                        <!-- <div class="row"> -->
                        <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="columns">Columns</label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="country" id="columns" class="text_field">
                                                    <option value="">Choose Columns</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4+</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>
                                    </div> -->
                        <!-- end /.col-md-6 -->

                        <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dimension">Item Dimensions</label>
                                            <input disabled type="text" id="dimension" class="text_field"
                                                placeholder="Ex: 1920x6000.">
                                        </div>
                                    </div> -->
                        <!-- end /.col-md-6 -->
                        <!-- </div> -->
                        <!-- end /.row -->
                        <!-- <div class="row"> -->
                        <!-- <div class="col-md-6"> -->
                        <!-- <div class="form-group radio-group">
                                            <p class="label">High Resolution</p>
                                            <div class="custom-radio">
                                                <input disabled type="radio" id="yes" class="" name="high_res">
                                                <label for="yes">
                                                    <span class="circle"></span>Yes</label>
                                            </div>

                                            <div class="custom-radio">
                                                <input disabled type="radio" id="no" class="" name="high_res">
                                                <label for="no">
                                                    <span class="circle"></span>no</label>
                                            </div>
                                        </div> -->
                        <!-- </div> -->
                        <!-- end /.col-md-6 -->

                        <!-- <div class="col-md-6"> -->
                        <!-- <div class="form-group radio-group">
                                            <p class="label">Retina Ready</p>
                                            <div class="custom-radio">
                                                <input disabled type="radio" id="ryes" class="" name="retina">
                                                <label for="ryes">
                                                    <span class="circle"></span>Yes</label>
                                            </div>

                                            <div class="custom-radio">
                                                <input disabled type="radio" id="rno" class="" name="retina">
                                                <label for="rno">
                                                    <span class="circle"></span>no</label>
                                            </div>
                                        </div> -->
                        <!-- </div> -->
                        <!-- </div> -->

                        <!-- </div> -->
                        <!-- </div> -->
                        <!-- submit button -->
                        <button type="submit" name="btn_uploade" class="btn btn--round btn--fullwidth btn--lg">Save</button>
                    </form>
                </div>
                <!-- end /.col-md-8 -->

                <div class="col-lg-4 col-md-5">
                    <aside class="sidebar upload_sidebar">
                        <div class="sidebar-card">
                            <div class="card-title">
                                <h3>Quick Upload Rules</h3>
                            </div>

                            <div class="card_content">
                                <div class="card_info">
                                    <h4>Image Upload</h4>
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut
                                        sceleris
                                        que the mattis interdum.</p>
                                </div>

                                <div class="card_info">
                                    <h4>File Upload</h4>
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut
                                        sceleris
                                        que the mattis interdum.</p>
                                </div>

                                <div class="card_info">
                                    <h4>Vector Upload</h4>
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut
                                        sceleris
                                        que the mattis interdum.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end /.sidebar-card -->

                        <div class="sidebar-card">
                            <div class="card-title">
                                <h3>Trouble Uploading?</h3>
                            </div>

                            <div class="card_content">
                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler isque
                                    the
                                    mattis, leo quam aliquet congue.</p>
                                <ul>
                                    <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                    <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                    <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                    <li>Consectetur elit, sed do eiusmod the</li>
                                </ul>
                            </div>
                        </div>
                        <!-- end /.sidebar-card -->

                        <div class="sidebar-card">
                            <div class="card-title">
                                <h3>More Upload Info</h3>
                            </div>

                            <div class="card_content">
                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler isque
                                    the
                                    mattis, leo quam aliquet congue.</p>
                                <ul>
                                    <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                    <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                    <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                    <li>Consectetur elit, sed do eiusmod the</li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const progressUp = document.querySelector('#progressUpload');
    const valueShower = document.querySelector('#valueShower');
    const btnUpload = document.querySelector('#thumbnail');

    btnUpload.addEventListener('click', progress);

    function progress() {
        var progressNum = 0;

        function progr() {
            progressNum++;
            progressUp.setAttribute('style', `width: ${progressNum}%`);
            valueShower.innerHTML = progressNum + ' %';
            if (progressNum == 100) {
                clearInterval(inter);
            }
        }
        var inter = setInterval(progr, 100);
    }
</script>
<?php require_once "footer.php";  ?>