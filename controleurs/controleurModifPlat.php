<?php

  $unPlat = PlatDAO::lesPlatsParId($_SESSION['idPlat'], 'IDP');
  //$plat = new Plat($unPlat['IDP'], $unPlat['IDR'], $unPlat['IDT'], $unPlat['NOMP'], $unPlat['PRIXFOURNISSEURP'], $unPlat['PRIXCLIENTP'], $unPlat['PLATVISIBLE'], $unPlat['DESCRIPTIONP']);

  $formulaireModifPlat = new Formulaire('post', 'index.php', 'fModifPlat', '');

  $formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerLabelFor('nom', 'nom'), 1);
  //$formulaireModifPlat->ajouterComposantLigne($formulaireModifPlat->creerInputTexte('nom', 'nom', $plat->getNomP(), 1, ''), 1);

 ?>
