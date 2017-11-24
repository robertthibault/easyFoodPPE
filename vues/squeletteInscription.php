<div id="conteneur">

<div id="header">
		<?php include_once 'haut.php' ; ?>
	</div>

	<div id="content">
		<div id="inscription">
				<p id ='titre'>Veuillez vous inscrire</p>
				<?php $formulaireInscription->afficherFormulaire();
				if(isset($msg)){
					echo $msg;
				}?>

		</div>
		</div>
	</div>

	<div id="bas">
		<?php include_once 'bas.php' ;?>
	</div>

</div>
