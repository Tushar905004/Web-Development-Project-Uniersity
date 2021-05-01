<div style="float: left; margin-left: 20px; color: black">
    <fieldset style="width: 878px; padding-left: 14px; padding-top:30px; padding-right: 12px; padding-bottom: 12px; font-weight: normal; font-family: arial; font-size: 13px;">
        <legend style="font-size:18px; color: #00B5FF;" align="center">Password Recovery System</legend>
            <table width="100%" bgcolor="#ffffff">
                <tr bgcolor="#003366" align="center" style="color:white; height: 32px;">
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th>Email Address</th>
            <th>Mobile No</th>
            <th>New Password</th>
            <th>Recover</th>
        </tr>
        <?php
        $q=mysql_query("select * from tbl_user");
        while($row=mysql_fetch_array($q)){
        ?>
        <tr bgcolor="#d4d4d4" align="center">
            <form action="<?php echo base_url(); ?>admin/password_update" method="post" enctype="multipart/form-data">
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['full_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['mobile_no']; ?></td>
        <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
        <td><input type="password" name="password" required="1" maxlength="20"/></td>
            <td><input type="submit" value="Recover"/></td>
        </form>
            </tr>
        
        <?php } ?>
    </table>
        <div style="margin-left: 40%; margin-top: 29px; ">
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
