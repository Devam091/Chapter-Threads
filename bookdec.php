<?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        
        require 'phpmailer/src/Exception.php';
        require 'phpmailer/src/PHPMailer.php';
        require 'phpmailer/src/SMTP.php';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          
            $email = $_POST['email_address'];
            $pwd = $_POST['pass'];
            $bname = $_POST['book_name'];
            $isbn = $_POST['ISBN_No'];
            $msg = $_POST['message'];
            
              
                $mail = new PHPMailer();
            
                
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = $email;
                $mail->Password = $pwd;
                $mail->SMTPSecure = 'tsl';
                $mail->Port = 587;
            
                
                $mail->setFrom($email);
                $mail->addAddress('chapterthreads@gmail.com');
                $mail->isHTML(true);
            
               
                $mail->Subject = 'Book Description';
                $mail->Body = "Book Name: $bname<br> ISBN No: $isbn<br> Description: $msg<br> Please find the attached PDF file.";
            
                
                if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
                    $pdfFileName = $_FILES['pdf']['name'];
                    $pdfTmpName = $_FILES['pdf']['tmp_name'];
            
                    
                    $mail->addAttachment($pdfTmpName, $pdfFileName);
          
                    if ($mail->send()) {
                      echo "<script>alert('Email Sent Successfully !');
                            alert('You will be notified when admin approves the book !');</script>";
                    } else {
                        echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
                    }
                } else {
                    echo 'File upload failed.';
                }
            }
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="read.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="preload" as="image" href="./assets/images/hero-banner.png">
</head>
<body>
<section class="section contact" id="contact" aria-label="contact">
    <div class="container">

      <p class="section-subtitle">Admin Approval</p>

      <h2 class="h2 section-title has-underline">
        Add the Description
        <span class="span has-before"></span>
      </h2>

      <div class="wrapper">

        <form action="" class="contact-form" method="post" enctype="multipart/form-data">

          <!-- <input type="text" name="name" placeholder="Your Name" required class="input-field"> -->

          <input type="email" name="email_address" placeholder="Your Email" required class="input-field">

          <input type="password" name="pass" placeholder="2-Step Verification App Password" required class="input-field">

          <input type="text" name="book_name" placeholder="Book Name" required class="input-field">

          <input type="text" name="ISBN_No" placeholder="ISBN Number" required class="input-field">

          <textarea name="message" placeholder="Description..." class="input-field"></textarea>
          
          <input type="file" name="pdf" id="pdf" accept=".pdf" required><br><br>

          <button type="submit" class="btn btn-primary">Send Now</button>

        </form>
            
        <ul class="contact-card">

          <li>
            <p class="card-title">Address:</p>

            <address class="address">
              16, Abcxy <br>
              Abcxyz, India 999000
            </address>
          </li>

          <li>
            <p class="card-title">Phone:</p>

            <a href="tel:1234567890" class="card-link">123 456 7890</a>
          </li>

          <li>
            <p class="card-title">Email:</p>

            <a href="mailto:Chapterthreads@gmail.com<" class="card-link">ChapterThreads@gmail.com</a>
          </li>

          <li>
            <p class="social-list-title h3">Connect book socials</p>

            <ul class="social-list">

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li>
                    <a href="#" class="social-link" style="padding-bottom: 0px; padding-top: 0px; height: 41px;">
                    <!-- <ion-icon name="logo-twitter"></ion-icon> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
  <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
</svg>
                    </a>
                  </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-youtube"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-whatsapp"></ion-icon>
                </a>
              </li>

            </ul>
          </li>

        </ul>

      </div>

    </div>
  </section>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>