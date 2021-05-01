<style type="text/css">
    #main{
float: left;
height: 100%;
width: 98%;
padding: 5px;
background-color: #97C4EB;
-moz-border-radius-topleft: 10px;
-moz-border-radius-topright: 10px;
}
div.content{
float:left;
background-color: white;
width:100%;
height:auto;
margin-top: 12px;
line-height: 23px;
}
</style>
<script language="JavaScript" type="text/javascript">
var t = setTimeout("document.myform.submit();",<?php echo $result->exam_time*60000; ?>); //2 seconds measured in miliseconds
</script>
<div id="main">
    <center><font size="+1" color="#025382" style="text-decoration: underline;">Subject Name:<?php echo $result->subject_name; ?>(<?php echo $result->subject_code; ?>)</font></center>
<br>

<form action="<?php echo base_url();?>welcome/QuestionData" method="post" name="myform">
    <table bgcolor="" align="center" cellspacing="1" style="line-height: 23px;">
    <tr>
	<th>Student Roll</th>
        <td> :<input type="text" name="roll" required="1" style="border-radius:2px; border: none; height: 20px;" placeholder="Example: 905000"/></td>
</tr>
<tr>
	<th>Department</th>
        <td> :<input type="radio" name="dept" value="CST"  required="1"/>CST
	<input type="radio" name="dept" value="DNT" />DNT</td>
</tr>
<tr>
    <th>Total Mark</th>
    <td> :<?php echo $result->exam_mark; ?></td>
</tr>
<tr>
    <th>Total Time</th><td> :<?php echo $result->exam_time; ?> minutes.</td>
</tr>
</table>
<div class="content">
<table>
<tr>
<td><input type="hidden" name="subject_code" value="<?php echo $result->subject_code; ?> "></td>
<input type="hidden" name="exam_mark" value="<?php echo $result->exam_mark; ?>">
</tr>
<?php

$k=count($result1);

$i=1;
foreach($result1 as $row){
echo "<table>";

?>

<tr>
    <td style="color:#004D89; font-weight: bold;">Q<?php echo $i; ?>. <font size="-1"><?php echo $row->question;  ?></font><input type="hidden" name="id<?php echo $i;?>" value="<?php echo $row->id;?>"></td>
</tr>

<?php if($row->choice_1){?>
<tr><td>
a)<input type="radio" name="answer<?php echo $i;?>" value="<?php echo $row->choice_1; ?>" /><?php echo $row->choice_1;?>
<?php
echo "</td></tr>"; }
?>

<?php if($row->choice_2){?>
<tr><td>b)
<input type="radio" name="answer<?php echo $i;?>" value="<?php echo $row->choice_2; ?>" /><?php echo $row->choice_2;?></td>
<?php
echo "</td></tr>"; }?>
<?php if($row->choice_3){?>
<tr><td>
c)<input type="radio" name="answer<?php echo $i;?>" value="<?php echo $row->choice_3; ?>" /><?php echo $row->choice_3;?>
<?php
echo "</td></tr>"; }?>

<?php if($row->choice_4){?>
<tr><td>
d)<input type="radio" name="answer<?php echo $i;?>" value="<?php echo $row->choice_4; ?>" /><?php echo $row->choice_4;?>
<?php
echo "</td></tr>"; }?>

</td>
</tr>

<?php
$i++;
}

?>

<tr>
    <td><input type="submit" value="Send to Process" /></td>
</tr>
</table>
</form>
</div>
<?php


if(isset($_SESSION['message'])){
echo $_SESSION['message'];
unset($_SESSION['message']);
}
?>
</div>
<?php //include_once 'application/views/clock_visiting.php'; ?>
