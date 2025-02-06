<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
  $email = filter_var(trim($_POST['email_address']), FILTER_VALIDATE_EMAIL);
  $company = filter_var(trim($_POST['company_name']), FILTER_SANITIZE_STRING);
  $phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
  $services = filter_var(trim($_POST['services_interested']), FILTER_SANITIZE_STRING);
  $message = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);

  if (!$email) {
    echo "Invalid email address.";
    exit;
  }

  $to = "triberdigitalmarketing@gmail.com";
  $subject = "New Contact Form Submission";
  $body = "Name: $name\nEmail: $email\nCompany: $company\nPhone: $phone\nServices Interested: $services\nMessage: $message";

  $headers = "From: noreply@yourdomain.com\r\n";
  $headers .= "Reply-To: $email\r\n";

  if (mail($to, $subject, $body, $headers)) {
    echo "Email sent successfully.";
  } else {
    echo "Failed to send email.";
  }
}
?>
