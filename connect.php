<?php
$servername = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'chapterthreads';
    $conn = mysqli_connect($servername, $username, $password, $db_name);
    if (!$conn){
        ?>
            <script>alert("Connection Unsuccessful!!!");</script>
        <?php
    }
?>