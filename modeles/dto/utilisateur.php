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

  public function __construct($unIdU, $uneCivilite, $unNom, $unPrenom, $unEmail, $unMdp, $unTypeU, $uneNoteAEasyFood, $unCommentaireAEasyFood, $unCommentaireAEasyFoodVisible, $unNumAdresse, $uneRueAdresse, $unCodePostale, $uneVille){

      $this->idU  = $unIdU;
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

    public function setId($unId){
      $this->idU = $unId;
    }
  ////// La civilité
      public function getCivilite(){
          return $this->civilite;
      }
      public function setCivilite($uneCivilite){
          $this->civilite = $uneCivilite;
      }
  ////// le nom
      public function getNom(){
          return $this->nom;
      }
      public function setNom($unNom){
          $this->nom = $unNom;
      }
  ////// le prénom
      public function getPrenom(){
          return $this->prenom;
      }
      public function setPrenom($unPrenom){
          $this->prenom = $unPrenom;
      }
  ////// l'adresse mail
      public function getEmail(){
          return $this->email;
      }
      public function setEmail($unEmail){
          $this->email = $unEmail;
      }
  ////// le mot de passe
      public function getMdp(){
          return $this->mdp;
      }
      public function setMdp($unMdp){
          $this->mdp = $unMdp;
      }
  ////// le type de l'utilisateur
      public function getTypeU(){
          return $this->typeU;
      }
      public function setTypeU($unTypeU){
          $this->typeU = $unTypeU;
      }
  ////// la note d'easy food
      public function getNoteAEasyFood(){
          return $this->noteAEasyFood;
      }
      public function setNoteAEasyFood($uneNoteAEasyFood){
          $this->noteAEasyFood = $uneNoteAEasyFood;
      }
  ////// le commentaire d'easy food
      public function getCommentaireAEasyFoodVisible(){
          return $this->commentaireAEasyFoodVisible;
      }
      public function setCommentaireAEasyFoodVisible($unCommentaireAEasyFoodVisible){
          $this->commentaireAEasyFoodVisible = $unCommentaireAEasyFoodVisible;
      }
  ////// savoir si le commentaire est visible
      public function getCommentaireAEasyFood(){
          return $this->commentaireAEasyFood;
      }
      public function setCommentaireAEasyFood($unCommentaireAEasyFood){
          $this->commentaireAEasyFood = $unCommentaireAEasyFood;
      }
  ////// le numero de l'adresse
      public function getNumAdresse(){
          return $this->numAdresse;
      }
      public function setNumAdresse($unNumAdresse){
          $this->numAdresse = $unNumAdresse;
      }
  ////// la rue de l'setRueAdresse
      public function getRueAdresse(){
          return $this->rueAdresse;
      }
      public function setRueAdresse($uneRueAdresse){
          $this->rueAdresse = $uneRueAdresse;
      }
  /////// le code de l'adresse
      public function getCodePostale(){
          return $this->codePostale;
      }
      public function setCodePostale($unCodePostale){
          $this->codePostale = $unCodePostale;
      }
  ////// la ville de l'adresse
      public function getVille(){
          return $this->ville;
      }
      public function setVille($uneVille){
          $this->ville = $uneVille;
      }
}
?>
