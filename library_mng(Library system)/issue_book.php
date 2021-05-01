<?php
include 'dbconfig.php';
session_start();
include "design_1.php";
echo $top;
?>

<div id="midel">
    <?php
    //$q=mysql_query("select * from tbl_book_history LEFT JOIN tbl_member ON tbl_book_history.member_id=tbl_member.member_id");
    //$q=mysql_query("select * from tbl_member where member_id='$member_id'");
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
    <table bgcolor="#f8f8f8" style="border-radius:9px; background-color: #E3F0F5; text-align: left;">
        <tr class="font_style">
            <th>Student Name:</th><td><?php echo $fetch['student_name']; ?></td>
        </tr>
        <tr class="font_style">
            <th>Roll:</th><td><?php echo $fetch['student_roll']; ?></td>
        </tr>
        <tr class="font_style">
            <th>Department:</th><td><?php echo $fetch['dept']; ?></td>
        </tr>
        <tr class="font_style">
            <th>Student Id:</th><td><?php echo $fetch['member_id']; ?></td>
        </tr>
    </table>
    <table width="100%">
        <tr bgcolor="#E3F0F5" style="color: green; text-align: center; font-weight: bold; font-size: 19px;">
            <td colspan="5">Book History</td>
        </tr>
        <tr bgcolor="#42A8D7" style="color:white;">
            <th>Book Id</th>
            <th>Book Name</th>
            <th>Author Name</th>
            <th>Publisher Name</th>
            <th>Borrow Date</th>
        </tr>
<?php
$member_id=$fetch['member_id'];
$q1=mysql_query("select * from tbl_book_history where member_id='$member_id' and borrow='1'");
while($fetch1=mysql_fetch_array($q1)){
?>
        <tr>
            <td><?php echo $fetch1['book_id']; ?></td>
            <td><?php echo $fetch1['book_name']; ?></td>
            <td><?php echo $fetch1['author_name']; ?></td>
            <td><?php echo $fetch1['publisher_name']; ?></td>
            <td><?php echo $fetch1['borrow_date']; ?></td>
        </tr>
<?php } if(mysql_num_rows($q1)<1){?>
        <tr>
            <td colspan="5" align="center" style="color:red; font-weight: bold; font-size: 14px;">No Result Found!</td>
        </tr> <?php } ?>
    </table>
<?php if(mysql_num_rows($q1)<3){ ?>
    <table width="100%;">
  <tr bgcolor="#E3F0F5" style="color: green; text-align: center; font-weight: bold; font-size: 19px;">
            <td colspan="5">Issue Book</td>
        </tr>
        <tr bgcolor="#42A8D7" style="color:white;">
            <th>Book Id</th>
            <th>Book Name</th>
            <th>Author Name</th>
            <th>Publisher Name</th>
            <th>Issue</th>
        </tr>
<?php
$book_id=$_GET['book_id'];
$q3=mysql_query("select * from tbl_book where book_id='$book_id'");
$fetch2=mysql_fetch_array($q3);
?>
        <tr style="background-color: #ffffff;">
            <td><?php echo $fetch2['book_id']; ?></td>
            <td><?php echo $fetch2['book_name']; ?></td>
            <td><?php echo $fetch2['author_name']; ?></td>
            <td><?php echo $fetch2['publisher_name']; ?></td>
            <td>
                <a href="borrow.php?book_id=<?php echo $book_id; ?>&& std_id=<?php echo $member_id; ?>">Issue Book</a>
            </td>
        </tr>
    </table>
    <?php } else {
        echo "You should take only 3 books.";
    }
        ?>

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