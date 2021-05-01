<?php

$s_name=$this->session->userdata('subject_name');
$s_code=$this->session->userdata('subject_code');
		 
?>
<form action="<?php echo base_url(); ?>admin/SaveQuestion" method="post">
    <table align="center" width="200" style="line-height: 25px;">
<tr>
    <td colspan="2" align="center" style="font-size: 17px; color: navy;">Subject name: <?php echo $s_name; echo " ( $s_code )";?></td>
</tr>
<tr>
<td></td><td><input type="hidden" name="subject_name" value="<?php echo $s_name;?>"/></td>
</tr>
<tr>
<td></td><td><input type="hidden" name="code" value="<?php echo $s_code;?>"/></td>
</tr>
<tr>
<td>Question:</td><td><input type="text" name="question"  size="54" required/></td>
</tr>
<tr>
<td> 1) <input type="radio" name="answer" value="ans1" required/></td><td><input type="text" name="1"  size="45" required/></td>
</tr>
<tr>
<td> 2) <input type="radio" name="answer" value="ans2" /></td><td><input type="text" name="2" size="45" required/></td>
</tr>
<tr>
<td> 3) <input type="radio" name="answer" value="ans3" /></td><td><input type="text" name="3"  size="45"/></td>
</tr>
<tr>
<td> 4) <input type="radio" name="answer" value="ans4" /></td><td><input type="text" name="4" size="45"/></td>
</tr>
<tr>
    <td colspan="2" align="center">
<?php
if(isset($_SESSION['message'])){
echo $_SESSION['message'];
unset($_SESSION['message']);
}
?>
</td></tr>
<tr>
    <td align="center" colspan="2"><input type="submit" value="Save Question" /></td>
</tr>

</table>
</form>