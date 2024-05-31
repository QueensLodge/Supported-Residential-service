<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set recipient email address
    $to = "queenslodgeoffice@me.com";

    // Extract form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Set email subject
    $subject = "New Website Contact Form Submission";

    // Construct email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    // Construct email message
    $email_message = "
    <html>
    <head>
        <title>New Website Contact Form Submission</title>
    </head>
    <body>
        <h2>Contact Details:</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <h2>Message:</h2>
        <p>$message</p>
    </body>
    </html>
    ";

    // Send email
    if (mail($to, $subject, $email_message, $headers)) {
        echo "<p>Email sent successfully.</p>";
    } else {
        echo "<p>Failed to send email.</p>";
    }
}
?>
