<?php
require_once'../include/connectBdd.php';
require_once'../include/header.php';
$upCoureur = $bdd->query('SELECT * FROM coureurs');
$upCoureur->execute();
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-secondary text-warning">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Modal-formulaire Modif_Question -->
                <form id="formModif" action="update_questions.php" method="post">
                    <label class="font-weight-bold" for="intitule">Intitulé :</label>
                    <input name="intitule" type="text" placeholder="Intitulé" class="form-control" id="intitule"
                            required aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"><br>
                    <label class="font-weight-bold" for="type">Type de champs:</label>
                    <select class="form-control" name="type" id="type">
                        <?php
                        while ($donnees = $upCoureur->fetch()) {
                            ?>
                            <option value='<?= $donnees['id'] ?>'> ?></option>
                            <?php
                        }
                        ?>
                    </select><br>
                    <label class="font-weight-bold" for="valeur">Question :</label>
                    <input type="hidden" id="id" name="id"/>
                    <input type="hidden" name="action" value="updateCoureur"/>
                    <input name="valeur" id="valeur" type="text" placeholder="" class="form-control"
                            required aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"><br>
                </form>

            </div>
            <div class="modal-footer">
                <button type="submit" id="subpost" value="Envoyer" class="btn btn-warning">Valider les
                    modifications
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>