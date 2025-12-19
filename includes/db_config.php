<?php
// Database configuration
require_once __DIR__ . '/env_loader.php';

try {
    loadEnv(__DIR__ . '/../.env');
} catch (Exception $e) {
    die("Error loading configuration: " . $e->getMessage());
}

// Update these values to match your local MySQL setup
define('DB_HOST', getenv('DB_HOST'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASS', getenv('DB_PASS'));
define('DB_NAME', getenv('DB_NAME'));
define('DB_PORT', getenv('DB_PORT') ?: 3306);

// Ensure the AUTH_LOGIN is available if needed
define('AUTH_LOGIN', getenv('AUTH_LOGIN'));

function get_db_connection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, (int)DB_PORT);

    if ($conn->connect_error) {
        // Log error and return null, or handle gracefully
        error_log("Connection failed: " . $conn->connect_error);
        return null;
    }

    return $conn;
}
?>
