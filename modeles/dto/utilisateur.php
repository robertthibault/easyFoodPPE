<?php
class Utilisateur{
    private $login;
    private $mdp;

    public function __construct($unLogin  , $unMdp ){
        $this->login = $unLogin;
        $this->mdp = $unMdp;
    }
    public function getLogin(){
        return $this->login;
    }
    public function setLogin($unLogin){
        $this->login = $unLogin;
    }
    public function getMdp(){
        return $this->mdp;
    }
    public function setMdp($unMdp){
        $this->mdp = $unMdp;
    }
    public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}
}
