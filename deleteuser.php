<?php

require_once('connection.php');
$email=$_GET['id'];

$sql="DELETE from users where EMAIL='$email'";
$result=mysqli_query($con,$sql);

echo '<script>alert("Utilisateur supprimé avec succès")</script>';
echo '<script> window.location.href = "adminusers.php";</script>';

?>