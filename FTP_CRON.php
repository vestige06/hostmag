<?php
/*
	FTP CRON FULL CHECK
*/
#stander file size
define('FULL_SIZE',102400);

#a path array
$ori_list = array(
	array(
		'ftp_user' => 'htlg',
	),
);

#an avoid path array
$void_list = array(
	'ftp_user' => 'uuu',
);
#real path array
//$real_list=array_diff($ori_list,$void_list);
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
*/
function FTP_DO($path='',$size='',$param=''){
	if($path!='' && $size!='' && $param!=''){
		if(PATH_CHK($path,$size)==1){
			if(SET_MOD($path,$param)==1){
				return 1;
			}
			else{
			}
		}
		else{
		}

	}
	else{
	}

}
#$aa='';
#echo system('ls',$bb);
#echo $bb;
#FTP_CRON();
#echo PATH_CHK('/usr/local/www/Virtual/htlg',FULL_SIZE);
#PATH_CHK('/usr/local/www/Virtual/htlgg');

?>
