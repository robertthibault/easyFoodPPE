<?php
require_once 'configs/param.php';
require_once 'lib/menu.php';
require_once 'lib/formulaire.php';
require_once 'lib/tableau.php';
require_once 'lib/dispatcher.php';
require_once 'modeles/dao.php';
require_once 'lib/fonctions.php';

/*----------------------------------------------------------*/
/*--------session du menu principal avec accueil par defaut----------------------*/
/*----------------------------------------------------------*/

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
        $_SESSION['easyFoodMP']="accueil";
    }
    else {
        $messageErreurConnexion = 'Email ou mot de passe incorrect !';
    }
 }

*/
$easyFoodMP = new Menu("menuP");

$easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Accueil','Accueil'));
if (!isset($_SESSION['identification'])) {
    $easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Les plats', 'Plat'));
	$easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Connexion','Connexion'));
}
else{
	if($_SESSION['identification']['TYPEU']== 'client'){
        $easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Les plats', 'Plat'));
		$easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Panier','Panier'));
        $easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Historique','Historique'));
        $easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Evaluer','Evaluer'));
        $easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Mon Compte', 'MonCompte'));
        $easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Déconnexion1','Connexion'));
	}
	elseif ($_SESSION['identification']['TYPEU'] == 'restaurateur') {
        $easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Les plats', 'Plat'));
		$easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Gestion des plats','GestPlat'));
        $easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Mon Compte', 'MonCompte'));
        $easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Déconnexion2','Connexion'));
	}
	else{
        $easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Modération', 'Moderation'));
        $easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Mon Compte', 'MonCompte'));
        $easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien('Déconnexion','Connexion'));
    }
}

/*----------------------------------------------------------*/
/*-------- Affiche le formulaire inscription ----------*/
/*----------------------------------------------------------*/
if (isset($_POST['inscrit'])) {
	$_SESSION['easyFoodMP'] = 'Inscription';
}

/*----------------------------------------------------------*/
/*-------- Affiche le formulaire ModifierCompte ----------*/
/*----------------------------------------------------------*/
if (isset($_POST['modifier'])) {
    $_SESSION['easyFoodMP'] = 'MonCompte';
}
if(isset($_POST['modifierMDP'])){
    $_SESSION['easyFoodMP'] = 'ModifMdp';
}
if(isset($_POST['confirmer2'])){
    $_SESSION['easyFoodMP'] = 'ModifMdp';
}
/*----------------------------------------------------------*/
/*-------- Affiche le formulaire connexion ----------*/
/*----------------------------------------------------------*/
/*
if (isset($_POST['Valider'])) {
	$_SESSION['easyFoodMP'] = 'Connexion';
}
*/

/*----------------------------------------------------------*/
/*-------- Affiche l'accueil ----------*/
/*----------------------------------------------------------*/

if (isset($_POST['retour'])) {
	$_SESSION['easyFoodMP'] = 'Accueil';
}

/*----------------------------------------------------------*/
/*-------- Affiche le détail d'une commande ----------*/
/*----------------------------------------------------------*/
if(isset($_GET['commande'])){
	$_SESSION['uneCommande'] = $_GET['commande'];
	$_SESSION['easyFoodMP'] = 'DetailCommande';
}

/*----------------------------------------------------------*/
/*-------- Affiche la modification de commentaire ----------*/
/*----------------------------------------------------------*/
if(isset($_GET['commentaire'])){
    $_SESSION['unCommentaire'] = $_GET['commentaire'];
    $_SESSION['easyFoodMP'] = 'ModifCommentaire';
}

if(isset($_POST['Amodifier'])){
    $_SESSION['easyFoodMP'] = 'ModifCommentaire';
}

/*----------------------------------------------------------*/
/*-------- Affiche la modification de l'évaluation ----------*/
/*----------------------------------------------------------*/
if(isset($_GET['evaluation'])){
    $split = $_GET['evaluation'];
    $nouv = explode("-", $split);
    $_SESSION['uneEvaluation'] = $nouv;
    $_SESSION['easyFoodMP'] = 'Evaluation';
}

if(isset($_POST['enregistrement']) || isset($_POST['modification'])){
    $_SESSION['easyFoodMP'] = 'Evaluation';
}

/*----------------------------------------------------------*/
/*-------- Affiche la moderation ----------*/
/*----------------------------------------------------------*/
if(isset($_POST['submitAvoir']) || isset($_POST['submitAvoir2']) || isset($_POST['submitAvoir3']) || isset($_POST['submitBtnConfirmer']) || isset($_POST['submitBtnConfirmer2'])){
    $_SESSION['easyFoodMP'] = 'Moderation';
}

/*----------------------------------------------------------*/
/*-------- Affiche l'historique ----------*/
/*----------------------------------------------------------*/
if(isset($_POST['retourHistorique'])){
    unset($_SESSION['uneCommande']);
    $_SESSION['easyFoodMP'] = 'Historique';
}


$leMenuP = $easyFoodMP->creerMenu('easyFoodMP');
include_once dispatcher::dispatch($_SESSION['easyFoodMP']);

?>
