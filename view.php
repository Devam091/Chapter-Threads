<?php include 'Logic.php';
session_start();
// Check if 'remove' parameter is set in the URL and it's a numeric value
if (isset($_POST['remove']) && is_numeric($_POST['remove'])) {
    // Convert 'remove' parameter to an integer
    $removeIndex = (int)$_GET['remove'];

    // Remove the item at the specified index
    if (isset($_SESSION['wishlist'][$removeIndex])) {
        unset($_SESSION['wishlist'][$removeIndex]);

        // Reset array keys to prevent gaps
        $_SESSION['removed'] = array_values($_SESSION['wishlist']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist - Chapter Threads</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
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


body{
    font-family: var(--ff-philosopher);
    background-color: #F5EBE5;
    margin: 0;
    padding: 0;
}
.bt{
    background: #C27A7E;
    color: #fff;
    margin-left: 10px;
    border: 1px solid #C27A7E;      
    width: 200px;
}
.bt:hover{
    background: var(--chinese-violet);
    transition: .3s;
}
.product {
  display: flex;
  justify-content: space-around;
  align-items: flex-start;
  flex-wrap: wrap;
  margin-top: 20px;
}

.product img {
  width: 80%;
  border-radius: 10px 0px 0px 10px;
  transform: scale(1.05);
  transition: box-shadow 0.5s, transform 0.5s;
  &:hover{
    transform: scale(1);
    box-shadow: 5px 20px 30px rgba(0,0,0,0.2);
    border-radius: 10px 0px 0px 10px;
    cursor: pointer;
  }
}

.items {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 0 10px 20px 10px;
  padding: 10px;
}


.product p {
  margin-bottom: 10px;
  margin-left: 20px;
  margin-top: 20px;
}

.item{
    margin-bottom: 90px;
  float: left;
  margin-top: 100px;
  margin-left: 80px;
}
.add{
    background: #C27A7E;
    color: #fff;
    border: 1px solid #C27A7E;      
    width: 200px;
}
.add:hover{
    background: var(--chinese-violet);
    transition: .3s;
}
.book-details {
    padding: 10px;
}

.book-details p {
    margin: 0;
}
img{
  height: 320px;
}
section p{
  margin-top: 30px;
}
.bt {
  display: inline-block;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 5px;
  margin-left: 20px;
  border: none;
  background-color: hsl(357, 93%, 84%);
  &:hover{
    transform: scale(1);
    box-shadow: 5px 20px 30px rgba(0,0,0,0.2);
    transition: .3s;
    border: none;
  }
  text-transform: uppercase;
  color: hsl(20, 43%, 93%);
  font-weight: bold;
} 
.bt:hover{
  background-color: hsl(357, 37%, 62%);
}
    </style>
</head>
<body>
<header class="header" data-header class="content">
  <div class="container">
      <a href="#" class="logo">Chapter Threads</a>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="index.php" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li class="navbar-item">
            <a href="index.php #benefits" class="navbar-link" data-nav-link>Benefits</a>
          </li>
      <?php
          if(isset($_SESSION['Email'])){
         echo' <li class="navbar-item">
        <a href="discover.php" class="navbar-link" data-nav-link target="_parent">Discover</a>
        </li>';
        }
        else{
          echo' <li class="navbar-item">
          <a href="login.php" class="navbar-link" data-nav-link target="_parent">Discover</a>
          </li>';
        }
        ?>

          <li class="navbar-item">
            <a href="index.php #pricing" class="navbar-link" data-nav-link>Pricing</a>
          </li>

          <li class="navbar-item">
            <a href="index.php #contact" class="navbar-link" data-nav-link>Contact</a>
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
    <a href="Sellersign.php">As Seller</a>
  </div>
</button>';
}
?>

        </ul>
      </nav>

      <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true" class="open"></ion-icon>

        <ion-icon name="close-outline" aria-hidden="true" class="close"></ion-icon>
      </button>

    </div>
  </header>
<div class="product">
    <?php
  if (empty($wishlist)) {
    echo '<div class="center-container" style="margin-top: 240px;">';
    echo '  <p class="center-message">Your wishlist is empty.</p>';
    echo ' <button class="add"><a href="discover.php" class="center-button">Add Something</a></button>';
    echo '</div>';
} else {
    foreach ($wishlist as $index => $item) {
      echo '<form method="post">';
        echo '<div class="items" name="remove" style="margin-top: 100px;">';
        echo '  <img src="' . $item['image'] . '" alt="' . $item['title'] . '">';
        echo '  <p>' . $item['title'] . '</p>';
        echo '  <p>' . $item['price'] . '</p>';
        // Directly remove the item from the wishlist without redirecting
        echo '<button class="bt"><a href="view.php?remove=' . $index . '" class="remove-link">Remove</a></button>';
        echo '</div>';
        echo '</form>';
    }
}
    ?>
    
</div>
</body>
</html>
