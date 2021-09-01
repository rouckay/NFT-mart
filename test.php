<?php
require_once "header.php";

if (isset($_POST['save_bio'])) {

    $conn = config();
    if (isset($_SESSION['member_id']) || isset($_SESSION['member_user'])) {
        $user_id = $_SESSION['member_id'];
        $user_name = $_SESSION['member_user'];
    } elseif (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
        $user_id = $_COOKIE['mem_user_id'];
        $user_name = $_COOKIE['mem_user_user'];
    } else {
        $user_id = -1;
        $user_name = -1;
    }
    $mem_id = $_POST['mem_id'];
    $bio = $_POST['bio'];
    $bio_sql = "INSERT INTO mem_bio (bio_detail,bio_user_id) VALUES (:detail, :user_id )";
    $stmt = $conn->prepare($bio_sql);
    $stmt->execute([
        ':detail' => $bio,
        ':user_id' => $mem_id
    ]);
}