<?php

    require_once 'dbcon.php';
    if(isset($_POST['registration'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $c_password = $_POST['confirm_password'];
        $photo = explode('.',$_FILES['photo']['name']);
        $photo_ex = end($photo);
        $photo_name = $username.'.'.$photo_ex;

      //$photo = $_POST['photo'];
        //$photo = end($photo);

        //print_r ($_POST);
        // print_r ($name);


        $input_error = array();

        if(empty($name)){
                $input_error['name'] = "the name field is requird";
        }
        if(empty($email)){
                $input_error['email'] = "the email field is requird";
        }
        if(empty($username)){
                $input_error['username'] = "the username field is requird";
        }
        if(empty($password)){
                $input_error['password'] = "the password field is requird";
        }
        if(empty($c_password)){
                $input_error['confirm_password'] = "the confirm password field is requird";
        }
     // echo '<pre>';
     //  print_r ($input_error);
      //echo '</pre>';
      if(count($input_error) == 0){
         // echo "ok";
         $email_check = mysqli_query($dbconn,"SELECT * FROM `users` WHERE `email`='$email';");
         if(mysqli_num_rows($email_check) == 0){
            $username_check = mysqli_query($dbconn,"SELECT * FROM `users` WHERE `username`='$username';");
            if(mysqli_num_rows($username_check) == 0){
                if(strlen($username) > 7 ){
                    if(strlen($password) > 7){
                        if($password == $c_password){
                         $done =   "INSERT INTO `users`(`name`, `email`, `username`, `password`,`photo`) VALUES ('$name','$email','$username','$password','$photo_name');";

                        if($dbconn->query($done) == true){
                            $success = "YOUR FORM SUCCESSFULLY SUBMITED";
                            move_uploaded_file($_FILES['photo']['tmp_name'],'user_images/'.$photo_name);
                            header('location: index.php');
                            $dbconn->close();
                        }
                        else{
                           echo  "$done <br><br>  $dbconn->error";
                           echo $name;
                           $success = "Some thing is wrong ...try again";
                        }
                        }
                        else{
                            $password_check = "Your Confirming Password is Not Matching !!!!";
                            $success = "Some thing is wrong ...try again";
                        }
                    }
                    else{
                        $password_num = "Please select a password with minimum 8 charecter!!!";
                        $success = "Some thing is wrong ...try again";
                    }
                }
                else{
                    $username_num = "Please select a username with minimum 8 charecter!!!";
                    $success = "Some thing is wrong ...try again";
                }

         }
         else{
             $username_ext = "This username is unavialable";
             $success = "Some thing is wrong ...try again";
         }
        }
        else{
            $email_ext = "This email already exist";
            $success = "Some thing is wrong ...try again";
        }
      }
      else {
        $success = "Some thing is wrong ...try again";
      }
    }
    else{
        $success = "";
    }

   // print_r ($dbconn);

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Registration Form</title>
</head>

<style>

.d-block{
    display: inline;
}
.form-control{
    width:40%;
    border: 2px solid black;

}
.form-group{
width:100%;
margin-top:20px;
}
.reg_form{
    width:100%;
    margin:auto;

}
.reg_btn{
    width:111px;
    margin:auto;
}
.last1{
    font-size:13px;
}
.bg-photo{
    background-image: url('../images/chairs-classroom-college-desks-289740.jpg');
    background-size: cover;
    font-weight: 900;

}
.dark-overlay{
    background-color: rgba(0,0,0,0.9);
}
.reg-h{
    padding-bottom: 8px;
    border-bottom: 3px solid blue;
}
.aleat_label{
    font-size: 15px;
    color: red;
    font-weight:100;
    margin-left:150px;
}
</style>
<body>
    <div class="bg-photo text-light">
        <div class="dark-overlay">
                <div class="container">
                <div class="mt-4 alert alert-success text-success text-center py-3"><?php echo $success?></div>
                    <h1 class="text-center text-info reg-h py-3"><b>User Registration Form</b></h1>
                    <div class="reg_form  mt-4">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group ">
                                <span>Name:</span>
                                <label class="aleat_label"><?php if(isset($input_error['name'])){ echo $input_error['name'];}?>
                                </label>
                                     <input class="form-control float-right" type="text" placeholder="Enter Your Name" name="name" value="<?php if(isset($name)){echo $name;} ?>" id="">
                            </div>
                            <div class="form-group">
                                <span>Email:</span>
                                <label class="aleat_label">
                                     <?php  if(isset($input_error['email'])){ echo $input_error['email'];}
                                            if(isset($email_ext)){echo $email_ext;}?>
                                </label>
                                <input class="form-control float-right" type="email" placeholder="Enter Your E-mail Address" name="email" value="<?php if(isset($email)){echo $email;} ?>" id="">
                            </div>
                            <div class="form-group">
                                <span>Username:</span>
                                <label class="aleat_label">
                                    <?php   if(isset($input_error['username'])){ echo $input_error['username'];}
                                            if(isset($username_num)){echo $username_num;}
                                            if(isset($username_ext)){echo $username_ext;}?>
                                </label>
                                <input class="form-control float-right" type="text" placeholder="Enter a Valid username" name="username" value="<?php if(isset($username)){echo $username;} ?>" id="">
                            </div>
                            <div class="form-group">
                                <span>Password:</span>
                                    <label class="aleat_label">
                                        <?php if(isset($input_error['password'])){ echo $input_error['password'];}  if(isset($password_num)){echo $password_num;}?>
                                    </label>
                                    <input class="form-control float-right" type="password" placeholder="Enter Your Password" name="password" value="<?php if(isset($password)){echo $password;} ?>" id="">
                            </div>
                            <div class="form-group">
                                <span>Confirming PW:</span>
                                    <label class="aleat_label">
                                        <?php if(isset($input_error['confirm_password'])){ echo $input_error['confirm_password'];} if(isset($password_check)){echo $password_check;}?>
                                    </label>

                                    <input class="form-control float-right" type="password" placeholder="Re-Enter Password" name="confirm_password" value="<?php if(isset($c_password)){echo $c_password;} ?>" id="">
                            </div>
                            <div class="form-group">
                                <span>Photo:</span><input class="form-control float-right" type="file" name="photo" id="">
                            </div><br>
                            <div class="reg_btn">
                                <input type="submit" name="registration" value="Registration" class="btn btn-outline-primary px-4">
                            </div>
                        </form>
                    </div>
                    <div class="last1 text-right text-info mt-5"><p>If you have an acount ? then please <a class="text-link" href="login.php">Login</a></p></div>
                    <div class="last1 text-right text-info pb-3"><p>Copyright: <span class="material-icons text-primary">copyright</span><?php date('Y') ?> 2020-2025 All Rights Reserved</p></div>
                </div>
        </div>
    </div>
</body>
</html>
