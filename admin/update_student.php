<h1 class="text-primary"><i class="fa fa-pencil-plus" aria-hidden="true"></i> Update Student <small class="text-dark">New Admission<small></h1>
<ol class="breadcrumb">
    <li class="active size1"><a class="text-primary  mr-4" href="index.php?page=dashbord"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
    <li class="active size1"><i class="fa fa-pencilr-plus" aria-hidden="true"></i> Update Student</li>
</ol>

<?php

//require_once './dbcon.php';

$id = base64_decode($_GET['id']);
//echo $id;

$db_data = mysqli_query($dbconn,"SELECT * FROM `studen_info` WHERE `id` = '$id'");
$db_row = mysqli_fetch_assoc($db_data);


if(isset($_POST['update-student'])){
  $name = $_POST['name'];
  $roll = $_POST['roll'];
  $class = $_POST['class'];
  $city = $_POST['city'];
  $phone = $_POST['phone'];
  $photo = explode('.',$_FILES['photo']['name']);
  $photo_ex = end($photo);
  $roll_n = $roll.'.'."NEW";
  $photo_name = $roll_n.'.'.$photo_ex;
   //echo $photo_name;

 $input_error = array();

  if(empty($name)){
      $input_error_name = "Name Field is Require.!!!";
      $input_error['name'] = "";
  }
  if(empty($roll)){
      $input_error_roll = "Roll Field is Require.!!!";
      $input_error['roll'] = "";
  }
  if($class == "Select"){
      $input_error_class = "Class is not selected.!!!";
      $input_error['class'] = "";
  }
  if(empty($city)){
      $input_error_city = "City Field is Require.!!!";
      $input_error['city'] = "";
  }
  if(empty($phone)){
      $input_error_phone = "Phone number is Required.!!!";
      $input_error['phone'] = "";
  }
  if($photo_name == "No file chosen"){
      $input_error_photo = "Photo Field is Require.!!!";
      $input_error['photo'] = "";
  }
  if(count($input_error) == 0){

        $submission = "UPDATE `studen_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`p_contact`='$phone',`photo`='$photo_name' WHERE `id`='$id'";

        if($dbconn->query($submission) == true){
            move_uploaded_file($_FILES['photo']['tmp_name'],'student_photos/'.$photo_name);



            $dbconn->close();
        }
        else{
         // echo "no";
        }

      }
      else{
        echo "sorry bro";
      }
      //else{
       // $prob1 = "<h5>This Phone Number is already exists..</h5>";
      }
   // }
    //else{
    // $prob2 =  "<h5>This roll number is unavialable</h5>";
    //}








?>





<div class="container">
  <div class="row">
    <div class="col-sm-7">
      <form class="" action="" method="post" enctype="multipart/form-data">


        <div class="form-group">
          <label for="name" class="size1"><strong>Name :</strong></label>
          <input class="form-control" type="text" name="name" placeholder="Enter Student`s Name" id="name" value="<?= $db_row['name']?>">
        </div>


        <div class="form-group">
          <label for="Roll" class="size1"><strong>Roll :</strong></label>
          <input class="form-control" type="number" name="roll" placeholder="Enter Student`s Roll" id="Roll" value="<?= $db_row['roll']?>">
        </div>


        <div class="form-group">
          <label for="Class" class="size1"><strong>Class :</strong></label>
          <select class="form-control" name="class" placeholder="Enter Student`s Roll">
            <option <?php echo $db_row['class']=='1st' ? 'selected=""':'';?> value="1st">1st</option>
            <option <?php echo $db_row['class']=='2nd' ? 'selected=""':'';?> value="2nd">2nd</option>
            <option <?php echo $db_row['class']=='3rd' ? 'selected=""':'';?> value="3rd">3rd</option>
            <option <?php echo $db_row['class']=='4th' ? 'selected=""':'';?> value="4th">4th</option>
            <option <?php echo $db_row['class']=='5th' ? 'selected=""':'';?> value="5th">5th</option>
            <option <?php echo $db_row['class']=='6th' ? 'selected=""':'';?> value="6th">6th</option>
            <option <?php echo $db_row['class']=='7th' ? 'selected=""':'';?> value="7th">7th</option>
            <option <?php echo $db_row['class']=='8th' ? 'selected=""':'';?> value="8th">8th</option>
            <option <?php echo $db_row['class']=='9th' ? 'selected=""':'';?> value="9th">9th</option>
            <option <?php echo $db_row['class']=='10th' ? 'selected=""':'';?> value="10th">10th</option>
            <option <?php echo $db_row['class']=='11th' ? 'selected=""':'';?> value="11th">11th</option>
            <option <?php echo $db_row['class']=='12th' ? 'selected=""':'';?> value="12th">12th</option>
            <option <?php echo $db_row['class']=='selected' ? 'selected=""':'';?> value="Select">Select</option>
          </select>
        </div>


        <div class="form-group">
          <label for="city" class="size1"><strong>City :</strong></label>
          <input class="form-control" type="text" name="city" placeholder="Enter Student`s City" id="city" value="<?= $db_row['city']?>">
        </div>


        <div class="form-group">
          <label for="phone" class="size1"><strong>Parents ph no. :</strong></label>
          <input class="form-control" type="phone" name="phone" placeholder="Enter parents contact number" pattern="01[1|5|6|7|8|9[0-9]{8}]" id="phone" value="<?= $db_row['p_contact']?>">
        </div>


        <div class="form-group">
          <label for="photo" class="size1"><strong>Photo :</strong></label>
          <input class="form-control" type="file" name="photo" placeholder="Submit Student`s Current Photo" id="photo" value="<?= $db_row['photo']?>">
        </div>


        <div class="form-group ">
          <input type="submit" name="update-student" value="Update Student" class="btn btn-outline-success pull-right px-4">
        </div>
        <div class="form-group">
            <a class="btn btn-outline-primary " href="index.php?page=all-student">Back</a>
        </div>

      </form>
    </div>


    <div class="col-sm-5">



      <table class="table table-bordered">

        <tr>
          <td></td>
        </tr>

        <tr>
          <td class="text-center alert-danger size1"><?php if(isset($input_error_name)){echo $input_error_name;}?></td>
        </tr>

        <tr>
          <td></td>
        </tr>

        <tr>
          <td class="text-center alert-danger size1"><?php if(isset($input_error_roll)){echo $input_error_roll;}?></td>
        </tr>

        <tr>
          <td></td>
        </tr>

        <tr>
          <td class="text-center alert-danger size1"><?php if(isset($input_error_class)){echo $input_error_class;}?></td>
        </tr>

        <tr>
          <td></td>
        </tr>


        <tr>
          <td class="text-center alert-danger size1"><?php if(isset($input_error_city)){echo $input_error_city;}?></td>
        </tr>

        <tr>
          <td></td>
        </tr>


        <tr>
          <td class="text-center alert-danger size1"><?php if(isset($input_error_phone)){echo $input_error_phone;}?></td>
        </tr>

        <tr>
          <td></td>
        </tr>

        <tr>
          <td class="text-center alert-danger size1"><?php if(isset($input_error_photo)){echo $input_error_photo;}?></td>
        </tr>


      </table>


    </div>

  </div>
</div>
