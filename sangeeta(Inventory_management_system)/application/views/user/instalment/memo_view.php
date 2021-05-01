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
        xmlhttp.open("POST","<?php echo base_url(); ?>user/retriveDataforMemo/"+str,true);
        xmlhttp.send();
    }
</script>

<form>

    <div style="margin-left: 244px; margin-top: 5px; height: 35px; padding-top: 12px; padding-left: 12px; background-color: #EDEDED; color: #000000; font-size: 17px; font-weight: bold; width: 500px;">
        Mobile No or Customer Name:<input type="text" name="amount" required="1" size="24" onKeyUp="showUser(this.value)" value=""/> ?
    </div>

</form>
    <form action="<?php echo base_url(); ?>user/saveProductCategory" method="post">
        <table id="txtHint"  cellspacing="1" bgcolor="white" style="font-family: arial; font-size: 13px; color: #237FBE; margin-left: 28px; text-align: center; border-radius:5px;"width="96%">

        </table>
    </form>