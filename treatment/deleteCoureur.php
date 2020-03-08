<?php
         require_once '../include/connectBdd.php';

$id = intval($_GET['id']);

$req = $bdd->prepare("DELETE  FROM coureurs WHERE id = " . $id);
$req->execute();
header('Location:../public/listeCoureurs.php');
?>