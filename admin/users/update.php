<?php
session_start();
require '../../config.php';
if (!isset($_SESSION["loginAdmin"])) {
  header('Location: auth.php');
  exit;
}

$id = $_GET["id"];
$user = query("SELECT * FROM users WHERE id = $id")[0];

if (isset($_POST["submitupdate"])) {
  $data = [
    'id' => $_POST['id'],
    'fullname' => $_POST['fullname'],
    'user' => $_POST['user'],
    'newPass' => $_POST['newPass'],
    'confirmNewPass' => $_POST['confirmNewPass'],
    'oldPass' => $_POST['oldPass'],
    'email' => $_POST['email'],
    'address' => $_POST['address'],
    'photo' => $_FILES['photo']['name'] // assuming 'photo' is the name of the file input
  ];

  // Handle file upload
  $targetDir = "../../resources/img/";
  $targetFile = $targetDir . basename($_FILES["photo"]["name"]);
  move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);

  if (updateUser($data) > 0) {
    echo "<script> alert('Données mises à jour avec succès.'); document.location.href = 'index.php'; </script>";
  } else {
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
  <title>Mettre à jour le profil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="../../resources/css/userpanel.css">
</head>

<body>
  <div class="container-half">
    <div class="edit">
      <form method="POST" enctype="multipart/form-data">
        <fieldset>
          <legend>Modifier le profil</legend>
          <input type="hidden" name="id" value="<?= $user['id'] ?>">
          <input type="hidden" name="samePhoto" value="<?= $user["photo"] ?>"><br>
          <img src="../../resources/img/<?= $user["photo"] ?>" alt="Votre photo" width="100">
          <input type="file" class="form-control mb-3" name="photo" placeholder="Ajouter une photo...">

          <label class="form-label" for="fullname">Nom complet</label>
          <input type="text" class="form-control" id="fullname" name="fullname" placeholder="<?= $user["fullname"] ?>"
            value="">

          <label class="form-label" for="username">Nom d'utilisateur</label>
          <input type="text" class="form-control" id="username" name="user" placeholder="<?= $user["username"] ?>"
            value="">

          <label class="form-label" for="newPass">Nouveau mot de passe : (Ignorer si vous ne changez pas de mot de passe)</label>
          <input type="password" class="form-control" id="newPass" name="newPass" placeholder="Mot de passe">

          <label class="form-label" for="confirmNewPass">Confirmer le nouveau mot de passe : (Ignorer si vous ne changez pas de mot de passe)</label>
          <input type="password" class="form-control" id="confirmNewPass" name="confirmNewPass" placeholder="Mot de passe">
          <input type="hidden" class="form-control" name="oldPass" value="<?= $user['password'] ?>">

          <label class="form-label" for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="<?= $user["email"] ?>" value="">

          <label class="form-label" for="address">Adresse</label><br>
          <textarea class="form-control" rows="4" id="address" name="address" placeholder="Adresse"><?= $user["address"] ?></textarea>
        </fieldset>
        <button type="submit" class="btn btn-primary mt-3" name="submitupdate">Soumettre</button>
      </form>
    </div>
  <script src="../../resources//js/login.js"></script>
</body>

</html>
