<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "yourname@yourdomain.com"; // Add your email address in between the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Website Contact Form:  $name";
$body = "Has recibido un nuevo correo de tu sitio web.\n\n"."Detalles:\n\nName: $name\n\nEmail: $email\n\nPhone: $phone\n\nMensaje:\n$message";
$header = "From: noreply@tcu-residencia.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email";

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
