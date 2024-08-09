<?php 
error_reporting(-1);
ini_set("display_errors", 1);
ini_set('error_reporting', E_ALL);

        //include './nocatche.php';
        session_start();
        if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] != true){
            header("location: index.php");
            exit;
        } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Request Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>

        .form-container {
            max-width: 600px;

            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #45a049;
        }
        .message {
            margin-top: 20px;
        }
        textarea{
            width: -webkit-fill-available;
        }
        ::placeholder {
            opacity: 0.5;
        }
    </style>
</head>
<body>
    <?php 
        //include './nocatche.php';
        include '../_dbconnect.php';
        require '../_nav_afterLogin.php';
    ?>
    <?php 
        require '../_vnav.php';
    ?>
    <div class = "main-content">
        <div class="form-container">
            <h1>Service Request Form</h1>
            <form action="createPO.php" method="POST">
                <div class="form-group">
                    <label for="requestId">Request ID</label>
                    <input type="text" id="requestId" name="requestId" placeholder = "Service ID" required>
                </div>
                <div class="form-group">
                    <label for="supplierName">Request To</label>
                    <input type="text" id="supplierName" name="supplierName" placeholder = "Supplier Name" required>
                </div>
                <div class="form-group">
                <label for="serviceType">Service Type</label>
                <select id="serviceType" name="serviceType" required>
                    <option value="">Select a product</option>
                    <option value="Design and Consulting">Design and Consulting</option>
                </select>
            </div>
                <div class="form-group">
                    <label for="startDate">Start Date:</label>
                    <input type="date" id="startDate" name="startDate" required>
                <!-- </div>
                <div class="form-group"> -->
                    <label for="endDate">End Date:</label>
                    <input type="date" id="endDate" name="endDate" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea rows= "5" id="description" name="description" placeholder = "Short Description" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit">Submit Order</button>
                </div>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                // Retrieve form data
                $requestId = htmlspecialchars($_POST['requestId']);
                $supplierName = htmlspecialchars($_POST['supplierName']);
                $serviceType = htmlspecialchars($_POST['serviceType']);
                $startDate = htmlspecialchars($_POST['startDate']);
                $endDate = htmlspecialchars($_POST['endDate']);
                $description = htmlspecialchars($_POST['description']);
                

                // Basic validation
                if (empty($requestId) || empty($supplierName) || empty($serviceType) || empty($startDate) || empty($endDate) || empty($description)) {
                    echo '<p class="message" style="color: red;">Please fill out all fields correctly.</p>';
                } else {
                    // Process the order (e.g., save to database, send email, etc.)
                    // For demonstration, we're just displaying the information

                    
                    $query = "INSERT INTO `Purchase_Order` (`RequestID`, `SupplierName`, `ServiceType`, `StartDate`, `EndDate`, `Description`, `Status`, `SubmittedDate`) VALUES ('$requestId', '$supplierName', '$serviceType', '$startDate', '$endDate', '$description', 'Pending', CURRENT_TIMESTAMP())";
                    print_r($conn);
                    echo $query;
                    exit();
                    $result = mysqli_query($query, $conn);
                    
                    if($result){
                        echo '<p class="message" style="color: green;">Order Submitted Successfully!</p>';
                    } else {
                        echo "not submitted";
                    }

                }
            }
            ?>
        </div>
    </div>
    <script src = "../vnavdropdown.js"></script>
</body>
</html>
