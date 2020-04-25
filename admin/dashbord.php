<h1 class="text-primary"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard <small class="text-dark">Statics Overview<small></h1>
<ol class="breadcrumb">
  <li class="active size1"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</li>
</ol>


<?php
$usrname = $_SESSION['user_login'];

$cnt_student = mysqli_query($dbconn,"SELECT * FROM `studen_info` WHERE `username`='$usrname'");
$test = mysqli_num_rows($cnt_student);
$cnt_user = mysqli_query($dbconn,"SELECT * FROM `users`");
$testt = mysqli_num_rows($cnt_user);




?>

<div class="row">
      <div class="col-5">
          <div class="card">
            <div class="card-body bg-primary text-light">
              <div class="row">
                <div class="col-4">
                  <h1 class="display-3"><i class="fa fa-user-circle" aria-hidden="true"></i></h1>
                </div>
                <div class="col-8">
                  <div class="pull-right">
                    <h1 class="display-4"><?php echo $test?></h1>
                  </div>
                  <div class="clearfix"></div>
                  <div class="pull-right size1">
                      All Students
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-primary size1">
                  <a href="index.php?page=all-student"><span >View All Students</span></a>
                  <a href="index.php?page=add-student"><div class="pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i></div></a>
            </div>
          </div>
        </div>
        <div class="col-5">
          <div class="card">
            <div class="card-body bg-primary text-light">
              <div class="row">
                <div class="col-4">
                  <h1 class="display-3"><i class="fa fa-users" aria-hidden="true"></i></h1>
                </div>
                <div class="col-8">
                  <div class="pull-right">
                    <h1 class="display-4"><?php echo $testt?></h1>
                  </div>
                  <div class="clearfix"></div>
                  <div class="pull-right size1">
                      All Users
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-primary size1">
                  <a href="index.php?page=all-users"><span>View All Users</span></a>
                  <a href="regestration_form.php"><div class="pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i></div></a>
            </div>
          </div>
        </div>
</div>
<br><hr>
