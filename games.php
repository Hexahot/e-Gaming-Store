<?php
session_start();
require 'config.php';
$games = query("SELECT * FROM products WHERE category = 'games'");
$i = 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Games Catalog</title>
  <link rel="stylesheet" href="resources/css/catalog.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="resources/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- NAVBAR -->
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
        <li>
        <label>
                  <input type="checkbox" class="checkbox" id="mybtn" onclick="darkmode()" title="Dark Mode">
                  <span class="check"></span>
                </label>
        </li>
      </ul>
    </nav>
  </div>

  <div class="container">
    <div class="categories">
      <div class="small-container">
        <div class="row row-2">
          <h2>Games</h2>
          <select name="Sort" id="">
            <option value="default">Default</option>
            <option value="name-asc">Name Ascending</option>
            <option value="name-dsc">Name Descending</option>
            <option value="price-asc">Price Ascending</option>
            <option value="price-dsc">Price Descending</option>
          </select>
        </div>

        <div class="row">
          <?php foreach($games as $game):?>
            <div class="col-4" role="button" onclick="redirectTo(<?= $game['id'] ?>)">
              <img src="resources/img/<?= $game['photo'] ?>">
              <h4><?= substr($game['name'], 0, 26) ?></h4>
              <p><?= number_format($game['price'],2, ',', '.') ?> MAD</p>
            </div>
          <?php endforeach ?>
        </div>

        <div class="pagination">
          <a href="#">&laquo;</a>
          <a class="active" href="#">1</a>
          <a href="#">2</a>
          <a href="#">3</a>
          <a href="#">4</a>
          <a href="#">5</a>
          <a href="#">6</a>
          <a href="#">&raquo;</a>
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
        <li><a href="#"  target="_blank"><i class="fa fa-github text-white"></i></a></li>
      </ul>
    </div>
    <div class="footer-bottom">
      <p>Copyright &copy; 2024 ABA</p>
    </div>
  </footer>


  <script src="resources/js/index.js"></script>
  <script>
    const redirectTo = (id) => {
      document.location.href = 'detailpage.php?id=' + id;
    };
  </script>
</body>

</html>