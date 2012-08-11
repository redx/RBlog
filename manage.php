<?php
include("conn.php");
$query = "SELECT *  FROM user";
$query_results = mysql_query($query);
$flag = 0;	
while($row = mysql_fetch_array($query_results))
{
	if($row['name'] == @$_COOKIE['name'] && $row['password'] == @$_COOKIE['password'])
	{
		$flag = 1;
	}
}
if($flag == 1)
{
?>
<html>
<head>
	<title>Manage-Use.La</title>
	<meta charset="utf-8" />  
	<?php include("header-include.php"); ?>
	<script type="text/javascript">
            $('#contact').modal({
        backdrop:false,
        keyboard:true,
        show:false
      });
      </script>
</head>
<body>
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Use.La</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href=<?php echo $_COOKIE['name']; ?>>Achieve</a></li>
              <li class="active"><a href="#">Manage</a></li>
             <li><a href="user.php">Write</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  <div class="container">
      <div class="content">
        <div class="page-header">
  <h1>Manage Pad</h1>
</div>

<div class="row">
  <div class="span10">
    <div class="modal hide" id="contact">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>Contact</h3>
  </div>
  <div class="modal-body">
    <p>You can Email to me,xred,who is the administrator of this site:</p>
    <p>xred.cn@gmail.com</p>
  </div>
  <div class="modal-footer">
    <a data-toggle="" href="#" class="btn">Back</a>
  </div>
</div>
    Welcome, <?php echo $_COOKIE['name']; ?>'.This is the manage pad.<br/>
    <br/>
    You can manage your post here:
    <br/><br/>
<h4 style="margin-left: 28px;margin-bottom: 10px;">Achieve:</h4>

<ul class="posts">
   <table class="table table-striped table-bordered table-condensed"><?php 
    	$query = "SELECT * FROM post WHERE user = '$_COOKIE[name]' ORDER BY `id` DESC"; 
		$query_results = mysql_query($query);
		$lists='';
		while($row = mysql_fetch_array($query_results))
		{
			$time = substr($row['time'],0,10);
			$lists .= "<tr>
        <td>
        <span style='color:gray'>$time</span> &raquo; <a href='$_COOKIE[name]/$row[path].html'>$row[title]</a></td>
        <td><a class='btn' href='$_COOKIE[name]/$row[path].html'>View</a></td><td><a class='btn' href='user.php?edit=$row[uid]'>Edit</a></td><td><a class='btn' href='delete.php?delete=$row[uid]'>Delete</a></td></tr>";
		}
	echo $lists;
     ?>
     </table> 
</ul>
  </div>
  
  <div class="span4">
    <h4>Author</h4>
    <div class="date"><span>{user}</span></div>   
    <h4>Published</h4>
    <div class="date"><span>{time}</span></div>
  </div>
</div>
      </div>
  </div>
    <div class="container">
    	<footer>
    	<span style="padding:40px;"><p>Powered By @xred,Contact to me: xred.cn@gmail.com</p></span>
    </footer>
  </div>
</body>
</html>
<?php 
}else{
	?>
<html>
<head>
<title>login-Use.La</title>
<meta charset ="utf-8" />
  <?php include("header-include.php"); ?>

  <script>
  $(document).ready(function(){
      $("#layout").css(
      {"z-index":"1003",
      "background":"rgba(0,0,0,0.85)",
      "cursor":"default"
      }
      );
      $("#layout").fadeIn();
        $("body").prepend("<div id='alertbox'><div id='alert-title'>Welcome! Please login first !</div><form id='loginForm' action='login.php' method='POST'><input name='name' class='user' type='text' class='boxinput' autofocus='autofocus' placeholder='username'></input><br/><input class='user' name='password' type='password' class='boxinput' placeholder='password'></input><br/><input class='btn user' type='submit' value='login'></input><a href='register.php'>register</a></form></div>");
  $("#alertbox").fadeIn();
});
  </script>
</head>
<body>
</body>
</html>
  <?php
}
 ?>


