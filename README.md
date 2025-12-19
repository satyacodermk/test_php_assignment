# User Feedback System

A simple web application to collect and display user feedback, built with PHP and MySQL.

## Project Structure
```text
/user-feedback-system
 ┣ /public          → Publicly accessible files (HTML, CSS, JS)
 ┃ ┣ index.php      → Home screen
 ┃ ┣ submit.php     → Feedback submission form and processing
 ┃ ┣ report.php     → Displays JSON feedback report
 ┃ ┣ feedback_list.php → Displays categorized feedback table
 ┃ ┗ .htaccess      → Apache configuration for security and error pages
 ┣ /includes        → PHP files with reusable functions
 ┃ ┣ db_config.php  → Database connection details
 ┃ ┣ feedback_model.php → Database interaction functions
 ┃ ┣ validation.php → Input validation functions
 ┃ ┣ json_generator.php → JSON report generation logic
 ┃ ┗ env_loader.php → Environment variable loader helper
 ┣ /errors          → Custom error pages
 ┃ ┗ error.php      → Custom 404/error page
 ┣ /sql             → SQL scripts
 ┃ ┗ create_table.sql → SQL script to create the feedback table
 ┣ .env             → Environment variables (Sensitive!)
 ┣ .env.example     → Example environment variables
 ┗ README.md        → Project documentation and setup instructions
```

## Features
- **Submit Feedback**: Users can submit their name, feedback, and category.
- **View Reports**: JSON-formatted statistics of submitted feedback.
- **Categorization**: Feedback is categorized (e.g., Bug Report, Feature Request).
- **Security**: Basic input validation and Apache `.htaccess` configuration.

## Setup
1.  **Database**:
    - Create a MySQL database (e.g., `zoblik_feedback`).
    - Run the `sql/create_table.sql` script to create the `feedback` table.
    - Copy `.env.example` to `.env` and update it with your database credentials.

2.  **Server**:
    - Deploy the `user_feedback_system` folder to your web server (e.g., Apache/XAMPP `htdocs`).
    - Ensure `.htaccess` is enabled (`AllowOverride All` in Apache config).

## Usage
- Visit `public/index.php` to access the application.
