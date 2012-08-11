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
<?php 
include("conn.php");
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
if (@$_POST['name'] != "") {
	$query = "SELECT *  FROM user";
	$query_results = mysql_query($query);
	$flag = 0;	
	while($row = mysql_fetch_array($query_results))
	{
		if($row['name'] == @$_POST['name'] || $row['email'] == @$_POST['email'])
		{
			$flag = 1;
		}
	}
	if ($flag == 1) {
		echo "sorry,the mail or the name has been used,try another one!";
	}else{
		$password = md5($_POST['password']);
		$query = "INSERT INTO user (id,name,password,time,email) VALUES ('','$_POST[name]','$password',now(),'$_POST[email]')";
		mysql_query($query);
		//echo $query;
		//echo "success!";
		?>
		<div id='alertbox'>
			<div style="text-align:center;padding:27px;">Congratulations! Register successfully,you can begin your writing NOW!</div><br/>
			<div style="text-align:center;padding:2px;"><a href="user.php">Click here to start</a></div>
		</div>
		 <?php 
		setcookie("name", "$_POST[name]", time()+360000);
		setcookie("password", "$password", time()+360000);
	}
}
 ?>
</html>