<div class="add_shop">
    <fieldset style="width: 566px;height: auto; padding-left: 5px; padding-top:30px; font-weight: bold; font-family: arial; font-size: 13px;">
        <legend style="font-size:18px; color: #00B5FF;" align="center">Add Product buying</legend>
        <form action="<?php echo base_url(); ?>admin/SaveProduct" method="post">
            <table class="add_shop_tbl">

                <tr>
                    <td>Vendor Name(id):</td><td>
                        <select name="vendor_id" required="1">
                            <option value="">Slect Vendor Name</option>
                            <?php
                            $q=mysql_query("select * from tbl_vendor");
                            while($fetch=mysql_fetch_array($q)) { ?>
                            <option value="<?php echo $fetch['vendor_id']; ?>"><?php echo $fetch['vendor_name']; ?></option>
                                <?php } ?>
                        </select>*
                    </td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td>
                        <input type="text" size="12" id="inputField" name="date" />
                    </td>
                </tr>
                <tr>
                    <td>Total Amount:</td><td><input type="text" name="total_amount" required="1"/>*</td>
                </tr>
                <tr>
                    <td>Paid:</td><td><input type="text" name="paid" required="1"/>*</td>
                </tr>
                <tr>
                    <td>Due:</td><td><input type="text" name="due" required="1"/>*</td>
                </tr>
                <tr>
                    <td>Note:</td><td><input type="text" name="note"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Save Product "/></td>
                </tr>
            </table>
        </form>

        <?php if(isset($msg)) {
            echo "<div style='float:left; margin-left:150px;>'.$msg.</div>";
        } ?>
    </fieldset>
</div>
<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"inputField",
            dateFormat:"%d-%m-%Y"
        });
    };
</script>

