<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer();

    // SMTP configuration (use your own SMTP settings)
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your_username';
    $mail->Password = 'your_password';
    $mail->SMTPSecure = 'ssl'; // Change to 'tls' if needed
    $mail->Port = 465; // Change to 587 if needed

    // Sender and recipient information
    $mail->setFrom('your_email@example.com', 'Your Name');
    $mail->addAddress($email, $name);

    // Email subject and body
    $mail->Subject = 'Sending PDF Attachment';
    $mail->Body = 'Please find the attached PDF file.';

    // Handle file upload
    if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
        $pdfFileName = $_FILES['pdf']['name'];
        $pdfTmpName = $_FILES['pdf']['tmp_name'];

        $attachmentPath = 'uploads/' . $pdfFileName; // Save the PDF in a folder
        move_uploaded_file($pdfTmpName, $attachmentPath);

        // Add the PDF attachment
        $mail->addAttachment($attachmentPath);

        // Send the email
        if ($mail->send()) {
            echo 'Email sent successfully!';
        } else {
            echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
        }
    } else {
        echo 'File upload failed.';
    }
}
?>
