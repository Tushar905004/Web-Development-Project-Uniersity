
<form action="<?php echo base_url(); ?>admin/searchResultforPrint" method="post">
    <table align="center" cellspacing="1" width="59%" style="line-height: 20px; margin-left: 120px">
        <tr  bgcolor="#73C69D">
            <td colspan="2" align="center"><h3>Result Searching</h3></td>
        </tr>
        <tr bgcolor="#FFFFFF">
            <td>Enter Subject code:</td><td><input type="text" name="subject_code" value="" placeholder="Example: 4512"/></td>
        </tr>
        <tr bgcolor="#FFFFFF">
            <td colspan="2" align="center">OR</td></tr>
        <tr bgcolor="#FFFFFF">
            <td>Select subject:</td><td>
                <select name="subject_code1">
                    <option value="null">Select subject !</option>
                    <?php
                    foreach($result as $row) {
                        ?>
                    <option value="<?php echo $row->subject_code; ?>"><?php  echo $row->subject_name; ?> ( <?php echo $row->subject_code; ?> )</option>

                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr bgcolor="#FFFFFF">
            <td></td><td><input type="submit" value="Submit"/></td>
        </tr>
        <td colspan="2" align="center"><?php
            if(isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }



            ?>
        </td>
    </table>
</form>
