<?php
class Utilisateur{

  private $idU;
  private $civilite;
  private $nom;
  private $prenom;
  private $email;
  private $mdp;
  private $typeU;
  private $noteAEasyFood;
  private $commentaireAEasyFood;
  private $commentaireAEasyFoodVisible;
  private $numAdresse;
  private $rueAdresse;
  private $codePostale;
  private $ville;

  public function __construct($uneCivilite, $unNom, $unPrenom, $unEmail, $unTypeU, $unMdp, $uneNoteAEasyFood, $unCommentaireAEasyFood, $unCommentaireAEasyFoodVisible, $unNumAdresse, $uneRueAdresse, $unCodePostale, $uneVille){

      $this->idU  = utilisateurDAO::dernierNumero();
      $this->civilite = $uneCivilite;
      $this->nom = $unNom;
      $this->prenom = $unPrenom;
      $this->email = $unEmail;
      $this->mdp = $unMdp;
      $this->typeU = $unTypeU;
      $this->noteAEasyFood = $uneNoteAEasyFood;
      $this->commentaireAEasyFood =$unCommentaireAEasyFood;
      $this->commentaireAEasyFoodVisible = $unCommentaireAEasyFoodVisible;
      $this->numAdresse = $unNumAdresse;
      $this->rueAdresse = $uneRueAdresse;
      $this->codePostale = $unCodePostale;
      $this->ville = $uneVille;

  }

  //Les accesseurs
  
    public function getId(){
        return $this->idU;
    }
  //////
      public function getCivilite(){
          return $this->civilite;
      }
      public function setCivilite($uneCivilite){
          $this->civilite = $uneCivilite;
      }
  //////
      public function getNom(){
          return $this->nom;
      }
      public function setNom($unNom){
          $this->nom = $unNom;
      }
  //////
      public function getPrenom(){
          return $this->prenom;
      }
      public function setPrenom($unPrenom){
          $this->prenom = $unPrenom;
      }
  //////
      public function getEmail(){
          return $this->email;
      }
      public function setEmail($unEmail){
          $this->email = $unEmail;
      }
  //////
      public function getMdp(){
          return $this->mdp;
      }
      public function setMdp($unMdp){
          $this->mdp = $unMdp;
      }
  //////
      public function getTypeU(){
          return $this->$unTypeU;
      }
      public function setTypeU($unTypeU){
          $this->typeU = $unTypeU;
      }
  //////
      public function getNoteAEasyFood(){
          return $this->noteAEasyFood;
      }
      public function setNoteAEasyFood($uneNoteAEasyFood){
          $this->noteAEasyFood = $uneNoteAEasyFood;
      }
  //////
      public function getCommentaireAEasyFoodVisible(){
          return $this->commentaireAEasyFoodVisible;
      }
      public function setCommentaireAEasyFoodVisible($unCommentaireAEasyFoodVisible){
          $this->commentaireAEasyFoodVisible = $unCommentaireAEasyFoodVisible;
      }
  //////
      public function getCommentaireAEasyFood(){
          return $this->commentaireAEasyFood;
      }
      public function setCommentaireAEasyFood($unCommentaireAEasyFood){
          $this->commentaireAEasyFood = $unCommentaireAEasyFood;
      }
  //////
      public function getNumAdresse(){
          return $this->numAdresse;
      }
      public function setNumAdresse($unNumAdresse){
          $this->numAdresse = $unNumAdresse;
      }
  //////
      public function getRueAdresse(){
          return $this->rueAdresse;
      }
      public function setRueAdresse($uneRueAdresse){
          $this->rueAdresse = $uneRueAdresse;
      }
  ///////
      public function getCodePostale(){
          return $this->codePostale;
      }
      public function setCodePostale($unCodePostale){
          $this->codePostale = $unCodePostale;
      }
  //////
      public function getVille(){
          return $this->ville;
      }
      public function setVille($uneVille){
          $this->ville = $uneVille;
      }
}
?>
