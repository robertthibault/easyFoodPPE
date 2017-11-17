<?php

  $unPlat = PlatDAO::lePlatParId($_SESSION['idPlat'], 'IDP');
  $lesTypesPLats = TypePlatDAO::lesTypesPlats();

  if (isset($_POST['modifierPlat'])) {
    $unPlat->setNomP($_POST['nom']);
    $unPlat->setIdT($_POST['typePlat']);
    $unPlat->setPrixFournisseurP($_POST['prixF']);
    $unPlat->setPrixClientP($_POST['prixC']);
    $unPlat->setDescriptionP($_POST['description']);
    if (PlatDAO::modifier($unPlat)){
      $msg = "Le plat a bien été modifié.";
    }else {
      $msg = "Une erreur est survenue.";
    }
  }

  $formulaireModifPlat = new Formulaire('post', 'index.php', 'fModifPlat', '');

  $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerLabelFor('nom', 'Nom :'), 1);
  $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerInputTexte('nom', 'nom', $unPlat->getNomP(), 1, ''), 1);
  $formulaireModifPlat->ajouterComposantTab();

  $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerLabelFor('typePlat', 'Type de plat :'), 1);
  $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerSelectTypePlat('typePlat', 'typePlat', 'typePlat', $lesTypesPLats, $unPlat->getIdT()), 1);
  $formulaireModifPlat->ajouterComposantTab();

  $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerLabelFor('prixF', 'Prix du fournisseur :'), 1);
  $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerInputTexte('prixF', 'prixF', $unPlat->getPrixFournisseurP(), 1, ''), 1);
  $formulaireModifPlat->ajouterComposantTab();

  $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerLabelFor('prixC', 'Prix du client :'), 1);
  $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerInputTexte('prixC', 'prixC', $unPlat->getPrixClientP(), 1, ''), 1);
  $formulaireModifPlat->ajouterComposantTab();

  $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerLabelFor('description', 'Description :'), 1);
  $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerInputTexte('description', 'description', $unPlat->getDescriptionP(), 1, ''), 1);
  $formulaireModifPlat->ajouterComposantTab();

  $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerInputSubmit('modifierPlat', 'modifierPlat', "Modifier"), 1);
  $formulaireModifPlat->ajouterComposantTab();

  $formulaireModifPlat->creerFormulaire();


  include_once "vues/squeletteModifPlat.php";

 ?>
