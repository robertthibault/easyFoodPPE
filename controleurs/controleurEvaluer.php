<?php
if(isset($_SESSION['identification'])) {
    //&& isset($_SESSION['uneCommande'])

    /*----------------------------------------------------------*/
    /*-------- LE TABLEAU POUR L'HISTORIQUE ----------*/
    /*----------------------------------------------------------*/
    $lesRestos = EvaluerDAO::evaluerResto($_SESSION['identification']['IDU']);
    $enteteEvaluer = array();
    $enteteEvaluer[0] = "Nom";
    $enteteEvaluer[1] = "Note Nourriture";
    $enteteEvaluer[2] = "Note Recette";
    $enteteEvaluer[3] = "Note Esthetique";
    $enteteEvaluer[4] = "Note Cout";
    $enteteEvaluer[5] = "Commentaire resto";
    $enteteEvaluer[6] = "Evaluer";

    include_once 'vues/squeletteEvaluer.php';
}