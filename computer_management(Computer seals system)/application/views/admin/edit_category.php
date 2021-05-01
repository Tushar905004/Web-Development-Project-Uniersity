<form action="<?php echo base_url(); ?>admin/SaveUpdatedSubcategory" method="post">

    <table style="margin-left: 345px;">
        <tr>
            <?php
            $q=mysql_query("select * from tbl_product_category where category_id='$result->category_id'");
            $fetch=mysql_fetch_array($q);
            ?>
            <td>Main Category Name: <?php echo $fetch['category_name']; ?></td>
        </tr>
        <tr>
            <td>Sub Category Name:</td>
            <td><input type="text" name="sub_category" value="<?php echo $result->sub_category_name; ?>"/>
                <input type="hidden" value="<?php echo $result->sub_id; ?>" name="sub_id"/>
                <input type="submit" value="Update"/>
            </td>
        </tr>
    </table>
</form>