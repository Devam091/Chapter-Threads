<?php
$host = "localhost:3307";
$dbname = "p22updatedb";
$username = "root";
$password = "";
$mysqli = new mysqli($host, $username, $password, $dbname);
if ($mysqli->connect_error) {
    die("Connection Failed:" . $mysqli->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $sql = "INSERT INTO records (name,email) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $name, $email);
    if($stmt->execute()){
        echo "Data Inserted Successfully In Database.";
    } else {
        echo "Error: " . $mysqli->error;
    }
    $stmt->close();
}
$mysqli->close();
?>
