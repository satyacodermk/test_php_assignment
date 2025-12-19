<?php
/**
 * Guest Greeting Generator
 * A single-page PHP application that greets visitors by name with time-based messages
 * 
 * Features:
 * - Personalized greeting based on time of day
 * - Visit counter using static variables
 * - Dynamic styling for first-time vs returning visitors
 * - Easter egg for special name
 * 
 * Author: PHP Beginner Assignment
 * Date: December 2025
 */

// Function to get time-based greeting message
function getGreeting($name) {
    // Get current hour from server time (24-hour format)
    $hour = date('G');

    // Determine time of day and return appropriate greeting
    if ($hour >= 5 && $hour < 12) {
        $timeOfDay = "Good morning";
    } elseif ($hour >= 12 && $hour < 17) {
        $timeOfDay = "Good afternoon";
    } else {
        $timeOfDay = "Good evening";
    }

    return $timeOfDay . ", " . $name . "!";
}

// Function to increment and return visit counter
function incrementCounter() {
    // Static variable persists across function calls within the same page load session
    static $visitCount = 0;

    // Increment counter
    $visitCount++;

    return $visitCount;
}

// Read name from URL parameter and sanitize it
$name = isset($_GET['name']) ? $_GET['name'] : 'Guest';
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); // Prevent XSS attacks

// Get greeting message
$greetingMessage = getGreeting($name);

// Increment visit counter
$visitNumber = incrementCounter();

// Determine visit message
if ($visitNumber == 1) {
    $visitMessage = "This is visit #" . $visitNumber;
} else {
    $visitMessage = "Welcome back! Visit #" . $visitNumber;
}

// Determine styling based on visit count
$backgroundColor = '#e3f2fd'; // Default light blue
$textColor = '#1565c0';
$fontFamily = 'Arial, sans-serif';
$borderColor = '#1565c0';
$visitBadge = 'New Visitor';

if ($visitNumber >= 5) {
    // VIP Visitor (Bonus feature)
    $backgroundColor = '#ffd700'; // Gold
    $textColor = '#8b4513';
    $fontFamily = 'Georgia, serif';
    $borderColor = '#8b4513';
    $visitBadge = '⭐ VIP Visitor ⭐';
} elseif ($visitNumber > 1) {
    // Returning visitor
    $backgroundColor = '#fff3e0'; // Warm orange
    $textColor = '#e65100';
    $fontFamily = 'Verdana, sans-serif';
    $borderColor = '#e65100';
    $visitBadge = 'Returning Visitor';
}

// Check for Easter egg
$easterEgg = ($name === 'PHP') ? true : false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Greeting Generator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: <?php echo $fontFamily; ?>;
            background: linear-gradient(135deg, <?php echo $backgroundColor; ?> 0%, <?php echo $backgroundColor; ?>dd 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            transition: all 0.5s ease;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            max-width: 600px;
            width: 100%;
            border: 3px solid <?php echo $borderColor; ?>;
            animation: slideIn 0.6s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .greeting-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .greeting-title {
            font-size: 2.5em;
            color: <?php echo $textColor; ?>;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .visit-badge {
            display: inline-block;
            background: <?php echo $textColor; ?>;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: bold;
            margin-top: 10px;
        }

        .greeting-message {
            font-size: 1.8em;
            color: <?php echo $textColor; ?>;
            text-align: center;
            margin: 25px 0;
            padding: 20px;
            background: <?php echo $backgroundColor; ?>77;
            border-radius: 10px;
            border-left: 5px solid <?php echo $textColor; ?>;
        }

        .visit-counter {
            text-align: center;
            font-size: 1.3em;
            color: #666;
            margin: 20px 0;
            padding: 15px;
            background: #f5f5f5;
            border-radius: 10px;
        }

        .easter-egg {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #f7b731);
            background-size: 300% 300%;
            animation: gradientShift 3s ease infinite;
            color: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            font-size: 1.5em;
            font-weight: bold;
            margin: 25px 0;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .info-section {
            margin-top: 30px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .info-section h3 {
            color: <?php echo $textColor; ?>;
            margin-bottom: 10px;
        }

        .info-section p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 8px;
        }

        .timestamp {
            text-align: center;
            color: #999;
            font-size: 0.9em;
            margin-top: 20px;
            font-style: italic;
        }

        .emoji {
            font-size: 2em;
            display: block;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="greeting-header">
            <h1 class="greeting-title">👋 Welcome!</h1>
            <span class="visit-badge"><?php echo $visitBadge; ?></span>
        </div>

        <div class="greeting-message">
            <?php echo $greetingMessage; ?>
        </div>

        <div class="visit-counter">
            <strong><?php echo $visitMessage; ?></strong>
        </div>

        <?php if ($easterEgg): ?>
            <div class="easter-egg">
                <span class="emoji">🎉🎊✨</span>
                You found the secret greeting!
                <span class="emoji">✨🎊🎉</span>
                <p style="margin-top: 10px; font-size: 0.8em;">
                    PHP: Hypertext Preprocessor - The language that powers this page!
                </p>
            </div>
        <?php endif; ?>

        <div class="info-section">
            <h3>How It Works:</h3>
            <p>📝 Your name is read from the URL parameter <code>?name=YourName</code></p>
            <p>🕐 The greeting changes based on the current server time</p>
            <p>🔢 Visit counter tracks how many times you've loaded this page</p>
            <p>🎨 Background and styling change for returning visitors</p>
            <p>⭐ Visit 5+ times to unlock VIP status!</p>
            <p>🔍 Try <code>?name=PHP</code> for a surprise!</p>
        </div>

        <div class="timestamp">
            Server Time: <?php echo date('l, F j, Y - g:i:s A'); ?>
        </div>
    </div>
</body>
</html>