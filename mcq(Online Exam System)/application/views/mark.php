<?php
$fulmark=0;
foreach($result as $row){
$id=$row->id;
$choice_right=$row->choice_right;
if(($id1==$id)&&($answer1==$choice_right)){
$mark=1;
}
else if(($id2==$id)&&($answer2==$choice_right)){
$mark=1;
}
else if(($id3==$id)&&($answer3==$choice_right)){
$mark=1;
}

else if(($id4==$id)&&($answer4==$choice_right)){
$mark=1;
}

else if(($id5==$id)&&($answer5==$choice_right)){
$mark=1;
}

else if(($id6==$id)&&($answer6==$choice_right)){
$mark=1;
}
else if(($id7==$id)&&($answer7==$choice_right)){
$mark=1;
}
else{
$mark=0;
}
$fulmark+=$mark;
}
$fulmark;

?>
<form  action="<?php echo base_url();?>welcome/saveMark" method="post">
<input type="text" name="fulmark" value="<?php echo $fulmark;?>">
<input type="hidden" name="roll" value="<?php echo $roll;?>">
<input type="hidden" name="dept" value="<?php echo $dept;?>">
<input type="submit" value="sdflfk">
</form>