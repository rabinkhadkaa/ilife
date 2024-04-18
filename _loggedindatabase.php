<?php
  $insert = false;
  $update = false;
  $delete = false;

  $fileExistError = false;
  $fileSizeError = false;
  $fileTypeError = false;
  $emptyerror = false;
  
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
      $noteid = $_POST['noteid'];
      $description = $_POST["Desc"];
      $myusername = $_SESSION['username'];
      
       if(empty($title)||empty($noteid)||empty($description)){
        $emptyerror = true;
       } else {
      
      /*
       $sql = "SELECT * FROM notes WHERE username= '$myusername' AND NoteID = $noteid";
      $result = mysqli_query($conn, $sql);
      var_dump($result);
      exit();
      if($result->num_rows>0){
        $error = true;
        echo "NoteID already exist. Please enter different noteid.";
      } */
      
      /* if (!$error){ */
        /* $sql = "INSERT INTO `notes` (`username`, `Title`, `Description`, `Timestamp`) VALUES (`$myusername`,'$title', '$description', current_timestamp())"; */
        $sql = "INSERT INTO `notes` (`SN`, `Username`,`NoteID`, `Title`, `Description`, `Timestamp`) VALUES (NULL, '$myusername', '$noteid', '$title', '$description', current_timestamp())";
        if($sql != NULL){
          $result = mysqli_query($conn, $sql);
          if ($result){
            $insert = true;
          }
        }
        
        $targetDir = "/mnt/useruploads/$myusername/";
        
        if (!file_exists($targetDir)) { 
            // Create a new file or direcotry 
            mkdir($targetDir, 0777, true); 
        } 
        $targetFile = $targetDir . basename($_FILES["my_file"]["name"]);
          
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
      

      
      
        // Validation 2 here
        if (file_exists($targetFile)) {
            //echo "Sorry, file already exists.";
            $uploadOk = 0;
            $fileExistError = true;
        }

        // Validation 3 here
        // Check file size and throw error if it is greater than
        // the predefined value, here it is 500000
        if ($_FILES["my_file"]["size"] > 500000) {
          // echo "Sorry, your file is too large.";
            $uploadOk = 0;
            $fileSizeError = true;
          
        }

        // Check for uploaded file formats and allow only 
        // jpg, png, jpeg and gif
        // If you want to allow more formats, declare it here
        /*   if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            $fileTypeError = true;
            
        } */


        if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["my_file"]["tmp_name"], $targetFile)) {
            //echo "The file " . htmlspecialchars(basename($_FILES["my_file"]["name"])) . " has been uploaded.";
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">The file '. htmlspecialchars(basename($_FILES["my_file"]["name"])) . ' has been uploaded.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            $fileRename = "/mnt/useruploads/$myusername/$noteid.$fileType";
            
            $renamedFile = rename($targetFile, $fileRename);
        }}
      }  }
    } 
  /* } */ 
?>