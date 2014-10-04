<?php
require_once '../config/db_config.php';
class Dbconn extends PDO{
	private $_pdo = null;  
	static private $_instance = null;  

	public function __construct() {  
		try {  
			$this->_pdo = new PDO("mysql:host=".$dbconfig['host'].";dbname=".$dbconfig['dbname']."",$dbconfig['user'],$dbconfig['password'],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",PDO::ATTR_PERSISTENT => true));  
			$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
		} catch (PDOException $e) {  
			exit($e->getMessage());  
		}  
	}  
	static function getConn() {  
		if (!(self::$_instance instanceof self)) {  
			self::$_instance = new self();  
		}  
		return self::$_instance;  
	}  
}
?>
