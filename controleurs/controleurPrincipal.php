<?php
require_once 'configs/param.php';
require_once 'lib/menu.php';
require_once 'lib/formulaire.php';
require_once 'lib/tableau.php';
require_once 'lib/dispatcher.php';
require_once 'modeles/dao.php';


/*----------------------------------------------------------*/
/*--------session du menu principal avec accueil par defaut----------------------*/
/*----------------------------------------------------------*/

if(isset($_GET['menuPrincipal'])){
	$_SESSION['menuPrincipal']= $_GET['menuPrincipal'];
}
else{
	if(!isset($_SESSION['menuPrincipal'])){
		$_SESSION['menuPrincipal']="Accueil";
	}
}

/*
 //////Message Erreur
 $messageErreurConnexion ='';
 if(isset($_POST['email'] , $_POST['mdp'])){0.
    $unUtilisateur = new Utilisateur('', '', '', $_POST['email'], '', $_POST['mdp'], '', '', '', '', '', '', '');

    $_SESSION['identification'] = utilisateurDAO::verification($unUtilisateur);
    if($_SESSION['identification']){
        $_SESSION['easyFoodMP']="accueil";
    }
 }
*/

$easyFoodMP = new Menu("menuP");

$easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Accueil','Accueil'));
$easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Les plats', 'Plat'));
if (!isset($_SESSION['identification'])) {
	$easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Connexion','Connexion'));
}
else{
	if($_SESSION['identification']['TYPEU']== 'client'){
		$easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Panier','Panier'));
	}
	elseif ($_SESSION['identification']['TYPEU'] == 'restaurateur') {
		$easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Gestion des plats','GestPlat'));
	}
		$easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien($_SESSION['identification']['PRENOMU'] . " " . $_SESSION['identification']['NOMU'], 'MonCompte'));
		$easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Déconnexion','Deconnexion'));
}

/*----------------------------------------------------------*/
/*-------- Affiche le formulaire inscription ----------*/
/*----------------------------------------------------------*/
if (isset($_POST['inscrire'])) {
	$_SESSION['menuPrincipal'] = 'Inscription';
}

$leMenuP = $easyFoodMP->creerMenu('menuPrincipal');
include_once dispatcher::dispatch($_SESSION['menuPrincipal']);


?>
