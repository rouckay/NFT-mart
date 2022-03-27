<div class="panel-group accordion" role="tablist" id="accordion">
    <div class="panel accordion__single" id="panel-one">
        <div class="single_acco_title">
            <h4>
                <a data-toggle="collapse" href="#collapse1" class="collapsed" aria-expanded="false" data-target="#collapse1" aria-controls="collapse1">
                    <span>See Author Medicine List</span>
                    <i class="lnr lnr-chevron-down indicator"></i>
                </a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse" aria-labelledby="panel-one" data-parent="#accordion">
            <div class="panel-body">
                <div class="withdraw_module withdraw_history">
                    <!-- <div class="withdraw_table_header">
                    </div> -->
                    <div class="table-responsive">
                        <table class="table withdraw__table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Expire Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $proAuthor = all_author_products($user);
                                foreach ($proAuthor as $proAuth) {
                                    $name = $proAuth['mem_pro_name'];
                                    $image = $proAuth['mem_pro_image'];
                                    $date = $proAuth['at'];
                                    $expiredays = $proAuth['duration'];
                                    $expireDate = $proAuth['expireDate'];
                                    $status = $proAuth['status'];
                                ?>
                                    <tr>
                                        <td><?php echo $name; ?></td>
                                        <td><img height="70px" width="70px" class="rounded" src="admin/img/member_product/<?php echo $name; ?>/<?php echo $image; ?>" alt="<?php echo $name; ?>"></td>
                                        <td>
                                            <?php
                                            if ($expiredays < 60) {
                                                echo  "<div style='padding:5px' class='text-center text-white bg-danger rounded'>$expireDate</div>";
                                            } else {
                                                echo  "<span style='padding:5px' class='text-center text-white bg-success rounded'>$expireDate</span>";
                                            }
                                            ?>

                                        </td>
                                        <td class="paid">
                                            <span><?php echo $status ?></span>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // const expireDate = document.querySelector('#expireDate').value;
    // console.log(expireDate)
</script>