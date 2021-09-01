<?php
date_default_timezone_set("asia/kabul");
ob_start();
include_once('functions.php');
session_start();
// Chech The User For Login

// if (isset($_COOKIE['mem_user_id']) & isset($_COOKIE['mem_user_name']) & $_SESSION['member_user']) {
// }




function user_login($data)
{
    $conn = config();
    $sql_ad = "SELECT * FROM admin WHERE ad_email = :email";
    $stmt_ad = $conn->prepare($sql_ad);
    $stmt_ad->execute([
        'email' => $data['email']
    ]);
    $row_ad_fetch = $stmt_ad->fetch(PDO::FETCH_ASSOC);
    //$rows = $stmt_ad->rowCount();
    if ($row_ad_fetch['ad_pass'] == $data['password']) {
        if (!empty($data['check'])) {
            $user_id = $row_ad_fetch['ad_id'];
            $user_name = $row_ad_fetch['ad_user_name'];
            $enc_ad_id = base64_encode($user_id);
            $enc_ad_name = base64_encode($user_name);
            setcookie("ad_id", $enc_ad_id, time() + 60 * 60 * 24, "/", "", "", true);
            setcookie("ad_user", $enc_ad_name, time() + 60 * 60 * 24, "/", "", "", true);
        }
        $_SESSION['user_name'] = $row_ad_fetch['ad_user_name'];
        header("Refresh:2;url=index.php?success");
        $success = "<p class='alert alert-success text-center'>Sign In Successfully!</p>";
    } else {
        echo $Not_success = "<p class='alert alert-danger text-center'>Sorry You have make Mistake!</p>";
        header("refresh:2;url=login.php");
    }
}

function mem_sign($mem_sign)
{
    $conn = config();
    $mem_sign = $_POST['frm'];
    $mem_sign_sql = "SELECT * FROM members WHERE mem_user_name = :mem_user";
    $stmt_m_s = $conn->prepare($mem_sign_sql);
    $stmt_m_s->execute([
        ':mem_user' => $mem_sign['user_name']
    ]);
    $mem_info = $stmt_m_s->fetch(PDO::FETCH_ASSOC);
    $mem_password_hash = $mem_info['mem_pass'];
    $rows = $stmt_m_s->rowCount($stmt_m_s);
    if ($rows == 1) {
        if (password_verify($mem_sign['password'], $mem_password_hash)) {
            $_SESSION['member_user'] = $mem_info['mem_user_name'];
            $_SESSION['member_id'] = $mem_info['mem_id'];
            if (!empty($mem_sign['check'])) {
                $member_id = $mem_info['mem_id'];
                $member_user_name = $mem_info['mem_user_name'];
                $enc_id = base64_encode($member_id);
                $enc_user_name = base64_encode($member_user_name);
                setcookie("mem_user_id", $enc_id, time() + 60 * 60 + 12, "/", "", "", true);
                setcookie("mem_user_name", $enc_user_name, time() + 60 * 60 + 12, "/", "", "", true);
            }
            header("location:index.php");
        } else { ?>
<div class="alert alert-danger" role="alert">
    <span class="alert_icon lnr lnr-warning"></span>
    <strong>Oh No!</strong> The Password Is Wrong.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span class="lnr lnr-cross" aria-hidden="true"></span>
    </button>
</div>
<?php  } ?>
<?php
    } elseif ($rows != 1) { ?>
<div class="alert alert-danger" role="alert">
    <span class="alert_icon lnr lnr-warning"></span>
    <strong>Oh No!</strong> User Not Found!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span class="lnr lnr-cross" aria-hidden="true"></span>
    </button>
</div>
<?php    }
}
//Check if the member is Signed in or if it's not back to index
function check_mem()
{
    if (isset($_SESSION['member_id']) || isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
        //Ok
    } else {
        header("location:login.php?login_first");
    }
}
//end Check if the member is Signed in or if it's not back to index

//Check member for Add To Favorurite
function check_mem_fav()
{
    if (isset($_SESSION['member_id']) || isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
        //Ok
    } else {
        header("location:../../login.php?login_first");
    }
}
// END Check member for Add To Favorurite
// ADD Member Sign Up 

function signup_member($signup_data, $avatar)
{
    $conn = config();
    $signup_data = $_POST['frm'];
    $up_validate_sql = "SELECT * FROM members WHERE mem_user_name = :user OR mem_email = :email";
    $stmt_valid = $conn->prepare($up_validate_sql);
    $stmt_valid->execute([
        ':user' => $signup_data['user_name'],
        ':email' => $signup_data['email']
    ]);
    $count_mem = $stmt_valid->rowCount();
    if ($count_mem >= 1) {
        echo "<div class='alert alert-danger' role='alert'>
        <span class='alert_icon lnr lnr-warning'></span>
         '<strong>Oops!</strong> sorry We have on this info one user.';
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span class='lnr lnr-cross' aria-hidden='true'></span>
                    </button>
                </div>";
        header("refresh:2;url=./signup.php");
    } else {
        // Upload Avatar 
        $avatar = $_FILES['avatar']['name'];
        $from = $_FILES['avatar']['tmp_name'];
        $dir = mkdir("admin/img/member_avatars/" . $signup_data['user_name']);
        $to = "admin/img/member_avatars/" . $signup_data['user_name'] . "/" . $avatar;
        move_uploaded_file($from, $to);
        $hash = password_hash($signup_data['password'], PASSWORD_BCRYPT, ['cost' => 10]);
        $signup_sql = "INSERT INTO members (mem_name, mem_user_name,mem_image,mem_email,mem_pass,created_at) VALUES (:name,:u_name,:avatar,:email,:pass,:at)";
        $stmt_up = $conn->prepare($signup_sql);
        $stmt_up->execute([
            ':name' => $signup_data['name'],
            ':u_name' => $signup_data['user_name'],
            ':avatar' => $avatar,
            ':email' => $signup_data['email'],
            ':pass' => $hash,
            ':at' => date("M n, Y") . "at" . date("h:i A")
        ]);
        echo  $success_up = "<div class='alert alert-success' role='alert'>
        <span class='alert_icon lnr lnr-warning'></span>
         '<strong>Correct!</strong> You Will be Redirect To login Page.';
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span class='lnr lnr-cross' aria-hidden='true'></span>
                    </button>
                </div>";
        header('Refresh:2;url=login.php');
    }
}

// Add Product 
function add_pro($product_data)
{
    $conn = config();
    $product_data = $_POST['frm'];
    $pro_ins = "INSERT INTO `products` (`pro_name`, `pro_detail`, `pro_price`, `pro_image`, `pro_author`, `pro_category_id`, `pro_tag`) VALUES 
        (':name', ':detail', ':price', ':image', ':author', ':category', ':tag' )";
    $stmt_pro = $conn->prepare($pro_ins);
    $stmt_pro->execute([
        ':name' => $product_data['name'],
        ':detail' => $product_data['detail'],
        ':price' => $product_data['price'],
        ':image' => "s",
        ':author' => $product_data['author'],
        ':category' => $product_data['category'],
        ':tag' => $product_data['tag']
    ]);
    var_dump($_POST);
    if ($pro_ins) {
        echo "success";
    } else {
        echo "not Success";
    }
}

function add_cat($data_cat, $image)
{
    $conn = config();
    $data_cat = $_POST['frm'];
    $image = $_FILES['cat_image']['name'];
    mkdir("./img/cat_image/" . $data_cat['cat_name']);
    $from = $_FILES['cat_image']['tmp_name'];
    $to = "./img/cat_image/" . $data_cat['cat_name'] . "/" . $image;
    move_uploaded_file($from, $to);
    $add_cat_sql = "INSERT INTO category (cat_name, cat_image, created_at , created_by) VALUES (:name, :image, :at, :by)";
    $stmt_add_cat = $conn->prepare($add_cat_sql);
    $stmt_add_cat->execute([
        ':name' => $data_cat['cat_name'],
        ':image' => $image,
        ':at' => date('M n, Y') . "at" . date('h: i A'),
        ':by' => $_SESSION['user_name']
    ]);
}
// Delete Member
if (isset($_POST['btn_del_mem'])) {
    $conn = config();
    $mem_info = "SELECT * FROM members WHERE mem_id = :id";
    $stmt = $conn->prepare($mem_info);
    $stmt->execute([
        ':id' => $_POST['id']
    ]);
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_name = $rows['mem_user_name'];
    $mem_img = $rows['mem_image'];

    unlink("../img/member_avatars/" . $user_name . "/" . $mem_img);
    rmdir("../img/member_avatars/" . $user_name);
    $del_mem = "DELETE FROM members WHERE mem_id = :id";
    $stmt_del_mem = $conn->prepare($del_mem);
    $stmt_del_mem->execute([
        ':id' => $_POST['id']
    ]);
    header("location:../all_members.php?deleted");
}
// END Delete Member
// Delete Products
if (isset($_POST['btn_del_pro'])) {
    $conn = config();
    $del_pro = "DELETE FROM products WHERE pro_id = :id";
    $stmt_pro = $conn->prepare($del_pro);
    $stmt_pro->execute([
        ':id' => $_POST['id']
    ]);
    header("location:../all_products.php?successfully_deleted");
}
// END Delete Products
// Delete Category 
if (isset($_POST['del_cat'])) {
    $conn = config();
    $del_cat_sql = "DELETE FROM category WHERE cat_id = :id";
    $stmt_cat = $conn->prepare($del_cat_sql);
    $stmt_cat->execute([
        ':id' => $_POST['cat_id']
    ]);
    header("location:../categorieslist.php?deleted");
}
// END Delete Category 
// Edit Category

// END Edit Category


// Edit category
function edit_cat($cat_name, $status, $cat_id, $cat_image)
{
    $conn = config();
    $cat_image = $_FILES['cat_image']['name'];
    $cat_name = $_POST['cat_name'];
    $dir = mkdir("./img/cat_image/" . $cat_name);
    $from = $_FILES['cat_image']['tmp_name'];
    $to = "./img/cat_image/" . $cat_name . "/" . $cat_image;
    move_uploaded_file($from, $to);
    $status = $_POST['status'];
    $cat_id = $_POST['cat_id'];
    $up_cat = "UPDATE category SET cat_name = :name , cat_image = :image ,status = :status WHERE cat_id = :id";
    $stmt_up = $conn->prepare($up_cat);
    $stmt_up->execute([
        ':name' => $cat_name,
        ':image' => $cat_image,
        ':status' => $status,
        ':id' => $_POST['cat_id']
    ]);
}
// Fetch Memeber Image  
// END Fetch Memeber Image 
// Upload Member Product
function uploader_mem_pro($item_data, $image)
{
    error_reporting(0);
    $conn = config();
    if (isset($_COOKIE['mem_user_id'])) {
        $user_id = base64_decode($_COOKIE['mem_user_id']);
    } elseif (isset($_SESSION['member_id'])) {
        $user_id = $_SESSION['member_id'];
    } else {
        $user_id = -1;
    }
    $member_user = "SELECT * FROM members WHERE mem_id = :id";
    $stmt_mem = $conn->prepare($member_user);
    $stmt_mem->execute([
        ':id' => $user_id
    ]);
    $rows_mem = $stmt_mem->fetch(PDO::FETCH_ASSOC);
    $user_name = $rows_mem['mem_user_name'];
    $item_data = $_POST['frm'];
    $image = $_FILES['image']['name'];
    $from = $_FILES['image']['tmp_name'];
    $dir = mkdir("admin/img/member_product/" . $item_data['name']);
    $to = "admin/img/member_product/" . $item_data['name'] . "/" . $image;
    // if (file_exists($to)) {
    // echo $exist_file = "<div class='alert alert-danger' role='alert'>
    //             <span class='alert_icon lnr lnr-danger'></span>
    //              '<strong>Oh No!</strong> Sorry, This Item Exist, Please Choose Different Product Or Name.
    //                         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    //                             <span class='lnr lnr-cross' aria-hidden='true'></span>
    //                         </button>
    //                     </div>";
    // header("refresh:4;url=dashboard-upload.php");
    // die;
    // } else {
    move_uploaded_file($from, $to);
    // }
    $insert_pro_sql = "INSERT INTO mem_products (mem_pro_name,mem_pro_detail, mem_pro_image,category_id,tag,at,author,price) VALUES (:name,:detail,:image,:category,:tag,:at,:author,:price)";
    $stmt_pro_upl = $conn->prepare($insert_pro_sql);
    $stmt_pro_upl->execute([
        ':name' => $item_data['name'],
        ':detail' => $item_data['detail'],
        ':image' => $image,
        ':category' => $item_data['category'],
        ':tag' => $item_data['tag'],
        ':at' => date('M n, Y') . "at" . date('h: i A'),
        ':author' => $user_name,
        ':price' => $item_data['price']
    ]);
    if ($insert_pro_sql) {
        header("location:dashboard-upload.php?success_added");
    } elseif (isset($exist_file)) {
        echo "<p class='alert alert-danger'>Sorry The Item is not uploaded May Be It Shoud be Exist</p>";
    }
}
// END Upload Member Product
// Update Member Information
function update_member_info($up_data, $id)
{
    $conn = config();
    $id = $_POST['mem_id'];
    $up_data = $_POST['frm'];
    $acc_up_sql = "UPDATE members SET mem_name = :name, mem_user_name = :user_name, mem_email= :email,mem_pass=:password WHERE mem_id = :id";
    $stmt_up_acc = $conn->prepare($acc_up_sql);
    $stmt_up_acc->execute([
        ':id' => $id,
        ':name' => $up_data['name'],
        ':user_name' => $up_data['user_name'],
        ':email' => $up_data['email'],
        ':password' => $up_data['password']
    ]);
    header("Refresh:3;url=dashboard-setting.php?success_msg");
}
// END Update Member Information
// Upload Cover Photo
function upload_cover($cover_data, $mem_user_name)
{
    // error_reporting(0);
    $conn = config();
    $mem_user_name = $_POST['mem_user_name'];
    $cover_data = $_FILES['cover_photo']['name'];
    $from = $_FILES['cover_photo']['tmp_name'];
    $dir = mkdir("admin/img/member_cover_photo/" . $mem_user_name);
    $to = "admin/img/member_cover_photo/" . $mem_user_name . "/" . $cover_data;

    move_uploaded_file($from, $to);
    $sql_cover = "INSERT INTO member_cover_photo (cover_image, mem_user_name) VALUES (:image, :name)";
    $stmt_cover = $conn->prepare($sql_cover);
    $stmt_cover->execute([
        ':image' => $cover_data,
        ':name' => $mem_user_name
    ]);
}
// END Upload Cover Photo
// Cookie ID AND session ID
function session_cookie($mem_id, $user)
{
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
}
// END Cookie ID AND session ID
// Cookie userName AND session userName
function cookie_seesion_user($user)
{
    if (isset($_COOKIE['mem_user_name'])) {
        $user = base64_decode($_COOKIE['mem_user_name']);
    } elseif (isset($_SESSION['member_user'])) {
        $user = $_SESSION['member_user'];
    } else {
        $user = -1;
    }
}
// END Cookie userName AND session userName
// Add Member Social Media 
function add_social($social_data)
{
    // member Id
    if (isset($_COOKIE['mem_user_id'])) {
        $mem_id = base64_decode($_COOKIE['mem_user_id']);
    } elseif (isset($_SESSION['member_id'])) {
        $mem_id = $_SESSION['member_id'];
    } else {
        $mem_id = -1;
    }
    $conn = config();
    $social_data = $_POST['frm'];
    $check_so_sql = "SELECT * FROM mem_social_profiles WHERE mem_id = :id_mem";
    $stmt_so = $conn->prepare($check_so_sql);
    $stmt_so->execute([
        ':id_mem' => $mem_id
    ]);
    $rows_so = $stmt_so->rowCount();
    if ($rows_so >= 1) {
    } else {
        $add_social_sql = "INSERT INTO mem_social_profiles (facebook,twitter,google,behance,dribbble,mem_id) VALUES (:face,:twit,:goo,:beh,:drib,:mem_id)";
        $stmt_add_so = $conn->prepare($add_social_sql);
        $stmt_add_so->execute([
            ':face' => "https://facebook.com/" . $social_data['facebook'],
            ':twit' => "https://twitter.com/" . $social_data['twitter'],
            ':goo' => "https://google.com/" . $social_data['google'],
            ':beh' => "https://behance.com/" . $social_data['behance'],
            ':drib' => "https://dribbble.com/" . $social_data['dribbble'],
            ':mem_id' => $mem_id

        ]);
    }
}
// END Add Member Social Media 
// Social Media Check
function check_social($rows)
{
    $conn = config();
    if (isset($_COOKIE['mem_user_id'])) {
        $mem_id = base64_decode($_COOKIE['mem_user_id']);
    } elseif (isset($_SESSION['member_id'])) {
        $mem_id = $_SESSION['member_id'];
    } else {
        $mem_id = -1;
    }
    $sql = "SELECT * FROM mem_social_profiles WHERE mem_id =:id";
    $stmt_so = $conn->prepare($sql);
    $stmt_so->execute([
        ':id' => $mem_id
    ]);
    $rows = $stmt_so->rowCount();
}
// END Social Media Check
// Add To Favourite
if (isset($_POST['btn_add_fav'])) {
    $conn = config();
    if (isset($_SESSION['member_id'])) {
        $id = $_SESSION['member_id'];
    } elseif (isset($_COOKIE['mem_user_id'])) {
        $id = base64_decode($_COOKIE['mem_user_id']);
    } else {
        $id = -1;
    }
    $fav_pro_id = $_POST['pro_id'];

    $fav_add_sql = "INSERT INTO favourite (pro_id, mem_id) VALUES (:pro_id, :mem_id)";
    $stmt_add_fav = $conn->prepare($fav_add_sql);
    $stmt_add_fav->execute([
        ':pro_id' => $fav_pro_id,
        ':mem_id' => $id
    ]);
    // $update_pro = "UPDATE mem_products SET mem_fav_pro = :fav_data WHERE mem_pro_id = :id";
    // $stmt_up = $conn->prepare($update_pro);
    // $stmt_up->execute([
    //     ':id' => $fav_data,
    //     ':fav_data' => $user . "_" . "fav"
    // ]);
    // header("location:../../favourites.php?items_added");
}
// upload Background Image For Home Page
function background_image_add($name, $image)
{
    $conn = config();
    $name = $_POST['name'];
    $image = $_FILES['wallpaper']['name'];
    $dir = mkdir("img/home_bg_image/" . $name);
    $from = $_FILES['wallpaper']['tmp_name'];
    $to = "img/home_bg_image/" . $name . "/" . $image;
    move_uploaded_file($from, $to);
    $inser_wall = "INSERT INTO background_img (name , wallpaper) VALUES (:name,:wall)";
    $stmt_wall = $conn->prepare($inser_wall);
    $stmt_wall->execute([
        ':name' => $name,
        ':wall' => $image
    ]);
}
// EDIT Background Image For Home
function edit_home_img($id, $name, $status, $image)
{
    $conn = config();
    $id = $_POST['id'];
    $name = $_POST['name'];
    $status = $_POST['status'];
    $image = $_FILES['image']['name'];
    $dir = mkdir("img/home_bg_image/" . $name);
    $from = $_FILES['image']['tmp_name'];
    $to = "img/home_bg_image/" . $name . "/" . $image;
    move_uploaded_file($from, $to);
    $sql_upd_img = "UPDATE background_img SET name = :name, wallpaper = :wall, status =:status WHERE id= :id";
    $stmt_up_img = $conn->prepare($sql_upd_img);
    $stmt_up_img->execute([
        ':id' => $id,
        ':name' => $name,
        ':wall' => $image,
        ':status' => $status
    ]);
}
// Delete Background Image For Home Page
function delete_home_background($id)
{
    $conn = config();
    $id = $_POST['img_id'];
    $img = "SELECT * FROM background_img WHERE id = :id";
    $stmt = $conn->prepare($img);
    $stmt->execute([
        ':id' => $id
    ]);
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    $name = $rows['name'];
    $img = $rows['wallpaper'];
    $file = "img/home_bg_image/" . $name . "/" . $img;
    $folder = "img/home_bg_image/" . $name;
    unlink($file);
    rmdir($folder);
    $del_img = "DELETE FROM background_img WHERE id = :id";
    $stmt_img_home = $conn->prepare($del_img);
    $stmt_img_home->execute([
        ':id' => $id
    ]);
    header("location:Home_page_background.php?successfully_delete");
}
// Message System 
function message_to_mem($msg_user_name, $msg_email, $message, $reciever)
{
    $conn = config();
    $reciever = $_POST['reciever'];
    $msg_user_name = $_POST['user_name'];
    $msg_email = $_POST['mem_email'];
    $message = $_POST['message'];
    $send_msg_sql = "INSERT INTO messages (msg_user_name, msg_user_email,msg_detail,msg_date,reciever) VALUES (:user,:email,:detail,:date,:to)";
    $stmt = $conn->prepare($send_msg_sql);
    $stmt->execute([
        ':user' => $msg_user_name,
        ':email' => $msg_email,
        ':detail' => $message,
        ':date' => date('M n, Y') . "at" . date('h: i A'),
        ':to' => $reciever
    ]);
}
// END Message System 
// Delete Member Product From Member Dashboard
function delet_mem_pro_from_dash($pro_id, $author)
{
    $conn = config();
    $author = $_POST['author'];
    $pro_id = $_POST['pro_id'];
    $dele_query = "DELETE FROM mem_products WHERE mem_pro_id = :id , author = :author";
    $stmt = $conn->prepare($dele_query);
    $stmt->execute([
        ':id' => $pro_id,
        ':author' => $author

    ]);
}
// END Delete Member Product From Member Dashboard
// Hide Member Products
function hideProduct($pro_id)
{
    $conn = config();
    $pro_id = $_POST['pro_id'];
    $hide_pro_sql = "UPDATE mem_products SET status= :status WHERE mem_pro_id=:pro_id";
    $stmt = $conn->prepare($hide_pro_sql);
    $stmt->execute([
        ':status' => "draft",
        ':pro_id' => $pro_id
    ]);
}
// END Hide Member Products
// view Message and Remove Active Parameter from it
if (isset($_POST['msg_view_id'])) {
    $conn = config();
    $msg_id = $_POST['msg_view_id'];
    $view_query = "UPDATE messages SET msg_state = :state WHERE msg_id=:msg_id";
    $stmt = $conn->prepare($view_query);
    $stmt->execute([
        ':state' => '1',
        ':msg_id' => $msg_id
    ]);
}
// view Message and Remove Active Parameter from it
// Add BIO Using AJAX
function add_mem_bio($bio, $user_id)
{

    $conn = config();
    if (isset($_SESSION['member_id']) || isset($_SESSION['member_user'])) {
        $user_id = $_SESSION['member_id'];
        $user_name = $_SESSION['member_user'];
    } elseif (isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
        $user_id = $_COOKIE['mem_user_id'];
        $user_name = $_COOKIE['mem_user_user'];
    } else {
        $user_id = -1;
        $user_name = -1;
    }
    $mem_id = $_POST['mem_id'];
    $bio = $_POST['bio'];
    $bio_sql = "INSERT INTO mem_bio (bio_detail,bio_user_id) VALUES (:detail, :user_id )";
    $stmt = $conn->prepare($bio_sql);
    $stmt->execute([
        ':detail' => $bio,
        ':user_id' => $mem_id
    ]);
}
// END Add BIO Using AJAX
?>