<?php
  session_start();
  require '../../config.php';
  if (!isset($_SESSION["loginAdmin"])) {
    header('Location: auth.php');
    exit;
  }
  if (isset($_POST["submitCreate"])) {
    if (register($_POST) > 0) echo "<script> alert('Données mises à jour avec succès.'); document.location.href = 'index.php'; </script>";
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
  <title>Ajouter un utilisateur</title>
  <link rel="stylesheet" href="../../resources/css/userpanel.css">
</head>

<body>
  <div class="container-half">
    <div class="edit">
      <form method="POST">
          <fieldset>
            <legend>Ajouter un utilisateur</legend>
              <input type="file" name="photo" placeholder="Ajouter une photo...">
              <label for="fullname">Nom complet</label>
              <input type="text" id="fullname" name="fullname" placeholder="Nom complet">

              <label for="username">Nom d'utilisateur</label>
              <input type="text" id="username" name="username" placeholder="Nom d'utilisateur">
              
              <label for="password">Mot de passe</label>
              <input type="password" id="password" name="pass" placeholder="Mot de passe">
              
              <label for="cpass">Confirmer le mot de passe</label>
              <input type="password" id="password" name="cpass" placeholder="Mot de passe">
              
              <label for="email">E-mail</label>
              <input type="email" id="email" name="email" placeholder="E-mail">
              
              <label for="address">Adresse</label>
              <textarea rows="4"  id="address" name="address" placeholder="Adresse"></textarea>
          </fieldset>
          <button type="submit" name="submitCreate" class="button-submit">Soumettre</button>
      </form>
    </div>
  <script src="../../resources//js/login.js"></script>
</body>
</html>