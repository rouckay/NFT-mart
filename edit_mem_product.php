<?php $curr_page = basename(__FILE__);  ?>
<?php require_once "header.php"; ?>
<?php check_mem(); ?>
<?php session_cookie($mem_id, $user); ?>
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
                            Edit Item</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Edit Item</h1>
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
    <!-- start page edit pro Main Files -->
    <?php if (isset($_POST['btn_edit_pro'])) {
        $conn = config();
        $pro_id = $_POST['pro_id'];
        $pro_query = "SELECT * FROM mem_products WHERE mem_pro_id = :pro_id";
        $stmt_pro = $conn->prepare($pro_query);
        $stmt_pro->execute([
            ':pro_id' => $pro_id
        ]);
        $rows_mem_pro = $stmt_pro->fetch(PDO::FETCH_ASSOC);
        $id = $rows_mem_pro['mem_pro_id'];
        $name = $rows_mem_pro['mem_pro_name'];
        $detail = $rows_mem_pro['mem_pro_detail'];
        $image = $rows_mem_pro['mem_pro_image'];
        $category = $rows_mem_pro['category_id'];
        $tag = $rows_mem_pro['tag'];
        $at = $rows_mem_pro['at'];
        $by = $rows_mem_pro['author'];
        $views = $rows_mem_pro['pro_views'];
        $price = $rows_mem_pro['price'];
    } else {
        header('location:dashboard-manage-item.php');
    }
    ?>
    <!-- END page edit pro Main Files -->
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
            <?php if (isset($_POST['btn_edit_pro'])) {
                $item_data = $_POST['frm'] ?? '0';
                updateMemPro($item_data);
                // uploader_mem_pro($item_data, $image);
                // $image_update = $_FILES['image']['name'];
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
                    <form action="edit_mem_product.php" method="POST" enctype="multipart/form-data">
                        <div class="upload_modules">
                            <div class="modules__title">
                                <h3>Item Name & Description</h3>
                            </div>
                            <!-- end /.module_title -->

                            <div class="modules__content">
                                <div class="form-group">
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
                                                <option value="<?php echo $id; ?>" <?php echo $category == $id ? 'selected' : ''; ?>><?php echo  $cat_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_name">Product Name
                                        <span>(Max 100 characters)</span>
                                    </label>
                                    <input type="text" name="frm[name]" required id="product_name" class="text_field" value="<?php echo $name; ?>" placeholder="Enter your product name here...">
                                </div>
                                <div class="form-group">
                                    <label for="product_name">Product Details
                                        <span>(Max 500 characters)</span>
                                    </label>
                                    <input type="text" name="frm[detail]" value="<?php echo $detail; ?>" required id="product_name" class="text_field" placeholder="Enter your product Detail here...">
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
                            <div class="modules__title">
                                <h3>Upload Files</h3>
                            </div>
                            <!-- end /.module_title -->

                            <div class="modules__content">
                                <div class="form-group">
                                    <div class="upload_wrapper">
                                        <p>Upload Thumbnail
                                            <span>(JPEG or PNG 100x100px)</span>
                                        </p>

                                        <div class="custom_upload">
                                            <label for="thumbnail">
                                                <input type="file" required name="frm[image]" value="<?php echo $image ?>" id="thumbnail" class="files">
                                                <span class="btn btn--round btn--sm">Choose File</span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_upload -->

                                        <div class="progress_wrapper">
                                            <div class="labels clearfix">
                                                <p>Thumbnail.jpg</p>
                                                <span data-width="89">0%</span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                                    <span class="sr-only">0% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.progress_wrapper -->

                                        <span class="lnr upload_cross lnr-cross"></span>
                                    </div>
                                    <!-- end /.upload_wrapper -->
                                </div>
                                <!-- end /.form-group -->
                            </div>
                            <!-- end /.upload_modules -->
                        </div>
                        <!-- end /.upload_modules -->

                        <div class="upload_modules">
                            <div class="modules__title">
                                <h3>Others Information</h3>
                            </div>
                            <!-- end /.module_title -->

                            <div class="modules__content">

                                <div class="row">
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
                                </div>
                                <!-- end /.row -->

                                <div class="form-group">
                                    <label for="tags">Item Tags
                                        <span>(Max 10 tags)</span>
                                    </label>
                                    <input type="text" name="frm[tag]" value="<?php echo $tag; ?>" id="tags" class="text_field" placeholder="Enter your item tags here...">
                                </div>
                            </div>
                            <!-- end /.upload_modules -->
                        </div>
                        <!-- end /.upload_modules -->

                        <div class="upload_modules with--addons">
                            <div class="modules__title">
                                <h3>Others Information</h3>
                            </div>
                            <!-- end /.module_title -->

                            <div class="modules__content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="rlicense">Regular License</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input required type="text" name="frm[price]" id="rlicense" value="<?php echo $price; ?>" class="text_field" placeholder="00.00">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end /.col-md-6 -->
                                </div>
                                <!-- end /.row -->
                            </div>
                            <!-- end /.modules__content -->
                        </div>
                        <!-- end /.upload_modules -->
                        <!-- submit button -->
                        <button type="submit" name="btn_edit_pro" class="btn btn--round btn--fullwidth btn--lg">Submit
                            Your Item for
                            Review</button>
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
                        <!-- end /.sidebar-card -->
                    </aside>
                    <!-- end /.sidebar -->
                </div>
                <!-- end /.col-md-4 -->
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

<?php require_once "footer.php";  ?>