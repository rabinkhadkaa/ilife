<?php
ob_start();
/* $update = false;
$delete = false; */
  // Connect to the database
  $servername = "db";
  $username = "root";
  $password = "@Shova595Bhandari";
  $database = "ilife";

  //Create a connection
  $conn = mysqli_connect($servername, $username, $password, $database);
  /*  if($conn){
    echo "Connection to database is successful.";
  }  */
  // Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect to database: ". mysqli_connect_error());
}
?>