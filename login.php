<?php
session_start();

if (isset($_POST['userid']) && isset($_POST['userpw']))
{
	ini_set('default_charset', 'utf-8');
	include_once("sqlconfig.php");
	if (mysqli_connect_errno())
	{
	  echo "資料庫連接失敗";
	  exit;
	}

  $query = "SELECT * FROM userid WHERE userid = '".$_POST['userid']."' AND userpw = '".$_POST['userpw']."'";

  $result = $db->query($query);

  if ($result->num_rows >0 )
  {
    // 如果資料庫內有這筆帳密
	$row2 = $result->fetch_assoc();
	$_SESSION['userid'] = $row2['userid'];
	$_SESSION['userpw'] = $row2['userpw'];
  }
}
?>

<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> 會員登入 </title>
<style type="text/css">

<!--
body {
	<?php if (isset($_SESSION['userid'])){?>
		background-image: url(SignupBG.jpg);
		
	<?php }else{ ?>	
	margin-left: 200px;
	margin-right: 270px;
		background-image: url(Recovered_JPEG_10818.jpg);
	<?php } ?>
	background-repeat: no-repeat;

	;
}
a:link {
	color: #333333;
}
a:visited {
	color: #999999;
}
body,td,th {
	font-family: 微軟正黑體;
}
.style1 {color: #FFFFFF}
.style2 {color: #999999}
-->
</style>
</head>
<body>
<?php 
	if (isset($_SESSION['userid'])){
?>

		<form method="POST" action="search.php">
<p align="center"> 　　
<a href="index1.html" target=_top><img src="Logo.png" width="140" height="100" border="0" /></a>　　　　　　　　　　　　　　　　　　　　 　　　　　　　　　　　　<a href="map.php"><img src="Map.png" width="100" height="100" border="0" /></a><a href="box.php"><img src="Create.png" width="100" height="100" border="0" /></a>
<a href="Chat.html"><img src="Chat.png" width="100" height="100" border="0" /></a></p>
<p align="center">
    <input type="text" name="SearchBox" id="SearchBox" style="border:3px solid #000000; font-size: 12pt; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" size="29"/>
	<input type="submit" name="Searchbtn" id="Searchbtn" value="Search" style="color: #FFFFFF; font-family: Gill Sans MT; border: 3.5px solid #000000; background-image: url('Searchbtn.png')" />
</p>
</form>
<?php }else{?>

		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
<?php }?>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		
<p>&nbsp;</p>
<div align="right">
          <p align="left" class="style2" style="margin-top: 0; margin-bottom: 0"> 　　　 <?php
	ini_set('default_charset', 'utf-8');
	if (isset($_SESSION['userid']))
	{
	//header("location :index1.html");
	echo '<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;你已經登入: '.$_SESSION['userid'].' <br /><br /><br />';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">登出</a><br />';
	?>
	
	<?php 
	}
	else
	{
		if (isset($_POST['userid']))
		{ 
		  echo '帳密輸入錯誤 　 　<br />';
		}
		else 
		{
		  echo '&nbsp;&nbsp;&nbsp;&nbsp;請先登入 　　　　<br />';
		}?>
          </p>
          <p align="left" style="margin-top: 0; margin-bottom: 0" class="style1">&nbsp;</p>
</div>
<form method="post" action="login.php">
		  <div align="right">
		    <table align="left">
		      <tr><td height="45">帳號:</td>
		  <td><input type="text" name="userid"></td></tr>
		      <tr><td height="43">密碼:</td>
		  <td><input type="password" name="userpw"></td></tr>
		      <tr><td height="64" colspan="2" align="center">
		        <input type="submit" value="Log in">　 
		        <a href="signup.php">Sign up</a></td>
		  </tr>
            </table>
	      </div>
</form>
	    <p align="right">
	      <?php  }
?>
</p>
	    <p align="right">&nbsp;</p>
	    <p align="right">&nbsp;</p>
	    <p align="right">&nbsp;</p>
	    <p align="right">&nbsp;</p>
	    <p align="right">&nbsp;</p>
	    <p align="right">&nbsp;</p>
	    <p align="right">&nbsp;</p>
	    <p align="right">&nbsp;</p>
	    <p align="right">&nbsp;</p>
	    <p align="right">&nbsp;</p>
	    <p align="right">&nbsp;</p>
	    <p align="right">&nbsp;</p>
	    <p align="right">&nbsp;</p>
	    <p align="right">&nbsp;</p>
</body>
</html>