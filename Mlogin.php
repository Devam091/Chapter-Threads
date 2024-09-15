<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                                            <?php
$login = false;
include 'connect.php';
$useradmin  = "devamtrivedi.112@gmail.com";
$passadmin = "admin@123";
if($_SERVER["REQUEST_METHOD"] == "POST"){
$email = $_POST["logemail"];
$pword = $_POST["logpass"];
$otp = $_POST["confirm"];
if($useradmin == $email and $passadmin == $pword){
    header("Location: http://localhost:8080/Chapter%20Threads/Codes/DisplayTable.php");
}
else{
$sql = "select * from records where Email='$email'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
if($num == 1){
    $hash = $row['Password'];
    $code = $row['cfm_user'];
    if(password_verify($pword,$hash) && $otp == $code){
        $login = true;
        session_start();
        $_SESSION['Name'] = $row['Username'];
        $_SESSION['Phone'] = $row['Phone'];
        $_SESSION['Email'] = $email;
        $_SESSION['password'] = $pword;
        $_SESSION['code'] = $row['cfm_user'];
    }
    else {
        echo'<div class="alert alert-danger" role="alert">
            Invalid Credentials !
          </div>';
    }    
}
}
}
?>
<?php
if($login){
header("Location: http://localhost:8080/Chapter%20Threads/");
}
?>
                                                <h4 class="mb-4 pb-3">Log In</h4>
                                                <div class="form-group">
                                                    <input type="email" name="logemail" class="form-style"
                                                        placeholder="Your Email" id="logemail" autocomplete="on">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="logpass" class="form-style"
                                                        placeholder="Your Password" id="logpass" autocomplete="on">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="confirm" class="form-style"
                                                        placeholder="Your Otp" id="logpass" autocomplete="on">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <p> A Verification code sent to your Mail!</p>
                                                </div>
                                                <!-- <a href="#" class="btn mt-4">submit</a> -->
                                                <input type="submit" value="Log-In" class="btn mt-2">
                                                <p class="mb-0 mt-4 text-center"><a href="Forgotpass.php" class="link" name="forgot">Forgot your
                                                        password?</a></p>

                                                <p class="mb-0 mt-4 text-center"><a href="Sign-In.php" class="link">Not a
                                                        member?</a></p>
                                                        <span id="email-error" class="error-message"></span> <!-- Error message for email --><br>
        <span id="password-error" class="error-message"></span> <!-- Error message for password -->
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
