<?php
$link = mysqli_connect('localhost', 'root', '', 'db_student_info');
$student_id=$_GET['id'];
$sql="SELECT * FROM tbl_student WHERE student_id='$student_id'";
if(mysqli_query($link, $sql)){
   $query_result=mysqli_query($link,$sql);
   $student_info= mysqli_fetch_assoc($query_result);
    }else{
        die('Query Problem'. mysqli_error($link));
    }


if (isset($_POST['btn'])) {
    $sql = "UPDATE tbl_student SET student_name='$_POST[student_name]', email_address='$_POST[email_address]', phone_number ='$_POST[phone_number]', address='$_POST[address]'where student_id='$student_id'"; 
    if(mysqli_query($link, $sql)){
        header('Location:manage-student.php');
    }else{
        die('Query Problem'. mysqli_error($link));
    }
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student System-Edit</title>
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
          <li class="active"><a href="index.php">Add Student <span class="sr-only">(current)</span></a></li>
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
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
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
                                    <input type="text" name="student_name" value="<?php echo $student_info['student_name']; ?>"class="form-control" id="inputEmail3" placeholder="student name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email_address" value="<?php echo $student_info['email_address']; ?>" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="number" name="phone_number" value="<?php echo $student_info['phone_number']; ?>"class="form-control" id="inputPassword3" placeholder="phone number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="address"><?php echo $student_info['address']; ?></textarea>
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="btn" class="btn btn-default">Update Student Info</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>