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
        xmlhttp.open("POST","<?php echo base_url(); ?>admin/retriveRowforCategory/"+str,true);
        xmlhttp.send();
    }
</script>

<form>

    <div style="margin-left: 344px; margin-top: 12px; height: 35px; padding-top: 12px; padding-left: 12px; background-color: #EDEDED; color: #000000; font-size: 17px; font-weight: bold; width: 293px;">
        How many Sub-Category:<input type="text" name="amount" size="4" onKeyUp="showUser(this.value)" value=""/> ?
    </div>

</form>
<br><br>
<div style="background-color:#EDEDED; height: auto; width: 297px; margin-left: 344px;">
    <form action="<?php echo base_url(); ?>admin/saveProductCategory" method="post">
        <table id="txtHint" >

        </table>
    </form>
</div>
<?php if(isset($msg)) {
    echo "$msg</div>";
} ?>
   
