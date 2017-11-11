<?php
class TypePlat{

  private $idT;
  private $libelleT;

  function __construct($unIdT, $unLibelleT){
    $this->idT = $unIdT;
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

  public function hydrate(array $donnees){
		foreach ($donnees as $key => $value){
			$method = 'set'.ucfirst($key);
			if (method_exists($this, $method)){
				$this->$method($value);
			}
		}
	}

}

 ?>
