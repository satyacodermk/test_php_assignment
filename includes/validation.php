<?php

// Function to validate user input
function validateFeedbackInput($name, $message, $category)
{
    $errors = [];

    // Name validation
    if (empty(trim($name))) {
        $errors[] = "Name is required.";
    }

    // Message validation
    if (strlen(trim($message)) < 10) {
        $errors[] = "Feedback must be at least 10 characters long.";
    }

    // Category validation
    $allowed_categories = ['bug_report', 'feature_request', 'general_feedback'];
    if (!in_array($category, $allowed_categories)) {
        $errors[] = "Invalid feedback category.";
    }

    return $errors;
}
?>