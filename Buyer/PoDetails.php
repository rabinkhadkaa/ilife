<?php
include '../_dbconnect.php';
include '../_nocatche.php';
session_start();


// Enable error reporting for debugging
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
// ini_set('error_reporting', E_ALL);
$POupdate = false;
$POupdateFailed = false;

// Check if invoice ID is provided
if (!isset($_GET['ID']) || empty($_GET['ID'])) {
    die("No PO request ID provided.");
}

// Sanitize invoice ID
$requestID = $_GET['ID'];

// Fetch invoice details from the database
$query = "SELECT * FROM Purchase_Order WHERE ID = '$requestID'";
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


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PO Request Details</title>
    <link rel="stylesheet" href="../custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<body>
    <div>
        <?php require '../_nav_afterLogin.php'; ?>
        <?php require '../_vnav.php'; ?>

        <div class="main-content">
            <div class="row">
                <!-- Left Column: PO Details -->
                <div class="col-md-6">
                    <?php if ($POupdate): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> PO request updated successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php elseif ($POupdateFailed): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> PO request could not be updated.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <h2 class="mb-4">Submitted PO Request Details</h2>

                    <!-- PO Request Information -->
                    <div class="card shadow mb-4">
                        
                            <table class="table table-bordered">
                                <tr><th>PO Request ID:</th><td><?php echo htmlspecialchars($result['ID']); ?></td></tr>
                                <tr><th>Service Type</th><td><?php echo htmlspecialchars($result['ServiceType']); ?></td></tr>
                                <tr><th>Start Date</th><td><?php echo htmlspecialchars($result['StartDate']); ?></td></tr>
                                <tr><th>End Date</th><td><?php echo htmlspecialchars($result['EndDate']); ?></td></tr>
                                <tr><th>Description</th><td><?php echo htmlspecialchars($result['Description']); ?></td></tr>
                                <tr><th>Status</th><td><?php echo htmlspecialchars($result['Status']); ?></td></tr>
                                <tr><th>Submitted Date</th><td><?php echo htmlspecialchars($result['SubmittedDate']); ?></td></tr>
                            </table>
                        
                    </div>

                    <!-- Form for updating PO status -->
                    <!-- Check for Rejection Comments -->
                    <?php if ($result['Status'] === 'Rejected' && !empty($result['Comments'])): ?>
                        <div class="alert alert-warning" role="alert">
                            <strong>Rejection Message:</strong> <?php echo htmlspecialchars($result['Comments']); ?>
                        </div>
                    <?php endif; ?>

                </div>

                <!-- Right Column: PDF Options -->
                <div class="col-md-6">                    
                    <!-- PDF Generation Button -->
                    <div class="card shadow mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5>Create PDF</h5>
                        </div>
                        <div class="card-body">
                            <form action="generate_pdf.php" method="post" target="_blank">
                                <input type="hidden" name="requestID" value="<?php echo htmlspecialchars($result['RequestID']); ?>">
                                <button type="submit" class="btn btn-success">Generate PDF</button>
                            </form>
                        </div>
                    </div>

                    <!-- PDF Preview -->
                    <div class="card shadow">
                        <div class="card-body">
                            <iframe src="/files/PO_files/<?php echo 'PO_Request_'.$result['RequestID']; ?>.pdf" width="100%" height="500px"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoX1B6ZF5pIHf6lue/r9G/FijGVbSWeJvOJ2C6jqT8I6B7j" crossorigin="anonymous"></script>
    <script src="../vnavdropdown.js"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            // Listen for changes in the dropdown
            $('#status').on('change', function () {
                var status = $(this).val(); // Get the selected value
                
                if (status === 'Rejected') {
                    $('#comments-container').slideDown(); // Show the text field with slide effect
                    $('#comments').prop('required', true); // Make textarea required
                } else {
                    $('#comments-container').slideUp(); // Hide the text field with slide effect
                    $('#comments').prop('required', false); // Remove required attribute
                    $('#comments').val(''); // Clear the textarea
                }
            });
        });
    </script>

</body>
</html>
