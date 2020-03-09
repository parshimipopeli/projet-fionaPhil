<?php
require_once '../include/connectBdd.php';
$warning = '';
if (isset($_POST['submit'])) {
    $warning = "";
    $succes = "";
    $email = htmlspecialchars($_POST['email']);
    // var_dump($_POST);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $warning = "Désolé, l'email n'est pas valide ! ";
    } else {
        $mdp = htmlspecialchars($_POST['mdp']);
        $result = $bdd->query("SELECT * FROM coureurs WHERE email = '$email'");
        var_dump($_POST);
    }
    if ($result->rowCount() == 0) {
        $warning = "Email, non trouvé.";
    }
        // var_dump($warning);
//     } else {
//         $donnees = $result->fetch();
//         $hash = $donnees['mdp'];
//         if (!password_verify($mdp, $hash)) {
//             $warning = 'Le mot de passe est invalide !';
//         } else {
//             $_SESSION['email'] = $donnees['email'];
//             $_SESSION['id_type_user'] = $donnees['id_type_user'];
//             $succes = "bienvenue";
//             $req = $bdd->query("SELECT libelle FROM type_user Where id=" . $_SESSION['id_type_user']);
//             $donnees = $req->fetch();
//             $succes = $donnees['libelle'];
//             $_SESSION['libelle'] = $donnees['libelle'];
//         }
//     }
// }
// if ($warning !== "") {
//     header("location: ../public/login.php");
// } else {
//     header('location:../index.php');
}
