<?php
// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Database Connection
$servername = "localhost";
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$dbname = "debate"; // Change to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST['Title'];
    $message = $_POST['details'];

    // Handle File Upload
    $uploadedFilePath = ''; // Default if no file is uploaded
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
        $fileName = basename($_FILES['uploadedFile']['name']);
        $fileTmp = $_FILES['uploadedFile']['tmp_name'];
        $uploadDir = "uploads/";

        // Create the uploads directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $uploadedFilePath = $uploadDir . $fileName;
        move_uploaded_file($fileTmp, $uploadedFilePath);
    }

    // Fetch all subscribed emails
    $sql = "SELECT email FROM subscribers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $mail = new PHPMailer(true);
       
        try {
            // SMTP Configuration
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Your SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'jeanshukurani1@gmail.com'; // Your email
            $mail->Password   = 'mutu uqly shkm vvhr'; // Your email password or App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Sender info
            $mail->setFrom('jeanshukurani1@gmail.com', 'Admin');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = nl2br($message); // Convert new lines to <br>
            $mail->AltBody = strip_tags($message);

            // Send to all subscribers
            while ($row = $result->fetch_assoc()) {
                $mail->addAddress($row['email']); // Add recipient

                // Attach file if uploaded
                if (!empty($uploadedFilePath)) {
                    $mail->addAttachment($uploadedFilePath);
                }

                $mail->send();
                $mail->clearAddresses(); // Clear recipient list for next email
                $mail->clearAttachments(); // Clear attachments for the next email
            }

            echo "Emails sent successfully!";
        } catch (Exception $e) {
            echo "Email could not be sent. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No subscribers found.";
    }
}
$conn->close();
?>
