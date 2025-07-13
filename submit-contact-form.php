<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate data
    if (empty($name) || empty($email) || empty($message)) {
      http_response_code(400);
      echo json_encode(["error" => "All fields are required"]);
      exit();
    }

    // Email sending configuration (replace with your actual details)
    $to = "your_email@example.com";
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
      http_response_code(200);
      echo json_encode(["success" => true, "message" => "Email sent successfully"]);
    } else {
      http_response_code(500);
      echo json_encode(["error" => "Failed to send email"]);
    }
  } else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["error" => "Only POST requests are allowed"]);
  }
?>
