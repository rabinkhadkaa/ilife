<?php
include '../../_dbconnect.php';// Database connection
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['timesheet_ids'])) {
    $timesheetIds = $_POST['timesheet_ids']; // Array of Timesheet IDs
    // Sanitize Timesheet IDs to prevent SQL injection
    $quotedIds = array_map(function ($id) {
        return "'" . addslashes($id) . "'"; // Add single quotes and escape
    }, $timesheetIds);

    $idString = implode(',', $quotedIds); // Convert to comma-separated string

    // Query to fetch total hours
    $sql = "SELECT SUM(Hours) AS total_hours FROM Timesheet WHERE id IN ($idString)";
    $result = mysqli_query($conn, $sql);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        echo $row['total_hours']; // Return total hours
    } else {
        echo 0; // Default to 0 hours on failure
    }
} else {
    echo 'Invalid Request';
}
?>
