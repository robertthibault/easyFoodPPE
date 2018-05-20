<?php
if(isset($_SESSION['identification'])) {

    /*----------------------------------------------------------*/
    /*-------- LE TABLEAU POUR L'HISTORIQUE ----------*/
    /*----------------------------------------------------------*/
    $lHisorique = CommandeDAO::historique($_SESSION['identification']['IDU']);
    $entete = array();
    $entete[0] = "N°";
    $entete[1] = "Date";
    $entete[2] = "Prix TTC";
    $entete[3] = "Mode paiement";
    $entete[4] = "Commentaire";
    $entete[5] = "Modifier
    Commentaire";
    $entete[6] = "En savoir plus";


    include_once 'vues/squeletteHistorique.php';
}