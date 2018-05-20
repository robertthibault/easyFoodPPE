<?php

class Plat{
  private $idP;
  private $resto;
  private $typePlat;
  private $nomP;
  private $prixFournisseurP;
  private $prixClientP;
  private $platVisible;
  private $descriptionP;

  function __construct($idP, $resto, $typePlat, $nomP, $prixFournisseurP, $prixClientP, $estVisible, $descriptionP)
  {
    $this->idP = $idP;
    $this->resto = $resto;
    $this->typePlat = $typePlat;
    $this->nomP = $nomP;
    $this->prixFournisseurP = $prixFournisseurP;
    $this->prixClientP = $prixClientP;
    $this->platVisible = $estVisible;
    $this->descriptionP = $descriptionP;

  }
  public function getIdP(){
    return $this->idP;
  }
  public function getResto(){
    return $this->resto;
  }
  public function setResto($resto){
    $this->resto = $resto;
  }
  public function getTypePlat(){
    return $this->typePlat;
  }
  public function setTypePlat($typePlat){
    $this->typePlat = $typePlat;
  }
  public function getNomP(){
    return $this->nomP;
  }
  public function setNomP($unNomP){
    $this->nomP=$unNomP;
  }
  public function getPrixFournisseurP(){
    return $this->prixFournisseurP;
  }
  public function setPrixFournisseurP($unPrixFournisseurP){
    $this->prixFournisseurP = $unPrixFournisseurP;
  }
  public function getPrixClientP(){
    return $this->prixClientP;
  }
  public function setPrixClientP($unPrixClientP){
    $this->prixClientP = $unPrixClientP;
  }
  public function getPlatVisible(){
    return $this->platVisible;
  }
  public function setPlatVisible($estVisible){
    $this->platVisible = $estVisible;
  }
  public function getDescriptionP(){
    return $this->descriptionP;
  }
  public function setDescriptionP($uneDescriptionP){
    $this->descriptionP = $uneDescriptionP;
  }

  public function hydrate(array $donnees){
      foreach ($donnees as $key => $value){
          $method = 'set'.ucfirst($key);
          if (method_exists($this, $method))
              $this->$method($value);
      }
  }

}