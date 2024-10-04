<?php
session_start();

require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'abhayrohilla00@gmail.com';             // SMTP username
        $mail->Password   = 'cwmpnnantrmwdugv';                     // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
        $mail->Port       = 587;     
                                       // TCP port to connect to

        //Recipients
        $mail->setFrom('abhayrohilla00@gmail.com', 'Abhay from Travel Tourism');
        $mail->addAddress('abhayrohilla00@gmail.com', 'Abhay from Travel Tourism'); // Add a recipient

        //Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'New inquiry in Travel Tourism contact form';
        $mail->Body    = '
           <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); font-family: Arial, sans-serif; color: #333;">
        <div style="background-color: #2596be; padding: 20px; border-radius: 8px 8px 0 0; text-align: center; color: white;">
            <h2 style="margin: 0; font-size: 24px; ">New Inquiry Notification</h2>
        </div>
        <div style="padding: 20px; background-color: white; border-radius: 0 0 8px 8px;">
            <h3 style="color: #2596be;">Hello, you got a new inquiry</h3>
            <p style="font-size: 16px; line-height: 1.5;"><strong>Fullname:</strong> ' . htmlspecialchars($name) . '</p>
            <p style="font-size: 16px; line-height: 1.5;"><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>
            <p style="font-size: 16px; line-height :1.5;"><strong>Phone:</strong>' .htmlspecialchars($phone) .'</p>
            <p style="font-size: 16px; line-height: 1.5;"><strong>Message:</strong><br>' . nl2br(htmlspecialchars($message)) . '</p>
        </div>
        <div style="padding: 10px; text-align: center; background-color: #f1f1f1; border-radius: 0 0 8px 8px;">
         <p style="font-size: 14px; color: #777;">Thank you for contacting us!</p>
        
        </div>

    </div>
';

         if ($mail->send()) {
           
            echo json_encode(['status' => 'success']);

        } else {
            echo json_encode(['status' => 'Error']);
           
            exit;
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        
    }
