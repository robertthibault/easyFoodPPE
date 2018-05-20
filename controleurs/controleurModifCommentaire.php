<?php
if(isset($_SESSION['identification']) && isset($_SESSION['unCommentaire'])) {
    $laCommande = CommandeDAO::recupTout($_SESSION['unCommentaire']);
    $laDate = explode('-', $laCommande[0]['DATEC']);
    $laDate = $laDate[2].'-'.$laDate[1].'-'.$laDate[0];

    if(isset($_POST['Amodifier'])){
        CommandeDAO::modifComm($_SESSION['unCommentaire'], $_SESSION['identification']['IDU'], $_POST['commentaireCommande']);
        include_once 'vues/squeletteModificationOK.php';
    }
    else{
        $formulaireModifCommentaire = new Formulaire('post', 'index.php', 'formulaireModifCommentaire', 'formulaireEvaluation');
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabelFor('numCommande', 'Commande n°' .$_SESSION['unCommentaire']), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabel('Date commande: '), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabelFor('dateCommande', $laDate), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerLabelFor('commentaireCommande', 'Comentaire de votre commande: '), 1);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerTextArea(4, 26, $laCommande[0]['COMMENTAIRECLIENTC'], 'commentaireCommande', 'commentaireCommande', 255, ''), 2);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->ajouterComposantLigne($formulaireModifCommentaire->creerInputSubmit('Amodifier', 'Amodifier', 'Modifier'), 2);
        $formulaireModifCommentaire->ajouterComposantTab();
        $formulaireModifCommentaire->creerFormulaire();

        include_once 'vues/squeletteModifCommentaire.php';
    }
}
?>