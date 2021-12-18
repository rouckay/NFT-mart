<?php $curr_page = basename(__FILE__); ?>
<!-- Header -->
<?php require_once "header.php"; ?>
<?php if (isset($_GET['id'])) {
    // OK
} else {
    // header("location:products.php");
} ?>
<!-- END Header -->
<?php

// Cookie ID AND session ID

if (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
    $mem_id = base64_decode($_COOKIE['mem_user_id']);
    $user = base64_decode($_COOKIE['mem_user_name']);
} elseif (isset($_SESSION['member_id']) || isset($_SESSION['member_user'])) {
    $mem_id = $_SESSION['member_id'];
    $user = $_SESSION['member_user'];
} else {
    $mem_id = -1;
    $user = -1;
}
$author = $user;
// END Cookie ID AND session ID
// Logined user Info
$logined_user =  mem_pro_author($author);
foreach ($logined_user as $log_data) {
    $user_name = $log_data['mem_user_name'];
    $user_image = $log_data['mem_image'];
}
// END Logined user Info

?>

<!--================================
        START BREADCRUMB AREA
    =================================-->
<?php
$id = $_GET['id'];
$conn = config();
$single = "SELECT * FROM mem_products WHERE mem_pro_id =:id";
$stmt = $conn->prepare($single);
$stmt->execute([
    ':id' => $id
]);
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
$pro_id = $rows['mem_pro_id'];
$name = $rows['mem_pro_name'];
$detail = $rows['mem_pro_detail'];
$image = $rows['mem_pro_image'];
$price = $rows['price'];
$author = $rows['author'];
$category = $rows['category_id'];
$tag = $rows['tag'];
?>
<!-- Product Author Info -->
<?php
$product_author_info =  mem_pro_author($author);
foreach ($product_author_info as $author_val) {
    $author_id = $author_val['mem_id'];
    $author_image = $author_val['mem_image'];
    $author_user_name = $author_val['mem_user_name'];
}
?>
<!-- END Product Author Info -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="active">
                            <a href="#"><?php echo $category;  ?></a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title"><?php echo $name; ?></h1>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<!--================================
        END BREADCRUMB AREA
    =================================-->

<!--============================================
        START SINGLE PRODUCT DESCRIPTION AREA
    ==============================================-->
<section class="single-product-desc">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="item-preview">
                    <div class="item__preview-slider">
                        <div class="prev-slide">

                            <!-- Image & video Show -->
                            <?php
                            $exp = explode(".", $image);
                            $ext = end($exp);
                            if ($ext == "jpg" or $ext == "png" or $ext == "jpeg") { ?>
                                <img width="750px" height="430px" src="admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>" alt="Keep calm this isn't the end of the world, the preview is just missing.">

                            <?php } else { ?>
                                <video width="750px" height="430px" poster="placeholder.png" controls autoplay muted loop>
                                    <source src="./admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>">
                                </video>
                            <?php } ?>
                            <!-- END Image & video Show -->
                        </div>
                        <div class="prev-slide">
                            <img src="images/itprv.jpg" alt="Keep calm this isn't the end of the world, the preview is just missing.">
                        </div>

                        <div class="prev-slide">
                            <img src="images/itprv.jpg" alt="Keep calm this isn't the end of the world, the preview is just missing.">
                        </div>

                        <div class="prev-slide">
                            <img src="images/itprv.jpg" alt="Keep calm this isn't the end of the world, the preview is just missing.">
                        </div>
                        <div class="prev-slide">
                            <img src="images/itprv.jpg" alt="Keep calm this isn't the end of the world, the preview is just missing.">
                        </div>
                        <div class="prev-slide">
                            <img src="images/itprv.jpg" alt="Keep calm this isn't the end of the world, the preview is just missing.">
                        </div>
                    </div>
                    <!-- end /.item--preview-slider -->

                    <div class="item__preview-thumb">
                        <div class="prev-thumb">
                            <div class="thumb-slider">
                                <div class="item-thumb">
                                    <img src="images/thumb1.jpg" alt="This is the thumbnail of the item">
                                </div>
                                <div class="item-thumb">
                                    <img src="images/thumb2.jpg" alt="This is the thumbnail of the item">
                                </div>
                                <div class="item-thumb">
                                    <img src="images/thumb3.jpg" alt="This is the thumbnail of the item">
                                </div>
                                <div class="item-thumb">
                                    <img src="images/thumb4.jpg" alt="This is the thumbnail of the item">
                                </div>
                                <div class="item-thumb">
                                    <img src="images/thumb5.jpg" alt="This is the thumbnail of the item">
                                </div>
                                <div class="item-thumb">
                                    <img src="images/thumb1.jpg" alt="This is the thumbnail of the item">
                                </div>
                                <div class="item-thumb">
                                    <img src="images/thumb2.jpg" alt="This is the thumbnail of the item">
                                </div>
                                <div class="item-thumb">
                                    <img src="images/thumb3.jpg" alt="This is the thumbnail of the item">
                                </div>
                                <div class="item-thumb">
                                    <img src="images/thumb4.jpg" alt="This is the thumbnail of the item">
                                </div>
                                <div class="item-thumb">
                                    <img src="images/thumb5.jpg" alt="This is the thumbnail of the item">
                                </div>
                            </div>
                            <!-- end /.thumb-slider -->

                            <div class="prev-nav thumb-nav">
                                <span class="lnr nav-left lnr-arrow-left"></span>
                                <span class="lnr nav-right lnr-arrow-right"></span>
                            </div>
                            <!-- end /.prev-nav -->
                        </div>

                        <div class="item-action">
                            <div class="action-btns">
                                <a href="#" class="btn btn--round btn--lg">Live Preview</a>
                                <a href="#" class="btn btn--round btn--lg btn--icon">
                                    <span class="lnr lnr-heart"></span>Add To Favorites</a>
                            </div>
                        </div>
                        <!-- end /.item__action -->
                    </div>
                    <!-- end /.item__preview-thumb-->


                </div>
                <!-- end /.item-preview-->

                <div class="item-info">
                    <div class="item-navigation">
                        <ul class="nav nav-tabs">
                            <li>
                                <a href="#product-details" class="active" aria-controls="product-details" role="tab" data-toggle="tab">Item Details</a>
                            </li>
                            <li>
                                <a href="#product-comment" aria-controls="product-comment" role="tab" data-toggle="tab">Comments </a>
                            </li>
                            <li>
                                <a href="#product-review" aria-controls="product-review" role="tab" data-toggle="tab">Reviews
                                    <span>(35)</span>
                                </a>
                            </li>
                            <li>
                                <a href="#product-support" aria-controls="product-support" role="tab" data-toggle="tab">Support</a>
                            </li>
                            <li>
                                <a href="#product-faq" aria-controls="product-faq" role="tab" data-toggle="tab">item
                                    FAQ</a>
                            </li>
                        </ul>
                    </div>
                    <!-- end /.item-navigation -->
                    <?php
                    if (isset($_POST['btn_replay'])) {
                        $com_id = trim($_POST['com_id']);
                        $replay = trim($_POST['replay']);
                        insert_replay($com_id, $author, $mem_id, $replay);
                    }

                    ?>
                    <div class="tab-content">
                        <div class="fade show tab-pane product-tab active" id="product-details">
                            <div class="tab-content-wrapper">
                                <h1><?php echo $name; ?></h1>
                                <p><?php echo $detail; ?>.</p>
                                <h2>Features With Image:</h2>

                                <!-- Image & video Show -->
                                <?php
                                $exp = explode(".", $image);
                                $ext = end($exp);
                                if ($ext == "jpg" or $ext == "png" or $ext == "jpeg") { ?>
                                    <img width="640px" height="400px" src="admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>" alt="This author">

                                <?php } else { ?>
                                    <video poster="placeholder.png" controls autoplay muted loop>
                                        <source src="./admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>">
                                    </video>
                                <?php } ?>
                                <!-- END Image & video Show -->


                            </div>
                        </div>
                        <!-- end /.tab-content -->

                        <div class="fade tab-pane product-tab" id="product-comment">
                            <div class="thread">
                                <ul class="media-list thread-list">
                                    <!-- Comments Area -->
                                    <?php
                                    $count_comments = count_comments($pro_id);
                                    if ($count_comments == '0') { ?>
                                        <div class="card card-header bg-warning text text-white">
                                            <strong>Comments Not Exist
                                            </strong>
                                            This
                                            Product Do
                                            Not Have Comments
                                        </div>
                                        <?php } else {
                                        $com_info = comments($pro_id);
                                        foreach ($com_info as $com_data) {
                                            // check User By ID
                                            $comment_id = $com_data['com_id'];
                                            $mem_user_id = $com_data['com_sender_id'];
                                            $com_sender_inf = mem_pro_author_by_id($mem_user_id);
                                            foreach ($com_sender_inf as $sender_info) {
                                                $sender_name = $sender_info['mem_user_name'];
                                                $sender_image = $sender_info['mem_image'];
                                            }
                                            // END check User By ID

                                        ?>
                                            <input type="hidden" id="pro_id_fetch_com" name="pro_id_fetch_com" value="<?php echo $pro_id ?>">
                                            <?php
                                            ?>
                                            <!-- END Comments Area -->
                                            <li class="single-thread">
                                                <!-- Comments -->
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object rounded-circle" width="50px" height="50px" src="admin/img/member_avatars/<?php echo $sender_name; ?>/<?php echo $sender_image; ?>" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div>
                                                            <div class="media-heading">
                                                                <a href="author.html">
                                                                    <h4><?php echo $sender_name; ?></h4>
                                                                </a>
                                                                <span><?php echo $com_data['com_date']; ?></span>
                                                            </div>
                                                            <span class="comment-tag buyer">Purchased</span>
                                                            <a href="#" class="reply-link">Reply</a>
                                                        </div>
                                                        <p><?php echo $com_data['com_detail']; ?>. </p>
                                                    </div>
                                                </div>
                                                <!-- nested comment markup -->
                                                <?php
                                                // $get_replay = get_replay($com_id);
                                                $conn = config();
                                                $get_replay_sql = "SELECT * FROM replay WHERE com_pro_id = :com_pro_id";
                                                $stmt = $conn->prepare($get_replay_sql);
                                                $stmt->execute([
                                                    ':com_pro_id' => $comment_id
                                                ]);
                                                while ($rows_replay = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    $comment_replay = $rows_replay['com_replay'];
                                                    $replay_date = $rows_replay['replay_date'];
                                                    // return $result;
                                                    // foreach ($get_replay as $com_replay_data) {
                                                    //     echo  $all_replay = $com_replay_data['com_replay'];
                                                    // }
                                                ?>
                                                    <ul class="children">
                                                        <li class="single-thread depth-2">
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object rounded" src="admin/img/member_avatars/<?php echo $author; ?>/<?php echo $author_image; ?>" alt="Commentator Avatar">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="media-heading">
                                                                        <h4>AazzTech</h4>
                                                                        <span><?php echo $replay_date; ?></span>
                                                                    </div>
                                                                    <span class="comment-tag author">Author</span>
                                                                    <p><?php echo $comment_replay; ?>. </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                <?php } ?>
                                                <!-- comment reply -->

                                                <div class="media depth-2 reply-comment">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="images/m2.png" alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <?php
                                                        if ($mem_id == '-1' || $user == '-1') { ?>
                                                            <div class="text text-warning"><strong>Sorry To Replay</strong>You Have
                                                                To Sign In First</div>
                                                        <?php } else {
                                                        ?>
                                                            <form action="single-product.php?id=<?php echo $id; ?>" method="POST" class="comment-reply-form">
                                                                <input type="text" name="com_id" value="<?php echo $com_data['com_id']; ?>">
                                                                <textarea name="replay" class="bla" placeholder="Write your comment..."></textarea>
                                                                <button class="btn btn--md btn--round" name="btn_replay">Post
                                                                    Comment</button>
                                                            </form>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <!-- comment reply -->
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                    <!-- end single comment thread /.comment-->


                                    <!-- end single comment thread /.comment-->
                                </ul>
                                <!-- end /.media-list -->

                                <div class="pagination-area pagination-area2">
                                    <nav class="navigation pagination" role="navigation">
                                        <div class="nav-links">
                                            <a class="page-numbers current" href="#">1</a>
                                            <a class="page-numbers" href="#">2</a>
                                            <a class="page-numbers" href="#">3</a>
                                            <a class="next page-numbers" href="#">
                                                <span class="lnr lnr-arrow-right"></span>
                                            </a>
                                        </div>
                                    </nav>
                                </div>
                                <!-- end /.comment pagination area -->
                                <?php
                                if ($mem_id == '-1' || $user == '-1') { ?>
                                    <div class="card card-header bg-warning text-white"><strong>To Put
                                            Comment</strong>Please Sign In First <br><a href='login.php' class="btn btn-primary btn-rounded">Sign In</a></div>
                                <?php } else { ?>
                                    <div class="comment-form-area">
                                        <h4>Leave a comment</h4>
                                        <!-- comment reply -->
                                        <!-- add_comment(; -->
                                        <div class="media comment-form">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object rounded-circle" height="50px" width="50px" src="admin/img/member_avatars/<?php echo $user_name; ?>/<?php echo $user_image; ?>" alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form id="comment_form" class="comment-reply-form">
                                                    <input type="hidden" name="pro_id" id="pro_id" value="<?php echo $pro_id; ?>">
                                                    <input type="hidden" name="author" id="author" value="<?php echo $author; ?>">
                                                    <input type="hidden" name="mem_id" id="mem_id" value="<?php echo $mem_id; ?>">
                                                    <textarea name="comment" id="comment" placeholder="Write your comment..."></textarea>
                                                    <button id="btn_add_comment" name="btn_add_comment" class="btn btn--sm btn--round">Post
                                                        Comment</button>
                                                    <!-- </form> -->
                                                    <div id=resp>I will Give you Response</div>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </div>
                                <?php  } ?>
                                <!-- end /.comment-form-area -->
                            </div>
                            <!-- end /.comments -->
                        </div>
                        <!-- end /.product-comment -->

                        <div class="fade tab-pane product-tab" id="product-review">
                            <div class="thread thread_review">
                                <ul class="media-list thread-list">
                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m1.png" alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        <div class="media-heading">
                                                            <a href="author.html">
                                                                <h4>Themexylum</h4>
                                                            </a>
                                                            <span>9 Hours Ago</span>
                                                        </div>
                                                        <div class="rating product--rating">
                                                            <ul>
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-half-o"></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <span class="review_tag">support</span>
                                                    </div>
                                                    <a href="#" class="reply-link">Reply</a>
                                                </div>
                                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                    sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                    interdum mollis.</p>
                                            </div>
                                        </div>

                                        <!-- comment reply -->
                                        <div class="media depth-2 reply-comment">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m2.png" alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--md btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </li>
                                    <!-- end single comment thread /.comment-->


                                </ul>
                                <!-- end /.media-list -->

                                <div class="pagination-area pagination-area2">
                                    <nav class="navigation pagination " role="navigation">
                                        <div class="nav-links">
                                            <a class="page-numbers current" href="#">1</a>
                                            <a class="page-numbers" href="#">2</a>
                                            <a class="page-numbers" href="#">3</a>
                                            <a class="next page-numbers" href="#">
                                                <span class="lnr lnr-arrow-right"></span>
                                            </a>
                                        </div>
                                    </nav>
                                </div>
                                <!-- end /.comment pagination area -->
                            </div>
                            <!-- end /.comments -->
                        </div>
                        <!-- end /.product-comment -->

                        <div class="fade tab-pane product-tab" id="product-support">
                            <div class="support">
                                <div class="support__title">
                                    <h3>GO To the Profile And Send Message To Seller</h3>
                                </div>
                                <div class="support__form">
                                    <div class="usr-msg">
                                        <aside class="sidebar support--sidebar">
                                            <a href="public_auth.php?auth=<?php echo $author_id; ?>#message_place" class="login_promot">
                                                <span class="lnr lnr-lock"></span>Click Me And Open Profile</a>
                                        </aside>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end /.product-support -->

                        <div class="fade tab-pane product-tab" id="product-faq">
                            <div class="tab-content-wrapper">
                                <div class="panel-group accordion" role="tablist" id="accordion">
                                    <div class="panel accordion__single" id="panel-one">
                                        <div class="single_acco_title">
                                            <h4>
                                                <a data-toggle="collapse" href="#collapse1" class="collapsed" aria-expanded="false" data-target="#collapse1" aria-controls="collapse1">
                                                    <span>How to write the changelog for theme updates?</span>
                                                    <i class="lnr lnr-chevron-down indicator"></i>
                                                </a>
                                            </h4>
                                        </div>

                                        <div id="collapse1" class="panel-collapse collapse" aria-labelledby="panel-one" data-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                    sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                    interdum mollis. Aliquip placeat salvia cillum iphone. Seitan
                                                    aliquip
                                                    quis cardigan american apparel, butcher. Nunc placerat mi id nisi
                                                    interdum mollis. Praesent pharetra, justo ut sceleris que the
                                                    mattis,
                                                    leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip
                                                    placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                                                    apparel, butcher .</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end /.accordion__single -->
                                    <div class="panel accordion__single" id="panel-two">
                                        <div class="single_acco_title">
                                            <h4>
                                                <a data-toggle="collapse" href="#collapse2" class="collapsed" aria-expanded="false" data-target="#collapse2" aria-controls="collapse2">
                                                    <span>Why do I need to login to purchase an item on DigiPro?</span>
                                                    <i class="lnr lnr-chevron-down indicator"></i>
                                                </a>
                                            </h4>
                                        </div>

                                        <div id="collapse2" class="panel-collapse collapse" aria-labelledby="panel-two" data-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                    sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                    interdum mollis. Aliquip placeat salvia cillum iphone. Seitan
                                                    aliquip
                                                    quis cardigan american apparel, butcher. Nunc placerat mi id nisi
                                                    interdum mollis. Praesent pharetra, justo ut sceleris que the
                                                    mattis,
                                                    leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip
                                                    placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                                                    apparel, butcher .</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end /.accordion__single -->
                                    <div class="panel accordion__single" id="panel-three">
                                        <div class="single_acco_title">
                                            <h4>
                                                <a data-toggle="collapse" href="#collapse3" class="collapsed" aria-expanded="false" data-target="#collapse3" aria-controls="collapse3">
                                                    <span>How to create an account on DigiPro?</span>
                                                    <i class="lnr lnr-chevron-down indicator"></i>
                                                </a>
                                            </h4>
                                        </div>

                                        <div id="collapse3" class="panel-collapse collapse" aria-labelledby="panel-three" data-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                    sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                    interdum mollis. Aliquip placeat salvia cillum iphone. Seitan
                                                    aliquip
                                                    quis cardigan american apparel, butcher. Nunc placerat mi id nisi
                                                    interdum mollis. Praesent pharetra, justo ut sceleris que the
                                                    mattis,
                                                    leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip
                                                    placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                                                    apparel, butcher .</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end /.accordion__single -->
                                    <div class="panel accordion__single" id="panel-four">
                                        <div class="single_acco_title">
                                            <h4>
                                                <a data-toggle="collapse" href="#collapse4" class="collapsed" aria-expanded="false" data-target="#collapse4" aria-controls="collapse4">
                                                    <span>How to write the changelog for theme updates?</span>
                                                    <i class="lnr lnr-chevron-down indicator"></i>
                                                </a>
                                            </h4>
                                        </div>

                                        <div id="collapse4" class="panel-collapse collapse" aria-labelledby="panel-four" data-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                    sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                    interdum mollis. Aliquip placeat salvia cillum iphone. Seitan
                                                    aliquip
                                                    quis cardigan american apparel, butcher. Nunc placerat mi id nisi
                                                    interdum mollis. Praesent pharetra, justo ut sceleris que the
                                                    mattis,
                                                    leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip
                                                    placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                                                    apparel, butcher .</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end /.accordion__single -->
                                    <div class="panel accordion__single" id="panel-five">
                                        <div class="single_acco_title">
                                            <h4>
                                                <a data-toggle="collapse" href="#collapse5" class="collapsed" aria-expanded="false" data-target="#collapse5" aria-controls="collapse5">
                                                    <span>Do you recommend using a download manager software?</span>
                                                    <i class="lnr lnr-chevron-down indicator"></i>
                                                </a>
                                            </h4>
                                        </div>

                                        <div id="collapse5" class="panel-collapse collapse" aria-labelledby="panel-five" data-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                    sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                    interdum mollis. Aliquip placeat salvia cillum iphone. Seitan
                                                    aliquip
                                                    quis cardigan american apparel, butcher. Nunc placerat mi id nisi
                                                    interdum mollis. Praesent pharetra, justo ut sceleris que the
                                                    mattis,
                                                    leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip
                                                    placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                                                    apparel, butcher .</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end /.accordion__single -->
                                    <div class="panel accordion__single" id="panel-six">
                                        <div class="single_acco_title">
                                            <h4>
                                                <a data-toggle="collapse" href="#collapse6" class="collapsed" aria-expanded="false" data-target="#collapse6" aria-controls="collapse6">
                                                    <span>How to purchase an item on DigiPro?</span>
                                                    <i class="lnr lnr-chevron-down indicator"></i>
                                                </a>
                                            </h4>
                                        </div>

                                        <div id="collapse6" class="panel-collapse collapse" aria-labelledby="panel-six" data-parent="#accordion">
                                            <div class="panel-body">
                                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                    sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                    interdum mollis. Aliquip placeat salvia cillum iphone. Seitan
                                                    aliquip
                                                    quis cardigan american apparel, butcher. Nunc placerat mi id nisi
                                                    interdum mollis. Praesent pharetra, justo ut sceleris que the
                                                    mattis,
                                                    leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip
                                                    placeat salvia cillum iphone. Seitan aliquip quis cardigan american
                                                    apparel, butcher .</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end /.accordion__single -->
                                </div>
                                <!-- end /.accordion -->
                            </div>

                        </div>
                        <!-- end /.product-faq -->
                    </div>
                    <!-- end /.tab-content -->
                </div>
                <!-- end /.item-info -->
            </div>
            <!-- end /.col-md-8 -->

            <div class="col-lg-4">
                <aside class="sidebar sidebar--single-product">
                    <div class="sidebar-card card-pricing">
                        <div class="price">
                            <h1>
                                <sup>$</sup><?php echo $price; ?>
                            </h1>
                        </div>
                        <ul class="pricing-options">
                            <li>
                                <div class="custom-radio">
                                    <input type="radio" id="opt1" class="" name="filter_opt" checked>
                                    <label for="opt1">
                                        <span class="circle"></span>Single Site License –
                                        <span class="pricing__opt">$20.00</span>
                                    </label>
                                </div>
                            </li>

                        </ul>
                        <!-- end /.pricing-options -->

                        <div class="purchase-button">
                            <a href="#" class="btn btn--lg btn--round">Purchase Now</a>
                            <a href="#" class="btn btn--lg btn--round cart-btn">
                                <span class="lnr lnr-cart"></span> Add To Cart</a>
                        </div>
                        <!-- end /.purchase-button -->
                    </div>
                    <!-- end /.sidebar--card -->

                    <div class="sidebar-card card--metadata">
                        <ul class="data">
                            <li>
                                <p>
                                    <span class="lnr lnr-cart pcolor"></span>Total Sales
                                </p>
                                <span>426</span>
                            </li>
                            <li>
                                <p>
                                    <span class="lnr lnr-heart scolor"></span>Favorites
                                </p>
                                <span>240</span>
                            </li>
                            <li>
                                <p>
                                    <span class="lnr lnr-bubble mcolor3"></span>Comments
                                </p>
                                <span>35</span>
                            </li>
                        </ul>


                        <div class="rating product--rating">
                            <ul>
                                <li>
                                    <span class="fa fa-star"></span>
                                </li>
                                <li>
                                    <span class="fa fa-star"></span>
                                </li>
                                <li>
                                    <span class="fa fa-star"></span>
                                </li>
                                <li>
                                    <span class="fa fa-star"></span>
                                </li>
                                <li>
                                    <span class="fa fa-star-half-o"></span>
                                </li>
                            </ul>
                            <span class="rating__count">( 26 Ratings )</span>
                        </div>
                        <!-- end /.rating -->
                    </div>
                    <!-- end /.sidebar-card -->

                    <!-- Author Info -->
                    <div class="author-card sidebar-card ">
                        <div class="card-title">
                            <h4>Product Information</h4>
                        </div>

                        <div class="author-infos">
                            <div class="author_avatar">
                                <img src="admin/img/member_avatars/<?php echo $author ?>/<?php echo $author_image; ?>" alt="Presenting the broken author avatar :D">
                            </div>

                            <div class="author">
                                <h4><?php echo $author; ?></h4>
                            </div>
                            <!-- end /.author -->

                            <div class="social social--color--filled">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-facebook"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-dribbble"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.social -->
                            <div class="author-btn">
                                <?php
                                $pro_file_sql = "SELECT * FROM members WHERE mem_user_name = :mem_user_name limit 0,1";
                                $stmt_profile = $conn->prepare($pro_file_sql);
                                $stmt_profile->execute([
                                    ':mem_user_name' => $author
                                ]);

                                while ($rows_profile = $stmt_profile->fetch(PDO::FETCH_ASSOC)) {
                                    $author_profile_id = $rows_profile['mem_id'];

                                ?>
                                    <a href="public_auth.php?auth=<?php echo $author_profile_id; ?>" class="btn btn--sm btn--round">View Profile</a>
                                    <a href="public_auth.php?auth=<?php echo $author_profile_id ?>#message_place" class="btn btn--sm btn--round">Message</a>

                                <?php } ?>
                            </div>
                            <!-- end /.author-btn -->
                        </div>
                        <!-- end /.author-infos -->


                    </div>
                    <!-- end /.author-card -->
                </aside>
                <!-- end /.aside -->
            </div>
            <!-- end /.col-md-4 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<!--===========================================
        END SINGLE PRODUCT DESCRIPTION AREA
    ===============================================-->

<!--============================================
        START MORE PRODUCT ARE
    ==============================================-->
<section class="more_product_area section--padding">
    <div class="container">
        <div class="row">
            <!-- start col-md-12 -->
            <div class="col-md-12">
                <div class="section-title">
                    <h1>More Items
                        <span class="highlighted">by <?php echo $author; ?></span>
                    </h1>
                </div>
            </div>
            <!-- end /.col-md-12 -->
            <?php
            $author_pros = mem_pro_for_single_pro($author);
            foreach ($author_pros as $auth_pro) {
            ?>
                <!-- start .col-md-4 -->
                <div class="col-lg-4 col-md-6">
                    <!-- start .single-product -->
                    <div class="product product--card">

                        <div class="product__thumbnail">
                            <!-- Image & video Show -->
                            <?php
                            $exp = explode(".", $auth_pro['mem_pro_image']);
                            $ext = end($exp);
                            if ($ext == "jpg" or $ext == "png" or $ext == "jpeg" or $ext == 'gif') { ?>
                                <img width="361px" height="240px" src="./admin/img/member_product/<?php echo $auth_pro['mem_pro_name']; ?>/<?php echo $auth_pro['mem_pro_image']; ?>" alt="<?php echo $auth_pro['mem_pro_name']; ?>">

                            <?php } else { ?>
                                <div class="card">
                                    <video width="361px" height="240px" autoplay muted loop poster="placeholder.png" controls style="background-size:contain">
                                        <source src="./admin/img/member_product/<?php echo $auth_pro['mem_pro_name']; ?>/<?php echo $auth_pro['mem_pro_image']; ?>">
                                    </video>
                                </div>
                            <?php } ?>
                            <!-- END Image & video Show -->
                            <div class="prod_btn">
                                <a href="single-product.php?id=<?php echo $auth_pro['mem_pro_id']; ?>" class="transparent btn--sm btn--round">More Info</a>
                                <a href="single-product.php?id=<?php echo $auth_pro['mem_pro_id']; ?>" class="transparent btn--sm btn--round">Live Demo</a>
                            </div>
                            <!-- end /.prod_btn -->
                        </div>
                        <!-- end /.product__thumbnail -->

                        <div class="product-desc">
                            <a href="#" class="product_title">
                                <h4><?php echo $auth_pro['mem_pro_name']; ?></h4>
                            </a>
                            <ul class="titlebtm">
                                <li>
                                    <img class="auth-img" src="admin/img/member_avatars/<?php echo $author ?>/<?php echo $author_image; ?>" alt="author image">
                                    <p>
                                        <a href=""><?php echo $author ?></a>
                                    </p>
                                </li>
                                <li class="product_cat">
                                    <a href="#">
                                        <?php
                                        $pro_category = fetch_categories($category);
                                        foreach ($pro_category as $cat_info) {
                                        ?>
                                            <img src="admin/img/cat_image/<?php echo $cat_info['cat_name']; ?>/<?php echo $cat_info['cat_image']; ?>" alt="<?php echo $cat_info['cat_name']; ?>"><?php echo $cat_info['cat_name']; ?></a>
                                <?php } ?>
                                </li>
                            </ul>

                            <p><?php echo $auth_pro['mem_pro_detail']; ?>.</p>
                        </div>
                        <!-- end /.product-desc -->

                        <div class="product-purchase">
                            <div class="price_love">
                                <span>$10</span>
                                <p>
                                    <span class="lnr lnr-heart"></span> 48
                                </p>
                            </div>

                            <div class="rating product--rating">
                                <ul>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-half-o"></span>
                                    </li>
                                </ul>
                            </div>

                            <div class="sell">
                                <p>
                                    <span class="lnr lnr-cart"></span>
                                    <span>50</span>
                                </p>
                            </div>
                        </div>
                        <!-- end /.product-purchase -->
                    </div>
                    <!-- end /.single-product -->
                </div>
            <?php } ?>
            <!-- end /.col-md-4 -->

            <p id="resp">I will Give you Response</p>
        </div>
        <!-- end /.container -->
    </div>
    <!-- end /.container -->
</section>
<!-- // Insert Comment add_comment() -->
<script>

</script>
<!-- footer -->
<?php require_once "footer.php"; ?>
<!-- End Footer -->