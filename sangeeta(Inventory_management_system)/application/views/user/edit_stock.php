<?php
if(isset($stock_id) ) {
 $count=count($stock_id);
    ?>
<input class="back_btn" type="button" value="back" onclick="javascript:history.go(-1);">
<h4  style="margin-left:291px; padding: 3px 12px 3px 12px; font-size: 17px;  float: left;background: -moz-linear-gradient(#003366, #1092CE); margin-top:15px;color:white;">Category Name: <?php
        echo $category_name?>
    &rarr; <?php echo $sub_category_name; ?></h4>
<br><br><br>
<span style="color:red; padding-left: 17px;">*Please edit the form and save it.
    <br> &nbsp;&nbsp;&nbsp;
    *আপনার প্রয়োজন অনুযায়ী পরিবর্তন করুন
</span>
<form action="<?php echo base_url(); ?>user/stock_edit_save" method="post">
    <table  cellspacing="1" width="99%" cellspacing="0" border="0" align="left" id="tblDisplay">
        <tbody>
            <tr  style="background:-moz-linear-gradient(#C3D9FF,#C3D9FF); color: #003366; height: 28px; text-align: center; font-size: 14px;">
                <th>Product Sl</th>
                <th>Peouct Name</th>
                <th>Description</th>
                <th>B.P.</th>
                <th>Warrenty</th>
                <th>Cover Price</th>
            </tr>
            <input type="hidden" name="count" value="<?php echo $count?>">
            <input type="hidden" name="category_name" value="<?php echo $category_name?>">
            <input type="hidden" name="sub_category_name" value="<?php echo $sub_category_name?>">
                <?php
            for($i=0;$i<$count;$i++){
                $q1=mysql_query("select * from tbl_stock where stock_id='$stock_id[$i]'");
                $fetch1=mysql_fetch_array($q1);
                        ?>
            <tr bgcolor="#003366">
                <input type="hidden" name="stock_id[]" value="<?php echo $stock_id[$i]; ?>">
                <input type="hidden" name="sub_id[]" value="<?php echo $fetch1['sub_id']; ?>">
                <td><input  style="width: 99%; text-align: center; background-color:#F3F3F3;"type="text" name="product_sl[]" value="<?php echo $fetch1['product_sl']; ?>"></td>
                <td><input style="width: 99%; text-align: center; background-color:#F3F3F3;" type="text" name="product_name[]" value="<?php echo $fetch1['product_name']; ?>"></td>
                <td><input style="width: 99%; text-align: center; background-color:#F3F3F3;" type="text" name="description[]" value="<?php echo $fetch1['description']; ?>"></td>
                <td><input style="width: 99%; text-align: center; background-color:#F3F3F3;" type="text" name="buy_price[]" value="<?php echo $fetch1['buy_price']; ?>"></td>
                <td><input style="width: 99%; text-align: center; background-color:#F3F3F3;" type="text" name="warrenty[]" value="<?php echo $fetch1['warrenty']; ?>"></td>
                <td><input style="width: 99%; text-align: center; background-color:#F3F3F3;" type="text" name="cover_price[]" value="<?php echo $fetch1['cover_price']; ?>"></td>
        </tr> <?php } ?>
        <tr>
            <td colspan="8" style="color:blue; background-color: white;">Goods Quantity : <?php echo $count; ?></td>
        </tr>
        </tbody>
    </table>
    <span style="margin-left: 426px;"><input type="submit" value="Update / Save" class="btn_class" name="edit_btn">
    </span>
</form>
    <?php }?>

  <?php if(isset($_SESSION['errMessage'])) {
        echo "<span style='float:left;margin-left:38%;'>".$_SESSION['errMessage']."</span>";
        unset($_SESSION['errMessage']);
    } ?>
<?php if(isset($_SESSION['successMessage'])) {
                echo "<span style='float:left;margin-left:38%;'>".$_SESSION['successMessage']."</span>";
        unset($_SESSION['successMessage']);
}