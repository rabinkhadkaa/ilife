<?php
//session_start();
//require  './_nav.php'; 
/* if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] != true){
    header("location: index.php");
    exit;

} */
 $fileExistError = false;
 $fileSizeError = false;
 $fileTypeError = false;
?>
<?php
if (isset($_POST["submit"])) {
    
    $user = $_SESSION['username'];
    // Check image using getimagesize function and get size
    // if a valid number is got then uploaded file is an image
    
        // directory name to store the uploaded image files
        // this should have sufficient read/write/execute permissions
        // if not already exists, please create it in the root of the
        // project folder
        $targetDir = "/mnt/useruploads/$user/";
        
        if (!file_exists($targetDir)) { 
  
            // Create a new file or direcotry 
            mkdir($targetDir, 0777, true); 
        } 
        $uploadedFile = $targetDir . basename($_FILES["my_file"]["name"]);
        $targetFile = rename($uploadedFile, $noteid);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        
        /* // Validation 1 here
        $check = getimagesize($_FILES["my_file"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Your'. $check["mine"].' file has been uploaded.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        } else {
            //echo "File is not an image.";
            $uploadOk = 0;
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">File is not an image.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        } */

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
  /*   if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        $fileTypeError = true;
        
    } */
   
    /* if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry, your file was not uploaded.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } else { */
        if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["my_file"]["tmp_name"], $targetFile)) {
            //echo "The file " . htmlspecialchars(basename($_FILES["my_file"]["name"])) . " has been uploaded.";
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">The file '. htmlspecialchars(basename($_FILES["my_file"]["name"])) . ' has been uploaded.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        } 
        /* else {
            echo $_FILES["my_file"]["error"]."Sorry, there was an error uploading your file.";
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$_FILES["my_file"]["error"].'Sorry, there was an error uploading your file.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        } */
    }
}
?>