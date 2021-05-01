<script type="text/javascript">
    function confirm_msg(){
        var m=confirm('Do you want to delete?');
        if(m){
          return true;
        }else{
            return false;
        }
    }
    </script>
<div style="float: left; margin-left: 20px;">
    <fieldset style="width: 870px; padding-left: 15px; padding-top:30px; padding-right: 12px; padding-bottom: 12px; font-weight: normal; line-height: 23px; font-family: arial; font-size: 13px;">
        <legend style="font-size:18px; color: #00CCFF;" align="center"> View Other Expend History</legend>
         <table width="100%" bgcolor="#f8f8f8">
            <tr bgcolor="#003366" align="center" style="color:white; height: 32px;">
            <th>Descriptin</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Action</th>

        </tr>

        <?php
        $total=0;
        $q=mysql_query("select * from tbl_expend");
         $i=0;
        while($row=mysql_fetch_array($q)){
        ?>

     <?php
        if($i%2==0){ ?>
        <tr bgcolor="#FEFEFE" align="center">
            <?php } else{ ?>
            <tr bgcolor="#f8f8f8" align="center">
            <?php } ?>

            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td>
                <?php $total+=$row['amount']; ?>
                <a href="<?php echo base_url(); ?>user/edit_expend/<?php echo $row['expend_id']; ?>" style="text-decoration: none;">
                    <img src="<?php echo base_url(); ?>images/b_edit.png" title="EDIT" />
                </a>&nbsp;&nbsp;&nbsp;
                <a href="<?php echo base_url(); ?>user/delete_expend/<?php echo $row['expend_id']; ?>">
                    <img src="<?php echo base_url(); ?>images/b_drop.png" title="Delete" onclick="return confirm_msg();"/>
                </a>
            </td>

         <?php
            $i++;
            } //end of while for looping
            ?>
            </tr>
            <tr bgcolor="#FEEDFF">
                <td colspan="4" align="center" style="font-weight: bold;">Total: <?php echo $total; ?> Tk</td>
            </tr>
            </table>
<?php if(isset($_SESSION['successMessage'])) {
            echo "<span style='float:left;margin-left:35%;'>".$_SESSION['successMessage']."</span>";
            unset($_SESSION['successMessage']);
        } ?>
    </fieldset>
      </div>
