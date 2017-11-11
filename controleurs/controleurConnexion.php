<?php

if(!isset($_SESSION['identification']) || !$_SESSION['identification']){

  if(isset($_POST['Valider'])){
      $_SESSION['identification']=array();
      require 'controleurAccueil.php';
      }

    $formulaireConnexion = new Formulaire('post', 'index.php', 'fConnexion', 'fConnexion');
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

    include_once 'vues/squeletteConnexion.php';

}
else{
    $_SESSION['identification']=array();
    $_SESSION['menuPrincipal']="accueil";
    header('location: index.php');

}

?>
