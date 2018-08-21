<?php
	session_start();

	if (isset($_SESSION['userid']))
	{		
		ini_set('default_charset','utf-8');
		include("sqlconfig.php");
		if (mysqli_connect_errno())
		{
			echo "尚未登入";
			exit;
		}
		else{
			$userid = $_SESSION['userid'];
		}
	}
?>
<html>
	<head>
		<meta http-equiv="Content-Language" content="en-us">
		<meta http-equiv="SimHei" content="text/html; charset=utf-8">
		<title>會員中心Members</title>
	<style type="text/css">
<!--
body {
	margin-left: 200px;
	margin-right: 175px;
	background-image: url(Recovered_JPEG_10748.jpg);
}
.style1 {font-family: SimHei}
body,td,th {
	font-family: 微軟正黑體;
}
.style2 {font-family: "微軟正黑體"; }
-->
    </style><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<form method="POST" enctype="multipart/form-data" action="memberUP.php">
	<!--webbot bot="FileUpload" U-File="fpweb:///_private/form_results.csv" S-Format="TEXT/CSV" S-Label-Fields="TRUE" -->
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p class="style2">UserID<span lang="zh-tw">：
	<?php  
	if(isset ($userid))
	{
		echo $userid;?>
		</span></p>
  <p class="style2">password：<input type="password" name="T1" size="20"></p>
	<p class="style2">New password<span lang="zh-tw">：</span><input type="password" name="T2" size="20"></p>
	<p class="style2">Check password<span lang="zh-tw">：</span><input type="password" name="T3" size="20"></p>
	<p class="style2">E-mail<span lang="zh-tw">：</span><input type="text" name="T4" size="20"></p>
	<p class="style2">Photo<span lang="zh-tw">：</span><input type="file" name="F1" size="50"></p>
	<p class="style2">Self-introduction<span lang="zh-tw">：</span></p>
	<p class="style2"><textarea rows="19" name="S1" cols="69"></textarea></p>
	<p class="style2">&nbsp;</p>
<p class="style1">
	  <input type="submit" value="送出" name="B1">
	  <input type="reset" value="重新設定" name="B2">
  </p>
  <?php
	}
	else 
		echo "請先登入";	?>
	</span></p>
</form>
</body>
</html>