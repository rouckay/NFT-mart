<?php
date_default_timezone_set("asia/kabul");
ob_start();
include_once('functions.php');
session_start();
// class ProClass
// {
//     public $conn;
//     function showDb($conn)
//     {
//         $this->conn = $conn;
//     }
//     function showerDB()
//     {
//         return $this->conn;
//     }
// }
// $showDB = new ProClass();
// $showDB->showDb('hello');
// echo $showDB->showerDB();

$conn = config();


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
    $mem_sign_sql = "SELECT * FROM members WHERE mem_user_name = :mem_user AND acc_status = :status";
    $stmt_m_s = $conn->prepare($mem_sign_sql);
    $stmt_m_s->execute([
        ':mem_user' => $mem_sign['user_name'],
        ':status' => 'publish'
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
            <strong>But If you Think It's Correct!</strong> Your Account is Not Activated Please Contact Support To Activate Your Account!
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
         <strong>Correct!</strong> You Will be Redirect To login Page.
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
    // ***************************Resizing Image To Thumbnail*********************************
    $maxDimW = 361;
    $maxDimH = 230;
    // list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
    $target_filename = $_FILES['image']['tmp_name'];
    $fn = $_FILES['image']['tmp_name'];
    $size = getimagesize($fn);
    $ratio = $size[0] / $size[1];
    if ($ratio > 1) {
        $width = $maxDimW;
        $height = $maxDimH / $ratio;
    } else {
        $width = $maxDimW * $ratio;
        $height = $maxDimH;
    }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor($width, $height);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);

    imagejpeg($dst, $target_filename);
    // **********************Resizing Image To Thumbnail******************
    move_uploaded_file($from, $to);
    // }
    $insert_pro_sql = "INSERT INTO mem_products (mem_pro_name,mem_pro_detail, mem_pro_image,category_id,tag,at,author,price ,pro_amount, expireDate) VALUES (:name,:detail,:image,:category,:tag,:at,:author,:price, :pro_amount, :expireDate)";
    $stmt_pro_upl = $conn->prepare($insert_pro_sql);
    $stmt_pro_upl->execute([
        ':name' => $item_data['name'],
        ':detail' => $item_data['detail'],
        ':image' => $image,
        ':category' => $item_data['category'],
        ':tag' => $item_data['tag'],
        ':at' => date('M n, Y') . "at" . date('h: i A'),
        ':author' => $user_name,
        ':price' => $item_data['price'],
        ':pro_amount' => $item_data['amount'],
        ':expireDate' => $item_data['expireDate']
    ]);
    if ($insert_pro_sql) {
        header("location:dashboard-upload.php?success_added");
    } elseif (isset($exist_file)) {
        echo "<p class='alert alert-danger'>Sorry The Item is not uploaded May Be It Shoud be Exist</p>";
    }
}
// END Upload Member Product
// Update Member Products
function updateMemPro($item_data, $image, $oldPic)
{
    $conn = config();
    $item_data = $_POST['frm'];
    if ($_FILES['image']['name'] != '') {
        $image = $_FILES['image']['name'];
        $from = $_FILES['image']['tmp_name'];
        $dir = mkdir("admin/img/member_product/" . $item_data['name']);
        $to = "admin/img/member_product/" . $item_data['name'] . "/" . $image;
        move_uploaded_file($from, $to);
    } else {
        $image = $oldPic;
    }
    $sqlUpdate = "UPDATE mem_products SET mem_pro_name=:mem_pro_name, mem_pro_detail = :mem_pro_detail, mem_pro_image=:mem_pro_image, category_id = :category_id,tag=:tag, price=:price,pro_amount = :pro_amount  WHERE mem_pro_id = :pro_id";
    $stmt_up_pro = $conn->prepare($sqlUpdate);
    $stmt_up_pro->execute([
        ':pro_id' => $item_data['mem_pro_id'],
        ':mem_pro_name' => $item_data['name'],
        ':mem_pro_detail' => $item_data['detail'],
        ':mem_pro_image' => $image,
        ':category_id' => $item_data['category'],
        ':tag' => $item_data['tag'],
        ':price' => $item_data['price'],
        ':pro_amount' => $item_data['amount'],
    ]);
}
// END Update Member Products
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
function add_to_favourite($fav_pro_id, $fav_pro_author, $mem_id)
{
    $conn = config();
    $fav_pro_id = $_POST['pro_id'];
    $fav_pro_author = $_POST['pro_author'];

    $sql_check_dublicate = "SELECT * FROM favourite WHERE pro_id = :pro_id AND pro_author = :author AND mem_id = :mem_id";
    $stmt_dublicate = $conn->prepare($sql_check_dublicate);
    $stmt_dublicate->execute([
        ':pro_id' => $fav_pro_id,
        ':author' => $fav_pro_author,
        ':mem_id' => $mem_id
    ]);
    $rows_dublicate = $stmt_dublicate->rowCount();

    if ($rows_dublicate >= 1) {
        // header("location:favourites.php?AlreadyExist");

    } elseif ($mem_id == -1) {
        header('location:login.php?login_to_add_to_fav');
    } else {
        $fav_add_sql = "INSERT INTO favourite (pro_id, pro_author , mem_id) VALUES (:pro_id, :pro_author, :mem_id)";
        $stmt_add_fav = $conn->prepare($fav_add_sql);
        $stmt_add_fav->execute([
            ':pro_id' => $fav_pro_id,
            ':pro_author' => $fav_pro_author,
            ':mem_id' => $mem_id
        ]);
        $success = 'added';
        header("location:favourites.php?success_msg");
        $authidFetch = mem_pro_author($fav_pro_author);
        foreach ($authidFetch as $authData) {
            $authid = $authData['mem_id'];
            $sqlNotif = "INSERT INTO notification (notificationFor,notificationFrom, pro_id,type) VALUES (:notifFor,:notifFrom,:pro_id,:type)";
            $stmtNotif = $conn->prepare($sqlNotif);
            $stmtNotif->execute([
                ':notifFor' => $authid,
                ':notifFrom' => $mem_id,
                ':pro_id' => $fav_pro_id,
                ':type' => "Favourite"
            ]);
        }
    }
    // header('location=./favourites.php.php?Added_successfully');
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
    $sender = $_POST['user_name'];
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
    // ---------------------------------------------------- Notifications
    allNotifications($reciever, $sender, "Message");
    // allNotifications('55', '44', "Fucked Message");
    // ----------------------------------------------------END Notifications
}
// END Message System 
// Delete Member Product From Member Dashboard
function delet_mem_pro_from_dash($pro_id, $author)
{
    $conn = config();
    $author = $_POST['author'];
    $pro_id = $_POST['pro_id'];
    $mem_info_for_del = "SELECT * FROM mem_products WHERE mem_pro_id=:pro_id AND author = :pro_author";
    $stmt_dir_rm = $conn->prepare($mem_info_for_del);
    $stmt_dir_rm->execute([
        ':pro_id' => $pro_id,
        ':pro_author' => $author
    ]);
    $mem_pro_detail = $stmt_dir_rm->fetch(PDO::FETCH_ASSOC);
    $mem_pro_name = $mem_pro_detail['mem_pro_name'];
    $mem_pro_image = $mem_pro_detail['mem_pro_image'];
    unlink('admin/img/member_product/' . $mem_pro_name . "/" . $mem_pro_image);
    rmdir('admin/img/member_product/' . $mem_pro_name);

    $dele_query = "DELETE FROM mem_products WHERE mem_pro_id = :id AND author = :author";
    $stmt = $conn->prepare($dele_query);
    $stmt->execute([
        ':id' => $pro_id,
        ':author' => $author
    ]);
    if (isset($dele_query)) {
        header('location:dashboard-manage-item.php');
    }
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
    header('refresh:0;url=dashboard-manage-item.php?your_is_hiding');
}
// END Hide Member Products
// Show Back Member Products
function showProduct($pro_show_id)
{
    $conn = config();
    $pro_show_id = $_POST['pro_show_id'];
    $show_pro_sql = "UPDATE mem_products SET status= :status WHERE mem_pro_id=:pro_id";
    $stmt_show = $conn->prepare($show_pro_sql);
    $stmt_show->execute([
        ':status' => "publish",
        ':pro_id' => $pro_show_id
    ]);
    header('refresh:2;url=dashboard-manage-item.php');
}
// END Show Back Member Products
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
// Add To Cart 
if (isset($_POST['btn_add_to_cart'])) {

    $conn = config();
    $pro_id = $_POST['cart_pro_id'];
    $pro_author = $_POST['cart_pro_author'];
    $who = $_POST['who_adding_to_cart'];
    if ($who == '-1') {
        check_mem();
    } else {
        $add_to_cart_sql = "INSERT INTO cart (pro_id , pro_author, who_adding_id) VALUES (:pro_id, :pro_author ,:owner)";
        $stmt_cart = $conn->prepare($add_to_cart_sql);
        $stmt_cart->execute([
            ':pro_id' => $pro_id,
            ':pro_author' => $pro_author,
            ':owner' => $who
        ]);
        header('location:cart.php');
        $authidFetch = mem_pro_author($pro_author);
        foreach ($authidFetch as $authData) {
            $authid = $authData['mem_id'];
            $sqlNotif = "INSERT INTO notification (notificationFor,notificationFrom, pro_id,type) VALUES (:notifFor,:notifFrom,:pro_id,:type)";
            $stmtNotif = $conn->prepare($sqlNotif);
            $stmtNotif->execute([
                ':notifFor' => $authid,
                ':notifFrom' => $who,
                ':pro_id' => 0,
                ':type' => "Add To Cart"
            ]);
        }
    }
}
// END Add To Cart 
// Count Cart Products In Member Notification AND page
function Count_And_Fetch_cart()
{
    $conn = config();
    if (isset($_SESSION['member_id'])) {
        $user_id = $_SESSION['member_id'];
    } elseif (isset($_COOKIE['mem_user_id'])) {
        $user_id = $_COOKIE['mem_user_id'];
    } else {
        $user_id = -1;
    }
    $sql_cart = "SELECT * FROM cart WHERE who_adding_to_cart = :cart_owner";
    $stmt_cart = $conn->prepare($sql_cart);
    $stmt_cart->execute([
        ':cart_owner' => $user_id
    ]);
    $rows_cart = $stmt_cart->fetch(PDO::FETCH_ASSOC);
    $cart_product = $rows_cart['pro_id'];
    $cart_owner = $rows_cart['who_adding_id'];
    $sql_pro_cart = "SELECT * FROM mem_products WHERE mem_pro_id = :pro_id AND author=:who";
    $stmt_pro = $conn->prepare($sql_pro_cart);
    $stmt_pro->execute([
        ':pro_id' => $cart_product,
        ':who' => $cart_owner
    ]);
    $rows_product = $stmt_pro->fetch(PDO::FETCH_ASSOC);
    return $rows_product;
}
// END Count Cart Products In Member Notification AND page
// cart Page Fetch cart Products
function cart_page_fetch($mem_id)
{
    $conn = config();
    $sql_cart_page = "SELECT * FROM cart WHERE who_adding_id = :added_by_id";
    $stmt_cart = $conn->prepare($sql_cart_page);
    $stmt_cart->execute([
        ':added_by_id' => $mem_id
    ]);
    while ($rows_cart = $stmt_cart->fetch(PDO::FETCH_ASSOC)) {
        $resault_cart[] = $rows_cart;
    }
    // return $resault_cart;
    foreach ($resault_cart as $val_cart) {
        $cart_id = $val_cart['pro_id'];
        $cart_author = $val_cart['pro_author'];

        $sql_pro_tabel = "SELECT * FROM mem_products WHERE mem_pro_id = :pro_id AND author = :author";
        $stmt_pro = $conn->prepare($sql_pro_tabel);
        $stmt_pro->execute([
            ':pro_id' => $cart_id,
            ':author' => $cart_author
        ]);
        while ($rows_pro = $stmt_pro->fetch(PDO::FETCH_ASSOC)) {
            $resault_mem_pro[] = $rows_pro;
        }
    }
    return $resault_mem_pro;
}
// END cart Page Fetch cart Products
// Delete Cart 
function delete_cart_pro($cart_pro_id, $cart_adder)
{
    $conn = config();
    $del_cat_sql = "DELETE FROM cart WHERE pro_id = :pro_id AND who_adding_id = :adder_id";
    $stmt_del_cart = $conn->prepare($del_cat_sql);
    $stmt_del_cart->execute([
        ':pro_id' => $cart_pro_id,
        ':adder_id' => $cart_adder
    ]);
    header('location:cart.php?Successfully_Deleted');
}
// END Delete Cart
// Count Row Cart  
function count_row_cart($mem_id)
{
    $conn = config();
    $sql_row_cart = "SELECT * FROM cart WHERE who_adding_id = :adder";
    $stmt_row_cart = $conn->prepare($sql_row_cart);
    $stmt_row_cart->execute([
        ':adder' => $mem_id
    ]);
    $count_cart = $stmt_row_cart->rowCount();
    return $count_cart;
}
// END Count Row Cart  
// Total Added To Cart Count Row Cart  
function total_added_to_cart_count($pro_id)
{
    $conn = config();
    $sql_total_added = "SELECT * FROM cart where pro_id = :pro_id";
    $stmt_total = $conn->prepare($sql_total_added);
    $stmt_total->execute([
        ':pro_id' => $pro_id
    ]);
    $count_total_added_to_cart = $stmt_total->rowCount();
    return $count_total_added_to_cart;
}
// END Total Added To Cart Count Row Cart  
// Member Author Info That Was For Single Products Page
function mem_pro_author($author)
{
    $conn = config();
    $sql_pro_author = "SELECT * FROM members WHERE mem_user_name=:auth_name ";
    $stmt = $conn->prepare($sql_pro_author);
    $stmt->execute([
        ':auth_name' => $author
    ]);
    $rows_pro_author = $stmt->fetch(PDO::FETCH_ASSOC);
    $author_info[] = $rows_pro_author;

    return $author_info;
}
// ENDMember Author Info That Was For Single Products Page
// fetch_member Info By Id
function fetch_mem_info_by_id($mem_id)
{
    $conn = config();
    $sql_pro_author = "SELECT * FROM members WHERE mem_id=:mem_id";
    $stmt = $conn->prepare($sql_pro_author);
    $stmt->execute([
        ':mem_id' => $mem_id
    ]);
    $rows_pro_author = $stmt->fetch(PDO::FETCH_ASSOC);
    $author_info[] = $rows_pro_author;
    return $author_info;
}
// END fetch_member Info By Id
// Member Author Info That Was For Single Products Page
function mem_pro_author_by_id($mem_user_id)
{
    $conn = config();
    $sql_pro_author = "SELECT * FROM members WHERE mem_id=:id";
    $stmt = $conn->prepare($sql_pro_author);
    $stmt->execute([
        ':id' => $mem_user_id
    ]);
    $rows_pro_author = $stmt->fetch(PDO::FETCH_ASSOC);
    $author_info[] = $rows_pro_author;

    return $author_info;
}
// ENDMember Author Info That Was For Single Products Page
// Author Products For Single Products
function mem_pro_for_single_pro($author)
{
    $conn = config();
    $sql_auth_pros = "SELECT * FROM mem_products WHERE author=:auth LIMIT 0,3";
    $stmt = $conn->prepare($sql_auth_pros);
    $stmt->execute([
        ':auth' => $author
    ]);
    while ($rows_auth_pros = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $author_pros[] = $rows_auth_pros;
    }
    return $author_pros;
}
// END Author Products For Single Products
// Fetch Categories
function fetch_categories($category)
{
    $conn = config();
    $sql_fetch_cat = "SELECT * FROM category WHERE cat_id = :id AND status=:status";
    $stmt = $conn->prepare($sql_fetch_cat);
    $stmt->execute([
        ':id' => $category,
        ':status' => 'publish'
    ]);
    while ($rows_cat = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $cat_info[] = $rows_cat;
    }
    return $cat_info;
}
// END Fetch Categories
// fetch Comments
function comments($pro_id)
{
    $conn = config();
    $com_sql = "SELECT * FROM comments WHERE com_pro_id = :com_pro_id AND com_status = :status";
    $stmt = $conn->prepare($com_sql);
    $stmt->execute([
        ':com_pro_id' => $pro_id,
        ':status' => "pendding"
    ]);
    $count_comment = $stmt->rowCount();
    while ($rows_com = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $com_detail[] = $rows_com;
    }
    return $com_detail;
}
// END fetch Comments
// Count Comments
function count_comments($pro_id)
{
    $conn = config();
    $com_sql = "SELECT * FROM comments WHERE com_pro_id = :com_pro_id AND com_status = :status";
    $stmt = $conn->prepare($com_sql);
    $stmt->execute([
        ':com_pro_id' => $pro_id,
        ':status' => "pendding"
    ]);
    $count_comments = $stmt->rowCount();
    return $count_comments;
}
// Count Comments
// insert Replay First
function insert_replay($com_id, $author, $mem_id, $replay)
{
    $conn = config();
    $inserting = "INSERT INTO replay (com_pro_id,com_pro_author, com_sender_id, com_replay) VALUES (:com_pro_id, :com_pro_auth, :com_sender_id, :com_replay)";
    $stmt = $conn->prepare($inserting);
    $stmt->execute([
        ':com_pro_id' => $com_id,
        ':com_pro_auth' => $author,
        ':com_sender_id' => $mem_id,
        ':com_replay' => $replay
    ]);

    header("refresh:1url:single-product.php");
    $memInfo = mem_pro_author($author);
    foreach ($memInfo as $memData) {
        $senderInfo = $memData['mem_id'];

        $sqlNotif = "INSERT INTO notification (notificationFor,notificationFrom, pro_id,type) VALUES (:notifFor,:notifFrom,:pro_id,:type)";
        $stmtNotif = $conn->prepare($sqlNotif);
        $stmtNotif->execute([
            ':notifFor' => $senderInfo,
            ':notifFrom' => $mem_id,
            ':pro_id' => 0,
            ':type' => "Reply"
        ]);
    }
}
// END insert Replay First
// Fetch Replay Of Comment
function get_replay($com_id)
{
    $conn = config();
    $get_replay_sql = "SELECT * FROM replay WHERE com_pro_id = :com_pro_id";
    $stmt = $conn->prepare($get_replay_sql);
    $stmt->execute([
        ':com_pro_id' => $com_id
    ]);
    while ($rows_replay = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $rows_replay;
    }
    return $result;
}
// END Fetch Replay Of Comment

// Fetch All Author Products
function all_author_products($user)
{
    $conn = config();
    $slq_author_product = 'SELECT *, DATEDIFF(expireDate, CURDATE()) AS duration FROM mem_products WHERE author = :author';
    $stmt = $conn->prepare($slq_author_product);
    $stmt->execute([
        ':author' => $user
    ]);
    while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $res;
    }
    return $result;
}
// member_info_for_images
// Home Page Featured Popular Products
function popular_pro()
{
    $conn =  config();
    $home_pro_sql = "SELECT * FROM mem_products ORDER BY mem_pro_id DESC LIMIT 0,1";
    $stmt_pro = $conn->prepare($home_pro_sql);
    $stmt_pro->execute();
    while ($row_home_pro = $stmt_pro->fetch(PDO::FETCH_ASSOC)) {
        $resulter[] = $row_home_pro;
    }
    return $resulter;
}
// END Home Page Featured Popular Products
// Fetch Parchased Products List For Buyer
function fetchParchased($buyer_id)
{
    $conn = config();
    $sql_par = "SELECT * FROM parchased WHERE buyer_id = :buyer_id";
    $stmt_par = $conn->prepare($sql_par);
    $stmt_par->execute([
        ':buyer_id' => $buyer_id
    ]);
    while ($row_par = $stmt_par->fetch(PDO::FETCH_ASSOC)) {
        $resultPar[] = $row_par;
    }
    return $resultPar ?? 0;
}
// END Fetch Parchased Products List For Buyer
function fetchParchasedwithSeller($user)
{
    $conn = config();
    $sql_par = "SELECT * FROM parchased WHERE pro_author = :pro_author";
    $stmt_par = $conn->prepare($sql_par);
    $stmt_par->execute([
        ':pro_author' => $user
    ]);
    while ($row_par = $stmt_par->fetch(PDO::FETCH_ASSOC)) {
        $resultPar[] = $row_par;
    }
    return $resultPar ?? 0;
}
// END Fetch Parchased Products List For Buyer
// Fetch WithDrawal Products that is in Pendding
function fetch_Withdrawal($mem_id)
{
    // error_reporting(0);
    $conn = config();
    $retrive_withdrawal = "SELECT * FROM withdrawal WHERE with_buyer_id = :with_buyer_id";
    $stmt_with = $conn->prepare($retrive_withdrawal);
    $stmt_with->execute([
        ':with_buyer_id' => $mem_id
    ]);
    while ($row_withdrawal = $stmt_with->fetch(PDO::FETCH_ASSOC)) {
        $result_with[] = $row_withdrawal;
    }
    // **************IF $result_with was Empty Then Set Value 0 To It***********
    return $result_with ?? 0;
}
// END Fetch WithDrawal Products that is in Pendding
// Show WithDrawal For Owner of product
function showProductForOwnerwithdrawal($user)
{
    $conn = config();
    // $thereIsNoProducts;
    $retrive_withdrawal = "SELECT * FROM withdrawal WHERE with_pro_author = :with_pro_author";
    $stmt_with = $conn->prepare($retrive_withdrawal);
    $stmt_with->execute([
        ':with_pro_author' => $user
    ]);
    $rows_product = $stmt_with->rowCount();
    if ($rows_product >= 1) {
        while ($row_withdrawal = $stmt_with->fetch(PDO::FETCH_ASSOC)) {
            $result_with[] = $row_withdrawal;
        }
        return $result_with;
    } else {
    }
}
// END Fetch WithDrawal Products that is in Pendding
// Show Member Product By Id 
function showProductsById($product_id)
{
    $conn = config();
    $sql = "SELECT * FROM mem_products WHERE mem_pro_id= :mem_pro_id ";
    $stmt_pro = $conn->prepare($sql);
    $stmt_pro->execute([
        ':mem_pro_id' => $product_id
    ]);
    while ($row_products = $stmt_pro->fetch(PDO::FETCH_ASSOC)) {
        $resultPro[] = $row_products;
    }
    return $resultPro ?? 0;
}
// END Show Member Product By Id 
// Show Member Product with Author and Id 
function showProductWithAuthorandId($product_id, $user)
{
    $conn = config();
    $sql = "SELECT * FROM mem_products WHERE mem_pro_id= :mem_pro_id AND author = :author";
    $stmt_pro = $conn->prepare($sql);
    $stmt_pro->execute([
        ':mem_pro_id' => $product_id,
        ':author'
    ]);
    while ($row_products = $stmt_pro->fetch(PDO::FETCH_ASSOC)) {
        $resultPro[] = $row_products;
    }
    return $resultPro;
}
// END Show Member Product By Id 
// Notify User If SomeOne Want to Buy their Products
function productNotif($user_name)
{
    $conn = config();
    $sql_pro_notif = "SELECT * FROM withdrawal WHERE with_pro_author = :with_pro_author AND status = :status";
    $stmt_notif = $conn->prepare($sql_pro_notif);
    $stmt_notif->execute([
        ':with_pro_author' => $user_name,
        ':status' => 'pending'
    ]);
    $rows = $stmt_notif->rowCount();
    return $rows;
    $with_pro = $rows['with_pro_id'];
}
// END Notify User If SomeOne Want to Buy their Products
// ProductNotification Description
function NotificationDescription($with_pro)
{
    $conn = config();
    $sql_notifDescription = "SELECT * from mem_products WHERE mem_pro_id = :mem_pro_id";
    $stmt_pro_notif = $conn->prepare($sql_notifDescription);
    $stmt_pro_notif->execute([
        ':mem_pro_id' => $with_pro
    ]);
    while ($rows = $stmt_pro_notif->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $rows;
    }
    return $result;
}
// END ProductNotification Description
// product Notification
function proNotif($user)
{
    $conn = config();
    $sql_noti = "SELECT * FROM withdrawal WHERE with_pro_author=:author ";
    $stmt_with = $conn->prepare($sql_noti);
    $stmt_with->execute([
        ':author' => $user
    ]);
    while ($rows = $stmt_with->fetch(PDO::FETCH_ASSOC)) {
        $resault[] = $rows;
    }
    return $resault ?? 0;
}
// END product Notification
// Add To New Arrivels
function addToNewArrivel($arr_pro_id)
{
    $conn = config();
    $sql = "INSERT INTO newArrived (arr_pro_id)VALUE(:arrProId)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':arrProId' => $arr_pro_id
    ]);
}
// END Add To New Arrivels
function delet_arr($pro_id)
{
    $conn = config();
    $sql = "DELETE FROM newArrived WHERE arr_pro_id = :pro_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':pro_id' => $pro_id
    ]);
}
// Following Fetch
function fetchFollowing($mem_id)
{
    $conn = config();
    $fetchFollowing = "SELECT * from folllow WHERE sender = :sender";
    $stmt = $conn->prepare($fetchFollowing);
    $stmt->execute([
        ':sender' => $mem_id
    ]);
    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $rows;
    }
    return $result;
}
// END Following Fetch
// Followers Fetch
function fetchFollowers($mem_id)
{
    $conn = config();
    $fetchFollowers = "SELECT * from folllow WHERE reciever = :reciever";
    $stmt = $conn->prepare($fetchFollowers);
    $stmt->execute([
        ':reciever' => $mem_id
    ]);
    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $rows;
    }
    return $result;
}
// END Followers Fetch
// Started Change Member Status
function changeMemStatus($status, $mem_status_id)
{
    $conn = config();
    echo $status;
    echo $mem_status_id;
    $sql = "UPDATE members SET acc_status=:status WHERE mem_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':status' => $status,
        ':id' => $mem_status_id
    ]);
}
//END  Started Change Member Status
// Add Blog Post
function addBlogPost($title, $detail, $image, $user_id)
{
    $conn = config();
    // $image = $_FILES['image']['name'];
    $from = $_FILES['image']['tmp_name'];
    $dir = mkdir("admin/img/blog/" . $title);
    $to = "admin/img/blog/" . $title
        . '/' . $image;
    move_uploaded_file($from, $to);
    $sql = "INSERT INTO blog (blg_title,blg_detail,user_id,blg_img) VALUES (:title,:detail,:user,:img)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':title' => $title,
        ':detail' => $detail,
        ':user' => $user_id,
        ':img' => $image
    ]);
}
// END Add Blog Post
function showAllBlogPost($limit)
{
    $conn = config();
    $sql = "SELECT * FROM blog ORDER BY blg_id DESC limit 0,$limit";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $returnData[] = $data;
    }
    return $returnData;
}
// Listing Products
// Select Specific Post By Id
function showPostById($post_id)
{
    $conn = config();
    $sql = "SELECT * FROM blog WHERE blg_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':id' => $post_id
    ]);
    $rowData = $stmt->fetch(PDO::FETCH_ASSOC);
    $result[] = $rowData;
    return $result;
}
//END Select Specific Post By Id
// Member Cover Photo
function  memCoverPhoto($user)
{
    $conn = config();
    $sql = "SELECT * FROM member_cover_photo WHERE mem_user_name = :user";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':user' => $user
    ]);
    while ($rowData = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $rowData;
    }
    return $result;
}
// END Member Cover Photo
// --------------------------------------show Post By Author
function showPostByAuthor($author)
{
    $conn = config();
    $sql = "SELECT * FROM blog WHERE user_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':id' => $author
    ]);
    while ($rowData = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $rowData;
    }
    return $result;
}
// --------------------------------------END show Post By Author
// ---------------------------------------- Product List WITH LIMIT
function productsGrade($limit)
{
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

    $conn = config();
    $home_pro_sql = "SELECT * FROM mem_products WHERE pro_amount>=1 ORDER BY mem_pro_id ASC LIMIT 0,$limit";
    $stmt_pro = $conn->prepare($home_pro_sql);
    $stmt_pro->execute();
    while ($row_home_pro = $stmt_pro->fetch(PDO::FETCH_ASSOC)) {
        $id = $row_home_pro['mem_pro_id'];
        $image = $row_home_pro['mem_pro_image'];
        $name = $row_home_pro['mem_pro_name'];
        $detail = $row_home_pro['mem_pro_detail'];
        $price = $row_home_pro['price'];
        $category = $row_home_pro['category_id'];
        $tags = $row_home_pro['tag'];
        $author = $row_home_pro['author'];
        $views = $row_home_pro['pro_views'];
        $amount = $row_home_pro['pro_amount'];
    ?>
        <div class="col-lg-4 col-md-6">
            <!-- start .single-product -->
            <div class="product product--card " style="border-radius:15px 15px 15px 15px;">
                <div style="border-radius: 40px;" class="product__thumbnail">
                    <!-- Image & video Show -->
                    <?php
                    $exp = explode(".", $image);
                    $ext = end($exp);
                    if ($ext == "jpg" or $ext == "png" or $ext == "jpeg" or $ext == 'gif') { ?>
                        <img style="height: 
                                        150px;object-fit:contain;border-radius: 15px;" src="./admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>" alt="Product Image">

                    <?php } ?>
                    <!-- END Image & video Show -->
                    <div class="prod_btn">
                        <a href="single-product.php?id=<?php echo $id; ?>" class="transparent btn--sm btn--round">More Info</a>
                    </div>
                    <!-- end /.prod_btn -->
                </div>
                <!-- end /.product__thumbnail -->

                <div style="margin-bottom: -75px;" class="product-desc">
                    <a href="single-product.php?id=<?php echo $id ?>" class="product_title">
                        <h4><?php echo $name; ?></h4>
                    </a>
                    <ul class="titlebtm">
                        <!-- Author Image and Info -->
                        <?php
                        $conn = config();
                        $auth_sql = "SELECT * FROM members WHERE mem_user_name = :auth";
                        $stmt_auth = $conn->prepare($auth_sql);
                        $stmt_auth->execute([
                            ':auth' => $author
                        ]);
                        while ($rows_auth = $stmt_auth->fetch(PDO::FETCH_ASSOC)) {
                            $auth_id = $rows_auth['mem_id'];
                            $auth_img = $rows_auth['mem_image'];
                            $auth_user_name = $rows_auth['mem_user_name'];
                        ?>
                            <li>
                                <img class="auth-img" src="admin/img/member_avatars/<?php echo $auth_user_name; ?>/<?php echo $auth_img; ?>" alt="<?php echo $auth_user_name; ?>">
                                <p>
                                    <a href="public_auth.php?auth=<?php echo $auth_id;  ?>"><?php echo $auth_user_name; ?></a>
                                </p>
                            </li>
                        <?php } ?>
                        <!-- ---------------------------Total Product Amount -->
                        <li class="product_cat" style=" float:right;">
                            <span>&#128230; <?php echo "<span style='padding: 2px;'>$amount</span>"; ?></span><span style="font-size: 20px;">&#128065;<span style="font-size: 15px;"><?php echo $views; ?></span> </span>

                        </li>
                        <!-- ---------------------------END Total Product Amount -->
                    </ul>

                    <p><?php echo substr($detail, 0, 40) . "..."; ?>.</p>
                </div>
                <div class="product-purchase">

                    <!-- ----------------------Add To Favourite ----------------- -->
                    <?php
                    if ($author == $user) { ?>
                        <div class='fa fa-heart text-danger'> It's Your</div>
                        <!-- <button type="submit" name="btn_add_fav" class="btn btn--round btn-sm btn-light"><span class="lnr lnr-user text-danger"></span> -->
                        </button>
                    <?php } else {
                        require('module/add_to_favourite.php');
                    }
                    ?>
                    <!-- ----------------------END Add To Favourite -------------------->
                    <!--  ------------------------Add To Cart ---------------------------->
                    <?php // require('module/add_to_cart.php') 
                    ?>
                    <div class="sell">
                        <p>
                            <?php
                            if (isset($_POST['btn_add_to_cart'])) {
                                $pro_id = $_POST['cart_pro_id'];
                                $pro_author = $_POST['cart_pro_author'];
                                $who = $_POST['who_adding_to_cart'];
                            }
                            ?>
                        <form method="POST">
                            <input type="hidden" name="cart_pro_id" value="<?php echo $id; ?>">
                            <input type="hidden" name="cart_pro_author" value="<?php echo $author; ?>">
                            <input type="hidden" name="who_adding_to_cart" value="<?php echo $mem_id; ?>">
                            <!-- Count Total Added To Cart -->
                            <?php
                            if ($user == $author) { ?>
                                <div class="btn btn--round btn--bordered btn-sm btn-success"><span>&#10004;</span></div>
                            <?php } else { ?>
                                <button id="btn_add_to_cart" name="btn_add_to_cart" class="btn btn--round btn--bordered btn-sm btn-success"><span class="lnr lnr-cart">$<?php echo $price; ?></span> </button>
                            <?php }
                            ?>
                            <!-- Count Total Added To Cart -->
                            </p>
                        </form>
                    </div>
                    <!--  ------------------------END Add Cart---------------------------->
                    <div id="response"></div>
                </div>
                <!-- end /.product-purchase -->
            </div>
            <!-- end /.single-product -->
            <!-- New Style Started -->
            <!-- ENDED Style Started -->
        </div>
    <?php }
}
// END Listing Products
// author Products
function authorProducts($limit, $user)
{

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

    $home_pro_sql = "SELECT * FROM mem_products WHERE pro_amount>=1 AND author = :author ORDER BY mem_pro_id ASC LIMIT 0,$limit";
    $stmt_pro = $conn->prepare($home_pro_sql);
    $stmt_pro->execute([
        ':author' => $user
    ]);
    while ($row_home_pro = $stmt_pro->fetch(PDO::FETCH_ASSOC)) {
        $id = $row_home_pro['mem_pro_id'];
        $image = $row_home_pro['mem_pro_image'];
        $name = $row_home_pro['mem_pro_name'];
        $detail = $row_home_pro['mem_pro_detail'];
        $price = $row_home_pro['price'];
        $category = $row_home_pro['category_id'];
        $tags = $row_home_pro['tag'];
        $author = $row_home_pro['author'];
        $views = $row_home_pro['pro_views'];
        $amount = $row_home_pro['pro_amount'];

    ?>
        <div class="col-lg-4 col-md-6">
            <!-- start .single-product -->
            <div class="product product--card " style="border-radius:15px 15px 15px 15px;">
                <div style="border-radius: 40px;" class="product__thumbnail">
                    <!-- Image & video Show -->
                    <?php
                    $exp = explode(".", $image);
                    $ext = end($exp);
                    if ($ext == "jpg" or $ext == "png" or $ext == "jpeg" or $ext == 'gif') { ?>
                        <img style="height: 
                                        240px;object-fit: cover;border-radius: 15px 15px 15px 15px;" src="./admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>" alt="Product Image">

                    <?php } ?>
                    <!-- END Image & video Show -->
                    <div class="prod_btn">
                        <a href="single-product.php?id=<?php echo $id; ?>" class="transparent btn--sm btn--round">More Info</a>
                    </div>
                    <!-- end /.prod_btn -->
                </div>
                <!-- end /.product__thumbnail -->

                <div style="margin-bottom: -75px;" class="product-desc">
                    <a href="single-product.php?id=<?php echo $id ?>" class="product_title">
                        <h4><?php echo $name; ?></h4>
                    </a>
                    <ul class="titlebtm">
                        <!-- Author Image and Info -->
                        <?php
                        $conn = config();
                        $auth_sql = "SELECT * FROM members WHERE mem_user_name = :auth";
                        $stmt_auth = $conn->prepare($auth_sql);
                        $stmt_auth->execute([
                            ':auth' => $author
                        ]);
                        while ($rows_auth = $stmt_auth->fetch(PDO::FETCH_ASSOC)) {
                            $auth_id = $rows_auth['mem_id'];
                            $auth_img = $rows_auth['mem_image'];
                            $auth_user_name = $rows_auth['mem_user_name'];
                        ?>
                            <li>
                                <img class="auth-img" src="admin/img/member_avatars/<?php echo $auth_user_name; ?>/<?php echo $auth_img; ?>" alt="<?php echo $auth_user_name; ?>">
                                <p>
                                    <a href="public_auth.php?auth=<?php echo $auth_id;  ?>"><?php echo $auth_user_name; ?></a>
                                </p>
                            </li>
                        <?php } ?>
                        <!-- ---------------------------Total Product Amount -->
                        <li class="product_cat" style=" float:right;">
                            <span>&#128230; <?php echo "<span style='padding: 2px;'>$amount</span>"; ?></span><span style="font-size: 20px;">&#128065;<span style="font-size: 15px;"><?php echo $views; ?></span> </span>

                        </li>
                        <!-- ---------------------------END Total Product Amount -->
                    </ul>

                    <p><?php echo substr($detail, 0, 40) . "..."; ?>.</p>
                </div>
                <div class="product-purchase">

                    <!-- ----------------------Add To Favourite ----------------- -->
                    <?php
                    if ($author == $user) { ?>
                        <div class='fa fa-heart text-danger'> It's Your</div>
                        <!-- <button type="submit" name="btn_add_fav" class="btn btn--round btn-sm btn-light"><span class="lnr lnr-user text-danger"></span> -->
                        </button>
                    <?php } else {
                        require('module/add_to_favourite.php');
                    }
                    ?>
                    <!-- ----------------------END Add To Favourite -------------------->
                    <!--  ------------------------Add To Cart ---------------------------->
                    <div class="sell">
                        <p>
                            <?php
                            if (isset($_POST['btn_add_to_cart'])) {
                                $pro_id = $_POST['cart_pro_id'];
                                $pro_author = $_POST['cart_pro_author'];
                                $who = $_POST['who_adding_to_cart'];
                            }
                            ?>
                        <form method="POST">
                            <input type="hidden" id="cart_pro_id" name="cart_pro_id" value="<?php echo $id; ?>">
                            <input type="hidden" id="cart_pro_author" name="cart_pro_author" value="<?php echo $author; ?>">
                            <input type="hidden" id="who_adding_to_cart" name="who_adding_to_cart" value="<?php echo $mem_id; ?>">
                            <!-- Count Total Added To Cart -->
                            <?php
                            if ($user == $author) { ?>
                                <div class="btn btn--round btn--bordered btn-sm btn-success"><span>&#10004;</span></div>
                            <?php } else { ?>
                                <button id="btn_add_to_cart" name="btn_add_to_cart" class="btn btn--round btn--bordered btn-sm btn-success"><span class="lnr lnr-cart">$<?php echo $price; ?></span> </button>
                            <?php }
                            ?>
                            <!-- Count Total Added To Cart -->
                            </p>
                        </form>
                    </div>
                    <!--  ------------------------END Add Cart---------------------------->
                    <div id="response"></div>
                </div>
                <!-- end /.product-purchase -->
            </div>
            <!-- end /.single-product -->
            <!-- New Style Started -->
            <!-- ENDED Style Started -->
        </div>
    <?php    }
}
// END author Products
// Latest Products
function latestProducts($limit)
{
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

    $home_pro_sql = "SELECT * FROM mem_products WHERE pro_amount >=1 ORDER BY mem_pro_id DESC LIMIT 0,$limit";
    $stmt_pro = $conn->prepare($home_pro_sql);
    $stmt_pro->execute();
    while ($row_home_pro = $stmt_pro->fetch(PDO::FETCH_ASSOC)) {
        $id = $row_home_pro['mem_pro_id'];
        $image = $row_home_pro['mem_pro_image'];
        $name = $row_home_pro['mem_pro_name'];
        $detail = $row_home_pro['mem_pro_detail'];
        $price = $row_home_pro['price'];
        $category = $row_home_pro['category_id'];
        $tags = $row_home_pro['tag'];
        $views = $row_home_pro['pro_views'];
        $author = $row_home_pro['author'];
        $amount = $row_home_pro['pro_amount'];
    ?>
        <!-- start .col-md-4 -->
        <div class="col-lg-3 col-md-6">
            <!-- start .single-product -->
            <div class="product product--card product--card-small">

                <div class="product__thumbnail">
                    <!-- Image Size 240px -->
                    <?php
                    $exp = explode(".", $image);
                    $ext = end($exp);
                    if ($ext == "jpg" or $ext == "png" or $ext == "jpeg" or $ext == 'gif') { ?>
                        <img style="height: 150px;object-fit:contain;border-radius:15px;" src="./admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>" alt="Product Image">

                    <?php } else { ?>
                        <div class="card text-center ">
                            Please Upload valid Photo
                        </div>
                    <?php } ?>
                    <!-- END Image & video Show -->
                    <div class="prod_btn">
                        <a href="single-product.php?id=<?php echo $id; ?>" class="transparent btn--sm btn--round">More Info</a>
                    </div>
                    <!-- end /.prod_btn -->
                </div>
                <!-- end /.product__thumbnail -->

                <div class="product-desc">
                    <a href="single-product.php?id=<?php echo $id ?>" class="product_title">
                        <h4><?php echo $name; ?></h4>
                    </a>
                    <ul class="titlebtm">
                        <!-- Author Image and Info -->
                        <?php
                        $conn = config();
                        $auth_sql = "SELECT * FROM members WHERE mem_user_name = :auth";
                        $stmt_auth = $conn->prepare($auth_sql);
                        $stmt_auth->execute([
                            ':auth' => $author
                        ]);
                        while ($rows_auth = $stmt_auth->fetch(PDO::FETCH_ASSOC)) {
                            $auth_id = $rows_auth['mem_id'];
                            $auth_img = $rows_auth['mem_image'];
                            $auth_user_name = $rows_auth['mem_user_name'];
                        ?>
                            <li>
                                <img class="auth-img" src="admin/img/member_avatars/<?php echo $auth_user_name; ?>/<?php echo $auth_img; ?>" alt="<?php echo $auth_user_name; ?>">
                                <p>
                                    <a href="public_auth.php?auth=<?php echo $auth_id;  ?>"><?php echo $auth_user_name; ?></a>
                                </p> <span style="float: intial;">&#128230; <?php echo "<span style='padding: 2px;'>$amount</span>"; ?></span><span style="font-size: 20px; float:right;">&#128065;<span style="font-size: 15px; padding:3px;"><?php echo $views; ?></span> </span>
                            </li>
                        <?php } ?>
                        <!-- <li class="product_cat">
                                <a href="#">
                                    <span class="lnr lnr-book"></span><?php // echo  $tags; 
                                                                        ?></a>
                                            </li> -->
                    </ul>
                    <p><?php echo substr($detail, 0, 20) ?></p>

                </div>
                <!-- end /.product-desc -->
                <div class="product-purchase">
                    <!-- ----------------------Add To Favourite ----------------- -->
                    <?php
                    if ($author == $user) { ?>
                        <div class='fa fa-heart text-danger'> It's Your</div>
                        <!-- <button type="submit" name="btn_add_fav" class="btn btn--round btn-sm btn-light"><span class="lnr lnr-user text-danger"></span> -->
                        </button>
                    <?php } else {
                        require('module/add_to_favourite.php');
                    }
                    ?>
                    <!-- ----------------------END Add To Favourite -------------------->
                    <!--  ------------------------Add To Cart ---------------------------->
                    <div class="sell">
                        <p>
                            <?php
                            if (isset($_POST['btn_add_to_cart'])) {
                                $pro_id = $_POST['cart_pro_id'];
                                $pro_author = $_POST['cart_pro_author'];
                                $who = $_POST['who_adding_to_cart'];
                            }
                            ?>
                        <form method="POST">
                            <input type="hidden" id="cart_pro_id" name="cart_pro_id" value="<?php echo $id; ?>">
                            <input type="hidden" id="cart_pro_author" name="cart_pro_author" value="<?php echo $author; ?>">
                            <input type="hidden" id="who_adding_to_cart" name="who_adding_to_cart" value="<?php echo $mem_id; ?>">
                            <!-- Count Total Added To Cart -->
                            <?php
                            if ($user == $author) { ?>
                                <div class="btn btn--round btn--bordered btn-sm btn-success"><span>&#10004;</span></div>
                            <?php } else { ?>
                                <button id="btn_add_to_cart" name="btn_add_to_cart" class="btn btn--round btn--bordered btn-sm btn-success"><span class="lnr lnr-cart">$<?php echo $price; ?></span> </button>
                            <?php }
                            ?>
                            <!-- Count Total Added To Cart -->
                            </p>
                        </form>
                    </div>
                    <!--  ------------------------END Add Cart---------------------------->
                    <div id="response"></div>
                </div>
                <!-- end /.product-purchase -->
            </div>
            <!-- end /.single-product -->
        </div>
    <?php } ?>
<?php }
// END Latest Products
// Delete From Favourite
function deleteFromFavourite($fav_pro_id, $fav_pro_author)
{
    $conn = config();
    $sql = "DELETE FROM favourite WHERE pro_id = :id AND pro_author = :author";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':id' => $fav_pro_id,
        ':author' => $fav_pro_author
    ]);

    header('Refresh:1;favourites.php?removedFavourite');
}
// END Delete From Favourite
// User Notifications Page
function allNotifications($reciever, $sender, $type)
{
    $conn = config();
    $memInfo = mem_pro_author($sender);
    foreach ($memInfo as $memData) {
        $senderInfo = $memData['mem_id'];

        $sqlNotif = "INSERT INTO notification (notificationFor,notificationFrom, pro_id,type) VALUES (:notifFor,:notifFrom,:pro_id,:type)";
        $stmtNotif = $conn->prepare($sqlNotif);
        $stmtNotif->execute([
            ':notifFor' => $reciever,
            ':notifFrom' => $senderInfo,
            ':pro_id' => 0,
            ':type' => $type
        ]);
    }
}
// END User Notifications Page
// Update Amouunt Of Products
function updateProductAmount($id, $upAuthor, $amount)
{
    $conn = config();
    $sql = "UPDATE mem_products SET pro_amount = :amount WHERE mem_pro_id =:pro_id AND author = :auth";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':pro_id' => $id,
        ':auth' => $upAuthor,
        ':amount' => $amount
    ]);
    // $web = 1;
    // $mem_info = mem_pro_author($upAuthor);
    // foreach ($mem_info as $data) {
    //     $mem_id = $data['mem_id'];
    //     allNotifications(44, $web, "hELLO ");
    // }
}

// END Update Amouunt Of Products
// Member Freelancering 
function freelancerControl($freelid, $status)
{
    $conn = config();
    $seeFirst = freelancerStatus($freelid);
    foreach ($seeFirst as $freelanser) {
        $checkId = $freelanser['freel_mem_id'];
        if ($checkId) {
            echo 'exist';
        } else {
            echo 'need To Insert';
        }
    }
    $sql = "INSERT INTO freelancering (freel_mem_id, status) VALUES (:memid,:controls)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':memid' => $freelid,
        ':controls' => $status
    ]);
}
function freelancerStatus($mem_id)
{
    $conn = config();
    $sql = "SELECT * FROM freelancering WHERE freel_mem_id = :memid
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':memid' => $mem_id,
    ]);
    $rowCounts = $stmt->rowCount();
    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $results[] = $rows;
    }
    return $results;
}
// END Member Freelancering 
?>