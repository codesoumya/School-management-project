<?php

session_start();

  if(!isset($_SESSION['user_login'])){
    header('location: login.php');
  }
  //echo $_SESSION['user_login'];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard_style.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <script src="../js/jquery-3.3.1.js" charset="utf-8"></script>
    <script src="../js/jquery.dataTables.min.js" charset="utf-8"></script>
    <script src="../js/dataTables.bootstrap4.min.js" charset="utf-8"></script>




    <title>SMS</title>
</head>
<body class="">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="">SMS</a>
                <div class="collaps navbar-collaps=e">
                    <ul class="navbar-nav">
                                                                                    <?php
                                                                        require_once './dbcon.php';
                                                                        $usr = $_SESSION['user_login'];
                                                                        $usrd = mysqli_query($dbconn,"SELECT * FROM `users` WHERE `username` = '$usr'");
                                                                        $row = mysqli_fetch_assoc($usrd);
                                                                        //print_r($row);
                                                                        ?>

                        <li class="nav-item mx-2"><a class="nav-link" href="../index.php"><i class="fa fa-address-card text-warning" aria-hidden="true"></i> SMS</a></li>
                        <li class="nav-item mx-2"><a class="nav-link" href="regestration_form.php"><i class="fa fa-user-plus text-success" aria-hidden="true"></i> Add User</a></li>
                        <li class="nav-item mx-2"><a class="nav-link" href="index.php?page=user_profile"><i class="fa fa-user text-info" aria-hidden="true"></i> Profile</a></li>
                        <li class="nav-item mx-2"><a class="nav-link" href="log-out.php"><i class="fa fa-power-off text-danger" aria-hidden="true"></i> Log Out</a></li>
                        <li class="nav-item mx-2 nav-link text-warning"><small class="text-info"><i class="fa fa-globe text-primary" aria-hidden="true"></i> Welcome: </small><?php echo $row['username'];?>  <img style="width:25px; border-radius: 10px;" src="user_images/<?php echo $row['photo']?>" alt=""> </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 margin1">
                    <ul class="list-group bg- p-1 pr-">
                        <a class="text-dark bg-light m-1 list-group-item list-group-item-action " href="index.php<?php echo ("?page=dashbord"); ?>"><i class="fa fa-tachometer text-primary" aria-hidden="true"></i> Dashboard</a>
                        <a class="text-dark bg-light m-1  list-group-item list-group-item-action" href="index.php?page=add-student"><i class="fa fa-user-plus text-success" aria-hidden="true"></i> Add Student</a>
                       <!-- <a class="text-dark bg-light m-1 list-group-item list-group-item-action" href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update Student</a>-->
                        <a class="text-dark bg-light m-1 list-group-item list-group-item-action" href="index.php?page=all-student"><i class="fa fa-user-circle text-warning" aria-hidden="true"></i> All Student</a>
                        <a class="text-dark bg-light m-1 list-group-item list-group-item-action" href="index.php?page=all-users"><i class="fa fa-users text-info" aria-hidden="true"></i> All Users</a>
                    </ul>
                </div>
                <div class="col-sm-9">
                  <div class="content mt-4">


                        <?php



                          if(isset ($_GET['page'])) {
                            $mypage = $_GET['page'].'.php';
                            if($mypage == "dashbord.php"){
                              $pakamo = "dashbord_data.php";
                            }
                            else {
                              $pakamo = "";
                            }
                          }
                          else{
                            $mypage ="dashbord.php";
                          }

                          // Connection to dashbord
                              if(file_exists($mypage)){
                                require_once $mypage;
                              }
                              else{
                                echo "Nothing";
                              }
                         ?>




                  </div>
                </div>
                </div>
         <div class="<?php // IDEA:  ?>">


           <?php
          if(isset($pakamo)){
           $dblpakamo = $pakamo;
         }
         else{
            $dblpakamo = "dashbord_data.php";
         }
         if(file_exists($dblpakamo)){
           require_once $dblpakamo;
         }
         else{
           echo "";
         }
            ?>


         </div>

      </div>
      <script type="text/javascript">
        $('#datatable').DataTable();
      </script>
      <footer class="bg-primary pb-1 mt-4 ">
        <p class="text-center text-light bg-primary size1 pt-2">Copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2018: Students Management System. All Rights Are Reserved</p>
      </footer>


<sipt src="../js/table.js" charset="utf-8"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
