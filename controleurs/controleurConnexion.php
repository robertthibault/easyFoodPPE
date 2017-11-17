<?php

  if(isset($_POST['Valider'])){
    if (isset($_POST['email']) && isset($_POST['mdp'])) {
      $unUtilisateur = utilisateurDAO::verification($_POST['email'], $_POST['mdp']);
      if($unUtilisateur != NULL){
        $_SESSION['identification']=array($unUtilisateur);
        $_SESSION['easyFoodMP']=$_SESSION['dernierePage'];
        include_once dispatcher::dispatch($_SESSION['easyFoodMP']);
      }
    }
  }

  if(isset($_POST['inscrire'])){
    $_SESSION['easyFoodMP']='inscription';
    include_once dispatcher::dispatch($_SESSION['easyFoodMP']);
  }

    $formulaireConnexion = new Formulaire('post', 'index.php', 'formConnexion', 'Connexion');
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('email', 'Email :'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('email', 'email', '' , 1, '',0),1);
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabelFor('mdp', 'Mot de passe :'), 1);
    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputPass('mdp', 'mdp', '' ,1),1);
    $formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->ajouterComposantLigne($formulaireConnexion-> creerInputSubmit('Valider', 'Valider', 'Valider'),2);
    $formulaireConnexion->ajouterComposantTab();

    //$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel($messageErreurConnexion, "messageErreurConnexion"),2);
    //$formulaireConnexion->ajouterComposantTab();

    $formulaireConnexion->creerFormulaire();

    $formulairePourInscription = new Formulaire('post', 'index.php', 'formulairePourInscription', 'PourInscription');
    $formulairePourInscription->ajouterComposantLigne($formulairePourInscription->creerInputSubmit('inscrire', 'inscrire', 'Pas encore inscrit ?'),2);
    $formulairePourInscription->ajouterComposantTab();
    $formulairePourInscription->creerFormulaire();

    include 'vues/squeletteConnexion.php';

?>
