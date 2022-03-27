<?php
require_once('../admin/include/functions.php');
require_once('../admin/include/user_functions.php');

$mem_id = $_POST['mem_id'];
$author = $_POST['author'];
$pro_id = $_POST['pro_id'];
$comment = $_POST['comment'];


$conn = config();
$add_com_sql = "INSERT INTO marketplace.comments (com_pro_id, com_pro_author, com_detail, com_sender_id) VALUES (:pro_id, :com_pro_auth, :detail, :sender_id)";
$stmt = $conn->prepare($add_com_sql);
$stmt->execute([
    ':pro_id' => $pro_id,
    ':com_pro_auth' => $author,
    ':detail' => $comment,
    ':sender_id' => $mem_id
]);

echo "<p class='alert alert-success text-center'>Sign In Successfully!</p>";

$authorData = mem_pro_author($author);
foreach ($authorData as $authInfo) {
    $authId = $authInfo['mem_id'];
    $sqlNotif = "INSERT INTO notification (notificationFor,notificationFrom, pro_id,type) VALUES (:notifFor,:notifFrom,:pro_id,:type)";
    $stmtNotif = $conn->prepare($sqlNotif);
    $stmtNotif->execute([
        ':notifFor' => $authId,
        ':notifFrom' => $mem_id,
        ':pro_id' => 0,
        ':type' => "Comment"
    ]);
}
