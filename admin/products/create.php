<?php
session_start();
require '../../config.php';
if (!isset($_SESSION["loginAdmin"])) {
  header('Location: auth.php');
  exit;
}
if (isset($_POST["submitCreate"])) {
  if (addProduct($_POST) > 0) {
    echo "<script> alert('Données téléchargées avec succès.'); document.location.href = 'index.php'; </script>";
  } else {
    $feedback = "Échec de la modification des données";
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Ajouter un produit</title>
  <link rel="stylesheet" href="../../resources/css/userpanel.css">
</head>

<body>
  <div class="container-half">
    <div class="edit">
      <form method="POST" enctype="multipart/form-data">
        <fieldset>
          <legend>Ajouter un produit</legend>

          <label class="form-label" for="photo">Photo</label>
          <input type="file" class="form-control" id="photo" name="photo" placeholder="Ajouter une image..." required><br>

          <label class="form-label" for="fullname">Nom complet</label>
          <input type="text" class="form-control" id="fullname" name="name" placeholder="Nom" required>

          <label class="form-label" for="price">Prix</label>
          <input type="number" class="form-control" id="price" name="price" placeholder="Prix" required>

          <label class="form-label" for="stock">Stock</label>
          <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock" required>

          <label class="form-label" for="descriptions">Descriptions</label>
          <textarea class="form-control" id="descriptions" name="descriptions" placeholder="Descriptions" required></textarea>

          <label class="form-label" for="category">Catégorie</label>
          <select class="form-select" id="category" name="category" required>
            <option value="Jeux">Jeux</option>
            <option value="Console">Console</option>
            <option value="Accessoires">Accessoires</option>
          </select>
        </fieldset>
        <button type="submit" name="submitCreate" class="btn btn-primary">Soumettre</button>
      </form>
    </div>
    <script src="../../resources//js/login.js"></script>
  </div>
</body>

</html>
