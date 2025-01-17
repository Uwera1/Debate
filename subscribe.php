<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['full_name'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];

    // Save subscription to the database
    $conn = new mysqli('localhost', 'root', '', 'debate');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO subscribers (full_name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $full_name, $email);

    if ($stmt->execute()) {
        // Send email to the subscriber
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Replace with your email provider's SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'your-email@gmail.com'; // Replace with your email
            $mail->Password = 'your-email-password'; // Replace with your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Email to the subscriber
            $mail->setFrom('your-email@gmail.com', 'Your Blog Name');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Subscription Confirmation';
            $mail->Body = "Hello $full_name,<br><br>Thank you for subscribing to our blog. You will receive updates soon!";

            $mail->send();

            // Notify admin
            $mail->clearAddresses();
            $mail->addAddress('your-email@gmail.com'); // Admin email
            $mail->Subject = 'New Subscriber Notification';
            $mail->Body = "A new subscriber has joined:<br><br>Full Name: $full_name<br>Email: $email";

            $mail->send();

            // Redirect with success message
            header("Location: index.php?subscription=success");
            exit;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
