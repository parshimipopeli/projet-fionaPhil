<?php
require_once'../include/connectBdd.php';
require_once'../include/header.php';


$id = ($_GET['id']);
$reponse = $bdd->query('SELECT * FROM coureurs WHERE id = ' . $id);
$donnees = $reponse->fetch();




if (isset($_POST['update'])) {

// $id = ($_GET['id']);

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
                    <input type="text" value="<?= $donnees['surname'] ?>"" class="form-control" id="surname" name="surname" placeholder="Prénom">
                </div>
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="email" value="<?= $donnees['email'] ?>"" class="form-control" id="mail" name="email" aria-describedby="emailHelp" placeholder="Email">
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
                        <input type="text" value="<?= $donnees['street'] ?>" class="form-control" id="streetName" name="streetName" placeholder="Nom de Rue">
                    </div>
                </div>
                <div class="form-group">
                    <label for="postal_code">Code Postal</label>
                    <input type="text" value="<?= $donnees['postalCode'] ?>" class="form-control" id="postalCode" name="postalCode" placeholder="Code Postal">
                </div>
                <div class="form-group">
                    <label for="city">Ville</label>
                    <input type="text" value="<?= $donnees['city'] ?>"class="form-control" id="city" name="city" placeholder="Ville">
                </div>
                <div class="form-group">
                    <label for="city">Date de naissance</label>
                    <input type="date" value="<?= $donnees['birthdayDate'] ?>" class="form-control" id="city" name="birthdayDate" placeholder="Date de naissance">
                </div>

            </div>
        </div>
        <div class=" mx-2 d-flex justify-content-end">

            <button id="btnInscription" name="update" type="submit" class="btn text-dark font-weight-bold mb-5">Modifier</button>
        </div>
    </form>

</div>

