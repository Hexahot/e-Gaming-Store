<?php
session_start();
require 'config.php';

$consoles = query("SELECT * FROM products WHERE category = 'Console'");
$consoles = array_slice($consoles, 0, 3);
$games = query("SELECT * FROM products WHERE category = 'Games'");
$games = array_slice($games, 0, 4);
$accessories = query("SELECT * FROM products WHERE category = 'Accessories'");
$accessories = array_slice($accessories, 0, 6);
$i = 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catalog Page</title>
  <link rel="stylesheet" href="resources/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="resources/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <!-- NAVBAR -->
    <div class="container fixed-top py-3">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a href="index.php"><img src="./resources/assets/logo2.png" width="50" class="logo img-fluid me-5"></a>
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
    </div>
    <div class="container my-5 py-5">
      <div class="small-container categories">
        <!-- FEATURED CONSOLES -->
          <h5 class="title-category" id="featured-consoles">Pc's</h5>
          <div class="row d-flex justify-content-center">
            <?php foreach ($consoles as $console) : ?>
              <div class="col-md-3 mx-3 col-sm-6 text-center" onclick="redirectTo(<?= $console['id'] ?>)">
                <img class="img-fluid h-400px" src="resources/img/<?= $console['photo'] ?>">
                <p class="fw-bold my-3"><?= substr($console['name'], 0, 46) ?>
                  <span class="d-block fw-normal"><?= number_format($console['price'], 2, ',', '.') ?> MAD</span>
                </p>
              </div>
            <?php endforeach ?>
            <div class="mb-5 mt-4 d-flex justify-content-center m-auto"><a href="console.php" class="text-center"><button class="custom-button" id="explore-cons">Explore Pc's</button></a></div>
          </div>

          <!-- FEATURED GAMES -->
          <h5 class="title-category" id="featured-games">Jeux Console</h5>
          <div class="row d-flex justify-content-center">
            <?php foreach ($games as $game) : ?>
              <div class="col-md-3 col-sm-6 text-center" role="button" onclick="redirectTo(<?= $game['id'] ?>)">
                <img class="img-fluid h-400px" src="resources/img/<?= $game['photo'] ?>">
                <p class="fw-bold my-3"><?= substr($game['name'], 0, 46) ?>
                  <span class="d-block fw-normal"><?= number_format($game['price'], 2, ',', '.') ?> MAD</span>
                </p>
              </div>
            <?php endforeach ?>
            <div class="d-flex justify-content-center m-auto mt-4 mb-5"><a href="games.php" class="text-center"><button class="custom-button" type="button" id="explore-games">Explore Games</button></a></div>
          </div>

          <!-- FEATURED ACCESSORIES -->
          <h5 class="title-category" id="featured-accesories">Consoles</h5>
          <div class="row d-flex justify-content-center">
            <?php foreach ($accessories as $accessory) : ?>
              <div class="col-md-3 col-sm-6 text-center" role="button" onclick="redirectTo(<?= $accessory['id'] ?>)">
                <img class="img-fluid h-400px" src="resources/img/<?= $accessory['photo'] ?>">
                <p class="fw-bold my-3"><?= substr($accessory['name'], 0, 46) ?>
                  <span class="d-block fw-normal"><?= number_format($accessory['price'], 2, ',', '.') ?> MAD</span>
                </p>
              </div>
            <?php endforeach ?>
            <div class="d-flex justify-content-center m-auto mt-4 mb-5"><a href="accessories.php" class="text-center"><button class="custom-button" id="explore-accs">Explore More</button></a></div>
          </div>
        </div>
      </div>

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
  <script>
    const redirectTo = (id) => {
      document.location.href = 'detailpage.php?id=' + id;
    };
  </script>
</body>

</html>