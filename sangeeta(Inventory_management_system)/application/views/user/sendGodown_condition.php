<?php
if($num<1){
    echo "<center>Please Put Up Number</center>";
} else { ?>
<tr style="    background: #8ECB90; color: white; font-size:14px; height: 27px; text-align: center;">
    <th>Product Sl</th>
    <th>Product Name/Model</th>
    <th>Description</th>
    <th>Buy Price</th>
    <th>Cover Price</th>
    <th>Warrenty</th>
</tr>
<?php
for($i=1;$i<=$num;$i++){
?>
<tr>
    <td><input type="text" name="product_sl[]" required="1" style="border:0; height: 23px;"></td>
    <td><input type="text" name="product_name[]" required="1" style="border:0; height: 23px;" value="<?php echo $this->session->userdata('category_name'); ?>"></td>
    <td><input type="text" name="description[]" style="border:0; height: 23px;" value=""></td>
    <td><input type="text" name="buy_price[]" value="" style="border:0; height: 23px;"></td>
    <td><input type="text" name="cover_price[]" required="1" style="border:0; height: 23px;"></td>
    <td><input type="text" name="warrenty[]" style="border:0; height: 23px;"></td>
</tr>
<?php } ?>
<tr>
<input type="hidden" name="num" value="<?php echo $num; ?>">
    <td colspan="6"  align="center"><input type="submit" value="Save Product" class="btn"/></td>
</tr>
<?php } ?>