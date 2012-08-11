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

 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Use.La</title>
    <?php require("ckeditor/ckeditor.php"); ?>
	<?php include("header-include.php"); ?>
	<script type="text/javascript">
		window.onload = function(){
		var oBtn = document.getElementById("uploadPic");
		new AjaxUpload(oBtn,{
			action:"file_upload.php",
			name:"upload",
			onSubmit:function(file,ext){
			if(ext && /^(jpg|jpeg|png|gif)$/.test(ext)){
				//ext是后缀名
				oBtn.disabled = "disabled";
			}else{	
				alert("sorry,but only image file is allowed,change one and try again!");
			}
		},
		onComplete:function(file,response){
			oBtn.disabled = "";
			postbody = document.getElementById("postbody");
			postbody.value += "<http://use.la/"+ <?php echo "\"$_COOKIE[name]\"" ?> +"/uploads/"+file+">";
      var imglist = document.getElementById("imglist");
      var lis = document.createElement("li");
      var upfile ="http://"+"<?php echo "$_SERVER[HTTP_HOST]";?>" + "/upload/"+file;
      var imgs = document.createTextNode(upfile);
      lis.appendChild(imgs);
      imglist.appendChild(lis);
		}
	});
};

function test(){
  var test = document.getElementById("test");
  var para = document.createElement("P");
  var text = document.createTextNode("要添加的文本");
  para.appendChild(text);
  test.appendChild(para);
} 
      $('#contact').modal({
        backdrop:true,
        keyboard:true,
        show:false
      });
  CKEDITOR.replace( 'partner_desc',
  {
  skin : 'kama'
  });
</script>
  
</head>
<div class="modal hide fade" id="contact">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>Contact</h3>
  </div>
  <div class="modal-body">
    <p>You can Email to me,xred,who is the administrator of this site:</p>
    <p>xred.cn@gmail.com</p>
  </div>
  <div class="modal-footer">
    <a data-toggle="modal" href="#contact" class="btn">Back</a>
  </div>
</div>
<!--用户文章编辑页面 -->
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
              <li><a href="manage.php">Manage</a></li>
             <li class="active"><a href="#">Write</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
   <div class="container" id="containerpad">
   		<div id="user-pad">
   		<h3> Dear <?php echo "$_COOKIE[name]"; ?>, Write anything you want to share with your friends!</h3>
   		<br/>
   		<?php 
   		if (@$_GET['edit'] !='') {
		$query = "SELECT * FROM post WHERE uid = '$_GET[edit]'";
		$query_result = mysql_query($query);
		$row = mysql_fetch_array($query_result);
		$query = "SELECT * FROM user WHERE name = '$row[user]'";
		$query_result = mysql_query($query);
		$psw_row = mysql_fetch_array($query_result);
		if ($row['user'] == @$_COOKIE['name'] && $psw_row['password'] == @$_COOKIE['password']) {
			?>
			 <div>
   			<form action="update.php" method="POST" >
   		 	<label class="control-label" for="input01">Title</label><input type="text" class="input-xxlarge"  name="title" id="input01" value= "<?php echo "$row[title]"; ?>" ><br/>
   	    	<label class="control-label" for="textarea">Body<span style="color:#aaa"></span></label><textarea name="body" id="postbody" class="ckeditor input-xxlarge" id="textarea" rows="25"><?php echo "$row[body]"; ?></textarea>
   	    	<br/><br/><div class="btn" id="uploadPic" value="Picture"><i class="icon-picture"></i></div><input type="Submit" value="submit" class="btn"/>
          <input type="hidden" name="uid" value="<?php echo $row['uid']; ?>" />
   	    	</form>
          <ul id="imglist"></ul>
   	    	</div>
   	    	<?php
			}else{
				echo "bad request!";
			}
		}else{
			?>
						 <div>
   			<form action="notesub.php" method="POST" >
   		 	<label class="control-label" for="input01">Title</label><input type="text" class="input-xxlarge"  name="title" id="input01"><br/>
   	    	<label class="control-label" for="textarea">Body<span style="color:#aaa"></span></label><textarea name="body" id="postbody" class="ckeditor input-xxlarge" id="textarea" rows="25"></textarea>
   	    	<br/><br/><div class="btn" id="uploadPic" value="Picture"><i class="icon-picture"></i></div><input type="Submit" value="submit" class="btn"/>
   	    	</form>
          <ul id="imglist"></ul>
   	    	</div>
			<?php
		}
   		 ?>
   </div>
</div>
     <div class="container">
    	<footer>
    	<span style="padding:40px;"><p>Powered By @xred,Contact to me: xred.cn@gmail.com</p></span>
    </footer>
  </div>
</body>
</html>

<?
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

<?
}
?>
