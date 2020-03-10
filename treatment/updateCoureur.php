<?php
require_once'../include/connectBdd.php';
require_once'../include/header.php';


$id = ($_GET['id']);
$reponse = $bdd->query('SELECT * FROM coureurs WHERE id = ' . $id);
$donnees = $reponse->fetch();




if (isset($_POST['update'])) {

 $id = ($_GET['id']);



    $req = ("UPDATE coureurs SET name = :name, surname = :surname, email = :email, streetNumber = :streetNumber, street = :street, postalCode = :postalCode, city = :city, birthdayDate = :birthday WhERE id = :id");


    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $email = htmlspecialchars($_POST['email']);
    $streetNumber = htmlspecialchars($_POST['streetNumber']);
    $street = htmlspecialchars($_POST['street']);
    $postalCode = htmlspecialchars($_POST['postalCode']);
    $city = htmlspecialchars($_POST['city']);
    $birthdayDate = htmlspecialchars($_POST['birthdayDate']);

//$sth = $bdd->prepare($req);
//    var_dump($sth);
//
////La constante de type par défaut est STR
//$sth->bindParam(':name', $_POST['name']);
//$sth->bindParam(':surname', $_POST['surname']);
//$sth->bindParam(':email', $_POST['email']);
//$sth->bindParam(':streetNumber', $_POST['streetNumber']);
//$sth->bindParam(':street', $_POST['streetName']);
//$sth->bindParam(':postalCode', $_POST['postalCode']);
//$sth->bindParam(':city', $_POST['city']);
//$sth->bindParam(':birthdayDate', $_POST['birthdayDate']);
//$result = $sth->execute();
    $result = $bdd->prepare($req);
    $result->execute([':name' => $name, ':surname' => $surname, ':email' => $email, ':streetNumber' => $streetNumber, ':street' => $street, ':postalCode' => $postalCode, ':city' => $city, ':birthday' => $birthdayDate ,':id' => $id]);
    var_dump($result->errorInfo());

    header("Location:../public/listeCoureurs.php");
}
?>
<div class="col-6 d-flex justify-content-center">
    <form id="add_user_form" action="#" method="POST" class="mx-2">
        <div class="d-md-flex">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" value="<?= $donnees['name'] ?>"class="form-control" id="name" name="name" placeholder="Nom">
                </div>
                <div class="form-group">
                    <label for="surname">Prénom</label>
                    <input type="text" value="<?= $donnees['surname'] ?>" class="form-control" id="surname" name="surname" placeholder="Prénom">
                </div>
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="email" value="<?= $donnees['email'] ?>" class="form-control" id="mail" name="email" aria-describedby="emailHelp" placeholder="Email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex">
                    <div class="form-group col-2 pl-0 pr-1">
                        <label for="street_number">N°</label>
                        <input type="text" value="<?= $donnees['streetNumber'] ?>" class="form-control" id="streetNumber" name="streetNumber" placeholder="N°">
                    </div>
                    <div class="form-group col-10 px-0">
                        <label for="street_name">Nom de Rue</label>
                        <input type="text" value="<?= $donnees['street'] ?>" class="form-control" id="streetName" name="street" placeholder="Nom de Rue">
                    </div>
                </div>
                <div class="form-group">
                    <label for="postal_code">Code Postal</label>
                    <input type="text" value="<?= $donnees['postalCode'] ?>" class="form-control" id="postalCode" name="postalCode" placeholder="Code Postal">
                </div>
                <div class="form-group">
                    <label for="city">Ville</label>
                    <input type="text" value="<?= $donnees['city'] ?>"class="form-control" id="" name="city" placeholder="Ville">
                </div>
                <div class="form-group">
                    <label for="city">Date de naissance</label>
                    <input type="date" value="<?= $donnees['birthdayDate'] ?>" class="form-control" id="" name="birthdayDate" placeholder="Date de naissance">
                </div>

            </div>
        </div>
        <div class=" mx-2 d-flex justify-content-end">

            <button id="btnInscription" name="update" type="submit" class="btn text-dark font-weight-bold mb-5">Modifier</button>
        </div>
    </form>

</div>

