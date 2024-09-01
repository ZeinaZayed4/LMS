<?php

$error_fields = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validation
    if (!(isset($_POST['username']) && !empty($_POST['username']))) {
        $error_fields[] = 'username';
    }
    if (!(isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))) {
        $error_fields[] = 'email';
    }
    if (!(isset($_POST['password']) && strlen($_POST['password']) > 5)) {
        $error_fields[] = 'password';
    }
    if (!$error_fields) {
        // Connect to DB
        $conn = mysqli_connect("localhost", "root", "", "LMS");
        if(!$conn) {
            mysqli_connect_error();
            exit;
        }
        // Escape any special characters to avoid SQL injection
        $username = mysqli_escape_string($conn, $_POST['username']);
        $email = mysqli_escape_string($conn, $_POST['email']);
        $password = sha1($_POST['password']);
        // Insert the data
        $query = "INSERT INTO `users` (`username`, `email`, `password`) 
                    VALUES ('".$username."', '".$email."', '".$password."');";
        if (mysqli_query($conn, $query)) {
            header("Location: profile.php");
            exit;
        } else {
            echo mysqli_error($conn);
        }
        // Close the connection
        mysqli_close($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="styles/signup.css">
</head>
<body>
<div class="signup-container">
    <h2>Sign Up</h2>
    <form action="" method="POST">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?= $_POST['username'] ?? "" ?>" required>
            <?php if(in_array("username", $error_fields)) echo "* Please enter a valid username"?>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= $_POST['email'] ?? "" ?>" required/>
            <?php if(in_array("email", $error_fields)) echo "* Please enter a valid email"?>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <?php if(in_array("password", $error_fields)) echo "* Please enter a password not less than 6 characters"?>
        </div>
        <button type="submit">Sign Up</button>
    </form>
</div>
</body>
</html>
