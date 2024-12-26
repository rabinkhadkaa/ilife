<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 0); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function sendmail($email, $subject, $message, $attachmentPath = null, $attachmentName = null){
    include '_dbconnect.php';
    require "vendor/autoload.php";

    $mail = new PHPMailer(true);

    try {
        $name = "Test User";
        // Server settings
        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = "smtp.gmail.com";
        $mail->Username = "connect2ilife@gmail.com";
        $mail->Password = "dvqkxotbwdcezxxy";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Sender and recipient
        $mail->setFrom("connect2ilife@gmail.com");
        $mail->addAddress($email);

        // Email content
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Attach file if provided
        if ($attachmentPath && file_exists($attachmentPath)) {
            // If the attachment name is not provided, use the base name of the file
            $attachmentName = $attachmentName ?: basename($attachmentPath);
            $mail->addAttachment($attachmentPath, $attachmentName);
        }

        // Send email
        if ($mail->send()) {
            $logFile = '/var/log/sendemaillog.txt';
            date_default_timezone_set('America/New_York');
            $currentDateTime = date('Y-m-d H:i:s');
            file_put_contents($logFile, "Email sent to " . $email . " at: $currentDateTime\n", FILE_APPEND);

        
            // Log the email in the database
            $sql = "INSERT INTO `sentEmail` (`SN`, `NameofReceipent`, `EmailofReceipent`, `Message`, `dt`) 
                    VALUES (NULL, '$name', '$email', '$message', current_timestamp())";
            $result = mysqli_query($conn, $sql);
        } else {
            echo "Failed to send email.";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

