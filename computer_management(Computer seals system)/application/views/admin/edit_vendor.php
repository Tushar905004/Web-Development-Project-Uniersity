<div class="add_vendor">
<fieldset style="width: 466px; height: auto; padding-left: 15px; padding-top:30px; font-weight: bold; font-family: arial; font-size: 13px;">
 <legend style="font-size:18px; color: #00B5FF;" align="center">Edit New Vendor</legend>

<form action="<?php echo base_url(); ?>admin/UpdateVendorSave" method="post">
<table class="add_vendor_tbl">
    <tr>
        <td>Shop Name:</td><td><input type="text" name="vendor_name" value="<?php echo $result->vendor_name; ?>" required="1" /></td>
    </tr>
    <tr>
        <td>Shop Address:</td><td><input type="text" name="vendor_address" value="<?php echo $result->vendor_address; ?>" required="1"/></td>
    </tr>
    <tr>
    <input type="hidden" name="vendor_id" value="<?php echo $result->vendor_id; ?>"/>
        <td colspan="2" align="center"><input type="submit" value="Update Data"/></td>
    </tr>
</table>
</form>
<div style="margin-left: 40%; margin-top: 34px;">
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
