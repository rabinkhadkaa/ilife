<?php
include '../_dbconnect.php';
include '../_nocatche.php';
//include 'iuploads.php'; 
session_start();

if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] != true){
    header("location: index.php");
    exit;
}

require '../_nav.php';


// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
//session_start();

// Database connection
//$mysqli = new mysqli("localhost", "username", "password", "database");

// // Check connection
// if ($mysqli->connect_error) {
//     die("Connection failed: " . $mysqli->connect_error);
// }

// Check if invoice ID is provided
if (!isset($_GET['requestID']) || empty($_GET['requestID'])) {
    die("No PO request ID provided.");
}

// Sanitize invoice ID
$requestID = $_GET['requestID'];

// Fetch invoice details from the database
$query = "SELECT * FROM Purchase_Order WHERE requestID = '$requestID'";
$res = mysqli_query($conn, $query);

// Check if query was successful
if (!$res) {
    die("Query failed! ");
}

// Fetch invoice data
if ($res->num_rows > 0) {
    $result = $res->fetch_assoc();
} else {
    die("PO Request not found.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'];
    $comments = $_POST['comments'];

    // Validate input
    if (empty($status) || empty($comments)) {
        echo "All fields are required.";
    } else {
        // Update invoice status and comments in the database
        $update_query = "UPDATE Purchase_Order SET status = '$status', comments = '$comments' WHERE requestID = '$requestID'";
        $resu = mysqli_query($conn, $update_query);
        if ($resu) {
            echo "PO request updated successfully.";
        } else {
            echo "Update failed!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Details</title>
    <link rel="stylesheet" href="../custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php 
    require '../_nav_afterLogin.php';
    ?>
    <?php 
    require '../_vnav.php';
    ?>
    <div class ="main-content">
        <h1>PO Request Details</h1>
        
        <!-- Display invoice details -->
        <table border="1">
            <tr>
                <th>PO Request ID</th>
                <td><?php echo htmlspecialchars($result['RequestID']); ?></td>
            </tr>
            <tr>
                <th>Service Type</th>
                <td><?php echo htmlspecialchars($result['ServiceType']); ?></td>
            </tr>
            <tr>
                <th>Start Date</th>
                <td><?php echo htmlspecialchars($result['StartDate']); ?></td>
            </tr>
            <tr>
                <th>End Date</th>
                <td><?php echo htmlspecialchars($result['EndDate']); ?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?php echo htmlspecialchars($result['Description']); ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php echo htmlspecialchars($result['Status']); ?></td>
            </tr>
            <tr>
                <th>Submitted Date</th>
                <td><?php echo htmlspecialchars($result['SubmittedDate']); ?></td>
            </tr>
        </table>

        <!-- Form for updating invoice status -->
        <form method="post" action="">
            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="">Select Status</option>
                <option value="Accepted">Accept</option>
                <option value="Rejected">Reject</option>
            </select><br><br>

            <label for="comments">Comments:</label><br>
            <textarea id="comments" name="comments" rows="4" cols="50" required></textarea><br><br>

            <button type="submit">Submit</button>
        </form>
    </div>
    <script src = "../vnavdropdown.js"></script>
</body>
</html>
