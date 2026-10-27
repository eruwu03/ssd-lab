<?php
require __DIR__ . '/includes/functions.php';

start_session();

$user = $_SESSION['user'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="auth-box">
        <h1>Welcome, <?= $user['username'] ?></h1>
        <p>You are logged in.</p>
        <form method="post" action="logout.php">
            <button type="submit">Log out</button>
        </form>
    </div>
</body>
</html>
