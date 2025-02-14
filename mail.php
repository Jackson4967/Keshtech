<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var(trim($_POST["firstname"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);

    if (empty($name) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid input. Please check your details.";
        exit;
    }

    // Recipient Email
    $to = "your-email@example.com"; // Change this to your actual email
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Full Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    // Send Email
    // if (mail($to, $subject, $body, $headers)) {
        echo "success"; // Response for AJAX success
    // } else {
        // echo "error"; // Response for AJAX error
    // }
} else {
    echo "Invalid request.";
}
?>
