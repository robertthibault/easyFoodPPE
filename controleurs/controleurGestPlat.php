<?php

  //Temporaire
  $_SESSION['identification']['NOMU'] = "CORBU";
  $_SESSION['identification']['PRENOMU'] = "Julien";
  $_SESSION['identification']['IDU'] = 7;
  //Temporaire
  $sonResto = utilisateurDAO::sonResto($_SESSION['identification']['IDU']);
  $lesPlats = PlatDAO::lesPlatsIdR($sonResto);

  if (isset($_POST['modifier'])) {
    include_once 'controleurs/controleurProposer.php';
  }

  $formulaireGestPlat = new Formulaire('post', 'index.php', 'fGestPlat', '');
  $_SESSION['numId'] = 1;
  foreach ($lesPlats as $plat) {

    if ($plat->getPlatVisible() == 1) {
      $estVisible = "Visible";
    }else {
      $estVisible = "Non visible";
    }

    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($plat->getNomP(), $plat->getNomP()), 1);
    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($plat->getPrixFournisseurP(), $plat->getPrixFournisseurP()."€"), 1);
    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($plat->getPrixClientP(), $plat->getPrixClientP()."€"), 1);
    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($estVisible, $estVisible), 1);
    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerInputSubmit('modifier', 'modifier', 'Modifier'), 1);
    $formulaireGestPlat->ajouterComposantTab();

    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($plat->getDescriptionP(), $plat->getDescriptionP()), 1);
    $formulaireGestPlat->ajouterComposantTab();
    $_SESSION['numId']++;
  }

  $formulaireGestPlat->creerFormulaire();

  include_once "vues/squeletteGestPlat.php";

?>
