<?php
if($num<1){
    echo "Please Put Up Number";
} else { ?>
<tr style="    background: -moz-linear-gradient(#003366,#1092CE, #003366); color: white; font-size:14px; height: 27px; text-align: center;">
    <th>Product Sl</th>
    <th>Product Name</th>
    <th>Description</th>
    <th>Buy Price</th>
    <th>Cover Price</th>
    <th>Warrenty</th>
</tr>
<?php
for($i=1;$i<=$num;$i++){
?>
<tr>
    <td><input type="text" name="product_sl[]" required="1"></td>
    <td><input type="text" name="product_name[]" required="1"></td>
    <td><input type="text" name="description[]"></td>
    <td><input type="text" name="buy_price[]" required="1"></td>
    <td><input type="text" name="cover_price[]" required="1"></td>
    <td><input type="text" name="warrenty[]"></td>
</tr>
<?php } ?>
<tr>
<input type="hidden" name="num" value="<?php echo $num; ?>">
    <td colspan="6"  align="center"><input type="submit" value="Save Product" class="btn"/></td>
</tr>
<?php } ?>