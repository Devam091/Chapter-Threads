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
  <title>Sci-Fi</title>
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

  </style>
</head>
<body>
<header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">Chapter Threads</a>
      <div class="search-wrapper">
            <!-- <i class="fas fa-search" style="cursor: pointer; margin-right: 150px;"></i> -->
            <input type="text" id="searchBar" placeholder="Search Book or Author..." style="widht: 400px;">
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
              <a href="">Sci-Fi</a>
              <a href="">Fantasy</a>
              <a href="">Biography</a>
              <a href="">Horror</a>
              <a href="">Romance</a>
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
        <a href="#"><img src="./Bookimg/Sci/Children of Dune.jpg" alt="Product 1"></a> 
        <p>&#x20B9;325</p>
        <a href="book1.php"><button class="bt">Buy Now</button></a>
        <br>
        <form action="wishlist.php" method="post">
        <input type="hidden" name="title" value="Steve Jobs"> <!-- Replace with the actual title -->
        <input type="hidden" name="image" value="./Bookimg/Autob/Steve Jobs.png"> <!-- Replace with the actual image path -->
        <input type="hidden" name="price" value="Free"> <!-- Replace with the actual price -->
        <button class="add-to-cart" onclick="toggleWishlist('button1')"style="border: none; background: none; padding: 0;">
          <i id="button1" class="fas fa-heart wishlist-icon add-to-cart" title="Wishlist">&nbsp;Wishlist</i>
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

            <a href="mailto:ChapterThreads@gmail.com<" class="card-link">ChapterThreads@gmail.com</a>
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
                <a href="#" class="social-link">
                  <ion-icon name="logo-twitter"></ion-icon>
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
function toggleWishlist(buttonId) {
    var icon = document.getElementById(buttonId);
    icon.classList.toggle("clicked");

    var wishlistButton = document.querySelector('.add-to-cart');

    if (icon.classList.contains("clicked")) {
        alert("Item added to cart!");
        wishlistButton.style.color = '#FF1493';
        localStorage.setItem('cartButtonColor', '#FF1493');
    } else {
        wishlistButton.style.color = ''; // Reset color
        localStorage.removeItem('cartButtonColor');
    }
}

// On page load, retrieve the color from local storage and set it if it exists
document.addEventListener('DOMContentLoaded', function() {
    var savedColor = localStorage.getItem('cartButtonColor');
    if (savedColor) {
        document.querySelector('.add-to-cart').style.color = savedColor;
    }
});
  </script>
  <script src="./assets/js/script.js" defer></script>
  <script src="./assets/js/search.js" defer></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>