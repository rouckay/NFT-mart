<?php require_once "include/header.php"; ?>

<?php require_once "include/sidebar.php"; ?>

<!-- Content Wrapper -->
<?php include_once("include/top_navbar.php"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <?php if (isset($_GET['deleted'])) { ?>
    <div class="alert alert-success" role="alert">
        <span class="alert_icon lnr lnr-success"></span>
        <span class='alert_icon lnr lnr-checkmark-circle'></span>
        <strong>Oh No!</strong> Member Successfully Deleted.
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User_name</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User_name</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $conn = config();
                        $fetch_mem = "SELECT * FROM members";
                        $stmt_mem = $conn->prepare($fetch_mem);
                        $stmt_mem->execute();
                        while ($fetch_mem_rows = $stmt_mem->fetch(PDO::FETCH_ASSOC)) {
                            $id = $fetch_mem_rows['mem_id'];
                            $name = $fetch_mem_rows['mem_name'];
                            $image = $fetch_mem_rows['mem_image'];
                            $user_name = $fetch_mem_rows['mem_user_name'];
                            $email = $fetch_mem_rows['mem_email'];
                            $at = $fetch_mem_rows['created_at'];
                        ?>
                        <tr>
                            <th><?php echo $id; ?></th>
                            <th><?php echo $name; ?></th>
                            <th><?php echo $email; ?></th>
                            <th><?php echo $user_name; ?></th>
                            <th><img class="rounded-circle" width="50px" height="50px"
                                    src="img/member_avatars/<?php echo $user_name; ?>/<?php echo $image; ?>">
                            </th>
                            <th><?php echo $at;
                                    ?></th>
                            <!-- Delete Button -->
                            <th>
                                <form action="include/user_functions.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <button type="submit" name="btn_del_mem" class="btn btn-danger btn-circle"><i
                                            class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </th>
                            <!-- END Delete Button -->
                            <!-- Edit Button -->
                            <th><a href="" class="btn btn-info btn-circle"><i class="fa fa-edit"></i> </a></th>
                            <!-- END Edit Button -->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php require_once "include/footer.php"; ?>