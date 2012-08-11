<?php 
if (@$_GET['edit'] !='') {
	$query = "SELECT * FROM post WHERE uid = '$_GET[edit]'";
	$query_result = mysql_query($query);
	$row = mysql_fetch_array($query_result);
	$query = "SELECT * FROM id WHERE user = '$row[user]'";
	$query_result = mysql_query($query);
	$psw_row = mysql_fetch_array($query_result);
	if ($row['name'] == @$_COOKIE['name'] && $psw_row['password'] == @$_COOKIE['password']) {
		# code...
	}
}
 ?>