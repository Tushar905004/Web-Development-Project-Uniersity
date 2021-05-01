<div style="float: left; margin-left: 20px;">
    <fieldset style="width: 870px; padding-left: 15px; padding-top:30px; padding-right: 12px; padding-bottom: 12px; font-weight: normal; line-height: 23px; font-family: arial; font-size: 13px;">
        <legend style="font-size:18px; color: #00CCFF;" align="center"> View Vendor System</legend>
         <table width="100%" bgcolor="#f8f8f8">
            <tr bgcolor="#003366" align="center" style="color:white; height: 32px;">
            <th>Customer ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Mobile No</th>
            <th>Action</th>

        </tr>

        <?php
        $q=mysql_query("select * from tbl_customer_info where status='fixed'");
         $i=0;
        while($row=mysql_fetch_array($q)){
        ?>

     <?php
        if($i%2==0){ ?>
        <tr bgcolor="#d4d4d4" align="center" style="font-size: 11px;">
            <?php } else{ ?>
            <tr bgcolor="#f8f8f8" align="center"style="font-size: 11px;">
            <?php } ?>

            <td><?php echo $row['customer_id']; ?></td>
            <td><?php echo $row['cus_name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['mob_no']; ?></td>
            <td>
                <a href="<?php echo base_url(); ?>admin/edit_customer/<?php echo $row['customer_id']; ?>" style="text-decoration: none;">
                    <img src="<?php echo base_url(); ?>images/b_edit.png" title="EDIT" />
                </a>&nbsp;&nbsp;&nbsp;
                <a href="<?php echo base_url(); ?>admin/delete_customer/<?php echo $row['customer_id']; ?>">
                    <img src="<?php echo base_url(); ?>images/b_drop.png" title="Delete"/>
                </a>
            </td>

         <?php
            $i++;
            } //end of while for looping
            ?>
            </tr>
            </table>
<div style="margin-left: 37%;">
    <?php if(isset($_SESSION['successMessage'])) {
            echo $_SESSION['successMessage'];
            unset($_SESSION['successMessage']);
        } ?>
</div>
    </fieldset>
      </div>
