<?php
header('Content-Type: application/json');

// Include necessary files
require_once '../includes/feedback_model.php';
require_once '../includes/json_generator.php';

// Fetch all feedback
$all_feedback = getAllFeedback();

// Generate JSON report
echo generateFeedbackReport($all_feedback);
?>