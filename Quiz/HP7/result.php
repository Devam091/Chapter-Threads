<?php
require_once("connect.php");
require_once("function.php");
session_start();
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 0);
$total = 3;
$attempt = $_SESSION['attempts'];

// Check if the user has already attempted the quiz
$reattemptAllowed = !isset($_SESSION['attempted']) || $_SESSION['attempted'] <= 0;

// Check if the form is submitted for reattempting the quiz
if (isset($_POST['reattemptQuiz'])) {
    header("Location: quiz.php");
}
if(isset($_POST['claim'])){
  header("Location: /Chapter Threads/Coupons/anim.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz</title>
  <link rel="shortcut icon" href="favicon.svg" type="image/svg+xml">
  <style>
    :root {

/**
 * colors
 */

--chinese-violet_30: hsla(304, 14%, 46%, 0.3);
--chinese-violet: hsl(304, 14%, 46%);
--sonic-silver: hsl(208, 7%, 46%);
--old-rose_30: hsla(357, 37%, 62%, 0.3);
--ghost-white: hsl(233, 33%, 95%);
--light-pink: hsl(357, 93%, 84%);
--light-gray: hsl(0, 0%, 80%);
--old-rose: hsl(357, 37%, 62%);
--seashell: hsl(20, 43%, 93%);
--charcoal: hsl(203, 30%, 26%);
--white: hsl(0, 0%, 100%);

/**
 * typography
 */

--ff-philosopher: 'Philosopher', sans-serif;
--ff-poppins: 'Poppins', sans-serif;

--fs-1: 4rem;
--fs-2: 3.2rem;
--fs-3: 2.7rem;
--fs-4: 2.4rem;
--fs-5: 2.2rem;
--fs-6: 2rem;
--fs-7: 1.8rem;

--fw-500: 500;
--fw-700: 700;

/**
 * spacing
 */

--section-padding: 80px;

/**
 * shadow
 */

--shadow-1: 4px 6px 10px hsla(231, 94%, 7%, 0.06);
--shadow-2: 2px 0 15px 5px hsla(231, 94%, 7%, 0.06);
--shadow-3: 3px 3px var(--chinese-violet);
--shadow-4: 5px 5px var(--chinese-violet);

/**
 * radius
 */

--radius-5: 5px;
--radius-10: 10px;

/**
 * clip path
 */

--polygon: polygon(100% 29%,100% 100%,19% 99%,0 56%);

/**
 * transition
 */

--transition-1: 0.25s ease;
--transition-2: 0.5s ease;
--cubic-out: cubic-bezier(0.33, 0.85, 0.4, 0.96);

}

* {
 margin: 0;
 padding: 0;
 box-sizing: border-box;
}

body {
 font-size: 20px;
 font-family: var(--ff-philosopher);
}

html {
  background-color: var(--seashell);
}

.main-section {
 padding: 0;
}

.box {
 width: 100%;
 overflow: hidden;
 background: #fff;
 border-radius: 5px;
 box-shadow: 0px 10px 34px -15px rgb(0 0 0 / 24%);
}

.form-control {
 height: 48px;
 background: #fff;
 color: #000;
 font-size: 16px;
 border-radius: 5px;
 -webkit-box-shadow: none;
 box-shadow: none;
 border: 1px solid rgba(0, 0, 0, 0.1);
}

.navbar-brand {
margin: 0px;
font-size: 25px;
font-family: var(--ff-philosopher);
}

#tq {
margin-left: 830px;
}

.form-check-input {
border: 3px lightgray solid;
}

.card-body {
transition: 0.5s;
background-color: white;
border: 5px var(--old-rose) solid;
color: var(--charcoal);
}

.form-check-input {
text-decoration-color: skyblue;
}

.sub:hover {
background-color: #ff6d75;
}

.sub {
background-color: #9c4c52;
color: #fff;
border: none;
transition: .5s;
font-family: var(--ff-philosopher);
padding: 10px;
margin-top: 10px;
border-radius: 5px;
}

#reatt {
  text-decoration: none;
  color: #fff;
  border: none;
  transition: .5s;
  font-family: var(--ff-philosopher);
  font-size: large;
  border-radius: 5px;
}

.card-body:hover {
background-color: var(--old-rose);
color: #fff;
}

  </style>
  <!-- <link rel="stylesheet" href="./style.css"> -->
  <link
      href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <section class="main-section" style="background-color: var(--seashell);">

    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="light">
      <div class="container-fluid">
        <p class="navbar-brand" style="font-size: 25px;">Harry Potter and the Half-Blood Prince Quiz Result</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
    
 <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">Quiz</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-2 p-3 text-center">
              <div class="card-body">
              <?php if($_SESSION['attempted'] && $attempt < $total ):?>
                    <h5 class="card-title py-2 text-center">You Have Attempted <?php echo $_SESSION['attempted']; ?> out of <?php echo tq($qcount); ?></h5>
                  <button class="btn btn-warning">You Score: <?php echo $_SESSION['score']; ?></button> &nbsp;&nbsp;<span class="btn btn-warning">Answered <?php echo $_SESSION['score']; ?> Questions Successfully!</span>
                    <br>
                    <?php if($_SESSION['score'] > 6): ?>
                      <h5 class="card-title py-2 text-center">You Passed the Exam</h5>
                    <form action="" method="post">
                      <br>  
                  <button class="btn btn-info" name="claim" type="submit">Claim Coupon</button>
                  </form>
                  <br><br>
                  <?php else: ?>
                    <form action="" method="post">
                      <br>
                  <button class="btn btn-info" name="reattemptQuiz" type="submit">Reattempt Quiz</button>
                </form>
                <?php endif ?>
                  <?php endif ?>

                  <?php if($_SESSION['score'] == 0 && $_SESSION['attempted'] <= 0 && $attempt < $total): ?>
                  <h5 class="card-title py-2 text-center">No Question Attempted</h5>
                  <button class="btn btn-warning">You Score is : <?php echo $_SESSION['score']; ?></button>
                  <form method="post" action="">
                    <br>
                  <button class="btn btn-info" name="reattemptQuiz" type="submit">Reattempt Quiz</button>
                </form>
                <?php endif ?>
            <?php if($attempt >= $total):?>
    <?php
        echo '<h5 class="card-title py-2 text-center">You have already reattempted the quiz</h5>';
        echo '<button class="btn btn-info" id="closeAndOpenButton">Back to Home</button>';
    echo '<script>
    document.addEventListener("DOMContentLoaded",function(){
      document.getElementById("closeAndOpenButton").addEventListener("click", function() {
        var confirmed = confirm("Are you sure you want to move to Home Page ?");
        if (confirmed) {
          window.open("http://localhost/Chapter%20Threads/", "_blank"); // Open a new blank window
          setTimeout(function() {
            window.close(); // Close the current tab
          }); // Delay the closing of the tab to ensure the new window opens
        }
      });
    });
    </script>';
    session_abort();
    ?>
                <?php endif?>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
<?php
  $servername = 'localhost';
  $username = 'root';
  $password = 'Machin@1';
  $db_name = 'chapter threads';
  $conn = mysqli_connect($servername, $username, $password, $db_name);
  if (!$conn){
      ?>
          <script>alert("Connection Unsuccessful!!!");</script>
      <?php
  }
 $score = $_SESSION['score'];
 $email = $_SESSION['Email'];
 $quiz_status = ($_SESSION['score'] >= 7 ) ? "Pass" : "Fail";
 
 $insert_query = "INSERT INTO `user_res` (`Email`, `Score`, `Attempts`, `Status`) VALUES ('$email','$score','$attempt','$quiz_status')";
 mysqli_query($conn, $insert_query);
?>