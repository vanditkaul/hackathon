<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
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

        input, select {
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

        .login-link {
            margin-top: 10px;
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form id="profileForm" action="" method="post">
        <h2>Create Your Profile</h2>
        Full Name: <br>
        <input type="text" name="fullName" placeholder="Enter your full name" required><br>
        Email ID: <br>
        <input type="email" name="email" placeholder="Enter email" required><br>
        Password: <br>
        <input type="password" name="password" placeholder="Enter password" required><br>
        Role: <br>
        <select name="role" required>
            <option value="">Select Role</option>
            <option value="artist">Artist</option>
            <option value="singer">Singer</option>
            <option value="composer">Composer</option>
            <option value="instrumentalist">Instrumentalist</option>
            <option value="producer">Producer</option>
            <option value="sound-engineer">Sound Engineer</option>
            <option value="songwriter">Songwriter</option>
            <option value="arranger">Arranger</option>
            <!-- Add more options as needed -->
        </select><br><br>
        <button type="submit">Create Profile</button>
        <p>If you already have an account, <br>please <a class="login-link" href="login.php">login here</a>.</p>
    </form>
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve user input
        $fullName = $_POST["fullName"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $role = $_POST["role"];

        // Validate input (you should do more validation as needed)
        if (!empty($fullName) && !empty($email) && !empty($password) && !empty($role)) {
            // Connect to the database (replace with your database credentials)
            $servername = "localhost";
            $username_db = "root";
            $password_db = "";
            $dbname = "db";

            $conn = new mysqli($servername, $username_db, $password_db, $dbname);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Check if the email already exists in the database
            $checkEmailQuery = "SELECT * FROM Users WHERE Username = '$email'";
            $result = $conn->query($checkEmailQuery);

            if ($result->num_rows > 0) {
                // Email found, you can proceed with password validation
                // Redirect to login page
                echo "<script>alert('Email is already registered. Please login.');</script>";
                echo "<script>window.location.href = 'login.php';</script>";
                exit();
            } else {
                // Email not found, proceed with registration

                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Prepare and execute the SQL query to insert values
                $sql = "INSERT INTO Users (Username, Password, FullName, Role) VALUES ('$email', '$hashedPassword', '$fullName', '$role')";
                if ($conn->query($sql) === TRUE) {
                    // Successfully inserted into the database
                    echo "<script>alert('Profile created successfully!');</script>";
                    echo "<script>window.location.href = 'profile.php';</script>";
                    exit();
                } else {
                    // Error inserting into the database
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            $conn->close();
        } else {
            echo "<script>alert('Please fill in all the details.');</script>";
        }
    }
    ?>
</body>
</html>
