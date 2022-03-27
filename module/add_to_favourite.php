<div class="price_love">
    <?php
    if (isset($_POST['btn_add_fav'])) {
        $fav_pro_id = $_POST['pro_id'];
        $fav_pro_author = $_POST['pro_author'];
        add_to_favourite($fav_pro_id, $fav_pro_author, $mem_id);
    }
    ?>
    <form action="index.php" method="POST">
        <input type="hidden" name="pro_id" value="<?php echo $id; ?>">
        <input type="hidden" name="pro_author" value="<?php echo $author; ?>">
        <p>
            <button type="submit" name="btn_add_fav" class="btn btn--round btn-sm btn-light"><span class="lnr lnr-heart"></span>
            </button>
    </form>
    </p>
</div>