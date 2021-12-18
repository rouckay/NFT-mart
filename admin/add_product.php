<!-- header -->
<?php require_once "include/header.php"; ?>
<!-- ENDheader -->
<?php include_once("include/functions.php"); ?>
<?php include_once("include/user_functions.php"); ?>
<?php require_once "include/sidebar.php"; ?>

<!-- Content Wrapper -->
<?php include_once("include/top_navbar.php"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">ADD New Product</h1>
    <p class="mb-4">Here are Some Skins.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <?php
            if (isset($_POST['btn_pro'])) {
                $conn = config();
                $dir = "img/product/";
                $name  = $_POST['name'];
                mkdir($dir . $name);
                $detail  = $_POST['detail'];
                $price  = $_POST['price'];
                $category  = $_POST['category'];
                $image  = $_FILES['image']['name'];
                $tem_name = $_FILES['image']['tmp_name'];
                // $ex = explode(".", $image);
                // $ext = end($ex);
                // $NewName = $name . "." . $ext;
                $to = $dir . $name . "/" . $image;
                move_uploaded_file($tem_name, $to);
                $author  = $_POST['author'];
                $tag  = $_POST['tag'];
                $pro_add = "INSERT INTO products (pro_name, pro_detail, pro_price, pro_image, pro_author, pro_category_id, pro_tag) VALUES (:name, :detail,:price, :image,:author,:category,:tag)";
                $stmt = $conn->prepare($pro_add);
                $stmt->execute([
                    ':name' => $name,
                    ':detail' => $detail,
                    ':price' => $price,
                    ':category' => $category,
                    ':image' => $image,
                    ':author' => $author,
                    ':tag' => $tag
                ]);
            }
            ?>

            <?php
            if (isset($success_added)) {
                echo "<p class='alert alert-success'><span class='alert_icon lnr lnr-checkmark-circle'></span>
                {$success_added}</p>'";
            }
            ?>
            <form action="add_product.php" method="POST" enctype="multipart/form-data">
                <!-- New Code -->
                <div class="form-row">
                    <div class="form-group col-6">
                        <h6>Name</h6>
                        <input name="name" class="form-control" type="text" placeholder="Name Here" />
                    </div>
                    <div class="form-group col-6">
                        <h6>Details</h6>
                        <input name="detail" class="form-control" type="text" placeholder="Details" />
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <h6>Price</h6>
                        <input name="price" class="form-control" type="number" placeholder="Price" />
                    </div>
                    <div class="input-group col-6" style="margin-top:25px;">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Skin image</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <h6>Author</h6>
                        <input name="author" class="form-control" type="text" placeholder="Author" />
                    </div>

                    <div class="form-group col-6">
                        <h6>Category</h6>
                        <!-- NEw -->
                        <label for="category">Select Category</label>
                        <div class="form-group">
                            <select name="category" id="category" class="form-select form-select-lg mb-3"
                                aria-label=".form-select-lg example">
                                <?php $conn = config();
                                $cat_pro_sql = "SELECT * FROM category WHERE status = :status ";
                                $cat_stmt = $conn->prepare($cat_pro_sql);
                                $cat_stmt->execute([
                                    ':status' => 'publish'
                                ]);
                                while ($cat_rows = $cat_stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $cat_id = $cat_rows['cat_id'];
                                    $cat_name = $cat_rows['cat_name'];
                                ?>
                                <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <span class="lnr lnr-chevron-down"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <h6>tag</h6>
                        <input name="tag" class="form-control" type="text" placeholder="tag" />
                    </div>
                </div>

                <div class="form-row">
                    <button class="btn btn-primary" type="submit" name="btn_pro">Save Product</button>
                </div>
                <?php
                // echo '<pre>';
                // print_r($_POST);
                ?>
            </form>



        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php require_once "include/footer.php"; ?>