        <script language="javascript" type="text/javascript">
            $(document).ready(function()
            {
                $("#checkall").live('click',function(event){
                    $('input:checkbox:not(#checkall)').attr('checked',this.checked);
                    //To Highlight
                    if ($(this).attr("checked") == true)
                    {
                        //$(this).parents('table:eq(0)').find('tr:not(#chkrow)').css("background-color","#FF3700");
                        $("#tblDisplay").find('tr:not(#chkrow)').css("background-color","#00315E");
                        $("#tblDisplay").find('tr:not(#chkrow)').css("color","white");

                    }
                    else
                    {
                        //$(this).parents('table:eq(0)').find('tr:not(#chkrow)').css("background-color","#fff");
                        $("#tblDisplay").find('tr:not(#chkrow)').css("background-color","#F1F6FF");
                        $("#tblDisplay").find('tr:not(#chkrow)').css("color","black");
                    }
                });
                $('input:checkbox:not(#checkall)').live('click',function(event)
                {
                    if($("#checkall").attr('checked') == true && this.checked == false)
                    {
                        $("#checkall").attr('checked',false);
                        $(this).closest('tr').css("background-color","#F1F6FF");
                    }
                    if(this.checked == true)
                    {
                        $(this).closest('tr').css("background-color","#00315E");
                        $(this).closest('tr').css("color","white");
                        CheckSelectAll();
                    }
                    if(this.checked == false)
                    {
                        $(this).closest('tr').css("background-color","#F1F6FF");
                        $(this).closest('tr').css("color","brown");
                    }
                });

                function CheckSelectAll()
                {
                    var flag = true;
                    $('input:checkbox:not(#checkall)').each(function() {
                        if(this.checked == false)
                            flag = false;
                    });
                    $("#checkall").attr('checked',flag);
                }
            });

        </script>

<?php
if(isset($category_id) ) { ?>
<input class="back_btn" type="button" value="back" onclick="javascript:history.go(-1);">
<h4  style="margin-left:291px; padding: 3px 12px 3px 12px; font-size: 17px;  float: left;background: -moz-linear-gradient(#003366, #1092CE); margin-top:15px;color:white;">Category Name: <?php
        $q=mysql_query("select * from tbl_product_category where category_id='$category_id'");
        $fetch=mysql_fetch_array($q);
        echo $fetch['category_name']; ?>

    &rarr; <?php echo $result->sub_category_name; ?></h4>
<br><br>
<form action="<?php echo base_url(); ?>user/SendProductintoStock" method="post">
    <input type="hidden" name="sub_id" value="<?php echo $result->sub_id; ?>">
    <table  cellspacing="1" width="99%" cellspacing="0" border="0" align="left" id="tblDisplay">
        <tbody>
        <thead>
            <tr id="chkrow" style="background:-moz-linear-gradient(#C3D9FF,#C3D9FF); color: #003366; height: 28px; text-align: center; font-size: 14px;">
                <th>
                    <input type="checkbox" id="checkall"/>
                </th>
                <th>Product Sl</th>
                <th>Peouct Name</th>
                <th>Description</th>
                <th>B.P.</th>
                <th>Warrenty</th>
                <th>Conver Price</th>
            </tr>
                <?php
                $i=1;
                $shop_id=$this->session->userdata('shop_id');
                $q1=mysql_query("select * from tbl_godown where sub_id='$result->sub_id' and shop_id='$shop_id'");
                while($fetch1=mysql_fetch_array($q1)) {
                    if($i%2==0) {
                        ?>
            <tr bgcolor="#E1EFF7">
                            <?php } else { ?>
            <tr bgcolor="#ffffff">
                            <?php } ?>
                <td><input type="checkbox" name="num[]" value="<?php echo $fetch1['godown_id']; ?>"></td>
                <td><?php echo $fetch1['product_sl']; ?>
                    <input type="hidden" name="product_sl[]" value="<?php echo $fetch1['product_sl']; ?>">
                </td>
                <td><?php echo $fetch1['product_name']; ?>
                    <input type="hidden" name="product_name[]" value="<?php echo $fetch1['product_name']; ?>">
                </td>
                <td>
                    <input type="hidden" name="description[]" value="<?php echo $fetch1['description']; ?>">
                    <?php echo $fetch1['description']; ?>
                </td>
                <td>
                    <input type="hidden" name="buy_price[]" value="<?php echo $fetch1['buy_price']; ?>">
                    <?php echo $fetch1['buy_price']; ?>
                </td>
                <td>
                    <input type="hidden" name="warrenty[]" value="<?php echo $fetch1['warrenty']; ?>">
                    <?php echo $fetch1['warrenty']; ?>
                </td>
                <td>
                    <input type="hidden" name="cover_price[]" value="<?php echo $fetch1['cover_price']; ?>">
                    <?php echo $fetch1['cover_price']; ?>
                </td>        
        
        </tr>
                <?php  $i++;
            } ?>
            <?php if(mysql_num_rows($q1)>0) { ?>
        <tr>
            <td colspan="7" style="color:blue; background-color: white;">Goods Quantity : <?php echo mysql_num_rows($q1); ?></td>
        </tr>
        <input type="hidden" name="category_id" value="<?php echo $fetch['category_id']; ?>"/>
                <?php } else { ?>
        <tr>
            <td colspan="7" style="color: red; background-color: white; font-size: 14px;">No Product Found in the Godown !</td>
        </tr>
                <?php } ?>
        </thead>
        </tbody>
    </table>
    <span style="margin-left: 426px;"><input type="submit" value="Send Stock" class="btn_class"></span>
</form>
    <?php if(isset($msg)) {
        echo "$msg</div>";
    } ?>

    <?php }?>
    <?php if(isset($_SESSION['errMessage'])) {
        echo "<span style='float:left;margin-left:35%;'>".$_SESSION['errMessage']."</span>";
        unset($_SESSION['errMessage']);
    } ?>
<?php if(isset($_SESSION['successMessage'])) {
            echo "<span style='float:left;margin-left:35%;'>".$_SESSION['successMessage']."</span>";
            unset($_SESSION['successMessage']);
        } ?>