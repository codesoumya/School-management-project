<?php
    
    $server = "localhost";
    $username_db = "root";
    $password = "";
    $database = "scl_project";
    
           
     
    
      $dbconn =  mysqli_connect("$server","$username_db","$password","$database");

      if($dbconn){
         // echo "Database Connect Successfully";
      }
      else{
        // echo "Opppsss!!!!!   Sorry No database Found";
      }




?>