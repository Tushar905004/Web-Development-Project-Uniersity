<div class="add_vendor">
<fieldset style="width: 466px; height: auto; padding-left: 15px; padding-top:30px; font-weight: bold; font-family: arial; font-size: 13px;">
 <legend style="font-size:18px; color: #00B5FF;" align="center">Add Customer</legend>

<form action="<?php echo base_url(); ?>admin/save_customer" method="post">
<table class="add_vendor_tbl">

    <tr>
        <td>Customer Name:</td><td><input type="text" name="cus_name" required="1"/></td>
    </tr>
    <tr>
        <td>Customer Address:</td><td><input type="text" name="address" required="1"/></td>
    </tr>
    <tr>
        <td>Mobile No:</td><td><input type="text" name="mob_no" required="1"/></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" value="Save Fixed Customer"/></td>
    </tr>
</table>
</form>

<div style="margin-left: 17%;">
<?php
if(isset($msg)){
    echo $msg;
}
?>
</div>
</fieldset>
</div>