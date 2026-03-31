<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);
    }

    public function sendEmail($to, $subject, $body) {
        try {
            // Server settings
            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.example.com'; // Set the SMTP server to send through
            $this->mail->SMTPAuth = true; // Enable SMTP authentication
            $this->mail->Username = 'your_email@example.com'; // SMTP username
            $this->mail->Password = 'your_password'; // SMTP password
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `ssl` also accepted
            $this->mail->Port = 587; // TCP port to connect to

            // Recipients
            $this->mail->setFrom('from@example.com', 'Mailer');
            $this->mail->addAddress($to); // Add a recipient

            // Content
            $this->mail->isHTML(true); // Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;
            $this->mail->AltBody = strip_tags($body);

            $this->mail->send();
            return 'Message has been sent';
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}