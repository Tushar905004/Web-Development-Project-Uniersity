<div style="margin-left: 212px; padding-left: 3px;">
    <form action="<?php echo base_url(); ?>admin/selectUserForSallery" method="post">
        <table>

            <tr bgcolor="#99CCCC"><td><strong>&nbsp;&nbsp;User Id:</strong>
                    <select name="user_id" required="1">
                        <option value="">Select Employee Id</option>
                        <?php
                        $query=mysql_query("select * from tbl_user");
                        while($fetch_x=mysql_fetch_array($query)) {
                            ?>
                        <option value="<?php echo $fetch_x['user_id']; ?>"><?php echo $fetch_x['user_id']; ?></option>
                            <?php } ?>
                    </select>
                    <select name="month" required="1">
                        <option value="">select-month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">march</option>
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
                    <input type="submit" value="search" name="src"></td>
            </tr>

        </table></form>
</div>
<div class="sallery">
    <?php
    if (isset($result)) {

        if ($result) {
            ?>
    <div class="sallery_left">
        <table cellspacing="0" width="50%" style="margin-left: 23%; text-align: left; line-height: 32px;" >
            <tr><th width="132px">Employee Id:</th><td><?php echo $result->user_id; ?></td></tr>
            <tr><th>Employee Name:</th><td><?php echo $result->full_name; ?></td></tr>
                    <?php
                    $q1=mysql_query("select * from tbl_shop where shop_id='$result->shop_id'");
                    $fetch=mysql_fetch_row($q1);
                    ?>
            <tr><th>Shop Name:</th><td><?php echo $fetch[1]; ?></td></tr>
            <tr><th>Join Date:</th><td><?php echo $result->join_date; ?></td></tr>
            <tr><th>Mobile No:</th><td><?php echo $result->mobile_no; ?></td></tr>
            <tr><th>Sallery:</th><td><?php echo $result->sallery; ?></td></tr>
        </table>
    </div>
    <div class="sallery_photo">
        <img src="<?php echo base_url(); ?>images/employee/<?php echo $result->picture; ?>" height="123" width="120" style="padding-top: 8px; padding-right: 4px;"/>
    </div>
    <span style="float: left; height: 32px; width: 91.6%; background-color: #003366; color: white; font-weight: bold; font-size: 18px; text-align: center; margin-top: 10px; margin-bottom: 10px;">Payment History</span>
    <div class="sallery_bottom">
        <table bgcolor="#d3d3d3" width="100%;">
                    <?php
                    $total_paid = 0;
                    if (isset($result1)) {
                        if (!$result1) {
                            echo"<tr bgcolor='#f8f8f8' style='color:red'><td colspan='3' align='center'>You have not yet first payment</td></tr>";
                        } else {
                            ?>
            <tr bgcolor="#99CCCC" style="color: #003366;">
                <th>Last Paid</th>
                <th>Paid Month</th>
                <th>Paid Date</th>
            </tr>
                            <?php
                            $total_paid = 0;
                            foreach ($result1 as $row) {
                                $total_paid+=$row->paid_sallery;
                                ?>
            <tr bgcolor="#f8f8f8">
                <td><?php echo $row->paid_sallery; ?></td>
                <td><?php echo $row->month; ?></td>
                <td><?php echo $row->paid_date; ?></td>
            </tr>

                                <?php
                            }//end of foreach
                        } //end of else
                        ?>

                        <?php if ($total_paid == $result->sallery) {
                            echo "<tr><td  colspan='3' align='center' style='color:green'>Paid Successfull</td></tr>";
                        } else {
                            ?>
            <tr>
                <td colspan="3" align="center"><b style="color:green;">Total Paid: <?php echo $total_paid; ?> Tk</b></td>
            </tr>
            <tr bgcolor = "#99CCCC">
            <form action = "<?php echo base_url(); ?>admin/SalleryPaid" method = "post">
                <td>Now Pay:(<?php echo $month;
                                    ?>)</td>

                <td colspan="2">

                    <input type="text" name="paid_sallery" style="color:blue;"/>
                    <input type="hidden" value="<?php echo $result->user_id; ?>" name="user_id"/>
                    <input type="hidden" value="<?php echo $month; ?>" name="pay_month"/>
                    <input type="hidden" value="<?php echo $result->sallery; ?>" name="total_sallery"/>
                    <input type="hidden" value="<?php echo $total_paid; ?>" name="total_paid_ex"/>
                    <input type="submit" value="Pay"/>

                </td>
            </form>
            </tr> <?php } ?>

                        <?php } //end of isset of result1 ?>
                    <?php
                    if (isset($_SESSION['errMessage'])) {
                        echo "<tr><td colspan='3'>" . $_SESSION['errMessage'] . "</td></tr>";
                        unset($_SESSION['errMessage']);
                    }
                    ?>
        </table>
    </div> <!--end of sallery condition div-->

        <?php

    } else{ 
        echo "No result Found";
    }
}
if (isset($msg)) {
    echo $msg;
}
?>
           
</div>
    <!--end of main div-->