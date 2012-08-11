<html>
	<head>
	<meta charset="utf-8" />
	<meta name="Generator" content="EditPlus">
  	<meta name="Author" content="">
  	<meta name="Keywords" content="">
  	<meta name="Description" content="">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  	<link rel="stylesheet/less" type="text/css" href="less.css" media="all">
  	<script type="text/javascript" src="less-1.3.0.min.js"></script>
  	<script type="text/javascript" src="ajaxupload.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	</head>
<?
include("conn.php");
include("filter.php");
function makehtml($file='',$title='',$body='',$path='',$user='',$time='',$list='',$uid='')
{
	$fp=fopen($file,"r"); //只读打开模板  
	$str=fread($fp,filesize("post.html"));//读取模板中内容  
	$path=str_replace(" ", "-", $path);
	$str=str_replace("{title}",$title,$str);
	$str=str_replace("{time}",$time,$str);
	$str=str_replace("{user}",$user,$str);
	$str=str_replace("{list}",$list,$str);
	$str=str_replace("{uid}",$uid,$str);
	$str=str_replace("{body}",$body,$str);//替换内容  fclose($fp);   
	fclose($fp);
	 $handle=fopen($path,"w"); //写入方式打开新闻路径  
	  fwrite($handle,$str); //把刚才替换的内容写进生成的HTML文件  
	  fclose($handle);
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
function randomchar($length = 6)
{
	$char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
	for ($i=0; $i < $length; $i++) { 
		@$randomchar .= $char[rand(0,strlen($char)-1)];
	}
	return $randomchar;
}
if(@$_POST['title'])
{
		$body = filter($_POST['body']);
		//$query = addslashes($query); 
		//echo "<head><script>window.location = '$_SERVER[HTTP_REFERER]'</script></head>";
		//echo $query;
		$titileInPath = str_replace("/", "-", $_POST['title']);
		$titileInPath=str_replace(" ", "-", $titileInPath);
		$path = $_COOKIE['name']."/".$titileInPath.".html";
		@mkdir($_COOKIE['name']);
		//echo "提交成功了~马上返回！";
		$uid = randomchar();
		$query = "INSERT INTO post (id,time,title,body,user,path,uid) VALUES ('',now(),'$_POST[title]','$body','$_COOKIE[name]','$titileInPath','$uid')";
		mysql_query($query);
		makehtml($file='post.html',$_POST['title'],$body,$path,$_COOKIE['name'],date('Y-m-d'),$list='',$uid);
		?>
		<div id='alertbox'>
			<div style="text-align:center;padding:27px;">Your Post is vivid now , share to your friend ! you can check it first:</div><br/>
			<div style="text-align:center;padding:2px;font-size:20px;"><a href= <?php $path=str_replace(" ", "-", $path);echo "$path"; ?> > <?php echo "$_POST[title]"; ?> </a></div>
		</div>
		<?php
		$query = "SELECT * FROM post WHERE user = '$_COOKIE[name]' ORDER BY `id` DESC"; 
		$query_results = mysql_query($query);
		$lists='';
		while($row = mysql_fetch_array($query_results))
		{
			$time = substr($row['time'],0,10);
			$lists .= "<li><span style='color:gray'>$time</span> &raquo; <a href='$row[path].html'>$row[title]</a></li>";
		}
		//print_r($row);
		$path = "$_COOKIE[name]/index.html";
		makehtml($file='achieve.html',$title='',$body='',$path=$path,$user=$_COOKIE['name'],$time='',$list=$lists);
	}elseif(@$_GET['del'])
		{
		$query = "UPDATE id SET display = '0' WHERE id = '$_GET[del]'";
		mysql_query($query);
		echo "<head><script>window.location = '$_SERVER[HTTP_REFERER]'</script></head>";
		echo "已经删除了~马上返回！";
	}else{
		echo "<head><script>window.location = $_SERVER[HTTP_REFERER]'</script></head>";
		echo "oops,验证失败，重新验证吧！";
}	
?>
</html>