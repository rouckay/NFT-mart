<?php $curr_page = basename(__FILE__);
require_once('header.php'); ?>
<?php


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

?>
<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <a href="blog.php">Blog</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">All Post</h1>
            </div>
        </div>
    </div>
</section>
<!-- end /.dashboard_menu_area -->
<section class="blog_area section--padding2">
    <div class="container">
        <?php if ($mem_id == -1) { ?>
            <div class="btn-lg bg-secondary text-white text-center">To Add Post Or Like Or Comment! <a class="btn btn-warning btn-md" href="login.php">Sign In</a></div>
        <?php } else { ?>
            <!--  -->
            <div class="dashboard_menu_area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="dashboard_menu">
                                <?php require_once "module/blogNavigation.php" ?>
                            </ul>
                            <!-- end /.dashboard_menu -->
                        </div>
                        <!-- end /.col-md-12 -->
                    </div>
                    <!-- end /.row -->
                    <!-- end /.container -->
                </div>
            </div>
            <!--  -->
        <?php } ?>
        <br>
        <?php if (isset($_GET['add_new'])) {
            if (isset($_POST['btn_uploade'])) {
                $user_id = $mem_id;
                $title = trim($_POST['title']);
                $detail = trim($_POST['detail']);
                $image = $_FILES['image']['name'];
                addBlogPost($title, $detail, $image, $user_id);
            }
        ?>
            <div class="row">
                <div class="col-lg-12 col-md-8">
                    <form action="blog.php?add_new" method="POST" enctype="multipart/form-data">
                        <div class="upload_modules">
                            <div class="modules__title">
                                <h3>Add Post</h3>
                            </div>
                            <div class="modules__content">
                                <!-- row first Two Column -->
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 co-sm-12 col-xs-12">
                                        <label for="product_name">Title
                                            <span>(Max 100 characters)</span>
                                        </label>
                                        <input type="text" name="title" required autofocus id="name" class="text_field" placeholder="Title...">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12 co-sm-12 col-xs-12">
                                        <label for="product_name">Post Details
                                            <span>(Max 500 characters)</span>
                                        </label>
                                        <textarea type="" name="detail" required id="product_name" class="text_field" placeholder="Detail here...">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="upload_wrapper">
                                        <p>Post Image
                                            <span>(JPEG or PNG 100x100px)</span>
                                        </p>
                                        <div class="custom_upload">
                                            <label for="thumbnail">
                                                <input type="file" required accept="image/*" name="image" id="thumbnail" class="files">
                                                <span class="btn  btn--sm">Choose Image</span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_upload -->

                                        <div class="progress_wrapper">
                                            <div class="labels clearfix">
                                                <!-- <p>Thumbnail.jpg</p> -->
                                                <span id="valueShower"></span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar" id="progressUpload" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                                    <span class="sr-only"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.modules__content -->
                        </div>
                        <button type="submit" name="btn_uploade" class="btn btn--round btn--fullwidth btn--lg">Save</button>
                    </form>
                </div>
            </div>
        <?php } else if (isset($_GET['TopPost'])) { ?>
            <div class="row" data-uk-grid>
                <div class="col-lg-4 col-md-6">
                    <div class="single_blog blog--card">
                        <figure>
                            <img src="images/blog1.jpg" alt="Blog image">

                            <figcaption>
                                <div class="blog__content">
                                    <a href="#" class="blog__title">
                                        <h4>Top Post Web Design Trends in 2019</h4>
                                    </a>
                                    <p>Top Post.</p>
                                </div>

                                <div class="blog__meta">
                                    <div class="date_time">
                                        <span class="lnr lnr-clock"></span>
                                        <p>24 Feb 2019</p>
                                    </div>
                                    <div class="comment_view">
                                        <p class="comment">
                                            <span class="lnr lnr-bubble"></span>45
                                        </p>
                                        <p class="view">
                                            <span class="lnr lnr-eye"></span>345
                                        </p>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- end /.single_blog -->
                </div>
                <!-- end /.col-md-4 -->
            </div>
        <?php } else if (isset($_GET['NewPost'])) { ?>
            <div class="row" data-uk-grid>
                <div class="col-lg-4 col-md-6">
                    <div class="single_blog blog--card">
                        <figure>
                            <img src="images/blog1.jpg" alt="Blog image">

                            <figcaption>
                                <div class="blog__content">
                                    <a href="#" class="blog__title">
                                        <h4>Newiest Web Design Trends in 2019</h4>
                                    </a>
                                    <p>Newest Post in the World.</p>
                                </div>

                                <div class="blog__meta">
                                    <div class="date_time">
                                        <span class="lnr lnr-clock"></span>
                                        <p>24 Feb 2019</p>
                                    </div>
                                    <div class="comment_view">
                                        <p class="comment">
                                            <span class="lnr lnr-bubble"></span>45
                                        </p>
                                        <p class="view">
                                            <span class="lnr lnr-eye"></span>345
                                        </p>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- end /.single_blog -->
                </div>
                <!-- end /.col-md-4 -->
            </div>
            <!-- ------------------------------------------ My Post -->
        <?php } else if (isset($_GET['myPost'])) { ?>
            <div class="row" data-uk-grid>
                <?php
                $allPostData = showPostByAuthor($mem_id);
                foreach ($allPostData as $postsData) {
                    $post_id = $postsData['blg_id'];
                    $title = $postsData['blg_title'];
                    $detail = $postsData['blg_detail'];
                    $image = $postsData['blg_img'];
                    $date = $postsData['date'];
                    $views = $postsData['views'];
                    $author = $postsData['user_id'];
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_blog blog--card" style="box-shadow:1px 5px 5px 5px #cccccc;">
                            <figure>
                                <img style="height:230px; object-fit: cover;" src="admin/img/blog/<?php echo $title; ?>/<?php echo $image; ?>" alt="Blog image">

                                <figcaption>
                                    <div class="product-desc">
                                        <a href="single-blog.php?post_id=<?php echo $post_id; ?>" class="blog__title">
                                            <h4><?php echo $title; ?></h4>
                                        </a>
                                        <ul class="titlebtm">
                                            <!-- --------- Author -->
                                            <?php
                                            $authorD = mem_pro_author_by_id($author);
                                            foreach ($authorD as $authData) {
                                                $authName = $authData['mem_name'];
                                                $authUserName = $authData['mem_user_name'];
                                                $authImage = $authData['mem_image'];
                                            ?>
                                                <li>
                                                    <a href="single-blog.php?post_id=<?php echo $post_id; ?>" class="blog__title">
                                                        <img class="auth-img" src="admin/img/member_avatars/<?php echo $authUserName ?>/<?php echo $authImage ?>" alt="author image">
                                                    </a>
                                                    <p>
                                                        <a href="#"><?php echo $authName; ?></a>
                                                    </p>
                                                </li>
                                            <?php }
                                            ?>
                                            <!-- --------- END Author -->
                                        </ul>

                                        <p><?php echo substr($detail, 0, 100); ?>...</p>
                                    </div>

                                    <div class="blog__meta">
                                        <div class="date_time">
                                            <span class="lnr lnr-clock"></span>
                                            <p><?php echo substr($date, 5, 14); ?></p>
                                        </div>
                                        <div class="comment_view">
                                            <p class="comment">
                                                <span class="lnr lnr-bubble"></span>45
                                            </p>
                                            <p class="view">
                                                <span class="lnr lnr-eye"></span><?php echo $views; ?>
                                            </p>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <!-- end /.single_blog -->
                    </div>
                <?php } ?>
                <!-- end /.col-md-4 -->
            </div>
            <!-- // ------------------------------------------ END My Post -->

        <?php } else { ?>
            <!-- ------------------------------------------------------Default Post -->
            <div class="row" data-uk-grid>
                <?php
                $allPostData = showAllBlogPost(10);
                foreach ($allPostData as $postsData) {
                    $post_id = $postsData['blg_id'];
                    $title = $postsData['blg_title'];
                    $detail = $postsData['blg_detail'];
                    $image = $postsData['blg_img'];
                    $date = $postsData['date'];
                    $views = $postsData['views'];
                    $author = $postsData['user_id'];
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_blog blog--card" style="box-shadow:1px 5px 5px 5px #cccccc;">
                            <figure>
                                <img style=" height:230px; object-fit: cover;" src="admin/img/blog/<?php echo $title; ?>/<?php echo $image; ?>" alt="Blog image">
                                <!-- ----------------------------------------------Last Data ----------------------------------------- -->
                                <figcaption>

                                    <div class="product-desc">
                                        <a href="single-blog.php?post_id=<?php echo $post_id; ?>" class="blog__title">
                                            <h4><?php echo $title; ?></h4>
                                        </a>
                                        <ul class="titlebtm">
                                            <!-- --------- Author -->
                                            <?php
                                            $authorD = mem_pro_author_by_id($author);
                                            foreach ($authorD as $authData) {
                                                $authName = $authData['mem_name'];
                                                $authUserName = $authData['mem_user_name'];
                                                $authImage = $authData['mem_image'];
                                            ?>
                                                <li>
                                                    <img class="auth-img" src="admin/img/member_avatars/<?php echo $authUserName ?>/<?php echo $authImage ?>" alt="author image">
                                                    <p>
                                                        <a href="#"><?php echo $authName; ?></a>
                                                    </p>
                                                </li>
                                            <?php }
                                            ?>
                                            <!-- --------- END Author -->
                                        </ul>

                                        <p><?php echo substr($detail, 0, 100); ?>...</p>
                                    </div>

                                    <div class="blog__meta">
                                        <div class="date_time">
                                            <span class="lnr lnr-clock"></span>
                                            <p><?php echo substr($date, 5, 14); ?></p>
                                        </div>
                                        <div class="comment_view">
                                            <p class="comment">
                                                <span class="lnr lnr-bubble"></span>45
                                            </p>
                                            <p class="view">
                                                <span class="lnr lnr-eye"></span><?php echo $views; ?>
                                            </p>
                                        </div>
                                    </div>
                                </figcaption>
                                <!-- ----------------------------------------------Last Data ----------------------------------------- -->

                            </figure>
                        </div>
                        <!-- end /.single_blog -->
                    </div>
                <?php } ?>
                <!-- end /.col-md-4 -->
            </div>
            <!-- ------------------------------------------------------END Default Post -->
        <?php } ?>
        <!-- end /.row -->

    </div>
    <!-- end /.container -->
</section>
<!-- Trigger the modal with a button -->

<!-- Modal -->


<?php require_once('footer.php') ?>