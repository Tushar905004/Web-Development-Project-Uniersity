<tr bgcolor="#93BC0C" style="font-family: arial; font-size: 13px; color: white;text-align: center; height: 24px;">
    <th>Memo No</th>
    <th>Customer Name</th>
    <th>Address</th>
    <th>Mobile No</th>
    <th>Sell Date</th>
    <th>Due Status</th>
</tr>
<?php
$i=0;
$q=mysql_query("select * from tbl_customer_info where cus_name LIKE'%$search%' or mob_no LIKE'%$search%' order by reg_date DESC");
if(mysql_num_rows($q)<1) {
    echo "<tr><td align='center' colspan='6' style='color:brown; font-weight:bold;'>No record found!</td></tr>";
}
while($fetch=mysql_fetch_array($q)) {
    $i++;//this is for tr bgcolor//
    $cust_id=$fetch['customer_id'];
    $q1=mysql_query("select * from tbl_memo where cust_id='$cust_id'");
    while($fetch1=mysql_fetch_array($q1)) {
        $memo_id=$fetch1['memo_id'];
        $q2=mysql_query("select * from tbl_sell_history where memo_id='$memo_id' and instalment='1'");
        $num_rows=mysql_num_rows($q2);
        $fetch2=mysql_fetch_array($q2);
        if($num_rows>0) {
            if($i%2==0) { ?>
<tr bgcolor='#F8F8F8' class="tdcolor" style="height: 17px;">
                    <?php }else {?>
<tr bgcolor='#EFEFEF' class="tdcolor"  style="height: 17px;"> <?php } ?>
    <td><?php echo $fetch1['memo_id']; ?></td>
    <td><?php echo $fetch['cus_name']; ?></td>
    <td><?php echo $fetch['address']; ?></td>
    <td><?php echo $fetch['mob_no']; ?></td>
    <td><?php echo $fetch1['memo_date']; ?></td>
    <td><?php if($fetch2['instalment']>0) { ?>
        <a href="<?php echo base_url(); ?>user/paidInstalment/<?php echo $fetch1['memo_id']; ?>" title=" কিস্তি/বকেয়া পরিশোধের জন্য এখানে ক্লিক করুন।"><b style='color:red'>Yes</b></a>
                        <?php  }else {
                echo "<b style='color:green'>No</b>";
            } ?></td>

</tr>
            <?php }
    }

}
?>
<tr>
    <td colspan="6">&nbsp;</td>
</tr>