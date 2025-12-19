<?php
require_once 'db_config.php';

// Function to insert feedback into the database
function insertFeedback($name, $message, $category) {
    $conn = get_db_connection();
    if (!$conn) {
        return false;
    }

    $sql = "INSERT INTO feedback (name, message, category) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $name, $message, $category);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result;
    } else {
        $conn->close();
        return false;
    }
}

// Function to retrieve all feedback (for lists or processing)
function getAllFeedback() {
    $conn = get_db_connection();
    if (!$conn) {
        return [];
    }

    $sql = "SELECT * FROM feedback ORDER BY timestamp DESC";
    $result = $conn->query($sql);

    $feedback_entries = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $feedback_entries[] = $row;
        }
    }

    $conn->close();
    return $feedback_entries;
}

// Function to retrieve the most recent feedback
function getMostRecentFeedback() {
    $conn = get_db_connection();
    if (!$conn) {
        return null;
    }

    $sql = "SELECT name, category, message FROM feedback ORDER BY timestamp DESC LIMIT 1";
    $result = $conn->query($sql);

    $recent = null;
    if ($result && $result->num_rows > 0) {
        $recent = $result->fetch_assoc();
    }

    $conn->close();
    return $recent;
}
?>
