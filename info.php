<?php
    session_start();
    $conn=mysqli_connect("localhost","root","","debate");
    if(!isset($_SESSION['email'])){
        header('location: admin.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More information</title>
    <link href="register.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <main>
        <div class="left">
           
            <div class="down">
                <a href="register.php"><button class="joinBtn">Add lessons</button><a>
                <a href="event.php"><button class="joinBtn">Add event</button><a>
                <a href="info.php"><button class="joinBtn">Add information</button><a>

                <a href="admin.php"><button class="joinBtn">Logout</button><a>  
            </div>
        
           </div>
          
           <form action="db_connection.php" method="POST" id="form" enctype="multipart/form-data">
    <label id="la" for="avatar">Choose a profile picture:</label>
    <input type="file" id="avatar" name="avatar" required />
    
    <label id="t" for="text">Title:</label><br>
    <input type="text" id="text" name="Title" size="70" required /><br>
    
    <label id="d" for="text">Description:</label><br>
    <input type="text" id="text" name="details" size="500" required /><br>
    
    <input id="reg" type="submit" name="submit" value="Add Post" class="sub">
</form>


    </main>
  
</body>
</html>