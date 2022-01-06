<?php
$conn = config();
$category_sql = "SELECT * FROM category";
$stmt = $conn->prepare($category_sql);
$stmt->execute();
while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $rows['cat_id'];
    $name = $rows['cat_name'];
    $image = $rows['cat_image'];
    $total_pro = $rows['cat_total_pro'];
    $at = $rows['created_at'];
    $by = $rows['created_by'];
?>
    <li>
        <a href="category_products.php?cat_id=<?php echo $id;  ?>">
            <?php echo $name; ?>
        </a>
    </li>
<?php } ?>