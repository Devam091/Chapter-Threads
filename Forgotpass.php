<!-- <?php
session_destroy();
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot-Password</title>
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="style_log.css">
    <link
    href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&family=Poppins:wght@400;500;600&display=swap"
    rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body>
    <!-- <a href="index.html" target="_blank"><button class="bth">HOME</button></a> -->
    <form action="" method="post">
        <div class="section">
            <div class="container">
                <div class="row full-height justify-content-center">
                    <div class="col-12 text-center align-self-center py-5">
                        <div class="section pb-5 pt-5 pt-sm-2 text-center">
                            <div class="card-3d-wrap mx-auto">
                                <div class="card-3d-wrapper">
                                    <div class="card-front">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Forgot Password</h4>
                                            <h6>Enter Your email for otp !</h6>
                                                <div class="form-group">
                                                    <input type="email" name="mail" class="form-style"
                                                        placeholder="Your Email" id="mail" autocomplete="on">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="userpass" class="form-style"
                                                        placeholder=" App Password" id="userpass" autocomplete="on">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <!-- <a href="#" class="btn mt-4">submit</a> -->
                                                <input type="submit" value="Send" class="btn mt-4">
<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include 'connect.php';
$link2 = mysqli_connect("localhost","root","","chapterthreads");
// $mail = $_SESSION["signemail"];
if($link2 == true){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $code = rand(9999, 1111);
        $email = $_POST["mail"];
        $pass = $_POST["userpass"];
        $existsMail = "SELECT * FROM `records` WHERE Email = '$email'";
            $check = mysqli_query($link2,$existsMail);
            $mailrows = mysqli_num_rows($check);
            if($mailrows > 0){
                $sql = "INSERT INTO `userinfo` (`Email`, `Code`) VALUES ('$email','$code')";
        $result = mysqli_query($conn, $sql);
        $_SESSION['Otp'] = $code;
        $_SESSION['Email'] = $email;
    
        $mail = new PHPMailer();
                
                    
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'chapterthreads@gmail.com';
        $mail->Password = 'ixznfefyklltzdec';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
    
        
        $mail->setFrom('chapterthreads@gmail.com','No Reply');
        $mail->addAddress($email);
        $mail->isHTML(true);
    
       
        $mail->Subject = 'Otp Verification';
        $mail->Body = "<b>Enter this Otp on the page to reset your password: $code</b>";
        if ($mail->send()) {
            header("Location: otp.php");
          } else {
              echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
          }
    }
    else{
        echo '<br><br><div class="alert alert-danger" role="alert">
        Email Account not found.Try Signing In !.
      </div>';
      echo '<p class="mb-0 mt-4 text-center"><a href="Sign-In.php" class="link">Sign In</a></p>';
    }
            }
}
else{
    echo 'Database 2 cant connect !';
}

?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>