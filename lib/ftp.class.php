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

	/*
	 writing log..
	 return 1  SUCC
	 return -1  LOSE PARAM
	 return -2  FILE_NOT EXITST
	*/
	private function write_log($msg='',$act='',$path_file=''){
		if($msg!='' && $act!='' && $path_file!=''){
			if(file_exists($path_file)){
				file_put_contents($path,$msg.'\n',FILE_APPEND);
				return 1;
			}
			else{
				return -2;
			}
		}
		else{
			return -1;
		}
	}

	/*
	  Do a HTPASS COMMAND

	  @username	  USERNAME
	  @pwd		  PWD
	  @file		  SAVE FILE
	  return 1  SUCC
	  return -1  LOSE PARAM
	  return -2  FILE_NOT EXITST
	  return -3  EXCUTE WRONG
	*/
	private function HTPASS($username,$pwd,$file){
		if($username!='' && $pwd!='' && $file!=''){
			if(file_exists($file)){
				$is='';
				system('htpasswd -bd '.$file.' '.$username.' '.$pwd.'',$is);
				if($is==0){
					return 1;
				}
				else{
					return -3;
				}
			}
			else{
				return -2;
			}
		}
		else{
			return -1;
		}
	}

	#private function 
	//private function 

}

$a=new Ftp();
$a->addUser();

?>
