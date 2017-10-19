<?php

class Restaurateur extends Utilisateur{

  private function __construct($unEmail, $unMdp, $uneCivilite, $unNom, $unPrenom){
    parent::__construct($unEmail, $unMdp,  $uneCivilite, $unNom, $unPrenom);
    $this->id = parent::$dernierNumero;
  }

  }

}

 ?>
