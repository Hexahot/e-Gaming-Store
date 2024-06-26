<?php
session_start();
require '../../config.php';
if (!isset($_SESSION["loginAdmin"])) {
  header('Location: ../../auth.php');
  exit;
}
$histories = query("
    SELECT 
        products.name, 
        history.*, 
        users.fullname 
    FROM 
        users 
    JOIN 
        history ON users.id = history.id_user 
    LEFT JOIN 
        products ON products.id = history.id_product
");
$i = 1;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../resources/css/userpanel.css">
  <!-- Lien CDN Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <title>Panel Utilisateur</title>
</head>

<body>
  <div class="row">
    <div class="col-md-2">
      <div class="sidebar">
        <a class='main'>
          <h5>Panel d'Administration</h5>
        </a>
        <a href="../../index.php">Accueil</a>
        <a href="../users/">Panel Utilisateur</a>
        <a href="../products/">Panel Produit</a>
        <a href class="active">Panel d'Histoire</a>
        <a href="../../logout.php">Déconnexion</a>
      </div>
    </div>
    <div class="col-md-10">
      <!-- Contenu de la page -->
      <div class="content">
        <section>
          <!-- Pour la démonstration -->
          <div class="wrap">
            <h5>Tableau de l'Histoire</h5>
          </div>
          <div class="container-fluid">
            <table id="dtBasicExample" class="table table-hover" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nom de l'Acheteur</th>
                  <th>Nom du Produit</th>
                  <th>Date</th>
                  <th>Prix Total</th>
                  <th>Statut</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($histories as $history) : ?>
                  <tr>
                    <td>Utilisateur_<?= $history['id_user']  ?></td>
                    <td><?= $history['fullname'] ?></td>
                    <td><?= substr($history['name'], 0, 50) ?></td>
                    <td><?= $history['date'] ?></td>
                    <td><?= $history['total_price'] ?></td>
                    <td><?= $history['status'] ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </section>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="../../resources/js/jquery.dataTables.min.js"></script>
  <script src="../../resources/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#dtBasicExample').DataTable();
    });
  </script>

</body>
</html>
