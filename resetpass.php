<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="style_log.css">
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
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
                                                <h4 class="mb-4 pb-3">Reset</h4>
                                                <div class="form-group">
                                                    <input type="password" name="newpass" class="form-style"
                                                        placeholder="New Password" id="npass" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="cnewpass" class="form-style"
                                                        placeholder="Confirm Password" id="logpass" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <!-- <a href="#" class="btn mt-4">submit</a> -->
                                                <input type="submit" value="Change" class="btn mt-4">
                                                <?php
                                                session_start();
                                                include 'connect.php';
                                                $mail = $_SESSION['Email'];
                                                if($_SERVER["REQUEST_METHOD"] == "POST"){
                                                    $pkey = $_POST['newpass'];
                                                    $cpass = $_POST['cnewpass'];
                                                    if($pkey == $cpass){
                                                        $hash = password_hash($cpass, PASSWORD_DEFAULT);
                                                        $sql = "UPDATE `records` SET Password='$hash' WHERE Email='$mail'";
                                                        if (mysqli_query($conn, $sql)) {
                                                            echo "<br>Record Updated Successfully";
                                                            header("Location: Login.php");
                                                            } else {
                                                            echo "Error Updating Record: " . mysqli_error($conn);
                                                            }
                                                    }
                                                    else{
                                                        echo '<br><div class="alert alert-danger" role="alert">
                                                        Password do not match !
                                                      </div>';
                                                    }
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
    </form>
</body>

</html>