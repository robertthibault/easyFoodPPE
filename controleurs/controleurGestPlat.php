<?php

  //Temporaire
  $_SESSION['identification']['NOMU'] = "CORBU";
  $_SESSION['identification']['PRENOMU'] = "Julien";
  $_SESSION['identification']['IDU'] = 7;
  //Temporaire
  $sonResto = utilisateurDAO::sonResto($_SESSION['identification']['IDU']);
  $lesPlats = PlatDAO::lesPlatsParId($sonResto, 'IDR');

  if (isset($_POST['modifier'])) {
    $_SESSION['idPlat'] = $_POST['idPlat'];
    include_once 'controleurs/controleurModifPlat.php';
  }

  $formulaireGestPlat = new Formulaire('post', 'index.php', 'fGestPlat', '');

  $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor('idPlat', 'Modifier le plat n° : '), 1);
  $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerInputTexte('idPlat', 'idPlat', '', 1, ''), 1);
  $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerInputSubmit('modifier', 'modifier', 'Modifier'), 1);
  $formulaireGestPlat->ajouterComposantTab();

  foreach ($lesPlats as $plat) {

    if ($plat->getPlatVisible() == 1) {
      $estVisible = "Visible";
    }else {
      $estVisible = "Non visible";
    }

    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($plat->getIdP(), $plat->getIdP()), 1);
    $formulaireGestPlat->ajouterComposantTab();

    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($plat->getNomP(), $plat->getNomP()), 1);
    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($plat->getPrixFournisseurP(), $plat->getPrixFournisseurP()."€"), 1);
    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($plat->getPrixClientP(), $plat->getPrixClientP()."€"), 1);
    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($estVisible, $estVisible), 1);
    $formulaireGestPlat->ajouterComposantTab();

    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($plat->getDescriptionP(), $plat->getDescriptionP()), 1);
    $formulaireGestPlat->ajouterComposantTab();
  }

  $formulaireGestPlat->creerFormulaire();

  include_once "vues/squeletteGestPlat.php";

?>
