<?php

if (isset($_SESSION['identification'])){
    if(isset($_POST['confirmer2']) && md5($_POST['mdp']) == $_SESSION['identification']['MOTDEPASSEU'] && $_POST['mdp1'] == $_POST['mdp2']){
        $VotreID = $_SESSION['identification']['IDU'];
        $VotreCivilite = $_SESSION['identification']['CIVILITEU'];
        $VotreNom = $_SESSION['identification']['NOMU'];
        $VotrePrenom = $_SESSION['identification']['PRENOMU'];
        $VotreEmail = $_SESSION['identification']['EMAILU'];
        unset($_SESSION['identification']);
        utilisateurDAO::modifierMdp($VotreID, $_POST['mdp1']);
        $_SESSION['identification'] = utilisateurDAO::verificationModif($VotreID, $VotreCivilite, $VotreNom, $VotrePrenom, $VotreEmail);
        require_once 'vues/squeletteModifOk.php';
    }
    else{
        $formulaireModifMdp = new Formulaire('post', 'index.php', 'formulaireModifMdp', 'formUniforme');
        $formulaireModifMdp->ajouterComposantLigne($formulaireModifMdp->creerInputPass("mdp", "mdp", '', 1,'saisir votre ancien mot de passe', 0), 1);
        $formulaireModifMdp->ajouterComposantTab();
        $formulaireModifMdp->ajouterComposantLigne($formulaireModifMdp->creerInputPass("mdp1", "mdp1", '', 1,'saisir votre nouveau mot de passe', 0), 1);
        $formulaireModifMdp->ajouterComposantTab();
        $formulaireModifMdp->ajouterComposantLigne($formulaireModifMdp->creerInputPass("mdp2", "mdp2", '', 1,'confirmer votre mot de passe', 0), 1);
        $formulaireModifMdp->ajouterComposantTab();
        $formulaireModifMdp->ajouterComposantLigne($formulaireModifMdp->creerInputSubmit('confirmer2', 'confirmer2', 'Confirmer'), 2);
        $formulaireModifMdp->ajouterComposantTab();
        $formulaireModifMdp->creerFormulaire();
        require_once 'vues/squeletteModifMdp.php';
    }

}