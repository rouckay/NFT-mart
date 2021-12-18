<?php require_once "include/header.php"; ?>

<?php require_once "include/sidebar.php"; ?>

<!-- Content Wrapper -->
<?php include_once("include/top_navbar.php"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <?php if (isset($_GET['deleted'])) {
    ?>
    <div class="alert alert-success" role="alert">
        <span class="alert_icon lnr lnr-success"></span>
        <span class='alert_icon lnr lnr-checkmark-circle'></span>
        <strong>Yes!</strong> You Have Successfully Deleted Category.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="lnr lnr-cross" aria-hidden="true"></span>
        </button>
    </div>
    <?php  } elseif (isset($_GET['update_success'])) { ?>
    <div class="alert alert-success" role="alert">
        <span class="alert_icon lnr lnr-success"></span>
        <span class='alert_icon lnr lnr-checkmark-circle'></span>
        <strong>Oh Yes!</strong> Category Successfully Update.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="lnr lnr-cross" aria-hidden="true"></span>
        </button>
    </div>
    <?php } ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <!-- <th>Details</th> -->
                            <th>Author</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Total Products</th>
                            <th>Status</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <!-- <th>Details</th> -->
                            <th>Author</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Total Products</th>
                            <th>Status</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $conn = config();
                        $cat_sql = "SELECT * FROM category";
                        $stmt_cat = $conn->prepare($cat_sql);
                        $stmt_cat->execute();
                        while ($rows = $stmt_cat->fetch(PDO::FETCH_ASSOC)) {
                            $id = $rows['cat_id'];
                            $name = $rows['cat_name'];
                            $image = $rows['cat_image'];
                            $total_pro = $rows['cat_total_pro'];
                            $status = $rows['status'];
                            $at = $rows['created_at'];
                            $by = $rows['created_by'];

                        ?>
                        <tr>
                            <th><?php echo $name; ?></th>
                            <!-- <th><?php // echo substr($detail, 0, 20); 
                                            ?></th> -->
                            <th><?php echo $by;
                                    ?></th>
                            <th><img class="rounded-circle" width="50px" height="50px"
                                    src="img/cat_image/<?php echo $name; ?>/<?php echo $image; ?>">
                            </th>
                            <th><?php echo $at;
                                    ?></th>
                            <th><?php echo $total_pro;
                                    ?></th>
                            <th><?php if ($status == 'publish') {
                                        echo "<p class='alert alert-success'><span class='alert_icon lnr lnr-checkmark-circle'></span>$status</p>";
                                    } elseif ($status == 'draft') {
                                        echo "<p class='alert alert-danger'>$status</p>";
                                    } ?></th>
                            <th>
                                <form action="./include/user_functions.php" method="POST">
                                    <input type="hidden" name="cat_id" value="<?php echo $id; ?>">
                                    <button type="submit" name="del_cat" class="btn btn-danger btn-circle"><i
                                            class="fa fa-trash"></i> </button>
                                </form>
                            </th>
                            <!-- Edit Category -->
                            <th>
                                <form action="edit_cat.php" method="POST">
                                    <input type="hidden" name="cat_id" value="<?php echo $id; ?>">
                                    <button type="submit" name="go_catlist" class="btn btn-info btn-circle"><i
                                            class="fa fa-edit"></i></button>
                                </form>
                            </th>
                        </tr>
                        <?php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script>

</script>
</div>
<!-- End of Main Content -->

<?php require_once "include/footer.php"; ?>