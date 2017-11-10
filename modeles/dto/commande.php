<?php
/**
 *
 */
class Commande
{
  private $idC;
  private $idU;
  private $dateC;
  private $commentaireClientC;
  private $dateLivreC;
  private $modeReglementC;

  function __construct($unIdU,$uneDateC,$unCommentaireClientC,$uneDateLivreC,$unModeReglementC)
  {
    $this->idC = commandeDAO:: dernierNumero()+1;
    $this->IDU = $unIdU;
    $this->dateC = $uneDateC;
    $this->commentaireClientC = $unCommentaireClientC;
    $this->dateLivreC = $uneDateLivreC;
    $this->modeReglementC = $unModeReglementC;
  }
  public function getidC(){
    return $this->idC;
  }
  public function getidU(){
    return $this->idU;
  }
  public function setIdU($unIdU){
    $this->idU = $unIdU;
  }
  public function getDateC(){
    return $this->dateC;
  }
  public function setDateC($uneDateC){
    $this->dateC = $uneDateC;
  }
  public function getcommentaireClientC(){
    return $this->commentaireClientC;
  }
  public function setCommentaireClientC($unCommentaireClientC){
    $this->commentaireCLientC = $unCommentaireClientC;
  }
  public function getDateLivreC(){
    return $this->dateLivreC;
  }
  public function setDateLivreC($uneDateLivreC){
    $this->dateLivreC = $uneDateLivreC;
  }
  public function getmodeReglementC(){
    return $this->modereglementC;
  }
  public function setModeReglementC($unModeReglementC){
    $this->modeReglementC = $unModeReglementC;
  }
}




 ?>
