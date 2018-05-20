<?php

if(isset($_POST['modifier'])){
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['civilite']) && isset($_POST['email'])){
        $VotreID = $_SESSION['identification']['IDU'];
        $VotreCivilite = $_POST['civilite'];
        $VotreNom = $_POST['nom'];
        $VotrePrenom = $_POST['prenom'];
        $VotreEmail = $_POST['email'];
        $unUtilisateur = utilisateurDAO::modifier($VotreID, $VotreCivilite, $VotreNom, $VotrePrenom, $VotreEmail);
        unset($_SESSION['identification']);
        $_SESSION['identification'] = utilisateurDAO::verificationModif($VotreID, $VotreCivilite, $VotreNom, $VotrePrenom, $VotreEmail);
        include 'vues/squeletteModifOk.php';
    }
}
elseif(isset($_POST['supprimer'])){
  $unUtilisateur = utilisateurDAO::supprimer($_SESSION['identification']['IDU']);
  $_SESSION['easyFoodMP']="Accueil";
  include_once dispatcher::dispatch($_SESSION['easyFoodMP']);
}
else {
    $formulaireMonCompte = new Formulaire('post', 'index.php', 'formMonCompte', 'formUniforme');

    $formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerLabelFor("civilite", "Civilite:"), 1);
    $formulaireMonCompte->ajouterComposantTab();
    if ($_SESSION['identification']['CIVILITEU'] == 'M') {
        $formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerRadioButton("civilite", "M", "M", true), 1);
        $formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerRadioButton("civilite", "Mme", "Mme", null), 1);
        $formulaireMonCompte->ajouterComposantTab();
    } else {
        $formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerRadioButton("civilite", "M", "M", false), 1);
        $formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerRadioButton("civilite", "Mme", "Mme", true), 1);
        $formulaireMonCompte->ajouterComposantTab();
    }

    $formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerLabelFor("nom", "Nom :"), 1);
    $formulaireMonCompte->ajouterComposantTab();
    $formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputTexte("nom", "nom", $_SESSION['identification']['NOMU'], 1, $_SESSION['identification']['NOMU']), 1);
    $formulaireMonCompte->ajouterComposantTab();

    $formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerLabelFor("prenom", "Prénom :"), 1);
    $formulaireMonCompte->ajouterComposantTab();
    $formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputTexte("prenom", "prenom", $_SESSION['identification']['PRENOMU'], 1, $_SESSION['identification']['PRENOMU']), 1);
    $formulaireMonCompte->ajouterComposantTab();

    $formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerLabelFor("email", "Email:"), 1);
    $formulaireMonCompte->ajouterComposantTab();
    $formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputTexte("email", "email", $_SESSION['identification']['EMAILU'], 1, $_SESSION['identification']['EMAILU']), 1);
    $formulaireMonCompte->ajouterComposantTab();

    $formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputSubmit('modifier', 'modifier', 'Modifier'), 2);
    $formulaireMonCompte->ajouterComposantTab();

    $formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputSubmit('modifierMDP', 'modifierMDP', 'Modifier mot de passe'), 2);
    $formulaireMonCompte->ajouterComposantTab();

    $formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputSubmit('supprimer', 'supprimer', 'Supprimer votre compte ?'), 2);
    $formulaireMonCompte->ajouterComposantTab();

    $formulaireMonCompte->creerFormulaire();

    include 'vues/squeletteMonCompte.php';
}

?>
