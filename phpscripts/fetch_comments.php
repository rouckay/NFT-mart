<?php require_once('../admin/include/functions.php');
$conn = config();
$com_sql = "SELECT * FROM comments WHERE com_pro_id = :com_pro_id AND com_status = :status";
$stmt = $conn->prepare($com_sql);
$stmt->execute([
    ':com_pro_id' => $pro_id,
    ':status' => "pendding"
]);
$count_comment = $stmt->rowCount();
while ($rows_com = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $com_detail[] = $rows_com;
}
return $com_detail;
