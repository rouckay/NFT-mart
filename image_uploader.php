<?php error_reporting(0); ?>
<!-- Member Images Uploader -->
<?php
if (isset($_COOKIE['mem_user_id'])) {
    $mem_id = base64_decode($_COOKIE['mem_user_id']);
} elseif ($_SESSION['member_id']) {
    $mem_id = $_SESSION['member_id'];
} else {
    $mem_id = -1;
}
$conn = config();
$mem_user = "SELECT * FROM members WHERE mem_id = :id";
$stmt_u = $conn->prepare($mem_user);
$stmt_u->execute([
    ':id' => $mem_id
]);
$mem_rows = $stmt_u->fetch(PDO::FETCH_ASSOC);
$mem_image_profile = $mem_rows['mem_image'];
$mem_user_name = $mem_rows['mem_user_name'];
?>
<div class="col-lg-6">
    <div class="information_module">
        <a class="toggle_title" href="#collapse3" role="button" data-toggle="collapse" aria-expanded="false"
            aria-controls="collapse1">
            <h4>Profile Image & Cover
                <span class="lnr lnr-chevron-down"></span>
            </h4>
        </a>
        <?php if (isset($_POST['upload_cover'])) {
            $mem_user_name = $_POST['mem_user_name'];
            $cover_data = $_FILES['cover_photo']['name'];
            upload_cover($cover_data, $mem_user_name);
        } ?>

        <form action="dashboard-setting.php" method="POST" enctype="multipart/form-data">
            <div class="information__set profile_images toggle_module collapse" id="collapse3">
                <div class="information_wrapper">
                    <div class="profile_image_area">
                        <img width="100px" height="100px"
                            src="admin/img/member_avatars/<?php echo $mem_user_name; ?>/<?php echo $mem_image_profile; ?>"
                            alt="Author profile area">
                        <div class="img_info">
                            <p class="bold">Profile Image</p>
                            <p class="subtitle">JPG, GIF or PNG 100x100 px</p>
                        </div>

                        <label for="cover_photo" class="upload_btn">
                            <input type="file" name="cover_photo" id="cover_photo">
                            <span class="btn btn--sm btn--round" aria-hidden="true">Choose Image</span>
                        </label>
                    </div>

                    <div class="prof_img_upload">
                        <p class="bold">Cover Image</p>
                        <!-- images/cvrplc.jpg -->
                        <?php
                        $conn = config();
                        $us = "SELECT * FROM members WHERE mem_id = :id";
                        $stmt_m = $conn->prepare($us);
                        $stmt_m->execute([
                            ':id' => $mem_id
                        ]);
                        $row = $stmt_m->fetch(PDO::FETCH_ASSOC);
                        $mem_user_name_from_table = $row['mem_user_name'];
                        $cov = "SELECT * FROM member_cover_photo WHERE mem_user_name= :name LIMIT 0,1";
                        $stmt_co = $conn->prepare($cov);
                        $stmt_co->execute([
                            ':name' => $mem_user_name_from_table
                        ]);
                        while ($rows_co = $stmt_co->fetch(PDO::FETCH_ASSOC)) {
                            $cover_image = $rows_co['cover_image'];
                            $user_name = $rows_co['mem_user_name'];
                        ?>
                        <img width="300px" height="200px"
                            src="admin/img/member_cover_photo/<?php echo $mem_user_name; ?>/<?php echo $cover_image; ?>"
                            alt="<?php echo $mem_user_name; ?>">
                        <?php } ?>
                        <input type="hidden" name="mem_user_name" value="<?php echo $mem_user_name; ?>">
                        <div class="upload_title">
                            <p>JPG, GIF or PNG 750x370 px</p>
                            <label for="dp" class="upload_btn">
                                <button name="upload_cover" class="btn btn--sm btn--round" aria-hidden="true">Upload
                                    Image</button>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- END Member Images Uploader -->