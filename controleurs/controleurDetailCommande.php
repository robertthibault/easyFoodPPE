<?php

if(isset($_SESSION['identification']) && isset($_SESSION['uneCommande'])) {

    /*----------------------------------------------------------*/
    /*-------- LE TABLEAU POUR L'HISTORIQUE ----------*/
    /*----------------------------------------------------------*/
    $leDetail = CommandeDAO::detailCommande($_SESSION['uneCommande']);
    $enteteDetail = array();
    $enteteDetail[0] = "Nom";
    $enteteDetail[1] = "Prix unité";
    $enteteDetail[2] = "Quantité";
    $enteteDetail[3] = "Prix Total";


    $formulaireBoutonRetour = new Formulaire('post', 'index.php', 'formulairePourInscription', 'formButtonDetail');
    $formulaireBoutonRetour->ajouterComposantLigne($formulaireBoutonRetour->creerInputSubmit('retourHistorique', 'retourHistorique', 'Retour'),2);
    $formulaireBoutonRetour->ajouterComposantTab();
    $formulaireBoutonRetour->creerFormulaire();

    include_once 'vues/squeletteDetailCommande.php';
}