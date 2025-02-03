<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mailer/Exception.php';
require 'mailer/PHPMailer.php';
require 'mailer/SMTP.php';

// Database connection parameters
$host = 'localhost';
$db = 'debate'; // Changed to match your initial script's database
$user = 'root';
$pass = '';

$connection = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process the form when it is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted form data
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);

    // Prepare the SQL statement
    $stmt = $connection->prepare("INSERT INTO subscribers (full_name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    // Execute the statement
    if ($stmt->execute()) {
        
        // Set the success flag to true
        $subscription_successful = true;

        // Send confirmation email to the subscriber
        $mail = new PHPMailer(true);
        try {
            // Configure the PHPMailer settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Use Gmail SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'jeanshukurani1@gmail.com'; // Your email
            $mail->Password = 'mutu uqly shkm vvhr'; // Your app password (for Gmail)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients - send confirmation to the subscriber
            $mail->setFrom('noreply@asyvdebate.org', 'Thunderbirds Blog');
            $mail->addAddress($email, $name);

            // Content for the confirmation email
            $mail->isHTML(true);
            $mail->Subject = 'Subscription Confirmation';
            $mail->Body = "
                <body style='font-family: \"Poppins\", sans-serif; margin: 0; padding: 0; display: flex; min-height: 100vh; background-color: #f0f2f5; width: 100%' >
                    <div style='background-color: white; padding: 40px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center; max-width: 40%; width: 90%; position: relative; margin-left: 27%; padding-bottom: 100px;'>
                        <div style='align-items: center; justify-content: center; display: flex; width: 200%;'>
                            <img src='https://static1.squarespace.com/static/5a820ae0e45a7c13e22de06c/t/5a820cc64192020c761ef129/1730320463892/' alt='' style='width: 80px; height: 80px; position: absolute; left: 45%; bottom: 20px;' />
                        </div>
                        <div style='color: #4CAF50; font-size: 48px; margin-bottom: 20px;'>✓</div>
                        <h1 style='color: #333; margin-bottom: 15px; font-size: 24px;'>Thank you for subscribing!</h1>
                        <p style='color: #666; line-height: 1.6; margin-bottom: 20px;'>Thank you for subscribing to the Thunderbirds Blog! We're excited to have you with us.</p>
                        <div style='background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin-bottom: 20px;'>
                            <p style='color: #666; line-height: 1.6;'>You will now receive the latest updates, news, and special announcements directly from our blog.</p>
                        </div>
                        <p style='color: #666; line-height: 1.6; margin-bottom: 20px;'>Look forward to our first newsletter arriving in your inbox soon.</p>
                        <a href='INDEX.PHP' style='display: inline-block; padding: 12px 24px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px; transition: background-color 0.3s ease;'>Return to Homepage</a>
                        <div style='margin-top: 20px;'>
                            <a href='#' style='color: #666; margin: 0 10px; text-decoration: none;'>Facebook</a>
                            <a href='#' style='color: #666; margin: 0 10px; text-decoration: none;'>Twitter</a>
                            <a href='#' style='color: #666; margin: 0 10px; text-decoration: none;'>Instagram</a>
                        </div>
                    </div>
                </body>
            ";

            // Send the confirmation email to the subscriber
            $mail->send();

            // Notify the admin about the new subscriber
            $mail->clearAddresses();  // Clear previous recipients
            $mail->addAddress('jeanshukurani1@gmail.com'); // Admin's email (Change to the actual admin email)
            $mail->Subject = 'New Subscriber Notification';
            $mail->Body = "A new subscriber has joined:<br><br>Full Name: $name<br>Email: $email";

            $mail->send();
            
            // Redirect to index.php with success message
            header("Location: index.php?subscription=success");
            exit();
            
        } catch (Exception $e) {
            echo "Error sending emails: " . $mail->ErrorInfo;
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
mysqli_close($connection);
?>
