<div classe="conteneur">
	<header>
		<?php include_once 'haut.php' ;?>
	</header>

    <main>
        <div class='texteAccueil'>
            <h1><span>Connexion d'EasyFood</span></h1>
        </div>
        <div id="laform">
                <?php  $formulaireConnexion->afficherFormulaire();
                $formulairePourInscription->afficherFormulaire();
                ?>
        </div>
    </main>
</div>