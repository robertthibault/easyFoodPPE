<?php
class TypePlat{

  private $idT;
  private $libelleT;

  function __construct($unLibelleT){
    $this->idT = TypePlatDAO::dernierNumero() + 1;
    $this->libelleT = $unLibelleT;
  }

  public function getIdT(){
    return $this->idT;
  }
  public function getLibelleT(){
    return $this->libelleT;
  }
  public function setLibelleT($unLibelleT){
    $this->libelleT = $unLibelleT;
  }

}

 ?>
