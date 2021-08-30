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
    <p class="mb-4">Please Fill the Boxes by The Correct Values.<a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <?php
            if (isset($_POST['btn_cat'])) {
                $image = $_FILES['cat_image'];
                $data_cat = $_POST['frm'];
                add_cat($data_cat, $image);
            }
            ?>

            <?php
            if (isset($success_added)) {
                echo "<p class='alert alert-success'>{$success_added}</p>'";
            }
            ?>
            <form action="add_cat.php" method="POST" enctype="multipart/form-data">
                <!-- New Code -->
                <div class="form-row">
                    <div class="form-group col-4">
                        <h6>Name</h6>
                        <input name="frm[cat_name]" class="form-control" required type="text" placeholder="Name Here" />
                    </div>
                    <div class="input-group col-4" style="margin-top:25px;">
                        <div class="custom-file">
                            <input type="file" name="cat_image" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Skin image</label>
                        </div>
                    </div>
                    <div class="form-group col-4">
                        <h6>Author</h6>
                        <input required name="author" class="form-control" type="text" disabled
                            placeholder="<?php
                                                                                                                if (isset($_COOKIE['ad_id'])) {
                                                                                                                    echo $admin['ad_user_name'];
                                                                                                                } elseif (isset($_SESSION['user_name'])) {
                                                                                                                    echo $_SESSION['user_name'];
                                                                                                                } ?>" />
                    </div>
                </div>
                <div class="form-row">
                    <button class="btn btn-primary" type="submit" name="btn_cat">Save Category</button>
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