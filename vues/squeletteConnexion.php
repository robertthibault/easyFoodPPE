<div classe="conteneur">
	<header>
		<?php include_once 'haut.php' ;?>
	</header>

	<div id="formUniforme">
				<main>
					<?php  $formulaireConnexion->afficherFormulaire();
							 	 $formulairePourInscription->afficherFormulaire();
					?>
			 </main>
	</div>

	<footer>
		<?php include_once 'bas.php' ;?>
	</footer>

</div>
