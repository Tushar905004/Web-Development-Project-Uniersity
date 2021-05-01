<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "db_student_info");
 $output='';
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$term = mysqli_real_escape_string($link, $_REQUEST['term']);
 
if(isset($term)){
    // Attempt select query execution
    $sql = "SELECT * FROM tbl_student WHERE student_name LIKE '%" . $term . "%'";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo '<br/>'; 
    $output .='<h3 align="center"> <span class="label label-primary">Search Information Result</span></h3>';
    $output .='<div class="table-responsive"> 
            <table class="table table bordered">
            <tr>
            <th>Student Name</th> 
            <th>Email Address</th>
            <th>Phone Number</th>
            <th>Address</th>
            </tr>';

            while($row = mysqli_fetch_array($result)){
//                echo "<p>" . $row['student_name'] . "</p>";
//                echo "<p>" . $row['student_name'] . "</p>";
//                echo "<p>" . $row['student_name'] . "</p>";
//                echo "<p>" . $row['student_name'] . "</p>";
                $output .= ' 
                <tr> 
                <td>'.$row["student_name"].'</td>
                <td>'.$row["email_address"].'</td>
                <td>'.$row["phone_number"].'</td>
                <td>'.$row["address"].'</td>
                 </tr>       
                ';
                      
    }
  echo $output;    

        }  else{
//            echo "<p style>No matches found</p>"; 
            echo'<h3 align="center"> <span class="label label-danger">No Matches Found</span></h3>';
          
            
        } 
          // Close result set
            mysqli_free_result($result);
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
 
// close connection
mysqli_close($link);
?>