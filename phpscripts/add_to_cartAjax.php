<?php
require_once('../admin/include/functions.php');
require_once('../admin/include/user_functions.php');

$conn = config();
$pro_id = $_POST['cart_pro_id'];
$pro_author = $_POST['cart_pro_author'];
$who = $_POST['who_adding_to_cart'];

$add_to_cart_sql = "INSERT INTO marketplace.cart (`pro_id` , `pro_author`, `who_adding_id`) VALUES (:pro_id, :pro_author ,:owner)";
$stmt_cart = $conn->prepare($add_to_cart_sql);
$stmt_cart->execute([
    ':pro_id' => $pro_id,
    ':pro_author' => $pro_author,
    ':owner' => $who
]);
echo '<div class="alert alert-success">Added To Cart Successfully</div>';
if ($add_to_cart_sql) {
} else {
    echo '<div class="alert alert-danger">Try Again Later!</div>';
}
