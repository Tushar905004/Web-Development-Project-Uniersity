<?php
include 'dbconfig.php';
session_start();
include "design_1.php";
echo $top;
?>

<div id="midel">
    <form action="view_book_list.php" method="post">
        Select Category:
        <select name="category_id">
            <?php
            $q=mysql_query("select * from tbl_book_category");
            ;
            while($fetch=mysql_fetch_array($q)) {
    ?>

            <option value="<?php echo $fetch['category_id']; ?>"><?php echo $fetch['category_name']; ?></option>
    <?php } ?>
        </select>
        <input type="submit" value="Next" name="btn">
    </form>
</div>
<?php
echo $bottom;
?>