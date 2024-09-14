<?php
require_once("connect.php");
require_once("function.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <link
      href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet">
      <link rel="shortcut icon" href="favicon.svg" type="image/svg+xml">
  </head>
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

      --polygon: polygon(100% 29%, 100% 100%, 19% 99%, 0 56%);

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
      background-color: var(--seashell);
      font-family: var(--ff-philosopher);
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
      background-color: #C27A7E;
      color: #fff;
      border: none;
      transition: .5s;
      font-family: var(--ff-philosopher);
      padding: 10px;
      margin-top: 10px;
      border-radius: 5px;
    }

    .card-body:hover {
      background-color: var(--old-rose);
      color: #fff;
    }

    .navbar.fixed-top {
      position: sticky;
      top: 0;
      z-index: 1000;
    }
  </style>

  <body>
    <section class="main-section">
      <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" data-bs-theme="light">
        <div class="container-fluid">
          <p class="navbar-brand">Harry Potter and the Sorcerer's Stone Quiz</p>
          <p id="timer" class="navbar-brand" style="margin-left: 978px;">05:00</p>
          <!-- <p class="navbar-brand" id="tq">Total Questions: 5</p> -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">
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
      <!-- <nav style="z-index:2; position:sticky;">
      <div id="timer" style="margin-left: 30px; font-size:25px;">05:00</div>
</nav> -->
      <script>
      </script>
      <form action="checkanswers.php" method="post">
        <?php
        // Fetch questions in random order
        $sql = "SELECT * FROM quesans WHERE book_id = 1 ORDER BY RAND() LIMIT 10";
        $result = mysqli_query($conn, $sql);

        // Loop through the shuffled questions
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)):
          ?>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-9">
                <div class="card m-3" style="border: 1px solid #C27A7E; color: white;">
                  <div class="card-body">
                    <h4 class="card-title py-2">Q
                      <?php echo $i . ") " . $row["question"]; ?>
                      </h5>
                      <div class="form-check">
                        <!-- Shuffle options using array and loop -->
                        <?php
                        $options = [$row['op1'], $row['op2'], $row['op3'], $row['op4']];
                        shuffle($options);
                        foreach ($options as $option):
                          ?>
                          <input type="radio" class="form-check-input" name="checkanswer[<?php echo $row['ques_id']; ?>]"
                            value="<?php echo $option; ?>">
                          <?php echo $option; ?><br>
                        <?php endforeach; ?>
                      </div>
                  </div>
                </div>
              </div>
              <?php
              $i++;
        endwhile; ?>
            <div class="col-md-8 mb-5">
              <!-- <button type="submit" class="btn btn-success" name="answer-submit">Submit Answers</button> -->
              <center><button type="submit"onclick="submitQuiz();" name="answer-submit" class="sub" id="anssubmit">Submit Answers</button>
              </center>
            </div>
          </div>
        </div>
      </form>
      <script>
        function startTimer(duration, display) {
          var timer = duration, minutes, seconds;
          var interval = setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (timer === 10) {
              // When there are 10 seconds left, change text color to red
              display.style.color = 'red';
            }

            if (--timer < 0) {
              // Timer has reached 0, redirect to result.php
              clearInterval(interval); // Stop the timer
              document.getElementById('anssubmit').click();
            }
          }, 1000);
        }

        window.onload = function () {
          var fiveMinutes = 5 * 60; // 5 minutes in seconds
          var display = document.getElementById('timer');
          startTimer(fiveMinutes, display);
        };

         // Add event listeners to restrict user actions
       document.addEventListener('DOMContentLoaded', function() {
      // Disable right-click context menu
      document.addEventListener('contextmenu', function(event) {
        event.preventDefault();
      });

      // Disable keyboard shortcuts to open developer tools
      document.addEventListener('keydown', function(event) {
        if (event.ctrlKey && event.shiftKey && event.keyCode === 73) {
          event.preventDefault();
        }
      });

      // Disable navigating backward or forward
      window.addEventListener('popstate', function(event) {
        history.pushState(null, document.title, location.href);
      });

      // Disable refreshing the page
      window.addEventListener('beforeunload', function(event) {
        event.preventDefault();
        event.returnValue = '';
      });
    });
      </script>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
   
  </body>

</html>