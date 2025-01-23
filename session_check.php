<?php
// Set the session timeout duration (1 hour = 3600 seconds)
$timeout_duration = 3600;  // 1 minute

// Start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the last activity time is set
if (isset($_SESSION['last_activity'])) {
   
    // If the user has been idle for more than the timeout duration, log them out
    if ((time() - $_SESSION['last_activity']) > $timeout_duration) {
        // Destroy session data and cookies
        $_SESSION = [];
        session_unset();
        session_destroy();
        session_gc();

        // Expire the session cookie
        setcookie(session_name(), '', time() - 3600, '/', '', true, true);  // Expire the PHP session cookie

        // Expire the SimpleSAML cookie if using SSO
        

        // Redirect to login page with a session timeout message
        header("Location: /login.php?timeout=true");
        exit;
    }
}

// Update the last activity timestamp (user is still active)
$_SESSION['last_activity'] = time();
?>
