<style type="text/css">
    .tdcolor:hover{
        background-color: #CCFFCC;
}
    </style>

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
        xmlhttp.open("POST","<?php echo base_url(); ?>user/retriveDataforQuickSell/"+str,true);
        xmlhttp.send();
    }
</script>

<form>

    <div style="margin-left: 314px; margin-top: 5px; height: 45px; padding-top: 12px; padding-left: 12px; background-color: #EDEDED; color: #000000; font-size: 17px; font-weight: bold; width: 410px;">
        Product Sl or Product Name:<input type="text" name="amount" required="1" size="21" onKeyUp="showUser(this.value)" value=""/> ?<br>
        <span style="font-weight:normal; font-size: 12px; color: green;">পণ্যের সিরিয়াল নং অথবা পণ্যের নাম অনুযায়ী অনুসন্ধান করুন।</span>
    </div>

</form>
    <form action="<?php echo base_url();?>user/quickSellStep1" method="post">
        <table id="txtHint"  cellspacing="1" bgcolor="white" style="font-family: arial; font-size: 13px; color: #237FBE; margin-left: 78px; text-align: center; border-radius:5px;"width="78%">

        </table>
    </form>