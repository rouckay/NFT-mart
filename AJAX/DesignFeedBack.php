<?php
require_once('../admin/include/functions.php');
require_once('../admin/include/user_functions.php');
$conn = config();

if (isset($_POST['designText'])) {
    $sql = "INSERT INTO feedback (design_feed)VALUES(:desginValue)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':desginValue' => $_POST['designText']
    ]);
    echo "<div class='alert alert-primary'>Thank You Your FeedBack Saved: {$_POST['designText']}</div>";
} elseif (isset($_POST['technical'])) {
    $technicalText = $_POST['technical'];
    $TechnicalSql = "INSERT INTO marketplace.feedback (technical_feed )VALUES(:technicalFeed)";
    $stmtTechnical = $conn->prepare($TechnicalSql);
    $stmtTechnical->execute([
        ':technicalFeed' => $technicalText
    ]);
    echo "<div class='alert alert-primary'>Thank You Your Issue Saved:$technicalText";
}
