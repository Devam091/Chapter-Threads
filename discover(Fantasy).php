<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 0);


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
  <title>Document</title>
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
  border-radius: 5px;
  opacity: 100%;
}
::-webkit-scrollbar-thumb:hover{
  background-color: hsl(304, 14%, 46%);
}
  </style>
</head>
<body>
  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">Chapter Threads</a>
      <div class="search-wrapper">
            <!-- <i class="fas fa-search" style="cursor: pointer; margin-right: 150px;"></i> -->
            <input type="text" id="searchBar" placeholder="Search Book..." style="widht: 400px;">
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
        <a href="#"><img src="./Bookimg/Fantasy/Book-of-Shadows.png" alt="Product 1"></a>
        <p>Free</p>
        <a href=""><button class="bt">Read Now</button></a>
        <br>
        <form action="" method="post">
        <input type="hidden" name="title" value="Book of Shadows"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/Book-of-Shadows.png"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button1')"style="border: none; background: none; padding: 0;">
          <i id="button1" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</from>
      </div>
      <div class="product" id="Books">
    <a href="Hp_p7.php"><img src="./Bookimg/Fantasy/Harry Potter And The Deathly Hallows.png" alt="Product 1"></a>
    <p>Free</p>
    <button class="bt"><a href="Hp_p7.php" target="_blank">Read Now</a></button>
    <br><br>
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
        <a href="#"><img src="./Bookimg/Fantasy/The-Arabian-Nights.png" alt="Product 1"></a>
        <p>Free</p>
        <a href=""><button class="bt">Read Now</button></a>
        <br>
        <form action="" method="post">
        <input type="hidden" name="title" value="The Arabian Nights"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/The-Arabian-Nights.png"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button3')"style="border: none; background: none; padding: 0;">
          <i id="button3" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</from>
      </div>

      <div class="product" id="Books">
        <a href="Hp_4.php"><img src="./Bookimg/Fantasy/Harry Potter And The Goblet of Fire.png" alt="Product 1"></a>
        <p>Free</p>
        <a href="Hp_4.php"><button class="bt">Read Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Harry Potter And The Goblet of Fire"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/Harry Potter And The Goblet of Fire.png"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="₹325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button4')"style="border: none; background: none; padding: 0;">
          <i id="button4" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</from>
      </div>
     
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Fantasy/Harry Potter And The Order of The Phoenix.png" alt="Product 1"></a>
        <p>₹325</p>
        <a href=""><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Harry Potter And The Order of The Phoenix"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/Harry Potter And The Order of The Phoenix.png"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="₹325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button5')"style="border: none; background: none; padding: 0;">
          <i id="button5" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
     
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Fantasy/Harry Potter And The Sorcerers Stone.png" alt="Product 1"></a>
        <p>₹325</p>
        <a href=""><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Harry Potter And The Sorcerers Stone"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/Harry Potter And The Sorcerers Stone.png"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="₹325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button6')"style="border: none; background: none; padding: 0;">
          <i id="button6" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button><br><br>
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
        <button class="add-to-cart" onclick="toggleWishlist('button7')"style="border: none; background: none; padding: 0;">
          <i id="button7" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Fantasy/Harry Potter And The Chamber Of Secrets.png" alt="Product 1"></a>
        <p>₹325</p>
        <a href=""><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Harry Potter And The Chamber Of Secrets"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/Harry Potter And The Chamber Of Secrets.png"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="₹325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button8')"style="border: none; background: none; padding: 0;">
          <i id="button8" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>
      
      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Fantasy/Harry Potter And The Prisoner of Azkaban.png" alt="Product 1"></a>
        <p>₹325</p>
        <a href=""><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Harry Potter And The Priznor of Azkaban"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/Harry Potter And The Prisoner of Azkaban.png"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="₹325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button9')"style="border: none; background: none; padding: 0;">
          <i id="button9" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
      </button>
</form>
      </div>

      <div class="product" id="Books">
        <a href="#"><img src="./Bookimg/Fantasy/Harry Potter And The Half-Blood Prince.png" alt="Product 1"></a>
        <p>₹325</p>
        <a href=""><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Harry Potter And The Half Blood Prince"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Fantasy/Harry Potter And The Half Blood Prince.png"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="₹325"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button10')"style="border: none; background: none; padding: 0;">
          <i id="button10" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
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
// Function to toggle wishlist and handle color
// function toggleWishlist(buttonId) {
//     var icon = document.getElementById(buttonId);
//     icon.classList.toggle("clicked");

//     var wishlistButton = document.querySelector('.add-to-cart');

//     if (icon.classList.contains("clicked")) {
//         alert("Item added to cart!");
//         wishlistButton.style.color = '#FF1493';
//         localStorage.setItem('cartButtonColor', '#FF1493');
//     } else {
//         wishlistButton.style.color = ''; // Reset color
//         localStorage.removeItem('cartButtonColor');
//     }
// }
  </script>
  <script src="./assets/js/script.js" defer></script>
  <script src="./assets/js/search(Fantasy).js" defer></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>