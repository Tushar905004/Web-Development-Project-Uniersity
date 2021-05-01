<?php 
error_reporting(0);
include 'dbconfig.php';
session_start();
include "design_1.php";
echo $top;
?>
<div id="midel">    <?php
        $category_id=$_POST['category_id'];
$q=mysql_query("select * from tbl_book_category where category_id='$category_id'");
$fetch=mysql_fetch_array($q);
    ?>
    <fieldset>
        <legend><?php echo $fetch['category_name']; ?></legend>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Book Name:</td><td><input type="text" name="book_name" required="1"></td>
                </tr>
                <tr>
                    <td>Book Id:</td><td><input type="text" name="book_id"required="1"></td>
                </tr>
                <tr>
                    <td>Author Name:</td><td><input type="text" name="author_name"required="1"></td>
                </tr>
                <tr>
                    <td>Publisher Name:</td><td><input type="text" name="publisher_name"required="1"></td>
                </tr>
                <tr>
                <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
                    <td><input type="submit" name="btn1" value="Save"></td>
                </tr>
            </table>
        </form>
    
    <?php
    if($_POST['btn1']){
        $category_id=$_POST['category_id'];
         $book_name=$_POST['book_name'];
         $book_id=$_POST['book_id'];
         $author_name=$_POST['author_name'];
         $publisher_name=$_POST['publisher_name'];
         $q1=mysql_query("select * from tbl_book where book_id='$book_id'");
         if(mysql_num_rows($q1)>0){
             echo "This book Already Inserted.";
         }
         else{
        mysql_query("insert into tbl_book(book_name,book_id,category_id,author_name,publisher_name,available)values('$book_name','$book_id','$category_id','$author_name','$publisher_name','1')");
        echo "Book Inserted Successfully.";
         }
} ?>
</fieldset>
</div>

<?php
echo $bottom;
?>
