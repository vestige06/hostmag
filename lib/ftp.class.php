<?php
/**
 * MANAGER CLASS OF FTP ALLOC
 **/
require_once "../config/ftp.conf.php"; 
require_once "../config/conn.php";
class Ftp{
	public function addUser($username=''){
		
		if($username != ''){
			# encode an random password
			$pwd = $this->rand_password(6);



		}
		else{
			return '';
		}
	}

	private function rand_password($length=8){
		$pwd = substr(md5(time()),0,6);
		return $pwd;
	}
}

$a=new Ftp();
$a->addUser();

?>
