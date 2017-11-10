<?php

$plats = platDAO::lesPlats();

$formulairePlat = new Formulaire('post', 'index.php', 'fPlat', '');

foreach ($plats as $plat) {

  $formulairePlat->ajouterComposantLigne($formulairePlat->creerInputImage("images/".$plat->nomP.".jpg"),2);
  $formulairePlat->ajouterComposantLigne($formulairePlat->creerLabel($plat->nomP), 1);
  $formulairePlat->ajouterComposantLigne($formulairePlat->creerInputButton("Ajouter","Ajouter_".$plat->nomP), 1);
  $formulairePlat->ajouterComposantTab();

}

$formulairePlat->creerFormulaire();

?>
