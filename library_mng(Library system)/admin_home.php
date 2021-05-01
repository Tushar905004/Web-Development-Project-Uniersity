<?php
session_start();
include "design_1.php";
echo $top;
?>

<div id="midel">
<?php
echo "welcome ".$_SESSION['user_name'];
?>
</div>
<?php
echo $bottom;
?>