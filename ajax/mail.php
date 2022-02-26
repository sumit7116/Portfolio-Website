<?php
parse_str($_POST['form_data'], $form);
$full_name = $form['full_name'];
$email = $form['email'];
$phone = $form['phone'];
$sjubject = $form['sjubject'];
$message = $form['message'];



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'phpmailer/src/Exception.php';
require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

  try {
    // Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = 'sumitsoftwaressolutions@gmail.com'; // YOUR gmail email
    $mail->Password = ''; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('sumitsoftwaressolutions@gmail.com', 'Sender Name');
    $mail->addAddress('sumitsoftwaressolutions@gmail.com', 'Receiver Name');
    $mail->addReplyTo('sumitsoftwaressolutions@gmail.com', 'Sender Name'); // to set the reply to

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = $subject;
    $mail->Body = 'Email='.$email."\n".'Name='.$full_name."\n".'Message='.$message."\n".'Phone='.$phone."\n".'Subject='.$sjubject;
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

    $mail->send();
    
echo 1;
exit();
} catch (Exception $e) {
 // echo '<script> alert("Failed to send message;");</script>';
}
?>