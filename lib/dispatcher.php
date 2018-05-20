<?php

class dispatcher{

	public static function dispatch($unMenuP){
	    if(stristr($unMenuP, 'Déconnexion')){
            $unMenuP = 'Déconnexion';
        }
		$unMenuP = "controleur" . ucfirst($unMenuP) ;
		$unMenuP .= ".php";
		$unMenuP = "controleurs/" . $unMenuP;
		return $unMenuP ;
	}
}

