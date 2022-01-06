<?php
require_once('../admin/include/functions.php');
require_once('../admin/include/user_functions.php');
?>
<?php
$conn = config();

$pro_id = $_POST['with_pro_id'];
$buyer_id = $_POST['buyer_id'];
$buyer_name = $_POST['buyer_name'];
$amount = $_POST['amount'];
// $amount = $_POST['']
// $sql_check_dublicate = "SELECT * FROM marketplace.parchased WHERE pro_id = :pro_id";
// $stmtCheck = $conn->prepare($sql_check_dublicate);
// $stmtCheck->execute([
//     ':pro_id' => $pro_id
// ]);
// $rows_withD = $stmtCheck->rowCount();
// if ($rows_withD >= 1) {
// echo "<div class='alert alert-danger'>This Product is Already Exist!</div>";
// } else {
$sql = "INSERT INTO marketplace.parchased (pro_id, pro_author, buyer_id, amount) VALUES (:pro_id, :pro_author, :buyer_id, :amount)";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':pro_id' => $pro_id,
    ':pro_author' => $buyer_name,
    ':buyer_id' => $buyer_id,
    ':amount' => $amount
]);
$delFromWithdrawal = "DELETE FROM marketplace.withdrawal WHERE with_pro_id = :with_pro_id";
$stmt_with = $conn->prepare($delFromWithdrawal);
$stmt_with->execute([
    ':with_pro_id' => $pro_id
]);
if ($sql) {
    $sql_mem_pro = "SELECT * FROM mem_products WHERE mem_pro_id = :mem_pro_id";
    $stmt = $conn->prepare($sql_mem_pro);
    $stmt->execute([
        ':mem_pro_id' => $pro_id
    ]);
    $rowsPro = $stmt->fetch(PDO::FETCH_ASSOC);
    $pro_amount = $rowsPro['pro_amount'];
    // **************** Minuse From Product Stock Amount *****************
    $sqlMinuse = "UPDATE mem_products SET pro_amount =:pro_amount WHERE mem_pro_id = :mem_pro_id";
    $stmt_munuse = $conn->prepare($sqlMinuse);
    $stmt_munuse->execute([
        ':mem_pro_id' => $pro_id,
        ':pro_amount' => $pro_amount - $amount
    ]);
} else {
    // 
}
echo "<div class='alert alert-success' > Congratulation You Got This Product</div>";
// }
?>