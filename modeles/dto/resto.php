<?php
class Resto{

  private $idR;
  private $utilisateur;
  private $nomR;
  private $numAdrr;
  private $rueAdrr;
  private $cpR;
  private $villeR;

  function __construct($idR, $utilisateur, $nomR, $numAdrr, $rueAdrr, $cpR, $villeR){
    $this->idR = $idR;
    $this->utilisateur = $utilisateur;
    $this->nomR = $nomR;
    $this->numAdrr = $numAdrr;
    $this->rueAdrr = $rueAdrr;
    $this->cpR = $cpR;
    $this->villeR = $villeR;
  }

  public function getIdR(){
    return $this->idR;
  }
  public function getUtilisateur(){
    return $this->utilisateur;
  }
  public function setUtilisateur($utilisateur){
    $this->utilisateur = $utilisateur;
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

  public function hydrate(array $donnees){
    foreach ($donnees as $key => $value){
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method))
        $this->$method($value);
    }
  }
}