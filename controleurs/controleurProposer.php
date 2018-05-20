<?php

$restoUtilisateur = utilisateurDAO::getResto($_SESSION['identification']['IDU']);
$lesTypesPLats = TypePlatDAO::listTypePlat();

if (isset($_POST['proposer'])) {
    $plat = new Plat(
        PlatDAO::dernierNumero(),
        $restoUtilisateur,
        TypePlatDAO::getTypePlat($_POST['typePlat']),
        $_POST['nom'],
        $_POST['prixF'],
        $_POST['prixC'],
        "0",
        $_POST['description']);
    if (PlatDAO::addPlat($plat))
      $msg = "Le plat a bien été ajouté.";
    else
      $msg = "Une erreur est survenue.";
}


$formulaireProposer = new Formulaire('post', 'index.php', 'fProposer', 'formUniforme');

$formulaireProposer->ajouterComposantLigne($formulaireProposer->creerLabelFor('nom', 'Nom'), 1);
$formulaireProposer->ajouterComposantTab();
$formulaireProposer->ajouterComposantLigne($formulaireProposer->creerInputTexte('nom', 'nom', '', 1, ''), 1);
$formulaireProposer->ajouterComposantTab();

$formulaireProposer->ajouterComposantLigne($formulaireProposer->creerLabelFor('resto', 'Restaurant'), 1);
$formulaireProposer->ajouterComposantTab();
$formulaireProposer->ajouterComposantLigne($formulaireProposer->creerInputTexteDisabled($restoUtilisateur->getNomR()), 1);
$formulaireProposer->ajouterComposantTab();

$formulaireProposer->ajouterComposantLigne($formulaireProposer->creerLabelFor('typePlat', 'Type de plat'), 1);
$formulaireProposer->ajouterComposantTab();
$formulaireProposer->ajouterComposantLigne($formulaireProposer->creerSelectTypePlat('typePlat', 'typePlat', $lesTypesPLats, ''), 1);
$formulaireProposer->ajouterComposantTab();

$formulaireProposer->ajouterComposantLigne($formulaireProposer->creerLabelFor('prixF', 'Prix fournisseur'), 1);
$formulaireProposer->ajouterComposantTab();
$formulaireProposer->ajouterComposantLigne($formulaireProposer->creerInputTexte('prixF', 'prixF', '', 1, ''), 1);
$formulaireProposer->ajouterComposantTab();

$formulaireProposer->ajouterComposantLigne($formulaireProposer->creerLabelFor('prixC', 'Prix client'), 1);
$formulaireProposer->ajouterComposantTab();
$formulaireProposer->ajouterComposantLigne($formulaireProposer->creerInputTexte('prixC', 'prixC', '', 1, ''), 1);
$formulaireProposer->ajouterComposantTab();

$formulaireProposer->ajouterComposantLigne($formulaireProposer->creerLabelFor('description', 'Description'), 1);
$formulaireProposer->ajouterComposantTab();
$formulaireProposer->ajouterComposantLigne($formulaireProposer->creerInputTexte('description', 'description', '', 1, ''), 1);
$formulaireProposer->ajouterComposantTab();

$formulaireProposer->ajouterComposantLigne($formulaireProposer->creerInputSubmit('proposer', 'proposer', "Proposer"), 1);
$formulaireProposer->ajouterComposantTab();

$formulaireProposer->creerFormulaire();

include_once "vues/squeletteProposer.php";