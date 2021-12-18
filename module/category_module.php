<!-- start aside -->
<aside class="sidebar product--sidebar">
    <div class="sidebar-card card--category">
        <a class="card-title" href="#collapse1" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
            <h4>Categories
                <span class="lnr lnr-chevron-down"></span>
            </h4>
        </a>
        <div class="collapse show collapsible-content" id="collapse1">
            <ul class="card-content">
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
                            <span class="lnr lnr-chevron-right"></span><?php echo $name; ?>

                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- end /.collapsible_content -->
    </div>

    <div class="sidebar-card card--slider">
        <a class="card-title" href="#collapse3" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse3">
            <h4>Filter Products
                <span class="lnr lnr-chevron-down"></span>
            </h4>
        </a>
        <div class="collapse show collapsible-content" id="collapse3">
            <div class="card-content">
                <div class="range-slider price-range"></div>

                <div class="price-ranges">
                    <span class="from rounded">$30</span>
                    <span class="to rounded">$300</span>
                </div>
            </div>
        </div>
    </div>
    <!-- end /.sidebar-card -->
</aside>
<!-- end aside -->