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
    <?php
    if (isset($_COOKIE['ad_id']) || isset($_COOKIE['ad_user'])) {
        $conn = config();
        $dec_id = base64_decode($_COOKIE['ad_id']);
        $dec_user = base64_decode($_COOKIE['ad_user']);
        $sql_ad = "SELECT * FROM admin WHERE ad_id = :id OR ad_user_name = :name";
        $stmt_ad = $conn->prepare($sql_ad);
        $stmt_ad->execute([
            ':id' => $dec_id,
            ':name' => $dec_user
        ]);
        $admin = $stmt_ad->fetch(PDO::FETCH_ASSOC);
    } else {
    }
    ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">ADD New Category</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">


            <?php
            if (isset($_POST['edit_cat'])) {
                $cat_name = $_POST['cat_name'];
                $status = $_POST['status'];
                $cat_id = $_POST['cat_id'];
                $cat_image = $_FILES['cat_image']['name'];
                edit_cat($cat_name, $status, $cat_id, $cat_image);
                header("location:./categorieslist.php?update_success");
            }
            ?>
            <?php
            if (isset($_POST['go_catlist'])) {
                $conn = config();
                $fetch_cat = "SELECT * FROM category WHERE cat_id = :id";
                $stmt_cat = $conn->prepare($fetch_cat);
                $stmt_cat->execute([
                    ':id' => $_POST['cat_id']
                ]);

                $rows_cat = $stmt_cat->fetch(PDO::FETCH_ASSOC);
                $cat_id = $rows_cat['cat_id'];
                $cat_name = $rows_cat['cat_name'];
                $cat_image = $rows_cat['cat_image'];
                $status = $rows_cat['status'];
            }
            ?>
            <form action="edit_cat.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="cat_id" value="<?php echo  $cat_id; ?>">
                <!-- New Code -->
                <div class="form-row">
                    <div class="form-group col-4">
                        <h6>Name</h6>
                        <input type="text" name="cat_name" value="<?php echo $cat_name; ?>" class="form-control"
                            required placeholder="Name Here" />
                    </div>
                    <div class="input-group col-4" style="margin-top:25px;">
                        <select name="status" class="form-select form-select-lg mb-3"
                            aria-label=".form-select-lg example">
                            <option value="publish" <?php echo $status == "publish" ? "selected" : ""; ?>>Publish
                            </option>
                            <option value="draft" <?php echo $status == "draft" ? "selected" : ""; ?>>Draft</option>
                        </select>
                    </div>
                    <div class="input-group col-4" style="margin-top:25px;">
                        <div class="custom-file">
                            <input type="file" name="cat_image" value="<?php echo $cat_image; ?>"
                                class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Skin image</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <button class="btn btn-primary" type="submit" name="edit_cat">Update Category</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php require_once "include/footer.php"; ?>