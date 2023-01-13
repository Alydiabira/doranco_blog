<?php
// Les 2 premières ligne est indispensable
use PHPMailer\PHPMailer\PHPMailer;
require_once '../../vendor/autoload';

$mail = new PHPMailer();

// configure an SMTP
// Check si c'est un serveur Server Mail Transfer Protocol
$mail->isSMTP();
// Défini l'hôte
$mail->Host = 'smtp.mailtrap.io';
// Active l'authentification
$mail->SMTPAuth = true;
// Info admin du serveur mail(SMTP)
$mail->Username = '1a2b3c4d5e6f7g';
$mail->Password = '1a2b3c4d5e6f7g';
// Défini le type securité
$mail->SMTPSecure = 'tls';
// Défini le port du serveur
$mail->Port = 528;
// 
$mail->setFrom('confirmation@hotel.com', 'Your Hotel');
$mail->addAddress('me@gmail.com', 'Me');
$mail->Subject = 'Thanks for choosing Our Hotel!';
// Set HTML 
$mail->isHTML(TRUE);
$mail->Body = '<html>Hi there, we are happy to <br>confirm your booking.</br> Please check the document in the attachment.</html>';
$mail->AltBody = 'Hi there, we are happy to confirm your booking. Please check the document in the attachment.';
// add attachment // just add the '/path/to/file.pdf', 'filename.pdf'
$mail->addAttachment('//confirmations/yourbooking.pdf', 'yourbooking.pdf');
// send the message
if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}