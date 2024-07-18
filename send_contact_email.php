<?php

require 'C:\xampp\htdocs\feedbacks\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\feedbacks\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\feedbacks\PHPMailer-master\src\SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = "annsimbulan.234@gmail.com";
    $subject = "New Contact Inquiry";

    $mail = new PHPMailer(true); 

    try {
        //Server settings
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                       
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'kylezsantoz2004@gmail.com';            
        $mail->Password   = 'cvxyguwjrofozvkb';                     
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
        $mail->Port       = 587;                                    

        
        $mail->setFrom($email, $name);
        $mail->addAddress($to);                                    

        // Content
        $mail->isHTML(false);                                       
        $mail->Subject = $subject;
        $mail->Body    = "Name: $name\nEmail: $email\nMessage:\n$message";

        $mail->send();
        echo "<script>alert('Message sent successfully!');";
        echo "window.location = 'Feed.html';</script>"; // Redirect to Feed.html
    } catch (Exception $e) {
        echo "<script>alert('Error sending email: " . $mail->ErrorInfo . "');</script>";
    }
}
?>
