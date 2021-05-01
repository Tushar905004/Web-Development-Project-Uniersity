<style type="text/css">
    html{
        float: left;
        width: 594px;
        overflow: auto;
        clear: right;
        margin: 0px;

}
    body{
        float: left;
        width: 598px;
        overflow: hidden;
        clear: both;
}
#main{
float:left;
width:594px;
min-height:841px;
height: auto;
border:1px  dotted;
background-color:#FFFFFF;
}
.container{
float:left;
margin:8px;
}
.top_left{
float:left;
width:60%;
height: 72px;
padding: 12px 0px 0px 0px;
}
.top_right{
float:right;
width:33%;
height: 72px;
padding: 12px 0px 0px 0px;

}
.left{
float:left;
width:50%;
}
.right{
float:left;
width:50%;
height: 55px;
}
.center{
float:left;
width:100%;
margin-top:5px;
min-height: 609px;
height: auto;
}
hr{
float:left;
width:100%;
color:#003366;
margin:1px;
}
.input_de{
border:none;
background-color:transparent;
border-bottom:1px dotted #999999;
height:14px;
}
.tbl_style{
float:left;
height:auto;
font-family:"Courier New", Courier, monospace;
background-color: gray;
}

.left_footer{
float:left;
height:65px;
width:253px;
background-color:#ffffff;
margin-top:8px;
border:2px dashed #CCCCCC;
font-family:"Courier New", Courier, monospace;
}
.right_footer{
float:right;
font-family:"Courier New", Courier, monospace;
margin-top: 1px;
}
.bottom{
    float: left;
    background-color: #f8f8f8;
    width: 100%;
    height: 20px;
    border-top: 1px dashed gray;
}
.left_sign{
    float: left;
    margin-bottom: 4px;
    border: 1px dotted gray;
    padding: 0px 12px 22px 12px;
}
</style>
<body>
<div id="main">
<div class="container">
<div class="top_left">
    <font size="+2">Sangeeta Electronices</font><br>
	Proprietor: Md.Rafiqul Islam<br>
        <font size="3" style="float: left; margin-top: -6px; padding: 3px; border:1px solid gray;margin-left:200px; font-weight: bold; font-style: italic; ">WALTON Exclusive</font>
</div>
<div class="top_right">
    <font size="+2" face="SolaimanLipi">সংগীতা ইলেকট্রনিক্স</font><br>
    <font face="SolaimanLipi">প্রো: মো: রফিকুল ইসলাম</font>
</div>
<hr/><hr/>
	<div class="left">
	Nashima Mansion
	<br>
	Uttar Bazar, Parshuram.<br>
	Email: rafiqfeni@yahoo.com
	</div>
<div class="right" style=" font-family: SolaimanLipi; font-size: 15px;">
সংগীতা ইলেকট্রনিক্স
    <br>
নাসিমা ম্যানশন
	<br>
	উত্তর বাজার, পরশুরাম <br>
	</div>
	<div class="center">
	Mobile No:01819 136057 , 01619 136057 , 01711 714355
	<hr/>
<?php
$memo_id=$this->session->userdata('memo_id');
$qx=mysql_query("select discount from tbl_sell_history where memo_id='$memo_id'");
$row=mysql_fetch_array($qx);
$discount=$row['discount'];
$q=mysql_query("select cust_id from tbl_memo where memo_id='$memo_id'");
$fetch=mysql_fetch_array($q);
$cust_id=$fetch['cust_id'];
$q1=mysql_query("select * from tbl_customer_info where customer_id='$cust_id'");
$fetch1=mysql_fetch_array($q1);
?>
	<table>
	<tr>
            <td style="font-weight:bold;">Invoice No: &nbsp;<?php echo $memo_id; ?> </td>
	</tr>
	<tr>
		<td>Customer Name:</td>
                <td><input type="text" name="cus_name" class="input_de" value="<?php echo $fetch1['cus_name']; ?>" readonly>
                </td>
	</tr>
	<tr>
		<td>Address:</td>
                <td><input type="text" name="cus_name" class="input_de" value="<?php echo $fetch1['address']; ?>" readonly>
                </td>
	</tr>
	<tr>
		<td>Mobile No:</td>
                <td><input type="text" name="cus_name" class="input_de" value="<?php echo $fetch1['mob_no']; ?>" readonly>
                </td>
	</tr>
	</table>
<span style="float:left; margin-left:35%; font-family:'Courier New', Courier, monospace"> Date: <?php echo date('d-m-Y'); ?></span><br>
<?php
$q2=mysql_query("select * from tbl_sell where memo_id='$memo_id'");
?>
<table width="100%" class="tbl_style" cellspacing="1">
    <tr bgcolor="#f8f8f8">
		<th>Sl No</th>
                <th>Product Name</th>
		<th>Description</th>
                <th width="87">Warrenty</th>
		<th width="87">Amount(Tk)</th>
	</tr>
<?php
while($fetch2=mysql_fetch_array($q2)){
?>
        <tr bgcolor="#FFFFFF" height="25">
            <td><?php echo $fetch2['product_sl']; ?></td>
                <td><?php echo $fetch2['product_name']; ?></td>
		<td><?php echo $fetch2['description']; ?></td>
		<td><?php echo $fetch2['warrenty']; ?></td>
                <td>&nbsp;<?php echo $fetch2['cover_price']; ?></td>
	</tr>
        <?php } ?>
</table>
<div class="left_footer">&nbsp;Note:<br><hr style="color:#FFFFFF">
<textarea style="margin-left:2px; width:98%; height:40px; border:none;"></textarea>
</div>
<div class="right_footer">
    <table  width="" cellspacing="1" bgcolor="gray" height="75">
        <tr bgcolor="white">
            <td bgcolor="#f8f8f8" width="">Total:<br><font size="-1">With</font>(<b><?php echo $discount;?>%</b>)<font size="-1">Discount</font></td>
            <td width="93">&nbsp;<?php echo $this->session->userdata('total_price'); ?> Tk</td>
	</tr>
	<tr bgcolor="white">
            <td bgcolor="#f8f8f8">Paid:</td>
            <td>&nbsp;<?php echo $this->session->userdata('pay'); ?> Tk</td>
	</tr>
	<tr bgcolor="white">
		<td bgcolor="#f8f8f8">Due:</td>
                <td>&nbsp;<?php echo $this->session->userdata('total_price')-$this->session->userdata('pay'); ?> Tk</td>
	</tr>
</table>
</div>
	</div>
    <div class="left_sign">
Seller Signature <br>
<font style="font-size: 13px; font-family:Times; font-style: italic;"><?php echo $this->session->userdata('user_name'); ?></font>
    </div>
	</div>
    <center style="color: blue; font-weight: bold; font-family: arial; font-size: 12px; cursor: pointer" onclick="window.print();" title="Click here for print">Thank you for with us</center>
    <div class="bottom">
        <center style=" padding-top: 2px; ">
            <span style="font-family: arial; font-size: 11px; height: 12px;">Developed By: Msoft Technology &nbsp;| &nbsp; Mob.No: 01814-896783.&nbsp;&nbsp;|&nbsp; Email: msofttech10@gmail.com</span>
        </center>
    </div>
</div>
    <div style=" float: left; height: 110px;">
        <br><br><br>&nbsp;
    </div>


<div id="main">
<div class="container">
<div class="top_left">
    <font size="+2">Sangeeta Electronices</font><br>
	Proprietor: Md.Rafiqul Islam<br>
        <font size="3" style="float: left; margin-top: -6px; padding: 3px; border:1px solid gray;margin-left:200px; font-weight: bold; font-style: italic; ">WALTON Exclusive</font>
</div>
<div class="top_right">
    <font size="+2" face="SolaimanLipi">সংগীতা ইলেকট্রনিক্স</font><br>
    <font face="SolaimanLipi">প্রো: মো: রফিকুল ইসলাম</font>
</div>
<hr/><hr/>
	<div class="left">
	Nashima Mansion
	<br>
	Uttar Bazar, Parshuram.<br>
	Email: rafiqfeni@yahoo.com
	</div>
<div class="right" style=" font-family: SolaimanLipi; font-size: 15px;">
সংগীতা ইলেকট্রনিক্স
    <br>
নাসিমা ম্যানশন
	<br>
	উত্তর বাজার, পরশুরাম <br>
	</div>
	<div class="center">
	Mobile No:01819 136057 , 01619 136057 , 01711 714355
	<hr/>
<?php
$memo_id=$this->session->userdata('memo_id');
$qx=mysql_query("select discount from tbl_sell_history where memo_id='$memo_id'");
$row=mysql_fetch_array($qx);
$discount=$row['discount'];
$q=mysql_query("select cust_id from tbl_memo where memo_id='$memo_id'");
$fetch=mysql_fetch_array($q);
$cust_id=$fetch['cust_id'];
$q1=mysql_query("select * from tbl_customer_info where customer_id='$cust_id'");
$fetch1=mysql_fetch_array($q1);
?>
	<table>
	<tr>
            <td style="font-weight:bold;">Invoice No: &nbsp;<?php echo $memo_id; ?> </td>
	</tr>
	<tr>
		<td>Customer Name:</td>
                <td><input type="text" name="cus_name" class="input_de" value="<?php echo $fetch1['cus_name']; ?>" readonly>
                </td>
	</tr>
	<tr>
		<td>Address:</td>
                <td><input type="text" name="cus_name" class="input_de" value="<?php echo $fetch1['address']; ?>" readonly>
                </td>
	</tr>
	<tr>
		<td>Mobile No:</td>
                <td><input type="text" name="cus_name" class="input_de" value="<?php echo $fetch1['mob_no']; ?>" readonly>
                </td>
	</tr>
	</table>
<span style="float:left; margin-left:35%; font-family:'Courier New', Courier, monospace"> Date: <?php echo date('d-m-Y'); ?></span><br>
<?php
$q2=mysql_query("select * from tbl_sell where memo_id='$memo_id'");
?>
<table width="100%" class="tbl_style" cellspacing="1">
    <tr bgcolor="#f8f8f8">
		<th>Sl No</th>
                <th>Product Name</th>
		<th>Description</th>
                <th width="87">Warrenty</th>
		<th width="87">Amount(Tk)</th>
	</tr>
<?php
while($fetch2=mysql_fetch_array($q2)){
?>
        <tr bgcolor="#FFFFFF" height="25">
            <td><?php echo $fetch2['product_sl']; ?></td>
                <td><?php echo $fetch2['product_name']; ?></td>
		<td><?php echo $fetch2['description']; ?></td>
		<td><?php echo $fetch2['warrenty']; ?></td>
                <td>&nbsp;<?php echo $fetch2['cover_price']; ?></td>
	</tr>
        <?php } ?>
</table>
<div class="left_footer">&nbsp;Note:<br><hr style="color:#FFFFFF">
<textarea style="margin-left:2px; width:98%; height:40px; border:none;"></textarea>
</div>
<div class="right_footer">
    <table  width="" cellspacing="1" bgcolor="gray" height="75">
        <tr bgcolor="white">
            <td bgcolor="#f8f8f8" width="">Total:<br><font size="-1">With</font>(<b><?php echo $discount;?>%</b>)<font size="-1">Discount</font></td>
            <td width="93">&nbsp;<?php echo $this->session->userdata('total_price'); ?> Tk</td>
	</tr>
	<tr bgcolor="white">
            <td bgcolor="#f8f8f8">Paid:</td>
            <td>&nbsp;<?php echo $this->session->userdata('pay'); ?> Tk</td>
	</tr>
	<tr bgcolor="white">
		<td bgcolor="#f8f8f8">Due:</td>
                <td>&nbsp;<?php echo $this->session->userdata('total_price')-$this->session->userdata('pay'); ?> Tk</td>
	</tr>
</table>
</div>
	</div>
    <div class="left_sign">
Seller Signature <br>
<font style="font-size: 13px; font-family:Times; font-style: italic;"><?php echo $this->session->userdata('user_name'); ?></font>
    </div>
	</div>
    <center style="color: blue; font-weight: bold; font-family: arial; font-size: 12px; cursor: pointer" onclick="window.print();" title="Click here for print">Thank you for with us</center>
    <div class="bottom">
        <center style=" padding-top: 2px; ">
            <span style="font-family: arial; font-size: 11px; height: 12px;">Developed By: Msoft Technology &nbsp;| &nbsp; Mob.No: 01814-896783.&nbsp;&nbsp;|&nbsp; Email: msofttech10@gmail.com</span>
        </center>
    </div>
</div>