<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="./Assets/Agahozo+Shalom+Logo.png">
    <title>Admin Blog</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="connection.php" method='POST'>
                    <h2>LOG IN</h2>  
                    <div class="inputbox">
                        <input type="email" name="email"  placeholder="Enter your email" required>
                        <label>Email</label>
                    </div>
                    <div class="inputbox">
                        <input type="password" id="password" name="pass" placeholder="Enter your password" required>
                        <label>Password</label>
                    </div>
                    <button type='submit' name='adminsub'>LOG IN</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
