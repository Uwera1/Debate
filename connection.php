<?php 
$conn=mysqli_connect("localhost","root","","debate");

if (isset($_POST['adminsub'])){
    $email = $_POST['email'];
    $pswd = $_POST['pass'];
    $shukur = "SELECT *FROM `login` WHERE `email`= '$email' and `Pasword` = '$pswd'";
    $quest = mysqli_query($conn, $shukur);
    $row = mysqli_fetch_assoc($quest);
    if ($row) {
        session_start();
        $_SESSION['email'] = $row['email'];
        header('location: register.php');
    }
    else {
        echo "Incorrect password or email";
    }
    
}
if (isset($_POST["submit"])) {
    // File upload handling
    $uploadDir = "Pictures/dbimages/"; // Directory where you want to store the pictures
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);

    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
        // File successfully uploaded
        $picture = $uploadFile;
        $title = $_POST["Title"];
        $description = $_POST["details"];

        // Your database connection code (assuming $conn is defined somewhere)
        
        // SQL query to insert data into the database
        $query = "INSERT INTO homepage (Picture, Title, Details) VALUES ('$picture', '$title', '$description')";

        // Execute the query
        mysqli_query($conn, $query);
        
       
}

}
?>