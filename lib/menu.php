<?php
class Menu{
	private $style;

	private $composants = array();

	public function __construct($unStyle ){
		$this->style = $unStyle;
	}


	public function ajouterComposant($unComposant){
		$this->composants[] = $unComposant;
	}

	
	
	
	public function creerItemImage($uneValue,$uneImage,$uneEtiquette){
		$composant = array();
		$composant[0] = $uneValue ;
		$composant[1] = $uneImage ;
		$composant[2] = $uneEtiquette ;
		return $composant;
	}
	
	
	
	public function afficherMenu($composantActif){
		$menu = "<ul class = '" .  $this->style . "'>";
		foreach($this->composants as $composant){
			
			if($composant[0] == $composantActif){
				$menu .= "<li class='actif'>";
				$menu .= "<img src = '" . $composant[1] . "' />";
				$menu .= "<br/><span>" . $composant[2] . "</span>";
			}
			else{
				$menu .= "<li>";
				$menu .= "<a href='index.php?menuPrincipalC=" . $composant[0] . "'>";
				$menu .= "<img src = '" . $composant[1] . "' />";
				$menu .= "</a>";
				$menu .= "<br/><span>" . $composant[2] . "</span>";
			}
			$menu .= "</li>";
			
		}
		$menu .= "</ul>";
		echo $menu ;
	}
	

	public function creerItemLien($unLien,$uneValeur){
		$composant = array();
		$composant[1] = $unLien ;
		$composant[0] = $uneValeur ;
		return $composant;
	}
	
	public function creerMenuEquipe($composantActif){
		$menu = "<ul class = '" .  $this->style . "'>";
		foreach($this->composants as $composant){
			if($composant[0] == $composantActif){
				$menu .= "<li class='actif'>";
				$menu .=  "<img src = 'images/" . $composant[1]. ".png'/>";
				$menu .=  $composant[1] ;
			}
			else{
				$menu .= "<li>";
				$menu .= "<a href='index.php?action=afficher" ;
				$menu .= "&equipe=" . $composant[0] . "' >";
				$menu .=  "<img src = 'images/" . $composant[1]. ".png'/>";
				$menu .= $composant[1] ;
				$menu .= "</a>";
			}
			$menu .= "</li>";
		}
		$menu .= "</ul>";
		return $menu ;
	}
	
	public function creerMenuMatch($composantActif){
		$menu = "<ul class = '" .  $this->style . "'>";
		foreach($this->composants as $composant){
			if($composant[0] == $composantActif){
				$menu .= "<li class='actif'> Journée ";
				$menu .=  $composant[0] ;
			}
			else{
				$menu .= "<li>";
				$menu .= "<a href='index.php?action=afficher" ;
				$menu .= "&journee=" . $composant[0] . "' > Journée ";
				$menu .= $composant[0] ;
				$menu .= "</a>";
			}
			$menu .= "</li>";
		}
		$menu .= "</ul>";
		return $menu ;
	}

}