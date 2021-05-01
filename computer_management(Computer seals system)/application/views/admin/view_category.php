<form action="<?php echo base_url(); ?>admin/selectCategoryByCategoryId" method="post">
    <table style="margin-left: 344px; margin-bottom:15px; margin-top:10px;">
        <tr>
            <td>Category Name:</td>
            <td>
                <select name="category_id" required="1">
                    <option value="">Select Category</option>
                    <?php
                    foreach($result as $value) { ?>
                    <option value="<?php echo $value->category_id; ?>"><?php echo $value->category_name; ?></option>
                        <?php } ?>
                </select>
            </td>
            <td><input type="submit" value="Search"/></td>
        </tr>
    </table>
</form>
<?php if(isset($category_id)){ ?>
<form action="<?php echo base_url(); ?>admin/AddNewSubCategory" method="post">
    <table style="margin-left: 344px;" bgcolor="#d6d6d6">
        <tr bgcolor="#f8f8f8">
            <td>Category Name: <?php
                $q=mysql_query("select * from tbl_product_category where category_id='$category_id'");
                $fetch=mysql_fetch_array($q);
                ?></td>
            <td colspan="2"><?php echo $fetch['category_name']; ?></td>
        </tr>
        <tr>
            <td colspan="2">
                Sub Category Name
            </td>
            <Td>Action</Td>
        </tr>


        <?php
        $q1=mysql_query("select * from tbl_product_sub_category where category_id='$category_id'");
        while($fetch1=mysql_fetch_array($q1)) { ?>
        <tr bgcolor="#fff">
            <td colspan="2">
                    <?php echo $fetch1['sub_category_name']; ?>
            </td>
            <td>
                <a href="<?php echo base_url(); ?>admin/editSubCategory/<?php echo $fetch1['sub_id']; ?>">edit</a> |
                <a href="<?php echo base_url(); ?>admin/deleteSubCategory/<?php echo $fetch1['sub_id']; ?>">Delete</a>
            </td>
        </tr>

            <?php } ?>
        <tr>
            <td>Add New Sub Category:</td>
            <td colspan="2">
                <input type="text" name="sub_category"  required="1"/>
            </td>
        </tr>

        <tr>
            <Td colspan="3" align="center" bgcolor="#f8f8f8">
                <input type="hidden" name="category_id" value="<?php echo $category_id; ?>"/>
                <input type="submit" value="Save"/>
            </Td>
        </tr>
    </table>
</form>
<?php } ?>
<?php
    if(isset($_SESSION['successMessage'])){
        echo "<div style='float:left; margin-left:344px; color:red; background-color:#FFFFDD; width:auto;'>".$_SESSION['successMessage']."</div>";
    }
    ?>