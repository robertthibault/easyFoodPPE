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

if(isset($_GET['menuP'])){
	$_SESSION['menuP']= $_GET['menuP'];
}
else{
	if(!isset($_SESSION['menuP'])){
		$_SESSION['menuP']="Accueil";
	}
}


 //////Message Erreur
 $messageErreurConnexion ='';
 if(isset($_POST['email'] , $_POST['mdp'])){
    $unUtilisateur = new Utilisateur('', '', '', $_POST['email'], '', $_POST['mdp'], '', '', '', '', '', '', '');

    $_SESSION['identification'] = utilisateurDAO::verification($unUtilisateur);
    if($_SESSION['identification']){
        $_SESSION['menuP']="accueil";
    }
    else {
        $messageErreurConnexion = 'Email ou mot de passe incorrect !';
    }
 }


$easyFoodMP = new Menu("menuP");

 if (!isset($_SESSION['identification'])) {
 	$easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien("Connexion",'connexion'));
 }
 else {
 $easyFoodMP->ajouterComposant($easyFoodMP->creerItemLien("Bienvenue : " . $_SESSION['identification'][1] . $_SESSION['identification'][2] . $_SESSION['identification'][3]),'InfoClient');
}



include_once dispatcher::dispatch($_SESSION['menuP']);


?>
