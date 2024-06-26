<?php 
session_start();
require '../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../resources/css/successpayment.css">
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <title>Document</title>
</head>

<body>
  <div class="navbar">
    <a href="index.php"><img src="../resources/assets/logo2.png" class="logo"></a>
    <nav>
      <ul id="menuList">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../aboutus.php">About Us</a></li>
        <li><a href="../catalog.php">Catalog</a></li>
        <?php
        if (isset($_SESSION["loginUser"])) {
          echo "<li><a href='../payment/'>Cart</a></li>";
          echo "<li><a href='../riwayat.php'>History</a></li>";
        } else if (isset($_SESSION["loginAdmin"])) {
          echo "<li><a href='../admin/products/'>Dashboard</a></li>";
        } else if (!isset($_SESSION["loginUser"]) && !isset($_SESSION["loginAdmin"])) {
          echo "<li><a href='../auth.php'>Login</a></li>";
        }
        if (isset($_SESSION["loginUser"]) || isset($_SESSION["loginAdmin"])) {
          echo "<li><a href='../profile.php'>Profile</a></li>";
          echo "<li><a href='../logout.php'>Logout</a></li>";
        }
        ?>
     
      </ul>
    </nav>
  </div>

  <div class="container">
    <div class="modal-box">
      <i class="fa-regular fa-circle-check"></i>
      <h2>Paiement réussi !</h2>
      <h3>
        Veuillez attendre la confirmation par e-mail de notre part et
        nous vous informerons du numéro de suivi dès que possible !
      </h3>
      <div class="buttons">
        <a href="../index.php"><button class="close-btn">Accueil</button></a>
        <a href="../catalog.php"><button>Catalogue</button></a>
      </div>
    </div>
  </div>
  <script src="../resources/js/payment.js"></script>
</body>

</html>