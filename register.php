<html>
<head>
	<title></title>
	<?php 
 include("header-include.php");
 ?>
     <script type="text/javascript">
 function isEmail(){
         var temp = document.getElementById("email");
         //对电子邮件的验证
           var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
          if(!myreg.test(temp.value))
           {
                alert('提示\n\n请输入有效的E_mail！');
               return false;
          }else if(password.value ==""){
          		alert("please,input your password");
          		return false;
          }else if(name.value == ""){
          		alert("please,input your username");
          		return false;
          }else{
      }
}
    </script>
</head>
<body>
<div id='alertbox'>
		&nbsp;&nbsp;<h4>&nbsp;&nbsp;&nbsp;registration</h4>
		<form id='loginForm' action='registersub.php' method='POST'>
			 &nbsp;&nbsp;&nbsp;username:<input id="name" name='name' type='text' class='span2' autofocus='autofocus' placeholder='username' /><br/>
			 &nbsp;&nbsp;&nbsp;password:<input id="password" name='password' type='password' class='span2' placeholder='password' /><br/>
			 &nbsp;&nbsp;&nbsp;email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="email" name='email' type='text' class='span2' placeholder='email	' /><br/>			 
			 &nbsp;&nbsp;<input type='submit' class="btn" value="Signup" onclick="return isEmail();" ></input>
			 &nbsp;&nbsp;<a  href="user.php">Back</a>
		</form>
</div>
</body>
</html>