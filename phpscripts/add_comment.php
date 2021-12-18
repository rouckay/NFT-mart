<?php
require_once('../admin/include/functions.php');

$mem_id = $_POST['mem_id'];
$author = $_POST['author'];
$pro_id = $_POST['pro_id'];
$comment = $_POST['comment'];

echo $response = "\n successful added Your Comment";

$conn = config();
$add_com_sql = "INSERT INTO marketplace.comments (com_pro_id, com_pro_author, com_detail, com_sender_id) VALUES (:pro_id, :com_pro_auth, :detail, :sender_id)";
$stmt = $conn->prepare($add_com_sql);
$stmt->execute([
    ':pro_id' => $pro_id,
    ':com_pro_auth' => $author,
    ':detail' => $comment,
    ':sender_id' => $mem_id
]);
