<h3><u>Exam Management</u></h3>
<table bgcolor="#006699" cellspacing="1" width="100%" style="line-height: 26px;">
    <?php
    if(isset($_SESSION['message'])) {
        echo "<tr bgcolor='#006699' style='color:green; background-color: #F0FFF0; height: 25px;'>
            <td colspan='6' align='center'>".$_SESSION['message']."</td></tr>";
        unset($_SESSION['message']);
    }
    ?>
    <tr style="color:white; height: 24px; background-color: #519349; font-size: 11px;">
        <th>Subject Name</th>
        <th>Sub Code</th>
        <th>Status</th>
        <th>Exam Mark</th>
        <th>Time(Min)</th>
        <th>Action</th>
    </tr>
    <?php foreach($result as $row) { ?>
    <form action="<?php echo base_url(); ?>admin/SaveManageData" method="post">
        <tr bgcolor="#F0FFF0" align="center">
            <td><?php echo $row->subject_name; ?></td>
            <td><?php echo $row->subject_code;?></td>
        <input type="hidden" name="subject_code" value="<?php echo $row->subject_code; ?>" />
        <input type="hidden" name="subject_name" value="<?php echo $row->subject_name; ?>" />
        <td>
                <?php if($row->permission==0) { ?>
            <img src="<?php echo base_url(); ?>image/b_drop.png" />
                    <?php } else {?>
            <img src="<?php echo base_url(); ?>image/s_success.png" />
                    <?php } ?>
        </td>
        <td>
            <input type="text" name="exam_mark" size="3"value="<?php echo $row->exam_mark; ?>" />
        </td>
        <td>
            <input type="text" name="exam_time" size="3"value="<?php echo $row->exam_time; ?>" />
        </td>
        <td colspan="0" align="center">
            <input type="submit" value="Save" />
        </td>
        </tr>
    </form>
        <?php } ?>



</table>
