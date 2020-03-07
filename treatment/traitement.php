<?php
require_once '../include/connectBdd.php';

if (isset($_POST['registration'])) {

    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $mail = htmlspecialchars($_POST['email']);
    $pwd = htmlspecialchars($_POST['password']);
    $streetNumber = htmlspecialchars($_POST['streetNumber']);
    $street = htmlspecialchars($_POST['streetName']);
    $city = htmlspecialchars($_POST['city']);
    $postalCode = htmlspecialchars($_POST['postalCode']);
    $birthday = htmlspecialchars($_POST['birthdayDate']);
    

   $pwd = password_hash($_POST['password'] , PASSWORD_DEFAULT);
            $req = $bdd->prepare("INSERT INTO coureurs  (name, surname, email, password, streetNumber, street, city, postalCode, birthdayDate,role) VALUES ('$name', '$surname', '$mail', '$pwd', '$streetNumber', '$street', '$city', '$postalCode', '$birthday','')");
            $req->execute();
            var_dump($req);
    }


header('LOcation:../index.php');
