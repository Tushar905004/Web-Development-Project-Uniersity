<?php
session_start();
unset($_SESSION['login']);
$_SESSION['message']='You Are Successfully logout..!';
include("login.php");
?>