<?php
class Resto{

  private $idR;
  private $idU;
  private $nomR;
  private $numAdrr;
  private $rueAdrr;
  private $cpR;
  private $villeR;

  function __construct($unIdU, $unNomR, $unNumAdrr, $uneRueAdrr, $unCpR, $uneVilleR){
    $this->idR = RestoDAO::dernierNumero() + 1;
    $this->idU = $unIdU;
    $this->nomR = $unNomR;
    $this->numAdrr = $unNumAdrr;
    $this->rueAdrr = $uneRueAdrr;
    $this->cpR = $unCpR;
    $this->villeR = $uneVilleR;
  }

  public function getIdR(){
    return $this->idR;
  }
  public function getIdU(){
    return $this->idU;
  }
  public function setIdU($unIdU){
    $this->idU = $unIdU;
  }
  public function getNomR(){
    return $this->nomR;
  }
  public function setNomR($unNomR){
    $this->nomR = $unNomR;
  }
  public function getNumAdrr(){
    return $this->numAdrr;
  }
  public function setNumAdrr($unNumAdrr){
    $this->numAdrr = $unNumAdrr;
  }
  public function getRueAdrr(){
    return $this->rueAdrr;
  }
  public function setRueAdrr($uneRueAdrr){
    $this->rueAdrr = $uneRueAdrr;
  }
  public function getCpR(){
    return $this->cpR;
  }
  public function setCpR($unCpR){
    $this->cpR = $unCpR;
  }
  public function getVilleR(){
    return $this->villeR;
  }
  public function setVilleR($uneVilleR){
    $this->villeR = $uneVilleR;
  }

}


 ?>
