<?php
error_reporting(0);
include 'dbconfig.php';
session_start();
include "design_1.php";
echo $top;
?>
<div id="midel">
    <fieldset>
        <legend>View Member</legend>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Session:</td><td>
                        <select required="1" name="session">
                            <option value="">Select Session</option>
                            <?php
                            $session = date('Y');
                            for ($i = ($session - 4); $i <= $session; $i++) {
                                ?>
                                <option value="<?php echo $i; ?>"><?php echo $i . "-" . ($i + 1); ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Dept:</td><td>
                        DNT<input type="radio" name="dept" value="DNT" required="">&nbsp;
                        CST<input type="radio" name="dept" value="CST">
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="btn1" value="Search"></td>
                </tr>
            </table>
        </form>

        <?php
        if ($_POST['btn1']) {
            $dept = $_POST['dept'];
            $session = $_POST['session'];
            $q1 = mysql_query("select * from tbl_member where session='$session' and dept='$dept'");
            if (mysql_num_rows($q1) > 0) {
                ?>
                <table style="background: #00748f; text-align: center; padding: 7px; border-radius:5px;" width="100%" cellspacing="1">
                    <tr style="background-color: #71c9e2; color: #FFF;">
                        <td>Member Name</td>
                        <td>Member Roll</td>
                        <td>Department</td>
                        <th>action</th>
                    </tr>
                    <?php while ($fetch = mysql_fetch_array($q1)) { ?>
                        <tr bgcolor="#eee" style="color:black;">
                            <td><?php echo $fetch['student_name']; ?></td>
                            <td><?php echo $fetch['student_roll']; ?></td>
                            <td><?php echo $fetch['dept']; ?></td>
                            <td width="45px">
                                <a href="update_book.php?tbl_book_id=<?php echo $fetch['tbl_book_id'] ?>" style="text-decoration: none;"  title="Click Here For Edit">
                                    <img src="images/edit.png" title="edit" />
                                </a>
                                <a href="edit_delete.php?tbl_book_id=<?php echo $fetch['tbl_book_id'] ?>" onclick="return resultDelete();"  title="Click here for Delete">
                                    <img src="images/drop.png" title="Delete" />
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <?php
            }
        }
        ?>
    </fieldset>
</div>

<?php
echo $bottom;
?>
