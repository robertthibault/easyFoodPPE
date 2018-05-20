<?php
/**
 * Created by PhpStorm.
 * User: thibault.robert
 * Date: 13/03/2018
 * Time: 09:34
 */

class commande
{
    private $idC;
    private $idU;
    private $date;
    private $commentaire;
    private $dateLivraison;
    private $modeReglement;

    public function __construct($unIdC, $unIdU, $uneDate, $unCommentaire, $uneDateLivraison, $unModeReglement){

        $this->idC  = $unIdC;
        $this->idU  = $unIdU;
        $this->date = $uneDate;
        $this->commentaire =$unCommentaire;
        $this->dateLivraison = $uneDateLivraison;
        $this->modeReglement = $unModeReglement;

    }

    /**
     * @return mixed
     */
    public function getIdC()
    {
        return $this->idC;
    }

    /**
     * @param mixed $idC
     */
    public function setIdC($idC)
    {
        $this->idC = $idC;
    }

    /**
     * @return mixed
     */
    public function getIdU()
    {
        return $this->idU;
    }

    /**
     * @param mixed $idU
     */
    public function setIdU($idU)
    {
        $this->idU = $idU;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @param mixed $commentaire
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    /**
     * @return mixed
     */
    public function getDateLivraison()
    {
        return $this->dateLivraison;
    }

    /**
     * @param mixed $dateLivraison
     */
    public function setDateLivraison($dateLivraison)
    {
        $this->dateLivraison = $dateLivraison;
    }

    /**
     * @return mixed
     */
    public function getModeReglement()
    {
        return $this->modeReglement;
    }

    /**
     * @param mixed $modeReglement
     */
    public function setModeReglement($modeReglement)
    {
        $this->modeReglement = $modeReglement;
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

}