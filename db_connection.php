<?php
// Start the session to track login status
session_start();
if (!isset($_SESSION['email'])) {
    header('location: admin.php');
    exit();
}

// Database connection
$conn = mysqli_connect("localhost", "root", "", "debate");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle file upload and database insertion
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['Title']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);

    // Handle file upload
    $avatar = $_FILES['avatar']['name'];
    $avatar_tmp = $_FILES['avatar']['tmp_name'];

    // Sanitize the file name
    $avatar = basename($avatar);
    $avatar_folder = 'uploads/' . $avatar;  // Save in the 'uploads' directory

    // Ensure the 'uploads' folder exists and is writable
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);  // Create the folder if it doesn't exist
    }

    // Move uploaded file to the 'uploads' directory
    if (move_uploaded_file($avatar_tmp, $avatar_folder)) {
        // Insert data into the database
        $sql = "INSERT INTO information (picture, title, detail) VALUES ('$avatar_folder', '$title', '$details')";
        if (mysqli_query($conn, $sql)) {
            echo "Post added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error uploading file!";
    }
}

// Fetch data from the database for display
$sql = "SELECT id, picture, title, detail FROM information";
$result = mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);
?>
