<?php
include 'dbconfig.php';
session_start();
include "design_1.php";
echo $top;
?>
<div id="midel">
    <a onclick="javascript:history.go(-1)"><image src="images/back.png" title="Click Here To Back" /><strong  style="float: left; font-weight: bolder; font-size: 18px; margin-top: 8px;"> Back</strong></a><br/><br/><br/>

    <?php
    if ($_POST) {
        $tbl_book_id = $_POST['tbl_book_id'];
        $book_name = $_POST['book_name'];
        $book_id = $_POST['book_id'];
        $author_name = $_POST['author_name'];
        $publisher_name = $_POST['publisher_name'];

        $query = mysql_query("UPDATE tbl_book SET book_name = '$book_name', book_id = '$book_id', author_name = '$author_name', publisher_name = '$publisher_name'  WHERE tbl_book_id='$tbl_book_id'");
        echo 'Update Successfully';
//Header("Location: view_book_list.php");
    }

    /*if (($_POST['tbl_book_id'])) {
        $tbl_book_id = $_POST['tbl_book_id'];
        $q=mysql_query("DELETE FORM tbl_book where tbl_book_id='$tbl_book_id'");
        echo 'Delete Successfully';
    }*/
    if(isset($_GET['tbl_book_id'])){
        $tbl_book_id = $_GET['tbl_book_id'];
        $sql = "DELETE FROM tbl_book WHERE tbl_book_id='$tbl_book_id'";
        mysql_query($sql);
        echo "Delete Successfully";
    } else { 
        echo '0'; 
    }
    ?>
</div>
<?php
echo $bottom;
?>
