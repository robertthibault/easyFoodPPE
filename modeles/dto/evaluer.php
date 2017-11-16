<?php

class Evaluer
{

  private   $idU;
  private   $idR;
  private   $noteQualiteNourriture;
  private   $noteRespectRecette;
  private   $noteEsthetique;
  private   $noteCout;
  private   $commentaireResto;
  private   $commentaireRestoVisible;

  function __construct($pidU, $pidR, $pnoteQualiteNourriture, $pnoteRespectRecette, $pnoteEsthetique, $pnoteCout, $commentaireResto, $pcommentaireRestoVisible)
  {
    $this->idU = $pidU;
    $this->idR = $pidR;
    $this->noteQualiteNourriture = $pnoteQualiteNourriture;
    $this->noteRespectRecette = $pnoteRespectRecette;
    $this->noteEsthetique = $pnoteEsthetique;
    $this->noteCout = $pnoteCout;
    $this->commentaireResto = $pcommentaireResto;
    $this->commentaireRestoVisible = $pcommentaireRestoVisible;
  }

  public function getIdU(){
    $this->idU;
  }

  public function getIdR(){
    $this->idR;
  }

  public function getNoteQualiteNourriture()
  {
    $this->noteQualiteNourriture;
  }

  public function getNoteRespectRecette()
  {
    $this->noteRespectRecette;
  }

  public function getNoteEsthetique()
  {
    $this->noteEsthetique;
  }

  public function getNoteCout()
  {
    $this->noteCout;
  }

  public function getCommentaireResto()
  {
    $this->commentaireResto;
  }

  public function getCommentaireRestoVisible()
  {
    $this->commentaireRestoVisible;
  }

}
 ?>
