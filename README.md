Guest Greeting Generator
📋 Project Overview
A single-page PHP application that demonstrates fundamental PHP concepts including variables, functions, control structures, and user input handling.

🎯 Objective
Develop an interactive greeting page that personalizes the visitor experience based on their name, time of day, and visit frequency.

✨ Features
Personalized Greetings: Displays custom greeting based on visitor's name from URL parameter

Time-Based Messages: Shows "Good morning", "Good afternoon", or "Good evening" based on server time

Visit Counter: Tracks and displays visit count using static variables

Dynamic Styling: Changes background colors and fonts for first-time vs returning visitors

VIP Status: Special styling for visitors with 5+ visits (Bonus feature)

Easter Egg: Secret message for visitors named "PHP"

XSS Protection: Input sanitization using htmlspecialchars()

🛠️ Technology Stack
Language: PHP 7.4+

Concepts: Variables, Functions, Control Structures, Static Variables, GET Parameters

Security: Input sanitization, XSS prevention

📁 Project Structure
text
guest_greeting_generator/
├── greeting.php          # Main application file
├── README.md            # Project documentation
└── screenshots/         # Test screenshots folder
🚀 Installation & Setup
Prerequisites
PHP 7.4 or higher

Web server (Apache, Nginx, or PHP built-in server)

Installation Steps
Clone or download this project

Place the greeting.php file in your web server's document root

XAMPP: htdocs/guest_greeting_generator/

WAMP: www/guest_greeting_generator/

MAMP: htdocs/guest_greeting_generator/

Running the Application
Option 1: Using PHP Built-in Server

bash
cd guest_greeting_generator
php -S localhost:8000
Then open: http://localhost:8000/greeting.php?name=YourName

Option 2: Using XAMPP/WAMP/MAMP

Start Apache server

Open: http://localhost/guest_greeting_generator/greeting.php?name=YourName

📝 Usage Examples
Basic Usage
text
http://localhost:8000/greeting.php?name=Alex
Displays personalized greeting for "Alex"

No Name Parameter
text
http://localhost:8000/greeting.php
Defaults to "Guest"

Easter Egg
text
http://localhost:8000/greeting.php?name=PHP
Reveals secret message

Multiple Visits
Refresh the page multiple times to see:

Visit counter increment

Styling change from first-time to returning visitor

VIP status at 5+ visits

🧪 Test Cases
Test #	Input	Expected Output	Purpose
1	?name=Alex (first load)	Good [time], Alex! + Visit #1 + Light blue background	First visit logic & styling
2	Refresh same URL	Same greeting + Visit #2 + Orange background	Static counter & returning styles
3	?name=PHP	Secret message appears	Easter egg trigger
4	No name parameter	Defaults to "Guest"	Graceful fallback
5	Refresh 5+ times	VIP Visitor badge + Gold background	Bonus VIP feature
🔑 Key Concepts Demonstrated
$_GET Superglobal: Reading URL parameters

htmlspecialchars(): Preventing XSS attacks

Static Variables: Persistent counter across function calls

Functions: Modular code organization

Control Structures: if/else for conditional logic

DateTime: Server-time based decisions

String Manipulation: Dynamic message generation

Inline CSS: Dynamic styling based on logic

📸 Screenshots Required
Visit #1 with your name

Visit #2 after refresh (showing counter increment and style change)

Easter egg with ?name=PHP

Bonus: VIP status at 5+ visits

🎓 Learning Outcomes
Understanding PHP basics and syntax

Working with user input and URL parameters

Implementing security best practices (input sanitization)

Using static variables for state management

Creating dynamic, interactive web pages

Applying conditional logic for user experience

⏱️ Time Estimate
45-60 minutes for completion and testing

🏆 Scoring
Points: 100

Functional Requirements: 60 points

Code Quality & Comments: 20 points

Security Implementation: 10 points

Bonus Features: 10 points

🔒 Security Features
Input sanitization with htmlspecialchars()

XSS attack prevention

Safe parameter handling with isset()

🚀 Possible Enhancements
Add session-based visit tracking

Implement multiple language support

Store visitor names in a database

Add more Easter eggs

Create admin panel for statistics

📄 License
Educational project for PHP beginners

👨‍💻 Author
PHP Beginner Assignment - December 2025

Note: This is a beginner-level assignment focusing on PHP fundamentals without requiring cookies or databases.