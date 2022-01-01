<?php
require_once('../admin/include/functions.php');
require_once('../admin/include/user_functions.php');
?>
<?php
$conn = config();

$pro_id = $_POST['with_pro_id'];
$buyer_id = $_POST['buyer_id'];
$buyer_name = $_POST['buyer_name'];

// $sql_check_dublicate = "SELECT * FROM marketplace.parchased WHERE pro_id = :pro_id";
// $stmtCheck = $conn->prepare($sql_check_dublicate);
// $stmtCheck->execute([
//     ':pro_id' => $pro_id
// ]);
// $rows_withD = $stmtCheck->rowCount();
// if ($rows_withD >= 1) {
// echo "<div class='alert alert-danger'>This Product is Already Exist!</div>";
// } else {
$sql = "INSERT INTO marketplace.parchased (pro_id, pro_author, buyer_id) VALUES (:pro_id, :pro_author, :buyer_id)";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':pro_id' => $pro_id,
    ':pro_author' => $buyer_name,
    ':buyer_id' => $buyer_id
]);
$delFromWithdrawal = "DELETE FROM marketplace.withdrawal WHERE with_pro_id = :with_pro_id";
$stmt_with = $conn->prepare($delFromWithdrawal);
$stmt_with->execute([
    ':with_pro_id' => $pro_id
]);
echo "<div class='alert alert-success' > Congratulation You Got This Product</div>";
// }
?>