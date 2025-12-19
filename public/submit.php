<?php
require_once '../includes/validation.php';
require_once '../includes/feedback_model.php';

$errors = [];
$success_message = "";
$name = "";
$message = "";
$category = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);
    $category = htmlspecialchars($_POST['category']);

    // Validate input
    $errors = validateFeedbackInput($name, $message, $category);

    if (empty($errors)) {
        // Store in database
        if (insertFeedback($name, $message, $category)) {
            $success_message = "Thank You! Your feedback has been successfully submitted.";
            // Reset form fields
            $name = "";
            $message = "";
            $category = "";
        } else {
            $errors[] = "Failed to store feedback. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Feedback - Zoblik</title>
    <style>
        body {
            font-family: sans-serif;
            max-width: 600px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Submit Feedback</h1>

    <?php if (!empty($success_message)): ?>
        <p class="success"><?php echo $success_message; ?></p>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="submit.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>

        <label for="category">Category:</label>
        <select id="category" name="category" required>
            <option value="" disabled <?php echo empty($category) ? 'selected' : ''; ?>>Select a category</option>
            <option value="bug_report" <?php echo $category === 'bug_report' ? 'selected' : ''; ?>>Bug Report</option>
            <option value="feature_request" <?php echo $category === 'feature_request' ? 'selected' : ''; ?>>Feature
                Request</option>
            <option value="general_feedback" <?php echo $category === 'general_feedback' ? 'selected' : ''; ?>>General
                Feedback</option>
        </select>

        <label for="message">Feedback:</label>
        <textarea id="message" name="message" rows="5" required><?php echo $message; ?></textarea>

        <button type="submit">Submit Feedback</button>
    </form>

    <a href="index.php">Back to Home</a>
</body>

</html>