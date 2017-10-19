<?php
class Utilisateur{
    private $email;
    private $mdp;

    public function __construct($unEmail, $unMdp){
        $this->email = $unEmail;
        $this->mdp = $unMdp;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($unEmail){
        $this->email = $unEmail;
    }
    public function getMdp(){
        return $this->mdp;
    }
    public function setMdp($unMdp){
        $this->mdp = $unMdp;
    }
}
