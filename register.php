<?php
require __DIR__ . '/includes/db.php';
require __DIR__ . '/includes/functions.php';

start_session();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = get_db();

    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    $db->exec($query);

    $_SESSION['flash'] = 'Registration successful. You can now log in.';
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="auth-box">
        <h1>Create an account</h1>

        <form method="post" action="register.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">

            <label for="email">Email</label>
            <input type="email" id="email" name="email">

            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <button type="submit">Register</button>
        </form>

        <p>Already have an account? <a href="login.php">Log in</a></p>
    </div>
</body>
</html>
