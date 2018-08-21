<html>

<head>
	<meta http-equiv="Content-Language" content="en-us">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>註冊頁</title>
	<script type="text/javascript">
		function check()
		{
			if(document.regstep.userid.value == "")	{
				alert("請輸入帳號");
			}
			else if(document.regstep.userpw.value == ""){
				alert("請輸入密碼");

			}
			else if(document.regstep.checkpw.value != document.regstep.userpw.value){
				alert("輸入的密碼不同");

			}
			else if(document.regstep.usermail.value == ""){
				alert("請輸入E-mail");

			}
			
			if(document.regstep.userid.value != "" && document.regstep.userpw.value != "" && document.regstep.checkpw.value != "" && document.regstep.usermail.value != ""){
				document.regstep.submit(); 
				}
		} 
     </script>
<style type="text/css">
<!--
body {
	margin-left: 175px;
	margin-right: 175px;
	background-image: url(SignupBG.jpg);
	background-repeat: no-repeat;
}
body,td,th {
	font-family: 微軟正黑體;
}
-->
</style></head>

<body> 
<form method="POST" action="search.php">
<p align="center"> 　　
<a href="index2.php"><img src="Logo.png" width="140" height="100" border="0" /></a> 　　　　　　　　　　　　<a href="map.php"><img src="Map.png" width="100" height="100" border="0" /></a><a href="box.php"><img src="Create.png" width="100" height="100" border="0" /></a>
<a href="Chat.html"><img src="Chat.png" width="100" height="100" border="0" /></a></p>
<p align="center">
    <input type="text" name="SearchBox" id="SearchBox" style="border:3px solid #000000; font-size: 12pt; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" size="29"/>
	<input type="submit" name="Searchbtn" id="Searchbtn" value="Search" style="color: #FFFFFF; font-family: Gill Sans MT; border: 3.5px solid #000000; background-image: url('Searchbtn.png')" />
</p>
</form>   
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
<p>&nbsp;</p>
<form name="regstep" method="POST" action="signupdb.php" >
<table width="650" height="316">
	<tr><td height="43">UserID：
    <input type="text" name="userid" size="20" value=""/></td></tr>
		<tr><td height="43">Password：
    <input type="password" name="userpw" size="20" value=""/></td></tr>
		<tr><td height="47">Check Password：
    <input type="password" name="checkpw" size="20" value=""/></td></tr>
		<tr><td height="52">E-mail：
    <input type="text" name="usermail" size="30" value=""/></td></tr>
		<tr><td height="54">Photo<span lang="zh-tw">：</span>
<input type="file" name="userfile" size="50"></td></tr>
		<tr><td height="54">Self-Introduction<span lang="zh-tw">：</span></td></tr>
		<tr><td height="54"><span lang="zh-tw"></span><textarea rows="19" name="S1" cols="69"></textarea></td></tr>
		<tr><td height="61">
<input type="submit" value="Submit" onClick="check();"/>
			<input type="reset" value="Reset"/>
		</td></tr>	
		</table>	
</form>	
</body>
</html>
</html>
</html>