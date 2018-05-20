<?php
if(isset($_SESSION['identification']) && isset($_SESSION['uneEvaluation'])) {
    $existe = EvaluerDAO::existe($_SESSION['uneEvaluation'][1], $_SESSION['uneEvaluation'][0]);
    $laModification = EvaluerDAO::Commentaire($_SESSION['uneEvaluation'][1], $_SESSION['uneEvaluation'][0]);
    $leNomResto = RestoDAO::recupNom($_SESSION['uneEvaluation'][0]);
    $leNomResto = $leNomResto['NOMR'];
    if(isset($_POST['enregistrement']) && isset($_POST['noteNourriture']) && isset($_POST['noteRecette']) && isset($_POST['noteEsthetique']) && isset($_POST['noteCout']) && isset($_POST['commentaireResto'])){
        EvaluerDAO::ajouterEvaluation($_SESSION['uneEvaluation'][0], $_SESSION['uneEvaluation'][1], $_POST['noteNourriture'], $_POST['noteRecette'], $_POST['noteEsthetique'], $_POST['noteCout'], $_POST['commentaireResto'], 0);
        include_once 'vues/squeletteEnregistrementOK.php';
    }
    elseif(isset($_POST['modification']) && isset($_POST['noteNourriture']) && isset($_POST['noteRecette']) && isset($_POST['noteEsthetique']) && isset($_POST['noteCout']) && isset($_POST['commentaireResto'])){
        $nouv = str_replace("'", "\'", $_POST['commentaireResto']);
        EvaluerDAO::modifierEvaluation($_SESSION['uneEvaluation'][0], $_SESSION['uneEvaluation'][1], $_POST['noteNourriture'], $_POST['noteRecette'], $_POST['noteEsthetique'], $_POST['noteCout'], $nouv, 0);
        include_once 'vues/squeletteModificationOK.php';
    }
    elseif($existe[0]['nombre'] == 1){
        $formulaireModifCommentaire = new Formulaire('post', 'index.php', 'formulaireModifCommentaire', 'formulaireEvaluation');
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabel('Nom Restaurant: '), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabelFor('nomResto', $leNomResto), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabelFor('noteNourriture', 'Note nourriture: '), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerInputTexte('noteNourriture', 'noteNourriture', $laModification[0]['NOTEQUALITENOURRITURE'], 1, '', 30), 2);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabelFor('noteRecette', 'Note recette: '), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerInputTexte('noteRecette', 'noteRecette', $laModification[0]['NOTERESPECTRECETTE'], 1, '', 30), 2);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabelFor('noteEsthetique', 'Note esthetique: '), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerInputTexte('noteEsthetique', 'noteEsthetique', $laModification[0]['NOTEESTHETIQUE'], 1, '', 30), 2);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabelFor('noteCout', 'Note cout: '), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerInputTexte('noteCout', 'noteCout', $laModification[0]['NOTECOUT'], 1, '', 30), 2);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabelFor('commentaireResto', 'Commentaire: '), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerTextArea(4, 26, $laModification[0]['COMMENTAIRERESTO'], 'commentaireResto', 'commentaireResto', 255, ''), 2);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerInputSubmit('modification', 'modification', 'Modifier'), 2);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->creerFormulaire();

        include_once 'vues/squeletteModifCommentaire.php';
    }
    else{
        $formulaireModifCommentaire = new Formulaire('post', 'index.php', 'formulaireModifCommentaire', 'formulaireEvaluation');
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabel('Nom Restaurant: '), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabelFor('nomResto', $leNomResto), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabelFor('noteNourriture', 'Note nourriture: '), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerInputTexte('noteNourriture', 'noteNourriture', '', 0, '', 30), 2);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabelFor('noteRecette', 'Note recette: '), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerInputTexte('noteRecette', 'noteRecette', '', 0, '', 30), 2);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabelFor('noteEsthetique', 'Note esthetique: '), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerInputTexte('noteEsthetique', 'noteEsthetique', '', 0, '', 30), 2);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabelFor('noteCout', 'Note cout: '), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerInputTexte('noteCout', 'noteCout', '', 0, '', 30), 2);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabelFor('commentaireResto', 'Commentaire: '), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerTextArea(4, 26, '', 'commentaireResto', 'commentaireResto', 255, ''), 2);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerInputSubmit('enregistrement', 'enregistrement', 'Enregistrer'), 2);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->creerFormulaire();

        include_once 'vues/squeletteModifCommentaire.php';
    }
}
?>