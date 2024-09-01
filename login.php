<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
// Connect to DB
    $conn = mysqli_connect("localhost", "root", "", "LMS");
    if (!$conn) {
        mysqli_connect_error();
        exit;
    }
// Escape any special character to avoid sql injection
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = sha1($_POST['password']);

    $query = "SELECT * FROM `users` WHERE `email` = '" . $email . "' AND password = '" . $password . "' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        header("Location: profile.php");
        exit;
    } else {
        $error = "Invalid email or password";
    }
    // Close the connection
    mysqli_free_result($result);
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <form action="" method="POST">
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= $_POST['email'] ?? "" ?>" required/>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <?php if (isset($error)) echo $error; ?>
        </div>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
