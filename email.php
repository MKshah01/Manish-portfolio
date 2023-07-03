<?php
/*
ini_set('SMTP', 'smtp.gmail.com'); // Replace with your mail server address
ini_set('smtp_port', 465); // Replace with the appropriate port number

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Set up the recipient email address
    $to = "manishkumar77448@gmail.com.com"; // Replace with your email address

    // Set up the email subject
    $subject = "New Message from Contact Form";

    // Set up the email headers
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8" . "\r\n";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message";

    // Attempt to send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Email sent successfully
        echo "Thank you for your message! We'll get back to you shortly.";
    } else {
        // An error occurred while sending the email
        echo "Sorry, there was a problem sending your message. Please try again later.";
    }
}
*/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Configure SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'anshukumarsingh.digineta@gmail.com'; // Replace with your email address
        $mail->Password = 'Modern5621@'; // Replace with your email password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Set sender and recipient
        $mail->setFrom($email, $name);
        $mail->addAddress('manishkumar77448@gmail.com', 'Manish Kumar'); // Replace with your email address

        // Set email subject and body
        $mail->Subject = 'New Message from Contact Form';
        $mail->Body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        // Send the email
        $mail->send();
        echo "Thank you for your message! We'll get back to you shortly.";
    } catch (Exception $e) {
        echo "Sorry, there was a problem sending your message. Please try again later. Error: " . $mail->ErrorInfo;
    }
}


?>
