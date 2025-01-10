<?php
session_start();

// Include the SimpleSAMLphp library
require_once '/var/www/simplesamlphp/vendor/autoload.php';

// Initialize the SimpleSAMLphp Auth source
$auth = new SimpleSAML\Auth\Simple('auth0');

// Perform a Single Logout (SLO) if the user is authenticated
if ($auth->isAuthenticated()) {
    // Trigger SLO in SimpleSAMLphp, which will also log the user out from Auth0
    $auth->logout('https:../index.php'); // Redirect after logout
} else {
    // If not authenticated in SSO, just destroy the local session
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit;
}

?>

