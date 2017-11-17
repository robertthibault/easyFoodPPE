<?php

if(isset($_POST['inscrire'])){
  if(isset($_POST['nom'])
  		&& isset($_POST['prenom'])
  		&& isset($_POST['typeU'])
  		&& isset($_POST['civilite'])
  		&& isset($_POST['email'])
  		&& isset($_POST['mdp'])
      && isset($_POST['mdp2'])){
        if($_POST['mdp'] == $_POST['mdp2']) {
          $utilisateur = new Utilisateur(utilisateurDAO::dernierNumero(), $_POST['civilite'], $_POST['nom'], $_POST['prenom'], $_POST['email'], md5($_POST['mdp']), $_POST['typeU'],
          null, null, null, null, null, null, null);
          if (utilisateurDAO::ajouter($utilisateur)){
            $msg = "Vous avez bien Ã©tÃ© inscrit.";
          }else {
            $msg = "Une erreur est survenue.";
          }}
        else{
          $msg = "Les deux mots de passe doivent correspondre.";
        }
        //  $_SESSION['easyFoodMP']="Accueil";

    }
    //include_once dispatcher::dispatch($_SESSION['easyFoodMP']);
  }

$formulaireInscription = new Formulaire('post', 'index.php', 'formInscription', 'inscription');

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor("nom", "Nom :"), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte("nom", "nom", '',1, ''), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor("prenom", "Prénom :"), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte("prenom", "prenom", '',1, ''), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor("civilite", "Civilite:"), 1);

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerRadioButton("civilite", "M", "M"), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerRadioButton("civilite", "Mme", "Mme"), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor("typeU", "Vous êtes ?"), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerRadioButton("typeU", "restaurateur", "restaurateur"), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerRadioButton("typeU", "client", "client"), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor("email", "Email:"), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte("email", "email", '',1, ''), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor("mdp", "Mot de passe:"), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputPass("mdp", "mdp", ''), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor("mdp2", "Confirmation mot de passe:"), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputPass("mdp2", "mdp2", ''), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputSubmit("inscrire", "inscrire", "inscrire"),1);;
$formulaireInscription->ajouterComposantTab();


$formulaireInscription->creerFormulaire();

include 'vues/squeletteInscription.php';
