<?php
require __DIR__ . '/includes/db.php';
require __DIR__ . '/includes/functions.php';

start_session();

$error = '';
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = get_db();

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $db->query($query);
    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
        ];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid login for user '$username'.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="auth-box">
        <h1>Log in</h1>

        <?php if ($flash): ?>
            <p class="flash"><?= $flash ?></p>
        <?php endif; ?>

        <?php if ($error): ?>
            <p class="error-list"><?= $error ?></p>
        <?php endif; ?>

        <form method="post" action="login.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">

            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <button type="submit">Log in</button>
        </form>

        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
</body>
</html>
