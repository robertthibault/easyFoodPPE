<?php
require_once 'configs/param.php';
require_once 'lib/menu.php';
require_once 'lib/formulaire.php';
require_once 'lib/tableau.php';
require_once 'lib/dispatcher.php';
require_once 'modeles/dao.php';
require 'controleurConnexion.php';

/*
if(isset($_GET['menuPrincipal'])){
	$_SESSION['menuPrincipal']= $_GET['menuPrincipal'];
}
else
{
	if(!isset($_SESSION['menuPrincipal'])){
		$_SESSION['menuPrincipal']="accueil";
	}
}

*/
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

/*

 echo '5';


$menuPrincipal = new Menu("menuPrincipal");
$menuPrincipal->ajouterComposant($menuPrincipal->creerItemLien("accueil", "Accueil"));
$menuPrincipal->ajouterComposant($menuPrincipal->creerItemLien("plat", "Les Plats"));

echo '2';

if(isset($_SESSION['identification']) && $_SESSION['identification']){
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemLien("proposer", "Proposer un plat"));
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemLien("connexion", "D�connexion"));
 }
 else{
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemLien("connexion", "Connexion"));
 }

echo '3';

$menu = $menuPrincipal->creerMenu('menuPrincipal');

echo '4';

include_once dispatcher::dispatch($_SESSION['menuPrincipal']);
*/
