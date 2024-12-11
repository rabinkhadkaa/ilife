<?php
// Database connection
include '../_dbconnect.php';

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// $newTimesheetId = generateNewTimesheetId($conn);
// echo "New Timesheet ID: " . $newTimesheetId;

// Function to generate the new timesheet ID
function generateNewId($conn, $tablename, $pre) {
    $prefix = $pre.date("mdY")."-";
    echo $prefix ."</br>";

    // Query to get the latest timesheet ID
    $query = "SELECT ID FROM $tablename where ID like '$prefix%'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {        
        // Custom array creation
        while ($row = mysqli_fetch_assoc($result)) {
        $timesheetIds[] = $row['TimesheetID'];
        }
        // Finding the latest ID
        foreach ($timesheetIds as $id) {
            if ($id > null) {
                $latestId = $id;                
            }
        }
        echo $latestId ."</br>";
       
        $suffixID = substr($latestId, strpos($latestId, "-") + 1);
        $suffixID = (int)$suffixID + 1;
        $newId = $prefix . $suffixID;
    } else {
        // If no previous ID found, start with 01
        $newId = $prefix . "01";
    }

    return $newId;
}

// Usage


?>
