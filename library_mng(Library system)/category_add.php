<?php
include 'dbconfig.php';

if (isset ($_POST['cat_add'])){
    $category_name=$_POST['catagory_name'];
    $q=mysql_query("insert into tbl_book_category values('','$category_name')");
    if ($q){
        echo 'seccess';
    }
 else {
        echo 'not seccess';
    }
}
?>
