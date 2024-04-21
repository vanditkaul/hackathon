<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Connect to the database (replace with your database credentials)
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "db";

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check the connection
    if (mysqli_connect_error()) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the email exists in the database
    $checkEmailQuery = "SELECT * FROM Users WHERE Username = '$email'";
    $result = mysqli_query($conn, $checkEmailQuery);

    if ($result) {
        // Check if a row is returned
        if (mysqli_num_rows($result) > 0) {
            // Email exists, fetch the hashed password
            $row = mysqli_fetch_assoc($result);
            $hashedPassword = $row['Password'];

            // Verify the entered password against the hashed password
            if (password_verify($password, $hashedPassword)) {
                // Password is correct, show success alert and redirect
                echo "<script>alert('Logged in successfully!');</script>";
                echo "<script>window.location.href = 'duphome.php';</script>";
                exit(); // Ensure that the script stops execution after redirection
            } else {
                // Password is incorrect, show alert
                echo "<script>alert('Username or password is incorrect. Please enter details correctly.');</script>";
            }
        } else {
            // User doesn't exist, show alert
            echo "<script>alert('Username or password is incorrect. Please enter details correctly.');</script>";
        }

        // Free result set
        mysqli_free_result($result);
    } else {
        // Query execution failed
        echo "Error executing query: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Your Account</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #000;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url('bg.png');
        }

        form {
            width: 300px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        p {
            text-align: center;
            margin: 10px;
            font-size: 18px;
            color: black;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .signup-link {
            margin-top: 10px;
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
        }

        .signup-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form id="loginForm" action="" method="post">
        <h2>Login to Your Account</h2>
        Email ID: <br>
        <input type="email" name="email" placeholder="Enter email" required><br>
        Password: <br>
        <input type="password" name="password" placeholder="Enter password" required><br>
        <button type="submit">Login</button>
        <p>If this is your first time, <br>please <a class="signup-link" href="SIGNUP.php">sign up here</a>.</p>
    </form>
</body>
</html>
