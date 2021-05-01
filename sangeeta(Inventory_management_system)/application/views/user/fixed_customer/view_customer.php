<center><h3>Fixed Customer List</h3></center>
<table cellspacing="1" width="90%" cellspacing="0" border="0" align="left" height="100%" style="min-height:200px; height: auto; border:1px solid black; font-size: 14px; margin-left: 23px;">
    <tr id="chkrow" style="background:-moz-linear-gradient(#C3D9FF,#C3D9FF); color: #003366; height: 28px; text-align: center; font-size: 14px;">
        <th>Customer Name</th>
        <th>Address</th>
        <th>Mobile No</th>
        <th>Action</th>
    </tr>
<?php
$i=1;
foreach($result as $value) { ?>
    <?php   if($i%2==0) {
        ?>
<tr bgcolor="#E1EFF7" class="tr_hovers" height="22">
            <?php } else { ?>
<tr bgcolor="#ffffff" class="tr_hovers" height="22">
            <?php } ?>
    <td><?php echo $value->cus_name; ?></td>
    <td><?php echo $value->address; ?></td>
    <td><?php echo $value->mob_no; ?></td>
    <td><a href="<?php echo base_url(); ?>user/view_customer_info_1/<?php echo $value->customer_id; ?>" style="font-weight: bold; color: green; font-size: 14px;">Detail</a></td>
</tr>
        <?php
    $i++; }
    ?>
</table>
<?php
$q=mysql_query("select * from tbl_sell");
while($f=mysql_fetch_array($q)){
    $memo_id=$f['memo_id'];
    $cust_id=$f['cust_id'];
    $q1=mysql_query("Update tbl_sell_history SET cust_id='$cust_id' where memo_id='$memo_id'");
}
?>