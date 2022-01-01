<?php
require_once('../admin/include/functions.php');
require_once('../admin/include/user_functions.php');
// $auth =  check_mem();
// $curr_page = basename(__FILE__);

// if ($auth == -1) {

//     header('location:../login.php');
// }

$conn = config();

$pro_id = $_POST['pro_id'];
$author = $_POST['author'];
$buyer_id = $_POST['buyer_id'];
$amount = $_POST['amount'];

$sql_check_dublicate = "SELECT * FROM marketplace.withdrawal WHERE with_pro_id = :with_pro_id";
$stmtCheck = $conn->prepare($sql_check_dublicate);
$stmtCheck->execute([
    ':with_pro_id' => $pro_id
]);
$rows_withD = $stmtCheck->rowCount();
// if ($rows_withD >= 1) {
//     echo "<div class='alert alert-danger'>This Product is Already Exist!</div>";
// } else {
$sql = "INSERT INTO marketplace.withdrawal (with_pro_id, with_pro_author, with_buyer_id, amount) VALUES (:pro_id, :pro_author, :buyer_id, :amount)";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':pro_id' => $pro_id,
    ':pro_author' => $author,
    ':buyer_id' => $buyer_id,
    ':amount' => $amount
]);
// Delete Particulare Product From Cart
$pro_id = $_POST['pro_id'];
$sql_delete_pro_from_cart = "DELETE FROM marketplace.cart WHERE pro_id = :pro_id";
$stmt_del = $conn->prepare($sql_delete_pro_from_cart);
$stmt_del->execute([
    ':pro_id' => $pro_id
]);
header('Refresh:2;url=./dashboard-purchase.php');
echo "<div class='alert alert-success'>You Successful Bought This Product <br/>And Removed From Cart</div>";
// }
