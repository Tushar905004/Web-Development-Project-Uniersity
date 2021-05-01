<?php
 $message='';
  $link = mysqli_connect('localhost', 'root', '', 'db_student_info');  
 if(isset($_POST['username'])){
     $username=$_POST['username'];
     $password=$_POST['password'];
     $sqli="select * from loginform where username='".$username."' AND password='".$password."' limit 1";
    $result=mysqli_query($link,$sqli);
      if(mysqli_num_rows($result)==1){ 
         // $message="You Have Sucessfully Entry";
           header('Location:index.php');
          exit();
 } else{
    // echo"You Have Entered Incorrect Password";
     $message="You Have Entered Incorrect Password";
 }
 }
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="well">
                       
                       <div class="text-center btn-success text-danger"><h2><b>Login Panel</b></h2></div>
                       <form class="form-horizontal"method="POST" action="login.php">
                           <div class="input-group">
                               <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                               <input id="email" type="text" class="form-control" name="username" placeholder="Insert User Name" required>
                           </div>
                           <br>
                           <div class="input-group">
                               <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                               <input id="password" type="password" class="form-control" name="password" placeholder="Insert Password" required>
                           </div>
                           <br>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-4">
                                    <button type="submit" name="submit" class="btn btn-success btn-default btn-lg">Login</button>
                                </div>
 
                            </div>
                     </form>
                       <h4 class="text-center  text-danger"><?php echo $message; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>