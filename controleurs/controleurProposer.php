<?php

  $formulaireProposer = new Formulaire('post', 'index.php', 'fProposer', '');

  $formulaireEquipe->ajouterComposantLigne($formulaireEquipe->creerLabelFor('nom', 'Nom :'), 1);
  $formulaireEquipe->ajouterComposantLigne($formulaireEquipe->creerInputTexte('nom', 'nom', '', 1, ''), 1);
  $formulaireEquipe->ajouterComposantTab();

 ?>
