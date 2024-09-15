<?php
session_start();
include 'connect.php';
error_reporting(E_ERROR | E_PARSE);

$sql = "SELECT * FROM claimed WHERE EMAIL = '" . $_SESSION['Email'] . "'";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)){
  $cname = $row['Coupon'];
  $code = $row['Code'];
  $valid = $row['Validity'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head class="content">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chapter Threads - Threads of Knowledge</title>
  <meta name="title" content="Chapter Threads - Threads of Knowledge">
  <meta name="description"
    content="Read More And Make Success The Result Of Perfection. - A best therapy in the world we are gifted is books. Let's make a significant use and develope ourselves.">
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="read.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&family=Poppins:wght@400;500;600&display=swap"
    rel="stylesheet">
  <link rel="preload" as="image" href="./assets/images/hero-banner.png">
  <meta name="google-site-verification" content="R1vO93Nlp7vQUiw7g84UEJnKTURYOnTQ-d1ZwViF3GI" />
  <style>
    .sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  overflow: hidden;
  transition: 0.5s;
  padding-top: 60px;
  background-color: #fff;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 12px;
  color: #818181;
  display: inline;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 12px;
  font-size: 36px;
  margin-left: 50px;
}
    #main {
  transition: .2s;
}
.cart{
  cursor: pointer;
}
.side{
  text-transform: Uppercase;
  font-family: 'Philosopher',sans-serif;
}
.hero-banner{
  position: relative;
  width: 300px;
}
.hero-banner img{
  /* top: 0;
  left: 0; */
  position: absolute;
}
.hero-banner img:first-child{
  z-index: -1;
  bottom: 1%;
  top: -210px;
  left: 10px;
  height: 450px;
  width: 596;
}
.hero-banner::before {
  top: -185px;
  background-color: var(--light-pink);
  border-radius: 10px;
  z-index: -5;
  height: 447px;
  left: -20px;
}
.hero-banner img:nth-child(2){
  z-index: -2;
    bottom: 1%;
  top: -210px;
  left: 10px;
  height: 450px;
  width: 596;
}
.hero-banner img:nth-child(3){
  z-index: -3;
    bottom: 1%;
  top: -210px;
  left: 9px;
  height: 450px;
  width: 596;
}
.hero-banner img:nth-child(4){
  z-index: -4;
    bottom: 1%;
  top: -210px;
  left: 9px;
  height: 450px;
  width: 596;
}
::-webkit-scrollbar{
  width: 10px;
}
::-webkit-scrollbar-track{
  background-color: #FFFFFF;
  opacity: 20%;
}
::-webkit-scrollbar-thumb{
  background-color: #D18C7E;
  opacity: 100%;
}
::-webkit-scrollbar-thumb:hover{
  background-color: hsl(304, 14%, 46%);
}
  </style>
</head>
<body>
  <header class="header" data-header class="content">
    <div class="container">
    <div id="mySidenav" class="sidenav">
      <!-- ADD ANY HTML TAGS HERE -->
      <?php 
      if(isset($_SESSION['Email'])){
        echo '<center><h3 class="side">Hello,</h3><hr>'. $_SESSION['Name'].'</center>';
        echo'<b><p><i class="input-icon uil uil-at"></i>Email:&nbsp;</b>'.$_SESSION['Email'].'<p>';
        echo'<b><i class="input-icon uil-phone-alt"></i>Phone No:&nbsp;</b>'.$_SESSION['Phone'].'<p>'.'<hr>';
      }
      else{
        echo '<center><h3 class="side">Hello,</h3><p class="side">User</center><hr></p><br>';
      }
      ?>
      <?php 
      if(isset($_SESSION['Email'])){
        echo '<br><center><p>WISHLIST<a href="view.php"><i class="fas fa-heart wishlist-icon fa-2x cart" aria-hidden="true"></a></i></p></center>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>';
      }
      else{
        echo '<center><p>WISHLIST<a href="Login.php"><i class="fas fa-heart wishlist-icon fa-2x cart" aria-hidden="true"></a></i></p></center>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>';
      }
      ?>
      <h3><center>Coupons's Claimed</center></h3>
      <?php
      if(isset($_SESSION['Email'])){
        echo '<b><p>Coupon: </b>'.$cname.'</p>';
        echo '<b><p>Code: </b>'.$code.'</p>';
        echo '<b><p>Validity: </b>'.$valid.'</p>';
      }
      else{
        echo '<center><p>Sorry You have no coupons to view !</p></center>';
      }
      ?>
</div>
    <div id="main">
    <span style="font-size:30px;cursor:pointer" ><i class="fa fa-user fa-x user" aria-hidden="true" onclick="openNav()"></i></span>
  </div>
  </button>
      <a href="#" class="logo">Chapter Threads</a>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="#home" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li class="navbar-item">
            <a href="#benefits" class="navbar-link" data-nav-link>Benefits</a>
          </li>
      <?php
          if(isset($_SESSION['Email'])){
         echo' <li class="navbar-item">
        <a href="discover.php" class="navbar-link" data-nav-link target="_parent">Discover</a>
        </li>';
        }
        else{
          echo' <li class="navbar-item">
          <a href="login.php" class="navbar-link" data-nav-link target="_parent">Discover</a>
          </li>';
        }
        ?>

          <li class="navbar-item">
            <a href="#pricing" class="navbar-link" data-nav-link>Pricing</a>
          </li>

          <li class="navbar-item">
            <a href="#contact" class="navbar-link" data-nav-link>Contact</a>
          </li>
          <?php
if(isset($_SESSION['Email']))
{
  echo '<li class="navbar-item">
  <a href="Logout.php" class="navbar-link" data-nav-link>Log Out</a>
</li>';
}
else{
  echo'<button class="navbar-link dropdown">
  Sign Up
  <i class="fa fa-caret-down"></i>
  <div class="dropdown-content">
    <a href="Login.php">Log-In</a>
    <a href="Sign-In.php">Sign up</a>
    <a href="Sellersign.php">As Seller</a>
  </div>
</button>';
}
?>

        </ul>
      </nav>

      <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true" class="open"></ion-icon>

        <ion-icon name="close-outline" aria-hidden="true" class="close"></ion-icon>
      </button>

    </div>
  </header>
  <main class="content"> 
    <article>
      <section class="section hero" id="home" aria-label="home">
        <div class="container">

          <div class="hero-content">

            <p class="section-subtitle">Let's Make The Best Investment</p>

            <h1 class="h1 hero-title">Read More And Make Success The Result Of Perfection.</h1>
            <p class="section-text">
              A best therapy in the world we are gifted is books. Let's make a significant use and develope ourselves.
            </p>
<!-- <div class="book" id="loading">
        <div class="book__page"></div>
        <div class="book__page"></div>
        <div class="book__page"></div>
      </div> -->
          </div>
          <section class="bks">
          <div class="hero-banner has-before">
            <img src="assets/images/at-the-mountains-of-madness.jpg" width="431" height="596"
              alt="things i never said, a novel by claudia wilson" class="w-100" id="img1">
            <img src="./assets/images/Harry Potter And The Order Of The Phoenix.jpg" width="431" height="596" 
            alt="Harry Potter And The Order of Phoenix" class="w-100 hp" id="img2">
            <img src="./assets/images/Steve Jobs.png" width="431" height="596" 
            alt="Harry Potter And The Order of Phoenix" class="w-100 hp" id="img3">
            <img src="./assets/images/Mademoiselle-At-Arms.jpg" width="431" height="596" 
            alt="Harry Potter And The Order of Phoenix" class="w-100 hp" id="img4">


            <button class="play-btn" aria-label="play video" onclick="start();">
              <ion-icon name="play-outline" aria-hidden="true" id="play"></ion-icon>
            </button> 
            <button class="play-btn" aria-label="play video" onclick="stop();" id="pause">
              <ion-icon name="pause-outline" aria-hidden="true" id="pause"></ion-icon>
            </button> 
          </div>
          </section>
        </div>
      </section>
      <section class="section benefits" id="benefits" aria-label="benefits">
        <div class="container">

          <div class="grid-list">

            <li class="benefits-content">
              <h2 class="h2 section-title">What you'll achieve by reading books</h2>

              <p class="section-text">By reading books, you unlock the door to a world of knowledge, imagination, and personal growth, all while nourishing your intellect and expanding the horizons of your understanding</p>
            </li>
            <li>
              <div class="benefits-card has-before has-after">

                <div class="card-icon">
                  <img src="./assets/images/benefits-1.svg" width="40" height="40" loading="lazy" alt="Experience" title="Experience">
                </div>

                <h3 class="h3 card-title">Experience</h3>

                <p class="card-text">
                  While reading a book, the experience achieved can vary greatly depending on the content, genre, and the individual reader's preferences.
                </p>

                <a href="Readmore.php#Experience" class="btn-link" target="_blank">
                  <span class="span">Read more</span>

                  <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="benefits-card has-before has-after">

                <div class="card-icon">
                  <img src="./assets/images/benefits-2.svg" width="40" height="40" loading="lazy" alt="Motivation">
                </div>

                <h3 class="h3 card-title">Motivation</h3>

                <p class="card-text">
                  In the pages of a powerful book, you discover the fuel to ignite your inner fire, empowering you to overcome challenges, chase your dreams.
                </p>

                <a href="Readmore.php#Motivation" class="btn-link" target="_blank">
                  <span class="span">Read more</span>

                  <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="benefits-card has-before has-after">

                <div class="card-icon">
                  <img src="./assets/images/benefits-3.svg" width="40" height="40" loading="lazy" alt="Goals">
                </div>

                <h3 class="h3 card-title">Goals</h3>

                <p class="card-text">
                  Reading a book paragraph on goal achievement is like a catalyst for personal growth. It provides clarity, motivation, and actionable insights. 
                </p>

                <a href="Readmore.php#Goals" class="btn-link">
                  <span class="span">Read more</span>

                  <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="benefits-card has-before has-after">

                <div class="card-icon">
                  <img src="./assets/images/benefits-4.svg" width="40" height="40" loading="lazy" alt="Vision">
                </div>

                <h3 class="h3 card-title">Vision</h3>

                <p class="card-text">  
                  Reading a book can help individuals achieve a clearer and more well-defined vision in various aspects of their lives. Here's a brief summary:
                </p>

                <a href="Readmore.php#Vision" class="btn-link">
                  <span class="span">Read more</span>

                  <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="benefits-card has-before has-after" style = "height: 397px;">

                <div class="card-icon">
                  <img src="./assets/images/benefits-5.svg" width="40" height="40" loading="lazy" alt="Mission">
                </div>

                <h3 class="h3 card-title">Mission</h3>

                <p class="card-text">
                  Reading books can help individuals define and pursue their missions in various aspects of life. Here's a concise summary to achieve it:
                </p>

                <a href="Readmore.php#Mission" class="btn-link">
                  <span class="span">Read more</span>

                  <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

            <li>
              <div class="benefits-card has-before has-after" style="height: 397px;">

                <div class="card-icon">
                  <img src="./assets/images/benefits-6.svg" width="40" height="40" loading="lazy" alt="Strategy">
                </div>

                <h3 class="h3 card-title">Strategy</h3>

                <p class="card-text">
                  It can be valuable source of knowledge and insight when it comes to developing and refining strategies in various areas of life. Here's detailed example:
                </p>

                <a href="Readmore.php#Stratergy" class="btn-link">
                  <span class="span">Read more</span>

                  <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
                </a>

              </div>
            </li>

          </div>

        </div>
      </section>
      
      <section class="section pricing" id="pricing" aria-label="pricing">
        <div class="container">

          <p class="section-subtitle">Pricing</p>

          <h2 class="h2 section-title has-underline">
            Pricing based on their version
            <span class="span has-before"></span>
          </h2>

          <ul class="grid-list">

            <li>
              <div class="pricing-card">

                <h3 class="h3 card-title">1 Month</h3>

                <data class="price" value="5">&#x20B9;650</data>

                <ul class="pricing-card-list">

                  <li class="card-item">
                    <p class="card-text">Complete Book</p>
                  </li>

                  <li class="card-item">
                    <p class="card-text">Access all Books</p>
                  </li>

                  <!-- <li class="card-item">
                    <p class="card-text">Hardcover Book</p>
                  </li> -->

                  <li class="card-item">
                    <p class="card-text">Access free book download</p>
                  </li>

                </ul>

               <a href="Payment.php"><button class="btn btn-secondary">BUY NOW</button></a> 

              </div>
            </li>

            <li>
              <div class="pricing-card bundle">

                <h3 class="h3 card-title">3 Months</h3>

                <data class="price" value="15">&#x20B9;1500</data>

                <ul class="pricing-card-list">

                  <li class="card-item">
                    <p class="card-text">Complete Book</p>
                  </li>

                  <li class="card-item">
                    <p class="card-text">Access all Books</p>
                  </li>

                  <!-- <li class="card-item">
                    <p class="card-text">Hardcover Book</p>
                  </li> -->

                  <li class="card-item">
                    <p class="card-text">Access books download</p>
                  </li>

                </ul>

                <button class="btn btn-primary">BUY NOW</button>

              </div>
            </li>

            <li>
              <div class="pricing-card">

                <h3 class="h3 card-title">1 Year</h3>

                <data class="price" value="10">&#x20B9;3000</data>

                <ul class="pricing-card-list">

                  <li class="card-item">
                    <p class="card-text">Complete Book</p>
                  </li>

                  <li class="card-item">
                    <p class="card-text">Access all Books</p>
                  </li>

                  <!-- <li class="card-item">
                    <p class="card-text">Hardcover Book</p>
                  </li> -->

                  <li class="card-item">
                    <p class="card-text">Access Book Download</p>
                  </li>

                </ul>

                <button class="btn btn-secondary">BUY NOW</button>

              </div>
            </li>

          </ul>

        </div>
      </section>
      <section class="section contact" id="contact" aria-label="contact">
        <div class="container">

          <p class="section-subtitle">Contact</p>

          <h2 class="h2 section-title has-underline">
            Write me anything
            <span class="span has-before"></span>
          </h2>

          <div class="wrapper">

            <form action="" class="contact-form" method="post">

              <input type="email" name="email_address" placeholder="Your Email" required class="input-field">

              <input type="password" name="pass" placeholder="2 Step App Verification Password" required class="input-field">

              <input type="text" name="subject" placeholder="Subject" required class="input-field">

              <textarea name="message" placeholder="Your Message" class="input-field"></textarea>

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

                <a href="mailto:chapterthreads@gmail.com" class="card-link">chapterthreads@gmail.com</a>
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
                    <a href="#" class="social-link" style="padding-bottom: 0px; padding-top: 0px;">
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
                      <ion-icon name="logo-instagram"></ion-icon>
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

    </article>
  </main>
  <footer class="footer" class="content">
    <div class="container">

      <div class="footer-top">
        <p class="logo">We accept </p>

        <ul class="footer-list">

          <li>
            <p><i class="fa fa-fw fa-credit-card"></i> Debit Card</p>
          </li>

          <li>
          <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
          </li>

        </ul>

      </div>

      <div class="footer-bottom">
        <p class="copyright">
          &copy; 2024 All rights reserved. Chapter Threads.
        </p>
      </div>

    </div>
  </footer>
  <script src="./assets/js/script.js" defer></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <!-- <script src="https://kit.fontawesome.com/b20fcef0b2.js" crossorigin="anonymous"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script>

function openNav() {
  document.getElementById("mySidenav").style.width = "410px";
  document.getElementById("main").style.visibility = "hidden";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.visibility = "visible";
  // document.getElementById("main").style.z-index = "3";
}
var currentImageIndex = 0;
var imageElements = document.querySelectorAll('.hero-banner img');
var transitionDuration = "2s";
var interval = 3000;
var isAutoSliding = true;

var imageUrls = [
  "assets/images/at-the-mountains-of-madness.jpg",
  "assets/images/Harry Potter And The Order Of The Phoenix.jpg",
  "assets/images/Steve Jobs.png",
  "assets/images/Mademoiselle-At-Arms.jpg"
];

imageElements[0].src = imageUrls[0];
imageElements[1].src = imageUrls[1];
imageElements[2].src = imageUrls[2];
imageElements[3].src = imageUrls[3];

var timer = setInterval(changeSlide, interval);

function changeSlide(n) {
  for (var i = 0; i < imageElements.length; i++) {
    imageElements[i].style.opacity = 0;
    imageElements[i].style.transition = transitionDuration;
  }

  // Uncomment the following block if you want to manually change slides
  // if (n !== undefined) {
  //   clearInterval(timer);
  //   isAutoSliding = false;
  //   currentImageIndex = n;
  // }

  currentImageIndex = (currentImageIndex + 1) % imageElements.length;

  imageElements[currentImageIndex].style.opacity = 1;
}

function stop() {
  clearInterval(timer);
  isAutoSliding = false;
  document.getElementById('pause').style.display = "none";
}

function start() {
  if (!isAutoSliding) {
    timer = setInterval(changeSlide, interval);
    isAutoSliding = true;
    document.getElementById('pause').style.display = "block";
  }
}






</script>
</body>
</body>
</html>
<?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        
        require 'phpmailer/src/Exception.php';
        require 'phpmailer/src/PHPMailer.php';
        require 'phpmailer/src/SMTP.php';
        
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $email = $_POST['email_address'];
  $pwd = $_POST['pass'];
  $sub = $_POST['subject'];
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

  $mail->Subject = "Subject: $sub";
  $mail->Body = "Message: $msg";
  if ($mail->send()) {
    echo "<script>alert('Email Sent Successfully !');</script>";
  } else {
      echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
  }
}
?>