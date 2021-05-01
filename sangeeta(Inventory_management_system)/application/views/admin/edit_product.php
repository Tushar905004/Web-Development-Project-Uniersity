<div class="add_shop">
    <fieldset style="width: 466px; height: auto; padding-left: 15px; padding-top:30px; font-weight: bold; font-family: arial; font-size: 13px;">
        <legend style="font-size:18px; color: #00B5FF;" align="center"> Edit New Product</legend>
        <form action="<?php echo base_url(); ?>admin/UpdateProductSave" method="post">
            <table class="add_shop_tbl">
                <tr>
                    <td>Vendor Name:</td><td>
                        <select name="vendor_id">
                            <?php
                            $qs=mysql_query("select * from tbl_vendor");

                            while($fetchs=mysql_fetch_array($qs)) {
                                ?>
                                <?php if($fetchs[vendor_id]==$result->vendor_id) { ?>
                            <option value="<?php echo $fetchs['vendor_id']; ?>" selected>
                                        <?php echo $fetchs['vendor_name']; ?>
                            </option>
                                    <?php } else { ?>
        
                            <option value="<?php echo $fetchs['vendor_id']; ?>">
                                        <?php echo $fetchs['vendor_name']; ?>
                            </option>
                                    <?php }
}
?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Date:</td><td><input type="text" name="date" value="<?php echo $result->date; ?>" required="1" id="inputField"/></td>
                </tr>
                <tr>
                    <td>Total Amount:</td><td><input type="text" name="total_amount" value="<?php echo $result->total_amount; ?>" required="1"/></td>
                </tr>
                <tr>
                    <td>Paid:</td><td><input type="text" name="paid" value="<?php echo $result->paid; ?>" required="1"/></td>
                </tr>
                <tr>
                    <td>Due:</td><td><input type="text" name="due" value="<?php echo $result->due; ?>" required="1"/></td>
                </tr>
                <tr>
                    <td>Note:</td><td><input type="text" name="note" value="<?php echo $result->note; ?>" required="1" /></td>
                </tr>

                <tr>
                <input type="hidden" name="buying_id" value="<?php echo $result->buying_id; ?>"/>
                <input type="hidden" name="month" value="<?php echo $result->month; ?>"/>
                <td colspan="2" align="center"><input type="submit" value="Update Data"/></td>
                </tr>
            </table>
        </form>
        <script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"inputField",
            dateFormat:"%d-%m-%Y"
        });
    };
</script>
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