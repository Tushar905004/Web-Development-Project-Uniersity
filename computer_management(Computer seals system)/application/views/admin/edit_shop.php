<div class="add_shop">
<fieldset style="width: 466px; height: auto; padding-left: 15px; padding-top:30px; font-weight: bold; font-family: arial; font-size: 13px;">
    <legend style="font-size:18px; color: #00B5FF;" align="center"> Edit New SHOP</legend>
<form action="<?php echo base_url(); ?>admin/UpdateShopSave" method="post">
  <table class="add_shop_tbl">
    
    <tr>
        <td>Shop Name:</td><td><input type="text" name="shop_name" value="<?php echo $result->shop_name; ?>" required="1" /></td>
    </tr>
    <tr>
        <td>Shop Address:</td><td><input type="text" name="shop_address" value="<?php echo $result->shop_address; ?>" required="1"/></td>
    </tr>
    <tr>
    <input type="hidden" name="shop_id" value="<?php echo $result->shop_id; ?>"/>
        <td colspan="2" align="center"><input type="submit" value="Update Data"/></td>
    </tr>
 </table>
</form>
<div style="margin-left:50%">
    <?php if(isset($_SESSION['successMessage'])) {
            echo $_SESSION['successMessage'];
            unset($_SESSION['successMessage']);
        } ?>
    <?php if(isset($_SESSION['errMessage'])) {
            echo $_SESSION['errMessage'];
            unset($_SESSION['errMessage']);
        } ?>
</div>
</fieldset>
</div>
