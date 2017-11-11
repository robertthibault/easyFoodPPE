<?php

  if (isset($_POST['proposer'])) {
    $plat = new Plat($_POST['resto'], $_POST['typePlat'], $_POST['nom'], $_POST['prixF'], $_POST['prixC'], "0", $_POST['description']);
    PlatDAO::ajouter($plat);
  }

  $lesRestos = RestoDAO::lesRestos();
  $lesTypesPLats = TypePlatDAO::lesTypesPlats();

  $formulaireProposer = new Formulaire('post', 'index.php', 'fProposer', '');

  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerLabelFor('nom', 'Nom :'), 1);
  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerInputTexte('nom', 'nom', '', 1, ''), 1);
  $formulaireProposer->ajouterComposantTab();

  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerLabelFor('resto', 'Resto :'), 1);
  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerSelectResto('resto', 'resto', 'resto', $lesRestos), 1);
  $formulaireProposer->ajouterComposantTab();

  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerLabelFor('typePlat', 'Type de plat :'), 1);
  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerSelectTypePlat('typePlat', 'typePlat', 'typePlat', $lesTypesPLats), 1);
  $formulaireProposer->ajouterComposantTab();

  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerLabelFor('prixF', 'Prix du fournisseur :'), 1);
  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerInputTexte('prixF', 'prixF', '', 1, ''), 1);
  $formulaireProposer->ajouterComposantTab();

  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerLabelFor('prixC', 'Prix du client :'), 1);
  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerInputTexte('prixC', 'prixC', '', 1, ''), 1);
  $formulaireProposer->ajouterComposantTab();

  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerLabelFor('description', 'Description :'), 1);
  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerInputTexte('description', 'description', '', 1, ''), 1);
  $formulaireProposer->ajouterComposantTab();

  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerInputSubmit('proposer', 'proposer', "Proposer"), 1);
  $formulaireProposer->ajouterComposantTab();

  $formulaireProposer->creerFormulaire();

  include_once "vues/squeletteProposer.php";

 ?>
