<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
table, th, td {
border: 1px solid black;
border-collapse: collapse;
padding: 5px;
}
body{
    background-color: var(--seashell);
    color: var(--charcoal);
}
input[type="submit"]{
    border: none;
    background-color: var(--old-rose);
    color: var(--ghost-white);
    text-transform: uppercase;
    cursor: pointer;
}
input[type="submit"]:hover{
    background-color: var(--chinese-violet);
    color: var(--ghost-white);
    cursor: pointer;
}
input{
    border: none;
    padding: 7px;
}
.btn{
    border: none;
    background-color: var(--old-rose);
    color: var(--ghost-white);
    text-transform: uppercase;
    cursor: pointer;
    margin-left: 12px;
    padding: 8px;
}
.btn:hover{
    background-color: var(--chinese-violet);
    color: var(--ghost-white);
    cursor: pointer;
}
.form-group {
    position: relative;
    display: block;
    margin: 0;
    padding: 0;
}
.section {
    position: relative;
    width: 100%;
    display: block;
}
.pss{
    margin-right: 20px;
}
    </style>
</head>
<body>
    <center>
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
if (isset($_POST['update'])) {
$serial = $_POST['Serial'];
$sql = "SELECT * FROM `records` WHERE Serial=$serial";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
$row = mysqli_fetch_assoc($result);
echo "<h2>Update Record</h2>";
echo "<form method='post' action=''>";
echo "<div class='section'>";
echo "<div class='from-group'>";
echo "<input type='hidden' name='Serial' value='" . $row["Serial"] . "'>";
echo "<label for='name'>Name: </label>";
echo "<input type='text' name='signname' value='" . $row["Username"] . "'><br><br>";
echo "<label for='email'>Email: </label>";
echo "<input type='email' name='signemail' value='" . $row["Email"] . "'><br><br>";
echo "<label for='email'>Phone: </label>";
echo "<input type='tel' name='signphn' value='" . $row["Phone"] . "'><br><br>";
echo "<label for='email'>Password: </label>";
echo "<input type='password' class ='pss' name='signpass' value='" . $row["Password"] . "'><br><br>";
echo "<input type='submit' name='submit' value='Update'>";
echo "<Button name='btn' class='btn'>Display</button>";
echo "</div>";
echo "</div>";
echo "</form>";
} else {
echo "Record Not Found";
}
}
if (isset($_POST['submit'])) {
$serial = $_POST['Serial'];
$name = $_POST['signname'];
$email = $_POST['signemail'];
$phn = $_POST['signphn'];
$pass = $_POST['signpass'];
$sql = "UPDATE `records` SET Username='$name', Email='$email',Phone='$phn',Password='$pass' WHERE Serial=$serial";
if (mysqli_query($conn, $sql)) {
echo "Record Updated Successfully";
} else {
echo "Error Updating Record: " . mysqli_error($conn);
}
}
mysqli_close($conn);
if(isset($_POST['btn'])){
    header("Location: http://localhost:8080/Chapter%20Threads/Codes/DisplayTable.php");
}
?>
</center>
</body>
</html>

