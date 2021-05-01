<?php
include 'dbconfig.php';
session_start();
include "design_1.php";
echo $top;
?>
<div id="midel">
    <a onclick="javascript:history.go(-1)"><image src="images/back.png" title="Click Here To Back" /><strong  style="float: left; font-weight: bolder; font-size: 18px; margin-top: 8px;"> Back</strong></a><br/><br/><br/>
    
    <?php
    $tbl_book_id = $_GET['tbl_book_id'];
    $query = "select * from tbl_book where tbl_book_id='$tbl_book_id'";
    $q = mysql_query($query);
    ?>
    <?php
    while ($array = mysql_fetch_array($q)) {
        $tbl_book_id = $array['tbl_book_id'];
        $book_name = $array['book_name'];
        $book_id = $array['book_id'];
        $author_name = $array['author_name'];
        $publisher_name = $array['publisher_name'];
        ?>
        <form action="edit_delete.php" method="post">
            <input type="hidden" name="tbl_book_id" value="<?php echo $tbl_book_id ?>"/>
            <table>
                <tr>
                    <td>Book Name:</td>
                    <td>
                        <input type="text" name="book_name" value="<?php echo $book_name ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Book Id:</td>
                    <td>
                        <input type="text" name="book_id" value="<?php echo $book_id ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Author Name:</td>
                    <td>
                        <input type="text" name="author_name" value="<?php echo $author_name ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Publisher Name:</td>
                    <td>
                        <input type="text" name="publisher_name" value="<?php echo $publisher_name ?>" />
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="btn1" value="Save"></td>
                </tr>

            </table>
        <?php } ?>
    </form>
</div>
<?php
echo $bottom;
?>

