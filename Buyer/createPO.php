<?php 
        include './nocatche.php';
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
        include './nocatche.php';
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
                    <option value="Service1">Design and Consulting</option>
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
                $customerName = htmlspecialchars($_POST['customerName']);
                $email = htmlspecialchars($_POST['email']);
                $product = htmlspecialchars($_POST['product']);
                $quantity = intval($_POST['quantity']);

                // Basic validation
                if (empty($customerName) || empty($email) || empty($product) || $quantity <= 0) {
                    echo '<p class="message" style="color: red;">Please fill out all fields correctly.</p>';
                } else {
                    // Process the order (e.g., save to database, send email, etc.)
                    // For demonstration, we're just displaying the information

                    echo '<p class="message" style="color: green;">Order Submitted Successfully!</p>';
                    echo '<p><strong>Customer Name:</strong> ' . $customerName . '</p>';
                    echo '<p><strong>Email:</strong> ' . $email . '</p>';
                    echo '<p><strong>Product:</strong> ' . $product . '</p>';
                    echo '<p><strong>Quantity:</strong> ' . $quantity . '</p>';
                    
                    // Normally, you'd also save this data to a database or send an email
                    // Example (commented out): 
                    // $conn = new mysqli('localhost', 'username', 'password', 'database');
                    // $sql = "INSERT INTO orders (customerName, email, product, quantity) VALUES ('$customerName', '$email', '$product', $quantity)";
                    // $conn->query($sql);
                    // $conn->close();
                }
            }
            ?>
        </div>
    </div>
    <script src = "../vnavdropdown.js"></script>
</body>
</html>
