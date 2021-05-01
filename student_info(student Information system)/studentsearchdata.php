<?php
$nm=$_GET["nm"];
if($nm==""){
    
} else {
    
mysqli_connect('localhost', 'root', '', 'db_student_info');
$res=mysqli_query("SELECT * FROM tbl_student WHERE student_name LIKE ('$nm%')");

echo"<center>"; 
echo"<table border='1'>";
while ($row= mysqli_fetch_array($res))
{
    echo "<tr>"; 
    echo "<td>";
    echo $row["student_name"];
    echo "<td>";
    echo "<td>";
    echo $row["email_address"];
    echo "<td>";
    echo "<td>";
    echo $row["phone_number"];
    echo "<td>";
    echo "<td>";
    echo $row["address"];
    echo "<td>";
    echo"</td>";
}
echo "</table>";
echo "</center>";
}
?>