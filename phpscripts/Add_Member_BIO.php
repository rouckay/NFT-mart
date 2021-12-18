<?php
require_once('../admin/include/functions.php');
require_once('../admin/include/user_functions.php');
?>
<?php


$conn = config();
$mem_id = $_POST['mem_id'];
$bio = $_POST['bio'];
$bio_sql = "INSERT INTO mem_bio (bio_detail,bio_user_id) VALUES (:detail, :user_id )";
$stmt = $conn->prepare($bio_sql);
$stmt->execute([
    ':detail' => $bio,
    ':user_id' => $mem_id
]);
echo "<div class='alert alert-success'>'Your Bio Is added To Your Profile '</div>";
header('refresh:2;url=author.php');
?>