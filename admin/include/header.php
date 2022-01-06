<?php include_once("functions.php"); ?>
<?php include_once("user_functions.php"); ?>

<?php
if (isset($_COOKIE['ad_id']) || isset($_COOKIE['ad_user'])) {
    $conn = config();
    $user_id = base64_decode($_COOKIE['ad_id']);
    $user_name = base64_decode($_COOKIE['ad_user']);
    $ad_sql = 'SELECT * FROM admin WHERE ad_id = :id OR ad_user_name = :name';
    $stmt_ad = $conn->prepare($ad_sql);
    $stmt_ad->execute([
        ':id' => $user_id,
        ':name' => $user_name
    ]);
} else {
}
?>
<?php
if (isset($_SESSION['user_name']) ||  isset($_COOKIE['ad_user']) || isset($_COOKIE['ad_id'])) {
    //echo Normal
} else {
    header("location:./login.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>NIJAT</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">