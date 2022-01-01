<?php
ob_start();
function config()
{
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "marketplace";
    $conn = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
    return $conn;
}
function add_user($add_user)
{
    $conn = config();
    $insert_us = "INSERT INTO `admin`(`ad_email`, `ad_pass`, `ad_image`,`created_at`, `ad_user_name`) VALUES ( :email ,:pass, :img ,:at,:user)";
    $stmt = $conn->prepare($insert_us);
    $stmt->execute([
        ':email' => $add_user['email'],
        ':pass' => $add_user['password'],
        ':img' => "2.jpg",
        ':at' => "2021/20/1",
        ':user' => $add_user['name']
    ]);
}
