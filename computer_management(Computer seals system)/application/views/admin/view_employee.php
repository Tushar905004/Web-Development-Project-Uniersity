<div style="float: left; margin-left: 20px;">
    <fieldset style="width: 870px; padding-left: 15px; padding-top:30px; padding-right: 12px; padding-bottom: 12px; font-weight: normal; line-height: 23px; font-family: arial; font-size: 13px;">
        <legend style="font-size:18px; color: #00CCFF;" align="center">View Employee System</legend>
            <table width="100%" bgcolor="#f8f8f8">
                <tr bgcolor="#003366" align="center" style="color:white; height: 32px;">
            <th>Shop Name</th>
            <th>Full Name</th>
            <th>Age</th>
            <th>Address</th>
            <th>Mobile No</th>
            <th>Join Date</th>
            <th>Sallery</th>

        </tr>

        <?php
        $q=mysql_query("select * from tbl_user");
         $i=0;
        while($row=mysql_fetch_array($q)){
        ?>
<?php
        if($i%2==0){ ?>
        <tr bgcolor="#d4d4d4" align="center">
            <?php } else{ ?>
            <tr bgcolor="#f8f8f8" align="center">
            <?php }
            $shop_id=$row['shop_id'];
            $qz=mysql_query("select * from tbl_shop where shop_id='$shop_id'");
            $fetch_x=mysql_fetch_array($qz);
            ?>
            <td><?php echo $fetch_x['shop_name']; ?></td>
            <td><?php echo $row['full_name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['mobile_no']; ?></td>
            <td><?php echo $row['join_date']; ?></td>
            <td><?php echo $row['sallery']; ?></td>
            </tr>
             <?php
            $i++;
            } //end of while for looping
            ?>
            </table>
    </fieldset>
      </div>

