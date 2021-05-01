<form action="<?php echo base_url(); ?>admin/retriveBonusHistory" method="post">

    <div style="margin-left: 304px; margin-top: 12px; height: 35px; padding-top: 12px; padding-left: 12px; background-color: #EDEDED; color: #000000; font-size: 17px; font-weight: bold; width: 433px;">
        Please Select Month:
        <select required="" name="month">
            <option value="">select-month</option>
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">march</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
        </select>
        <select required="1" name="year">
            <option value="">Select Year</option>
            <option>2011</option>
            <option>2012</option>
        </select>
        <input type="submit" value="Search"/>
    </div>

</form>
<?php
if(isset($result)) { 
    if($result){
        ?>
<table bgcolor="#000000" style="margin: 0px 10px 0px 10px; width: 98%; text-align: center;">
    <tr bgcolor="#fff">
        <th>Employee Name</th>
        <th>Shop Name</th>
        <th>Paid Date</th>
        <th>Bonus Amount</th>
        <th>Action</th>
    </tr>
    
    <?php
    $q=mysql_query("select * from tbl_bonus where month='$month' ");
    while($fetch=mysql_fetch_array($q)){
    ?>
    <tr bgcolor="#f8f8f8">
        <?php
    $user_id=$fetch['user_id'];
    $q1=mysql_query("select * from tbl_user where user_id='$user_id' ");
    $fetch1=mysql_fetch_array($q1);
    $shop_id=$fetch1['shop_id'];
    $q2=mysql_query("select * from tbl_shop where shop_id='$shop_id' ");
    $fetch2=mysql_fetch_array($q2);
    ?>
        <td><?php echo $fetch1['full_name']; ?></td>
        <td><?php echo $fetch2['shop_name']; ?></td>
        <td><?php echo $fetch['paid_date']; ?></td>
        <td><?php echo $fetch['paid_bonus']; ?></td>
        <td>Edit | Delete</td>
    </tr>

   <?php } ?>

</table>


    <?php }
    else{
    echo "no result Found";
}
}

?>