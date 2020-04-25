<?php
//print_r($dbconn);
require_once 'dbcon.php';
$usrname = $_SESSION['user_login'];
if(!empty($_POST['name'])){
  if(!empty($_POST['roll'])){
    if(!empty($_POST['phone'])){
        if(isset($_POST['submit'])){
          $name = $_POST['name'];
          $roll = $_POST['roll'];
          $class = $_POST['class'];
          $city = $_POST['city'];
          $phone = $_POST['phone'];
          $photo = explode('.',$_FILES['photo']['name']);
          $photo_ex = end($photo);
          $photo_name = $roll.'-'.$usrname.'.'.$photo_ex;

          $rollchecking = $usrname.'_'.$roll;
          $phchecking = $usrname.'_'.$phone;

          $roll_check = mysqli_query($dbconn,"SELECT * FROM `studen_info` WHERE `rollchecking`='$rollchecking'");
          if(mysqli_num_rows($roll_check) == 0){
            $phone_check = mysqli_query($dbconn,"SELECT * FROM `studen_info` WHERE `phchecking`='$phchecking'");
            if(mysqli_num_rows($phone_check) == 0){

              $submission = "INSERT INTO `studen_info`(`name`, `roll`, `class`, `city`, `p_contact`, `photo`, `username`, `rollchecking`, `phchecking`) VALUES ('$name','$roll','$class','$city','$phone','$photo_name','$usrname','$rollchecking','$phchecking');";

            //  $submission = mysqli_query($dbconn,$insert);

              if($dbconn->query($submission) == true){
                  move_uploaded_file($_FILES['photo']['tmp_name'],'student_photos/'.$photo_name);
                echo "<p class='text-success'>Done Successfully for application $name</p>";
                $dbconn->close();
              }else{
                echo "Sorry bro try again";
              }
            }
          }

        }
    }
  }
}







 ?>







<h1 class="text-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Sutdent <small class="text-dark">Statics Overview<small></h1>
<ol class="breadcrumb">
    <li class="active size1"><a class="text-primary  mr-4" href="index.php?page=dashbord"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
    <li class="active size1 "><i class="fa fa-user-plus" aria-hidden="true"></i> Add Sutdent</li>
</ol>
<div class="row">
  <div class="col-8">
    <form class="" action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label class="size1" for="">Name :</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Student's name " value="">
      </div>
      <div class="form-group">
        <label class="size1" for="">Roll :</label>
        <input type="number" class="form-control" name="roll" placeholder="Enter student's roll " value="">
      </div>
      <label class="size1" for="">Class :</label>
      <select class="form-control" name="class">
        <option value="select" selected>select</option>
        <option value="1st">1st</option>
        <option value="2nd">2nd</option>
        <option value="3rd">3rd</option>
        <option value="4th">4th</option>
        <option value="5th">5th</option>
        <option value="6th">6th</option>
        <option value="7th">7th</option>
        <option value="8th">8th</option>
        <option value="9th">9th</option>
        <option value="10th">10th</option>
        <option value="11th">11th</option>
        <option value="12th">12th</option>
      </select>
      <div class="form-group">
        <label class="size1" for="">City :</label>
        <input type="text" class="form-control" name="city" placeholder="Enter Student's Address " value="">
      </div>
      <div class="form-group">
        <label class="size1" for="">Parent's mobile no. :</label>
        <input type="mobile" class="form-control" name="phone" placeholder="Enter mobile number " value="">
      </div>
      <div class="form-group">
        <label class="size1" for="">Student' photo :</label>
        <input type="file" class="form-control" name="photo" placeholder="" value="">
      </div>
      <input type="submit" class="btn btn-outline-success pull-right py-2 px-5" name="submit" value="Submit">
    </form>
  </div>
</div>
