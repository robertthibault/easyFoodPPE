<?php

if(isset($_POST['modifier'])){
    $unUtilisateur = utilisateurDAO::modifier($_SESSION['identification']);
    $_SESSION['easyFoodMP']="Accueil";
    include_once dispatcher::dispatch($_SESSION['easyFoodMP']);
}

if(isset($_POST['supprimer'])){
  $unUtilisateur = utilisateurDAO::supprimer($_SESSION['identification']['IDU']);
  $_SESSION['easyFoodMP']="Accueil";
  include_once dispatcher::dispatch($_SESSION['easyFoodMP']);
}


$formulaireMonCompte = new Formulaire('post', 'index.php', 'formMonCompte', 'formUniforme');

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerLabelFor("nom", "Nom :"), 1);
$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputTexte("nom", "nom", '',1, $_SESSION['identification']['NOMU']), 1);
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerLabelFor("prenom", "Prénom :"), 1);
$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputTexte("prenom", "prenom", '',1, $_SESSION['identification']['PRENOMU']), 1);
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerLabelFor("civilite", "Civilite:"), 1);

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerRadioButton("civilite", "M", "M"), 1);
$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerRadioButton("civilite", "Mme", "Mme"), 1);
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerLabelFor("email", "Email:"), 1);
$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputTexte("email", "email", '',1, $_SESSION['identification']['EMAILU']), 1);
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputPass("mdp", "mdp", '', 1,'saisir votre ancien mot de passe', 0), 1);
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputPass("mdp", "mdp", '', 1,'saisir votre nouveau mot de passe', 0), 1);
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputPass("mdp3", "mdp3", '', 1,'confirmer votre mot de passe', 0), 1);
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputSubmit('modifier', 'modifier', 'Modifier'),2);
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputSubmit('supprimer', 'supprimer', 'Supprimer votre compte ?'),2);
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->creerFormulaire();

include 'vues/squeletteMonCompte.php';

?>
