<ul class="media-list thread-list">
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
            $comment_id = $com_data['com_id'];
            $mem_user_id = $com_data['com_sender_id'];
            $com_sender_inf = mem_pro_author_by_id($mem_user_id);
            foreach ($com_sender_inf as $sender_info) {
                $sender_name = $sender_info['mem_user_name'];
                $sender_image = $sender_info['mem_image'];
            }

        ?>
            <input type="hidden" id="pro_id_fetch_com" name="pro_id_fetch_com" value="<?php echo $pro_id ?>">
            <?php
            ?>
            <li class="single-thread">
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
                            <a href="#" class="reply-link">Reply</a>
                        </div>
                        <p><?php echo $com_data['com_detail']; ?>. </p>
                    </div>
                </div>
                <?php
                $conn = config();
                $get_replay_sql = "SELECT * FROM replay WHERE com_pro_id = :com_pro_id";
                $stmt = $conn->prepare($get_replay_sql);
                $stmt->execute([
                    ':com_pro_id' => $comment_id
                ]);
                while ($rows_replay = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $comment_replay = $rows_replay['com_replay'];
                    $replay_date = $rows_replay['replay_date'];
                ?>
                    <ul class="children">
                        <li class="single-thread depth-2">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object rounded" src="admin/img/member_avatars/<?php echo $user_name; ?>/<?php echo $user_image; ?>" alt="Commentator Avatar">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h4><?php echo $sender_name; ?></h4>
                                        <span><?php echo $replay_date; ?></span>
                                    </div>
                                    <p><?php echo $comment_replay; ?>. </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                <?php } ?>

                <div class="media depth-2 reply-comment">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object rounded" src="admin/img/member_avatars/<?php echo $user_name; ?>/<?php echo $user_image; ?>" alt="Commentator Avatar">
                        </a>
                    </div>
                    <div class="media-body">
                        <?php
                        if ($mem_id == '-1' || $user == '-1') { ?>
                            <div class="text text-warning"><strong>Sorry!</strong>You Have
                                To Sign In First</div>
                        <?php } else {
                        ?>
                            <form action="single-product.php?id=<?php echo $id; ?>" method="POST" class="comment-reply-form">
                                <input type="hidden" name="com_id" value="<?php echo $com_data['com_id']; ?>">
                                <textarea name="replay" class="bla" placeholder="Write your comment..."></textarea>
                                <button class="btn btn--md btn--round" name="btn_replay">Replay</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </li>
        <?php } ?>
    <?php } ?>
</ul>