<form action="<?php echo base_url(); ?>admin/SaveUpdatedSubcategory" method="post">

    <table style="margin-left: 320px;">
        <tr>
            <?php
            $q=mysql_query("select * from tbl_product_category where category_id='$result->category_id'");
            $fetch=mysql_fetch_array($q);
            ?>
            <td style="color:green; font-weight: bold;">Main Category Name: &rarr; <?php echo $fetch['category_name']; ?></td>
        </tr>
        <tr>
            <td style="color:black;">Sub Category Name:
            <input type="text" name="sub_category" value="<?php echo $result->sub_category_name; ?>"/>
                <input type="hidden" value="<?php echo $result->sub_id; ?>" name="sub_id"/>
                <input type="submit" value="Update"/>
            </td>
        </tr>
    </table>
</form>