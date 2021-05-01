<?php
    $link = mysqli_connect('localhost', 'root', '', 'db_student_info');
    
    if(isset($_GET['status'])){
    $id=$_GET['id'];
    $sqli="DELETE FROM tbl_student WHERE student_id='$id'";
    if(!mysqli_query($link,$sqli)){
        die('Query Problem'.mysqli_error($link));
    }
}
    
    
    $sqli ="SELECT * FROM tbl_student ORDER BY student_id DESC";
    if(mysqli_query($link, $sqli)){
    $query_result=mysqli_query($link, $sqli);
    } else {
    die('Query Problem'.mysqli_error($link));
}

?>






<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manage Student</title>
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
                        <table class="table table-bordered">
                            <tr>
                                <th>Student Name</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            <?php while ($student_info = mysqli_fetch_assoc($query_result)){ ?>
                            <tr>
                                <th><?php echo $student_info['student_name']; ?></th>
                                <th><?php echo $student_info['email_address']; ?></th>
                                <th><?php echo $student_info['phone_number']; ?></th>
                                <th><?php echo $student_info['address']; ?></th>
                                <th>
                                    <a href="edit-student.php?id=<?php echo $student_info['student_id']; ?>" class="btn btn-success">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="?status=delete&id=<?php echo $student_info['student_id']; ?>" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </th>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>