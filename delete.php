<meta charset="utf-8" />
<?php 
include("conn.php");
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
if (@$_GET['delete'] !='') {
		$query = "SELECT * FROM post WHERE uid = '$_GET[delete]'";
		$query_result = mysql_query($query);
		$row = mysql_fetch_array($query_result);
		$query = "SELECT * FROM user WHERE name = '$row[user]'";
		$query_result = mysql_query($query);
		$psw_row = mysql_fetch_array($query_result);
		$path = "$_COOKIE[name]/$row[path].html";
		unlink($path);
		if ($row['user'] == @$_COOKIE['name'] && $psw_row['password'] == @$_COOKIE['password']) {
			$query = "DELETE FROM post WHERE uid = '$row[uid]'";
			mysql_query($query);
			$query = "SELECT * FROM post WHERE user = '$_COOKIE[name]' ORDER BY `id` DESC"; 
			$query_results = mysql_query($query);
			$lists='';
			while($row = mysql_fetch_array($query_results))
			{
				$time = substr($row['time'],0,10);
				$lists .= "<li><span style='color:gray'>$time</span> &raquo; <a href='$row[path].html'>$row[title]</a></li>";
			}
			$path = "$_COOKIE[name]/index.html";
			makehtml($file='achieve.html',$title='',$body='',$path=$path,$user=$_COOKIE['name'],$time='',$list=$lists);
			echo "<head><script>window.location = '$_SERVER[HTTP_REFERER]'</script></head>";
			echo "已经删除了~马上返回！";
		}else{
			echo "bad request!";
		}
	}
 ?>