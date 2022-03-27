<?php
$paramsId =  $_GET['auth'];
if (isset($_SESSION['member_id']) || isset($_SESSION['member_user']) || isset($_COOKIE['mem_user_id']) || isset($_COOKIE['mem_user_name'])) {
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
    $user_info = "SELECT * FROM members WHERE mem_id = :id";
    $stmt_us = $conn->prepare($user_info);
    $stmt_us->execute([
        ':id' => $user_id
    ]);
    $rows_us = $stmt_us->fetch(PDO::FETCH_ASSOC);
    $mem_user_name = $rows_us['mem_user_name'];
    $mem_email = $rows_us['mem_email'];
?>
    <div class="sidebar-card message-card">
        <div class="card-title" id="message_place">
            <h4>Product Information</h4>
        </div>
        <?php
        if (isset($_POST['send_msg'])) {
            $msg_user_name = $_POST['user_name'];
            $reciever = $_POST['reciever'];
            $msg_email = $_POST['mem_email'];
            $message = $_POST['message'];
            message_to_mem($msg_user_name, $msg_email, $message, $reciever);
        } ?>
        <div class="message-form">
            <form action="public_auth.php?auth=<?php echo $id; ?>&success_send" method="POST">
                <!-- Hidden Textbox -->
                <input type="hidden" name="reciever" value="<?php echo $id; ?>">
                <input type="hidden" name="user_name" value="<?php echo $mem_user_name; ?>">
                <input type="hidden" name="mem_email" value="<?php echo $mem_email; ?>">
                <!-- END Hidden Textbox -->
                <div class="form-group">
                    <textarea name="message" class="text_field" id="author-message" placeholder="Your message..."></textarea>
                </div>


                <?php
                echo $user_id == $paramsId ? '<div class="bg-warning btn-md">You Can not Send To Your Self!</div>' : "<div class='msg_submit'>
                    <button type='submit' name='send_msg' class='btn btn--md btn--round'>send
                        message</button>
                </div>" ?>
            </form>

        </div>
        <!-- end /.message-form -->
    </div>
<?php } else { ?>
    <div class="sidebar-card message-card">
        <div class="card-title">
            <h3>To Send Message Sign In First!</h3>
        </div>

        <aside class="sidebar support--sidebar">
            <a href="login.php" class="login_promot">
                <span class="lnr lnr-lock"></span>Login to Ask a Question</a>
        </aside>
    <?php } ?>