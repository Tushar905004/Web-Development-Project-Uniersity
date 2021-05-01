<form action="<?php echo base_url(); ?>admin/selectCategoryByCategoryId" method="post">
    <table style="margin-left: 344px; margin-bottom:15px; margin-top:10px;" >
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
<?php if(isset($category_id) and $category_id>0){
    ?>
<form action="<?php echo base_url(); ?>admin/AddNewSubCategory" method="post">
    <table style="margin-left: 244px; color: black; border-radius:5px; border: 1px dashed green;" bgcolor="#f8f8f8" width="400" cellspacing="1">
        <tr bgcolor="#FBFDF0" height="27">
            <th style="color:blue; background-color: #FCFBE6;" colspan="3">Category Name: &nbsp;<?php
                $q=mysql_query("select * from tbl_product_category where category_id='$category_id'");
                $fetch=mysql_fetch_array($q);
                ?>
<?php echo $fetch['category_name']; ?>
            </th>
        </tr>
        <tr bgcolor="#F3EC91" height="23">
            <th colspan="2">
                Sub Category Name
            </th>
            <Th> &nbsp;&nbsp;Action</Th>
        </tr>


        <?php
        $q1=mysql_query("select * from tbl_product_sub_category where category_id='$category_id'");
        while($fetch1=mysql_fetch_array($q1)) { ?>
        <tr bgcolor="#D0DD85" style="font-size: 13px;" height="22">
            <td colspan="2">
                    <?php echo $fetch1['sub_category_name']; ?>
            </td>
            <td> &nbsp;
                <a style="color:green; font-weight: bold;" href="<?php echo base_url(); ?>admin/editSubCategory/<?php echo $fetch1['sub_id']; ?>"> edit</a> |
                <a style="color:green; font-weight: bold;"href="<?php echo base_url(); ?>admin/deleteSubCategory/<?php echo $fetch1['sub_id']; ?>"> Delete</a>
            </td>
        </tr>

            <?php } ?>
        <tr height="24" bgcolor="#E5EBAB">
            <td style="color:black; font-size: 12px; font-weight: bold;">Add New Sub Category:</td>
            <td colspan="2" style="background-color: #E5EBAB;">
                <input type="text" name="sub_category"  required="1" style="background-color: #FCFBE6; border:1px solid green; border-radius:4px;"/>
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