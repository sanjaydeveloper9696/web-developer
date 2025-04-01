<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    if (empty($name) || empty($email) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Please fill in all fields correctly.";
        exit;
    }

    $to = "your-email@example.com"; // Replace with your email
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    $headers = "From: $name <$email>\r\nReply-To: $email\r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Success: Your message has been sent.";
    } else {
        echo "Error: Message could not be sent.";
    }
} else {
    echo "Error: Invalid request.";
}
?>
