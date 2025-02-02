<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="register.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <main>
        <!-- Left Sidebar -->
        <div class="left">
            <div class="img">
                <img id="id" src="./Pictures/dream.jpg" alt="Admin">
                <p id="p">ADMIN</p>
            </div>
            <div class="down">
                <a href="register.php"><button class="joinBtn">Add Lessons</button></a>
                <a href="event.php"><button class="joinBtn">Add Event</button></a>
                <a href="info.php"><button class="joinBtn">Add Information</button></a>
                <a href="message.php"><button class="joinBtn">Add message</button></a>
                <a href="admin.php"><button class="logout">Logout</button></a>
            </div>
        </div>

        <!-- Form Section -->
        <div class="form-container">
            <form action="sendmessage.php" method="POST" id="form" enctype="multipart/form-data">
                <h2>Add Post</h2>
                <!-----<label for="avatar">Picture:</label>
                <input type="file" id="avatar" name="avatar"required />----->
                
                <label for="title">Title:</label>
                <input type="text" id="title" name="Title" placeholder="Enter post title..." required />
                
                <label for="description">Description:</label>
                <textarea id="description" name="details" rows="5" placeholder="Enter post description..." required></textarea>
                
                <button type="submit" name="submit" class="submit-btn">Add Post</button>
            </form>
        </div>
    </main>
</body>
</html>
