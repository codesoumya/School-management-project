<h1 class="text-primary"><i class="fa fa-user" aria-hidden="true"></i> Profile <small class="text-dark">Profile<small></h1>
<ol class="breadcrumb">
  <li class="active size1"><a href="index.php?page=dashbord"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
  <li class="active size1 ml-4">   <i class="fa fa-user" aria-hidden="true"></i> Profile</li>
</ol>
<div class="row">
  <div class="col-sm-6">
    <table class="table table-bordered table-hover table-striped size2">




        <?php
        require_once './dbcon.php';
        $usr = $_SESSION['user_login'];
        $usrd = mysqli_query($dbconn,"SELECT * FROM `users` WHERE `username` = '$usr'");
        $row = mysqli_fetch_assoc($usrd);
        //print_r($row);



        ?>

      <tr>
        <td>User ID</td>
        <td><?php echo $row['id'];?></td>
      </tr>


      <tr>
        <td>Name</td>
        <td><?php echo $row['name'];?></td>
      </tr>


      <tr>
        <td>Username</td>
        <td><?php echo $row['username'];?></td>
      </tr>


      <tr>
        <td>Email</td>
        <td><?php echo $row['email'];?></td>
      </tr>





      <tr>
        <td>Signup Date</td>
        <td>26-4-2020</td>
      </tr>




    </table>
    <a class="btn btn-primary pull-right" href="#"><i class="fa fa-pencil-square-o text-warning" aria-hidden="true"></i> Edit Profile</a>
  </div>



  <div class="col-sm-4 mt-4">


      <a href="">
      <img class="img-thumbnail" src="user_images/<?php echo $row['photo'];?>" alt="">
      </a>
      <label class="text-center size-1" for="">Profile Picture</label>
    <form>

      <input class="form-control mt-3" type="file" name="photo" id="">
      <input type="submit" value="Uplode" name="upload" class="btn btn-primary pull-right mt-3">
    </form>

  </div>
</div>
