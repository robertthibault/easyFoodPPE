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
		return $this->exec($sql) ;
	}

	public function delete($sql){
		return $this->exec($sql) ;
	}
}

class utilisateurDAO{

    public static function verification($unEmailUtilisateur, $unMdpUtilisateur){
        $sql = "select NOMU, PRENOMU, TYPEU from utilisateur where EMAILU = '" . $unEmailUtilisateur . "' and  MOTDEPASSEU = '" .  md5($unMdpUtilisateur) ."';";
        $login = DBConnex::getInstance()->queryFetchFirstRow($sql);
        return $login[0];
    }

<<<<<<< HEAD
		public static function dernierNumero(){
			$sql = "SELECT MAX(IDU) FROM UTILISATEUR;";
			$num = DBConnex::getInstance()->queryFetchFirstRow($sql);
			return intval($num[0]) + 1;
		}
=======
	public static function dernierNumero(){
		$sql = "SELECT MAX(IDU) FROM UTILISATEUR;";
		$num = DBConnex::getInstance()->queryFetchFirstRow($sql);
		return intval($num[0]) + 1;
	}
>>>>>>> origin/merge

	public static function ajouter(Utilisateur $utilisateur){
	    $sql = "INSERT INTO UTILISATEUR(IDU, CIVILITEU, NOMU, PRENOMU, EMAILU, MOTDEPASSEU, TYPEU)
                VALUES ('" . $utilisateur->getId() . "','" . $utilisateur->getCivilite() . "','" . $utilisateur->getNom() . "','" . $utilisateur->getPrenom() . "','"
								. $utilisateur->getEmail() . "','" . $utilisateur->getMdp() . "','" . $utilisateur->getTypeU() . "')";
	    return DBConnex::getInstance()->insert($sql);
	}
	//NOTEEASYFOOD, COMMENTAIREEASYFOOD, COMMENTAIREEASYFOODVISIBLE, NUMADRC, RUEADRC, CPR, VILLEC)
	//. $utilisateur->getNoteAEasyFood() . "','" . $utilisateur->getCommentaireAEasyFood() . "','" . $utilisateur->getCommentaireAEasyFoodVisible() . "','" . $utilisateur->getNumAdresse() .
	//"','" . $utilisateur->getRueAdresse() . "','" . $utilisateur->getCodePostale() . "','" . $utilisateur->getVille()

		public static function sonResto($unIdU){
			$sql = "SELECT * FROM resto WHERE IDU=".$unIdU;
			$resto = DBConnex::getInstance()->queryFetchFirstRow($sql);
			return $resto[0];
		}
}

class TypePlatDAO{

	public static function lesTypesPlats(){
		$result = [];
		$sql = "SELECT * FROM TYPE_PLAT;";
		$liste = DBConnex::getInstance()->queryFetchAll($sql);
		if(!empty($liste)){
			foreach($liste as $typePlat){
				$unTypePlat = new TypePlat($typePlat['IDT'], $typePlat['LIBELLET']);
				$unTypePlat->hydrate($typePlat);
				$result[] = $unTypePlat;
			}
		}
		return $result;
	}

		public static function dernierNumero(){
			$sql = "SELECT MAX(IDT) FROM TYPE_PLAT;";
			$num = DBConnex::getInstance()->queryFetchFirstRow($sql);
			return intval($num[0]) + 1;
		}
}

class RestoDAO{

	public static function lesRestos(){
		$result = [];
		$sql = "SELECT * FROM RESTO";
		$liste = DBConnex::getInstance()->queryFetchAll($sql);
		if(!empty($liste)){
			foreach($liste as $resto){
				$unResto = new Resto($resto['IDU'], $resto['NOMR'], $resto['NUMADRR'], $resto['RUEADRR'], $resto['CPR'], $resto['VILLER']);
				$unResto->hydrate($resto);
				$result[] = $unResto;
			}
		}
		return $result;
	}

		public static function dernierNumero(){
			$sql = "SELECT MAX(IDR) FROM RESTO;";
			$num = DBConnex::getInstance()->queryFetchFirstRow($sql);
			return intval($num[0]) + 1;
		}
}
class PlatDAO{

	//Paramètres : numéro id, nom du champ de la table
	public static function lesPlatsParId($unId, $champ){
		$result = [];
		$sql = "SELECT * FROM PLAT WHERE ".$champ."=".$unId;
		$liste = DBConnex::getInstance()->queryFetchAll($sql);
		if(!empty($liste)){
			foreach($liste as $plat){
				$unPlat = new Plat($plat['IDP'], $plat['IDR'], $plat['IDT'], $plat['NOMP'], $plat['PRIXFOURNISSEURP'], $plat['PRIXCLIENTP'], $plat['PLATVISIBLE'], $plat['DESCRIPTIONP']);
				$unPlat->hydrate($plat);
				$result[] = $unPlat;
			}
		}
		return $result;
	}

	public static function lePlatParId($unId, $champ){
		$sql = "SELECT * FROM PLAT WHERE ".$champ."=".$unId;
		$plat = DBConnex::getInstance()->queryFetchFirstRow($sql);
		$unPlat = new Plat($plat['IDP'], $plat['IDR'], $plat['IDT'], $plat['NOMP'], $plat['PRIXFOURNISSEURP'], $plat['PRIXCLIENTP'], $plat['PLATVISIBLE'], $plat['DESCRIPTIONP']);
		return $unPlat;
	}

	public static function sonTypePlat($unIdT){
		$sql = "SELECT * FROM type_plat WHERE IDT=".$unIdT;
		$typePlat = DBConnex::getInstance()->queryFetchFirstRow($sql);
		$unTypePlat = new TypePlat($typePlat['IDT'], $typePlat['LIBELLET']);
		return $unTypePlat;
		}

	public static function ajouter(Plat $plat){
		$sql = "INSERT INTO PLAT
						VALUES ('".$plat->getIdP().
						"','".$plat->getIdR().
						"','".$plat->getIdT().
						"','".$plat->getnomP().
						"','".$plat->getPrixFournisseurP().
						"','".$plat->getPrixClientP().
						"','".$plat->getPlatVisible().
						"','".$plat->getDescriptionP().
						"')";
		return DBConnex::getInstance()->insert($sql);
	}

	public static function modifier(Plat $plat){
		$sql = "UPDATE plat
						SET IDR = '" . $plat->getIdR() . "',
								IDT = '" . $plat->getIdT() . "',
								NOMP = '" . $plat->getNomP() . "',
								PRIXFOURNISSEURP = '" . $plat->getPrixFournisseurP() . "',
								PRIXCLIENTP	= " . $plat->getPrixClientP() . "',
								DESCRIPTIONP	= " . $plat->getDescriptionP() . "
						WHERE IDP = " . $plat->getIdP();
		return DBConnex::getInstance()->update($sql);
	}

	public static function dernierNumero(){
		$sql = "SELECT MAX(IDP) FROM PLAT;";
		$num = DBConnex::getInstance()->queryFetchFirstRow($sql);
		return intval($num[0]) + 1;
	}
}
/*
class CommentaireDAO{
	  public static function selectCommentaire()
	  {
	    $sql = "SELECT C.MAIL, R.NOMR, `NOTERAPIDITE`, `NOTEQUALITE`, `NOTETEMP`, `NOTECOUT`, `COMMENTAIRE` FROM `evaluer` AS E, `client` AS C, `resto` AS R WHERE R.IDR = E.IDR AND C.IDU = E.IDU";
	    $liste = DBConnex::getInstance()->queryFetchAll($sql);
	    if (count($liste) > 0)
	    {
	      foreach ($liste as $note)
	      {
	        $uneNote = new Evaluer($note['MAIL'], $note['NOMR'], $note['NOTERAPIDITE'],
	                              $note['NOTEQUALITE'], $note['NOTETEMP'],
	                              $note['NOTECOUT'], $note['COMMENTAIRE']);
	        $result[] = $uneNote;
	      }
	    }
	    return $result;
	  }
	}*/
