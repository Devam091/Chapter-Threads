<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
<link href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<title>Records</title>
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
html{
    font-family: var(--ff-philosopher);
}
.container table{
/* border: 1px solid black; */
border-collapse: collapse;
padding: 5px;
}
.container tr{
    padding: 5px;
}
.container th{
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
    font-family: var(--ff-philosopher);
}
input[type="submit"]:hover{
    background-color: var(--chinese-violet);
    color: var(--ghost-white);
    cursor: pointer;
}
.container2 table{
    border-collapse: collapse;
    padding: 5px;
}
.container2 tr{
    padding: 5px;
}
.container2 th{
    padding: 5px;
}
</style>
</head>
<body>
    <center>
        <div class="container">
<h1>Records</h1>
<table border="1">
<tr>
<th>Serial</th>
<th>Username</th>
<th>Email</th>
<th>Phone</th>
<th colspan="2">Action</th>
</tr>
</div>
<br>
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
$sql = "SELECT * FROM `records`";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>" . $row["Serial"] . "</td>";
echo "<td>" . $row["Username"] . "</td>";
echo "<td>" . $row["Email"] . "</td>";
echo "<td>" . $row["Phone"] . "</td>";  
echo "<td>";
echo "<form method='post' action='delete.php'>";
echo "<input type='hidden' name='Serial' value='" . $row["Serial"] . "'>";
echo "<input type='submit' name='delete' value='Delete'>";
echo "</form>";
echo "</td>";
echo "<td>";
echo "<form method='post' action='update.php'>";
echo "<input type='hidden' name='Serial' value='" . $row["Serial"] . "'>";
echo "<input type='submit' name='update' value='Update'>";
echo "</form>";
echo "</td>";
echo "</tr>";
}
} else {
echo "<tr><td colspan='4'>No Records Found</td></tr>";
}
?>
</table>
</center>
<br>
<center>
    <div class="container2">
<h1>Books</h1>
<table border="1">
<tr>
<th>Book Id</th>
<th>Book Name</th>
<th>Author</th>
<th>Isbn</th>
<th colspan="2">Action</th>
</tr>
</div>
<?php
$sql1 = "SELECT * FROM `book`";
$result1 = mysqli_query($conn,$sql1);
if(mysqli_num_rows($result1) > 0){
    while($row1 = mysqli_fetch_assoc($result1)){
        echo "<tr>";
        echo "<td>" . $row1['book_id']. "</td>";
        echo "<td>" . $row1['name']. "</td>";
        echo "<td>" . $row1['author']. "</td>";
        echo "<td>" . $row1['isbn_no']. "</td>";
        echo "<td>";
        echo "<form method='post' action='delete.php'>";
        echo "<input type='hidden' name='book_id' value='" . $row1["book_id"] . "'>";
        echo "<input type='submit' name='delete' value='Delete'>";
        echo "</form>";
        echo "</td>";
        echo "<td>";
        echo "<form method='post' action='update.php'>";
        echo "<input type='hidden' name='book_id' value='" . $row1["book_id"] . "'>";
        echo "<input type='submit' name='update' value='Update'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
}
else {
    echo "<tr><td colspan='4'>No Records Found</td></tr>";
    }
mysqli_close($conn);
?>
</table>
</body>
</html>
