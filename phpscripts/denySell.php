<?php
require_once('../admin/include/functions.php');
require_once('../admin/include/user_functions.php');

$with_id = $_POST['with_id'];
$conn = config();
$sql_delete_with_id = "DELETE FROM withdrawal WHERE with_id =:with_id";
$stmt = $conn->prepare($sql_delete_with_id);
$stmt->execute([
    ':with_id' => $with_id
]);
echo "Request Successfully Deleted";
