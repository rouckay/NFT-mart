<?php
require_once('../admin/include/functions.php');
require_once('../admin/include/user_functions.php');
$conn = config();
echo $id = $_POST['id'];
echo $pro_author = $_POST['author'];
$sql = "DELETE FROM favourite WHERE pro_id = :id AND pro_author = :author";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':id' => $id,
    ':author' => $pro_author
]);

if ($sql) {
    echo "Sucess";
} else {
    echo "not Sorry";
}
