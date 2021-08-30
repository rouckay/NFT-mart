<?php $curr_page = basename(__FILE__); ?>
<!-- Header -->
<?php require_once "header.php"; ?>
<!-- END Header -->
<!--================================
        START BREADCRUMB AREA
    =================================-->
<?php
$id = $_GET['id'];
$conn = config();
$single = "SELECT * FROM products WHERE pro_id =:id";
$stmt = $conn->prepare($single);
$stmt->execute([
    ':id' => $id
]);
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
$pro_id = $rows['pro_id'];
$name = $rows['pro_name'];
$detail = $rows['pro_detail'];
$image = $rows['pro_image'];
$price = $rows['pro_price'];
$author = $rows['pro_author'];
$category = $rows['pro_category_id'];
$tag = $rows['pro_tag'];

?>
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
                            <img width="750px" height="430px"
                                src="admin/img/product/<?php echo $name; ?>/<?php echo $image; ?>"
                                alt="Keep calm this isn't the end of the world, the preview is just missing.">

                            <?php } else { ?>
                            <video width="100%" height="100%" autoplay muted loop>
                                <source src="./admin/img/product/<?php echo $name; ?>/<?php echo $image; ?>">
                            </video>
                            <?php } ?>
                            <!-- END Image & video Show -->
                        </div>
                        <div class="prev-slide">
                            <img src="images/itprv.jpg"
                                alt="Keep calm this isn't the end of the world, the preview is just missing.">
                        </div>

                        <div class="prev-slide">
                            <img src="images/itprv.jpg"
                                alt="Keep calm this isn't the end of the world, the preview is just missing.">
                        </div>

                        <div class="prev-slide">
                            <img src="images/itprv.jpg"
                                alt="Keep calm this isn't the end of the world, the preview is just missing.">
                        </div>
                        <div class="prev-slide">
                            <img src="images/itprv.jpg"
                                alt="Keep calm this isn't the end of the world, the preview is just missing.">
                        </div>
                        <div class="prev-slide">
                            <img src="images/itprv.jpg"
                                alt="Keep calm this isn't the end of the world, the preview is just missing.">
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
                                <a href="#product-details" class="active" aria-controls="product-details" role="tab"
                                    data-toggle="tab">Item Details</a>
                            </li>
                            <li>
                                <a href="#product-comment" aria-controls="product-comment" role="tab"
                                    data-toggle="tab">Comments </a>
                            </li>
                            <li>
                                <a href="#product-review" aria-controls="product-review" role="tab"
                                    data-toggle="tab">Reviews
                                    <span>(35)</span>
                                </a>
                            </li>
                            <li>
                                <a href="#product-support" aria-controls="product-support" role="tab"
                                    data-toggle="tab">Support</a>
                            </li>
                            <li>
                                <a href="#product-faq" aria-controls="product-faq" role="tab" data-toggle="tab">item
                                    FAQ</a>
                            </li>
                        </ul>
                    </div>
                    <!-- end /.item-navigation -->

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
                                <img width="640px" width="400px"
                                    src="admin/img/product/<?php echo $name; ?>/<?php echo $image; ?>"
                                    alt="This is product description thumbnail">

                                <?php } else { ?>
                                <video width="100%" height="100%" autoplay muted loop>
                                    <source src="./admin/img/product/<?php echo $name; ?>/<?php echo $image; ?>">
                                </video>
                                <?php } ?>
                                <!-- END Image & video Show -->


                            </div>
                        </div>
                        <!-- end /.tab-content -->

                        <div class="fade tab-pane product-tab" id="product-comment">
                            <div class="thread">
                                <ul class="media-list thread-list">
                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m1.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <div class="media-heading">
                                                        <a href="author.html">
                                                            <h4>Themexylum</h4>
                                                        </a>
                                                        <span>9 Hours Ago</span>
                                                    </div>
                                                    <span class="comment-tag buyer">Purchased</span>
                                                    <a href="#" class="reply-link">Reply</a>
                                                </div>
                                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                    sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                    interdum mollis. </p>
                                            </div>
                                        </div>

                                        <!-- nested comment markup -->
                                        <ul class="children">
                                            <li class="single-thread depth-2">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="images/m2.png"
                                                                alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="media-heading">
                                                            <h4>AazzTech</h4>
                                                            <span>6 Hours Ago</span>
                                                        </div>
                                                        <span class="comment-tag author">Author</span>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                            justo ut sceleris que the mattis, leo quam aliquet congue
                                                            placerat mi id nisi interdum mollis. </p>
                                                    </div>
                                                </div>

                                            </li>
                                            <li class="single-thread depth-2">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="images/m1.png"
                                                                alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="media-heading">
                                                            <h4>Themexylum</h4>
                                                            <span>9 Hours Ago</span>
                                                        </div>
                                                        <span class="comment-tag buyer">Purchased</span>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                            justo ut sceleris que the mattis, leo quam aliquet congue
                                                            placerat mi id nisi interdum mollis. </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>

                                        <!-- comment reply -->
                                        <div class="media depth-2 reply-comment">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m2.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea class="bla" name="reply-comment"
                                                        placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--md btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </li>
                                    <!-- end single comment thread /.comment-->

                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m3.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <div class="media-heading">
                                                        <a href="author.html">
                                                            <h4>Themexylum</h4>
                                                        </a>
                                                        <span>9 Hours Ago</span>
                                                    </div>
                                                    <a href="#" class="reply-link">Reply</a>
                                                </div>
                                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                    sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                    interdum mollis. </p>
                                            </div>
                                        </div>

                                        <!-- comment reply -->
                                        <div class="media depth-2 reply-comment">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m2.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea name="reply-comment"
                                                        placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--sm btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </li>
                                    <!-- end single comment thread /.comment-->

                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m4.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <div class="media-heading">
                                                        <a href="author.html">
                                                            <h4>Themexylum</h4>
                                                        </a>
                                                        <span>9 Hours Ago</span>
                                                    </div>
                                                    <a href="#" class="reply-link">Reply</a>
                                                </div>
                                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                    sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                    interdum mollis. </p>
                                            </div>
                                        </div>

                                        <!-- comment reply -->
                                        <div class="media depth-2 reply-comment">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m2.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea name="reply-comment"
                                                        placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--sm btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </li>
                                    <!-- end single comment thread /.comment-->

                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m5.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <div class="media-heading">
                                                        <a href="author.html">
                                                            <h4>Themexylum</h4>
                                                        </a>
                                                        <span>9 Hours Ago</span>
                                                    </div>
                                                    <a href="#" class="reply-link">Reply</a>
                                                </div>
                                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                    sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                    interdum mollis. </p>
                                            </div>
                                        </div>

                                        <!-- comment reply -->
                                        <div class="media depth-2 reply-comment">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m2.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea name="reply-comment"
                                                        placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--sm btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </li>
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

                                <div class="comment-form-area">
                                    <h4>Leave a comment</h4>
                                    <!-- comment reply -->
                                    <div class="media comment-form">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="images/m7.png" alt="Commentator Avatar">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <form action="#" class="comment-reply-form">
                                                <textarea name="reply-comment"
                                                    placeholder="Write your comment..."></textarea>
                                                <button class="btn btn--sm btn--round">Post Comment</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- comment reply -->
                                </div>
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
                                                    <img class="media-object" src="images/m1.png"
                                                        alt="Commentator Avatar">
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
                                                    <img class="media-object" src="images/m2.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea class="bla" name="reply-comment"
                                                        placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--md btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </li>
                                    <!-- end single comment thread /.comment-->

                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m4.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        <div class="media-heading">
                                                            <a href="author.html">
                                                                <h4>Codepoet_Biplob</h4>
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
                                                        <span class="review_tag">code quality</span>
                                                    </div>
                                                    <a href="#" class="reply-link">Reply</a>
                                                </div>
                                                <p>Awesome theme. All in one Business Website Solutions.</p>
                                            </div>
                                        </div>

                                        <!-- comment reply -->
                                        <div class="media depth-2 reply-comment">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m2.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea class="bla" name="reply-comment"
                                                        placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--md btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </li>
                                    <!-- end single comment thread /.comment-->

                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m5.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        <div class="media-heading">
                                                            <a href="author.html">
                                                                <h4>PaglaGhora</h4>
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
                                                        <span class="review_tag">design quality</span>
                                                    </div>
                                                    <a href="#" class="reply-link">Reply</a>
                                                </div>
                                                <p>Best theme ever....</p>
                                            </div>
                                        </div>

                                        <!-- comment reply -->
                                        <div class="media depth-2 reply-comment">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m2.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea class="bla" name="reply-comment"
                                                        placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--md btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </li>
                                    <!-- end single comment thread /.comment-->

                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m6.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        <div class="media-heading">
                                                            <a href="author.html">
                                                                <h4>Hearingorg</h4>
                                                            </a>
                                                            <span>12 days Ago</span>
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
                                                <p>Very helpful support - above and beyond is my experience and I have
                                                    purchased
                                                    this theme many times for my clients.</p>
                                            </div>
                                        </div>

                                        <!-- comment reply -->
                                        <div class="media depth-2 reply-comment">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m2.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea class="bla" name="reply-comment"
                                                        placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--md btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </li>
                                    <!-- end single comment thread /.comment-->

                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m7.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        <div class="media-heading">
                                                            <a href="author.html">
                                                                <h4>ecom1206</h4>
                                                            </a>
                                                            <span>5 Hours Ago</span>
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
                                                        <span class="review_tag">code quality</span>
                                                    </div>
                                                    <a href="#" class="reply-link">Reply</a>
                                                </div>
                                                <p>Awesome theme. All in one Business Website Solutions.</p>
                                            </div>
                                        </div>

                                        <!-- comment reply -->
                                        <div class="media depth-2 reply-comment">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m2.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea class="bla" name="reply-comment"
                                                        placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--md btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </li>
                                    <!-- end single comment thread /.comment-->

                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m8.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        <div class="media-heading">
                                                            <a href="author.html">
                                                                <h4>Mr.Mango</h4>
                                                            </a>
                                                            <span>1 month day</span>
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
                                                                    <span class="fa fa-star-o"
                                                                        aria-hidden="true"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"
                                                                        aria-hidden="true"></span>
                                                                </li>
                                                                <li>
                                                                    <span class="fa fa-star-o"
                                                                        aria-hidden="true"></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <span class="review_tag">design quality</span>
                                                    </div>
                                                    <a href="#" class="reply-link">Reply</a>
                                                </div>
                                                <p>Retina logo won't work retina logo won't work</p>
                                            </div>
                                        </div>

                                        <!-- nested comment markup -->
                                        <ul class="children">
                                            <li class="single-thread depth-2">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                            <img class="media-object" src="images/m2.png"
                                                                alt="Commentator Avatar">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="media-heading">
                                                            <h4>AazzTech</h4>
                                                            <span>6 Hours Ago</span>
                                                        </div>
                                                        <span class="comment-tag author">Author</span>
                                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra,
                                                            justo ut sceleris que the mattis, leo quam aliquet congue
                                                            placerat mi id nisi interdum mollis. </p>
                                                    </div>
                                                </div>

                                            </li>
                                        </ul>

                                        <!-- comment reply -->
                                        <div class="media depth-2 reply-comment">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m2.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea class="bla" name="reply-comment"
                                                        placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--md btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </li>
                                    <!-- end single comment thread /.comment-->

                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m6.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        <div class="media-heading">
                                                            <a href="author.html">
                                                                <h4>Hearingorg</h4>
                                                            </a>
                                                            <span>12 days Ago</span>
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
                                                <p>Very helpful support - above and beyond is my experience and I have
                                                    purchased
                                                    this theme many times for my clients.</p>
                                            </div>
                                        </div>

                                        <!-- comment reply -->
                                        <div class="media depth-2 reply-comment">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m2.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea class="bla" name="reply-comment"
                                                        placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--md btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </li>
                                    <!-- end single comment thread /.comment-->

                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m9.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        <div class="media-heading">
                                                            <a href="author.html">
                                                                <h4>Tueld</h4>
                                                            </a>
                                                            <span>23 Minutes Ago</span>
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
                                                        <span class="review_tag">code quality</span>
                                                    </div>
                                                    <a href="#" class="reply-link">Reply</a>
                                                </div>
                                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                    sceleris que the mattis, leo quam aliquet congue placerat mi id nisi
                                                    interdum mollis. </p>
                                            </div>
                                        </div>

                                        <!-- comment reply -->
                                        <div class="media depth-2 reply-comment">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m2.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea class="bla" name="reply-comment"
                                                        placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--md btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </li>
                                    <!-- end single comment thread /.comment-->

                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m3.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        <div class="media-heading">
                                                            <a href="author.html">
                                                                <h4>Living Potato</h4>
                                                            </a>
                                                            <span>3 months ago</span>
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
                                                        <span class="review_tag">customization</span>
                                                    </div>
                                                    <a href="#" class="reply-link">Reply</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- comment reply -->
                                        <div class="media depth-2 reply-comment">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m2.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea class="bla" name="reply-comment"
                                                        placeholder="Write your comment..."></textarea>
                                                    <button class="btn btn--md btn--round">Post Comment</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- comment reply -->
                                    </li>
                                    <!-- end single comment thread /.comment-->

                                    <li class="single-thread">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m6.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="clearfix">
                                                    <div class="pull-left">
                                                        <div class="media-heading">
                                                            <a href="author.html">
                                                                <h4>Visual-Eggs</h4>
                                                            </a>
                                                            <span>125 years ago</span>
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
                                                <p>This is the finest art in the history of whateverland. Pastor: No
                                                    it's
                                                    a witchcraft.</p>
                                            </div>
                                        </div>

                                        <!-- comment reply -->
                                        <div class="media depth-2 reply-comment">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="images/m2.png"
                                                        alt="Commentator Avatar">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <form action="#" class="comment-reply-form">
                                                    <textarea class="bla" name="reply-comment"
                                                        placeholder="Write your comment..."></textarea>
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
                                    <h3>Contact the Author</h3>
                                </div>
                                <div class="support__form">
                                    <div class="usr-msg">
                                        <p>Please
                                            <a href="login.html">sign in</a> to contact this author.
                                        </p>

                                        <form action="#" class="support_form">
                                            <div class="form-group">
                                                <label for="subj">Support Subject:</label>
                                                <input type="text" id="subj" class="text_field"
                                                    placeholder="Enter your subject">
                                            </div>

                                            <div class="form-group">
                                                <label for="supmsg">Support Query: </label>
                                                <textarea class="text_field" id="supmsg"
                                                    name="supmsg">Enter your text...</textarea>
                                            </div>
                                            <button type="submit" class="btn btn--lg btn--round">Submit Now</button>
                                        </form>
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
                                                <a data-toggle="collapse" href="#collapse1" class="collapsed"
                                                    aria-expanded="false" data-target="#collapse1"
                                                    aria-controls="collapse1">
                                                    <span>How to write the changelog for theme updates?</span>
                                                    <i class="lnr lnr-chevron-down indicator"></i>
                                                </a>
                                            </h4>
                                        </div>

                                        <div id="collapse1" class="panel-collapse collapse" aria-labelledby="panel-one"
                                            data-parent="#accordion">
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
                                                <a data-toggle="collapse" href="#collapse2" class="collapsed"
                                                    aria-expanded="false" data-target="#collapse2"
                                                    aria-controls="collapse2">
                                                    <span>Why do I need to login to purchase an item on DigiPro?</span>
                                                    <i class="lnr lnr-chevron-down indicator"></i>
                                                </a>
                                            </h4>
                                        </div>

                                        <div id="collapse2" class="panel-collapse collapse" aria-labelledby="panel-two"
                                            data-parent="#accordion">
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
                                                <a data-toggle="collapse" href="#collapse3" class="collapsed"
                                                    aria-expanded="false" data-target="#collapse3"
                                                    aria-controls="collapse3">
                                                    <span>How to create an account on DigiPro?</span>
                                                    <i class="lnr lnr-chevron-down indicator"></i>
                                                </a>
                                            </h4>
                                        </div>

                                        <div id="collapse3" class="panel-collapse collapse"
                                            aria-labelledby="panel-three" data-parent="#accordion">
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
                                                <a data-toggle="collapse" href="#collapse4" class="collapsed"
                                                    aria-expanded="false" data-target="#collapse4"
                                                    aria-controls="collapse4">
                                                    <span>How to write the changelog for theme updates?</span>
                                                    <i class="lnr lnr-chevron-down indicator"></i>
                                                </a>
                                            </h4>
                                        </div>

                                        <div id="collapse4" class="panel-collapse collapse" aria-labelledby="panel-four"
                                            data-parent="#accordion">
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
                                                <a data-toggle="collapse" href="#collapse5" class="collapsed"
                                                    aria-expanded="false" data-target="#collapse5"
                                                    aria-controls="collapse5">
                                                    <span>Do you recommend using a download manager software?</span>
                                                    <i class="lnr lnr-chevron-down indicator"></i>
                                                </a>
                                            </h4>
                                        </div>

                                        <div id="collapse5" class="panel-collapse collapse" aria-labelledby="panel-five"
                                            data-parent="#accordion">
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
                                                <a data-toggle="collapse" href="#collapse6" class="collapsed"
                                                    aria-expanded="false" data-target="#collapse6"
                                                    aria-controls="collapse6">
                                                    <span>How to purchase an item on DigiPro?</span>
                                                    <i class="lnr lnr-chevron-down indicator"></i>
                                                </a>
                                            </h4>
                                        </div>

                                        <div id="collapse6" class="panel-collapse collapse" aria-labelledby="panel-six"
                                            data-parent="#accordion">
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
                                <img src="images/author-avatar.jpg" alt="Presenting the broken author avatar :D">
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
                                <a href="#" class="btn btn--sm btn--round">View Profile</a>
                                <a href="#" class="btn btn--sm btn--round">Message</a>
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

            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <!-- start .single-product -->
                <div class="product product--card">

                    <div class="product__thumbnail">
                        <img src="images/p4.jpg" alt="Product Image">
                        <div class="prod_btn">
                            <a href="single-product.html" class="transparent btn--sm btn--round">More Info</a>
                            <a href="single-product.html" class="transparent btn--sm btn--round">Live Demo</a>
                        </div>
                        <!-- end /.prod_btn -->
                    </div>
                    <!-- end /.product__thumbnail -->

                    <div class="product-desc">
                        <a href="#" class="product_title">
                            <h4>Mccarther Coffee Shop</h4>
                        </a>
                        <ul class="titlebtm">
                            <li>
                                <img class="auth-img" src="images/auth3.jpg" alt="author image">
                                <p>
                                    <a href="#">AazzTech</a>
                                </p>
                            </li>
                            <li class="product_cat">
                                <a href="#">
                                    <img src="images/cathtm.png" alt="category image">Plugin</a>
                            </li>
                        </ul>

                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattis,
                            leo quam aliquet congue.</p>
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
            <!-- end /.col-md-4 -->

            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <!-- start .single-product -->
                <div class="product product--card">

                    <div class="product__thumbnail">
                        <img src="images/p2.jpg" alt="Product Image">
                        <div class="prod_btn">
                            <a href="single-product.html" class="transparent btn--sm btn--round">More Info</a>
                            <a href="single-product.html" class="transparent btn--sm btn--round">Live Demo</a>
                        </div>
                        <!-- end /.prod_btn -->
                    </div>
                    <!-- end /.product__thumbnail -->

                    <div class="product-desc">
                        <a href="#" class="product_title">
                            <h4>Mccarther Coffee Shop</h4>
                        </a>
                        <ul class="titlebtm">
                            <li>
                                <img class="auth-img" src="images/auth2.jpg" alt="author image">
                                <p>
                                    <a href="#">AazzTech</a>
                                </p>
                            </li>
                            <li class="product_cat">
                                <a href="#">
                                    <img src="images/catword.png" alt="category image">wordpress</a>
                            </li>
                        </ul>

                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattis,
                            leo quam aliquet congue.</p>
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
            <!-- end /.col-md-4 -->

            <!-- start .col-md-4 -->
            <div class="col-lg-4 col-md-6">
                <!-- start .single-product -->
                <div class="product product--card">

                    <div class="product__thumbnail">
                        <img src="images/p6.jpg" alt="Product Image">
                        <div class="prod_btn">
                            <a href="single-product.html" class="transparent btn--sm btn--round">More Info</a>
                            <a href="single-product.html" class="transparent btn--sm btn--round">Live Demo</a>
                        </div>
                        <!-- end /.prod_btn -->
                    </div>
                    <!-- end /.product__thumbnail -->

                    <div class="product-desc">
                        <a href="#" class="product_title">
                            <h4>The of the century</h4>
                        </a>
                        <ul class="titlebtm">
                            <li>
                                <img class="auth-img" src="images/auth.jpg" alt="author image">
                                <p>
                                    <a href="#">AazzTech</a>
                                </p>
                            </li>
                            <li class="product_cat">
                                <a href="#">
                                    <img src="images/catph.png" alt="Category Image">PSD</a>
                            </li>
                        </ul>

                        <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattis,
                            leo quam aliquet congue.</p>
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
            <!-- end /.col-md-4 -->

        </div>
        <!-- end /.container -->
    </div>
    <!-- end /.container -->
</section>
<!--============================================
        END MORE PRODUCT AREA
    ==============================================-->

<!-- footer -->
<?php require_once "footer.php"; ?>
<!-- End Footer -->