<?php
session_start();

// Check if the request contains data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quizData'])) {
    // Decode JSON data sent from the client-side
    $quizData = json_decode($_POST['quizData'], true);

    // Update the session data with the received quiz data
    $_SESSION['quizData'] = $quizData;

    // Optionally, you can send a response back to the client indicating the success of the synchronization
    echo json_encode(['success' => true]);
} else {
    // Handle invalid or missing data in the request
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>
