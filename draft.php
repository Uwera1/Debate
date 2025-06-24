<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThunderBirds Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        header {
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header nav {
            display: flex;
            align-items: center;
        }

        header img {
            width: 50px;
            height: auto;
            margin-right: 15px;
        }

        header h1 {
            font-size: 24px;
            margin: 0;
            color: #007bff;
        }

        header ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        header ul li {
            margin-left: 20px;
        }

        header ul li a {
            text-decoration: none;
            color: #007bff;
            font-weight: 600;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        main #p {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .full {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 20px;
        }

        .full:last-child {
            border-bottom: none;
        }

        .photo {
            margin-right: 15px;
        }

        .photo img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            object-fit: cover;
        }

        .side {
            flex: 1;
        }

        .side #title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: capitalize;
        }

        .side #detail {
            font-size: 14px;
            line-height: 1.6;
        }

        .toggle-button {
            color: #007bff;
            cursor: pointer;
            text-decoration: underline;
            font-weight: 600;
        }

        .footer {
            text-align: center;
            background-color: #ffffff;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        .footer h1 {
            font-size: 18px;
            margin: 10px 0;
        }

        .footer p {
            font-size: 14px;
            margin: 5px 0;
        }

        .footer .um {
            margin: 10px 0;
        }

        .footer .um img {
            width: 30px;
            height: 30px;
            margin: 0 10px;
        }

        .subscription-container {
            margin-top: 15px;
        }

        .subscription-container input {
            padding: 10px;
            margin: 5px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .subscription-container button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .subscription-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <img src="./Pictures/asyv.png" alt="site">
            <h1>ThunderBirds Blog</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="blog.php">Learn</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <p id="p">Posts</p>
        <div class="follow">
            <!-- Loop through the blog posts dynamically from the server -->
            <div class="full">
                <div class="photo">
                    <img src="example1.jpg" alt="Post image">
                </div>
                <div class="side">
                    <p id="title">Communicating Effectively</p>
                    <p id="detail">
                        When you debate, stay calm. Don’t start shouting or get angry. This will show weakness to your opponent. Instead, keep your voice even and keep your...
                        <span class="toggle-button">Read more</span>
                    </p>
                </div>
            </div>

            <div class="full">
                <div class="photo">
                    <img src="example2.jpg" alt="Post image">
                </div>
                <div class="side">
                    <p id="title">You are Welcome</p>
                    <p id="detail">
                        To this edition of the blog. This post will highlight effective communication strategies for public speakers to help them engage their audience...
                        <span class="toggle-button">Read more</span>
                    </p>
                </div>
            </div>
        </div>
    </main>

    <div class="footer">
        <p id="blog">Subscribe to Our Blog</p>
        <div class="subscription-container">
            <form id="subscription-form">
                <input type="name" id="name" name="name" placeholder="Enter your name" required>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
        <h1>ASYV Debate Blog</h1>
        <div class="um">
            <img src="./Pictures/facebook.png" alt="Facebook">
            <img src="./Pictures/instagram.png" alt="Instagram">
            <img src="./Pictures/twitter.png" alt="Twitter">
        </div>
        <p>asyvdebate@asyv.org</p>
    </div>
</body>
</html>
