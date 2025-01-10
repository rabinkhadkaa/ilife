<?php
require_once '/var/www/simplesamlphp/vendor/autoload.php';

use Auth0\SDK\Auth0;

$auth0 = new Auth0([
    'domain' => 'dev-6xu0s3t43xer76kc.us.auth0.com',
    'client_id' => 'OzeEfjrJAiiU2EIEOYtjaAc1HQx0bi2f',
    'client_secret' => 'cHVZlyPJSMHASUja3ylH_jhQivarKG0QEWT0MOi-X2V4s1KXM1cEjA7brS5j_b_i',
    'redirect_uri' => 'http://ilifes.store/callback.php',
]);

// Get user information
$userInfo = $auth0->getUser();

if ($userInfo) {
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $userInfo['name'];
    // Redirect to the appropriate dashboard based on the role or other criteria
    header("location: /dashboard.php");
} else {
    header("location: /login.php");
}
?>
