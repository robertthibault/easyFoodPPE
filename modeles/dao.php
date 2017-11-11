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

    public static function verification(Utilisateur $utilisateur){
        $sql = "select login from Utilisateur where login = '" . $utilisateur->getLogin() . "' and  mdp = '" .  md5($utilisateur->getMdp()) ."'";
        $login = DBConnex::getInstance()->queryFetchFirstRow($sql);
        return $login[0];
    }

		public static function dernierNumero(){
			$sql = "SELECT MAX(IDU) FROM UTILISATEUR;";
			$num = DBConnex::getInstance()->queryFetchFirstRow($sql);
			return intval($num[0]) + 1;
		}

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
		echo $sql;
		return DBConnex::getInstance()->insert($sql);
	}

	public static function dernierNumero(){
		$sql = "SELECT MAX(IDP) FROM PLAT;";
		$num = DBConnex::getInstance()->queryFetchFirstRow($sql);
		return intval($num[0]) + 1;
	}
}
