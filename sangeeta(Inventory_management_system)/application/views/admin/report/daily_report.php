<?php
$date=date('d-m-Y');
// income from product selling//
$qs=mysql_query("select history_id from tbl_sell_history where date='$date'");
$rows=mysql_num_rows($qs);
$q1=mysql_query("select * from tbl_product_buying where date='$date'");
$q2=mysql_query("select * from tbl_income where date='$date'");
$q3=mysql_query("select * from tbl_sallery where paid_date='$date'");
$q4=mysql_query("select * from tbl_bonus where paid_date='$date'");
$q5=mysql_query("select * from tbl_expend where date='$date'");
$q6=mysql_query("select * from tbl_personal_account where entry_date='$date'");
$num_buy=mysql_num_rows($q1);
$num_income=mysql_num_rows($q2);
$num_sallery=mysql_num_rows($q3);
$num_bonus=mysql_num_rows($q4);
$num_expend=mysql_num_rows($q5);
$num_bank=mysql_num_rows($q6);
$q=mysql_query(" SELECT SUM(total_price) as sum_price FROM tbl_sell_history where date='$date'");
$fetch= mysql_fetch_array($q);
$sum_price= $fetch['sum_price'];

$q=mysql_query(" SELECT SUM(paid) as sum_paid FROM tbl_sell_history where date='$date'");
$fetch= mysql_fetch_array($q);
$sum_paid= $fetch['sum_paid'];
$due=(integer)($sum_price-$sum_paid);

// others income
$q=mysql_query(" SELECT SUM(amount) as other_income FROM tbl_income where date='$date'");
$fetch= mysql_fetch_array($q);
$other_income= $fetch['other_income'];
//product buy's expend//
$q=mysql_query(" SELECT SUM(total_amount) as buy_expend FROM tbl_product_buying where date='$date'");
$fetch= mysql_fetch_array($q);
$buy_expend= $fetch['buy_expend'];

//employee sallery expend//
$q=mysql_query(" SELECT SUM(paid_sallery) as sallery FROM tbl_sallery where paid_date='$date'");
$fetch= mysql_fetch_array($q);
$sallery= $fetch['sallery'];
//bonus//
$q=mysql_query(" SELECT SUM(paid_bonus) as bonus FROM tbl_bonus where paid_date='$date'");
$fetch= mysql_fetch_array($q);
$bonus= $fetch['bonus'];    
//others expend
$qx=mysql_query(" SELECT SUM(amount) as other_expend FROM tbl_expend where date='$date'");
$fetch= mysql_fetch_array($qx);
$other_expend= $fetch['other_expend'];
//account expend 
$qx=mysql_query(" SELECT SUM(amount) as bank_expend FROM tbl_personal_account where entry_date='$date'");
$fetch= mysql_fetch_array($qx);
$bank_expend= $fetch['bank_expend'];
?>
<h4><u><center>Daily Report</center></u></h4>
<table bgcolor="#D6EEFB" cellspacing="1" style="float: left; color: black; margin-left: 3%; font-size: 12px;" width="89%" height="244">
    <tr bgcolor="white" align="center" style="font-size: 16px; color: green;">
        <th>Income (আয়)</th>
        <th>Expend (ব্যায়)</th>
    </tr>
    <tr bgcolor="#F0FFF0">
        <td>&nbsp;Product Sell (<?php echo $rows; ?>): <?php echo $sum_price; ?> Tk (<font face="SolaimanLipi" size="2">পণ্য বিক্রয় বাবদ</font>)</td>
        <td>&nbsp;Product Buy(<?php echo $num_buy; ?>): <?php echo $buy_expend; ?> Tk <font face="SolaimanLipi" size="2">(পণ্য ক্রয় বাবদ)</font></td>
    </tr>
    <tr bgcolor="#F0FFF0">
        <td>&nbsp;Paid : <?php echo (integer)$sum_paid; ?> Tk (<font face="SolaimanLipi" size="2">মোট পরিশোধ</font>)</td>
        <td>&nbsp;Employee Sallery(<?php echo $num_sallery; ?>): <?php echo $sallery; ?> Tk <font face="SolaimanLipi" size="2">(কর্মচারীদের বেতন বাবদ)</font></td>
    </tr>
    <tr bgcolor="#F0FFF0">
        <td>&nbsp;Due : <?php echo $due; ?> Tk (<font face="SolaimanLipi" size="2">মোট বকেয়া </font>)</td>
        <td>&nbsp;Employee Bonus(<?php echo $num_bonus; ?>): <?php echo $bonus; ?> Tk <font face="SolaimanLipi" size="2">(কর্মচারীদের বোনাস বাবদ)</font></td>
    </tr>
    <tr bgcolor="#F0FFF0">
        <td>&nbsp;Others(<?php echo $num_income; ?>): <?php echo $other_income; ?> Tk (<font face="SolaimanLipi" size="2">অন্যান্য আয় বাবদ</font>)</td>
        <td>&nbsp;Others(<?php echo $num_expend; ?>): <?php echo $other_expend; ?> Tk (<font face="SolaimanLipi" size="2">অন্যান্য ব্যায় বাবদ</font>)</td>
    </tr>
    <tr bgcolor="#F0FFF0">
        <td></td>
        <td>&nbsp;Bank Account(<?php echo $num_bank; ?>): <?php echo $bank_expend; ?> Tk (<font face="SolaimanLipi" size="2">ব্যাংক লোন বাবদ</font>)</td>
    </tr>

    <tr bgcolor="#F1B420" style="color: green; font-size: 14px;">
        <th>&nbsp;Total: <?php echo $sum_price+$other_income; ?> Tk</th>
        <th>&nbsp;Total: <?php echo (integer)($buy_expend+$sallery+$bonus+$other_expend+$bank_expend); ?> Tk</th>
    </tr>
</table>