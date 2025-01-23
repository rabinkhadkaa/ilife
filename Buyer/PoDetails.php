<?php
include '../_dbconnect.php';
include '../_nocatche.php';
session_start();

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

// Handle form submission for updating PO
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['savePO'])) {
    // Sanitize and capture updated data
    $updatedServiceType = mysqli_real_escape_string($conn, $_POST['serviceType']);
    $updatedStartDate = mysqli_real_escape_string($conn, $_POST['startDate']);
    $updatedEndDate = mysqli_real_escape_string($conn, $_POST['endDate']);
    $updatedDescription = mysqli_real_escape_string($conn, $_POST['description']);

    
    // Update query
    $updateQuery = "UPDATE Purchase_Order 
                    SET ServiceType = '$updatedServiceType', StartDate = '$updatedStartDate', 
                        EndDate = '$updatedEndDate', Description = '$updatedDescription', 
                        Status = 'Pending', Comments = '' 
                    WHERE ID = '$requestID'";

    if (mysqli_query($conn, $updateQuery)) {
        $POupdate = true;
        require_once 'functions.php';
        if(file_exists("../files/PO_files/$requestID.pdf")){
            unlink("../files/PO_files/$requestID.pdf");
        }
        $pdfFile = generatepdf($requestID);
        echo "<script>console.log('PDF: $pdfFile');</script>";
        if(!$pdfFile){
            echo '<p class="message" style="color: red;">Error updating PDF</p>';
        } 
    } else {
        $POupdateFailed = true;
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

                    <div class ="d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit PO</button>
                    </div>
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

                    <!-- Edit Button -->
                    
                </div>

                <!-- Right Column: PDF Options -->
                <div class="col-md-6"> 
                    <!-- PDF Preview -->
                    <div class="card shadow">
                        <div class="card-body">
                            <iframe src="/files/PO_files/<?php echo $result['ID']; ?>.pdf" width="100%" height = "650px" ></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit PO Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        <input type="hidden" name="requestID" value="<?php echo htmlspecialchars($result['ID']); ?>">
                        <div class="mb-3">
                            <label for="serviceType" class="form-label">Service Type</label>
                            <input type="text" class="form-control" id="serviceType" name="serviceType" value="<?php echo htmlspecialchars($result['ServiceType']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="startDate" value="<?php echo htmlspecialchars($result['StartDate']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate" name="endDate" value="<?php echo htmlspecialchars($result['EndDate']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo htmlspecialchars($result['Description']); ?></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="savePO">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="../vnavdropdown.js"></script>
 </body>
</html>
