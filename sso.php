<?php
require_once '/var/www/simplesamlphp/vendor/autoload.php';
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => 'ilifes.store',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);

session_start();

// Initialize the SimpleSAMLphp Auth source
$auth = new SimpleSAML\Auth\Simple('auth0'); // 'default-sp' is your Auth source name

// Require authentication, will redirect to Auth0 login if not authenticated
$auth->requireAuth();

// Retrieve user attributes
$attributes = $auth->getAttributes();

//Start a session and store user details
$_SESSION['loggedin'] = true;
$_SESSION['username'] = $attributes['http://schemas.xmlsoap.org/ws/2005/05/identity/claims/emailaddress'][0];
$_SESSION['role'] = $attributes['http://schemas.auth0.com/roles'][0];
$role = $_SESSION['role'];


// Redirect to the desired page after successful authentication
header("Location: ../$role/loggedinhome.php?session_id=".session_id()); // Change this to your desired redirect URL

exit;
