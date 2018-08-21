<?php
session_start();
ini_set('default_charset', 'utf-8');
include_once("sqlconfig.php");

if (mysqli_connect_errno())
{
  echo "資料庫連接失敗";
  exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dancing Note</title>
<style type="text/css">
<!--
body,td,th {
	color: #E0E0E0;
	font-size: 14px;
	font-family: 微軟正黑體;
}
body {
	background-color: #333;
	margin-left: 15px;
	margin-top: 8px;
	margin-right: 15px;
	margin-bottom: 0px;
}
a:link {
	color: #E0E0E0;
}
a:visited {
	color: #E0E0E0;
}
-->
</style></head>

<body>
<div align="center"><a href="index1.html" target="_top">Home</a>　　　　　　　　　　　　　　　                        　　　　　　　　　　　　　　　　　　　　　　　　　　　　
<?php 
if (isset($_SESSION['userid'])){
?>　　　　　　　　　　　　　　
<a href="member.php" target="shita">Account</a>  / 已登入[<?php echo $_SESSION['userid'];?>]<a href="logout.php" target="shita">登出</a></div>

<?php }else{
?>　　　　　　　　　　　　　　

	<a href="member.php" target="shita">Account</a>  / <a href="login.php" target="shita">Sign in</a></div>
<?php 
}
?>
</body>
</html>