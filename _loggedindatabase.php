<?php
$insert = false;
$update = false;
$delete = false;
 
include '_dbconnect.php';
session_start();

if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] != true){
    header("location: index.php");
    exit;
} 

  if(isset($_GET['delete'])){
    $SN = $_GET['delete'];
    $sql = "DELETE FROM `notes` WHERE `notes`.`SN` = $SN";
    $result = mysqli_query($conn, $sql);
    if($result){
      $delete= true;
    }else {
      echo "We could not delete the record successfully";
    }
  }

  if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['snoEdit'])){
      $SN = $_POST['snoEdit'];
      $title = $_POST['titleEdit'];
      $description = $_POST["DescEdit"];
      
      $sql = "UPDATE `notes` SET `Title` = '$title', `Description` = '$description' WHERE `notes`.`SN` = $SN";
      $result = mysqli_query($conn, $sql);
      if($result){
        $update = true;
        
      }else {
        echo "We could not update the record successfully";
      }
    } 
    else {
    $title = $_POST['title'];
    $description = $_POST["Desc"];
    $myuser = $_SESSION['username'];
    /* $sql = "INSERT INTO `notes` (`username`, `Title`, `Description`, `Timestamp`) VALUES (`$myuser`,'$title', '$description', current_timestamp())"; */
    $sql = "INSERT INTO `notes` (`SN`, `Username`, `Title`, `Description`, `Timestamp`) VALUES (NULL, '$myuser', '$title', '$description', current_timestamp())";
    if($sql != NULL){
      $result = mysqli_query($conn, $sql);
      if ($result){
        $insert = true;
      }
    }} 
  }  
?>