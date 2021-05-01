<table bgcolor="#444444" cellspacing="2" width="90%" align="center">
<tr>
	<td>Subject Name</td><td>Subject Code</td><td>Action</td>
</tr>
<?php foreach($result as $row){ ?>
<tr>
	<td><?php echo $row->subject_name; ?></td>
	<td><?php echo $orw->subject_code;?></td>
	<td><a href="<?php echo base_url(); ?>">Delete</a><a href="<?php echo base_url(); ?>">Edit</a>
</tr>
<?php } ?>
</table>