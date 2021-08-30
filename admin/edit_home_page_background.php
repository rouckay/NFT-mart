<!-- header -->
<?php require_once "include/header.php"; ?>
<!-- ENDheader -->
<?php require_once "include/functions.php"; ?>
<?php require_once "include/user_functions.php" ?>
<?php require_once "include/sidebar.php"; ?>

<!-- Content Wrapper -->
<?php include_once("include/top_navbar.php"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">ADD New Category</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <?php
            if (isset($_POST['edit_home_img']) && !empty($_POST['name'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $status = $_POST['status'];
                $image = $_FILES['image']['name'];
                edit_home_img($id, $name, $status, $image);
                // header("location:./categorieslist.php?update_success");
            }
            ?>


            <?php
            if (isset($_POST['img_id'])) {
                $conn = config();
                $img_id = $_POST['img_id'];
                $fetch_cat = "SELECT * FROM background_img WHERE id = :id";
                $stmt_cat = $conn->prepare($fetch_cat);
                $stmt_cat->execute([
                    ':id' => $img_id
                ]);
                $rows_img = $stmt_cat->fetch(PDO::FETCH_ASSOC);
                $img_id = $rows_img['id'];
                $img_name = $rows_img['name'];
                $img_image = $rows_img['wallpaper'];
                $img_status = $rows_img['status'];
            }
            ?>
            <form action="edit_home_page_background.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="id" value="<?php echo  $img_id; ?>">
                <!-- New Code -->
                <div class="form-row">
                    <div class="form-group col-4">
                        <h6>Name</h6>
                        <input type="text" name="name" value="<?php echo $img_name; ?>" class="form-control" required
                            placeholder="Name Here" />
                    </div>
                    <div class="input-group col-4" style="margin-top:25px;">
                        <select name="status" class="form-select form-select-lg mb-3"
                            aria-label=".form-select-lg example">
                            <option value="publish" <?php echo $img_status == "publish" ? "selected" : ""; ?>>Publish
                            </option>
                            <option value="draft" <?php echo $img_status == "draft" ? "selected" : ""; ?>>Draft</option>
                        </select>
                    </div>
                    <div class="input-group col-4" style="margin-top:25px;">
                        <div class="custom-file">
                            <input type="file" name="image" value="<?php echo $img_image; ?>" class="custom-file-input"
                                id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Background Image</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <button class="btn btn-primary" type="submit" name="edit_home_img">Update Image</button>
                </div>
            </form>

        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php require_once "include/footer.php"; ?>