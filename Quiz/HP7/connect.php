<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chapter threads";

$conn = new mysqli($servername, $username, $password, $dbname);
$qcount = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection Failed: " . $conn->connect_error);
}
