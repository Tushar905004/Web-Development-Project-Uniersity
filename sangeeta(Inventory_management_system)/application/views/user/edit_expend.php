<div class="add_vendor">
<fieldset style="width: 466px; height: auto; padding-left: 15px; padding-top:30px; font-weight: bold; font-family: arial; font-size: 13px;">
 <legend style="font-size:18px; color: #00B5FF;" align="center">Edit Expend </legend>
<form action="<?php echo base_url(); ?>user/UpdateExpendSave" method="post">
<table class="add_vendor_tbl">
    <tr>
        <td>Description:</td><td><input type="text" name="description" value="<?php echo $result->description; ?>" required="1" /></td>
    </tr>
    <tr>
        <td>Amount:</td><td><input type="text" name="amount" value="<?php echo $result->amount; ?>" required="1"/></td>
    </tr>
    <tr>
        <td>Date:</td><td><input type="text" name="date" value="<?php echo $result->date; ?>" required="1"/></td>
    </tr>
    <tr>
    <input type="hidden" name="expend_id" value="<?php echo $result->expend_id; ?>"/>
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
