<form action="<?php echo base_url(); ?>admin/UpdateQuestion" method="post">
    <table align="center" width="200" style="line-height: 24px;">

<tr>
<td></td><td><input type="hidden" name="id" value="<?php echo $result->id;?>"/></td>
</tr>
<tr>
<td>Question:</td><td><input type="text" name="question"   value="<?php echo $result->question;?>"size="54" required/></td>
</tr>
<tr>
<td>1) <input type="radio" name="answer" value="ans1" required /></td><td><input type="text" name="1"   value="<?php echo $result->choice_1;?>" size="45" required/></td>
</tr>
<tr>
<td>2) <input type="radio" name="answer" value="ans2" /></td><td><input type="text" name="2"  value="<?php echo $result->choice_2;?>"size="45" required/></td>
</tr>
<tr>
<td>3) <input type="radio" name="answer" value="ans3" /></td><td><input type="text" name="3"   value="<?php echo $result->choice_3;?>"size="45"/></td>
</tr>
<tr>
<td>4) <input type="radio" name="answer" value="ans4" /></td><td><input type="text" name="4"  value="<?php echo $result->choice_4;?>"size="45"/></td>
</tr>
<tr>
 <td>

</td>
<td align="center"><input type="submit" value="Save Question" /></td>
</tr>

</table>
</form>