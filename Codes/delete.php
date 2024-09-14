<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'signin';
    $conn = mysqli_connect($servername, $username, $password, $db_name);
    if (!$conn){
        ?>
            <script>alert("Connection Unsuccessful!!!");</script>
        <?php
    }
if (isset($_POST['delete'])) {
$serial = $_POST['Serial'];
$sql = "DELETE FROM `records` WHERE Serial=$serial";
if (mysqli_query($conn, $sql)) {
echo "Record Deleted Successfully";
} else {
echo "Error Deleting Record: " . mysqli_error($conn);
}
}
mysqli_close($conn);
?>
