<?php 
include 'connect.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $coupons = $_POST['claimed'];
  $_SESSION['coupon'] = $coupons;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher&display=swap" rel="stylesheet">
    <title>Congratulations</title>
  </head>

  <body>
    <div class="container">
      <!-- <button class="open bnt btn-secondary">Claim Your Reward</button> -->
      <!-- modal -->
      <div class="box pricing-card">
        <div class="imgBox">
          <img src="./logo.png" alt="" />
        </div>
        <h2 class="title">Congratulations You Have Passed The Quiz & Won A Coupon! 🌟</h2>
        <!-- <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita
          voluptatum velit soluta dicta neque doloremque quaerat vitae. Harum
          maxime dolor totam voluptatum soluta, excepturi optio magni quis odio
          qui facere.
        </p> -->
        <div class="btnContainer">
          <button class="close bnt btn-secondary" onclick="shuffle()">Claim Now!</button>
        </div>
      </div>
    </div>
    <script src="./script.js"></script>
    <script>
      // const openbtn = document.querySelector(".open");
      const modal = document.querySelector('.box');
      // const closeBtn = document.querySelector('.close');
      // openbtn.addEventListener("click", () => {
        modal.classList.add('visible')
        // openbtn.classList.add('hidden');
        const startit = () => {
          setTimeout(function () {
            confetti.start();
          }, 200);
        };
        // Stops
        const stopit = () => {
          setTimeout(function () {
            confetti.stop();
          }, 5000);
        };
        // playing start
        startit();
        // stoping it
        stopit();
      // });
      var pageList = [
        "Coupon/Ajio.php",
        "Coupon/Fastrack.php",
        "Coupon/MakeMyTrip.php",
        "Coupon/Mearth.php",
        "Coupon/Myntra.php",
        "Coupon/Puma.php",
        "Coupon/Zomato.php"
      ];
      function shuffle() {
        // Shuffle the list of page filenames randomly
        pageList.sort(function () {
          return 0.5 - Math.random();
        });

        // Get the first element from the shuffled list
        var nextPage = pageList[0];

        // Navigate to the selected local webpage
        window.open(nextPage, '_blank');
      }
      // closeBtn.addEventListener('click', () => {
      //   modal.classList.remove('visible')
      //   openbtn.classList.remove('hidden');
      // })
    </script>
  </body>
  <?php 
  ?>
</html>