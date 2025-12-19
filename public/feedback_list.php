<?php
require_once '../includes/feedback_model.php';
$feedback_entries = getAllFeedback();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback List - Zoblik</title>
    <style>
        body {
            font-family: sans-serif;
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            margin-right: 15px;
        }
    </style>
</head>

<body>
    <h1>All Feedback Entries</h1>

    <?php if (empty($feedback_entries)): ?>
        <p>No feedback details available yet!</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Feedback</th>
                    <th>Date Submitted</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($feedback_entries as $entry): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($entry['id']); ?></td>
                        <td><?php echo htmlspecialchars($entry['name']); ?></td>
                        <td><?php echo htmlspecialchars($entry['category']); ?></td>
                        <td><?php echo htmlspecialchars($entry['message']); ?></td>
                        <td><?php echo htmlspecialchars($entry['timestamp']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <a href="index.php">Back to Home</a>
    <a href="report.php">View Statistics Report</a>
</body>

</html>