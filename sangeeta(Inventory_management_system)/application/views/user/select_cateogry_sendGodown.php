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
        xmlhttp.open("POST","<?php echo base_url(); ?>user/retriveSubCategory/"+str,true);
        xmlhttp.send();
    }
</script>
<table class="tbl_godown">
    <form>
        <tr>
            <td>Select Category:</td><td>
                <select name="category_id" onchange="showUser(this.value)">
                    <option value="">Select Category</option>
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
</table>
<?php if(isset($_SESSION['successMessage'])) {
            echo "<span style='float:left;margin-left:35%;'>".$_SESSION['successMessage']."</span>";
            unset($_SESSION['successMessage']);
        } ?>
<br><br>
<font color="#003366" face="SolaimanLipi"><u style="font-size: 22px;">নির্দেশাবলী:-</u><br>* গোডাউনে প্রেডাক্ট এন্ট্রি করতে পারবেন।<br>
* প্রথমে ক্যাটাগরি তারপর সাব ক্যাটাগরি সিলেক্ট করুন।</font>