<?php $curr_page = substr(basename(__FILE__), 0, 3);

?>
<?php require_once "header.php"; ?>
<!--================================
            START 404 AREA
    =================================-->
<section class="four_o_four_area section--padding2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <img width="393px" height="447px" src="404/404.gif" alt="404 page">
                <div class="not_found">
                    <h3>Oops! Page Not Found</h3>
                    <a href="index.php" class="btn btn--round btn--default">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================
            END 404 AREA
    =================================-->
<?php require_once "footer.php"; ?>