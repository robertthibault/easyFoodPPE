<?php

$_SESSION['easyFoodMP'] = "GestPlat";

if (isset($_GET['id']) && isset($_GET['action'])) {
    $_SESSION['idPlat'] = $_GET['id'];
    $plat = PlatDAO::getPlat($_SESSION['idPlat']);
}else {
    include_once dispatcher::dispatch($_SESSION['easyFoodMP']);
}

if ($_GET['action'] == "supp") {
    PlatDAO::delPlat($plat);
    include_once dispatcher::dispatch($_SESSION['easyFoodMP']);
} elseif ($_GET['action'] == "modif") {

    if (isset($_POST['modifierPlat'])) {
        $plat->setNomP($_POST['nom']);
        $plat->setTypePlat(TypePlatDAO::getTypePlat($_POST['typePlat']));
        $plat->setPrixFournisseurP($_POST['prixF']);
        $plat->setPrixClientP($_POST['prixC']);
        $plat->setDescriptionP($_POST['description']);
        if (PlatDAO::setPlat($plat))
            $msg = "Le plat a bien été modifié.";
        else
            $msg = "Veuillez modifier les champs avant d'envoyer.";
    }

    $lesTypesPLats = TypePlatDAO::listTypePlat();
    $formulaireModifPlat = new Formulaire('post', 'index.php', 'fModifPlat', 'formUniforme');

    $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerLabelFor('nom', 'Nom'), 1);
    $formulaireModifPlat->ajouterComposantTab();
    $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerInputTexte('nom', 'nom', $plat->getNomP(), 1, ''), 1);
    $formulaireModifPlat->ajouterComposantTab();

    $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerLabelFor('typePlat', 'Type de plat'), 1);
    $formulaireModifPlat->ajouterComposantTab();
    $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerSelectTypePlat('typePlat', 'typePlat', $lesTypesPLats, $plat->getTypePlat()->getIdT()), 1);
    $formulaireModifPlat->ajouterComposantTab();

    $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerLabelFor('prixF', 'Prix du fournisseur'), 1);
    $formulaireModifPlat->ajouterComposantTab();
    $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerInputTexte('prixF', 'prixF', $plat->getPrixFournisseurP(), 1, ''), 1);
    $formulaireModifPlat->ajouterComposantTab();

    $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerLabelFor('prixC', 'Prix du client'), 1);
    $formulaireModifPlat->ajouterComposantTab();
    $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerInputTexte('prixC', 'prixC', $plat->getPrixClientP(), 1, ''), 1);
    $formulaireModifPlat->ajouterComposantTab();

    $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerLabelFor('description', 'Description'), 1);
    $formulaireModifPlat->ajouterComposantTab();
    $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerInputTexte('description', 'description', $plat->getDescriptionP(), 1, ''), 1);
    $formulaireModifPlat->ajouterComposantTab();

    $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerInputSubmit('modifierPlat', 'modifierPlat', "Modifier"), 1);
    $formulaireModifPlat->ajouterComposantTab();

    if (isset($msg)) {
        $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerLabel($msg), 1);
    }
    $formulaireModifPlat->ajouterComposantTab();

    $formulaireModifPlat->creerFormulaire();

    include_once "vues/squeletteModifPlat.php";
}