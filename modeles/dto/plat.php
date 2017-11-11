<?php

class Plat
{
  private $idP;
  private $idR;
  private $idT;
  private $nomP;
  private $prixFrounisseurP;
  private $prixClientP;
  private $platVisible;
  private $descriptionP;

  function __construct($unIdR,$unIdT,$unNomP,$unPrixFournisseurP,$unPrixClientP,$estVisible,$uneDescriptionP)
  {
    $this->idP = platDAO::dernierNumero();
    $this->idR = $unIdR;
    $this->idT = $unIdT;
    $this->nomP = $unNomP;
    $this->prixFournisseurP = $unPrixFournisseurP;
    $this->prixClientP = $unPrixClientP;
    $this->platVisible = $estVisible;
    $this->descriptionP = $uneDescriptionP;

  }
  public function getIdP(){
    return $this->idP;
  }
  public function getIdR(){
    return $this->idR;
  }
  public function setIdR($unIdR){
    $this->idR = $unIdR;
  }
  public function getIdT(){
    return $this->idT;
  }
  public function setIDT($unIdT){
    $this->idT=$unIdT;
  }
  public function getnomP(){
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

}




 ?>
