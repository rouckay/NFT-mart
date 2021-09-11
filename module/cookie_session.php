<?php 

if (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
    $user_id = base64_decode($_COOKIE['mem_user_id']);
    $user_name = base64_decode($_COOKIE['mem_user_name']);
} elseif (isset($_SESSION['member_id']) || isset($_SESSION['member_user'])) {
    $user_id = $_SESSION['member_id'];
    $user_name = $_SESSION['member_user'];
} else {
    $user_id = -1;
    $user_name = -1;
}