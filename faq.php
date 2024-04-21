<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Collaboration Network - FAQ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        main {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        section {
            margin-bottom: 40px;
        }
        h2 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        h3 {
            color: #666;
        }
        p {
            color: #444;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 20px;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        li {
            animation: fadeIn 0.5s ease;
        }
        .btn {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #555;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
    
        footer {
    background-color: transparent;
    color: #fff;
    padding: 30px 20px;
    text-align: center;
    margin-top: 100px;
}

footer p {
    margin: 10px 0;
    font-size: 1.1em;
    color:black;

}

        footer a {
            color: black;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        footer a:hover {
            color: #f0f0f0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Artist Collaboration Network - FAQ</h1>
    </header>
    <main>
        <section>
            <h2>General Questions</h2>
            <ul>
                <li>
                    <h3>What is the Artist Collaboration Network?</h3>
                    <p>The Artist Collaboration Network is a platform that connects artists from various disciplines to collaborate on projects.</p>
                </li>
                <li>
                    <h3>How can I join the Artist Collaboration Network?</h3>
                    <p>To join, you can sign up for an account on our website. Once registered, you'll have access to all the features of the network.</p>
                </li>
                <li>
                    <h3>Is there a fee to join?</h3>
                    <p>No, joining the Artist Collaboration Network is completely free.</p>
                </li>
            </ul>
        </section>
        <section>
            <h2>Account and Profile</h2>
            <ul>
                <li>
                    <h3>How do I update my profile information?</h3>
                    <p>You can update your profile information by logging into your account and accessing the profile settings page.</p>
                </li>
                <li>
                    <h3>Can I upload my portfolio to my profile?</h3>
                    <p>Yes, you can upload your portfolio to showcase your work to other members of the network.</p>
                </li>
                <li>
                    <h3>How do I change my password?</h3>
                    <p>You can change your password by visiting the account settings page and following the instructions provided.</p>
                </li>
            </ul>
        </section>
        <section>
            <h2>Collaboration Projects</h2>
            <ul>
                <li>
                    <h3>How do I start a collaboration project?</h3>
                    <p>To start a collaboration project, go to the projects section and click on the "Start New Project" button. Fill in the project details and invite other artists to join.</p>
                </li>
                <li>
                    <h3>Can I join existing collaboration projects?</h3>
                    <p>Yes, you can browse existing collaboration projects and request to join ones that interest you.</p>
                </li>
                <li>
                    <h3>How are collaboration projects managed?</h3>
                    <p>Collaboration projects are managed by project owners, who can add or remove collaborators, update project details, and track progress.</p>
                </li>
            </ul>
        </section>

        <section>
            <h2>Contact Us</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea><br>
                <input type="submit" value="Submit" class="btn">
            </form>
        </section>
    </main>

    <?php
    // Handle form submissions
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        
        // Connect to your database (replace these values with your actual database credentials)
        $servername = "localhost";
        $username = "root"; // Change this to your MySQL username
        $password = ""; // Change this to your MySQL password
        $dbname = "db"; // Change this to your database name



        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection 
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        
        $sql_create_table = "CREATE TABLE IF NOT EXISTS faq_messages (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            message TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        if ($conn->query($sql_create_table) === TRUE) {
            // Insert data into database
            $sql_insert = "INSERT INTO faq_messages (name, email, message) VALUES ('$name', '$email', '$message')";
            
            if ($conn->query($sql_insert) === TRUE) {
                echo "<script>alert('Message sent successfully!');</script>";
            } else {
                echo "Error: " . $sql_insert . "<br>" . $conn->error;
            }
        } else {
            echo "Error creating table: " . $conn->error;
        }
        
        $conn->close();
    }
    ?>

    <footer>
        <hr>
        <p>Contact us: <a href="mailto:info@musiccollabhub.com">info@artistcollaborator.com</a></p>
        <p>Connect with us on social media:</p>
        <p>
            <a href="#" target="_blank">Facebook</a>
            <a href="#" target="_blank">Twitter</a>
            <a href="#" target="_blank">Instagram</a>
        </p>
        <p>&copy; 2024 Music Collaboration Hub. All rights reserved.</p>
    </footer>
</body>
</html>
