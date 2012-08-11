<?
include("conn.php");
if(@$_POST['name'])
{
	$query = "SELECT *  FROM user";
	$query_results = mysql_query($query);
	$flag = 0;
	while($row = mysql_fetch_array($query_results))
		{
		if($row['name'] == @$_POST['name'] && $row['password'] == @md5($_POST['password']))
			{
				$flag = 1;
				break;
			}
		}
	if($flag == 1)
	{	
		$en_password = md5($_POST['password']);
		setcookie("name", "$_POST[name]", time()+360000);
		setcookie("password", "$en_password", time()+360000);
		//echo "<head><script>window.location = '$_SERVER[HTTP_REFERER]'</script></head>";
		?>
		<html>
		<head>
			<title>User Pad-Use.la</title>
		<?php include("header-include.php"); ?>
		</head>
		<body>
			<div id='alertbox'>
				<div style="text-align:center;padding:27px;">Dear <?php echo $_COOKIE['name'] ?>,Welcome!You can manage your post here ,or have a new post right now:</div><br/>
				<div style="text-align:center;padding:2px;font-size:20px;"><a class="btn" href="manage.php">Manage</a> <a class="btn" href="user.php">Create</a></div>
			</div>
		</body>
		<?php
	}else{
		echo "<head><script>window.location = '$_SERVER[HTTP_REFERER]'</script></head>";
	}
}elseif(@$_GET['logout'])
{
	if($_GET['logout'] == '1')
	{
		setcookie("name", "", time()-3600);
		setcookie("password", "", time()-3600);
		echo "<head><script>window.location = '$_SERVER[HTTP_REFERER]'</script></head>";
	}
}else{
	echo "hello";
}
?>