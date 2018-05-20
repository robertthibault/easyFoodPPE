<?php
if (!isset($_SESSION['identification'])) {
    require_once 'vues/squeletteAcceuil.php';
}
else{
    require_once 'vues/squeletteAccueilConnex.php';
}
?>
