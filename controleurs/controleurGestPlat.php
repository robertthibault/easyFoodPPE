<?php

  $sonResto = utilisateurDAO::sonResto($_SESSION['identification']['IDU']);
  $lesPlats = PlatDAO::lesPlatsParId($sonResto['IDR'], 'IDR');
  if (empty($lesPlats)) {
    $msg = "Vous n'avez aucun plat.";
  }

  if (isset($_POST['modifier'])) {
    foreach ($lesPlats as $plat) {
      if($_POST['idPlat'] == $plat->getIdP()){
        $_SESSION['easyFoodMP']="ModifPlat";
        include_once dispatcher::dispatch($_SESSION['easyFoodMP']);
        break;
      }else{
        $msg = 'Ce plat ne fait pas partie des vôtres.';
      }
    }
  }

  $formulaireGestPlat = new Formulaire('post', 'index.php', 'fGestPlat', '');

  $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerInputTexte('idPlat', 'idPlat', '', 1, 'Numéro du plat à modifier'), 1);
  $formulaireGestPlat->ajouterComposantTab();
  $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerInputSubmit('modifier', 'modifier', 'Modifier'), 1);
  if(isset($msg)){
    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor('idPlat', $msg, 1), 1);
  }
  $formulaireGestPlat->ajouterComposantTab();

  foreach ($lesPlats as $plat) {
    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor('', '- - - - - - - - - - - - - - - - - - - - - - - -'), 1);
    $formulaireGestPlat->ajouterComposantTab();
    if ($plat->getPlatVisible() == 1) {
      $estVisible = "Visible";
    }else {
      $estVisible = "Non visible";
    }

    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($plat->getIdP(), $plat->getIdP()), 1);
    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($estVisible, $estVisible), 1);
    $formulaireGestPlat->ajouterComposantTab();

    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($plat->getNomP(), $plat->getNomP()), 1);
    $formulaireGestPlat->ajouterComposantTab();

    $sonTypePlat = PlatDAO::sonTypePlat($plat->getIdT());
    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($sonTypePlat->getLibelleT(), $sonTypePlat->getLibelleT()), 1);
    $formulaireGestPlat->ajouterComposantTab();


    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($plat->getPrixFournisseurP(), "Prix fournisseur : " . $plat->getPrixFournisseurP()."€"), 1);
    $formulaireGestPlat->ajouterComposantTab();

    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($plat->getPrixClientP(), "Prix client : " . $plat->getPrixClientP()."€"), 1);
    $formulaireGestPlat->ajouterComposantTab();

    $formulaireGestPlat->ajouterComposantLigne($formulaireGestPlat->creerLabelFor($plat->getDescriptionP(), $plat->getDescriptionP()), 1);
    $formulaireGestPlat->ajouterComposantTab();
  }

  $formulaireGestPlat->creerFormulaire();

  include_once "vues/squeletteGestPlat.php";

?>
