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
            <img src="/Pictures/asyv.png" alt="site" id="im">
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
            <!-- Post 1 -->
            <div class="full">
                <div class="photo">
                    <img src="/Pictures/expe.PNG" alt="site" id="mi">
                </div>
                <div class="side">
                    <p id="title">Mastering Public Speaking</p>
                    <p id="detail">
                        Public speaking is a skill that can be daunting for many, but with practice and the right techniques, it can be mastered effectively.
                        <span class="hidden-content"> This involves understanding your audience, preparing thoroughly, and using body language effectively to engage listeners.</span>
                        <span class="toggle-button" onclick="toggleContent(this)"> more</span>
                    </p>
                      <!----<hr id="line">---->
                </div>
            </div>
            <!-- Post 2 -->
            <div class="full">
                <div class="photo">
                    <img src="/Pictures/expe.PNG" alt="site" id="mi">
                </div>
                <div class="side">
                    <p id="title">Building Confidence: Public Speaking for Students</p>
                    <p id="detail">
                        Are you a student looking to boost your confidence in public speaking? Whether you're preparing for a class presentation, a debate competition, or simply want to improve your communication skills...
                        <span class="hidden-content"> Confidence in public speaking is essential and can enhance both academic and personal growth. Start with small audiences, practice often, and seek constructive feedback.</span>
                        <span class="toggle-button" onclick="toggleContent(this)"> more</span>
                    </p>
                      <!----<hr id="line">---->
                </div>
            </div>
            <!-- Post 3 -->
            <div class="full">
                <div class="photo">
                    <img src="/Pictures/good.PNG" alt="site" id="mi">
                </div>
                <div class="side">
                    <p id="title">How to Be a Good Listener?</p>
                    <p id="detail">
                        Being engaged and hardworking can make you a good listener.
                        <span class="hidden-content"> Additionally, focus on understanding the speaker, ask relevant questions, and provide thoughtful feedback to show genuine interest.</span>
                        <span class="toggle-button" onclick="toggleContent(this)">more</span>
                    </p>
                    <!----<hr id="line">---->
                </div>
            </div>
        </div>
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
                <img src="/Pictures/facebook.png" alt="site" id="site">
                <img src="/Pictures/instagram.png" alt="site" id="site">
                <img src="/Pictures/twitter.png" alt="site" id="site">
            </div>
            <p id="as">asyvdebate@asyv.org</p>
        </div>
    </main>
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
