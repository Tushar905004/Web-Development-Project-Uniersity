<div style="float: left; margin-left: 20px;">
    <fieldset style="width: 870px; padding-left: 15px; padding-top:30px; padding-right: 12px; padding-bottom: 12px; font-weight: normal; line-height: 23px; font-family: arial; font-size: 13px;">
        <legend style="font-size:18px; color: #00CCFF;" align="center"> View Account System</legend>
         <table width="100%" bgcolor="#f8f8f8">
            <tr bgcolor="#003366" align="center" style="color:white; height: 32px;">
            <th>Account ID</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Action</th>

        </tr>

        <?php
        $q=mysql_query("select * from tbl_personal_account");
        $i=0;
        while($row=mysql_fetch_array($q)){
        $num=mysql_num_rows($q);

        ?>

<?php
        if($i%2==0){ ?>
        <tr bgcolor="#d4d4d4" align="center">
            <?php } else{ ?>
            <tr bgcolor="#f8f8f8" align="center">
            <?php } ?>
            <td><?php echo $row['account_id']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td>
                <a href="<?php echo base_url(); ?>admin/edit_account/<?php echo $row['account_id']; ?>" style="text-decoration: none;">
                    <img src="<?php echo base_url(); ?>images/b_edit.png" title="EDIT(পরিবর্তন করুন)" />
                </a>&nbsp;&nbsp;&nbsp;
                <a href="<?php echo base_url(); ?>admin/delete_account/<?php echo $row['account_id']; ?>">
                    <img src="<?php echo base_url(); ?>images/b_drop.png" title="Delete(ডিলেট করুন)"/>
                </a>
            </td>

            </tr>
            <?php
            $i++;
            } //end of while for looping
            ?>
            </table>
<?php if(isset($_SESSION['successMessage'])) {
            echo "<div style=' margin-top:12px; margin-left:350px; margin-bottom:-10px;'".$_SESSION['successMessage']."</div>";
            unset($_SESSION['successMessage']);
        } ?>
    </fieldset>
      </div>