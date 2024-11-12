<?php
require_once('../TCPDF/tcpdf.php');
include '../_dbconnect.php';

if (!isset($_POST['requestID'])) {
    die("No PO request ID provided.");
}

$requestID = $_POST['requestID'];
$query = "SELECT * FROM Purchase_Order WHERE requestID = '$requestID'";
$res = mysqli_query($conn, $query);

if (!$res || $res->num_rows === 0) {
    die("PO Request not found.");
}

$result = $res->fetch_assoc();

// Create new PDF document
$pdf = new TCPDF();
$pdf->AddPage();

// Set document title
$pdf->SetTitle('PO Request Details');

// Define content for PDF
$htmlContent = '
    <h1>PO Request ID: ' . htmlspecialchars($result['RequestID']) . '</h1>
    <table border="1" cellpadding="5">
        <tr><th>Service Type</th><td>' . htmlspecialchars($result['ServiceType']) . '</td></tr>
        <tr><th>Start Date</th><td>' . htmlspecialchars($result['StartDate']) . '</td></tr>
        <tr><th>End Date</th><td>' . htmlspecialchars($result['EndDate']) . '</td></tr>
        <tr><th>Description</th><td>' . htmlspecialchars($result['Description']) . '</td></tr>
        <tr><th>Status</th><td>' . htmlspecialchars($result['Status']) . '</td></tr>
        <tr><th>Submitted Date</th><td>' . htmlspecialchars($result['SubmittedDate']) . '</td></tr>
    </table>';

// Print text using writeHTMLCell
$pdf->writeHTML($htmlContent, true, false, true, false, '');

// Use absolute path for saving
$saveDirectory = '/var/www/html/files/PO_files/';
if (!is_dir($saveDirectory)) {
    mkdir($saveDirectory, 0755, true); // Create directory if it doesn't exist
}

$filePath = $saveDirectory . 'PO_Request_' . $result['RequestID'] . '.pdf';

// Save the PDF
$pdf->Output($filePath, 'F');

echo "PDF saved successfully to " . $filePath;
?>
