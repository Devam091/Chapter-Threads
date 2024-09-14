<?php
require_once("connect.php");
session_start();

if (isset($_POST['answer-submit'])) {
  $_SESSION['score'] = 0;
  $_SESSION['attempts']++;

  // Checking if our Questions are even attempted
  if (!empty($_POST['checkanswer'])) {
    
    // Set a flag for correct answers
    $correctAnswers = 0;
    $selected = $_POST['checkanswer'];

    $sql = "SELECT * FROM quesans";
    $result = mysqli_query($conn, $sql);

    // $i = 1;
    foreach ($selected as $questionId => $selectedAnswer) {
      // Retrieve correct answer for the current question
      $sql = "SELECT ans FROM quesans WHERE ques_id = $questionId";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
  
      // Compare the selected answer with the correct answer
      if ($row['ans'] == $selectedAnswer) {
          $correctAnswers++;
      }
  }

    // Stored our score and attempted question value in session to be used on Result page
    $_SESSION['attempted'] = count($_POST['checkanswer']);
    $_SESSION['score'] = $correctAnswers;

    header("Location: result.php");
    exit();

  } else {
    // If Question not attempted set these variable like this
    $_SESSION['attempted'] = 0;
    $_SESSION['score'] = 0;
    header("Location: result.php");
    exit();
  }
}