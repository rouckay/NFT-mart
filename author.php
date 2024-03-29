<?php $curr_page = basename(__FILE__); ?>
<?php require_once "header.php"; ?>
<!-- Check Member If that is sign In Or Not -->
<?php session_cookie($mem_id, $user);
if (!isset($mem_id) && !isset($user)) {
    header('location:login.php');
}
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
                            <a href="<?php echo $curr_page; ?>">Author Profile</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Author's Profile</h1>
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<!--================================
        END BREADCRUMB AREA
        || isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])
    =================================-->
<?php
$conn = config();
if (isset($_SESSION['member_id']) || isset($_SESSION['member_user'])) {
    $mem_id = $_SESSION['member_id'];
    $user = $_SESSION['member_user'];
} elseif (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
    $mem_id = base64_decode($_COOKIE['mem_user_id']);
    $user = base64_decode($_COOKIE['mem_user_name']);
} else {
    $mem_id = -1;
    $user = -1;
}
$u_info = "SELECT * FROM members WHERE mem_id =:id";
$stmt_ad = $conn->prepare($u_info);
$stmt_ad->execute([
    ':id' => $mem_id,
]);
$row_user = $stmt_ad->fetch(PDO::FETCH_ASSOC);
$id = $row_user['mem_id'];
$name = $row_user['mem_name'];
$image = $row_user['mem_image'];
$user_name = $row_user['mem_user_name'];
$email = $row_user['mem_email'];
$at = $row_user['created_at'];
?>
<!--================================
        START AUTHOR AREA
    =================================-->
<section class="author-profile-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <aside class="sidebar sidebar_author">
                    <div class="author-card sidebar-card">
                        <div class="author-infos">
                            <div class="author_avatar">
                                <img width="100px" height="100px" src="admin/img/member_avatars/<?php echo $user_name; ?>/<?php echo $image; ?>" alt="Presenting the broken author avatar :D">
                            </div>

                            <div class="author">
                                <h4><?php echo $name; ?></h4>
                                <p>Signed Up: <?php echo $at; ?></p>
                            </div>
                            <!-- end /.author -->

                            <div class="author-badges">
                                <?php require_once('module/svg.html'); ?>
                            </div>
                            <!-- end /.author-badges -->

                                                                          <div class="social social--color--filled">
                                <ul>
                                    <?php
                                    $socia_prof = "SELECT * FROM mem_social_profiles WHERE mem_id = :so_id";
                                    $stmt_so = $conn->prepare($socia_prof);
                                    $stmt_so->execute([
                                        ':so_id' => $mem_id
                                    ]);
                                    $rows_soc = $stmt_so->fetch(PDO::FETCH_ASSOC);
                                    $facebook = $rows_soc['facebook'];
                                    $twitter = $rows_soc['twitter'];
                                    $Google = $rows_soc['google'];
                                    ?>
                                    <li>
                                        <a target="_blink" href="<?php echo $facebook; ?>">
                                            <span class="fa fa-facebook"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $twitter; ?>">
                                            <span class="fa fa-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $Google; ?>">
                                            <span class="fa fa-google-plus"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.social -->

                            <!-- <div class="author-btn">
                                <a href="" class="btn btn--md btn--round">Follow</a>
                            </div> -->
                            <!-- end /.author-btn -->
                        </div>
                        <!-- end /.author-infos -->


                    </div>
                    <!-- end /.author-card -->
                    <?php require_once './module/author_items_followers.php'; ?>
                    <!-- end /.author-menu -->
                    <!-- Freelancer Status -->
                    <?php
                    $freelanserData =  freelancerStatus($mem_id);
                    foreach ($freelanserData as $freelanser) {
                        $freelanserId = $freelanser['freel_mem_id'];
                        $freelanser_status = $freelanser['status'];
                        if ($freelanser_status == 0) {
                            echo ' <div class="sidebar-card freelance-status">
                            <div class="custom-checkbox2">
                            <input type="checkbox" id="opti6" class="">
                            <label for="opti6">
                            <span class="circle"></span>Not Interested For Freelancering</label>
                            </div>
                            </div>
                        ';
                        } else {
                            echo '<div class="sidebar-card freelance-status">
                                            <div class="custom-radio">
                                                <input type="radio" id="opt1" class="" name="filter_opt" checked="">
                                                <label for="opt1">
                                                     <span class="circle"></span>Available for Freelance work</label> 
                                            </div>
                                        </div>';
                        }
                    }
                    ?>

                    <?php if (isset($_POST['save'])) {
                        $freelid = $_POST['memid'];
                        $status = $_POST['status'];
                        freelancerControl($freelid, $status);
                        var_dump($_POST);
                    } ?>
                    <div class="sidebar-card freelance-status">
                        <form action="author.php" method="POST">
                            <div class="custom-radio">
                                <div class="custom-checkbox2 text-center">
                                    <div class="select-wrap select-wrap2">
                                        <select id="soft" name="status" class="text_field">
                                            <option value="">Do You Want To Work Remotly?</option>
                                            <option value="1">Ready</option>
                                            <option value="0">No Sorry</option>
                                        </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                    <label for="opti6">
                                        <input type="hidden" name="memid" value="<?php echo $mem_id; ?>" id="opti6"><br>
                                        <button type="submit" name="save" class="btn btn-primary btn-sm btn--fullwidth">save</button></label>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Freelancer Status -->
                    <!-- end /.author-card -->
                    <!-- Message Place -->

                    <!-- END Message Place -->
                    <!-- end /.freelance-status -->
                </aside>
            </div>
            <!-- end /.sidebar -->

            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <?php
                    $conn = config();
                    $mem_pro_sql = "SELECT * FROM mem_products WHERE author = :author  ORDER BY mem_pro_id DESC";
                    $stmt_mem = $conn->prepare($mem_pro_sql);
                    $stmt_mem->execute([
                        ':author' => $user
                    ]);
                    $rows = $stmt_mem->rowCount();
                    if ($rows <= 0) {
                        echo "<p class='alert alert-danger'>Sorry Product Is Not Uploaded</p>";
                    } else {
                        $total_found = $rows;
                    ?>
                        <div class="col-md-4 col-sm-4">
                            <div class="author-info mcolorbg4">
                                <p>Total Items</p>
                                <h3><?php echo $total_found; ?></h3>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- end /.col-md-4 -->

                    <div class="col-md-4 col-sm-4">
                        <div class="author-info pcolorbg">
                            <p>Total sales</p>
                            <h3><?php echo rand(0, 8); ?></h3>
                        </div>
                    </div>
                    <!-- end /.col-md-4 -->

                    <div class="col-md-4 col-sm-4">
                        <div class="author-info scolorbg">
                            <p>Total Ratings</p>
                            <div class="rating product--rating">
                                <ul>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                </ul>
                                <span class="rating__count">(26)</span>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-4 -->

                    <div class="col-md-12 col-sm-12">
                        <div class="author_module">
                            <!-- Image Size 750 X 370 -->
                            <?php
                            // session_cookie($mem_id, $user);
                            $cover_sql = "SELECT * FROM member_cover_photo WHERE mem_user_name = :mem_user_cov";
                            $stmt_cov = $conn->prepare($cover_sql);
                            $stmt_cov->execute([
                                ':mem_user_cov' => $user_name
                            ]);
                            while ($rows_cover = $stmt_cov->fetch(PDO::FETCH_ASSOC)) {
                                $cover_image = $rows_cover['cover_image']
                            ?>
                                <img src="admin/img/member_cover_photo/<?php echo $user_name; ?>/<?php echo $cover_image; ?>" alt="author image">
                            <?php } ?>
                        </div>

                        <div class="author_module about_author">
                            <h2>About
                                <span><?php echo $user_name; ?></span>
                            </h2>
                            <!-- MEMBER Bio text  -->
                            <?php
                            $bio_check = "SELECT * FROM mem_bio WHERE bio_user_id = :bio_check";
                            $stmt_bio = $conn->prepare($bio_check);
                            $stmt_bio->execute([
                                ':bio_check' => $user_id
                            ]);
                            $rows_bio = $stmt_bio->fetch(PDO::FETCH_ASSOC);
                            $user_bio_id = $rows_bio['bio_user_id'];
                            $user_bio_detail_from_db = $rows_bio['bio_detail'];
                            $rows_in_db = $stmt_bio->rowCount();
                            if ($rows_in_db != 1) {
                            ?>
                                <?php
                                // if (isset($_POST['save_bio'])) {
                                //     $mem_id = $_POST['mem_id'];
                                //     $bio = $_POST['bio'];
                                //     add_mem_bio($bio, $user_id);
                                // }

                                ?>
                                <h3 class="alert alert-danger">You Don't Have Bio Yet</h3>
                                <br>
                                <div class="message-form">
                                    <div id="response"></div>
                                    <form method="POST" id="bio_form">
                                        <div class="form-group">
                                            <input type="text" name="bio" class="text_field" id="bio" placeholder="Your Bio...">
                                            <input type="hidden" name="mem_id" id="mem_id" value="<?php echo $mem_id; ?>">
                                        </div>

                                        <div>
                                            <button type="submit" id="save_bio" class="btn btn--md btn--round">Save You
                                                Bio</button>
                                        </div>
                                    </form>
                                    <?php //} 
                                    ?>

                                </div>
                            <?php } elseif ($rows_in_db == '1') { ?>
                                <p id="loaded">
                                    <?php echo $user_bio_detail_from_db;  ?>
                                </p>
                                <br>
                                <hr>
                                <div class="text text-primary" id="response">
                                </div>
                                <input type="hidden" id="mem_idUpBio" value="<?php echo $mem_id; ?>">
                                <button id="createBio" class='btn btn-primary btn-sm btn--fullwidth'>Edit Bio</button>
                                <div id="responseUpdateBio"></div>
                                <br />
                                <hr>
                                <div id="bioTextBoxHere">
                                </div>
                            <?php } ?>
                            <!-- END MEMBER Bio text  -->
                        </div>
                    </div>
                </div>
                <!-- end /.row -->
                <div class="product-title-area">
                    <div class="product__title">
                    </div>
                    <!-- Medicine List -->
                    <?php require_once('phpscripts/medician_list.php');  ?>
                    <!-- END Medicine List -->
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="product-title-area">
                            <div class="product__title">
                                <h2>Newest Products</h2>
                            </div>

                            <a href="#" class="btn btn--sm">See all Items</a>
                        </div>
                        <!-- end /.product-title-area -->
                    </div>
                    <!-- end /.col-md-12 -->
                    <!-- ---------------------------- fetch Author Products -->
                    <?php authorProducts(6, $user); ?>
                    <!-- ---------------------------- END fetch Author Products -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.col-md-8 -->

        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</section>
<!--================================
        END AUTHOR AREA
    =================================-->
<script>
    // BIO insertion
    $(document).ready(function() {
        $('#save_bio').click(function(e) {
            e.preventDefault();
            var mem_id = $('#mem_id').val();
            var bio = $('#bio').val();
            $.ajax({
                url: 'phpscripts/Add_Member_BIO.php',
                method: 'POST',
                data: {
                    mem_id: mem_id,
                    bio: bio
                }
            }).done(function(response) {
                $('#response').html(response);
                $('#bio_form')[0].reset();
                $('#loaded').load(location.href + " #loaded");
            })
        });
    })

    // END BIO insertion
    // Update BIO
    var createBio = document.getElementById('createBio');
    var place = document.getElementById('bioTextBoxHere');
    createBio.addEventListener('click', addBioFun);

    function addBioFun(e) {
        e.preventDefault();
        var input = document.createElement('input');
        var submit = document.createElement('button');
        input.classList = 'form-control form-group';
        input.id = "bioUpdateTextBox"
        place.appendChild(input);
        submit.innerHTML = "Save BIO";
        submit.id = 'updateBio';
        place.appendChild(submit);
        submit.classList = 'btn btn-sm btn-info';
        $(document).ready(function() {
            $('#updateBio').click(function(e) {
                e.preventDefault();
                var mem_idUpBio = $('#mem_idUpBio').val();
                var bioUpdateTextBox = $('#bioUpdateTextBox').val();
                $.ajax({
                    url: 'phpscripts/updateBio.php',
                    method: 'POST',
                    data: {
                        mem_idUpBio: mem_idUpBio,
                        bioUpdateTextBox: bioUpdateTextBox
                    },
                    success: function(responseUpdateBio) {
                        $('#responseUpdateBio').html(responseUpdateBio);
                    }
                })
            });
        })
    }

    // $(document).ready(function() {
    //     $('#save_bio').click(function() {
    //         $('#save_bio').attr('disabled', 'disabled');
    //         $('#bio_form')[0].reset();
    //         var bio = $('#bio').val();
    //         var mem_id = $('#mem_id').val();
    //         $.ajax({
    //             url: 'admin/include/user_functions.php',
    //             method: 'POST',
    //             data: {
    //                 bio: bio,
    //                 mem_id: mem_id
    //             },
    //             success: function(dataResault) {
    //                 var dataResault = JSON.parse(dataResault);
    //             }
    //         });
    //     });
    // });
</script>


<?php require_once "footer.php"; ?>