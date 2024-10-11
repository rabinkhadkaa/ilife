<?php
include '../_dbconnect.php';
include '../_nocatche.php';
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: index.php");
    exit;
}

require '../_nav.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);

$POupdate = false;
$POupdateFailed = false;

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

    if (empty($status) || empty($comments)) {
        echo "All fields are required.";
    } else {
        $update_query = "UPDATE Purchase_Order SET Status = '$status', comments = '$comments' WHERE requestID = '$requestID'";
        $resu = mysqli_query($conn, $update_query);
        if ($resu) {
            $POupdate = true;
        } else {
            $POupdateFailed = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PO Request Details</title>
    <link rel="stylesheet" href="../custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<body>
    <?php 
    require '../_nav_afterLogin.php';
    require '../_vnav.php';
    ?>

    <div class="container my-5">
        <!-- Alerts for status messages -->
        <?php if ($POupdate): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> PO request updated successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif ($POupdateFailed): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> PO request has not been updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Card for PO request details -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>PO Request Details</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
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
            </div>
        </div>

        <!-- Form for updating PO status -->
        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">
                <h3>Update PO Status</h3>
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="">Select Status</option>
                            <option value="Accepted">Accept</option>
                            <option value="Rejected">Reject</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="comments" class="form-label">Comments:</label>
                        <textarea id="comments" name="comments" class="form-control" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../vnavdropdown.js"></script>
</body>
</html>
