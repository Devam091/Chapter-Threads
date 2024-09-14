<?php
session_start();
include 'connect.php';
error_reporting(E_ERROR | E_PARSE);

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['Email'])) {
    header("Location: Login.php");
    exit();
}
'<script>alert("Item Added to Cart");</script>';
// Initialize wishlist session variable if not set
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = array();
}

// Handle form submission to add items to the wishlist
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = array(
        'title' => $_POST['title'],
        'image' => $_POST['image'],
        'price' => $_POST['price'],
    );

    // Add the item to the wishlist
    $_SESSION['wishlist'][] = $item;

    // Check if it's an AJAX request and send a response
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        // Output a JSON response
        header('Content-Type: application/json');
        echo json_encode(array('message' => 'Item added to wishlist successfully'));
        exit();
    }
}

// Handle removing an item from the wishlist
if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
    $removeIndex = (int)$_GET['remove'];

    // Remove the item at the specified index
    if (isset($_SESSION['wishlist'][$removeIndex])) {
        unset($_SESSION['wishlist'][$removeIndex]);
    }

    // Reset array keys to prevent gaps
    $_SESSION['removed'] = array_values($_SESSION['wishlist']);
}

// Retrieve wishlist data
$wishlist = $_SESSION['wishlist'];

$mails = $_SESSION['Email'];

foreach ($wishlist as $index => $item){
    $sql = "SELECT * FROM book WHERE name = '" . $item['title'] . "'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)){
        $auth = $row['author']; // corrected index
        $isbn = $row['isbn_no']; // corrected index
    }

    // Now, let's properly handle the string values in the SQL query
    $sql1 = "INSERT INTO wish (`Email`,`Book_Name`, `Author`, `ISBN`) VALUES ('" . $mails . "','" . $item['title'] . "', '" . $auth . "', '" . $isbn . "')";
    // Execute the insertion query
    mysqli_query($conn, $sql1);
    // echo $sql1;
}
?>
