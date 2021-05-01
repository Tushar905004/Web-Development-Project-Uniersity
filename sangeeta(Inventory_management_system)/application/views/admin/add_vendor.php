<font face="SolaimanLipi" color="green" size="3">* যাদের কাছ থেকে পণ্য ক্রয় করা হবে তাদের ইনফরমেশন এখানে উল্লেখ করবেন।</font>
<div style=" float: left;  height: 255px; padding: 23px; background: -moz-linear-gradient(#1269AD,#F8f8f8); margin-left: 210px; width: 483px; border-radius:4px; color: white;">
<fieldset style="width: 466px; height: auto; padding-left: 15px; padding-top:30px; font-weight: bold; font-family: arial; font-size: 13px;">
 <legend style="font-size:18px; color: #00B5FF;" align="center">Add Vendor</legend>

<form action="<?php echo base_url(); ?>admin/save_vendor" method="post">
<table class="add_vendor_tbl">

    <tr>
        <td style="color: #000000">Shop/Vendor Name:</td><td><input type="text" name="vendor_name" required="1"/></td>
    </tr>
    <tr>
        <td style="color: #000000">Vendor Address:</td><td><input type="text" name="vendor_address" required="1"/></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" value="Save Vendor"/></td>
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