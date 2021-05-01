<?php
include 'dbconfig.php';
session_start();
include "design_1.php";
echo $top;
?>
<script type="text/javascript" language="javascript">
    function resultDelete()
    {
        var chk=confirm("Are you sure to delete this Teacher Information?");
        if(chk)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>
<div id="midel">
    <a onclick="javascript:history.go(-1)"><image src="images/back.png" title="Click Here To Back" /><strong  style="float: left; font-weight: bolder; font-size: 18px; margin-top: 8px;"> Back</strong></a><br/><br/><br/>
    <?php
    $category_id = $_POST['category_id'];
    $q = mysql_query("select * from tbl_book_category where category_id='$category_id'");
    $fetch = mysql_fetch_array($q);
    ?>
    <fieldset>
        <legend style="padding: 0 0 7px 0; font-weight: bold; font-size: 16px;">
            <?php echo $fetch['category_name']; ?>
        </legend>
        
        <?php
        $q1 = mysql_query("select * from tbl_book where category_id='$category_id'");

        if (mysql_num_rows($q1) > 0) {
            ?>
            <table style="background: #00748f; text-align: center; padding: 7px; border-radius:5px;" width="100%" cellspacing="1">
                <tr style="background-color: #71c9e2; color: #FFF;">
                    <th>Book Name</th>
                    <th>Book Id</th>
                    <th>Author Name</th>
                    <th>Publisher Name</th>
                    <th>action</th>
                </tr>
                <?php while ($fetch1 = mysql_fetch_array($q1)) { ?>
                    <tr bgcolor="#eee" style="color:black;">
                        <td><?php echo $fetch1['book_name']; ?></td>
                        <td><?php echo $fetch1['book_id']; ?></td>
                        <td><?php echo $fetch1['author_name']; ?></td>
                        <td><?php echo $fetch1['publisher_name']; ?></td>
                        <td width="45px">
                            <a href="update_book.php?tbl_book_id=<?php echo $fetch1['tbl_book_id'] ?>" style="text-decoration: none;"  title="Click Here For Edit">
                                <img src="images/edit.png" title="edit" />
                            </a>
                            <a href="edit_delete.php?tbl_book_id=<?php echo $fetch1['tbl_book_id'] ?>" onclick="return resultDelete();"  title="Click here for Delete">
                                <img src="images/drop.png" title="Delete" />
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "No book Found.";
            }
            ?>
        </table>
        
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
    </fieldset>
</div>

<?php
echo $bottom;
?>
