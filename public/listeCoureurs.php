<?php
require_once'../include/connectBdd.php';
require_once'../include/header.php';

$liste = $bdd->query('SELECT * FROM coureurs');
$liste->execute();

?>

<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4"></h3>
    <div class="card-body">
        <div id="table-contact" class="table-editable">
            <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
            <table id="table-contact" class="table table-bordered table-responsive-md table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Prenom</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">n°</th>
                        <th class="text-center">rue</th>
                        <th class="text-center">ville</th>
                        <th class="text-center">code postal</th>
                        <th class="text-center">date de naissance</th>




                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($listes = $liste->fetch()) {
                        ?>
                    <tr>
                        <td class="pt-3-half" contenteditable="true"><?= $listes['name'] ?></td>
                        <td class="pt-3-half" contenteditable="true"><?= $listes['surname'] ?></td>
                        <td class="pt-3-half" contenteditable="true"><?= $listes['email'] ?></td>
                        <td class="pt-3-half" contenteditable="true"><?= $listes['streetNumber'] ?></td>
                        <td class="pt-3-half" contenteditable="true"><?= $listes['street'] ?></td>
                        <td class="pt-3-half" contenteditable="true"><?= $listes['city'] ?></td>
                        <td class="pt-3-half" contenteditable="true"><?= $listes['postalCode'] ?></td>
                        <td class="pt-3-half" contenteditable="true"><?= $listes['birthdayDate'] ?></td>


                        
                        <td>
                <button name="delete" data-id="<?= $donnees['id'] ?>" value="delete" name="delete" class="btn btn-danger delete">
                    Supprimer
                </button>
                <button name="update" data-id="<?= $donnees['id'] ?>" value="update" name="update" class="btn btn-success delete">
                    Modifier
                </button>
            </td>
            <input type="hidden" name="id" id="idDelete" value="">
            <input type="hidden" name="action-delete" id="action-delete" value="delete_contacts">
                        
                        <?php
                        }

                       
?>
                        
                </tbody>
            </table>
        </div>


        <?php
         $id =($_GET['id']);
         if(isset($_POST["delete"])) {
         
         $req = $bdd->prepare("DELETE  FROM coureurs WHERE id = " . $id);
         $req->execute();
                    header('LOCATION: messages.php');
         }