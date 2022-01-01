<?php
require_once('../admin/include/functions.php');
require_once('../admin/include/user_functions.php');
?>
<?php
$mem_id_resp = $_POST['mem_idUpBio'];
$memUpdateBio = $_POST['bioUpdateTextBox'];
$conn = config();
if (!empty($_POST['bioUpdateTextBox'])) {
    $sqlUpdate = "UPDATE mem_bio SET bio_detail = :bioDetail WHERE bio_user_id = :bio_user_id ";
    $stmtUpB = $conn->prepare($sqlUpdate);
    $stmtUpB->execute([
        ':bioDetail' => $memUpdateBio,
        ':bio_user_id' => $mem_id_resp
    ]);
    echo "<div class='alert alert-success' >Your Bio Successfully Updated: $memUpdateBio</div>";
} else {
    echo "Please The Box And Try Again";
}
