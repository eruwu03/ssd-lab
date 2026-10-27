<?php
function get_db() {
    static $conn = null;

    if ($conn === null) {
        $dbPath = __DIR__ . '/../data/app.sqlite';
        $conn = new SQLite3($dbPath);
        $conn->exec("
            CREATE TABLE IF NOT EXISTS users (
                id       INTEGER PRIMARY KEY AUTOINCREMENT,
                username TEXT,
                email    TEXT,
                password TEXT
            )
        ");
    }

    return $conn;
}
