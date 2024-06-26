<?php
session_start();
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Playstation Game Store</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="resources/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="./resources/assets/logo.png">
</head>

<body>
  <div class="container">
    <div class="container fixed-top py-3">
      <header>
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <!-- <a  href="index.php"><img src="./resources/assets/logo.png" width="50" class="logo img-fluid me-5"></a> -->
          <a  href="index.php"><img src="./resources/assets/logo2.png" width="50" class="logo img-fluid me-5"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse ms-2" id="navbarNav">
            <ul class="navbar-nav">
              <li class='nav-item'><a href="index.php">Home</a></li>
              <li class='nav-item'><a href="aboutus.php">About Us</a></li>
              <li class='nav-item'><a href="catalog.php">Catalog</a></li>
            </ul>
            <ul class="navbar-nav position-absolute end-0"><?php
              if (isset($_SESSION["loginUser"])) {
                echo "<li class='nav-item'><a href='payment/'>Cart</a></li>";
                echo "<li class='nav-item'><a href='history.php'>History</a></li>";
                echo "<li class='nav-item'><a href='profile.php'>Profile</a></li>";
              } else if (isset($_SESSION["loginAdmin"])) {
                echo "<li class='nav-item'><a href='admin/products/'>Dashboard</a></li>";
              } else if (!isset($_SESSION["loginUser"]) && !isset($_SESSION["loginAdmin"])) {
                echo "<li class='nav-item'><a href='auth.php'>Login</a></li>";
              }
              if (isset($_SESSION["loginUser"]) || isset($_SESSION["loginAdmin"])){
                echo "<li class='nav-item'><a href='logout.php'>Logout</a></li>";
              }
              
              ?>
              <li class='nav-item'>
              <label>
                  <input type="checkbox" class="checkbox" id="mybtn" onclick="darkmode()" title="Dark Mode">
                  <span class="check"></span>
              </label>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      </header>
    </div>
    <main class="my-5 py-5 px-lg-5">
      <div class="row align-items-center">
        <div class="col-5 float-start">
          <img src="resources/img/asus-pc.png" alt="Playstation 5 Console" class="img-fluid">
        </div>
        <div class="col-7">
          <h4>Gaming Pc</h4>
          <h1>Asus ROG STRIX</h1>
          <small>Le PC Gamer ASUS ROG STRIX GT15 allie puissance, praticité et élégance au service du divertissement numérique. Facile à transporter, grâce à sa poignée intégrée, ce PC Gamer ASUS offre aussi l'avantage d'une mise à niveau simplifiée.</small>
          <br><br>
          <a href="catalog.php#featured-consoles"><button id="buynow" class="custom-button">Order Now</button></a>
        </div>
      </div>

      <div class="row align-items-center reveal">
        <div class="col-7">
          <h4>GeForce RTX 4090</h4>
          <h1>Plus Que Rapide</h1>
          <small>La carte graphique NVIDIA® GeForce RTX™ 4090 est équipée du GPU GeForce ultime. Elle fournit une avancée historique en matière de performances, d’efficacité énergétique et de graphismes optimisés par l’IA. Profitez de performances de jeu ultra-élevées, explorez des mondes virtuels incroyablement détaillés, renforcez votre productivité et expérimentez de nouvelles méthodes de création. Accélérée par l’architecture NVIDIA Ada Lovelace, cette carte graphique ultra-performante est équipée de 24 Go de mémoire G6X pour offrir l’expérience ultime aux joueurs et aux créateurs.</small>
          <br><br>
          <a href="catalog.php#featured-consoles"><button id="buynow" class="custom-button">Order Now</button></a>
        </div>
        <div class="col-5 text-end">
          <img src="resources/img/rtx-4080-2.png" alt="Playstation 4 Console" class="img-fluid">
        </div>
      </div>

      <div class="row align-items-center reveal">
        <div class="col-5">
          <img src="resources/img/ps5games.png" alt="Playstation 5 Games" class="offer-img img-fluid">
        </div>
        <div class="col-7">
          <h4>Vous avez déjà une PlayStation ?</h4>
          <h1>Découvrez les jeux</h1>
          <small>Découvrez les jeux exclusifs exceptionnels de la console, des blockbusters aux jeux indépendants innovants, tous rendus vivants grâce à la puissance de la console PS5™.</small>
          <br><br>
          <a href="catalog.php#featured-games"><button id="buynow" class="custom-button">Find Out</button></a>
        </div>
      </div>
      
      <div class="row align-items-center reveal">
        <div class="col-7">
          <h4>Besoin de plus d'outils ?</h4>
          <h1>Découvrez les accessoires</h1>
          <small>Construisez votre configuration de jeu parfaite avec des manettes, des casques et d'autres accessoires pour votre console PS5™ ou PS4™ ou PC .</small>
          <br><br>
          <a href="catalog.php#featured-accesories"><button id="buynow" class="custom-button">See More</button></a>
        </div>
        <div class="col-5 text-end">
          <img src="resources/img/accessories.png" alt="Playstation 5 Accessories" class="offer-img2 img-fluid">
        </div>
      </div>
    </main>

  </div>
  <footer class="mt-5">
    <div class="text-center">
      <h2 class="fs-3 fw-bold text-white">E-Game Store</h2>
      <p class="text-white fw-light">
        This website created by:
        <span class="d-block">Med Amine EL Azhar - Anas Laktati - Med Amine Bidah</span>
        <span class="d-block">Click Github icon below to check our repository.</span>
      </p>
      <ul class="list-unstyled my-4 fs-2 m-auto">
        <li><a href="#" target="_blank"><i class="fa fa-github text-white"></i></a></li>
      </ul>
    </div>
    <div class="footer-bottom">
      <p>Copyright &copy; 2024 ABA</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="resources/js/index.js"></script>
</body>

</html>