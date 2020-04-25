
  <?php
    require_once './dbcon.php';

    session_start();

    if(isset($_POST['login'])){
      $username = $_POST['username'];
      $password = $_POST['password'];

       $user_check_query = "SELECT * FROM `users` WHERE `username` = '$username'";
       $user_check =mysqli_query($dbconn,$user_check_query);
       if(mysqli_num_rows($user_check) > 0){
          $row = mysqli_fetch_assoc($user_check);
          if($row['password'] == $password){
           // print_r($row);
              $_SESSION['user_login'] = $username;

            //  if(isset($_SESSION['user_login'])){
              header('location: index.php');
          //  }
          }
          else{
            $no_pass ="Wrong Password";
          }
       }
       else{
         $no_user = "Wrong Username";

       }
    }


    if(isset($_SESSION['user_login'])){
      header('location: index.php');
    }


  ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Student Management System</title>
</head>
<style>
     .column{
        width:300px;
        margin:auto;
        padding: 10px;
        border: 2px solid #333;
        border-radius: 20px;
    }
</style>


<body>


    <div class="container">
    <h1 class="text-center mt-2 ">Student management system</h1>
    <div class="row pt-5">
      <div class=" column bg-info">
        <h2 class="text-center bg-info text-light p-1">Admin Login form</h2>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <input class="form-control" requird name="username" placeholder="Enter Username" type="text" value="<?php if(isset($username)){ echo $username ;}?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Enter Password" name="password" requird id="" value="<?php if(isset($password)){ echo $password ;} ?>">
                </div>

                <div class="form-group">
                    <a class="btn btn-primary" href="../index.php">Back TO SMS</a>
                    <input class="btn btn-success px-4 float-right"  type="submit" value="login" name="login">
                </div>

            </form>
        </div>
    </div>
    <?php if(isset($no_user)){ echo '<div class="alert alert-danger text-center mt-4"> '.$no_user.' </div>';}?>
    <?php if(isset($no_pass)){ echo '<div class="alert alert-danger text-center mt-4"> '.$no_pass.' </div>';}?>

    </div>






</body>
</html>
