<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoblik Feedback System</title>
    <style>
        body {
            font-family: sans-serif;
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        .menu {
            margin-top: 50px;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            margin: 10px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            font-size: 1.2rem;
        }

        .btn-submit {
            background-color: #28a745;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        .btn-report {
            background-color: #17a2b8;
        }

        .btn-report:hover {
            background-color: #138496;
        }

        .btn-list {
            background-color: #ffc107;
            color: #333;
        }

        .btn-list:hover {
            background-color: #e0a800;
        }
    </style>
</head>

<body>
    <h1>Welcome to Zoblik Feedback System</h1>
    <p>We value your feedback. Please let us know how we can improve.</p>

    <div class="menu">
        <a href="submit.php" class="btn btn-submit">Submit New Feedback 📝</a>
        <a href="report.php" class="btn btn-report">View Feedback Report 📊</a>
        <a href="feedback_list.php" class="btn btn-list">View Feedback List 📋</a>
    </div>
</body>

</html>