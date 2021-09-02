<?php

function show_hidden_products($mem_user_name)
{
    if (isset($_COOKIE['mem_user_name'])) {
        $mem_user_name = base64_decode($_COOKIE['mem_user_name']);
    } elseif (isset($_SESSION['member_user'])) {
        $mem_user_name = $_SESSION['member_user'];
    } else {
        $user_id = -1;
    }

    $conn = config();
    $sql_hidden_pro = "SELECT * FROM mem_products WHERE author = :author AND status = :status";
    $stmt_hid = $conn->prepare($sql_hidden_pro);
    $stmt_hid->execute([
        ':author' => $mem_user_name,
        ':status' => 'draft'
    ]);
    while ($rows_hid = $stmt_hid->fetch(PDO::FETCH_ASSOC)) {
        $data_pro[] = $rows_hid;
    }
    return $data_pro;
}
?>
<?php




$hid_pros = show_hidden_products($user_id, $mem_user_name);
foreach ($hid_pros as $data) {

?>
<div class="col-lg-4 col-md-6">
    <!-- start .single-product -->
    <div class="product product--card">

        <div class="product__thumbnail">
            <!-- <img width="361px" height="230px"
                                src="admin/img/member_product/<?php //echo $name; 
                                                                ?>/<?php // echo $image; 
                                                                    ?>"
                                alt="Product Image"> -->
            <!-- Image & video Show AND Size: height 450px , width 555px  -->
            <?php
                $exp = explode(".", $data['mem_pro_image']);
                $ext = end($exp);
                if ($ext == "jpg" or $ext == "png" or $ext == "jpeg" or $ext == 'gif') { ?>
            <img height="450px" width="555px"
                src="./admin/img/member_product/<?php echo $data['mem_pro_name']; ?>/<?php echo $data['mem_pro_image']; ?>"
                alt="Product Image">

            <?php } else { ?>
            <video width="100%" height="30%" autoplay muted loop>
                <source
                    src="./admin/img/member_product/<?php echo $data['mem_pro_name']; ?>/<?php echo $data['mem_pro_image']; ?>">
            </video>
            <?php } ?>
            <!-- END Image & video Show -->

            <div class="prod_option">
                <a href="#" id="drop2" class="dropdown-trigger" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="true">
                    <span class="lnr lnr-cog setting-icon"></span>
                </a>

                <div class="options dropdown-menu" aria-labelledby="drop2">
                    <ul>
                        <li>
                            <form>
                                <a href="edit-item.php">
                                    <span class="lnr lnr-pencil"></span>Edit</a>
                            </form>
                        </li>
                        <li>
                            <?php if (isset($_POST['show_products'])) {
                                    $pro_show_id = $_POST['pro_show_id'];
                                    $show_pro_sql = "UPDATE mem_products SET status= :status WHERE mem_pro_id=:pro_id";
                                    $stmt_show = $conn->prepare($show_pro_sql);
                                    $stmt_show->execute([
                                        ':status' => "publish",
                                        ':pro_id' => $data['mem_pro_id']
                                    ]);
                                    header('refresh:0;url=dashboard-manage-item.php');
                                } ?>
                            <form method="POST" action="dashboard-manage-item.php?show_hidden_products">
                                <input type="hidden" name="pro_show_id" value="<?php echo $id; ?>">
                                <button class="btn btn--primary" type="submit" name="show_products">
                                    <span class="lnr lnr-eye"></span>Show Product</button>
                            </form>
                        </li>
                        <li>
                            <?php
                                if (isset($_POST['delete_mem_pro'])) {
                                    $author = $_POST['author'];
                                    $pro_id = $_POST['pro_id'];
                                    delet_mem_pro_from_dash($pro_id, $author);
                                }
                                ?>
                            <form action="dashboard-manage-item.php" method="POST">
                                <input type="hidden" name="pro_id" value="<?php echo $id; ?>">
                                <input type="hidden" name="author" value="<?php echo $by; ?>">
                                <button class="text text-danger" type="submit" name="delete_mem_pro" class="delete">
                                    <span class="lnr lnr-trash"></span>Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end /.product__thumbnail -->

        <div class="product-desc">
            <a href="#" class="product_title">
                <h4><?php echo $data['mem_pro_name']; ?></h4>
            </a>
            <ul class="titlebtm">
                <?php
                    $conn = config();
                    $mem_img_sql = "SELECT * FROM members WHERE mem_id =:id";
                    $stmt_img = $conn->prepare($mem_img_sql);
                    $stmt_img->execute([
                        ':id' => $user_id
                    ]);
                    $rows = $stmt_img->fetch(PDO::FETCH_ASSOC);
                    $user_image = $rows['mem_image'];
                    $mem_name = $rows['mem_user_name'];
                    ?>
                <li>
                    <img class="auth-img" width="30px" height="30px"
                        src="admin/img/member_avatars/<?php echo $mem_name; ?>/<?php echo $user_image; ?>"
                        alt="author image">
                    <p>
                        <a href="#"><?php echo $by; ?></a>
                    </p>
                </li>
                <li class="product_cat">
                    <a href="#">
                        <?php
                            $pro_cat = "SELECT * FROM category WHERE cat_id = :id";
                            $stmt_cat = $conn->prepare($pro_cat);
                            $stmt_cat->execute([
                                ':id' => $category
                            ]);
                            $rows_cat = $stmt_cat->fetch(PDO::FETCH_ASSOC);
                            $cat_name = $rows_cat['cat_name'];
                            ?>
                        <span class="lnr lnr-book"></span><?php echo $cat_name; ?></a>
                </li>
            </ul>

            <p><?php echo $detail; ?>.</p>
        </div>
        <!-- end /.product-desc -->

        <div class="product-purchase">
            <div class="price_love">
                <span>$<?php echo $price; ?></span>
                <p>
                    <span class="lnr lnr-heart"></span> <?php echo rand(0, 400); ?>
                </p>
            </div>
            <div class="sell">
                <p>
                    <span class="lnr lnr-cart"></span>
                    <span>16</span>
                </p>
            </div>
        </div>
        <!-- end /.product-purchase -->
    </div>
    <!-- end /.single-product -->
</div>
<?php } ?>