<div style="float: left; margin-left: 10px;">
    <fieldset style="width: 900px; padding-left: 15px; padding-top:30px; padding-right: 12px; padding-bottom: 12px; font-weight: normal; line-height: 23px; font-family: arial; font-size: 13px;">
        <legend style="font-size:18px; color: #00CCFF;" align="center"> View Product Buying System</legend>
        <form action="<?php echo base_url(); ?>admin/view_product_search" method="post">
            <div style="margin-left: 274px;">
                Select Month:<select name="month" required="1">
                    <option value="">select-month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
                <select name="year" required="1">
                    <option value="">select-year</option>
                    <?php
                    $year=date('Y');
                    for($i=($year-1);$i<=$year;$i++) { ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                </select>
                <input type="submit" value="Search">
            </div>
        </form>
        <?php
        if(isset($month) AND isset($year)){
        if($month AND $year) {
            ?>
        <table width="100%" bgcolor="#f8f8f8">
            <tr bgcolor="#003366" align="center" style="color:white; height: 32px;">
                <th>Vendor Name</th>
                <th>Total Amount</th>
                <th>Paid</th>
                <th>Due</th>
                <th>Date</th>
                <th>Entry Date</th>
                <th>Note</th>
                <th>Action</th>

            </tr>

                <?php
                $q=mysql_query("select * from tbl_product_buying where month='$month' and year='$year' ");
                $i=0;
                while($row=mysql_fetch_array($q)) {
                    $num=mysql_num_rows($q);

                    ?>

                    <?php
                    if($i%2==0) { ?>
            <tr bgcolor="#ffffff" align="center">
                            <?php } else { ?>
            <tr bgcolor="#f8f8f8" align="center">
                            <?php }
            $vendor_id=$row['vendor_id'];
            $qz=mysql_query("select * from tbl_vendor where vendor_id='$vendor_id'");
            $fetch_x=mysql_fetch_array($qz);
                            ?>

                <td><?php echo $fetch_x['vendor_name']; ?></td>
                <td><?php echo $row['total_amount']; ?></td>
                <td><?php echo $row['paid']; ?></td>
                <td><?php echo $row['due']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['entry_date']; ?></td>
                <td><?php echo $row['note']; ?></td>
                <td>
                    <form action="<?php echo base_url(); ?>admin/edit_product" method="post">
                        <input type="hidden" name="buying_id" value="<?php echo $row['buying_id']; ?>"/>
                    <input type="submit" style="float: left;  margin-left: 13px;background: none; background-image: url(../images/b_edit.png); border: none; width: 16px; height: 16px; cursor: pointer;" value="&nbsp;">
                    </form>
                    <form action="<?php echo base_url(); ?>admin/delete_product" method="post">
                        <input type="hidden" name="buying_id" value="<?php echo $row['buying_id']; ?>"/>
                    <input type="submit" style="float: left;  margin-left: 13px;background: none; background-image: url(../images/b_drop.png); border: none; width: 16px; height: 16px; cursor: pointer;" value="&nbsp;">
                    </form>
                </td>

            </tr>
                    <?php
                    $i++;
                } //end of while for looping
                ?>
        </table>
            <?php }  } ?>
<div style="margin-left: 37%;">
    <?php if(isset($_SESSION['successMessage'])) {
            echo $_SESSION['successMessage'];
            unset($_SESSION['successMessage']);
        } ?>
</div>
    </fieldset>
</div>
