<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="event.css" rel="stylesheet"> 

    <title>Document</title>
</head>
<body>
<div class="left">
            <div class="img">
                <img id="id" src=".\Pictures\dream.jpg" alt="site">
                <p id="p">ADMIN </p>
            </div>
            <div class="down">
                <a href="register.php"><button class="joinBtn">Add lessons</button><a>
                <a href="event.php"><button class="joinBtn">Add event</button><a>
                <a href="info.php"><button class="joinBtn">Add information</button><a>

                <a href="admin.php"><button class="joinBtn">Logout</button><a>  
            </div>
        
           </div>
            <h1>Add upcoming events</h1>
    <form action="index.php" method="POST" id="form">
        <label for="event_date" id="label">Event Date:</label>
        <input type="date" id="event_date" name="event_date" required><br>
        
        <label for="event_name">Event Name:</label>
        <input type="text" id="event_name" name="event_name" required><br>
        
        <label for="event_location">Event Location:</label>
        <input type="text" id="event_location" name="event_location" required><br>
        
        <input type="submit" name="submit" value="Add Event">
    </form>
    
</body>
</html>