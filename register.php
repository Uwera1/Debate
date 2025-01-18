<?php
    //session_start();
    //$conn=mysqli_connect("localhost","root","","news-blogs");
    //if(!isset($_SESSION['email'])){
       // header('location: login.php');
   // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="register.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <main>
        <div class="left">
            <div class="img">
                <img id="id" src=".\Pictures\admin.jpg" alt="site">
                <p id="p">ADMIN </p>
            </div>
           
            <div class="down">
                <a href="games.php"><button class="joinBtn">Add games</button><a>
                <a href="my.php"><button class="joinBtn">All sport news</button><a>
                <a href="ent1.php"><button class="joinBtn">Add Entertainment news</button><a>
                <a href="ent2.php"><button class="joinBtn">Star news</button><a>
                <a href="sports.php"><button class="joinBtn">Add sports</button><a>
                <a href="date.php"><button class="joinBtn">Add Upcoming events and  Dates</button><a>
                <a href="do.php"><button class="joinBtn">Did you know information</button><a>
                <a href="vi.php"><button class="joinBtn">Entertainment video</button><a>
               <a href="http://localhost/news-blogs/login.php"> <button id="e">Logout</button></a>
        
            </div>
           </div>
           <form action="connection.php" method="POST" id="form" enctype="multipart/form-data">
            <label id="la" for="avatar">Choose a profile picture:</label>
                
                <input type="file" id="avatar" name="avatar" />
                <label id="t" for="text">Title:</label><br>
                <input type="text" id="text" name="Title" size="70"><br>
                <label id="d" for="text">Description:</label><br>
                
            <input type="text" id="text" name="details" size="500"><br>
                <input id="reg" type="submit" name="submit" value="Add Post" class="sub"> 
 
           </form>
    </main>
  
</body>
</html>