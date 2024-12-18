<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
    include '../_dbconnect.php';

    if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] != true){
        header("location: index.php");
        exit;
    } 
    $submitted = false;
    if (isset($_POST['submit'])) {
        // Retrieve form data
        $invoiceID = htmlspecialchars($_POST['invoiceID']);   
        $buyer_name = htmlspecialchars($_POST['buyer_name']);
        $serviceType = htmlspecialchars($_POST['serviceType']);
        $hours = $_POST['hours'];
        $rate = $_POST['rate'];
        $amount = $_POST['amount'];
        $myusername = $_SESSION['username'];
        $timesheetIds = isset($_POST['timesheetIds']) ? $_POST['timesheetIds'] : '';

        // Basic validation
        if (empty($invoiceID) || empty($buyer_name) || empty($serviceType) || empty($hours) || empty($rate) || empty($amount) || empty($timesheetIds)) {
            echo '<p class="message" style="color: red;">Please fill out all fields correctly.</p>';
        } else {
            // Process the order (e.g., save to database, send email, etc.)
            $query = "INSERT INTO `Invoice` (`ID`, `Buyer Name`, `Service Type`, `Hours`, `Rate`, `Amount`, `Supplier`, `Submitted Date`) VALUES ('$invoiceID', '$buyer_name', '$serviceType', '$hours', '$rate', '$amount', '$myusername', CURRENT_TIMESTAMP());";
        
            $result = mysqli_query($conn, $query);
            
            if($result){
                $submitted = true; 
            } else {
                echo '<p class="message" style="color: red;">Error: ' . mysqli_error($conn) . '</p>';
            }
        }
    }
    
?>