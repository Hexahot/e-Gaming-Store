<?php
session_start();
require 'config.php';

$id = $_COOKIE['id'];

$query = 'SELECT * FROM users WHERE id = ' . $id;
$user = query($query)[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="resources/css/profile.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="navbar">
    <a href="index.php"><img src="./resources/assets/logo2.png" class="logo"></a>
    <nav>
      <ul id="menuList">
        <li><a href="index.php">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="catalog.php">Catalog</a></li>
        <?php
        if (isset($_SESSION["loginUser"])) {
          echo "<li><a href='payment/'>Cart</a></li>";
          echo "<li><a href='history.php'>History</a></li>";
        } else if (isset($_SESSION["loginAdmin"])) {
          echo "<li><a href='admin/products/'>Dashboard</a></li>";
        } else if (!isset($_SESSION["loginUser"]) && !isset($_SESSION["loginAdmin"])) {
          echo "<li><a href='auth.php'>Login</a></li>";
        }
        if (isset($_SESSION["loginUser"]) || isset($_SESSION["loginAdmin"])){
          echo "<li><a href='profile.php'>Profile</a></li>";
          echo "<li><a href='logout.php'>Logout</a></li>";
        }
        ?>
      
      </ul>
    </nav>
  </div>

  <div class="container">
    <div class="container-half">
        <div class="header">
            Profil
        </div>
        <!-- INFORMATIONS DE PROFIL -->
        <div class="profile-info">
            <div class="info">Nom complet : </div>
            <div class="info-fields"><?= $user['fullname'] ?></div>

            <div class="info">Photo : </div>
            <img src="resources/img/<?= $user['photo'] ?>" alt="">

            <div class="info">Nom d'utilisateur : </div>
            <div class="info-fields"><?= $user['username'] ?></div>

            <div class="info">Adresse : </div>
            <div class="info-fields"><?= $user['address'] ?></div>

            <div class="info">Email : </div>
            <div class="info-fields"><?= $user['email'] ?></div>
            <a href="editprofile.php"><button type="submit" class="button-riwayat">Modifier le profil</button></a>
            <a href="riwayat.php"><button type="submit" class="button-riwayat">Historique des achats</button></a>
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
  <script src="resources/js/index.js"></script>
</body>

</html>