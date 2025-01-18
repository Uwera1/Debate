<?php 
// Connect to the MySQL database
$conn = mysqli_connect("localhost", "root", "", "debate");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Login authentication (admin)
if (isset($_POST['adminsub'])) {
    $email = $_POST['email'];
    $pswd = $_POST['pass'];

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM `login` WHERE `email` = ? AND `Pasword` = ?");
    $stmt->bind_param("ss", $email, $pswd); // Bind parameters (email and password)
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        session_start();
        $_SESSION['email'] = $row['email']; // Store session
        header('location: register.php');
    } else {
        echo "Incorrect password or email";
    }
}

if (isset($_POST["submit"])) {
    // Check if the required fields are not empty
    if (empty($_POST["Title"]) || empty($_POST["details"]) || empty($_FILES["avatar"]["name"])) {
        echo "Please fill in all the required fields.";
    } else {
        $uploadDir = "Pictures/dbimages/";
        $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);

        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
            // File successfully uploaded
            $picture = $uploadFile;
            $title = $_POST["Title"];
            $description = $_POST["details"];

            // Query to insert the data into the database
            $query = "INSERT INTO blog (Picture, Title, Description) VALUES ('$picture', '$title', '$description')";

            if (mysqli_query($conn, $query)) {
                echo "Data successfully inserted into the blog table!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "File upload failed.";
        }
    }
}
?>



