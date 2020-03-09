<?php
require_once '../include/connectBdd.php';


if (isset($_POST['registration'])) {


             $req = (" INSERT INTO coureurs(name,surname,email,password,streetNumber,street,city,postalCode,birthdayDate)
                    VALUES (:name, :surname, :email, :password, :streetNumber, :street, :city, :postalCode, :birthdayDate);");

             var_dump($req);
             var_dump($_POST);
//    $password =  password_hash($_POST['password'] , PASSWORD_DEFAULT);

$sth = $bdd->prepare($req);
//La constante de type par défaut est STR
$sth->bindParam(':name', $_POST['name']);
$sth->bindParam(':surname', $_POST['surname']);
$sth->bindParam(':email', $_POST['email']);
$sth->bindParam(':password', $_POST['password']);
$sth->bindParam(':streetNumber', $_POST['streetNumber']);
$sth->bindParam(':street', $_POST['streetName']);
$sth->bindParam(':postalCode', $_POST['postalCode']);
$sth->bindParam(':city', $_POST['city']);
$sth->bindParam(':birthdayDate', $_POST['birthdayDate']);
  $result =   $sth->execute();


    echo "Entrée ajoutée dans la table";
}



//header('Location:../index.php');
