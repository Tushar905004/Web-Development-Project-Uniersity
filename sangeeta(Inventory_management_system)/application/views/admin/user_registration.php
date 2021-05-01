<div class="register">
    <fieldset style="width: 466px; height:auto; padding-left: 74px; padding-top:30px; font-weight: bold; font-family: arial; font-size: 13px;">
        <legend style="font-size:20px; color: #00B5FF;">Employee Registration</legend>
        <form action="<?php echo base_url(); ?>admin/SaveUser" method="post" enctype="multipart/form-data">
            <table class="register_tbl">

        <tr>
            <td>Full Name:</td><td><input type="text" name="full_name" required="1"></td>
        </tr>
        <tr>
            <td>Father's Name:</td><td><input type="text" name="f_name" required="1"></td>
        </tr>
        <tr>
            <td>Age:</td><td><input type="text" name="age" required="1"></td>
        </tr>
        <tr>
            <td>Address:</td><td><input type="text" name="address" required="1"></td>
        </tr>
        <tr>
            <td>Mobile No:</td><td><input type="text" name="mobile_no" required="1"></td>
        </tr>
        <tr>
            <td>Email:</td><td><input type="text" name="email" required="1"></td>
        </tr>
        <tr>
            <td>Photo:</td><td><input type="file" name="picture" required="1"></td>
        </tr>
        <tr>
            <td>Join Date:</td><td>
                <select name="d">
                    <option value="">day</option>
                    <?php
                    for($i=1;$i<=31;$i++) {
                        echo "<option>$i</option>";
                    }
                    ?>
                </select>
                &nbsp;&nbsp;
                <select name="m">
                    <option value="">month</option>
                    <?php
                    for($j=1;$j<=12;$j++) {
                        echo "<option>$j</option>";
                    }
                    ?>

                </select>&nbsp;&nbsp;
                <select name="y">
                    <option value="">year</option>
                    <?php
                    $year=date('Y');
                    for($k=($year++);$k<=$year;$k++) {
                        echo "<option>$k</option>";
                    }
                    ?>

                </select>
            </td>
        </tr>
        <tr>
            <td>Shop Name:</td>
            <td>
                <select name="shop_id">
                <?php
                $q=mysql_query("select * from tbl_shop");
                while($row=mysql_fetch_array($q)){
                ?>
                
                    <option value="<?php echo $row['shop_id']; ?>"><?php echo $row['shop_name']; ?></option>
                   <?php } ?>
                </select>

            </td>
        </tr>
        <tr>
            <td>Sallery:</td><td><input type="text" name="sallery" required="1"></td>
        </tr>
        <tr>
            <td>User Name:</td><td><input type="text" name="user_name" required="1"></td>
        </tr>
        <tr>
            <td>Password:</td><td><input type="password" name="password" required="1"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Registration"><input type="reset" value="Clear">
            </td>
        </tr>
    </table>
</form>
        
    <?php if(isset($_SESSION['successMessage'])) {
            echo $_SESSION['successMessage'];
            unset($_SESSION['successMessage']);
        } ?>
    <?php if(isset($_SESSION['errMessage'])) {
            echo $_SESSION['errMessage'];
            unset($_SESSION['errMessage']);
        } ?>
        
</fieldset>
    </div>