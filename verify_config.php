<?php
require_once 'includes/db_config.php';

echo "Testing Database Configuration...\n";
echo "Host: " . DB_HOST . "\n";
echo "User: " . DB_USER . "\n";
echo "DB Name: " . DB_NAME . "\n";
echo "DB Port: " . DB_PORT . "\n";
echo "Auth Login: " . AUTH_LOGIN . "\n";

$conn = get_db_connection();
if ($conn) {
    echo "Database connection successful!\n";
} else {
    echo "Database connection failed.\n";
}
