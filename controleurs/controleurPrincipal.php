<?php

require_once 'configs/param.php';
require_once 'lib/menu.php';
require_once 'lib/formulaire.php';
require_once 'lib/tableau.php';
require_once 'lib/dispatcher.php';
require_once 'modeles/dao.php';
require 'controleurInscription.php';


/*----------------------------------------------------------*/
/*--------session du menu principal avec accueil par defaut----------------------*/
/*----------------------------------------------------------*/
/*
if(isset($_GET['easyFoodMP'])){
	$_SESSION['easyFoodMP']= $_GET['easyFoodMP'];
}
else{
	if(!isset($_SESSION['easyFoodMP'])){
		$_SESSION['easyFoodMP']="Accueil";
	}
}

/*
 //////Message Erreur
 $messageErreurConnexion ='';
 if(isset($_POST['email'] , $_POST['mdp'])){
    $unUtilisateur = new Utilisateur('', '', '', $_POST['email'], '', $_POST['mdp'], '', '', '', '', '', '', '');
    $_SESSION['identification'] = utilisateurDAO::verification($unUtilisateur);
    if($_SESSION['identification']){
        $_SESSION['menuPrincipal']="accueil";
    }
    else {
        $messageErreurConnexion = 'Email ou mot de passe incorrect !';
    }
 }
*/
/*
$easyFoodMP = new Menu("menuP");

 if (!isset($_SESSION['identification'])) {
 	$easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('connexion',"Connexion"));
 }
 else {
 $easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('InfoClient',"Bienvenue : " . $_SESSION['identification'][1] . $_SESSION['identification'][2] . $_SESSION['identification'][3]));
 }

$menuPrincipal = $easyFoodMP->creerMenu('easyFoodMP');

include_once dispatcher::dispatch($_SESSION['easyFoodMP']);
*/

?>
