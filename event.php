<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="event.css" rel="stylesheet">
    <title>Add Upcoming Events</title>
</head>
<body>
    <main>
        <div class="left">
            <div class="img">
                <img id="id" src=".\Pictures\dream.jpg" alt="Admin">
                <p id="p">ADMIN</p>
            </div>
            <div class="down">
                <a href="register.php"><button class="joinBtn">Add Lessons</button></a>
                <a href="event.php"><button class="joinBtn">Add Event</button></a>
                <a href="info.php"><button class="joinBtn">Add Information</button></a>
                <a href="message.php"><button class="joinBtn">Add message</button></a>
                <a href="admin.php"><button class="joinBtn logout">Logout</button></a>
            </div>
        </div>

        <div class="form-container">
            <h2>Add Upcoming Events</h2>
            <form action="index.php" method="POST">
                <label for="event_date">Event Date:</label>
                <input type="date" id="event_date" name="event_date" required>

                <label for="event_name">Event Name:</label>
                <input type="text" id="event_name" name="event_name" placeholder="Enter event name..." required>

                <label for="event_location">Event Location:</label>
                <input type="text" id="event_location" name="event_location" placeholder="Enter event location..." required>

                <button type="submit" name="submit" class="submit-btn">Add Event</button>
            </form>
        </div>
    </main>
</body>
</html>
