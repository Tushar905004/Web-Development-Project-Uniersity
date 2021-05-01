<?php
error_reporting(0);
include 'dbconfig.php';
session_start();
include "design_1.php";
echo $top;
?>
<div id="midel">   
    <fieldset>
        <legend>Member Registration</legend>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Session:</td><td>
                        <select required="1" name="session">
                            <option value="">Select Session</option>
                            <?php
                            $session=date('Y');
                            for($i=($session-4);$i<=$session;$i++){
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i."-".($i+1); ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Student Name:</td><td><input type="text" name="student_name" required=""></td>
                </tr>
                <tr>
                    <td>Student Roll:</td><td><input type="text" name="student_roll" required=""></td>
                </tr>
                <tr>
                    <td>Dept:</td><td>
                        DNT<input type="radio" name="dept" value="DNT" required="">&nbsp;
                        CST<input type="radio" name="dept" value="CST">
                    </td>
                </tr>
                <tr>
                    <td>Password:</td><td><input type="text" name="password" required=""></td>
                </tr>
                <tr>
                <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
                    <td><input type="submit" name="btn1" value="Save"></td>
                </tr>
            </table>
        </form>

    <?php
    if($_POST['btn1']){
         $student_name=$_POST['student_name'];
         $student_roll=$_POST['student_roll'];
         $dept=$_POST['dept'];
         $session=$_POST['session'];
         $password=$_POST['password'];
         $member_id=$student_roll."".$session;
         $q1=mysql_query("select * from tbl_member where member_id='$member_id'");
         if(mysql_num_rows($q1)>0){
             echo "This Member Already Registered.";
         }
         else{
        mysql_query("insert into tbl_member()values('','$student_name','$student_roll','$dept','$password','$member_id','$session')");
        echo "Registration Successfull.";
         }
} ?>
</fieldset>
</div>

<?php
echo $bottom;
?>
