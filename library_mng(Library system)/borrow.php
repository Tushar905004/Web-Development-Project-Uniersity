<?php
include 'dbconfig.php';
$book_id=$_GET['book_id'];
$member_id=$_GET['std_id'];
mysql_query("update tbl_book SET available='0' where book_id='$book_id'");
$date=date('d/m/Y');
mysql_query("insert into tbl_book_history (book_id,member_id,borrow,borrow_date)values('$book_id','$member_id','1','$date')");
Header("Location:issue_book.php");
?>
