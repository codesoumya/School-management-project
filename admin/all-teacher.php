
<?php




 ?>


<h1 class="text-primary"><i class="fa fa-users" aria-hidden="true"></i> All Teachers <small class="text-dark">Show all teachers<small></h1>
<ol class="breadcrumb">
    <li class="active size1"><a class="text-primary  mr-4" href="index.php?page=dashbord"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
    <li class="active size1 "><i class="fa fa-users" aria-hidden="true"></i> All Teachers</li>
</ol>
<div class="table-responsive">
  <table id="datatable" class="table table-bordered table-hover table-striped size2">
    <thead>
      <tr>
        <th>Name</th>
        <th>Subject</th>
        <th>Qualification(Edu)</th>
        <th>Mobile no.</th>
        <th>Address</th>
        <th>Email-ID</th>
        <th>Photo</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>

      <?php
              require_once 'dbcon.php';
              $usrname = $_SESSION['user_login'];
          $db_info = mysqli_query($dbconn,"SELECT * FROM `teacher_info` WHERE `username`='$usrname'");

          //session_start();
        //  $_SESSION['teacher_name'] = $row['name'];

          while ($row = mysqli_fetch_assoc($db_info)){


      ?>


      <tr>
        <td><?php echo ucwords($row['name']); ?></td>
        <td><?php echo $row['subject'];?></td>
        <td><?php echo $row['qualification']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><img style="width:100px;" src="teacher_photo/<?php echo $row['photo']; ?>" alt="<?php echo $row['photo']; ?>"></td>
        <td><a href="index.php?page=teacher-details&name=<?php echo $row['name']; ?>" class="btn btn-primary">Click here</a></td>
      </tr>
    </tbody>

  <?php
      }

   ?>

  </table>
</div>
