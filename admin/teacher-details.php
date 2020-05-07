


<?php

    require_once 'dbcon.php';

    $name = $_GET['name'];

    $usrname = $_SESSION['user_login'];
  //  $name = $_SESSION['teacher_name'];
    $db_info = mysqli_query($dbconn,"SELECT * FROM `teacher_info` WHERE `username`='$usrname' AND `name`='$name'");
    $row = mysqli_fetch_assoc($db_info);

 ?>






<h1 class="text-primary"><i class="fa fa-info-circle" aria-hidden="true"></i> Teacher's Details <small class="text-dark" style="font-size:30px; font-weight:700;"> Mr. <?php echo ucwords($row['name']); ?><small></h1>
<ol class="breadcrumb">
    <li class="active size1"><a class="text-primary  mr-4" href="index.php?page=dashbord"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
    <li class="active size1 "><i class="fa fa-info-circle" aria-hidden="true"></i> Teacher's details</li>
</ol>
<div class="row">
  <div class="col-8">
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped size2">
      <tr>
        <td>Name</td>
        <td><?php echo ucwords($row['name']); ?></td>
      </tr>
      <tr>
        <td>Subject</td>
        <td><?php echo $row['subject'];?></td>
      </tr>
      <tr>
        <td>Qualification</td>
        <td><?php echo $row['qualification']; ?></td>
      </tr>
      <tr>
        <td>Mobile</td>
        <td><?php echo $row['phone']; ?></td>
      </tr>
      <tr>
        <td>Address</td>
        <td><?php echo $row['address']; ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $row['email']; ?></td>
      </tr>
      <tr>
        <td>Date Of Birth</td>
        <td></td>
      </tr>
      <tr>
        <td>Remark</td>
        <td></td>
      </tr>
    </table>
    </div>
  </div>
  <div class="col-4">
    <div class="row">
      <img class"img-thumbnail" src="teacher_photo/<?php echo $row['photo']; ?>" alt="">
    </div>
    <div class="row">
      <div class="mt-3 size1" style="width:100%; height:200px; margin:auto; overflow-y:scroll;border:0px solid blue;">

          <?php
            $nm = $row['name'];

            $data = "SELECT * FROM `teacher_event` WHERE `teacher_name`='$nm' AND `username`='$usrname'";
            $msquery = mysqli_query($dbconn, $data);
            while($rwb = mysqli_fetch_assoc($msquery)){


           ?>

        <ul class="list-group pl-0">
          <li  class="text-info list-group-item list-group-item-action "><span><?php echo $rwb['event']; $rwbevent = $rwb['event']; ?></span><span class='text-danger' style='font-size:10px;'><?php echo $rwb['date'] ?></span><button href='#popp' class="pull-right btn btn-primary">Dtl</button></li>
        </ul>
      <?php } ?>

      <?php

      $dataa = "SELECT * FROM `teacher_event` WHERE `teacher_name`='$nm' AND `username`='$usrname' AND `event`='$rwbevent'";
      $msquer = mysqli_query($dbconn, $dataa);
      $rwbb = mysqli_fetch_assoc($msquer)
       ?>
            <div id="popp" class="white-popup mfp-hide">
              <?php echo $rwb['event_details']; ?>
            </div>
            <script src="jsfile/jquery.magnific-popup.min.js" charset="utf-8"></script>
            <script type="text/javascript">
            $(document).ready(function(){
              $('.open-popup-link').magnificPopup({
            type:'inline',
            midClick: true
            });
            });
            </script>

      </div>
      <div class="mt-3 p-2" style="width:100%;border:2px solid black;">

            <?php
              if(!empty($_POST['evnt'])){
                if (isset($_POST['save'])){
                  $evnt = $_POST['evnt'];
                  $evnt_dtl = $_POST['evnt_dtl'];
                  $nm = $row['name'];
                  $insert = "INSERT INTO `teacher_event`(`teacher_name`, `username`, `event`, `event_details`) VALUES ('$nm','$usrname','$evnt','$evnt_dtl');";
                  $submm = mysqli_query($dbconn,$insert);
                  if($submm == true){
                    echo "<p class='text-center text-success'>New Event Added<p>";
                    mysqli_close($dbconn);
                  }else{
                    echo "something is error";
                  }
                }else{
                  echo "conn err";
                }
              }else{

              }


             ?>



          <form class="" action="" method="post">
              <div class="form-group">
                <input class="form-control" type="text" name="evnt" placeholder="Enter teacher's Event" value="">
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="evnt_dtl" placeholder="Text Event details" value="">
              </div>
              <div class=""style="width:40px; margin:auto;">
                <button class="input-group-text btn btn-primary" type="submit" name="save"><i class="fa fa-floppy-o size1 text-danger" aria-hidden="true"></i></button>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>
