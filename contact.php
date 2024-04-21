<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please enter a valid email address.');</script>";
        exit; // Exit script if email is not valid
    }

    // Connect to the database
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "db";

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the email exists in the Users table
    $checkUserQuery = "SELECT * FROM Users WHERE Username = '$email'";
    $result = $conn->query($checkUserQuery);

    if ($result->num_rows > 0) {
        // Email exists, proceed with message recording

        // Create ContactUs table if it doesn't exist
        $createTableQuery = "CREATE TABLE IF NOT EXISTS ContactUs (
            email VARCHAR(255),
            name VARCHAR(255),
            message TEXT NOT NULL,
            INDEX (email),
            FOREIGN KEY (email) REFERENCES Users(username)
        )";

        if (mysqli_query($conn, $createTableQuery)) {
            // Insert data into ContactUs table
            $insertQuery = $conn->prepare("INSERT INTO ContactUs (email, name, message) VALUES (?, ?, ?)");
            $insertQuery->bind_param("sss", $email, $name, $message);

            if ($insertQuery->execute()) {
                echo "<script>alert('Your message has been submitted successfully!');</script>";
            } else {
                echo "<script>
                    alert('Message submission failed. Please try again.');
                    console.error('" . mysqli_error($conn) . "');
                </script>";
            }

            $insertQuery->close();
            mysqli_close($conn);
        } else {
            echo "Error creating table: " . mysqli_error($conn); // Print the MySQL error message
        }
    } else {
        // Email does not exist in the Users table
        echo "<script>alert('The provided email does not exist. Please check your email and try again.');</script>";
        mysqli_close($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Collaboration Network - Contact Us</title>
    <style>
        /* General Styles */
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
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
        }
        button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #555;
        }
        footer {
            background-color: #333;
            padding: 20px;
            color: #fff;
            text-align: center;
        }
        footer p {
            margin: 5px 0;
        }
        footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        footer i {
            font-size: 20px;
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Contact Us</h1>
    </header>
    <div class="container">
        <form id="contactForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm()">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Your Message:</label>
            <textarea id="message" name="message" rows="6" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>
    <footer>
        <p>Contact us: <a href="mailto:info@musiccollabhub.com">info@artistcollaborator.com</a></p>
        <p>Connect with us on social media:</p>
        <p>
            <a href="#" target="_blank">Facebook</a>
            <a href="#" target="_blank">Twitter</a>
            <a href="#" target="_blank">Instagram</a>
        </p>
        <p>&copy; 2024 Artist Collaboration Network. All rights reserved.</p>
    </footer>
    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var message = document.getElementById('message').value;
            if (name.trim() === '' || email.trim() === '' || message.trim() === '') {
                alert('Please fill out all fields');
                return false;
            }
        }
    </script>
</body>
</html>
