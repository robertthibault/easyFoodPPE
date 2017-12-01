<?php

  if(isset($_POST['Valider'])){
    if (isset($_POST['email']) && isset($_POST['mdp'])) {
      $_SESSION['identification'] = utilisateurDAO::verification($_POST['email'], $_POST['mdp']);
      if($_SESSION['identification'] != NULL){
        //$_SESSION['identification']=array($unUtilisateur);
        $_SESSION['easyFoodMP']='GestPlat';
        include_once dispatcher::dispatch($_SESSION['easyFoodMP']);
      }
    }
  }

  $formulaireConnexion = new Formulaire('post', 'index.php', 'formConnexion', 'formUniforme');
  $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel("Veuillez vous connecter"), 1);
  $formulaireConnexion->ajouterComposantTab();
  $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('email', 'email', '' , 1, 'Email',0),1);
  $formulaireConnexion->ajouterComposantTab();
  $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputPass('mdp', 'mdp', '', 1,'saisir votre mot de passe', 0), 1);
  $formulaireConnexion->ajouterComposantTab();
  $formulaireConnexion->ajouterComposantLigne($formulaireConnexion-> creerInputSubmit('Valider', 'Valider', 'Valider'),2);
  $formulaireConnexion->ajouterComposantTab();
  /*
  $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel($messageErreurConnexion, "messageErreurConnexion"),2);
  $formulaireConnexion->ajouterComposantTab();
  */
  $formulaireConnexion->creerFormulaire();
  $formulairePourInscription = new Formulaire('post', 'index.php', 'formulairePourInscription', 'formUniforme');
  $formulairePourInscription->ajouterComposantLigne($formulairePourInscription->creerInputSubmit('inscrire', 'inscrire', 'Pas encore inscrit ?'),2);
  $formulairePourInscription->ajouterComposantTab();
  $formulairePourInscription->creerFormulaire();

    include 'vues/squeletteConnexion.php';

?>
