<div class="add_vendor">
<fieldset style="width: 466px; height: auto; padding-left: 15px; padding-top:30px; font-weight: bold; font-family: arial; font-size: 13px;">
 <legend style="font-size:18px; color: #00B5FF;" align="center">Edit New Vendor</legend>

<form action="<?php echo base_url(); ?>admin/UpdateCustomerSave" method="post">
<table class="add_vendor_tbl">
    <tr>
        <td>Customer Name:</td><td><input type="text" name="cus_name" value="<?php echo $result->cus_name; ?>" required="1" /></td>
    </tr>
    <tr>
        <td>Customer Address:</td><td><input type="text" name="address" value="<?php echo $result->address; ?>" required="1"/></td>
    </tr>
        <tr>
        <td>Mobile No:</td><td><input type="text" name="mob_no" value="<?php echo $result->mob_no; ?>" required="1"/></td>
    </tr>
    <tr>
    <input type="hidden" name="customer_id" value="<?php echo $result->customer_id; ?>"/>
        <td colspan="2" align="center"><input type="submit" value="Update Data"/></td>
    </tr>
</table>
</form>
</fieldset>
</div>
