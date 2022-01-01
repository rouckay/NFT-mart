<?php
require_once('../admin/include/functions.php');
require_once('../admin/include/user_functions.php');

?>
<td><?php echo $pro_name; ?></td>
<td><img height="80px" width="80px" src="admin/img/member_product/<?php echo $pro_name; ?>/<?php echo $image; ?>"></td>
<td class="bold">$<?php echo $price; ?></td>
<td class="bold"><?php echo $amount_or_products; ?></td>
<td class="bold"><?php echo $buyer_name; ?></td>
<td>
    <button class="btn btn-sm btn-danger" id="btn_deny">Deny</button>
    <input type="hidden" id="with_pro_id" value="<?php echo $product_id; ?>">
    <input type="hidden" id="buyer_id" value="<?php echo $mem_id; ?>">
    <input type="hidden" id="buyer_name" value="<?php echo $buyer_name; ?>">
</td>
<td>
    <button class="btn btn-sm btn-success" id="btn_approve">Approve</button>
</td>