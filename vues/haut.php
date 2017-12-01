<nav class="menuPrincipal">
	<?php
		$formLogo = new Formulaire("post","index.php?menuPrincipal=Accueil","formLogo","formLogo");
		$formLogo->ajouterComposantLigne($formLogo->creerInputLogo("logo","logo","images\logo.png"));
		$formLogo->ajouterComposantTab();
		$formLogo->creerFormulaire();

		echo $easyFoodMP->creerMenu($_SESSION['easyFoodMP']);
		echo $formLogo->afficherFormulaire();
	?>
	<hr id="separateur_menuP">
</nav>
