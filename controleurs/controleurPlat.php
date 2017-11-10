<?php

$plats = platDAO::lesPlats();

$formulairePlat = new Formulaire('post', 'index.php', 'fPlat', '');
foreach ($plats as Plat) {
  $formulairePlat->ajouterComposantLigne($formulairePlat->creerInputImage());
  $formulairePlat->ajouterComposantLigne($formulairePlat->creerLabelFor("nom", "Nom :"), 1);
  $formulairePlat->ajouterComposantLigne($formulairePlat->creerInputTexte("nom", "nom", '',1, ''), 1);
  $formulairePlat->ajouterComposantTab();


}



$formulaireInscription->creerFormulaire();

?>
