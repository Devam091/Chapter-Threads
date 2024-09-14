<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Coupon Code </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="coupon.css">
        <link
        href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet">
    </head>
    <body>
        <form action="" method="post">
        <div class="container">
            <div class="coupon-card">
                <img src="https://i.postimg.cc/SsdN7nPq/mamaearth-logo.png" class="logo">
                <h3>Flat 20% off using the below Coupon Code</h3>
                <di class="coupon-row">
                    <span id="cpnCode">MAMA20</span>
                    <span id="cpnBtn">Copy Code</span>
                </di>
                <p>Valid Till: 01July, 2024/p>
                <div class="circle1"></div>
                <div class="circle2"></div>
                <input type="hidden" name="code" value="MAMA20">
                <input type="hidden" name="validity" value="01July, 2024">
            </div>
        </div>
        <input type="submit" value="Save">
        </form>
        <script src="coupon.js"></script>
    </body>
    <?php

include 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $coup = "mamaearth";
    $mail = $_SESSION['Email'];
    $Code = $_POST['code'];
    $valid = $_POST['validity'];
    $sql = "INSERT INTO `claimed` (`Email`, `Coupon`, `Code`, `Validity`) VALUES ('$mail','$coup','$Code','$valid')";
    mysqli_query($conn, $sql);
}
?>
</html>