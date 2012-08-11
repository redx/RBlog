<?php
setlocale(LC_ALL, 'zh_CN.UTF8');
function get_basename($filename)
{
    return preg_replace('/^.+[\\\\\\/]/', '', $filename);
}
function checkIllegal()
{
	$pre = strtolower(@$_SERVER['HTTP_REFERER']);
	$should = strtolower(@$_SERVER['HTTP_HOST']);
	$check = strpos($pre,$should);
	if(!$check)
	{
		die("貌似您的提交是非法的哟！");
	}
}
checkIllegal();
	$file_path = 'uploads/';
	$file_up = $file_path.get_basename($_FILES['upload']['name']);
	if(move_uploaded_file($_FILES['upload']['tmp_name'],$file_up)){
		echo 'success';
		mkdice($file_up);
	}else{
		echo 'fail';
	}
?>