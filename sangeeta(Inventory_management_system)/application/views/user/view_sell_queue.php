<h4><u>View sell queue</u> ....</h4>
<form action="<?php echo base_url(); ?>user/send_memo_creator" method="post">
    <table  cellspacing="1" width="99%" cellspacing="0" border="0" style="text-align: center;">
        <tbody>
        <thead>
            <tr id="chkrow" style="background:-moz-linear-gradient(#C3D9FF,#C3D9FF); color: #003366; height: 28px; text-align: center; font-size: 14px;">
                <th>Product Sl</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Warrenty</th>
                <th>Sell Price</th>
            </tr>
            <?php
            $i=1;
            $sum=0;
            $shop_id=$this->session->userdata('shop_id');
            $q=mysql_query("select * from tbl_tmp_cart");
            while ($fetch=mysql_fetch_array($q)) {
                $stock_id=$fetch['stock_id'];
                $q1=mysql_query("select * from tbl_stock where stock_id='$stock_id' and shop_id='$shop_id'");
                while($fetch1=mysql_fetch_array($q1)) {
                    if($i%2==0) {
                        ?>
            <tr bgcolor="#E1EFF7">
                            <?php } else { ?>
            <tr bgcolor="#ffffff">
                            <?php } ?>
        <input type="hidden" name="stock_id[]" value="<?php echo $fetch1['stock_id']; ?>">
        <input type="hidden" name="buy_price[]" value="<?php echo $fetch1['buy_price']; ?>">
        <input type="hidden" name="sub_id[]" value="<?php echo $fetch1['sub_id']; ?>">
        <td><?php echo $fetch1['product_sl']; ?></td>
        <td><?php echo $fetch1['product_name']; ?>
            <input type="hidden" name="product_name[]" value="<?php echo $fetch1['product_name']; ?>">
            <input type="hidden" name="product_sl[]" value="<?php echo $fetch1['product_sl']; ?>">
        </td>
        <td>
            <input type="hidden" name="description[]" value="<?php echo $fetch1['description']; ?>">
                    <?php echo $fetch1['description']; ?>
        </td>
        <td>
            <input type="hidden" name="warrenty[]" value="<?php echo $fetch1['warrenty']; ?>">
                    <?php echo $fetch1['warrenty']; ?>
        </td>
        <td>
            <input type="text" name="cover_price[]" value="<?php echo  $fetch1['cover_price']; ?>" size="11" style="text-align: center; background: #FEF8B6; color: blue; border: none; border-radius:5px;" required>
            <input type="hidden" name="sub_id[]" value="<?php echo $fetch1['sub_id']; ?>">
        </td>
        </tr>
                <?php  $i++;
            }
        }
        ?>
        <tr>
            <td colspan="6" style="height: 29px; background: white; color: black; font-weight: bold;" id="Display">Discount: <input type="text" name="discount" style=" color: green; font-weight: bold; text-align: center;" size="2" value="0">%</td>
        </tr>
        </thead>
        </tbody>
    </table>
    <span style="margin-left: 358px;"><input type="submit" value="Sells &amp; Memo Creation" class="btn_class" onclick="return confirm_btn();" title="এই বাটনে ক্লিক করলে পন্য বিক্রয় সম্পন্ন হযে যাবে।"></span>
</form>