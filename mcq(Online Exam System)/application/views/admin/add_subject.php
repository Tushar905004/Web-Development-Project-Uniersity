<form action="<?php echo base_url();?>admin/SubjectData" method="post">
    <table align="center" cellspacing="1" bgcolor="#025382" width="70%" height="134px" style="margin-left: 79px;">
 <tr  bgcolor="#73C69D">
 <td colspan="2" align="center"><h3>Add New Subject!</h3></td>
</tr>
<tr bgcolor="#FFFFFF">
    <th> Subject name:</th><td><input type="text" name="subject_name" placeholder="Example: Computer Networking" size="28" required=""/></td>
</tr>
<tr bgcolor="#FFFFFF">
<th> Subject code:</th><td><input type="text" name="subject_code" placeholder="Example: 4584" required/></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center" colspan="2"><input type="submit" value="Save Subject"></td>
</tr>

<td colspan="2" style='background-color: #F0FFF0; color: #FF2424; font-weight: bold;'>
<?php

if(isset($_SESSION['exception']))
{
echo $_SESSION['exception'];
unset($_SESSION['exception']);
}
if(isset($_SESSION['message'])){
echo $_SESSION['message'];
unset($_SESSION['message']);
}
?>
</td>
</table>
</form>
