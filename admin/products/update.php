<?php
  session_start();
  if (!isset($_SESSION["loginAdmin"])) {
    header('Location: auth.php');
    exit;
  }
  require '../../config.php';
  $id = $_GET["id"];
  $product = query("SELECT * FROM products WHERE id = $id")[0];
  if (isset($_POST["submitupdate"])) {
    if (updateProduct($_POST) > 0) echo "<script> alert('Données mises à jour avec succès.'); document.location.href = 'index.php'; </script>";
    else {
      $feedback = "Échec de la mise à jour des données";
      echo mysqli_error($db);
    }
  }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <title>Mettre à Jour le Profil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="../../resources/css/userpanel.css">
</head>

<body>
  <div class="container-half">
    <div class="edit">
      <form method="POST" enctype="multipart/form-data">
          <fieldset>
            <legend>Entrer les Données</legend>
              <input type="hidden" name="id" value="<?= $product['id'] ?>">
              <input type="hidden" name="samePhoto" value="<?= $product["photo"] ?>"><br>
              <input type="hidden" name="id" value="<?= $product['id'] ?>">
              <img src="../../resources/img/<?= $product["photo"] ?>" alt="Votre photo" width="100"><br>
              <input type="file" class="form-control mt-2" name="photo" placeholder="Ajouter une photo..."><br>
              
              <label class="form-label" for="name">Nom</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="<?= $product['name'] ?>" value="">

              <label class="form-label" for="price">Prix</label>
              <input type="number" class="form-control" id="price" name="price" placeholder="<?= $product['price'] ?>" value="">

              <label class="form-label" for="category">Catégorie</label>
              <select class="form-select" name="category" required>
    <option value="Jeux">Jeux</option>
    <option value="Console">Console</option>
    <option value="Accessoires">Accessoires</option>
</select>


              <!-- <label class="form-label" for="category">Catégorie</label>
              <input type="text" class="form-control" id="category" name="category" placeholder="<?= $product['category'] ?>" value=""> -->
              
              <label class="form-label" for="stock">Stock</label>
              <input type="number" class="form-control" id="stock" name="stock" placeholder="<?= $product["stock"] ?>" value="">
              
              <label class="form-label" for="descriptions">Descriptions</label>
              <textarea rows="4"  class="form-control" id="descriptions" name="descriptions" placeholder="<?= $product['descriptions'] ?>"></textarea>
          </fieldset>
          <button type="submit" name="submitupdate" class="button-submit">Soumettre</button>
      </form>
    </div>
  <script src="../../resources//js/login.js"></script>
</body>
</html>
