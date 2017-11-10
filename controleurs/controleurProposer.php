<?php

  if (isset($_POST['proposer'])) {
    $plat = new Plat($_POST['resto'],$_POST['typePlat'], $_POST['nom'], $_POST['prixF'], $_POST['prixC'], "0", $_POST['description']);
    PlatDAO::ajouter($plat);
  }

  $lesRestos = RestoDAO::lireRestos();
  $lesTypesPLats = TypePlatDAO::lesTypesPlats();

  $formulaireProposer = new Formulaire('post', 'index.php', 'fProposer', '');

  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerLabelFor('nom', 'Nom :'), 1);
  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerInputTexte('nom', 'nom', '', 1, ''), 1);
  $formulaireProposer->ajouterComposantTab();

  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerLabelFor('resto', 'Resto :'), 1);
  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerSelect('resto', 'resto', 'resto', $lesRestos), 1);
  $formulaireProposer->ajouterComposantTab();

  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerLabelFor('typeplat', 'Type de plat :'), 1);
  $formulaireProposer->ajouterComposantLigne($formulaireProposer->creerSelect('typeplat', 'typeplat', 'typeplat', $lesTypesPLats), 1);
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

  $formulaireEquipe->ajouterComposantLigne($formulaireEquipe->creerInputSubmit('proposer', 'proposer', "Proposer"), 1);

  $formulaireEquipe->creerFormulaire();

  include_once "vues/squeletteProposer.php";

 ?>
