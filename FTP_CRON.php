<?php
/*
	FTP CRON FULL CHECK
*/
#stander file size
define('FULL_SIZE',102400);

#a path array
$ori_list = array('htlg','uuu');

#an avoid path array
$void_list = array('uuu');
#real path array
$real_list=array_diff($ori_list,$void_list);
//print_r($real_list);

/*
	@PATH_CHK
	return 0 is not over
	return 1 is over
	return -1 is not exist
	return -2 is invailed param
*/
function PATH_CHK($path='',$size=''){
	if($path!='' && $size!=''){
		if(file_exists($path)){
			#Step One
			$re = '/^(\d+).*/';
			$dir_size = preg_replace($re,'$1',`du -s $path`);
			if($dir_size < $size){
				return 0;
			}
			else{
				return 1;
			}
		}
		else{
			return -1;
		}
	}
	else{
		return -2;
	}
}

/*
	@SET_MOD
	return 1 succ
	return -1 syntax error
	return -2 loss param
*/
function SET_MOD($path='',$param=''){
	if($path!='' && $param!=''){
		system('chmod '.$param.' '.$path.'',$is);
		# Success call
		if($is==0){
			return 1;
		}
		else{
			return -1;
		}
	}
	else{
		return -2;
	}
}

/*
	@FTP_DO
	return 1 succ
	return -1 syntax error
	return -2 loss param
 */
function FTP_DO($path='',$size='',$param=''){
	if($path!='' && $size!='' && $param!=''){
		#TOKE ONE
		$res_one = PATH_CHK($path,$size);
		if($res_one==1){
			#TOKE TWO
			$res_two  = SET_MOD($path,$param);
			if($res_two==1){
				#Succ Chg
				return 1;
			}
			else if($res_two==-1){
				#Sytax Error
				return -1;
			}
		}
		else if($res_one==-1){
# Dir Not Exist
		}
		else if($res_one==0){
# File Not Over
		}
	}
	else{
#PARAM WRONG
		return -2;
	}
}



#$aa='';
#echo system('ls',$bb);
#echo $bb;
#FTP_CRON();
#echo PATH_CHK('/usr/local/www/Virtual/htlg',FULL_SIZE);
#PATH_CHK('/usr/local/www/Virtual/htlgg');

?>
