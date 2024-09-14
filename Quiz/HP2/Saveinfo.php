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
  <link href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="favicon.svg" type="image/svg+xml">
</head>

<body>
  <section class="main-section">
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" data-bs-theme="light">
      <div class="container-fluid">
        <p class="navbar-brand">Harry Potter and the Chamber of Secrets Quiz</p>
        <p id="timer" class="navbar-brand" style="margin-left: 938px;">05:00</p>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          </ul>
        </div>
      </div>
    </nav>
    <form id="quizForm">
      <?php
      // Fetch questions in random order
      $sql = "SELECT * FROM quesans WHERE book_id = 2 ORDER BY RAND() LIMIT 10";
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
                      <input type="radio" class="form-check-input" name="checkanswer[<?php echo $row['ques_id']; ?>]" value="<?php echo $option; ?>">
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
            <center><button type="submit" class="sub" id="anssubmit">Submit Answers</button></center>
          </div>
        </div>
      </div>
    </form>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const quizForm = document.getElementById('quizForm');

      // Save user progress locally
      function saveProgress() {
        const formData = new FormData(quizForm);
        const serializedData = {};
        for (const [key, value] of formData.entries()) {
          serializedData[key] = value;
        }
        localStorage.setItem('quizData', JSON.stringify(serializedData));
      }

      // Sync data with server-side session
      function syncData() {
        const quizData = JSON.parse(localStorage.getItem('quizData'));
        if (quizData) {
          fetch('sync.php', {
            method: 'POST',
            body: JSON.stringify(quizData),
            headers: {
              'Content-Type': 'application/json'
            }
          }).then(response => {
            if (response.ok) {
              // Clear locally stored data upon successful synchronization
              localStorage.removeItem('quizData');
            } else {
              console.error('Failed to sync data:', response.statusText);
            }
          }).catch(error => {
            console.error('Error syncing data:', error);
          });
        }
      }

      // Listen for changes in form inputs and save progress
      quizForm.addEventListener('change', saveProgress);

      // Detect when the internet connection is lost
      window.addEventListener('offline', function() {
        saveProgress();
      });

      // Detect when the internet connection is restored
      window.addEventListener('online', function() {
        syncData();
      });
    });


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
</body>

</html>
