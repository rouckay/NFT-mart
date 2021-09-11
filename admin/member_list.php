<?php require_once "include/header.php"; ?>

<?php require_once "include/sidebar.php"; ?>

<!-- Content Wrapper -->
<?php include_once("include/top_navbar.php"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">ALL Member List</h1>
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
                            <!-- <th>Details</th> -->
                            <th>Image</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <!-- <th>Details</th> -->
                            <th>Image</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $conn = config();
                        $fetch_pro_ad = "SELECT * FROM members";
                        $stmt_pro = $conn->prepare($fetch_pro_ad);
                        $stmt_pro->execute();
                        while ($row_pro = $stmt_pro->fetch(PDO::FETCH_ASSOC)) {
                            $id = $row_pro['mem_id'];
                            $name = $row_pro['mem_name'];
                            $user_name = $row_pro['mem_user_name'];
                            $image = $row_pro['mem_image'];
                            $email = $row_pro['mem_email'];
                            $at = $row_pro['created_at'];
                        ?>
                        <tr>
                            <th><?php echo $id; ?></th>
                            <th><?php echo $name; ?></th>
                            <!-- <th><?php // echo substr($detail, 0, 20); 
                                            ?></th> -->
                            <th><img class="rounded-circle" width="50px" height="50px"
                                    src="img/member_avatars/<?php echo $name; ?>/<?php echo $image; ?>"></th>
                            <th><?php echo $user_name; ?></th>
                            <th><?php echo $email; ?></th>
                            <th><?php echo $at; ?></th>
                            <th><a href="" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i> </a></th>
                            <th><a href="" class="btn btn-info btn-circle"><i class="fa fa-edit"></i> </a></th>
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