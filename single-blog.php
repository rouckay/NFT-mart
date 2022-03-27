<?php $curr_page = basename(__FILE__); ?>
<?php require_once "header.php"; ?>
<?php
if (isset($mem_id) || isset($user)) {
    $mem_id = -1;
    $user = -1;
} else {

    session_cookie($mem_id, $user);
}
$conn = config();
$post_id = $_GET['post_id'];
$singlePost = showPostById($post_id);
foreach ($singlePost as $postData) {
    $title = $postData['blg_title'];
    $detail = $postData['blg_detail'];
    $image = $postData['blg_img'];
    $date = $postData['date'];
    $views = $postData['views'];
    $author = $postData['user_id'];
    // ------------------------------ Add Views
    $sql_views = "UPDATE blog SET views = views +1 WHERE blg_id = :v_id";
    $stmt_vie = $conn->prepare($sql_views);
    $stmt_vie->execute([
        ':v_id' => $post_id
    ]);
    // ------------------------------ END Add Views
?>

    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li class="active">
                                <a href="blog.php">Blog</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title"><?php echo $title; ?></h1>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>

    <section class="blog_area section--padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single_blog blog--default">
                        <article>
                            <figure>
                                <img style="height:430px;object-fit: cover;" src="admin/img/blog/<?php echo $title; ?>/<?php echo $image; ?>" alt="Blog image">
                            </figure>
                            <div class="blog__content">
                                <a href="#" class="blog__title">
                                    <h4><?php echo $title; ?></h4>
                                </a>

                                <div class="blog__meta">
                                    <div class="author">
                                        <span class="lnr lnr-user"></span>
                                        <?php
                                        $mem_info = fetch_mem_info_by_id($author);
                                        foreach ($mem_info as $mem_data) {
                                            $mem_name = $mem_data['mem_name'];
                                            $auth_id = $mem_data['mem_id'];
                                        ?>
                                            <p>by
                                                <a href="public_auth.php?auth=<?php echo $auth_id ?>"><?php echo $mem_name; ?></a>
                                            </p>
                                        <?php } ?>
                                    </div>
                                    <div class="date_time">
                                        <span class="lnr lnr-clock"></span>
                                        <p><?php echo $date; ?></p>
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
                            </div>

                            <div class="single_blog_content">
                                <p><?php echo $detail; ?>.
                                </p>

                                <blockquote>
                                    if That Have .
                                </blockquote>

                                <h2>We just know now gonna make</h2>
                                <p>Lorem Ipsum is
                                    <a href="#">simply dummy</a> text of the and typesetting industry. Lorem Ipsum is has been the industry’s
                                    stasn ndard dummy text ever since the 1500s, when an unknown printer took a galley of
                                    it to make. Lorem Ipsum is the simply dummy text of the printing.
                                </p>

                                <ol>
                                    <li>List one is awesome. Adding list item is very easily.</li>
                                    <li>List one is awesome. Adding list item is very easily.</li>
                                    <li>List one is awesome. Adding list item is very easily.</li>
                                </ol>

                                <h1>Marvel Theme</h1>
                                <img src="images/blogimg.jpg" alt="Blog image">

                                <p>Lorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum is has been
                                    the industry’s stasn ndard dummy text ever since the 1500s, when an unknown printer took
                                    a galley of it to make. Lorem Ipsum is the simply dummy text of the printing.</p>
                                <ul>
                                    <li>Listing things in a list</li>
                                    <li>Pay close attention to number</li>
                                    <li>What happens next will shock you</li>
                                </ul>
                                <img src="images/nmg.jpg" alt="">

                                <h3>We just know now gonna make</h3>
                                <p>Lorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum is has been
                                    the industry’s stasn ndard dummy text ever since the 1500s, when an unknown printer took
                                    a galley of it to make. Lorem Ipsum is the simply dummy text of the printing.</p>

                                <div class="share_tags">
                                    <div class="share">
                                        <p>Share this post</p>
                                        <div class="social_share active">
                                            <ul class="social_icons">
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
                                                        <span class="fa fa-google-plus"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="fa fa-linkedin"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- end social_share -->
                                    </div>
                                    <!-- end bog_share_ara  -->

                                    <div class="tags">
                                        <ul>
                                            <li>
                                                <a href="#">Dsign</a>
                                            </li>
                                            <li>
                                                <a href="#">Marketing</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- end /.single_blog -->

                    <div class="author_info">
                        <?php
                        $mem_info = fetch_mem_info_by_id($author);
                        foreach ($mem_info as $mem_data) {
                            $mem_name = $mem_data['mem_name'];
                            $auth_id = $mem_data['mem_name'];
                            $mem_user_name = $mem_data['mem_user_name'];
                            $memImage = $mem_data['mem_image'];
                        ?>
                            <div class="author__img">
                                <img style="height: 116px;width:122px;object-fit:cover;" src="admin/img/member_avatars/<?php echo $mem_user_name; ?>/<?php echo $memImage; ?>" alt="Auth Image">
                            </div>
                            <div class="author__info">
                                <h4>About <?php echo $mem_name; ?></h4>
                                <p>Hello Dear Visitor Here is My Social Media Feel Free to Contact Me!</p>
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
                                            <span class="fa fa-google-plus"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fa fa-linkedin"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- end /.author_info -->

                    <div class="comment_area">
                        <div class="comment__title">
                            <h4>2 comments</h4>
                        </div>

                        <div class="comment___wrapper">
                            <ul class="media-list">
                                <li class="depth-1">
                                    <div class="media">
                                        <div class="pull-left no-pull-xs">
                                            <a href="#" class="cmnt_avatar">
                                                <img src="images/comavatar.jpg" class="media-object" alt="Sample Image">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="media_top">
                                                <div class="heading_left pull-left">
                                                    <a href="#">
                                                        <h4 class="media-heading">Thesera Minton</h4>
                                                    </a>
                                                    <span>April 29, 2016</span>
                                                </div>
                                                <a href="#" class="reply hidden-xs-m pull-right">Reply</a>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do they eiusmod
                                                tempor unt ut labore et dolore magna aliquat enim ad minim.</p>
                                            <a href="#" class="reply visible-xs-m  pull-right">Reply</a>
                                        </div>
                                    </div>

                                    <ul class="children">
                                        <!-- Nested media object -->
                                        <li class="depth-2">
                                            <div class="media">
                                                <div class="pull-left no-pull-xs">
                                                    <a href="#" class="cmnt_avatar">
                                                        <img src="images/comavatar2.jpg" class="media-object" alt="Sample Image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="media_top">
                                                        <div class="heading_left pull-left">
                                                            <a href="#">
                                                                <h4 class="media-heading">Toriesta PingPong</h4>
                                                            </a>
                                                            <span>April 29, 2016</span>
                                                        </div>
                                                        <a href="#" class="reply hidden-xs-m pull-right">Reply</a>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do they
                                                        eiusmod tempor unt ut labore et dolore magna aliquat enim ad minim.</p>
                                                    <a href="#" class="reply visible-xs-m pull-right">Reply</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <li class="depth-1">
                                    <div class="media">
                                        <div class="pull-left no-pull-xs">
                                            <a href="#" class="cmnt_avatar">
                                                <img src="images/comavatar2.jpg" class="media-object" alt="Sample Image">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="media_top">
                                                <div class="heading_left pull-left">
                                                    <a href="#">
                                                        <h4 class="media-heading">Thesera Minton</h4>
                                                    </a>
                                                    <span>April 29, 2016</span>
                                                </div>
                                                <a href="#" class="reply hidden-xs-m pull-right">Reply</a>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do they eiusmod
                                                tempor unt ut labore et dolore magna aliquat enim ad minim.</p>
                                            <a href="#" class="reply visible-xs-m pull-right">Reply</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- end /.comment___wrapper -->
                    </div>
                    <!-- end /.col-md-8 -->

                    <div class="comment_area comment--form">
                        <!-- start reply_form -->
                        <div class="comment__title">
                            <h4>Leave A Reply</h4>
                        </div>
                        <div class="commnet_form_wrapper">
                            <div class="row">
                                <!-- start form -->
                                <form class="cmnt_reply_form" action="#" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="input_field" type="text" placeholder="Name" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="input_field" type="email" placeholder="Email" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="input_field" name="name" placeholder="Your text here..." rows="10" cols="80"></textarea>
                                            </div>

                                            <button type="submit" class="btn btn--round btn--default" name="btn">Submit Now</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- end form -->
                            </div>
                        </div>
                        <!-- end /.commnet_form_wrapper -->
                    </div>
                    <!-- end /.comment_area_wrapper -->
                </div>
                <!-- end /.col-md-8 -->

                <div class="col-lg-4">
                    <aside class="sidebar sidebar--blog">
                        <div class="sidebar-card card--search card--blog_sidebar">
                            <div class="card-title">
                                <h4>Product Information</h4>
                            </div>
                            <!-- end /.card-title -->

                            <div class="card_content">
                                <form action="#">
                                    <div class="searc-wrap">
                                        <input type="text" placeholder="Search product here...">
                                        <button type="submit" class="search-wrap__btn">
                                            <span class="lnr lnr-magnifier"></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- end /.card_content -->
                        </div>
                        <!-- end /.sidebar-card -->

                        <div class="sidebar-card sidebar--post card--blog_sidebar">
                            <div class="card-title">
                                <!-- Nav tabs -->
                                <ul class="nav post-tab" role="tablist">
                                    <li>
                                        <a href="#popular" id="popular-tab" class="active" aria-controls="popular" role="tab" data-toggle="tab" aria-selected="true">Popular Posts</a>
                                    </li>
                                    <li>
                                        <a href="#latest" id="latest-tab" aria-controls="latest" role="tab" data-toggle="tab" aria-selected="false">Latest Posts</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.card-title -->
                            <div class="card_content">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="popular" aria-labelledby="popular-tab">
                                        <ul class="post-list">
                                            <?php
                                            $latestPost = showAllBlogPost(5);
                                            foreach ($latestPost as $latestData) {
                                                $latestPostId = $latestData['blg_id'];
                                                $latestPostTitle = $latestData['blg_title'];
                                                $latestPostDetail = $latestData['blg_detail'];
                                                $latestPostImage = $latestData['blg_img'];
                                                $latestPostDate = $latestData['date'];
                                                $latestPostViews = $latestData['views'];
                                            ?>
                                                <li>
                                                    <div class="thumbnail_img">
                                                        <img style="width:70px;height:70px;object-fit: cover; border-radius:5px;box-shadow:2px 2px 2px 2px;" src="admin/img/blog/<?php echo $latestPostTitle; ?>/<?php echo $latestPostImage; ?>" alt="blog thumbnail">
                                                    </div>
                                                    <div class="title_area">
                                                        <a href="single-blog.php?post_id=<?php echo $latestPostId; ?>">
                                                            <h4><?php echo $latestPostTitle; ?></h4>
                                                        </a>
                                                        <div class="date_time">
                                                            <span class="lnr lnr-clock"></span>
                                                            <p><?php echo $latestPostDate; ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <!-- end /.post-list -->
                                    </div>
                                    <!-- end /.tabpanel -->

                                    <div role="tabpanel" class="tab-pane fade" id="latest" aria-labelledby="latest-tab">
                                        <ul class="post-list">
                                            <li>
                                                <div class="thumbnail_img">
                                                    <img src="images/blog_thumb2.jpg" alt="blog thumbnail">
                                                </div>
                                                <div class="title_area">
                                                    <a href="#">
                                                        <h4>Best free jQuery image gallery plugins 2019</h4>
                                                    </a>
                                                    <div class="date_time">
                                                        <span class="lnr lnr-clock"></span>
                                                        <p>24 Feb 2019</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="thumbnail_img">
                                                    <img src="images/blog_thumb1.jpg" alt="blog thumbnail">
                                                </div>
                                                <div class="title_area">
                                                    <a href="#">
                                                        <h4>5 best jQuery form validation plugins you must try</h4>
                                                    </a>
                                                    <div class="date_time">
                                                        <span class="lnr lnr-clock"></span>
                                                        <p>24 Feb 2019</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="thumbnail_img">
                                                    <img src="images/blog_thumb2.jpg" alt="blog thumbnail">
                                                </div>
                                                <div class="title_area">
                                                    <a href="#">
                                                        <h4>The story of revolution</h4>
                                                    </a>
                                                    <div class="date_time">
                                                        <span class="lnr lnr-clock"></span>
                                                        <p>24 Feb 2019</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="thumbnail_img">
                                                    <img src="images/blog_thumb2.jpg" alt="blog thumbnail">
                                                </div>
                                                <div class="title_area">
                                                    <a href="#">
                                                        <h4>The story of revolution</h4>
                                                    </a>
                                                    <div class="date_time">
                                                        <span class="lnr lnr-clock"></span>
                                                        <p>24 Feb 2019</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- end /.post-list -->
                                    </div>
                                    <!-- end /.tabpanel -->
                                </div>
                                <!-- end /.tab-content -->
                            </div>
                            <!-- end /.card_content -->
                        </div>
                        <!-- end /.sidebar-card -->

                        <div class="sidebar-card card--blog_sidebar card--category">
                            <div class="card-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="collapsible-content">
                                <ul class="card-content">
                                    <li>
                                        <a href="#">
                                            <span class="lnr lnr-chevron-right"></span>Wordpress
                                            <span class="item-count">35</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="lnr lnr-chevron-right"></span>Support Center
                                            <span class="item-count"> 45</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="lnr lnr-chevron-right"></span>General Topics
                                            <span class="item-count">13</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="lnr lnr-chevron-right"></span>Pre-Sales
                                            <span class="item-count">08</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="lnr lnr-chevron-right"></span>Purchases
                                            <span class="item-count">34</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="lnr lnr-chevron-right"></span>Billing
                                            <span class="item-count">78</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="lnr lnr-chevron-right"></span>Testimonials
                                            <span class="item-count">26</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.collapsible_content -->
                        </div>
                        <!-- end /.sidebar-card -->

                        <div class="sidebar-card card--blog_sidebar card--tags">
                            <div class="card-title">
                                <h4>Categories</h4>
                            </div>

                            <ul class="tags">
                                <li>
                                    <a href="#">Branding</a>
                                </li>
                                <li>
                                    <a href="#">Design</a>
                                </li>
                                <li>
                                    <a href="#">Marketing</a>
                                </li>
                                <li>
                                    <a href="#">Development</a>
                                </li>
                                <li>
                                    <a href="#">Branding</a>
                                </li>
                                <li>
                                    <a href="#">Design</a>
                                </li>
                                <li>
                                    <a href="#">Marketing</a>
                                </li>
                                <li>
                                    <a href="#">Development</a>
                                </li>
                            </ul>
                            <!-- end /.tags -->
                        </div>
                        <!-- end /.sidebar-card -->

                        <?php
                        $member = fetch_mem_info_by_id($author);
                        foreach ($member as $data) {
                            $mem_user_name = $data['mem_user_name'];
                            $coverPhotoFunc = memCoverPhoto($mem_user_name);
                            foreach ($coverPhotoFunc as $coverPhotoData) {
                                $coverImage = $coverPhotoData['cover_image'];

                        ?>
                                <div class="banner">
                                    <img src="admin/img/member_cover_photo/<?php echo $mem_user_name; ?>/<?php echo $coverImage; ?>" alt="Banner">
                                    <div class="banner_content">
                                        <h1>My Cover</h1>
                                        <!-- <p>360x270</p> -->
                                        <p>Thank you For Viewing My Post</p>
                                    </div>
                            <?php }
                        } ?>
                                </div>
                                <!-- end /.banner -->
                    </aside>
                    <!-- end /.aside -->
                </div>
                <!-- end /.col-md-4 -->

            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
<?php } ?>
<?php require_once "footer.php"; ?>