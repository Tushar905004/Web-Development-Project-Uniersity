<br>
<div style=" float: left;  height: 255px; padding: 23px; background: -moz-linear-gradient(#1269AD,#F8f8f8); margin-left: 210px; width: 483px; border-radius:4px; color: white;">
<fieldset style="width: auto; height: auto; padding-left: 80px; padding-top:30px; font-weight: bold; font-family: arial; font-size: 13px;">
 <legend style="font-size:18px; color: #00B5FF;" align="center">PERSONAL ACCOUNT</legend>
<form action="<?php echo base_url(); ?>admin/saveAccount" method="post">
    <table style="color:white; font-weight: bold; height: 185px;">
<!--    <tr>
        <td colspan="2" align="center"><h3 style="color:#003399; text-decoration: underline;">PERSONAL ACCOUNT</h3></td>
    </tr>-->
    <tr>
        <td style="color: #000000">Description:</td><td><input type="text" name="description" required="1" size="24"/></td>
    </tr>
    <tr>
        <td style="color: #000000">Amount:</td><td><input type="text" name="amount" required="1" size="24"/></td>
    </tr>
    <tr>
    <td style="color: #000000">Date:</td><td>
                <select name="d" required="1">
                    <option value="">day</option>
                    <?php
                    for($i=1;$i<=31;$i++) {
                        if($i<10){
                        echo "<option value='0$i'>$i</option>";
                        }
                        else{
                            echo "<option value='$i'>$i</option>";
                        }
                    }
                    ?>
                </select>
                &nbsp;
                <select name="m" required="1">
                    <option value="">month</option>
                    <?php
                    for($j=1;$j<=12;$j++) {
                        if($j<10){
                        echo "<option value='0$j'>$j</option>";
                        }
                        else{
                            echo "<option value='$j'>$j</option>";
                        }
                    }
                    ?>

                </select>&nbsp;
                <select name="y" required="1">
                    <option value="">year</option>
                    <?php
                    $year=date('Y');
                    for($k=($year-2);$k<=$year;$k++) {
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
<?php if(isset($msg)) {
            echo "$msg";
        } ?> 
 </fieldset> 
</div>

