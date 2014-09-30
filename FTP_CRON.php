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
$real_list=array_diff($ori_list,$void_list);
print_r($real_list);

/*
	@PATH_CHK
	return 0 is not over
	return 1 is over
	return -1 is not exist
	return -2 is invailed param
*/
function PATH_CHK($str='',$size=''){
	if($str!='' && $size!=''){
		if(file_exists($str)){
			#Step One
			$re = '/^(\d+).*/';
			$dir_size = preg_replace($re,'$1',`du -s $str`);
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

function FTP_CRON(){




}

#FTP_CRON();
#echo PATH_CHK('/usr/local/www/Virtual/htlg',FULL_SIZE);
#PATH_CHK('/usr/local/www/Virtual/htlgg');

?>
