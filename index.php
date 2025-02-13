<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "debate";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form data exists before using it
    if (isset($_POST['name']) && isset($_POST['email'])) {
        $nameOfUser = $_POST['name'];
        $userEmail = $_POST['email'];

        // Validate input (basic validation)
        if (!empty($nameOfUser) && !empty($userEmail)) {
            // Insert data into the table
            $stmt = $conn->prepare("INSERT INTO subscribers (full_name, email) VALUES (?, ?)");
            $stmt->bind_param("ss", $nameOfUser, $userEmail);

            if ($stmt->execute()) {
                echo "Data inserted successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Please fill in all fields.";
        }
    }
}

$conn->close();
?>



<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Include PHPMailer autoloader

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="index.css" rel="stylesheet"> 
    
    <title>Debate Blog</title>  
</head>
<style>
        .message {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
           /* margin: 10px auto;*/
           margin-top:-3%;
            padding: 10px;
            max-width: 400px;
            border-radius: 5px;
        }
        .message.success {
            color: #155724;
        }
        .message.error {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }
        
        
    </style>
<body>
    <header>
        <nav>
            <img src=".\Pictures\asyv.png" alt="site" id="im">
            <h1>ThunderBirds Blog</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#us">About us</a></li>
                <li><a href="#our-vision">Our Vision</a></li>
                <li><a href="#yva">Our mission</a></li>
                <li><a href="blog.php">Learn</a></li>
            </ul>
        </nav>
      </header>
    <main>
        <div class="general">
            <div class="word">
                <p id="debate">Empower Your Debate Skills</p> <!-- This text will be split and animated letter by letter -->
                <p id="um">Welcome to the ASYV Debate Blog where public speaking 
                    transforms into extraordinary ideas.</p>
            </div>
        </div>
        <div class="main">
     <div class="about-container">
    <div class="about-text">
        <p id="us">About us</p>
        <p id="ua">ASYV ThunderBirds is a club 
            founded by Frank Ntambara, who recognized 
            the importance of equipping the younger generation 
            with essential public speaking skills.
            The club aims to provide a platform for
            young people to develop their communication abilities and 
            explore new opportunities for personal and professional growth.
        </p>
    </div>
    <img src=".\Pictures\linet.jpg" alt="site" id="am">
</div>


<div class="mubye" id="our-vision">
    <img src="./Pictures/competi.jpg" alt="site" id="ak">
    <div>
        <p id="vi">Our Vision</p>
        <p id="vision">Through public speaking facilitation, we aspire to a society where everyone can express themselves fluently and  
            confidently, without difficulty or hesitation.
        </p>
    </div>
</div>
 </div> </div>
  <div class="mission">
        <p id="sion">Our mission</p>
        <p id="yva">Our mission is to empower the younger generation 
            by providing them with the tools and opportunities to
             develop strong public speaking skills, enabling them to 
             communicate confidently, express themselves clearly, and explore 
            new possibilities for personal and professional growth.</p>
        <img src=".\Pictures\dream.jpg" alt="site" id="se">
        
       </div>
       
       <div class="final">
        <img src=".\Pictures\king.PNG" alt="site" id="su">      
    </div>
    <p id="event">Events</p>
    <?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "debate");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check how many events are already in the database
$checkQuery = "SELECT COUNT(*) AS event_count FROM events";
$checkResult = mysqli_query($conn, $checkQuery);
$row = mysqli_fetch_assoc($checkResult);
$eventCount = $row['event_count'];

// If there are already 4 events, delete the first one (oldest event)
if ($eventCount >= 4) {
    $deleteQuery = "DELETE FROM events ORDER BY event_date ASC LIMIT 1";
    mysqli_query($conn, $deleteQuery);
}

// If the form is submitted, insert a new event into the database
if (isset($_POST['submit'])) {
    $eventDate = $_POST['event_date'];
    $eventName = $_POST['event_name'];
    $eventLocation = $_POST['event_location'];

    // Insert the new event into the events table
    $insertQuery = "INSERT INTO events (event_date, event_name, event_location) VALUES ('$eventDate', '$eventName', '$eventLocation')";
    if (mysqli_query($conn, $insertQuery)) {
       // echo "New event added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Query to get all events from the events table
$query = "SELECT * FROM events ORDER BY event_date DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error fetching data from the database: " . mysqli_error($conn);
}
?>

<div class="event">
    <div class="events">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $eventDate = $row['event_date'];
            $eventName = $row['event_name'];
            $eventLocation = $row['event_location'];
        ?>
            <div class="event-item">
                <p class="date"><?php echo date("F j, Y", strtotime($eventDate)); ?></p>
                <p class="name"><?php echo $eventName; ?></p>
                <p class="new"><?php echo $eventLocation; ?></p>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
// Close the database connection
mysqli_close($conn);
?>

<div class="foot">
    <p id="le">Explore more about thunderbirds achivements</p>
    <hr id="ir">
    <div class="follow">
    <?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "debate");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM information ORDER BY id DESC LIMIT 3";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0):
    while ($row = mysqli_fetch_assoc($result)):
        $imageSrc = $row['picture'];
        $title = $row['title'];
        $description = $row['detail'];

        $truncatedDescription = substr($description, 0, 50); // Adjust length as needed
        $remainingDescription = substr($description, 50);
?>
       <div class="full">
    <img src="<?php echo htmlspecialchars($imageSrc); ?>" alt="source" id="mi">
    <p id="title"><?php echo htmlspecialchars($title); ?></p>
    <p class="small-detail">
        <?php echo htmlspecialchars($truncatedDescription); ?>
    </p>
    <p id="full-detail-<?php echo $row['id']; ?>" class="full-detail" style="display: none;">
        <?php echo htmlspecialchars($remainingDescription); ?>
    </p>
    <span onclick="toggleDetails('full-detail-<?php echo $row['id']; ?>', this)">more</span>
    <hr id="line">
</div>

<?php
    endwhile;
else:
    echo "<p>No content available.</p>";
endif;

mysqli_close($conn);
?>

<script>
    function toggleDetails(id, element) {
        const fullDetail = document.getElementById(id);
        if (fullDetail.style.display === 'none' || fullDetail.style.display === '') {
            fullDetail.style.display = 'block';
            element.textContent = ' Show Less';  // Change text to "Show Less" when details are shown
        } else {
            fullDetail.style.display = 'none';
            element.textContent = 'more';  // Change text back to "more" when details are hidden
        }
    }
</script>


</div>
<div class="footer">
    <p id="blog">Subscribe to Our blog</p>
    <div class="subscription-container">
        <!-- Subscription Form -->
        <form id="subscription-form" action="subscribe.php" method="POST">
            <?php if (isset($_GET['subscription']) && $_GET['subscription'] == 'success'): ?>
                <!-- Display confirmation message above the input box -->
                <div class="message">
                    <p id="para">Thank you for subscribing! You will receive updates soon.</p>
                </div>
            <?php endif; ?>

            <!-- Name Input -->
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
            
            <!-- Email Input -->
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            
            <!-- Subscribe Button -->
            <button type="submit" name="subscribe">Subscribe</button>
        </form>
    </div>
</div>


<h1 id="a">ASYV Debate Blog</h1>
    <div class="um">
    <img src=".\Pictures\facebook.png" alt="site" id="site">
    <img src=".\Pictures\instagram.png" alt="site" id="site">
    <img src=".\Pictures\twitter.png" alt="site" id="site">
    </div>
    <p id="as">asyvdebate@asyv.org</p>
</div>
   </main>
   <script>
    function toggleDetails(fullDetailId, spanElement) {
        const fullDetail = document.getElementById(fullDetailId);

        if (fullDetail.style.display === "none" || fullDetail.style.display === "") {
            fullDetail.style.display = "block"; // Show full content
            spanElement.textContent = "less"; // Change ellipsis to 'less'
        } else {
            fullDetail.style.display = "none"; // Hide full content
            spanElement.textContent = "..."; 
        }
    }

    // Smooth scrolling script
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener("click", function(event) {
            event.preventDefault();
            document.querySelector(this.getAttribute("href")).scrollIntoView({
                behavior: "smooth"
            });
        });
    });
</script>

<script src="index.js"></script> 
  
</body>
</html>