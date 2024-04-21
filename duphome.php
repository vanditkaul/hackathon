<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>musiccollabhub.com</title>
    <style>
        /* Global Styles */
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: white;
            color: #333;
            min-height: 100vh; /* Ensure a minimum height to accommodate the footer */
        }
        /* Navbar Styles */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color:transparent; /* Set background color to transparent */
            padding: 10px 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .navbar img.logo {
            height: 40px;
            margin-left: 20px;
        }

        .navbar li {
            display: inline-block;
            margin: 0 15px;
        }

        .navbar a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            position: relative;
            transition: color 0.3s ease;
        }

        .navbar a::before {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #fff;
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .navbar a:hover::before {
            transform: scaleX(1);
        }

        .navbar a:hover {
            color: #f0f0f0;
        }

        .navbar a:hover::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .login-links {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        .login-links a {
            color: #fff;
            text-decoration: none;
            margin-left: 15px;
            font-weight: bold;
        }

        .login-links a:hover {
            color: #f0f0f0;
        }

        /* Hero Section Styles */
        .hero-section {
            background-image: url('back_pg.png'); 
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #ffffff;
            animation: fadeIn 1s ease;
        }

        .hero-section h1 {
            font-size: 3em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero-section p {
            font-size: 1.2em;
            max-width: 600px;
            margin-bottom: 40px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        /* About Us Section Styles */
        .about-us-section {
            padding: 50px 20px;
            background-color: #fff;
            text-align: center;
            margin-top: 100px;
            animation: slideInLeft 1s ease;
        }

        .about-us-section h2 {
            font-size: 2.5em;
            margin-bottom: 30px;
        }

        .about-us-section p {
            font-size: 1.1em;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto 30px auto;
        }

        /* Collaborate Section Styles */
        .collaborate-section {
            padding: 50px 20px;
            background-color: #f9f9f9;
            text-align: center;
            animation: slideInRight 1s ease;
        }

        .collaborate-section h2 {
            font-size: 2.5em;
            margin-bottom: 30px;
        }

        .collaborate-section ol {
            max-width: 600px;
            margin: 0 auto;
            text-align: left;
            padding-left: 20px;
        }

        .collaborate-section li {
            margin-bottom: 15px;
            font-size: 1.1em;
        }

        /* Key Features Section Styles */
        .key-features-section {
            padding: 50px 20px;
            text-align: center;
            margin-top: 100px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .key-features-heading {
            width: 100%;
            text-align: center;
            margin-bottom: 30px;
        }

        .key-features {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }

        .key-feature {
            flex: 1;
            max-width: 300px;
            padding: 20px;
            background-color:lightblue;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin: 10px;
        }

        .key-feature:hover {
            transform: translateY(-5px);
        }

        .key-feature h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .key-feature p {
            font-size: 1.1em;
            line-height: 1.6;
        }

        /* Footer Styles */
        footer {
            background-color: transparent; /* Set background color to transparent */
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTv49NMBG642agEPl0xBXmQ1111MQAGaI4WDdJmNuvPBg&s'); /* Set background image */
            background-size:cover; /* Cover the entire footer with the background image */
            background-repeat: no-repeat; /* Prevent background image from repeating */
            background-position: center; /* Center the background image */
            color: rgb(237, 231, 231); /* Set text color */
            padding: 30px 20px; /* Add padding */
            text-align: center; /* Align text to center */
            margin-top: 50px; /* Add margin to top */
        }

        footer p {
            margin: 10px 0;
            font-size: 1.1em;
            color: rgb(252, 252, 252); /* Set text color */
        }

        footer a {
            color: rgb(246, 240, 240); /* Set text color */
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #f0f0f0;
        }

        /* Keyframe Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <img src="https://p7.hiclipart.com/preview/72/807/772/guitar-hero-rock-logo-bass-guitar-guitar.jpg" class="logo" alt="Logo">
        <ul>
            <li><a href="#" class="selected">Home</a></li>
            <li><a href="collaborate.php">Collaborate</a></li>
            <li><a href="contact.php">Contact us</a></li>
            <li><a href="faq.php">FAQ'S</a></li>
        </ul>
        <div class="login-links">
            <a href="project_sem3.html">Logout</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1>Welcome to Artist collaborator</h1>
        <p>Unleash your musical creativity. Join our vibrant community of artists and make beautiful music together.</p>
    </section>

    

    <!-- Collaborate Section -->
    <section class="collaborate-section">
        <h2>Collaborate</h2>
        <p>Ready to start collaborating? Here's how it works:</p>
        <ol>
            <li>Create your profile and showcase your musical talents.</li>
            <li>Browse through profiles of other musicians and bands.</li>
            <li>Send collaboration requests or respond to invitations.</li>
            <li>Start making music together and unleash your creative potential!</li>
        </ol>
        <h3>Choose the Role You Want to Collaborate With:</h3>
        <form id="collaborator-role-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="collaborator-role">Select Role:</label>
            <select id="collaborator-role" name="collaborator-role">
                <option value="vocalist">Vocalist</option>
                <option value="guitarist">Guitarist</option>
                <option value="drummer">Drummer</option>
                <option value="bassist">Bassist</option>
                <option value="keyboardist">Keyboardist</option>
                <option value="producer">Producer</option>
                <!-- Add more options as needed -->
            </select>
            <button type="submit">Submit</button>
        </form>
        <?php
            // PHP form validation
            $selectedRole = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["collaborator-role"])) {
                    echo "<p style='color: red;'>Please select a role.</p>";
                } else {
                    $selectedRole = test_input($_POST["collaborator-role"]);
                    echo "<p style='color: green;'>Selected role: $selectedRole</p>";
                    // You can process the selected role here, e.g., save it to a database
                }
            }

            // Function to sanitize form input
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>
    </section>

    <!-- Key Features Section -->
    <section class="key-features-section">
        <h2 class="key-features-heading">Key Features</h2>
        <div class="key-features">
            <div class="key-feature">
                <h3>Real-Time Collaboration</h3>
                <p>Work on projects together in real-time, no matter where you are.</p>
            </div>
            <div class="key-feature">
                <h3>Multi-Track Recording</h3>
                <p>Record multiple tracks simultaneously for a professional sound.</p>
            </div>
            <div class="key-feature">
                <h3>Virtual Instruments</h3>
                <p>Access a wide range of virtual instruments to enhance your compositions.</p>
            </div>
            <div class="key-feature">
                <h3>Secure File Sharing</h3>
                <p>Share files securely with your collaborators, ensuring your work is always protected.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>Contact us: <a href="mailto:info@musiccollabhub.com">info@artistcollaborator.com</a></p>
        <p>Connect with us on social media:</p>
        <p>
            <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
        </p>
        <p>&copy; 2024 Music Collaboration Hub. All rights reserved.</p>
    </footer>

</body>
</html>
