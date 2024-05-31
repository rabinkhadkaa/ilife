<?php
// cron_example.php

// Specify the log file
$logFile = '/var/log/logfile.txt';
echo $logFile;
// Get the current date and time
date_default_timezone_set('America/New_York');
$currentDateTime = date('Y-m-d H:i:s');
echo $currentDateTime;
// Log the date and time to the file
file_put_contents($logFile, "Cron job executed at: $currentDateTime\n", FILE_APPEND);
?>

