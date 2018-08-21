<?php
  session_start();
  
  // store to test if they *were* logged in
  $old_user = $_SESSION['user'];  
  unset($_SESSION['userid']);
  unset($_SESSION['userpw']);
  session_destroy();
?>
<html>
<head>
<title>LogOut</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" charset="utf-8">
<style type="text/css">
<!--
body {
	background-image: url(SignupBG.jpg);
	background-repeat: no-repeat;
	margin-left: 200px;
	margin-right: 175px;
}
.style1 {font-size: 16px}
a:link {
	color: #333333;
}
a:visited {
	color: #999999;
}
body,td,th {
	font-family: 微軟正黑體;
}
-->
</style>
</head>
<body>

<h1>&nbsp;</h1>
<h1>&nbsp;</h1>
<h1>&nbsp;</h1>
<h1>&nbsp;</h1>
<p>&nbsp;</p>
<h1> <span class="style1">　　</span>Log out</h1>
<p> 　　 

  <?php
ini_set('default_charset', 'utf-8');
  if (!empty($old_user))
  {
    echo '已登出.<br />';
  }
  else
  {
    echo '尚未登入.<br />'; 
  }
?>
</p>
<p>&nbsp; </p>
<p>　　   <a href="index1.html" target=_top>回到首頁</a>
</p>
</body>
</html>
</html>
