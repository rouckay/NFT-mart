<?php
session_start();

if (isset($_SESSION['member_user']) || isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {

    session_destroy();
    unset($_SESSION['member_user']);
    session_unset();
    $de_id = base64_decode($_COOKIE['mem_user_id']);
    $de_name = base64_decode($_COOKIE['mem_user_name']);
    setcookie("mem_user_id", $de_id, time() - 60 * 60 + 24, "/", "", "", true);
    setcookie("mem_user_name", $de_name, time() - 60 * 60 + 24, "/", "", "", true);
}
header('location:../index.php');