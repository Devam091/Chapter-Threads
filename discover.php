<?php
// Include your database connection or any other necessary configurations here
session_start();
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 0);
include 'connect.php';

// Logic for adding items to wishlist
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['title']) && isset($_POST['image']) && isset($_POST['price'])) {
        $item = array(
            'title' => $_POST['title'],
            'image' => $_POST['image'],
            'price' => $_POST['price'],
        );

        // Add the item to the wishlist
        if (!isset($_SESSION['wishlist'])) {
            $_SESSION['wishlist'] = array();
        }
        $_SESSION['wishlist'][] = $item;
    } elseif (isset($_POST['remove']) && is_numeric($_POST['remove'])) {
        $removeIndex = (int)$_POST['remove'];

        // Remove the item at the specified index
        if (isset($_SESSION['wishlist'][$removeIndex])) {
            unset($_SESSION['wishlist'][$removeIndex]);
        }

        // Reset array keys to prevent gaps
        $_SESSION['wishlist'] = array_values($_SESSION['wishlist']);
    }
}



$sql = "SELECT * FROM wish where Email = '" . $_SESSION['Email'] . "'";
$result = mysqli_query($conn,$sql);

$sql1 = "SELECT * FROM records where Email = '" . $_SESSION['Email'] . "'";
$result1 = mysqli_query($conn,$sql1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $bname = $_POST['title'];
}

$books = array(); // Initialize an array to store book names
while ($row = mysqli_fetch_array($result)) {
  $books[] = $row['Book_Name']; // Store all book names in the array
}

// Check if the posted book title is already in the wishlist
if (in_array($bname, $books)) {
  $color = '#FF0000'; // If the book is already in the wishlist, set color to red
} else {
  $color = '#999999'; // If the book is not in the wishlist, set color to default
}

$_SESSION['title'] = $bname;
$_SESSION['Book_Name'] = $books;



echo $bname;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chapter Threads - Theads of Knowledge</title>
  <meta name="title" content="Chapter Threads - Theads of Knowledge">
  <meta name="description"
    content="Read More And Make Success The Result Of Perfection. - Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad harum quibusdam, assumenda quia explicabo.">
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="read.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="preload" as="image" href="./assets/images/hero-banner.png">
  <title>Discover</title>
  <style>
#results {
            position: absolute;
            top: 100%;
            left: 0;
            right: 100%;
            width: 1141px; /* Adjust width as needed */
            max-height: 900px;
            overflow-y: auto;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 0 0 5px 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 2;
            display: flex;
            flex-wrap: wrap;
            border: none;
        }

        #searchBar {
            width: 400px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .result-item {
          width: calc(33.33% - 20px); /* Adjust the width as needed */
          margin: 10px;
          display: inline-block;
          cursor: pointer;
        }
.book-details {
    padding: 10px;
}

.book-details p {
    margin: 0;
}
        .result-item:hover {
            background-color: #f0f0f0;
        }
        .not-found-message {
    padding: 10px;
    text-align: center;
    font-style: italic;
    color: #555;
}
img{
  height: 320px;
}
section p{
  margin-top: 30px;
}
::-webkit-scrollbar{
  width: 10px;
}
::-webkit-scrollbar-track{
  background-color: #FFFFFF;
  opacity: 20%;
}
::-webkit-scrollbar-thumb{
  background-color: #D18C7E;
  opacity: 100%;
}
::-webkit-scrollbar-thumb:hover{
  background-color: hsl(304, 14%, 46%);
}
@media (max-width: 575px) {
  #searchBar {
            width: 150px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding-left: 20px;
        }
}
@media (max-width: 768px) {
  #searchBar {
            width: 200px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding-left: 20px;
        }
}
  </style>
</head>
<body>
  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">Chapter Threads</a>
      <div class="search-wrapper">
            <!-- <i class="fas fa-search" style="cursor: pointer; margin-right: 150px;"></i> -->
            <input type="text" id="searchBar" placeholder="Search Book Name..." style="widht: 400px;">
            <div id="results"></div>
        </div>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="index.php" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li class="navbar-item">
            <a href="#contact" class="navbar-link" data-nav-link>Contact</a>
          </li>
          <?php
if(isset($_SESSION['Email']))
{
  echo '<li class="navbar-item">
  <a href="Logout.php" class="navbar-link" data-nav-link>Log Out</a>
</li>';
}
else{
  echo'<button class="navbar-link dropdown">
  Sign Up
  <i class="fa fa-caret-down"></i>
  <div class="dropdown-content">
    <a href="Login.php">Log-In</a>
    <a href="Sign-In.php">Sign up</a>
  </div>
</button>';
}
?>
          <button class="navbar-link dropdown">
            Genre
            <i class="fa fa-caret-down"></i>
            <div class="dropdown-content scrollable-menu">
              <a href="discover(Sci-fi).php">Sci-Fi</a>
              <a href="discover(Fantasy).php">Fantasy</a>
              <a href="discover(bio).php">Biography</a>
              <a href="discover(Horror).php">Horror</a>
              <a href="discover(Romance).php">Romance</a>
            </div>
          </button>
        </ul>
      </nav>

      <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true" class="open"></ion-icon>

        <ion-icon name="close-outline" aria-hidden="true" class="close"></ion-icon>
      </button>
    </div>
  </header>
  <center>
    <br>
    </section>
    <section class="featured-products">
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Autob/Steve Jobs.png" alt="Product 1"></a> 
        <p>Free</p>
        <a href="book1.php"><button class="bt" name="buttons">Read Now</button></a>
        <br>
        <button class="add-to-cart" onclick="toggleWishlist('button1')"style="border: none; background: none; padding: 0;">
          <i id="button1" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Romance/Mademoiselle-At-Arms.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="" method="post">
        <input type="hidden" name="title" value="Mademoiselle At Arms"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Romance/Mademoiselle-At-Arms.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button type="submit" class="add-to-cart" onclick="toggleWishlist('button2')"style="border: none; background: none; padding: 0;">
          <i id="button2" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Fantasy/Book-of-Shadows.png" alt="Product 1"></a>
        <p>Free</p>
        <a href=""><button class="bt">Read Now</button></a>
        <br>
        <form action="" method="post">
        <input type="hidden" name="title" value="Book of Shadows"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/Book-of-Shadows.png"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button type="submit" class="add-to-cart" style="border: none; background: none; padding: 0;">
        <i id="button3" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
       </button>
</form>
      </div>
 <div class="product" id="Books">
    <a href="Hp_p7.php"><img src="./Bookimg/Fantasy/Harry Potter And The Deathly Hallows.png" alt="Product 1"></a>
    <p>Free</p>
    <a href="Hp_p7.php"><button class="bt">Read Now</button></a>
    <br>
    <?php
        // Check if the item is already in the wishlist
        $itemFound = false;
        if(isset($_SESSION['wishlist'])) {
            foreach($_SESSION['wishlist'] as $item) {
                if($item['title'] === "Harry Potter and The Deathly Hallows") {
                    $itemFound = true;
                    break;
                }
            }
        }
        if($itemFound) {
            // If the item is in the wishlist, show the remove button
            echo '<form action="discover.php" method="post">';
            echo '<input type="hidden" name="remove" value="0">';
            echo '<button type="submit" class="remove" style="border: none; background: none; padding: 0; color: red;">';
            echo '<i class="fas fa-times-circle" title="Remove">&nbsp;Remove</i>';
            echo '</button>';
            echo '</form>';
            }
            elseif($_SESSION['removed']){
              echo '<form action="discover.php" method="post">';
              echo '<input type="hidden" name="title" value="Harry Potter and The Deathly Hallows"> <!-- Replace with the actual title -->';
              echo '<input type="hidden" name="image" value="./Bookimg/Fantasy/Harry Potter And The Deathly Hallows.png"> <!-- Replace with the actual image path -->';
              echo '<input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->';
              echo '<button type="submit" class="add-to-cart" onclick="alert(\'Item added to cart!\')" style="border: none; background: none; padding: 0; color: <?php echo $color;?>">';
              echo '<i id="button3" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>';
              echo '</button>';
              echo '</form>';
            }
        else{
          echo '<form action="view.php" method="post">';
          echo '<input type="hidden" name="title" value="Harry Potter and The Deathly Hallows"> <!-- Replace with the actual title -->';
          echo '<input type="hidden" name="image" value="./Bookimg/Fantasy/Harry Potter And The Deathly Hallows.png"> <!-- Replace with the actual image path -->';
          echo '<input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->';
          echo '<button type="submit" class="add-to-cart" onclick="alert(\'Item added to cart!\')" style="border: none; background: none; padding: 0; color: <?php echo $color;?>">';
          echo '<i id="button3" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>';
          echo '</button>';
          echo '</form>';
        }
    ?>
</div>
      <div class="product" id="Books">
        <a href="Priznor.php"><img src="./Bookimg/Horror/The-Yellow-Wallpaper.jpg" alt="Product 1"></a>
        <p>Free</p>
        <a href="Priznor.php"><button class="bt">Read Now</button></a>
        <br>
        <form action="wishlist.php" method="post" target="_blank">
        <input type="hidden" name="title" value="The Yellow Wallpapaer"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Horror/The-Yellow-Wallpaper.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button5')"style="border: none; background: none; padding: 0;">
          <i id="button5" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>

      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Sci/Dune.jpg" alt="Product 1"></a>
        <p>Free</p>
        <a href=""><button class="bt">Read Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Dune"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Sci/Dune.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button6')"style="border: none; background: none; padding: 0;">
          <i id="button6" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Sci/Paul of Dune.jpg" alt="Product 1"></a>
        <p>Free</p>
        <a href=""><button class="bt">Read Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Paul of Dune"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Sci/Paul of Dune.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button7')"style="border: none; background: none; padding: 0;">
          <i id="button7" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Autob/Wings of fire.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Wings of Fire"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Autob/Wings of fire.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button8')"style="border: none; background: none; padding: 0;">
          <i id="button8" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Fantasy/The-Arabian-Nights.png" alt="Product 1"></a>
        <p>Free</p>
        <a href=""><button class="bt">Read Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="The Arabian Nights"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/The-Arabian-Nights.png"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button9')"style="border: none; background: none; padding: 0;">
          <i id="button9" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Horror/Dracula.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Dracula"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Horror/Dracula.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button10')"style="border: none; background: none; padding: 0;">
          <i id="button10" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Romance/The phantom of the opera.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="The Phantom of The Opera"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Romance/The phantom of the opera.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button11')"style="border: none; background: none; padding: 0;">
          <i id="button11" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="Hp_4.php"><img src="./Bookimg/Fantasy/Harry Potter And The Goblet of Fire.png" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Harry Potter And The Goblet of Fire"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/Harry Potter And The Goblet of Fire.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button12')"style="border: none; background: none; padding: 0;">
          <i id="button12" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Sci/Children of Dune.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Children of Dune"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Sci/Children of Dune.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button13')"style="border: none; background: none; padding: 0;">
          <i id="button13" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Autob/I am Malala.png" alt="Product 1"></a>
        <p>Free</p>
        <a href=""><button class="bt">Read Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="I am Malala"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Autob/I am Malala.png"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button14')"style="border: none; background: none; padding: 0;">
          <i id="button14" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Romance/emma.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Emma"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Romance/emma.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button15')"style="border: none; background: none; padding: 0;">
          <i id="button15" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="Hp_p5.php"><img src="./Bookimg/Fantasy/Harry Potter And The Order of The Phoenix.png" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Harry Potter And The Order of The Phoenix"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/Harry Potter And The Order of The Phoenix.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button16')"style="border: none; background: none; padding: 0;">
          <i id="button16" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Horror/The-Shadow-Over-Innsmouth.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="The Shadow Over Innsmouth"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Horror/The-Shadow-Over-Innsmouth.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button17')"style="border: none; background: none; padding: 0;">
          <i id="button17" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Romance/Romeo and Juliet.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Romeo and Juliet"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Romance/Romeo and Juliet.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button18')"style="border: none; background: none; padding: 0;">
          <i id="button18" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Horror/Collected-Works-of-Poe.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Collected Works of Poe"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Horror/Collected-Works-of-Poe.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button19')"style="border: none; background: none; padding: 0;">
          <i id="button19" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button> 
</form>
      </div>
      <div class="product" id="Books">
        <a href="Hp_p.php"><img src="./Bookimg/Fantasy/Harry Potter And The Sorcerers Stone.png" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Harry Potter And The Socrcerers Stone"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/Harry Potter And The Sorcerers Stone.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button20')"style="border: none; background: none; padding: 0;">
          <i id="button20" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Autob/The Diary of a Young Girl.jpg" alt="Product 1"></a>
        <p>Free</p>
        <a href=""><button class="bt">Read Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="The Diary of a Young Girl"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Autob/The Diary of a Young Girl.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button21')"style="border: none; background: none; padding: 0;">
          <i id="button21" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Romance/Persuasion.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Persuasion"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Romance/Persuasion.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button22')"style="border: none; background: none; padding: 0;">
          <i id="button22" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Autob/The story of my experiments with truth.jpg" alt="Product 1"></a>
        <p>Free</p>
        <a href=""><button class="bt">Read Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="The Story of My Experiments with Truth"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Autob/The story of my experiments with truth.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button23')"style="border: none; background: none; padding: 0;">
          <i id="button23" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Sci/God Emperor of Dune.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="God Emperor of Dune"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Sci/God Emperor of Dune.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button24')"style="border: none; background: none; padding: 0;">
          <i id="button24" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Romance/healing-her-heart.jpg" alt="Product 1"></a>
        <p>Free</p>
        <a href=""><button class="bt">Read Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Healing Her Heart"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Romance/healing-her-heart.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button25')"style="border: none; background: none; padding: 0;">
          <i id="button25" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Fantasy/The-Time-Machine.png" alt="Product 1"></a>
        <p>Free</p>
        <a href=""><button class="bt">Read Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="The Time Machine"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/The-Time-Machine.png"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button26')"style="border: none; background: none; padding: 0;">
          <i id="button26" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Autob/American prometheus.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="American Prometheus"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Autob/American prometheus.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button27')"style="border: none; background: none; padding: 0;">
          <i id="button27" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Horror/The-Best-Ghost-Stories.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="The Best Ghost Stories"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Horror/The-Best-Ghost-Stories.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button28')"style="border: none; background: none; padding: 0;">
          <i id="button28" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Autob/the rase of my life.jpg" alt="Product 1"></a>
        <p>Free</p>
        <a href=""><button class="bt">Read Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="The Race of My Life"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Autob/the rase of my life.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button29')"style="border: none; background: none; padding: 0;">
          <i id="button29" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Romance/Sense and sensibility.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Sense and Sensibility"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Romance/Sense and sensibility.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button30')"style="border: none; background: none; padding: 0;">
          <i id="button30" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="Hp_p2.php"><img src="./Bookimg/Fantasy/Harry Potter And The Chamber Of Secrets.png" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Harry Potter And The Chamber of Secrets"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/Harry Potter And The Chamber Of Secrets.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button31')"style="border: none; background: none; padding: 0;">
          <i id="button31" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Autob/Playing It My Way.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Playing It My Way"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Autob/Playing It My Way.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button32')"style="border: none; background: none; padding: 0;">
          <i id="button32" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Horror/Color-Out-of-Space.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Color Out of Space"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Horror/Color-Out-of-Space.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button33')"style="border: none; background: none; padding: 0;">
          <i id="button33" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Romance/The Upas Tree.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="The Upas Tree"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Romance/The Upas Tree.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button34')"style="border: none; background: none; padding: 0;">
          <i id="button34" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="Hp_p3.php"><img src="./Bookimg/Fantasy/Harry Potter And The Prisoner of Azkaban.png" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Harry Potter And The Priznor of Azkaban"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/Harry Potter And The Priznor of Azkaban.png"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button35')"style="border: none; background: none; padding: 0;">
          <i id="button35" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Autob/My Brief History.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="My Brief History"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Autob/My Brief History.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button36')"style="border: none; background: none; padding: 0;">
          <i id="button36" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Horror/clarimonde.jpg" alt="Product 1"></a>
        <p>Free</p>
        <a href=""><button class="bt">Read Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Clarimonde"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Horror/clarimonde.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button37')"style="border: none; background: none; padding: 0;">
          <i id="button37" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Romance/The-Demon-Girl.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="The Demon Girl"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Romance/The-Demon-Girl.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button38')"style="border: none; background: none; padding: 0;">
          <i id="button38" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Sci/House Harkonnen.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="House Harkonnen"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Sci/House Harkonnen.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button39')"style="border: none; background: none; padding: 0;">
          <i id="button39" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Horror/The-Dunwich-Horror.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="The Dunwich Horror"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Horror/The-Dunwich-Horror.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button40')"style="border: none; background: none; padding: 0;">
          <i id="button40" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Autob/Dreams From My Father.jpg" alt="Product 1"></a>
        <p>Free</p>
        <a href=""><button class="bt">Read Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Dreams From My Father"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Autob/Dreams From My Father.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button41')"style="border: none; background: none; padding: 0;">
          <i id="button41" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Horror/at-the-mountains-of-madness.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="At The Mountains of Madness"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Horror/at-the-mountains-of-madness.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button42')"style="border: none; background: none; padding: 0;">
          <i id="button42" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Romance/little-women.jpg" alt="Product 1"></a>
        <p>Free</p>
        <a href=""><button class="bt">Read Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Little Women"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Romance/little-women.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button43')"style="border: none; background: none; padding: 0;">
          <i id="button43" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Sci/Heretics of Dune.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Heretics of Dune"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Sci/Heretics of Dune.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button44')"style="border: none; background: none; padding: 0;">
          <i id="button44" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Sci/Dune Messiah.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Dune Messiah"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Sci/Dune Messiah.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button45')"style="border: none; background: none; padding: 0;">
          <i id="button45" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Sci/House Atreides.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="House Atreides"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Sci/House Atreides.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button46')"style="border: none; background: none; padding: 0;">
          <i id="button46" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Sci/House Corrino.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="House Corrino"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Sci/House Corrino.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button47')"style="border: none; background: none; padding: 0;">
          <i id="button47" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Sci/The Butlerian Jihad.jpg" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="The Butlerian Jihad"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Sci/The Butlerian Jihad.jpg"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button48')"style="border: none; background: none; padding: 0;">
          <i id="button48" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>  
      <br><br>
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Fantasy/Harry Potter And The Half-Blood Prince.png" alt="Product 1"></a>
        <p>&#x20B9;325</p>
        <a href="Payment.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Harry Potter And The Half-Blood Prince"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/Harry Potter And The Half-Blood Prince.png"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="&#x20B9;325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button48')"style="border: none; background: none; padding: 0;">
          <i id="button48" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>  
    </section>
  </center> 
  <br>
  <section class="section contact" id="contact" aria-label="contact">
    <div class="container">

      <p class="section-subtitle">Contact</p>

      <h2 class="h2 section-title has-underline">
        Write me anything
        <span class="span has-before"></span>
      </h2>

      <div class="wrapper">

        <form action="" class="contact-form">

          <input type="text" name="name" placeholder="Your Name" required class="input-field">

          <input type="email" name="email_address" placeholder="Your Email" required class="input-field">

          <input type="text" name="subject" placeholder="Subject" required class="input-field">

          <textarea name="message" placeholder="Your Message" class="input-field"></textarea>

          <button type="submit" class="btn btn-primary">Send Now</button>

        </form>

        <ul class="contact-card">

          <li>
            <p class="card-title">Address:</p>

            <address class="address">
              16, Abcxy <br>
              Abcxyz, India 999000
            </address>
          </li>

          <li>
            <p class="card-title">Phone:</p>

            <a href="tel:1234567890" class="card-link">123 456 7890</a>
          </li>

          <li>
            <p class="card-title">Email:</p>

            <a href="mailto:ChapterThreads@gmail.com<" class="card-link">chapterthreads@gmail.com</a>
          </li>

          <li>
            <p class="social-list-title h3">Connect book socials</p>

            <ul class="social-list">

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li>
                    <a href="#" class="social-link" style="padding-bottom: 0px; padding-top: 0px; height: 41px;">
                    <!-- <ion-icon name="logo-twitter"></ion-icon> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
  <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
</svg>
                    </a>
                  </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-youtube"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-whatsapp"></ion-icon>
                </a>
              </li>

            </ul>
          </li>

        </ul>

      </div>

    </div>
  </section>
  <script>




// function toggleWishlist(buttonId) {
//     var icon = document.getElementById(buttonId);
//     icon.classList.toggle("clicked");

//     // Construct the URL with color information and wishlist.php
//     var color = icon.classList.contains("clicked") ? '#FF1493' : '#999999';
//     var url = 'wishlist.php?color=' + encodeURIComponent(color);

//     // Open the URL in a new tab
//     window.open('wishlist.php', '_blank');

//     // Update local storage (optional)
//     localStorage.setItem('cartButtonColor', color);
// }




// Function to toggle wishlist and handle color
function toggleWishlist(buttonId) {
    var icon = document.getElementById(buttonId);
    icon.classList.toggle("clicked");

    var wishlistButton = document.querySelector('.add-to-cart');

    if (icon.classList.contains("clicked")) {
        alert("Item added to cart!");
        wishlistButton.style.color = '#FF1493';
        localStorage.setItem('cartButtonColor', '#FF1493');
        console.log("COLOR IS ADDED !");
    } else {
        wishlistButton.style.color = '#999999'; 
        localStorage.removeItem('cartButtonColor');
    }
}
  </script>
  <script src="./assets/js/script.js" defer></script>
  <script src="./assets/js/search.js" defer></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
    var savedColor = localStorage.getItem('cartButtonColor');
    if (savedColor) {
        document.querySelector('.add-to-cart').style.color = savedColor;
        console.log("IT IS WORKING");
    }
});
  </script>
</body>
</html>