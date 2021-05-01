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
        xmlhttp.open("POST","<?php echo base_url(); ?>user/retriveSubCategoryForSell/"+str,true);
        xmlhttp.send();
    }
</script>
<table class="tbl_godown">
    <form>
        <tr>
            <td>Select Category:</td><td>
                <select name="category_id" onchange="showUser(this.value)">
                    <option value="">Select Cateogory</option>
                    <?php
                    $q=mysql_query("select * from tbl_product_category");

                    while($fetch=mysql_fetch_array($q)) {
//$category_id=$fetch['category_id'];
                        ?>
                    <option value="<?php echo $fetch['category_id']; ?>"><?php echo $fetch['category_name']; ?></option>
                        <?php } ?>
                </select>
            </td>
    </form>

    <td id="txtHint">
    </td>

</tr>
</table>
    <?php if(isset($_SESSION['successMessage'])) {
        echo "<div style=' margin-top:12px; margin-left:310px; margin-bottom:-10px;'".$_SESSION['successMessage']."</div>";
        unset($_SESSION['successMessage']);
    } ?>