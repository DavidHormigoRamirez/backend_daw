<?php

// Database connection details
define('DB_HOST', 'TOBECHANGED');
define('DB_NAME', 'TOBECHANGED');
define('DB_USER', 'TOBECHANGED');
define('DB_PASS', 'TOBECHANGED');

function getDB() {
    // PDO connection to the database
    $pdo = null;
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Database connection failed: ' . $e->getMessage()
        ]);
        exit;
    }

    return $pdo;
}
