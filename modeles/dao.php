<?php
class DBConnex extends PDO{

	private static $instance;

	public static function getInstance(){
		if (!self::$instance){
			self::$instance = new DBConnex();
		}
		return self::$instance;
	}

	function __construct(){
		try {
			parent::__construct(Param::$dsn ,Param::$user, Param::$pass);
		} catch (Exception $e) {
			echo $e->getMessage();
			die("Impossible de se connecter.");
		}
	}

	public function __destruct(){
		if(!is_null(self::$instance)){
			self::$instance = null;
		}
	}

	public function queryFetchAll($sql){
		$sth = $this->query($sql);
		if ($sth){
			return $sth->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}


	public function queryFetchFirstRow($sql){
		$sth = $this->query($sql);
		$result = array();
		if ($sth){
			$result = $sth->fetch();
		}
		return $result;
	}

	public function insert($sql){
		if ($this->exec($sql) > 0){
			return true;
		}
		return false;
	}

	public function update($sql){
		if ($this->exec($sql) > 0){
			return true;
		}
		return false;
	}

	public function delete($sql){
		if ($this->exec($sql) > 0){
			return true;
		}
		return false;
	}
}

class utilisateurDAO{

    public static function verification($unEmailUtilisateur, $unMdpUtilisateur){
        $sql = "select * from UTILISATEUR where EMAILU = '" . $unEmailUtilisateur . "' and  MOTDEPASSEU = '" .  md5($unMdpUtilisateur) ."';";
        $login = DBConnex::getInstance()->queryFetchFirstRow($sql);
        return $login;
    }

    public static function getUtilisateur($id){
        $sql = "SELECT * FROM utilisateur WHERE IDU=" . $id;
        $utilisateur = DBConnex::getInstance()->queryFetchFirstRow($sql);
        if (empty($utilisateur))
            return null;
        return new Utilisateur(
            $utilisateur['IDU'],
            $utilisateur['CIVILITEU'],
            $utilisateur['NOMU'],
            $utilisateur['PRENOMU'],
            $utilisateur['EMAILU'],
            $utilisateur['MOTDEPASSEU'],
            $utilisateur['TYPEU'],
            $utilisateur['NOTEEASYFOOD'],
            $utilisateur['COMMENTAIREEASYFOOD'],
            $utilisateur['COMMENTAIREEASYFOODVISIBLE'],
            $utilisateur['NUMADRC'],
            $utilisateur['RUEADRC'],
            $utilisateur['CPR'],
            $utilisateur['VILLEC']
        );
    }

    public static function verificationModif($unId, $uneCivilite, $unNom, $unPrenom, $unEmail){
        $sql = "select * from UTILISATEUR where NOMU='" . $unNom . "' AND PRENOMU='" . $unPrenom . "' AND EMAILU='" . $unEmail . "' AND CIVILITEU='" . $uneCivilite . "' AND IDU =" . $unId . ";";
        $login = DBConnex::getInstance()->queryFetchFirstRow($sql);
        return $login;
    }

	 public static function dernierNumero(){
		 $sql = "SELECT MAX(IDU) FROM UTILISATEUR;";
		 $num = DBConnex::getInstance()->queryFetchFirstRow($sql);
		 return intval($num[0]) + 1;
	 }

	 public static function ajouter(Utilisateur $utilisateur){
	     $sql = "INSERT INTO UTILISATEUR(IDU, CIVILITEU, NOMU, PRENOMU, EMAILU, MOTDEPASSEU, TYPEU)
                 VALUES ('" . $utilisateur->getId() . "','" . $utilisateur->getCivilite() . "','" . $utilisateur->getNom() . "','" . $utilisateur->getPrenom() . "','"
								 . $utilisateur->getEmail() . "','" . $utilisateur->getMdp() . "','" . $utilisateur->getTypeU() . "')";
	     return DBConnex::getInstance()->insert($sql);
	 }

	 public static function modifier($unId, $uneCivilite, $unNom, $unPrenom, $unEmail){
	     $sql = "UPDATE UTILISATEUR SET NOMU='" . $unNom . "', PRENOMU='" . $unPrenom . "', EMAILU='" . $unEmail . "', CIVILITEU='" . $uneCivilite . "' WHERE IDU = " . $unId;
	     return DBConnex::getInstance()->update($sql);
	 }

	 public static function supprimer($unIdU){
        $sql = "DELETE FROM UTILISATEUR WHERE IDU=".$unIdU;
        return DBConnex::getInstance()->delete($sql);
	 }

	//NOTEEASYFOOD, COMMENTAIREEASYFOOD, COMMENTAIREEASYFOODVISIBLE, NUMADRC, RUEADRC, CPR, VILLEC)
	//. $utilisateur->getNoteAEasyFood() . "','" . $utilisateur->getCommentaireAEasyFood() . "','" . $utilisateur->getCommentaireAEasyFoodVisible() . "','" . $utilisateur->getNumAdresse() .
	//"','" . $utilisateur->getRueAdresse() . "','" . $utilisateur->getCodePostale() . "','" . $utilisateur->getVille()

    public static function getResto($id){
        $sql = "SELECT * FROM resto WHERE IDU=".$id;
        $resto = DBConnex::getInstance()->queryFetchFirstRow($sql);
        if (empty($resto))
            return null;
        return new Resto(
            $resto['IDR'],
            utilisateurDAO::getUtilisateur($resto['IDU']),
            $resto['NOMR'],
            $resto['NUMADRR'],
            $resto['RUEADRR'],
            $resto['CPR'],
            $resto['VILLER']
        );
    }

    public static function modifierMdp($unId, $unMdp){
        $sql = "UPDATE UTILISATEUR SET MOTDEPASSEU='" . md5($unMdp) . "' WHERE IDU = " . $unId;
        return DBConnex::getInstance()->update($sql);
    }

    public static function verificationMdp($unId, $unAncienMdp){
        $sql = "select count(IDU) from UTILISATEUR where MOTDEPASSEU ='" . $unAncienMdp . "' AND IDU =" . $unId . ";";
        $nb = DBConnex::getInstance()->queryFetchFirstRow($sql);
        return $nb;
    }

    public static function recupNonVisible(){
        $sql = "SELECT NOMU, PRENOMU, COMMENTAIREEASYFOOD, COMMENTAIREEASYFOODVISIBLE, IDU FROM `utilisateur` WHERE COMMENTAIREEASYFOODVISIBLE = 0;";
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        return $liste;
    }

    public static function modifierVisible($idUser){
        $sql = "UPDATE `utilisateur` SET `COMMENTAIREEASYFOODVISIBLE`= 1 WHERE `IDU`=". $idUser . ";";
        return DBConnex::getInstance()->update($sql);
    }
}

class TypePlatDAO{

	public static function listTypePlat(){
		$result = [];
		$sql = "SELECT * FROM TYPE_PLAT;";
		$liste = DBConnex::getInstance()->queryFetchAll($sql);
		if(!empty($liste))
			foreach($liste as $typePlat)
				$result[] = new TypePlat($typePlat['IDT'], $typePlat['LIBELLET']);
		return $result;
	}

	public static function getTypePlat($id){
	    $sql = "SELECT * FROM TYPE_PLAT WHERE IDT=" . $id;
	    $typePlat = DBConnex::getInstance()->queryFetchFirstRow($sql);
	    return new TypePlat(
            $typePlat['IDT'],
            $typePlat['LIBELLET']);
    }

    public static function addTypePlat(TypePlat $typePlat){
	    $sql = "INSERT INTO type_plat
                VALUES('".
                    $typePlat->getIdT()."','".
                    $typePlat->getLibelleT()."'
                )";
	    return DBConnex::getInstance()->insert($sql);
    }

    public static function dernierNumero(){
        $sql = "SELECT MAX(IDT) FROM TYPE_PLAT;";
        $num = DBConnex::getInstance()->queryFetchFirstRow($sql);
        return intval($num[0]) + 1;
    }
}

class RestoDAO{

	public static function listResto(){
		$restos = [];
		$sql = "SELECT * FROM RESTO";
		$list = DBConnex::getInstance()->queryFetchAll($sql);
		if(empty($list))
		    return $restos;
		foreach($list as $resto){
		    $restos[] = new Resto(
		        $resto['IDR'],
                utilisateurDAO::getUtilisateur($resto['IDU']),
                $resto['NOMR'],
                $resto['NUMADRR'],
                $resto['RUEADRR'],
                $resto['CPR'],
                $resto['VILLER']);
		}
		return $restos;
	}

	public static function getResto($id){
        $sql = "SELECT * FROM resto WHERE IDR=" . $id;
        $plat = DBConnex::getInstance()->queryFetchFirstRow($sql);
        return new Resto(
            $plat['IDR'],
            utilisateurDAO::getUtilisateur($plat['IDU']),
            $plat['NOMR'],
            $plat['NUMADRR'],
            $plat['RUEADRR'],
            $plat['CPR'],
            $plat['VILLER']
        );
    }

	public static function dernierNumero(){
	    $sql = "SELECT MAX(IDR) FROM RESTO;";
	    $num = DBConnex::getInstance()->queryFetchFirstRow($sql);
	    return intval($num[0]) + 1;
	}

	public static function cherhceID($leNom){
        $sql = "SELECT IDR FROM resto WHERE NOMR = '". $leNom ."';";
        $num = DBConnex::getInstance()->queryFetchFirstRow($sql);
        return intval($num[0]);
    }

    public static function recupNom($lId){
        $sql = "SELECT NOMR FROM resto WHERE IDR = '". $lId ."';";
        $lenom = DBConnex::getInstance()->queryFetchFirstRow($sql);
        return $lenom;
    }
}

class PlatDAO{

	public static function listPlat(Resto $resto){
		$sql = "SELECT * FROM PLAT WHERE IDR=" . $resto->getIdR();
		$liste = DBConnex::getInstance()->queryFetchAll($sql);
		if (empty($liste))
		    return [];
		$plats = [];
		foreach($liste as $plat){
		    $plats[] = new Plat(
		        $plat['IDP'],
                $resto,
                typePlatDAO::getTypePlat($plat['IDT']),
                $plat['NOMP'],
                $plat['PRIXFOURNISSEURP'],
                $plat['PRIXCLIENTP'],
                $plat['PLATVISIBLE'],
                $plat['DESCRIPTIONP']);
		}
		return $plats;
	}

	public static function getPlat($id){
		$sql = "SELECT * FROM PLAT WHERE IDP=" . $id;
		$plat = DBConnex::getInstance()->queryFetchFirstRow($sql);
		return new Plat(
		    $plat['IDP'],
            RestoDAO::getResto($plat['IDR']),
            TypePlatDAO::getTypePlat($plat['IDT']),
            $plat['NOMP'],
            $plat['PRIXFOURNISSEURP'],
            $plat['PRIXCLIENTP'],
            $plat['PLATVISIBLE'],
            $plat['DESCRIPTIONP']);
	}

	/*public static function sonTypePlat($unIdT){
		$sql = "SELECT TYPE_PLAT.* FROM TYPE_PLAT, PLAT WHERE PLAT.IDT=". $unIdT . " AND PLAT.IDT=TYPE_PLAT.IDT";
		$typePlat = DBConnex::getInstance()->queryFetchFirstRow($sql);
		$unTypePlat = new TypePlat($typePlat['IDT'], $typePlat['LIBELLET']);
		return $unTypePlat;
	}*/

	public static function addPlat(Plat $plat){
		$sql = "INSERT INTO PLAT
				VALUES('".
                    $plat->getIdP()."','".
                    $plat->getResto()->getIdR()."','".
                    $plat->getTypePlat()->getIdT()."','".
                    $plat->getnomP()."','".
                    $plat->getPrixFournisseurP()."','".
                    $plat->getPrixClientP()."','".
                    $plat->getPlatVisible()."','".
                    $plat->getDescriptionP(). "'
                )";
		return DBConnex::getInstance()->insert($sql);
	}

	public static function setPlat(Plat $plat){
	    $sql = "UPDATE PLAT SET
	              IDR='".               $plat->getResto()->getIdR() . "',
		          IDT='".               $plat->getTypePlat()->getIdT() . "',
				  NOMP='".              $plat->getNomP() . "',
				  PRIXFOURNISSEURP='".  $plat->getPrixFournisseurP() . "',
				  PRIXCLIENTP='".       $plat->getPrixClientP() . "',
		          DESCRIPTIONP= '".     $plat->getDescriptionP() . "'
		        WHERE IDP=".$plat->getIdP();
		return DBConnex::getInstance()->update($sql);
	}

	public static function delPlat(Plat $plat){
	    $sql = "DELETE FROM plat WHERE IDP=" . $plat->getIdP();
	    return DBConnex::getInstance()->delete($sql);
    }

	public static function dernierNumero(){
		$sql = "SELECT MAX(IDP) FROM PLAT;";
		$num = DBConnex::getInstance()->queryFetchFirstRow($sql);
		return intval($num[0]) + 1;
	}

    public static function recupNonVisible(){
        $sql = "SELECT `resto`.`NOMR`,`plat`.`NOMP`, `plat`.`DESCRIPTIONP`, `plat`.`PLATVISIBLE`, `plat`.`IDP` FROM `plat`, `resto` WHERE `resto`.`IDR` = `plat`.`IDR` AND `plat`.`PLATVISIBLE` = 0;";
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        return $liste;
    }

    public static function modifierVisible($idPlat){
        $sql = "UPDATE `plat` SET `PLATVISIBLE`= 1 WHERE `IDP`=". $idPlat . ";";
        return DBConnex::getInstance()->update($sql);
    }
}

class CommandeDAO{

    public static function historique($sonId){
        //$result = array();
        $sql = "SELECT IDC, DATEC, MODEREGLEMENTC, COMMENTAIRECLIENTC FROM commande WHERE IDU= " . $sonId .";";
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        /*
        if(!empty($liste)){
            foreach($liste as $commande){
                $uneCommande = new commande($commande['IDC'], null, $commande['DATEC'], null, null, $commande['MODEREGLEMENTC']);
                $uneCommande->hydrate($commande);
                $result[] = $uneCommande;
            }
        }*/
        return $liste;
    }

    public static function  prixCommande($unIdCommande){
        $sql = "SELECT contenir.QUANTITE*plat.PRIXCLIENTP as prix FROM `plat`, `contenir` WHERE plat.IDP = contenir.IDP AND contenir.IDC = ". $unIdCommande . ";";
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        return $liste;
    }

    public static function detailCommande($unIdCommande){
        $sql = "SELECT plat.NOMP, contenir.QUANTITE, plat.PRIXCLIENTP, contenir.QUANTITE*plat.PRIXCLIENTP as total FROM `plat`, `contenir` WHERE plat.IDP = contenir.IDP AND contenir.IDC = ". $unIdCommande . ";";
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        return $liste;
    }

    public static function recupTout($unIdCommande){
        $sql = "SELECT * FROM `commande` WHERE IDC = ". $unIdCommande . ";";
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        return $liste;
    }

    public static function modifComm($lIdCommande, $lIdUser, $leComm){
        $sql = "UPDATE `commande` SET `COMMENTAIRECLIENTC`= '". $leComm ."' WHERE `IDC`=" . $lIdCommande ." AND `IDU`=". $lIdUser ." ;";
        return DBConnex::getInstance()->update($sql);
    }

}

class EvaluerDAO{

    public static function evaluerResto($unIdUtilisateur){
        $sql = "SELECT DISTINCT(resto.IDR), resto.NOMR FROM `evaluer`, `resto`, `plat`, `contenir`, `commande`, `utilisateur` WHERE utilisateur.IDU = ". $unIdUtilisateur . " AND plat.IDP = contenir.IDP AND commande.IDC = contenir.IDC AND utilisateur.IDU = commande.IDU AND plat.IDR = resto.IDR;";
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        return $liste;
    }

    public static function evaluer($unUser, $unResto){
        $sql = "SELECT count(IDR) as EXISTE, NOTEQUALITENOURRITURE, NOTERESPECTRECETTE, NOTEESTHETIQUE, NOTECOUT, COMMENTAIRERESTO FROM `evaluer` WHERE IDU = ". $unUser . " AND IDR = ". $unResto . ";";
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        return $liste;
    }

    public static function commentaire($unUser, $unResto){
        $sql = "SELECT * FROM `evaluer` WHERE IDU = ". $unUser . " AND IDR = ". $unResto . ";";
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        return $liste;
    }

    public static function existe($unUser, $unResto){
        $sql = "SELECT count(IDR) as nombre FROM `evaluer` WHERE IDU = ". $unUser . " AND IDR = ". $unResto . ";";
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        return $liste;
    }

    public static function ajouterEvaluation($idResto, $idUser, $noteNourriture, $noteRecette, $noteEsthetique, $noteCout, $commentaireResto, $visible){
        $sql = "INSERT INTO `evaluer`(`IDR`, `IDU`, `NOTEQUALITENOURRITURE`, `NOTERESPECTRECETTE`, `NOTEESTHETIQUE`, `NOTECOUT`, `COMMENTAIRERESTO`, `COMMENTAIRERESTOVISIBLE`) VALUES (". $idResto . ",". $idUser . ",". $noteNourriture . ",". $noteRecette . ",". $noteEsthetique . ",". $noteCout . ",'". $commentaireResto . "',". $visible . ")";
        return DBConnex::getInstance()->insert($sql);
    }

    public static function modifierEvaluation($idResto, $idUser, $noteNourriture, $noteRecette, $noteEsthetique, $noteCout, $commentaireResto, $visible){
        $sql = "UPDATE `evaluer` SET `NOTEQUALITENOURRITURE`=". $noteNourriture . ",`NOTERESPECTRECETTE`=". $noteRecette . ",`NOTEESTHETIQUE`=". $noteEsthetique . ",`NOTECOUT`=". $noteCout . ",`COMMENTAIRERESTO`='". $commentaireResto . "',`COMMENTAIRERESTOVISIBLE`=". $visible . " WHERE `IDR`=". $idResto . " AND `IDU`=". $idUser . ";";
        return DBConnex::getInstance()->update($sql);
    }

    public static function modifierVisible($idResto, $idUser){
        $sql = "UPDATE `evaluer` SET `COMMENTAIRERESTOVISIBLE`= 1 WHERE `IDR`=". $idResto . " AND `IDU`=". $idUser . ";";
        return DBConnex::getInstance()->update($sql);
    }

    public static function recupNonVisible(){
        $sql = "SELECT utilisateur.NOMU, utilisateur.PRENOMU, resto.NOMR, evaluer.COMMENTAIRERESTO, evaluer.COMMENTAIRERESTOVISIBLE, utilisateur.IDU, resto.IDR
                FROM `evaluer`, `resto`, `utilisateur` 
                WHERE `utilisateur`.`IDU` = `evaluer`.`IDU` AND `resto`.`IDR` = `evaluer`.`IDR` AND `evaluer`.`COMMENTAIRERESTOVISIBLE` = 0;";
        $liste = DBConnex::getInstance()->queryFetchAll($sql);
        return $liste;
    }

}