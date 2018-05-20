<?php
require_once 'lib/autoload.php';
session_start();
?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>EasyFood</title>
    <style type="text/css">
        @import url(styles/EasyFood.css);
    </style>
    <link rel="icon" href="images/icone.png">
</head>

<body>
<div id="corp">
    <a href="index.php?menuPrincipal=Accueil" ><div id="banniere"><label id="Slogan">EasyFood où il est facile de manger</label></div></a>
    <div id="bande"></div>
    <?php
    include_once 'controleurs/controleurPrincipal.php';
    ?>
</div>

</body>
</html>