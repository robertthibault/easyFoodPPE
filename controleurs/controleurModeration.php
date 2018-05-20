<?php
if(isset($_SESSION['identification'])){

    $etat = 0;
    $tabEvaluer = EvaluerDAO::recupNonVisible();
    $tabEvaluerSite = utilisateurDAO::recupNonVisible();
    $tabEvaluerPlat = PlatDAO::recupNonVisible();

    $enteteEvaluer = array();
    $enteteEvaluer[0] = "Nom";
    $enteteEvaluer[1] = "Prénom";
    $enteteEvaluer[2] = "Nom Restaurant";
    $enteteEvaluer[3] = "Commentaire";
    $enteteEvaluer[4] = "Choix";

    $enteteEasyFood = array();
    $enteteEasyFood[0] = "Nom";
    $enteteEasyFood[1] = "Prénom";
    $enteteEasyFood[2] = "Commentaire";
    $enteteEasyFood[3] = "Choix";

    $entetePlat = array();
    $entetePlat[0] = "Nom Restaurant";
    $entetePlat[1] = "Nom Plat";
    $entetePlat[2] = "Description";
    $entetePlat[3] = "Choix";

    if(isset($_POST['submitAvoir'])){
        $etat = 1;
        include_once "vues/squeletteModeration.php";
    }
    elseif (isset($_POST['submitAvoir2'])){
        $etat = 2;
        include_once "vues/squeletteModeration.php";
    }
    elseif (isset($_POST['submitAvoir3'])){
        $etat = 3;
        include_once "vues/squeletteModeration.php";
    }
    elseif(isset($_POST['submitBtnConfirmer'])){
        foreach ($tabEvaluer as $ligne){
            $compteur = $ligne['IDR'] . $ligne['IDU'];
            if(isset($_POST['rdo'. $compteur])){
                if($_POST['rdo'. $compteur] == 'oui'){
                    EvaluerDAO::modifierVisible($ligne['IDR'], $ligne['IDU']);
                }
            }
        }
        include_once "vues/squeletteModifOk.php";
    }
    elseif(isset($_POST['submitBtnConfirmer2'])){
        foreach ($tabEvaluerSite as $ligne){
            $compteur = $ligne['IDU'];
            if(isset($_POST['rdo'. $compteur])){
                if($_POST['rdo'. $compteur] == 'oui'){
                    utilisateurDAO::modifierVisible($ligne['IDU']);
                }
            }
        }
        include_once "vues/squeletteModifOk.php";
    }
    elseif(isset($_POST['submitBtnConfirmer3'])){
        foreach ($tabEvaluerPlat as $ligne){
            $compteur = $ligne['IDP'];
            if(isset($_POST['rdo'. $compteur])){
                if($_POST['rdo'. $compteur] == 'oui'){
                    PlatDAO::modifierVisible($ligne['IDP']);
                }
            }
        }
        include_once "vues/squeletteModifOk.php";
    }
    else{
        $formulaireListeBouton = new Formulaire('post', 'index.php', 'fProposer', 'formulaireEvaluation');
        $formulaireListeBouton->ajouterComposantLigne($formulaireListeBouton->creerInputSubmit('submitAvoir', 'submitAvoir', "Commentaire Restaurant"), 1);
        $formulaireListeBouton->ajouterComposantTab();
        $formulaireListeBouton->ajouterComposantLigne($formulaireListeBouton->creerInputSubmit('submitAvoir2', 'submitAvoir2', "Commentaire Site"), 1);
        $formulaireListeBouton->ajouterComposantTab();
        $formulaireListeBouton->ajouterComposantLigne($formulaireListeBouton->creerInputSubmit('submitAvoir3', 'submitAvoir3', "Liste des plats"), 1);
        $formulaireListeBouton->ajouterComposantTab();

        $formulaireListeBouton->creerFormulaire();

        include_once "vues/squeletteModeration.php";
    }
}
 ?>
