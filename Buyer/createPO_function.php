<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    include '../_dbconnect.php';

    if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] != true){
        header("location: index.php");
        exit;
    } 
    $submitted = false;
    if (isset($_POST['submit'])) {
        // Retrieve form data
        $requestId = htmlspecialchars($_POST['requestId']);
        $supplierName = htmlspecialchars($_POST['supplierName']);
        $serviceType = htmlspecialchars($_POST['serviceType']);
        $startDate = htmlspecialchars($_POST['startDate']);
        $endDate = htmlspecialchars($_POST['endDate']);
        $description = htmlspecialchars($_POST['description']);
        $myusername = $_SESSION['username'];

        // Basic validation
        if (empty($requestId) || empty($supplierName) || empty($serviceType) || empty($startDate) || empty($endDate) || empty($description)) {
            echo '<p class="message" style="color: red;">Please fill out all fields correctly.</p>';
        } else {
            // Process the order (e.g., save to database, send email, etc.)
            // For demonstration, we're just displaying the information

            
            $query = "INSERT INTO `Purchase_Order` (`RequestID`, `SupplierName`, `ServiceType`, `StartDate`, `EndDate`, `Description`, `Status`, `user`, `SubmittedDate`) VALUES ('$requestId', '$supplierName', '$serviceType', '$startDate', '$endDate', '$description', 'Pending', '$myusername', CURRENT_TIMESTAMP())";
        
            $result = mysqli_query($conn, $query);
            
            if($result){
                $submitted = true; 
            }
        }
    }
    
?>