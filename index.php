<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me & Music Player</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        section {
            margin: 20px auto;
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            max-width: 600px;
        }
        h3 {
            color: #007BFF;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }
        /* Contact Form Styling */
        .contact-form form {
            display: flex;
            flex-direction: column;
        }
        .contact-form label {
            text-align: left;
            margin-bottom: 5px;
            color: #007BFF;
            font-weight: bold;
        }
        .contact-form input, 
        .contact-form textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        .contact-form button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        .contact-form button:hover {
            background-color: #0056b3;
        }
        /* Music Player Styling */
        .music-player audio {
            width: 100%;
            margin-top: 10px;
            outline: none;
        }
        .music-player audio::-webkit-media-controls-panel {
            background-color: #007BFF; /* Blue theme for player */
        }
    </style>
</head>
<body>

<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = "zhirousa@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $email_body = "You have received a new message from the contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message\n";

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        $success_message = "Message sent successfully!";
    } else {
        $error_message = "Failed to send the message. Please try again later.";
    }
}
?>

<!-- Contact Me Section -->
<section id="contact" class="contact-form">
    <h3>Contact Me</h3>

    <?php if (!empty($success_message)): ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php elseif (!empty($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Your Name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Your Email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" placeholder="Your Message" required></textarea>

        <button type="submit">Send Message</button>
    </form>
</section>

<!-- Music Player Section -->
<section id="music-player" class="music-player">
    <h3>Listen to Music</h3>
    <audio controls>
        <source src="audio/videoplayback.weba" type="audio/webm">
        Your browser does not support the audio element.
    </audio>
</section>

</body>
</html>
