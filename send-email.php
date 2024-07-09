<?php
error_reporting(E_ALL);
ini_set('display_errors', 0); 

include '_dbconnect.php';

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];


require "vendor/autoload.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->Username = "connect2ilife@gmail.com";
$mail->Password = "dvqkxotbwdcezxxy";
$SMTP->Port = 587;
$mail->SMTPSecure = PHPMailer :: ENCRYPTION_STARTTLS;


$mail->setFrom("connect2ilife@gmail.com");
$mail->addAddress($email);

$mail->Subject = $subject;
$mail->Body = $message;
$mail->send();
if($mail->send()){
    $logFile = '/var/log/sendemaillog.txt';
    date_default_timezone_set('America/New_York');
    $currentDateTime = date('Y-m-d H:i:s');
    file_put_contents($logFile, "Email sent to ". $email." at: $currentDateTime\n", FILE_APPEND);
    echo "email sent";
   
    $sql = "INSERT INTO `sentEmail` (`SN`,`NameofReceipent`, `EmailofReceipent`, `Message`, `dt`) VALUES (NULL, '$name', '$email', '$message', current_timestamp())";
    $result = mysqli_query($conn, $sql);
}
?>