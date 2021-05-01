<?php
session_start();
include "dbconfig.php";

$user_name=$_POST['user_name'];
$password=$_POST['password'];
$q=mysql_query("select * from tbl_admin where user_name='$user_name' && password='$password'");
$fetch=mysql_fetch_array($q);

if(mysql_num_rows($q)=='1'){
$_SESSION['user_name']=$fetch['user_name'];
Header("Location: admin_home.php");
}
//else {
    //$_SESSION['exception']='User Name or Password Invalid !';
    //Header("Location: login.php");
       // echo '<h1>Error!</h1>The username and password combination you entered does not match the ones we have in the database.';
    //}
?>