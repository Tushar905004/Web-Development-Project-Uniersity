<?php
$q=mysql_query("select * from tbl_user where user_id='$user_id'");
$fetch=mysql_fetch_array($q);
?>
<div class="register">
    <fieldset style="width: 466px; height:auto; padding-left: 74px; padding-top:30px; font-weight: bold; font-family: arial; font-size: 13px;">
        <legend style="font-size:20px; color: #00B5FF;">Employee Registration</legend>
        <form action="<?php echo base_url(); ?>admin/EditEmployeeSaved" method="post" enctype="multipart/form-data">
            <table class="register_tbl">

        <tr>
            <td>Full Name:</td><td><input type="text" name="full_name" required="1" value="<?php echo $fetch['full_name']; ?>"></td>
        </tr>
        <tr>
            <td>Father's Name:</td><td><input type="text" name="f_name" required="1" value="<?php echo $fetch['f_name']; ?>"></td>
        </tr>
        <tr>
            <td>Age:</td><td><input type="text" name="age" required="1" value="<?php echo $fetch['age']; ?>"></td>
        </tr>
        <tr>
            <td>Address:</td><td><input type="text" name="address" required="1" value="<?php echo $fetch['address']; ?>"></td>
        </tr>
        <tr>
            <td>Mobile No:</td><td><input type="text" name="mobile_no" required="1"  value="<?php echo $fetch['mobile_no']; ?>"></td>
        </tr>
        <tr>
            <td>Email::</td><td><input type="text" name="email" required="1"  value="<?php echo $fetch['email']; ?>"></td>
        </tr>
        <tr>
            <td>Join Date:</td><td>
                <?php 

                ?>
                <select name="d">
                    <option value="">day</option>
                    <?php
                    for($i=1;$i<=31;$i++) {
                        if($i==$fetch['d']){
                        echo "<option  selected>$i</option>";
                        }else{
                        echo "<option>$i</option>";
                        }
                    }
                    ?>
                </select>
                &nbsp;&nbsp;
                <select name="m">
                    <option value="">month</option>
                    <?php
                    for($j=1;$j<=12;$j++) {
                        if($j==$fetch['m']){
                        echo "<option selected>$j</option>";
                        }else{
                         echo "<option>$j</option>";
                        }
                    }
                    ?>

                </select>&nbsp;&nbsp;
                <select name="y">
                    <option value="">year</option>
                    <?php
                    $year=date('Y');
                    for($k=($year-2);$k<=$year;$k++) {
                        if($k==$fetch['y']){
                        echo "<option selected>$k</option>";
                        }else{
                            echo "<option>$k</option>";
                        }
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
                  if($fetch['shop_id']==$row['shop_id']){
                ?>

                    <option  selected value="<?php echo $row['shop_id']; ?>"><?php echo $row['shop_name']; ?></option>
                   <?php }else{ ?>
<option  value="<?php echo $row['shop_id']; ?>"><?php echo $row['shop_name']; ?></option>
                   <?php } }?>
                </select>

            </td>
        </tr>
        <tr>
            <td>Sallery:</td><td><input type="text" name="sallery" required="1" value="<?php echo $fetch['sallery']; ?>"></td>
        </tr>
        <tr>
            <td>User Name:</td><td><input type="text" name="user_name" required="1" value="<?php echo $fetch['user_name']; ?>"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="hidden" name="user_id" value="<?php echo $fetch['user_id'];?>"/>
                <input type="submit" value="Update">
            </td>
        </tr>
    </table>
</form>

</fieldset>
    </div>