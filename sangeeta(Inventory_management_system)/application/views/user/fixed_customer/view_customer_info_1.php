<?php
$i=1;
$total_amount=0;
$paid=0;
$due1=0;
$due=0;
$q=mysql_query("select * from tbl_customer_info where customer_id='$customer_id'");
$fetch=mysql_fetch_array($q);
$q1=mysql_query("select * from tbl_sell_history where cust_id='$customer_id' order by memo_id DESC");

?>
<h4>Transection History</h4>
<hr>
<span style="font-family: arial; font-size: 13px; color: blue; line-height: 24px;">
    <b>Customer Name: </b><?php echo $fetch['cus_name']; ?><br>
    <b>Address: </b><?php echo $fetch['address']; ?><br>
    <b>Mobile No: </b><?php echo $fetch['mob_no']; ?><br>
</span>
<table width="100%">
    <tr bgcolor="#93BC0C" style="font-family: arial; font-size: 13px; color: white;text-align: center; height: 24px;">
    <th>Memo No</th>
    <th>Total Amount</th>
    <th>Paid</th>
    <th>Due</th>
    <th>Date</th>
    <th>Action</th>
</tr>
    <?php
    while($fetch1=mysql_fetch_array($q1)){
    if($i%2==0) {
        ?>
<tr bgcolor="#f8f8f8" class="tr_hovers" height="22">
            <?php } else { ?>
<tr bgcolor="#ffffff" class="tr_hovers" height="22">
            <?php } ?>
    <td><?php echo $fetch1['memo_id']; ?></td>
    <td><?php echo $fetch1['total_price']; ?></td>
    <td><?php echo $fetch1['paid']; ?></td>
    <td><?php
    echo ($fetch1['total_price']-$fetch1['paid']); ?></td>
    <td><?php echo $fetch1['date']; ?></td>
    <td align="center"><a href="<?php echo base_url(); ?>user/fixed_customer_memo_view/<?php echo $fetch1['memo_id']; ?>" style="color:blue; font-size: 12px;">Detail</a></td>
</tr>
<?php
$total_amount+=$fetch1['total_price'];
$paid+=$fetch1['paid'];
$due+=($fetch1['total_price']-$fetch1['paid']);
$i++; } ?>
<tr style="background-color: #F6EDA8; color: black; font-family: arial; font-weight: bold; font-size: 12px; height: 21px;">
    <td>Total:</td>
    <td><?php echo $total_amount; ?></td>
    <td><?php echo $paid; ?></td>
    <td><?php echo $due; ?></td>
    <td colspan="2"></td>
</tr>
</table>