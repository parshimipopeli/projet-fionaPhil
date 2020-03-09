<?php
require_once'../include/connectBdd.php';
require_once'../include/header.php';


$id = intval($_GET['id']);
$reponse = $bdd->prepare('SELECT * From coureurs WHERE id = ' . $id);
$reponse->execute();
$donnees = $reponse->fetch();





if (isset($_POST['update'])) {

 $id = intval($_GET['id']);

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $mail = $_POST['email'];
    $pwd = $_POST['password'];
    $streetNumber = $_POST['streetNumber'];
    $street = $_POST['streetName'];
    $city = $_POST['city'];
    $postalCode = $_POST['postalCode'];
    $birthday = $_POST['birthdayDate'];
    


$requete = $bdd->prepare("UPDATE coureurs SET name = '$name', surname = '$surname', email = '$mail', streetNumber = '$streetNumber', streetName = '$street', postalCode = '$postalCode', city = '$city', birthdayDate = '$birthday' WhERE id =". $id);
    $requete->execute();
    header("Location:../public/listeCoureurs.php");
}