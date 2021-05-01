<?php
if($num<1){
    echo "Please Put Up Correct Number";
}
else{ ?>

<tr style="background-color: #EDEDED; color: #003366; font-weight: bold;">
    <td>
        Category Name: 
    </td>
    <td> <input type="text" name="category_name" required="1"/></td>
</tr>
<tr>
    
    <td colspan="2" align="center"><b style="background-color:#99CCCC; padding-left: 14px; padding-right: 14px; color: #003366; margin-left: 40px; ">Sub Category Name</b></td>
</tr>
<?php
for($i=1;$i<=$num; $i++) {
    ?>
<tr style="font-weight: bold; line-height: 27px; color: #003366;">
    <td>Category <?php echo $i; ?> :</td>
    <td align="center"><input type="text" name="sub_category[]" required="1"></td>
</tr>
    <?php } ?>
<tr>
<input type="hidden" name="num" value="<?php echo $num; ?>">
<td align="center" colspan="2"><input type="submit" value="&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;"/></td>
</tr>

<?php }?>