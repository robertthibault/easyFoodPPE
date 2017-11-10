<?php
class DBConnex extends PDO{

	private static $instance;

	public static function getInstance(){
		if ( !self::$instance ){
			self::$instance = new DBConnex();
		}
		return self::$instance;
	}

	function __construct(){
		try {
			parent::__construct(Param::$dsn ,Param::$user, Param::$pass);
		} catch (Exception $e) {
			echo $e->getMessage();
			die("Impossible de se connecter. " );
		}
	}

	public function __destruct(){
		if(!is_null(self::$instance)){
			self::$instance = null;
		}
	}


	public function queryFetchAll($sql){
		$sth  =$this->query($sql);

		if ( $sth ){
			return $sth -> fetchAll(PDO::FETCH_ASSOC);
		}

		return false;
	}


	public function queryFetchFirstRow($sql){
		$sth    = $this->query($sql);
		$result    = array();

		if ( $sth ){
			$result  = $sth -> fetch();
		}

		return $result;
	}


	public function insert($sql){
		if ( $this -> exec($sql) > 0 ){
			return 1;
			//$this->lastInsertId();
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
			return $num;
		}

}


class TypePlatDAO{

		public static function dernierNumero(){
			$sql = "SELECT MAX(IDT) FROM TYPE_PLAT;";
			$num = DBConnex::getInstance()->queryFetchFirstRow($sql);
			return $num;
		}

}

class RestoDAO{

		public static function dernierNumero(){
			$sql = "SELECT MAX(IDR) FROM RESTO;";
			$num = DBConnex::getInstance()->queryFetchFirstRow($sql);
			return $num;
		}

class platDAO{

	public static function dernierNumero(){
		$sql = "SELECT MAX(IDP) FROM PLAT;";
		$num = DBConnex::getInstance()->queryFetchFirstRow($sql);
		return $num;
	}

}
