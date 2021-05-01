<tr bgcolor="#93BC0C" style="font-family: arial; font-size: 13px; color: white;text-align: center; height: 24px;">
    <th>Serial No</th>
    <th>Product Name</th>
    <th>Description</th>
    <th>Warrenty</th>
    <th>Sell Price</th>
    <th>Discount</th>
    <th>Sell</th>
</tr>

<?php
$i=0;
$q=mysql_query("select * from tbl_stock where product_sl LIKE'%$search%' or product_name LIKE'%$search%'");
if(mysql_num_rows($q)<1){
echo "<tr><td align='center' colspan='6' style='color:brown; font-weight:bold;'>No record found!</td></tr>";
}
while($fetch=mysql_fetch_array($q)){
$i++;//this is for tr bgcolor//
if($i%2==0) { ?>
<tr bgcolor='#F8F8F8' class="tdcolor" style="height: 17px;">
    <?php }else{?>
<tr bgcolor='#EFEFEF' class="tdcolor"  style="height: 17px;"> <?php } ?>
    <td><?php echo $fetch['product_sl']; ?></td>
    <td><?php echo $fetch['product_name']; ?></td>
    <td><?php echo $fetch['description']; ?></td>
    <td><?php echo $fetch['warrenty']; ?></td>
    <td><input type="text" name="cover_price" value="<?php echo $fetch['cover_price']; ?>" size="8"></td>
    <td align="center"><input type="text" name="discount" value="0" size="2" maxlength="3" style="text-align: center;">%</td>
    <td><input type="hidden" name="stock_id" value="<?php echo $fetch['stock_id']; ?>"/>
        <input type="submit" value="Sell" style="background-color: transparent; border: none; text-decoration: underline; cursor: pointer; font-weight: bold; color: brown" title="Click here for sell."></td>
</tr>
<?php }?>
<tr>
    <td colspan="6">&nbsp;</td>
</tr>