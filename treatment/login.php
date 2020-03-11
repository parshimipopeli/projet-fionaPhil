<?php
require_once '../include/connectBdd.php';
$warning = '';
if (isset($_POST['login'])) {
    $email = htmlspecialchars($_POST['email']);
    // var_dump($_POST);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $warning = "Désolé, l'email n'est pas valide ! ";
    } else {
        $mdp = htmlspecialchars($_POST['password']);
        $result = $bdd->query("SELECT * FROM coureurs WHERE email = '$email'");
    }
    if ($result->rowCount() == 0) {
        $warning = "Email, non trouvé.";
    }else {
        $donnees = $result->fetch();
        $hash = $donnees['password'];
        if (!password_verify($mdp, $hash)) {
            $warning = 'Le mot de passe est invalide !';
        } else {
            $_SESSION['email'] = $donnees['email'];
            $_SESSION['id'] = $donnees['id'];
            $succes = "bienvenue";
            $req = $bdd->query("SELECT role FROM coureurs Where id=" . $_SESSION['id']);
            $donnees = $req->fetch();
            $succes = $donnees['role'];
            $_SESSION['role'] = $donnees['role'];
            var_dump($_SESSION);
        }
    }
}
if ($_SESSION['role'] == 'coureur') {
    header("location: ../index.php");
} else {
    header('location:../public/ajoutAthlete.php');
}
