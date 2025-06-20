

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    if ($name && $email && $message) {
        $to      = "info@ne.wtec1.com";
        $subject = "Message from $name";
        $headers = "From: $email\r\nReply-To: $email\r\n";
        $body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        if (mail($to, $subject, $body, $headers)) {
            echo '<div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-4">Thank you, your message has been sent.</div>';
        } else {
            echo '<div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded mb-4">Failed to send. Please try again later.</div>';
        }
    } else {
        echo '<div class="bg-yellow-100 border border-yellow-300 text-yellow-700 px-4 py-3 rounded mb-4">Please complete all fields correctly.</div>';
    }
}
?>
