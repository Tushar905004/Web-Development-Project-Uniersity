<?php
error_reporting(0);
include 'dbconfig.php';
session_start();
include "design_1.php";
echo $top;
?>

<div id="midel">
    <?php
if(isset($_SESSION['message'])){
    echo "<span style='color:green; font-size:14px; font-weight:bold;'>".$_SESSION['message']."</span>"; 
    unset ($_SESSION['message']);
    }
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>Student ID:</td><td><input type="text" name="student_id"/></td>
            <input type="hidden" name="book_id" value="<?php echo $_GET['book_id']; ?>"/>
                <td><input type="submit" name="btn" value="Search"/></td>
            </tr>
        </table>
    </form>
<?php
if($_POST['btn']){
$book_id=$_POST['book_id'];
$member_id=$_POST['student_id'];
$q=mysql_query("select * from tbl_member where member_id='$member_id'");
$fetch=mysql_fetch_array($q);
if(mysql_num_rows($q)>0){
?>
    <table bgcolor="#f8f8f8">
        <tr class="font_style">
            <td>Student Name:</td><td><?php echo $fetch['student_name']; ?></td>
        </tr>
        <tr class="font_style">
            <td>Roll:</td><td><?php echo $fetch['student_roll']; ?></td>
        </tr>
        <tr class="font_style">
            <td>Department:</td><td><?php echo $fetch['dept']; ?></td>
        </tr>
        <tr class="font_style">
            <td>Student Id:</td><td><?php echo $fetch['member_id']; ?></td>
        </tr>
    </table>
    <table width="100%">
        <tr bgcolor="green" style="color: white; text-align: center;">
            <td colspan="6">Book History</td>
        </tr>
        <tr bgcolor="#42A8D7">
            <th>Book Id</th>
            <th>Book Name</th>
            <th>Author Name</th>
            <th>Publisher Name</th>
            <th>Borrow Date</th>
            <th>Receive</th>
        </tr>
<?php
$member_id=$fetch['member_id'];
$q1=mysql_query("select * from tbl_book_history where member_id='$member_id' and borrow='1'");
while($fetch1=mysql_fetch_array($q1)){
$book_id1=$fetch1['book_id'];
$q3=mysql_query("select * from tbl_book where book_id='$book_id1'");
$fetch2=mysql_fetch_array($q3);
?>
        <tr bgcolor="#fff">
            <td><?php echo $fetch1['book_id']; ?></td>
            <td><?php echo $fetch2['book_name']; ?></td>
            <td><?php echo $fetch2['author_name']; ?></td>
            <td><?php echo $fetch2['publisher_name']; ?></td>
            <td><?php echo $fetch1['borrow_date']; ?></td>
            <td><a href="return_book.php?history_id=<?php echo $fetch1['history_id']; ?>&& book_id=<?php echo $fetch1['book_id']; ?>">Receive</a></td>
        </tr>
<?php } ?>
    </table>

    <?php
}//end of mysql_num condition
else{
echo "No Information Found!";
}
}
?>
</div>
<?php
echo $bottom;
?>