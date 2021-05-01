<?php
if(!$stock_id) {
    echo "<font color='red'>Error found! Please go back and try again.</font>";
}
else {
    ?>
<script type="text/javascript">
    function confirm_btn(){
var x = document.forms['myForm']['cus_name'].value;
var y = document.forms['myForm']['cust_id_fixed'].value;
if(x=='' && y=='0'){
    alert("Please!!! entry customer name or select fixed customer!\n দযা করে কাষ্টমারের নাম ঠিকানা পূরণ করুন।");
    return false;
}
else if(x!='' && y!='0'){
    alert("Please!!! entry customer name or select fixed customer!\nকাষ্টমারের নাম লিখুন। অথবা নির্দিষ্ট কাষ্টমার সিলেক্ট করুন।");
    return false;
}
else{
    return true;
}
    }
    function sure_btn(){
        $z=confirm("Do you want to do sell ?");
        if($z){
            return true;
        }else{
            return false;
        }
    }
    </script>
<h4><u>View sell queue</u> ....</h4>
<form action="<?php echo base_url(); ?>user/sell_final" method="post" name="myForm" onsubmit=" return confirm_btn();">
    <table style="color:#003366; font-weight: bold; font-size: 13px;" >
        <tr>
            <td>Customer Name</td>
            <td>: <input  type="text" name="cus_name" style="border:1px solid #7ACA3C;border-radius:4px;" size="25"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td>: <input type="text" name="address"style="border:1px solid #7ACA3C;border-radius:4px;" size="25" ></td>
        </tr>
        <tr>
            <td>Mobile No</td>
            <td>: <input type="text" name="mob_no"style="border:1px solid #7ACA3C;border-radius:4px;" size="25"></td>
        </tr>
        <tr>
            <td>Fixed Customer:</td>
            <td>
                <select name="cust_id_fixed">
                    <option value="0"> N/A </option>
                        <?php $qs=mysql_query("select * from tbl_customer_info where status='fixed' order by customer_id ASC");
                        while($fetch=mysql_fetch_array($qs)) { ?>
                    <option value="<?php echo $fetch['customer_id']; ?>"><?php echo $fetch['cus_name']." ( ".$fetch['address']; ?> )</option>
                            <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Instalment:</td>
            <td><input type="radio" name="instalment" value="1"> Yes <input type="radio" name="instalment" value="0" checked> No</td>
        </tr>
    </table>
    <table  cellspacing="1" width="580px"cellspacing="0" border="0" style="text-align: center; background-color: #005A8D;">
        <tbody>
        <thead>
            <tr id="chkrow" style="background:-moz-linear-gradient(#C3D9FF,#C3D9FF); color: #003366; height: 28px; text-align: center; font-size: 14px; width: 500px; ">
                <th>Product Sl</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Warrenty</th>
                <th>Sell Price</th>
            </tr>
                <?php $num=count($product_sl);
                $total=0;
                for($i=0;$i<$num;$i++) {
                    $total+=$cover_price[$i];
                    ?>
            <tr bgcolor="#f8f8f8">
                <td><?php echo $product_sl[$i]; ?></td>
                <td><?php echo $product_name[$i]; ?></td>
                <td><?php echo $description[$i]; ?></td>
                <td><?php echo $warrenty[$i]; ?></td>
                <td style="width:95px;"><?php echo $cover_price[$i]; ?></td>
            </tr>
        <input type="hidden" name="stock_id[]" value="<?php echo $stock_id[$i]; ?>"/>
        <input type="hidden" name="product_sl[]" value="<?php echo $product_sl[$i]; ?>"/>
        <input type="hidden" name="product_name[]" value="<?php echo $product_name[$i]; ?>"/>
        <input type="hidden" name="description[]" value="<?php echo $description[$i]; ?>"/>
        <input type="hidden" name="warrenty[]" value="<?php echo $warrenty[$i]; ?>"/>
        <input type="hidden" name="buy_price[]" value="<?php echo $buy_price[$i]; ?>"/>
        <input type="hidden" name="cover_price[]" value="<?php echo $cover_price[$i]; ?>"/>
        <input type="hidden" name="discount" value="<?php echo $discount; ?>"/>
        <input type="hidden" name="sub_id[]" value="<?php echo $sub_id[$i]; ?>"/>
                    <?php }
                ?>
            <tr bgcolor="#f8f8f8">
                <td colspan="0" align="right" height="26"><span style="margin-right:10px;font-weight: bold; color: green;">Total : <?php echo $total; ?> Tk</span></td>
            </tr>
    </table>
    <table style="margin-left: 367px; background-color:#DDDDDD;" cellspacing="1">
        <tr bgcolor="#f8f8f8">
            <td style="color: orange; font-weight: bold; font-size: 13px;">Discount :</td>
            <td  align="center" height="26"><span style="margin-right:7px;font-weight: bold;"><?php echo $discount; ?>%</span></td>
        </tr>
        <tr bgcolor="#f8f8f8">
            <td style="color:orange; font-weight: bold; font-size: 13px;">Total Price : </td>
            <td colspan="5" align="center" height="26"><span style="margin-right:10px;font-weight: bold;"><?php
                        echo (integer)($total-(($total*$discount)/100));
                        ?> Tk</span>
<input type="hidden" name="total_price" value="<?php echo (integer)($total-(($total*$discount)/100)); ?>">
            </td>
        </tr>
        <tr>
            <td bgcolor="#9DD38F" style="color:black; font-weight: bold;">Pay:</td>
            <td><input type="text" name="pay" required size="16" style=" background-color:#E0E0E0; text-align: center; border:none;" onkeydown="return ( event.ctrlKey || event.altKey
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9)
                    || (event.keyCode>34 && event.keyCode<40)
                    || (event.keyCode==46) )"><b style="background-color: white; font-size: 13px;">Tk</b></td>
        </tr>
        <tr bgcolor="white" align="center">
            <td colspan="2">
                <span><input type="submit" value="Sell" class="btn_class"  title="এই বাটনে ক্লিক করলে পন্য বিক্রয় সম্পন্ন হযে যাবে।" onclick="return sure_btn();"></span>
            </td>
        </tr>
    </table>
</form>
    <?php
} ?>
    <?php if(isset($_SESSION['errMessage'])) {
        echo "<div style=' font-size:14px; margin-top:14px; margin-left:310px; margin-bottom:-10px;'".$_SESSION['errMessage']."</div>";
        unset($_SESSION['errMessage']);
    } ?>
<?php if(isset($_SESSION['successMessage'])) {
        echo "<div style=' font-size:14px; margin-top:14px; margin-left:310px; margin-bottom:-10px;'".$_SESSION['successMessage']."</div>";
        unset($_SESSION['successMessage']);
    } ?>