<?php
  require '../../config.php';
  session_start();
  if (!isset($_SESSION['loginAdmin'])) {
    header('Location: auth.php');
    exit;
  } 

  $id = $_GET["id"];
  if (deleteUser($id) > 0):
    echo "<script> alert('Suppression des données réussie.');
          document.location.href = 'index.php';
          </script>";
  else:
    echo "<script> alert('Échec de la suppression des données.');
          document.location.href = 'index.php';
          </script>";
  endif;
?>
