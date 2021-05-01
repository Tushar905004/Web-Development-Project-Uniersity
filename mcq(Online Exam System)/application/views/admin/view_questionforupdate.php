<table bgcolor="#035483" cellspacing="1" width="100%" align="center">
    <tr bgcolor="#2C82B6" style="color:white; text-align: center; height: 30px;">
<th>No</th>
<th>Question</th>
<th >Ans1</th>
<th>Ans2</th>
<th>Ans3</th>
<th>Ans4</th>
<th>Correct</th>
<th>Action</th>
</tr>


<?php 
	$i=0;
	foreach($result as $row){
	$id=$row->id;
	$code=$row->code;
	$question=$row->question;
	$choice1=$row->choice_1;
	$choice2=$row->choice_2;
	$choice3=$row->choice_3;
	$choice4=$row->choice_4;
	$choiceright=$row->choice_right;
	$i++;
	?>
<tr bgcolor="#EBF7FF">
<td><?php echo $i;?></td><td><?php echo $question;?></td><td align="center"><?php echo $choice1;?></td><td align="center"><?php echo $choice2; ?></td><td align="center"><?php echo $choice3;?></td><td align="center"><?php echo $choice4;?></td><td align="center"><?php echo $choiceright;?></td><td>
    <a href="<?php echo base_url()?>admin/EditQuestionpage/<?php echo $row->id;?>" onclick="return checkEdit();"><img src="<?php echo base_url(); ?>image/edit.png" title="Edit"></a> |
    <a href="<?php echo base_url()?>admin/DeleteQuestion/<?php echo $row->id;?>" onclick="return checkSubject();"><img src="<?php echo base_url(); ?>image/drop.png" title="Drop"></a>
</tr>
<?php
}
?>



<?php
if(isset($_SESSION['message'])){
echo "<td align='center' colspan='8'>".$_SESSION['message']."</td>";
unset($_SESSION['message']);
}
?>
</table>