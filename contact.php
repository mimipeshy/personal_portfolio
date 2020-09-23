<?php
// Proccess at only POST metheod
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // name of sender
    $name = strip_tags(trim($_POST["name"]));
    
    // Email of sender
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    
    // Sender subject
    $subject = strip_tags(trim($_POST["subject"]));
    
    // Sender Message
    $message = trim($_POST["message"]);
    
    // Your email where this email will be sent
    $your_email = "perisndanu@gmail.com";
    //Your site name for identify 
    $your_site_name = "Example";
    
    // Build email subject
    $email_subject = "[{$your_site_name}] New Message by {$name}";
    
    // Build Email Content
    $email_content = "Name: {$name}\n";
    $email_content .= "Email: {$email}\n";
    $email_content .= "Subject: {$subject}\n";
    $email_content .= "Message: {$message}\n";
    
    // Build email headers
    $email_headers = "From: {$name} <{$email}>";
    
    // Send email
    $send_email = mail($your_email, $email_subject, $email_content, $email_headers);
    
    // Check email sent or not
    if($send_email){
        // Send a 200 response code.
        http_response_code(200);
        echo "Thank You! Your message has been sent."; 
    } else {
        // Send a 500 response code.
        http_response_code(500);
        echo "Oops! we couldn't send your message. Please try again later";
    }
} else {
    // Send 403 response code
    http_response_code(403);
    echo "Oops! Submition problem. Please try again later";
}
?>