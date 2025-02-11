<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $captcha = $_POST['g-recaptcha-response'];

    // Verify CAPTCHA
    $secretKey = "YOUR_SECRET_KEY";
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha);
    $responseKeys = json_decode($response, true);

    if (!$responseKeys["success"]) {
        die("CAPTCHA verification failed. Please try again.");
    }

    // Send email (adjust email settings)
    $to = "your-email@example.com"; // Replace with your actual email
    $subject = "New Contact Form Submission from " . $name;
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Success! Your message has been sent.";
    } else {
        echo "Error! Unable to send message.";
    }
}
?>
