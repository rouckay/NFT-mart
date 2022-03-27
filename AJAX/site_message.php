<?php
require_once('../admin/include/functions.php');
require_once('../admin/include/user_functions.php');
$conn = config();
$name = $_POST['user_name'];
$email = $_POST['email'];
$message = $_POST['message'];
$sql = "INSERT INTO site_message (sender_name, senderEmail, message) VALUES (:name, :email, :message)";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':name' => $name,
    ':email' => $email,
    ':message' => $message
]);
if ($sql) {
    echo "<div class='alert alert-success'>Your Message is Successfully Sended To Site OWNER!</div>";
} else {
    echo "<div class='alert alert-danger'>Your Message Could Not Sned!!!</div>";
}
