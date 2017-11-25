<div classe="conteneur">
	<header>
		<?php include_once 'haut.php' ;?>
	</header>

	<div id="formUniforme">
				<main>
					<?php  $formulaireConnexion->afficherFormulaire();
							 	 $formulairePourInscription->afficherFormulaire();
								 if(isset($msg)){
				 					echo $msg;
				 				}
					?>
			</main>
	</div>

	<footer>
		<?php include_once 'bas.php' ;?>
	</footer>

</div>
