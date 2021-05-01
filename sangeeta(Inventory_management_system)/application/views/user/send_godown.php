<?php
if(isset($category_id) ) { ?>
<input class="back_btn" type="button" value="back" onclick="javascript:history.go(-1);">
<h4  style="margin-left:291px; padding: 3px 12px 3px 12px; font-size: 17px;  float: left;background: -moz-linear-gradient(#003366, #1092CE); margin-top:15px;color:white;">Category Name: <?php
        $q=mysql_query("select * from tbl_product_category where category_id='$category_id'");
        $fetch=mysql_fetch_array($q);
        echo $fetch['category_name']; ?>

    &rarr; <?php echo $result->sub_category_name; ?></h4>
    <?php
    $sessionData=array();
    $sessionData['category_name'] = $result->sub_category_name;
    $this->session->set_userdata($sessionData);
}?>

<noscript>You have no javascript please enable your javascript.</noscript>
<script type="text/javascript">
    function showUser(str)
    {
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            //document.write('murad');
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST","<?php echo base_url(); ?>user/retriveRowforSendGodown/"+str,true);
        xmlhttp.send();
    }
</script>

<form>

    <div style="margin-left: 324px; margin-top: 50px; height: 30px; padding-top: 12px; padding-left: 12px; background-color: #82C5F1; color: #000000; font-size: 17px; font-weight: bold; width: 293px;">
        How many Product:<input type="text" name="amount" required="1" size="4" onKeyUp="showUser(this.value)" value=""/> ?
    </div>

</form>
<br><br>
<div style="background-color:#EDEDED; height: auto; width: 297px; margin-left: 4px;">
    <form action="<?php echo base_url(); ?>user/saveProductCategory" method="post">
        <input type="hidden" name="sub_id" value="<?php echo $result->sub_id; ?>">
        <table id="txtHint"  class="send_godown" cellspacing="1">

        </table>
    </form>
</div>
<?php if(isset($msg)) {
    echo "$msg</div>";
} ?>