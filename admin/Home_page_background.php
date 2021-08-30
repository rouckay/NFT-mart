<?php require_once "include/header.php"; ?>
<?php require_once "include/sidebar.php"; ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php require_once "include/top_navbar.php"; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <?php
            if (isset($_POST['save'])) {
                $name = $_POST['name'];
                $image = $_FILES['wallpaper']['name'];
                background_image_add($name, $image);
            }
            ?>
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Change Homepage Background Image</h1>
            </div>
            <div class="row">
                <!-- Dropdown Card Example -->
                <div class="card shadow mb-4">

                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Upload Background Image</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <?php ?>
                    <div class="card-body">
                        <span id="success_message"></span>
                        <form method="POST" id="sample_form" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <h6>Name</h6>
                                    <input name="name" class="form-control" required type="text"
                                        placeholder="Name Here" />
                                </div>
                                <div class="input-group col-4" style="margin-top:25px;">
                                    <div class="custom-file">
                                        <input type="file" name="wallpaper" class="custom-file-input"
                                            id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Skin image</label>
                                    </div>
                                </div>
                                <div class="form-group col-4" style="margin-top: 24px;">
                                    <button class="btn btn-primary form-control" type="submit" name="save" value="save"
                                        id="save">Save Image</button>
                                </div>
                            </div>
                        </form>
                        <div class="form-group" style="display: none;" id="process">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" id="process"
                                    role="progressbar" style="width: 0%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#image" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="image">
                    <h6 class="m-0 font-weight-bold text-primary">Current Image</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="image">
                    <div class="card-body">
                        <div class="bg_image_holder">
                            <?php
                            $conn = config();
                            $sql_image = "SELECT * FROM background_img";
                            $stmt_img = $conn->prepare($sql_image);
                            $stmt_img->execute();
                            while ($rows_img = $stmt_img->fetch(PDO::FETCH_ASSOC)) {
                                $name_image = $rows_img['name'];
                                $background_image = $rows_img['wallpaper'];
                            ?>
                            <img width="500px" height="280px"
                                src="img/home_bg_image/<?php echo $name_image; ?>/<?php echo $background_image; ?>"
                                alt="background-image">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <!-- <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                    aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">WallPaper List</h6>
                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body"> -->
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
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Trash</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Trash</th>
                                        <th>Edit</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $conn = config();
                                    $sql_image = "SELECT * FROM background_img";
                                    $stmt_img = $conn->prepare($sql_image);
                                    $stmt_img->execute();
                                    $total_rows = $stmt_img->rowCount();
                                    if ($total_rows <= 0) {
                                        $no_image = "Sorry You Do Note Have Home Page Wallpaper Please Upload It!";
                                    } elseif ($total_rows >= 1) {
                                        while ($rows_img = $stmt_img->fetch(PDO::FETCH_ASSOC)) {
                                            $id = $rows_img['id'];
                                            $name_image = $rows_img['name'];
                                            $background_image = $rows_img['wallpaper'];
                                            $status = $rows_img['status'];
                                    ?>
                                    <?php  ?>
                                    <tr>
                                        <th><?php echo $name_image; ?></th>
                                        <th><img class="rounded-circle" width="50px" height="50px"
                                                src="img/home_bg_image/<?php echo $name_image; ?>/<?php echo $background_image; ?>">
                                        </th>
                                        <th> <a href="" class="btn btn-info btn-circle"><i class="fa fa-sign"></i></a>
                                        </th>
                                        <th>
                                            <?php
                                                    if (isset($_POST['delete_home_img'])) {
                                                        $id = $_POST['img_id'];
                                                        delete_home_background($id);
                                                    }
                                                    ?>
                                            <form method="POST" action="Home_page_background.php">
                                                <input type="hidden" value="<?php echo $id; ?>" name="img_id">
                                                <button type="submit" name="delete_home_img"
                                                    class="btn btn-danger btn-circle"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </th>
                                        <th>
                                            <form action="edit_home_page_background.php" method="POST">
                                                <input type="hidden" value="<?php echo $id; ?>" name="img_id">
                                                <button type="submit" name="edit_home_img"
                                                    class="btn btn-info btn-circle"><i class="fa fa-edit"></i></button>
                                            </form>
                                        </th>
                                    </tr>
                                    <?php }
                                    } ?>
                                    <?php if (isset($no_image)) {
                                        echo "<div class='alert alert-danger' role='alert'>
                                                    <span class='alert_icon lnr lnr-danger'></span>
                                                     <strong>Oh No!</strong> {$no_image}
                                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                    <span class='lnr lnr-cross' aria-hidden='true'></span>
                                                                </button>
                                                            </div>";
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END Table -->
                <!-- </div>
                    </div>
            </div> -->
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

<script>
$(document).ready(function() {
    $('#sample_form').on('submit', function(event) {
        // event.preventDefault();
        // $.ajax({
        //     URL: "process.php",
        //     method: "POST",
        //     date: $(this).serialize(),
        //     beforeSend: function() {
        //         $('#save').attr('disabled', 'disabled');
        //         $('#process').css('display', 'block');
        //     },
        //     success: function(data) {
        //         var percentage = 0;

        //         var timer = setInterval(function() {
        //             percentage = percentage + 70;
        //             progress_bar_process(percentage, timer);
        //         }, 2000);
        //     }
        // })
    });

    function progress_bar_process(percentage, timer) {
        $('.progress-bar').css('width', percentage + '%');
        if (percentage > 100) {
            clearInterval(timer);
            $('#sample_form')[0].reset();
            $('#process').css('diskplay', 'none');
            $('.progress-bar').css('width', '0%');
            $('#save').attr('disable', false);
            $('#success_message').html("<div class='alert alert'>Image Saved Thank you</div>");
            setTimeOut(function() {
                $('#success').html('');
            }, 5000);
        }
    }
});
</script>
</div>
<!-- End of Main Content -->
<?php require_once "include/footer.php"; ?>