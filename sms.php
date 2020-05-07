
<?php
session_start();

  if(!isset($_SESSION['user_login'])){
    header('location:admin/login.php');
  }
$usrname = $_SESSION['user_login'];


 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Student Management System</title>
</head>
<style>
    body{
        background-image: url('images/woman-wearing-brown-shirt-carrying-black-leather-bag-on-1106468.jpg');
        background-size: cover;
    }
    .dark-overlay{
        background-color: rgba(0,0,0,0.8);
        padding-bottom: 150px;
    }


    .card{
        width: 350px;
        height: auto;
        margin: auto;
        margin-top: 50px;
    }
    label{
        font-size: 17px;
        font-weight: 900;
        color: #666;
    }
    .form-control{
        border: 2px solid #333;
    }
    .show-btn{
        width:97px;
        margin: auto;
    }


</style>
<body>

<?php/*




*/

?>




  <div class="bg_photo">
    <div class="dark-overlay">
    <div class="container">
        <div class="login_btn">
            <a href="admin/login.php" class="btn btn-primary float-right px-4 mt-3 "><i class="fa fa-tachometer " aria-hidden="true"></i> Dashboard</a>
            <a href="admin/regestration_form.php" class="btn btn-success float-right px-4 mt-3 mr-3"><i class="fa fa-plus" aria-hidden="true"></i> Sign Up</a>
        </div><br>
        <div class="heading mt-5">
            <h1 class="  text-light text-center"><b>Welcome TO School Management System</b></h1>
        </div>

        <div class="card bg-warning p-1">
            <div class="card-header bg-info text-light text-center">
                <h3 class="Card-title">Student Information</h3>
            </div>
            <div class="card-body bg-light">
              <form class="" action="" method="post">
                <div class="choose_class">
                        <label class="float-left" for="">Choose Class :</label>
                        <select class="form-control" name="chooseclass" >
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
                </div>

                <div class="roll_no pt-4">
                        <label for="">Roll No. :</label>
                        <input class="form-control roll-input" patttern="[0-9]{5}" placeholder="Enter roll no." type="number" name="rollno">
                </div>
                <div class="form-group show-btn mt-4">
                    <input class="btn btn-outline-success submit" type="submit" name="showinfo" value="Show info">
                </div>
                </form>
            </div>
        </div>
<div class="row mt-4 hyper " >


            <?php
          //  $vv = $_POST['rollno'];

            if(isset($_POST['showinfo'])){

              require_once 'admin/dbcon.php';

             $roll = $_POST['rollno'];
             $class = $_POST['chooseclass'];

             //$user_heck_2 = mysqli_query($dbconn,"SELECT * FROM `studen_info` WHERE `username`='$usrname'")

             $db_data = mysqli_query($dbconn,"SELECT * FROM `studen_info` WHERE `roll` = '$roll' AND `username`='$usrname'");
             $dbc_data = mysqli_query($dbconn,"SELECT * FROM `studen_info` WHERE `class` = '$class' AND `username`='$usrname'");
             $db_row = mysqli_fetch_assoc($db_data);
             $dbc_row = mysqli_fetch_assoc($dbc_data);

             if($db_row = $dbc_row){
                print_r($db_row);
             }
             else{
               echo "no.";
             }


            ?>


          <div class="col-sm-8" style="width:500px; margin: auto;">
              <table class="table table-bordered text-light ">
                  <tr>
                    <td rowspan="5"><img class="img-thumbnail" style="width:350px;" src="admin/student_photos/<?php echo $db_row['photo'];?>"></td>
                    <td>Name</td>
                    <td><?php echo $db_row['name'];?></td>
                  </tr>
                  <tr>
                    <td>Roll</td>
                    <td><?php echo $db_row['roll'];?></td>
                  </tr>
                  <tr>
                    <td>Class</td>
                    <td><?php echo $db_row['class'];?></td>
                  </tr>
                  <tr>
                    <td>City</td>
                    <td><?php echo $db_row['city'];?></td>
                  </tr>
                  <tr>
                    <td>Contact</td>
                    <td><?php echo $db_row['p_contact'];?></td>
                  </tr>

              </table>
          </div>
          <?php
             }
            ?>

            </div>

    </div>
 </div>
  </div>
  <script type="text/javascript">
      $('.hyper').show();
  </script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
