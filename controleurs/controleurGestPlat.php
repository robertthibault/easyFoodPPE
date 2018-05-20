<?php

$restoUtilisateur = utilisateurDAO::getResto($_SESSION['identification']['IDU']);
$plats = PlatDAO::listPlat($restoUtilisateur);

if (isset($_POST['btnProposer'])) {
    $_SESSION['easyFoodMP'] = "Proposer";
    include_once dispatcher::dispatch($_SESSION['easyFoodMP']);
}

include_once "vues/squeletteGestPlat.php";