<form action="<?php echo base_url(); ?>admin/saveAccount" method="post">
<table style="margin-left: 344px;">
    <tr>
        <td colspan="2" align="center"><h3>PERSONAL ACCOUNT</h3></td>
    </tr>
    <tr>
        <td>Description:</td><td><input type="text" name="description" required="1" size="24"/></td>
    </tr>
    <tr>
        <td>Amount:</td><td><input type="text" name="amount" required="1" size="24"/></td>
    </tr>
    <tr>
    <td>Date:</td><td>
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
            echo "<div style='float:left;>'.$msg.</div>";
        } ?>
