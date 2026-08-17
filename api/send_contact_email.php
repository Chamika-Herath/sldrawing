<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method Not Allowed']);
    exit;
}

$full_name = htmlspecialchars(strip_tags(trim($_POST['full_name'] ?? '')));
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$message_body = htmlspecialchars(strip_tags(trim($_POST['message'] ?? '')));

if (empty($full_name) || empty($email) || empty($message_body)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Please fill in all required fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Invalid email address.']);
    exit;
}

$to = 'chamika@heraforce.com';
$subject = 'New Contact Submission from SLdrawing';
$headers = "From: no-reply@sldrawing.com\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

$body = "You have received a new contact submission from SLdrawing.\n\n";
$body .= "Name: $full_name\n";
$body .= "Email: $email\n\n";
$body .= "Message:\n$message_body\n";

$success = mail($to, $subject, $body, $headers);

if ($success) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Failed to send email. Please try again later.']);
}
