<?php
//$name="asd";
 $message='';
if (isset($_POST['btn'])) {
    //echo "Tushar";
    $link = mysqli_connect('localhost', 'root', '', 'db_student_info');
    $sqli = "INSERT INTO tbl_student(student_name, email_address, phone_number, address) VALUES('$_POST[student_name]', '$_POST[email_address]','$_POST[phone_number]','$_POST[address]')";
   
    if(mysqli_query($link, $sqli)){
    $message="Student Info save successfully";
    }else{
        die('Query Problem'. mysqli_error($link));
    }
}
//mysqli_connect('localhost','root','','db_student_info');

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Student</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Student_Info</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li class="active"><a href="add_student.php">Add Student <span class="sr-only">(current)</span></a></li>
        <li><a href="manage-student.php">Manage Student</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php">Logout</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
          <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="well">
                       
                        
                        <form class="form-horizontal" action="" method="POST">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Student Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="student_name" class="form-control" id="inputEmail3" placeholder="student name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email_address"class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="number" name="phone_number" class="form-control" id="inputPassword3" placeholder="phone number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="address"></textarea>
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <div class="col-sm-offset-5 col-sm-10">
                                    <button type="submit" name="btn" class="btn btn-default">Save Student Info</button>
                                </div>
                            </div>
                        </form> 
                        
                        <h2 class="text-center  text-warning"><?php echo $message; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>