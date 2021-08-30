<?php
session_start();
if (isset($_COOKIE['ad_id']) && isset($_COOKIE['ad_user']) && isset($_SESSION['user_name'])) {

    session_unset();
    unset($_SESSION['user_name']);
    session_destroy();

    setcookie("ad_id", $enc_ad_id, time() - 60 * 60 * 24, "/", "", "");
    setcookie("ad_user", $enc_ad_name, time() - 60 * 60 * 24, "/", "", "");
    header("location:../login.php?logout_success");
}