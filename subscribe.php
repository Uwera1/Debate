<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "debate"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Insert the subscriber into the database
    $sql = "INSERT INTO subscribers (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        // Admin email
        $admin_email = "shukuraniyvan@gmail.com";
        $admin_subject = "New Subscription to ASYV Debate Blog";
        $admin_message = "Hello Admin,\n\nA new user has subscribed to your blog:\n\nName: $name\nEmail: $email";
        
        // Send email to admin
        mail($admin_email, $admin_subject, $admin_message);
        
        // Subscriber's confirmation message
        $subscriber_subject = "Thank you for subscribing to ASYV Debate Blog!";
        $subscriber_message = "Hello $name,\n\nThank you for subscribing to the ASYV Debate Blog. Stay tuned for weekly updates!";
        
        // Send email to subscriber
        mail($email, $subscriber_subject, $subscriber_message);
        
        // Redirect back to the blog with a success message
        header("Location: index.php?subscription=success");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
