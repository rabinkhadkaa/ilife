<?php
//include '_loggedindatabase.php';

// session_start();
require  './_nav.php'; 
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] != true){
    header("location: index.php");
    exit;
}
?>