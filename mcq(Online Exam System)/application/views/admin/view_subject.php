<h3><u>View All Subjects Information</u></h3>

    <table bgcolor="#006699" cellspacing="1" width="100%">
                <?php
                if(isset($_SESSION['message'])) {
                    echo "<tr bgcolor='#006699' style='color:green; background-color: #F0FFF0; height: 25px;'>
            <td colspan='5' align='center'>".$_SESSION['message']."</td></tr>";
                    unset($_SESSION['message']);
                }
                ?>
        <tr style="color:white; height: 24px; background-color: #519349; font-size: 11px;">
            <th>Subject Name</th><th>Subject Code</th><th>Access Permission</th><th>Save Permission</th><th>Action</th>
        </tr>
        <?php foreach($result as $row) { ?>
<form action="<?php echo base_url(); ?>admin/AccessSubject" method="post">
        <tr bgcolor="#F0FFF0" align="center">
            <td><?php echo $row->subject_name; ?></td>
            <td><?php echo $row->subject_code;?></td>
        <input type="hidden" name="subject_code" value="<?php echo $row->subject_code; ?>" />
        <input type="hidden" name="subject_name" value="<?php echo $row->subject_name; ?>" />
        <td>
                <?php if($row->permission==0) { ?>
            <select name="permission">
                <option value="1">YES</option>
                <option value="0" selected="selected">NO</option>
            </select>
            <img src="<?php echo base_url(); ?>image/b_drop.png" />
                    <?php } else {?>
            <select name="permission">
                <option value="1" selected="selected">YES</option>
                <option value="0" >NO</option>
            </select>
            <img src="<?php echo base_url(); ?>image/s_success.png" />
                    <?php } ?>
        </td>
        <td colspan="0" align="center">
            <input type="submit" value="Permit" />
        </td>

        <td><a href="<?php echo base_url();?>admin/SubjectEditPage/<?php echo $row->id;?>"><img src="<?php echo base_url(); ?>image/edit.png" title="Edit"></a>|
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>image/drop.png" title="Drop"></a>
        </td>
            </tr>
            </form>
                <?php } ?>



    </table>
