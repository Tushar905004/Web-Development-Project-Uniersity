<?php
session_start();
include 'dbconfig.php';
$book_id= $_GET['book_id'];
$history_id= $_GET['history_id'];
mysql_query("update tbl_book SET available='1' where book_id='$book_id'");
$date=date('d/m/Y');
mysql_query("update tbl_book_history SET borrow='0',return_date='$date' where history_id='$history_id'");
$_SESSION['message']="Successfully Received Book";
Header("Location:receive_book.php");
?>
