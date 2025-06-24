<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Blog</title>
    <link href="blog.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        .hidden-content {
            display: none;
        }
        .toggle-button {
            color: blue;
            cursor: pointer;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <img src=".\Pictures\asyv.png" alt="site" id="im">
            <h1>ThunderBirds Blog</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="blog.php">Learn</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <p id="p">Posts</p>
        <?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "debate");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check how many posts exist in the database
$queryCount = "SELECT COUNT(*) AS total_posts FROM blog";
$resultCount = mysqli_query($conn, $queryCount);
$rowCount = mysqli_fetch_assoc($resultCount);
$totalPosts = $rowCount['total_posts'];

// If there are already 4 posts, delete the first one (oldest)
if ($totalPosts >= 4) {
    $deleteQuery = "DELETE FROM blog ORDER BY id ASC LIMIT 1"; // Assuming 'id' is the primary key and auto-incremented
    mysqli_query($conn, $deleteQuery);
}

// Query to get all posts from the blog table
$query = "SELECT * FROM blog ORDER BY id DESC"; // Get posts ordered by most recent
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error fetching data from the database: " . mysqli_error($conn);
}
?>

<div class="follow">
    <?php
    // Loop through the fetched posts and display each one
    while ($row = mysqli_fetch_assoc($result)) {
        // Fetch picture, title, and description for each post
        $picture = $row['Picture'];
        $title = $row['Title'];
        $description = $row['Description'];
    ?>
        <!-- Post -->
        <div class="full">
            <div class="photo">
                <img src="<?php echo $picture; ?>" alt="site" class="post-img">
            </div>
            <div class="side">
                <p id="title"><?php echo $title; ?></p>
                <p id="detail">
                    <?php echo substr($description, 0, 150); ?> <!-- Show first 150 characters -->
                    <span class="hidden-content"><?php echo substr($description, 150); ?></span> <!-- Show the rest when toggled -->
                    <span class="toggle-button" onclick="toggleContent(this)"> more</span>
                </p>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<script>
// Toggle the content visibility
function toggleContent(button) {
    var hiddenContent = button.previousElementSibling;
    if (hiddenContent.style.display === "none") {
        hiddenContent.style.display = "inline";
        button.innerText = " less";
    } else {
        hiddenContent.style.display = "none";
        button.innerText = " more";
    }
}
</script>

<?php
// Close the database connection
mysqli_close($conn);
?>

</main>
        <div class="footer">
            <p id="blog">Subscribe to Our Blog</p>
            <div class="subscription-container">
               <form id="subscription-form">
                    <input type="name" id="name" name="name" placeholder="Enter your name" required>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    <button type="submit">Subscribe</button>
                </form>
                <p class="success-message" id="success-message" style="display:none;">Thank you for subscribing!</p>
            </div>
            <h1 id="a">ASYV Debate Blog</h1>
            <div class="um">
                <img src=".\Pictures\facebook.png" alt="site" id="site">
                <img src=".\Pictures\instagram.png" alt="site" id="site">
                <img src=".\Pictures\twitter.png" alt="site" id="site">
            </div>
            <p id="as">asyvdebate@asyv.org</p>
        </div>
    <script>
        function toggleContent(element) {
            const hiddenContent = element.previousElementSibling;
            if (hiddenContent.style.display === "none" || !hiddenContent.style.display) {
                hiddenContent.style.display = "inline";
                element.textContent = "Read less";
            } else {
                hiddenContent.style.display = "none";
                element.textContent = "Read more";
            }
        }
    </script>
</body>
</html>
