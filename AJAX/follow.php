<?php
require_once('../admin/include/functions.php');
require_once('../admin/include/user_functions.php');
$conn = config();
$sender = $_POST['sender'];
$reciever = $_POST['reciever'];
if ($sender == -1 || $reciever == 0) {
    echo "<div class='alert alert-danger'>Please Sign In First</div>";
} else {
    $dublicateCheck = "SELECT * FROM folllow WHERE sender =:sender AND reciever =:reciever";
    $stmtDublic = $conn->prepare($dublicateCheck);
    $stmtDublic->execute([
        ':sender' => $sender,
        ':reciever' => $reciever
    ]);
    $rowsDubli = $stmtDublic->rowCount();
    if ($rowsDubli >= 1) {
        echo "<div class='alert alert-danger'>Already Followed!</div>";
    } else if ($sender == $reciever) {
        echo "<div class='alert alert-danger'>You Can't Follow Your Self!</div>";
    } else {
        echo "<div class='alert alert-success'>Followed!</div>";
        $follow = "INSERT INTO folllow (sender, reciever)VALUES(:sender, :reciever)";
        $stmt = $conn->prepare($follow);
        $stmt->execute([
            ':sender' => $sender,
            ':reciever' => $reciever
        ]);
    }
}
