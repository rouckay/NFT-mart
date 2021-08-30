<?php
if (isset($_POST['save'])) {
    $conn = config();
    $name = $_POST['name'];
    // $image = $_FILES['wallpaper']['name'];
    $inser_wall = "INSERT INTO background_img (name , wallpaper) VALUES (:name,:wall)";
    $stmt_wall = $conn->prepare($inser_wall);
    $stmt_wall->execute([
        ':name' => $name,
        ':wall' => "Google"
    ]);
}