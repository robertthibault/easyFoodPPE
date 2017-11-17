<div>

  <?php
    echo "Les plats de : " . $_SESSION['identification']['PRENOMU'] . " " . $_SESSION['identification']['NOMU'];
    $formulaireGestPlat->afficherFormulaire();
  ?>

</div>
