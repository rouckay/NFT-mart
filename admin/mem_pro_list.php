<?php require_once "include/header.php"; ?>

<?php require_once "include/sidebar.php"; ?>

<!-- Content Wrapper -->
<?php include_once("include/top_navbar.php"); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

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
                            <th>Price</th>
                            <th>Image</th>
                            <th>Author</th>
                            <th>category</th>
                            <th>tag</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <!-- <th>Details</th> -->
                            <th>Price</th>
                            <th>Image</th>
                            <th>Author</th>
                            <th>category</th>
                            <th>Tag</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $conn = config();
                        $fetch_pro_ad = "SELECT * FROM mem_products";
                        $stmt_pro = $conn->prepare($fetch_pro_ad);
                        $stmt_pro->execute();
                        while ($row_pro = $stmt_pro->fetch(PDO::FETCH_ASSOC)) {
                            $id = $row_pro['mem_pro_id'];
                            $name = $row_pro['mem_pro_name'];
                            $detail = $row_pro['mem_pro_detail'];
                            $price = $row_pro['price'];
                            $image = $row_pro['mem_pro_image'];
                            $author = $row_pro['author'];
                            $category = $row_pro['category_id'];
                            $tag = $row_pro['tag'];
                        ?>
                        <tr>
                            <th><?php echo $name; ?></th>
                            <!-- <th><?php // echo substr($detail, 0, 20); 
                                            ?></th> -->
                            <th><?php echo $price; ?></th>
                            <th><img class="rounded-circle" width="50px" height="50px"
                                    src="img/member_product/<?php echo $name; ?>/<?php echo $image; ?>"></th>
                            <th><?php echo $author; ?></th>
                            <th><?php echo $category; ?></th>
                            <th><?php echo $tag; ?></th>
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