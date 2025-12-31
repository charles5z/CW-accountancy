<?php
// Receive user input and sanitize it
$email = isset($_POST['email_address']) ? filter_var($_POST['email_address'], FILTER_SANITIZE_EMAIL) : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8') : '';

$feedback = "From: $email \n\n$message";

// Email recipient and headers
$to = 'charles.whiteman@cw-accountancy.com';
$subject = 'CW Accountancy Contact Form (PHP8.3)';
$headers = "From: homepage@cw-accountacy.com\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

// Send email and handle the response
if (!empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $sent = mail($to, $subject, $feedback, $headers);
    
    if ($sent) {
        showSuccessPage();
    } else {
        showErrorPage("Sorry, there was an issue sending your message.");
    }
} else {
    showErrorPage("Invalid email or empty message.");
}

// Function to display the success page
function showSuccessPage() {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="robots" content="noindex">
        <title>Feedback Submission - Successful</title>
        <link href="feedback.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="fundsubmn1a">
                Thank you for your message. (8.3)<br>
                Please click <a href="feedback.html">here</a> to send another.
            </div>
        </div>
    </body>
    </html>';
}

// Function to display an error page
function showErrorPage($errorMessage) {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="robots" content="noindex">
        <title>Feedback Submission - Unsuccessful</title>
        <link href="feedback.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="fundsubmn1b">
                ' . htmlspecialchars($errorMessage) . '<br>
                Please click <a href="feedback.html">here</a> and try again (8.3).
            </div>
        </div>
    </body>
    </html>';
}
?>
