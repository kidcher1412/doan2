<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';
echo 'kidcher1412@gmail.com';
// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host     = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'kidcher1415@gmail.com';
    echo $mail->Username;
    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port     = 587;

    // Recipients
    $mail->setFrom('kidcher1415@gmail.com', 'Shop');
    $mail->addAddress('thongnguyenhkt@gmail.com', 'Thong Nguyen');

    // Content
    $mail->isHTML(true);
    $subject = 'Cảm ơn vì đã ủng hộ Thông';
    $subject = mb_encode_mimeheader($subject, 'UTF-8', 'B');
    $mail->Subject = $subject;
        $mail->Body    = '       <html>
        <head>
            <title>Test Email</title>
        </head>
        <body>
            <h1 style="color:red;background-color:blue;">Thông</h1>
            <p style="color:black;background-color:white;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed condimentum, lacus eget tempus sodales, elit odio vestibulum erat, vel rhoncus odio massa quis tortor.</p>
        </body>
        </html>';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
    
?>