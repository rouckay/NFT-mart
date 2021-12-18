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

$sql = "INSERT INTO marketplace.parchased (pro_id, pro_author, buyer_id) VALUES (:pro_id, :pro_author, :buyer_id)";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':pro_id' => $pro_id,
    ':pro_author' => $author,
    ':buyer_id' => $buyer_id
]);
// Delete Particulare Product From Cart
$pro_id = $_POST['pro_id'];
$sql_delete_pro_from_cart = "DELETE FROM marketplace.cart WHERE pro_id = :pro_id";
$stmt_del = $conn->prepare($sql_delete_pro_from_cart);
$stmt_del->execute([
    ':pro_id' => $pro_id
]);
if ($sql) {
    echo "<div class='alert alert-success'>You Successful Bought This Product <br/>And Removed From Cart</div>";
    header('Refresh:2;url=./dashboard-purchase.php');
} else {
    echo "<div class='alert alert-danger'>No Sorry Try Again</div>";
}
