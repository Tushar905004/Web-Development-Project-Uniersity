<?php
error_reporting(0);
include 'dbconfig.php';
session_start();
include "design_1.php";
echo $top;
?>

<div id="midel">
    <form action="" method="post">
        <table>
            <tr>
                <td>Book Category:</td><td><input type="text" name="book_category" required="" size="28">
                    <input type="submit" value="Add Category" name="category_btn">
                </td>
            </tr>
        </table>
    </form>
    <?php
    if($_POST['category_btn']){
    $category_name=$_POST['book_category'];
    $q=mysql_query("select * from tbl_book_category where category_name='$category_name'");
    if(mysql_num_rows($q)>0){
        echo "This Category Already Registered.";
    }
    else{
        $q1=mysql_query("insert into tbl_book_category ()values('','$category_name')");
    }
    ?>
    
<?php } ?>
 <table align="center" width="68%" style="background-color: #00748f; border-radius:8px 8px 0 0; text-align: center; font-family: arial; font-size: 12px;">
        <tr>
            <th style="color: #FFF; padding: 5px;">Category Name</th>
        </tr>

        <?php
        $q2=mysql_query("select * from tbl_book_category");
        while($fetch=mysql_fetch_array($q2)){
    ?>
        <tr align="center">
            <td style="background-color: #fff; border-radius:3px; padding: 3px;"><?php echo $fetch['category_name']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>
<?php
echo $bottom;
?>