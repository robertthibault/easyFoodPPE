<div classe="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>

	<div id="Connexion">
			<p id ='titre'>Veuillez vous inscrire</p>
				<main>
					<?php echo $formulaireConnexion->afficherFormulaire() ?>
					<?php echo $formulairePourInscription->afficherFormulaire() ?>
			</main>
	</div>

	<footer>
		<?php include 'bas.php' ;?>
	</footer>

</div>
