<?php
// Function to generate feedback statistics
function generateFeedbackReport($feedback_entries)
{
    $total_entries = count($feedback_entries);
    $category_counts = [
        'bug_report' => 0,
        'feature_request' => 0,
        'general_feedback' => 0
    ];

    require_once 'feedback_model.php';
    $most_recent = getMostRecentFeedback(); // Fetch fresh or pass as arg if optimized

    foreach ($feedback_entries as $entry) {
        if (isset($category_counts[$entry['category']])) {
            $category_counts[$entry['category']]++;
        }
    }

    $report = [
        "total_feedback_entries" => $total_entries,
        "feedback_by_category" => $category_counts,
        "most_recent_feedback" => $most_recent
    ];

    return json_encode($report, JSON_PRETTY_PRINT);
}
?>