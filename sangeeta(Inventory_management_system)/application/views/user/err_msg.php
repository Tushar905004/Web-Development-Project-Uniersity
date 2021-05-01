<table style="margin-left: 144px;  text-align: center; background-color: #E93F25;  font-family: times; margin-top: 34px;" cellspacing="1" width="70%">
    <tr bgcolor="#F0FFF0">
        <td colspan="2" style="color:red; text-align: center;">Duplicate Entry Found!</td>
    </tr>
    <tr style="color:white; font-weight: bold; font-size: 14px;">
        <td>Product Name</td>
        <td>Product Serial No</td>
    </tr>
    <?php
    for($i=0;$i<=($num-1); $i++) {
        $q=mysql_query("select * from tbl_godown where product_sl='$product_sl[$i]' && sub_id='$sub_id'");
        $fetch=mysql_fetch_array($q);
        ?>
    <tr bgcolor="#f8f8f8">
        <td><?php echo $fetch['product_name']; ?></td>
        <td><?php echo $fetch['product_sl']; ?></td>
    </tr>
        <?php
    }
    ?>
    <tr>
        <td colspan="2" bgcolor="#F8F8F8">
            <input type="button" onclick="javascript:history.go(-1);" value="back" class="btn_class">
        </td>
    </tr>
</table>

