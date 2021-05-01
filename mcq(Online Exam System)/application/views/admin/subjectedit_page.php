<form action="<?php echo base_url();?>admin/SubjectDataForEdit" method="post">
<table align="center" bgcolor="#006699" cellspacing="1">
<tr>
   <td></td><td><input type="hidden" name="subject_id" value="<?php echo $result->id;?>"></td>
</tr>
<tr bgcolor="#ffffff">
<td>Subject code</td><td><input type="text" name="subject_code" value="<?php echo $result->subject_code;?>" readonly=""><font color="red">Can't changeable</font></td>
</tr>
<tr bgcolor="#ffffff">
<td>Subject name</td><td><input type="text" name="subject_name" value="<?php echo $result->subject_name;?>"> changeable</td>
</tr>
<tr bgcolor="#ffffff">
<td align="center" colspan="2"><input type="submit" value="Save"></td>
</tr>

</table>
</form>
