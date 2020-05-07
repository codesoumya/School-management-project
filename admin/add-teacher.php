
<?php

    $usrname = $_SESSION['user_login'];

    if(!empty($_POST['name'])){
      if(!empty($_POST['quali'])){
        if(isset($_POST['submit'])){
          $name = $_POST['name'];
          $subject = $_POST['subject'];
          $quali = $_POST['quali'];
          $phone = $_POST['phone'];
          $addr = $_POST['addr'];
          $email = $_POST['email'];
          $photo = explode('.',$_FILES['photo']['name']);
          $photo_ex = end($photo);
          $photo_name = $name.'-'.$usrname.'.'.$photo_ex;

          $insert = "INSERT INTO `teacher_info`(`name`, `subject`, `qualification`, `phone`, `address`, `email`, `photo`, `username`) VALUES ('$name','$subject','$quali','$phone','$addr','$email','$photo_name','$usrname');";

          $query = mysqli_query($dbconn, $insert);

          if($query == true){
            echo "Successfull Brother";
            move_uploaded_file($_FILES['photo']['tmp_name'],'teacher_photo/'.$photo_name);
            mysqli_close($dbconn);

          }
        }
      }
    }


 ?>


<h1 class="text-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Teacher <small class="text-dark">New Teacher<small></h1>
<ol class="breadcrumb">
    <li class="active size1"><a class="text-primary  mr-4" href="index.php?page=dashbord"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
    <li class="active size1 "><i class="fa fa-user-plus" aria-hidden="true"></i> Add Teacher</li>
</ol>
<div class="row">
  <div class="col-12">
    <form class="" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="" class="size1">Name :</label>
      <input class="form-control" style="width:70%;" type="text" name="name"  value="" placeholder="Enter Teacher's Name" required>
    </div>
    <div class="form-group">
      <label for="" class="size1">Subject :</label>
      <input class="form-control" style="width:70%;" type="text" name="subject"  value="" placeholder="Enter Teacher's Subject" required>
    </div>
    <div class="form-group">
      <label for="" class="size1">Educational Qualification :</label>
      <input class="form-control" style="width:70%;" type="text" name="quali"  value="" placeholder="Enter Teacher's Qualification" required>
    </div>
    <div class="form-group">
      <label for="" class="size1">Mobile No. :</label>
      <input class="form-control" style="width:70%;" type="mobile" name="phone"  value="" placeholder="Enter Teacher's phone number" required>
    </div>
    <div class="form-group">
      <label for="" class="size1">Address :</label>
      <input class="form-control" style="width:70%;" type="text" name="addr"  value="" placeholder="Enter Teacher's home address" required>
    </div>
    <div class="form-group">
      <label for="" class="size1">E-mail :</label>
      <input class="form-control" style="width:70%;" type="email" name="email"  value="" placeholder="Enter Teacher's email-id" required>
    </div>
    <div class="form-group">
      <label for="" class="size1">Photo :</label>
      <input class="form-control" style="width:70%;" type="file" name="photo"  value="" required>
    </div>
    <div class="form-group" style="width:140px; margin:auto;">
      <input class="btn btn-success px-4 py-2" type="submit" name="submit"  value="Add Teacher" required>
    </div>
  </form>
  </div>
</div>
