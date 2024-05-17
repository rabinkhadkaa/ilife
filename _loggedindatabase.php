<?php
  $insert = false;
  $update = false;
  $delete = false;

  $fileExistError = false;
  $fileSizeError = false;
  $fileTypeError = false;
  $emptyerror = false;
  $noteIDerror = false;
  
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
      
      $sql = "UPDATE `notes` SET `Title` = '$title', `Description` = '$description' WHERE `notes`.`SN` = '$SN'";
      $result = mysqli_query($conn, $sql);
      if($result){
        $update = true;
        
      }else {
        echo "We could not update the record successfully";
      }
    } 
    else {
      $noteid = $_POST['noteid'];
      $title = $_POST['title'];
      $description = $_POST["Desc"];
      $myusername = $_SESSION['username'];
      
      if(empty($noteid)||empty($title)||empty($description)){
      $emptyerror = true;
      } else {
      
        $query = "SELECT * FROM `notes` WHERE Username= '$myusername' AND NoteID = '$noteid'";
        
        $result = mysqli_query($conn, $query);
        
        if($result->num_rows>0){
          $noteIDerror = true;
        } else {
          
          $targetDir = "/mnt/useruploads/$myusername/";
          
          if (!file_exists($targetDir)) { 
              mkdir($targetDir, 0777, true); 
          } 
          $targetFile = $targetDir . basename($_FILES["my_file"]["name"]);
            
          $uploadOk = 1;
          $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        
          if ($_FILES["my_file"]["size"] > 500000) {
              $uploadOk = 0;
              $fileSizeError = true;
          }

          if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx" && $fileType != "docm") {
            $uploadOk = 0;
            $fileTypeError = true; 
          } 

          if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["my_file"]["tmp_name"], $targetFile)) {
                /* echo '<div class="alert alert-success alert-dismissible fade show" role="alert">The file '. htmlspecialchars(basename($_FILES["my_file"]["name"])) . ' has been uploaded.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'; */
                $fileRename = "/mnt/useruploads/$myusername/$noteid.$fileType";
                
                $renamedFile = rename($targetFile, $fileRename);
            } 
            
            $sql = "INSERT INTO `notes` (`SN`, `Username`,`NoteID`, `Title`, `Description`, `Timestamp`) VALUES (NULL, '$myusername', '$noteid', '$title', '$description', current_timestamp())";
            if($sql != NULL){
              $result = mysqli_query($conn, $sql);
              if ($result){
                $insert = true;
              }
            }
          }
        }
      }  
    }
  } 
?>