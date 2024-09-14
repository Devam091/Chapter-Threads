<?php
session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Sign-Up</title>
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
    <form action="" method="post">
    <?php
    $login = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $users = $_POST["sellname"];
        $email = $_POST["sellemail"];
        $pword = $_POST["sellpass"];
        $phn = $_POST["sellphn"];
        $hash = password_hash($pword, PASSWORD_DEFAULT);
        $existsSql = "SELECT * FROM `sellerlog` WHERE Username = '$users'";
        $existsMail = "SELECT * FROM `sellerlog` WHERE Email = '$email'";
        $result = mysqli_query($conn,$existsSql);
        $check = mysqli_query($conn,$existsMail);
        $numrows = mysqli_num_rows($result);
        $mailrows = mysqli_num_rows($check);
        if($numrows > 0 || $mailrows > 0){
            echo "Username or Email already exists !";
        }
        else{
            $sql = "INSERT INTO `sellerlog` (`Username`, `Email`, `Phone`, `Password`) VALUES ('$users','$email','$phn','$hash')";
            $result = mysqli_query($conn, $sql);
            if($result){
              $_SESSION['Username'] = $users;
              $_SESSION['email'] = $email;
              header("Location: sellerlogin.php");
              if(!$_SESSION['email']){
                echo "You need to sign Up first !";
              }
            }
        }
    }
?>
        <div class="section">
            <div class="container">
                <div class="row full-height justify-content-center">
                    <div class="col-12 text-center align-self-center py-5">
                        <div class="section pb-5 pt-5 pt-sm-2 text-center">
                            <div class="card-3d-wrap mx-auto">
                                <div class="card-3d-wrapper">
                                    <div class="card-front" style="height: 500px;">
                                        <div class="center-wrap">
                                        <h4 class="mb-4 pb-3">Sign Up</h4>
                                            <div class="section text-center">
                                                <div class="form-group mt-2">
                                                    <input type="text" name="sellname" class="form-style"
                                                        placeholder="Your Full Name" id="signname" autocomplete="on">
                                                        <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="email" name="sellemail" class="form-style"
                                                        placeholder="Your Email" id="signemail" autocomplete="on">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="tel" name="sellphn" class="form-style"
                                                        placeholder="Phone Number" id="signphn" autocomplete="on">
                                                    <i class="input-icon uil-phone-alt"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="sellpass" class="form-style"
                                                        placeholder="Your Password" id="signpass" autocomplete="on">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                <!-- <a href="#" class="btn mt-4">submit</a> -->
                                                <input type="submit" value="Sign-Up" class="btn mt-4">
                                                <p class="mb-0 mt-4 text-center"><a href="sellerlogin.php" class="link">Already a member?</a></p>
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