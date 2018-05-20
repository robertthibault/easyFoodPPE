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
            $msg = "Vous avez bien été inscrit.";
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

$formulaireInscription = new Formulaire('post', 'index.php', 'formInscription', 'formInscr');

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor("typeU", "Vous êtes ?"), 1);
$formulaireInscription->ajouterComposantTab();
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerRadioButton("typeU", "Restaurateur", "restaurateur", false), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerRadioButton("typeU", "Client", "client", false), 1);
$formulaireInscription->ajouterComposantTab();
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor("civilite", "Civilite:"), 1);
$formulaireInscription->ajouterComposantTab();
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerRadioButton("civilite", "M", "M", false), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerRadioButton("civilite", "Mme", "Mme", false), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte("nom", "nom", '',1, ' Nom'), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte("prenom", "prenom", '',1, ' Prénom'), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte("email", "email", '',1, ' Email'), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputPass("mdp", "mdp", '', 1,' Saisir votre mot de passe', 0), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputPass("mdp2", "mdp2", '', 1,' Confirmer votre mot de passe', 0), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputSubmit("inscrire", "inscrire", "inscrire"),1);;
$formulaireInscription->ajouterComposantTab();


$formulaireInscription->creerFormulaire();

include 'vues/squeletteInscription.php';
