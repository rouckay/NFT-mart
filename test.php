<?php


$cats_per_page = 6;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == 1) {
        $page_id = 0;
    } else {
        $page_id = ($page * $cats_per_page) - $cats_per_page;
    }
    $total_page = ceil($total_cats / $cats_per_page);
} else {
    $page = 1;
    $page_id = 0;
}

$category_sql = "SELECT * FROM category WHERE status = :status ORDER BY cat_id DESC LIMIT $page_id,$cats_per_page";
$stmt = $conn->prepare($category_sql);
$stmt->execute([
    ':status' => 'publish'
]);



if ($total_cats > $cats_per_page) {
}