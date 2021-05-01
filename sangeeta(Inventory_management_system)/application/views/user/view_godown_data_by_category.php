<script type="text/javascript">
    function jsprint(){
        document.getElementById("printbtn").style.visibility="hidden";
        window.print();
    }
    </script>
<?php
$qx=mysql_query("select * from tbl_product_category where category_id='$category_id'");
$fetchx=mysql_fetch_array($qx);
$category_name=$fetchx['category_name'];
?>
<center>
    <h3>Godown Products Report</h3>
</center>
<span style="font-family: arial; font-size: 14px; color: blue;">
    <b>Category Name: </b><?php echo $category_name; ?><br>
    <b>Report Date</b>: <?php echo date('d-m-Y'); ?>
</span>
<span style="float:right;"><input type="button" value="print" onclick="jsprint();" id="printbtn"></span>
<table  cellspacing="1" width="100%" cellspacing="0" border="0" align="left" height="100%" style="min-height:200px; height: auto; border:1px solid black;">
    <tbody>
    <thead>
        <tr id="chkrow" style="background:-moz-linear-gradient(#C3D9FF,#C3D9FF); color: #003366; height: 28px; text-align: center; font-size: 14px;">
            <th>Product Sl</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>B.P.</th>
            <th>Warrenty</th>
            <th>Cover Price</th>
        </tr>
        <?php
        $i=1;
        $total_quantity=0;
        $buy_price=0;
        $cover_price=0;
        $q=mysql_query("select * from tbl_product_sub_category where category_id='$category_id'");
        while($fetch=mysql_fetch_array($q)) {
            $sub_id=$fetch['sub_id'];
            $q1=mysql_query("select * from tbl_godown where sub_id='$sub_id' order by godown_id DESC");
            $total_quantity+=mysql_num_rows($q1);
            while($fetch1=mysql_fetch_array($q1)) {
$buy_price+=$fetch1['buy_price'];
$cover_price+=$fetch1['cover_price'];
                if($i%2==0) {
                    ?>
        <tr bgcolor="#E1EFF7">
                        <?php } else { ?>
        <tr bgcolor="#ffffff">
                        <?php } ?>
            <td><?php echo $fetch1['product_sl']; ?></td>
            <td><?php echo $fetch1['product_name']; ?></td>
            <td><?php echo $fetch1['description']; ?></td>
            <td><?php echo $fetch1['buy_price']; ?></td>
            <td><?php echo $fetch1['warrenty']; ?></td>
            <td><?php echo $fetch1['cover_price']; ?></td>
        </tr>
                <?php  $i++;
            }
        }
        ?>
        <?php if($total_quantity>0) { ?>
        <tr>
            <td colspan="3" style="color:green; font-weight: bold; background-color: white; text-align: right;">Total:&nbsp;</td>
            <td style="color:green; font-weight: bold; background-color: white;"><?php echo $buy_price; ?> </td>
            <td style="color:blue; background-color: white;"> </td>
            <td style="color:green; font-weight: bold; background-color: white;"><?php echo $cover_price; ?> </td>
        </tr>
        <tr>
            <td colspan="8" style="color:blue; background-color: white; text-align: center;">Goods Quantity : <?php echo $total_quantity; ?></td>
        </tr>
            <?php } else { ?>
        <tr>
            <td colspan="7" style="color: red; background-color: white; font-size: 14px;">No Product Found in the Godown !</td>
        </tr>
            <?php } ?>
    </thead>
</tbody>
</table>
