<?php
error_reporting(0);
include 'dbconfig.php';
session_start();
include "design_1.php";
echo $top;
?>

<div id="midel">
    <form action="" method="post">
        Search Book:<input type="text" name="book_name">
        <input type="submit" value="Search" name="btn">
    </form>
    <?php
    if ($_POST['btn']) {
        ?>
        <table style="background: #00748f; text-align: center; padding: 7px; border-radius:5px;" width="100%" cellspacing="1">
            <tr style="background-color: #71c9e2; color: #FFF;">    
                <th>Book Id</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Publisher Name</th>
            </tr>
            <?php
            $book_name = $_POST['book_name'];
            $q = mysql_query("select * from tbl_book where book_name LIKE '%$book_name%'");
            while ($fetch = mysql_fetch_array($q)) {
                ?>
                <tr bgcolor="#eee" style="color:black;">
                    <td><?php echo $fetch['book_id']; ?></td>
                    <td><?php echo $fetch['book_name']; ?></td>
                    <td><?php echo $fetch['author_name']; ?></td>
                    <td><?php echo $fetch['publisher_name']; ?></td>
                </tr>
            <?php } ?>
            <?php
            if (mysql_num_rows($q) < 1) {
                echo "<tr><td style='color:red; font-size:14px;' colspan='4'>No Result Found!</td></tr>";
            }
            ?>
        </table>
<?php } ?>
</div>
<?php
echo $bottom;
?>