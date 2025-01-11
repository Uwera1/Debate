<?php
// Function to fetch all subscribers
function getSubscribers() {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'debate'); // Adjust your credentials

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch all subscribers
    $sql = "SELECT * FROM subscribers";  // Make sure your subscribers table is properly defined
    $result = $conn->query($sql);

    $subscribers = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $subscribers[] = $row;
        }
    }

    $conn->close();

    return $subscribers;
}
?>