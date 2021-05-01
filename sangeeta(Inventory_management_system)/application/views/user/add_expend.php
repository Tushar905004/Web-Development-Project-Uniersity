<div class="add_vendor">
<fieldset style="width: 466px; height: auto; padding-left: 15px; padding-top:30px; font-weight: bold; font-family: arial; font-size: 13px;">
 <legend style="font-size:18px; color: #00B5FF;" align="center">Other Expend Information</legend>

<form action="<?php echo base_url(); ?>user/save_expend" method="post">
<table class="add_vendor_tbl">

    <tr>
        <td>Description:</td><td><input type="text" name="description" required="1" size="34"/></td>
    </tr>
    <tr>
        <td>Amount:</td><td><input type="text" name="amount" required="1"/></td>
    </tr>
    <tr>
        <td>Date:</td><td>
            <select name="d">
                    <option value="">day</option>
                    <?php

                    for($i=1;$i<=31;$i++) {
                        if($i<10){
                        echo "<option>0$i</option>";
                    }else{
                        echo "<option>$i</option>";
                    }}
                    ?>
                </select>
                &nbsp;&nbsp;
                <select name="m">
                    <option value="">month</option>
                    <?php
                    for($j=1;$j<=12;$j++) {
                        if($j<10){
                        echo "<option>0$j</option>";
                    }else{
                        echo "<option>$j</option>";
                    }}
                    ?>

                </select>&nbsp;&nbsp;
                <select name="y">
                    <option value="">year</option>
                    <?php
                    $year=date('Y');
                    for($k=($year-1);$k<=$year;$k++) {
                        echo "<option>$k</option>";
                    }
                    ?>
                </select>

        </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" value="Save"/></td>
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