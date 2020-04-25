<?php

require_once './dbcon.php';

$dltid = base64_decode($_GET['id']);
mysqli_query($dbconn, "DELETE FROM studen_info WHERE id = '$dltid'");
header("location: index.php?page=all-student");


?>