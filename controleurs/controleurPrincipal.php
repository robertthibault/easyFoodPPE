<?php
require_once 'configs/param.php';
require_once 'lib/menu.php';
require_once 'lib/formulaire.php';
require_once 'lib/tableau.php';
require_once 'lib/dispatcher.php';
require_once 'modeles/dao.php';

require 'controleurs/controleurGestPlat.php';


/*
if(isset($_GET['menuPrincipalC'])){
	$_SESSION['menuPrincipalC']= $_GET['menuPrincipalC'];

if(isset($_GET['menuPrincipal'])){
	$_SESSION['menuPrincipal']= $_GET['menuPrincipal'];

}
else
{
	if(!isset($_SESSION['menuPrincipal'])){
		$_SESSION['menuPrincipal']="accueil";
	}
}


 //////Message Erreur
 $messageErreurConnexion ='';
 if(isset($_POST['email'] , $_POST['mdp'])){
    $unUtilisateur = new Utilisateur($_POST['email'] , $_POST['mdp']);
    $_SESSION['identification'] = utilisateurDAO::verification($unUtilisateur);
    if($_SESSION['identification']){
        $_SESSION['menuPrincipal']="accueil";
    }
    else {
        $messageErreurConnexion = 'Login ou mot de passe incorrect !';
    }
 }

 echo '5';


$menuPrincipal = new Menu("menuPrincipal");
$menuPrincipal->ajouterComposant($menuPrincipal->creerItemLien("accueil", "Accueil"));
$menuPrincipal->ajouterComposant($menuPrincipal->creerItemLien("plat", "Les Plats"));

echo '2';

$menuPrincipal->ajouterComposant($menuPrincipal->creerItemLien("connexion", "Connexion"));

/*
if(isset($_SESSION['identification']) && $_SESSION['identification']){
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemLien("proposer", "Proposer un plat"));
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemLien("connexion", "Déconnexion"));
 }
 else{

 }
 */
/*
echo '3';

$menu = $menuPrincipal->creerMenu('menuPrincipal');

echo $menu;
echo '4';


include_once dispatcher::dispatch($_SESSION['menuPrincipal']);

include_once dispatcher::dispatch($_SESSION['menuPrincipalC']);
*/
