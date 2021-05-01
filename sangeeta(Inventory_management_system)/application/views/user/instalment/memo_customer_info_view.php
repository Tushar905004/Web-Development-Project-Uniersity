<?php
if(!$memo_id){
echo "Please Try Again.";
}else{
$q=mysql_query("select * from tbl_memo where memo_id='$memo_id'");
$fetch=mysql_fetch_array($q);
$cust_id=$fetch['cust_id'];
$q1=mysql_query("select * from tbl_customer_info where customer_id='$cust_id'");
$fetch1=mysql_fetch_array($q1);
$q2=mysql_query("select * from tbl_sell where memo_id='$memo_id'");
$q3=mysql_query("select * from tbl_sell_history where memo_id='$memo_id'");
$fetch3=mysql_fetch_array($q3);
$discount=$fetch3['discount'];
    ?>
<script type="text/javascript">
    function sure_btn(){
        $z=confirm("Do you want to Pay?\n আপনি কী বকেয়া পরিশোধ করতে চান ?");
        if($z){
            return true;
        }else{
            return false;
        }
    }
    </script>
<h4><u>View Instalment History</u> ....</h4><br>
<form action="<?php echo base_url(); ?>user/SaveInstalment" method="post" name="myForm" onsubmit=" return confirm_btn();">
    <table style="color:#003366; font-weight: bold; font-size: 13px;" >
        <tr style="color:#F87400">
            <td>Memo No</td>
            <td>: <?php echo $memo_id; ?></td>
        </tr>
        <tr>
            <td>Customer Name</td>
            <td>: <input  type="text" name="cus_name" style="border:1px solid #7ACA3C;border-radius:4px;" size="25" value="<?php echo $fetch1['cus_name']; ?>" readonly></td>
        </tr>
        <tr>
            <td>Address</td>
            <td>: <input type="text" name="address"style="border:1px solid #7ACA3C;border-radius:4px;" size="25"  value="<?php echo $fetch1['address']; ?>" readonly></td>
        </tr>
        <tr>
            <td>Mobile No</td>
            <td>: <input type="text" name="mob_no"style="border:1px solid #7ACA3C;border-radius:4px;" size="25"  value="<?php echo $fetch1['mob_no']; ?>" readonly></td>
        </tr>
        <tr>
            <td>Fixed Customer</td><td>: <?php if($fetch1['status']=='fixed'){ echo "yes";} else{echo "No"; }?></td>
        </tr>
    </table>
    <table  cellspacing="1" width="580px"cellspacing="0" border="0" style="text-align: center; background-color: #005A8D;">
        <tbody>
        <thead>
            <tr style="background:-moz-linear-gradient(#C3D9FF,#C3D9FF); color: #003366; height: 28px; text-align: center; font-size: 14px; width: 500px; ">
                <th>Product Sl</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Warrenty</th>
                <th>Sell Price</th>
            </tr>
                <?php
                $total=0;
                while($fetch2=mysql_fetch_array($q2)){
                    ?>
            <tr bgcolor="#f8f8f8">
                <td><?php echo $fetch2['product_sl']; ?></td>
                <td><?php echo $fetch2['product_name']; ?></td>
                <td><?php echo $fetch2['description']; ?></td>
                <td><?php echo $fetch2['warrenty']; ?></td>
                <td style="width:95px;"><?php echo $fetch2['cover_price']; ?></td>
            </tr>
                    <?php 
                    $total+=$fetch2['cover_price'];
                    }
                ?>
            <tr bgcolor="#f8f8f8">
                <td colspan="0" align="right" height="26"><span style="margin-right:10px;font-weight: bold; color: green;">Total : <?php echo $total; ?> Tk</span></td>
            </tr>
    </table>
    <table style="margin-left: 367px; background-color:#DDDDDD;" cellspacing="1" align="center;">
        <tr bgcolor="#f8f8f8">
            <td style="color: orange; font-weight: bold; font-size: 13px;">Discount :</td>
            <td  align="right" height="26"><span style="margin-right:13px;font-weight: bold;"><?php echo $discount; ?>%</span></td>
        </tr>
        <tr bgcolor="#f8f8f8">
            <td style="color:orange; font-weight: bold; font-size: 13px;">Total Price : </td>
            <td colspan="5" align="right" height="26"><span style="font-weight: bold;"><?php
                        echo $t_discount=(integer)($total-(($total*$discount)/100));
                        ?> Tk </span>
<input type="hidden" name="t_discount" value="<?php echo (integer)($total-(($total*$discount)/100)); ?>">
            </td>
        </tr>
        <tr bgcolor="#f8f8f8">
            <td style="color:orange; font-weight: bold; font-size: 13px;">Paid : </td>
            <td align="right"><b><?php echo $fetch3['paid']; ?> Tk </b></td>
        </tr>
        <tr bgcolor="#f8f8f8">
            <td style="color:orange; font-weight: bold; font-size: 13px;">Due : </td>
            <td align="right"><b><?php echo $due=($t_discount-$fetch3['paid']); ?> Tk </b></td>
        </tr>
        <tr>
            <td bgcolor="#9DD38F" style="color:black; font-weight: bold;">Now Pay:</td>
            <td><input type="text" name="pay" required size="16" style=" background-color:#E0E0E0; text-align: center; border:none;" onkeydown="return ( event.ctrlKey || event.altKey
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9)
                    || (event.keyCode>34 && event.keyCode<40)
                    || (event.keyCode==46) )"><b style="background-color: white; font-size: 13px;">Tk</b></td>
        </tr>
        <tr bgcolor="white" align="center">
        <input type="hidden" name="paid" value="<?php echo $fetch3['paid']; ?>"/>
        <input type="hidden" name="due" value="<?php echo $due; ?>"/>
        <input type="hidden" name="memo_id" value="<?php echo $memo_id; ?>"/>
            <td colspan="2">
                <span><input type="submit" value="Paid" class="btn_class"  onclick="return sure_btn();" <?php if($due<1)echo "disabled";?>></span>
            </td>
        </tr>
    </table>
</form>





<?php } ?>