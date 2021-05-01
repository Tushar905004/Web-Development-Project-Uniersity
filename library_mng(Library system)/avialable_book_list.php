<?php
include 'dbconfig.php';
session_start();
include "design_1.php";
echo $top;
?>
<div id="midel">
    <?php
    $category_id = $_POST['category_id'];
    $q = mysql_query("select * from tbl_book_category where category_id='$category_id'");
    $fetch = mysql_fetch_array($q);
    ?>
    <fieldset>
        <legend style="font-size: 18px; font-weight: bold;"><?php echo $fetch['category_name']; ?></legend>
        <?php
        $q1 = mysql_query("select * from tbl_book where category_id='$category_id' && available='1'");
        if (mysql_num_rows($q1) > 0) {
            ?>
            <table style="background: #00748f; text-align: center; padding: 7px; border-radius:5px;" width="100%" cellspacing="1">
                <tr style="background-color: #71c9e2; color: #FFF;">                    
                    <th>Book Name</th>
                    <th>Book Id</th>
                    <th>Author Name</th>
                    <th>Publisher Name</th>
                    <th>Issue Book</th>
                </tr>
                <?php while ($fetch1 = mysql_fetch_array($q1)) { ?>
                    <tr bgcolor="#eee" style="color:black;">
                        <td><?php echo $fetch1['book_name']; ?></td>
                        <td><?php echo $fetch1['book_id']; ?></td>
                        <td><?php echo $fetch1['author_name']; ?></td>
                        <td><?php echo $fetch1['publisher_name']; ?></td>
                        <td>
                            <a href="issue_book.php?book_id=<?php echo $fetch1['book_id']; ?>">Issue Book</a>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="5" align="center" style="color: #FFF; font-weight: bold;">Total <?php echo mysql_num_rows($q1); ?> Book Found.</td>
                </tr>
            <?php
            } else {
                echo "No book Found.";
            }
            ?>
        </table>
    </fieldset>
</div>

<?php
echo $bottom;
?>
