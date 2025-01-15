<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit;
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Logout</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body style="background-image: linear-gradient(to bottom right, rgb(0, 238, 255), rgb(184, 22, 220)); height: min-content;">
        <div class="container my-5 p-4 col-md-3" style="background-color: rgba(254, 251, 251, 0.825); height: 85vh; font-family: sans-serif;">
            <div class="text-center">
                <form method="get" action="login.php">
                    <!-- Single Sign-On Button -->
                    <button type="submit" name="login" class="btn btn-primary">Click here to login again</button>
                </form>
            </div>
        </div>
    </body>
</html>