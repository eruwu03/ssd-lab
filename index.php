<?php
require __DIR__ . '/includes/functions.php';

start_session();

header('Location: ' . (isset($_SESSION['user']) ? 'dashboard.php' : 'login.php'));
exit;
