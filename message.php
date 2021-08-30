<?php $curr_page = basename(__FILE__); ?>
<?php require_once "header.php"; ?>
<?php check_mem(); ?>
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
                            <a href="#">Message</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Messages Box</h1>
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

<!--================================
            START MESSAGE AREA
    =================================-->
<section class="message_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content_title">
                    <h3>Messages</h3>
                </div>
                <!-- end /.content_title -->
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->

        <div class="row">
            <div class="col-lg-5">
                <?php
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
                $current_user_logined = "SELECT * FROM members WHERE mem_id=:id";
                $stmt = $conn->prepare($current_user_logined);
                $stmt->execute([
                    ':id' => $user_id
                ]);
                $msg_sql = "SELECT * FROM messages WHERE reciever=:reciever";
                $stmt_msg = $conn->prepare($msg_sql);
                $stmt_msg->execute([
                    ':reciever' => $user_id
                ]);
                $count_msg = $stmt_msg->rowCount();


                ?>
                <div class="cardify messaging_sidebar">
                    <div class="messaging__header">
                        <div class="messaging_menu">
                            <a href="#" id="drop2" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="true">
                                <span class="lnr lnr-inbox"></span>Inbox
                                <span class="msg"><?php echo $count_msg; ?></span>
                                <span class="lnr lnr-chevron-down"></span>
                            </a>

                            <ul class="custom_dropdown messaging_dropdown dropdown-menu" aria-labelledby="drop2">
                                <li>
                                    <a href="#">
                                        <span class="lnr lnr-inbox"></span>Inbox</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="fa fa-star-o"></span>Starred</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="lnr lnr-dice"></span>Sent</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="lnr lnr-trash"></span>Trash</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end /.messaging_menu -->

                        <div class="messaging_action">
                            <span class="lnr lnr-trash"></span>
                            <span class="lnr lnr-sync"></span>

                            <a href="message-compose.php" class="btn btn--round btn--sm">
                                <span class="lnr lnr-pencil"></span>
                                <span class="text">Compose</span>
                            </a>
                        </div>
                        <!-- end /.messaging_action -->
                    </div>
                    <!-- end /.messaging__header -->

                    <div class="messaging__contents">
                        <div class="message_search">
                            <input type="text" placeholder="Search messages...">
                            <span class="lnr lnr-magnifier"></span>
                        </div>

                        <?php
                        while ($rows_msg = $stmt_msg->fetch(PDO::FETCH_ASSOC)) {
                            $msg_id = $rows_msg['msg_id'];
                            $user = $rows_msg['msg_user_name'];
                            $email = $rows_msg['msg_user_email'];
                            $detail = $rows_msg['msg_detail'];
                            $date = $rows_msg['msg_date'];
                            $status = $rows_msg['msg_status'];
                            $state = $rows_msg['msg_state'];
                        ?>
                        <div class="messages">
                            <div class="message active">
                                <div class="message__actions_avatar">
                                    <div class="actions">
                                        <span class="fa fa-star-o"></span>
                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="ch2">
                                            <label for="ch2">
                                                <span class="shadow_checkbox"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="avatar">
                                        <img src="images/notification_head5.png" alt="">
                                    </div>
                                </div>
                                <!-- end /.actions -->

                                <div class="message_data">
                                    <div class="name_time">
                                        <div class="name">
                                            <p><?php echo $user; ?></p>
                                            <span class="lnr lnr-envelope"></span>
                                        </div>

                                        <span class="time"><?php echo $date; ?></span>
                                        <p><?php echo substr($detail, 0, 36);  ?> ...</p>
                                    </div>
                                </div>
                                <!-- end /.message_data -->
                            </div>
                        </div>
                        <?php } ?>
                        <!-- end /.message -->
                        <?php if ($count_msg <= 0) { ?>
                        <div class="alert alert-info"><strong>Sorry!</strong>You Don't Have Message.</div>
                        <?php } ?>
                        <!-- end /.messages -->
                    </div>
                    <!-- end /.messaging__contents -->
                </div>
                <!-- end /.cardify -->
            </div>
            <!-- end /.col-md-5 -->

            <div class="col-lg-7">
                <div class="chat_area cardify">
                    <div class="chat_area--title">
                        <h3>Message with
                            <span class="name">Codepoet</span>
                        </h3>
                        <div class="message_toolbar">
                            <a href="#">
                                <span class="lnr lnr-flag"></span>
                            </a>
                            <a href="#">
                                <span class="lnr lnr-trash"></span>
                            </a>
                            <a href="#" id="drop1" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="true">
                                <img src="images/menu_icon.png" class="dropdown-trigger" alt="Menu icon">
                            </a>

                            <ul class="custom_dropdown dropdown-menu" aria-labelledby="drop1">
                                <li>
                                    <a href="#">Mark as unread</a>
                                </li>
                                <li>
                                    <a href="#">Dropdown link</a>
                                </li>
                                <li>
                                    <a href="#">All Attachments</a>
                                </li>
                            </ul>
                            <!-- end /.dropdown -->
                        </div>
                        <!-- end /.message_toolbar -->
                    </div>
                    <!-- end /.chat_area--title -->

                    <div class="chat_area--conversation">
                        <div class="conversation">
                            <div class="head">
                                <div class="chat_avatar">
                                    <img src="images/notification_head5.png" alt="Notification avatar">
                                </div>

                                <div class="name_time">
                                    <div>
                                        <h4>Codepoet</h4>
                                        <p>Mar 2, 2019 at 2:14 pm</p>
                                    </div>
                                    <span class="email">jonathan@domain.com</span>
                                </div>
                                <!-- end /.name_time -->
                            </div>
                            <!-- end /.head -->

                            <div class="body">
                                <p>Faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue egestas ac.
                                    Donec
                                    vitae leo at sem lobortis porttitor eu conse quat risus. Mauris sed congue orci.
                                    Donec ultrices faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan
                                    augue.</p>
                            </div>
                            <!-- end /.body -->

                        </div>
                        <!-- end /.conversation -->

                        <div class="conversation">
                            <div class="head">
                                <div class="chat_avatar">
                                    <img src="images/notification_head4.png" alt="Notification avatar">
                                </div>

                                <div class="name_time">
                                    <div>
                                        <h4>AazzTech</h4>
                                        <p>Mar 2, 2019 at 2:14 pm</p>
                                    </div>
                                    <span class="email">Me</span>
                                </div>
                                <!-- end /.name_time -->
                            </div>
                            <!-- end /.head -->

                            <div class="body">
                                <p>Faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue egestas ac.
                                    Donec
                                    vitae leo at sem lobortis porttitor eu conse quat risus. Mauris sed congue orci.
                                    Donec ultrices faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan
                                    augue.</p>
                            </div>
                            <!-- end /.body -->

                        </div>
                        <!-- end /.conversation -->

                        <div class="conversation">
                            <div class="head">
                                <div class="chat_avatar">
                                    <img src="images/notification_head5.png" alt="Notification avatar">
                                </div>

                                <div class="name_time">
                                    <div>
                                        <h4>Codepoet</h4>
                                        <p>Mar 2, 2019 at 2:14 pm</p>
                                    </div>
                                    <span class="email">jonathan@domain.com</span>
                                </div>
                                <!-- end /.name_time -->
                            </div>
                            <!-- end /.head -->

                            <div class="body">
                                <p>Faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue egestas ac.
                                    Donec
                                    vitae leo at sem lobortis porttitor.</p>
                                <div class="attachments">
                                    <div class="attachment_head">
                                        <p>
                                            <span class="lnr lnr-paperclip"></span> 2 Attachments
                                        </p>
                                        <a href="#">
                                            <span class="lnr lnr-download"></span> Download</a>
                                    </div>

                                    <div class="attachment">
                                        <ul>
                                            <li>
                                                <a href="images/att_av.jpg" class="venobox">
                                                    <img src="images/att_av.jpg" alt="image attachment">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="images/att_av2.jpg" class="venobox">
                                                    <img src="images/att_av2.jpg" alt="image attachment">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.body -->
                        </div>
                        <!-- end /.conversation -->

                    </div>
                    <!-- end /.chat_area--conversation -->

                    <div class="message_composer">
                        <div class="composer_field" id="trumbowyg-demo"></div>
                        <!-- end /.trumbowyg-demo -->

                        <div class="attached"></div>

                        <div class="btns">
                            <button class="btn send btn--sm btn--round">Reply</button>
                            <label for="att">
                                <input type="file" class="attachment_field" id="att" multiple>
                                <span class="lnr lnr-paperclip"></span>Attachment</label>
                        </div>
                        <!-- end /.message_composer -->
                    </div>
                    <!-- end /.message_composer -->
                </div>
                <!-- end /.chat_area -->
            </div>
            <!-- end /.col-md-7 -->
        </div>
        <!-- end /.row -->
    </div>
</section>
<!--================================
            END MESSAGE AREA
    =================================-->
<?php require_once "footer.php"; ?>