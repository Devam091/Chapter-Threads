<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="pay.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        .form {
  display: grid;
  gap: 2em;
}

.form__radios {
  display: grid;
  gap: 1em;
  cursor: pointer;
}
input[type="radio"] {
  accent-color: #C27A7E;
}
.form__radio {
  align-items: center;
  background-color: #fefdfe;
  border-radius: 1em;
  box-shadow: 0 0 1em rgba(0, 0, 0, 0.0625);
  display: flex;
  padding: 12px;
  justify-content: center;
}

.form__radio label {
  align-items: center;
  display: flex;
  flex: 1;
  gap: 2em;
}

.header {
  display: flex;
  justify-content: center;
  padding-block: 0.5em;
  padding-inline: 1em;
}

.icon {
  block-size: 1em;
  display: inline-block;
  fill: currentColor;
  inline-size: 1em;
  vertical-align: middle;
} 

    </style>
</head>
<body>
<div class="wrapper">
    <div class="container">
        <form action="" method="post">
            <h1>
            <i class="fas fa-address-book"></i>
                Address Details
            </h1>
            <div class="name">
                <div>
                    <label for="f-name">First</label>
                    <input type="text" name="f-name" required>
                </div>
                <div>
                    <label for="l-name">Last</label>
                    <input type="text" name="l-name"required>
                </div>
            </div>
            <div class="street">
                <label for="name">Email</label>
                <input type="text" name="Mail" required>
            </div>
            <div class="street">
                <label for="name">Street</label>
                <input type="text" name="address" required>
            </div>
            <div class="address-info">
                <div>
                    <label for="city">City</label>
                    <input type="text" name="city" required>
                </div>
                <div>
                    <label for="state">State</label>
                    <input type="text" name="state" required>
                </div>
                <div>
                    <label for="zip">Zip</label>
                    <input type="text" name="zip" minlength="6" maxlength="6" pattern="[0-9\s]{13,19}" inputmode = "numeric" required>
                </div>
            </div>
            <div class="iphone">
                <header class="header">
                <div class="form__radios">
        <div class="form__radio">
          <label for="visa"><svg class="icon">
              <use xlink:href="#icon-visa" />
              <i class="fa-brands fa-cc-visa fa-3x"></i>
            </svg>Visa Payment</label>
          <input id="visa" name="payment-method" type="radio" value="Visa Payment"required checked> 
        </div>
            <div class="form__radios">
        <div class="form__radio">
          <label for="paypal"><svg class="icon">
              <use xlink:href="#icon-visa" />
              <i class="fa-brands fa-cc-paypal fa-3x"></i>
            </svg>PayPal</label>
            &nbsp;&nbsp;&nbsp;
          <input id="paypal" name="payment-method" type="radio" value="PayPal"required>
        </div>
        <div class="form__radios">
        <div class="form__radio">
          <label for="master"><svg class="icon">
              <use xlink:href="#icon-visa" />
              <i class="fa-brands fa-cc-mastercard fa-3x"></i>
            </svg>Master Card</label>
            &nbsp;
          <input id="Master Card" name="payment-method" type="radio" Value="Master Card" required>
        </div>
        <div class="form__radios">
        <div class="form__radio">
          <label for="Google"><svg class="icon">
              <use xlink:href="#icon-visa" />
              <img src="gpay.png" alt="" srcset="" style="width: 50px;">
            </svg>Google Pay</label>
            &nbsp;
          <input type="radio" id="google" name="payment-method" value="Google Pay" required>
        </div>
        </div>
        </header>
        <h1>
                <i class="far fa-credit-card"></i> Payment Information
            </h1>
            <div id="all">
            <div class="cc-num">
                <label for="card-num">Credit Card No.</label>
                <input type="text" name="card-num" required>
            </div>
            <div class="cc-info">
                <div>
                    <label for="card-num">Exp</label>
                    <input type="text" name="expire" required>
                </div>
                <div>
                    <label for="card-num">CCV</label>
                    <input type="text" name="security" required>
                </div>
            </div>
            <br>
                <!-- <a href="index.php"style="text-decoration: none;"><input type="submit" class="btns" value="Back to Home" style="margin-left: 0px;
                margin-right: 10px;"></a> -->
            </div>
            <div id="contain">
            <div class="cc-num">
                <label for="card-num">UPI Id</label>
                <input type="text" name="card-num">
            </div>
           <center><h3>Or Scan</h3> 
           <img src="QR_CODE.png" alt="Qr-Scan" width="200" height="200">
           </center>
            </div>
            <br>
            <input type="submit" class="btns" value="Purchase" id="pur">

        </form>
        </div>
        <a href="index.php"style="text-decoration: none;"><button class="btns" style="margin-left: 0px;
                margin-right: 10px;">Back to Home</button></a>
                <center>
                <footer>
                <p><b>NOTE:</b>We do not save any kind of information related to Payment Information</p>
                </footer>
                </center>
</div>
<script>
    const all = document.getElementById('all');
    const contain = document.getElementById('contain');
    contain.style.display = 'none';
function handleRadioOnclick() {
    if(document.getElementById('google').checked){
        all.style.display = 'none';
        contain.style.display = 'block';
    } else{
        all.style.display = 'block';
        contain.style.display = 'none';
    }
}
// contain.style.display = 'block';
const radioButtons = document.querySelectorAll('input[name="payment-method"]');
radioButtons.forEach(radio => {
radio.addEventListener('click', handleRadioOnclick);
});
</script>
<script src="https://kit.fontawesome.com/ff2762afb4.js" crossorigin="anonymous"></script>
<!-- <div class="footer-bottom">
        <p class="copyright">
          &copy; 2024 All right reserved. Chapter Threads.
        </p>
      </div> -->
</body>
</html>
<?php
include 'connect.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $Fname = $_POST['f-name'];
  $Lname = $_POST['l-name'];
  $email = $_POST['Mail'];
  $addr = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $pmode = $_POST['payment-method'];
  $sql = "INSERT INTO `paymentinfo` (`First`, `Last`, `Email`, `Street`,`City`,`State`, `ZipCode`,`Paymentmode`) VALUES ('$Fname','$Lname','$email','$addr','$city','$state','$zip','$pmode')";
  $result = mysqli_query($conn, $sql);
  if($result){
  //     echo '<br><div class="alert alert-success" role="alert">
  //     SIGN-UP SUCCESSFUL GO TO LOGIN PAGE !
  //   </div>';
}
}
?>