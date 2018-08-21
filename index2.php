<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dancing Note</title>
<link rel="stylesheet" href="jquery-ui.css" type="text/css" media="all" />
			<link rel="stylesheet" href="ui.theme.css" type="text/css" media="all" />	
		<script src="jquery.min.js" type="text/javascript"></script>
			<script src="jquery-ui.min.js" type="text/javascript"></script>
<style type="text/css">
<!--
body,td,th {
	color: #000000;
	font-family: 微軟正黑體;
}
a {
	color:#333333;
}
body {
	margin-top: 30px;
}
.colorCH {
	color: #999;
}
.TitleCH {
	color: #000;
	font-weight: bold;
	font-size: 24px;
-->
</style>

</head>

<body>
<form method="POST" action="search.php">
<p align="center"> 　　
<a href="index2.php"><img src="Logo.png" width="140" height="100" border="0" /></a>　　　　　　　　　　　　　　　　　　　　 　　　　　　　　　　　　<a href="Map.php"><img src="Map.png" width="100" height="100" border="0" /></a><a href="box.php"><img src="Create.png" width="100" height="100" border="0" /></a>
<a href="Chat.html"><img src="Chat.png" width="100" height="100" border="0" /></a></p>
<p align="center">
    <input type="text" name="SearchBox" id="SearchBox" style="border:3px solid #000000; font-size: 12pt; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" size="29"/>
	<input type="submit" name="Searchbtn" id="Searchbtn" value="Search" style="color: #FFFFFF; font-family: Gill Sans MT; border: 3.5px solid #000000; background-image: url('Searchbtn.png')" />
</p>
</form>
<p align="center" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
<p align="center" style="margin-top: 0; margin-bottom: 0"> 　
<img src="About.png" width="918" height="81" align="middle" />
<p align="center"><br />
<p align="center">此網站是基於分享及沒有距離感的發想建構的
<p align="center">希望在這裡，能滿足喜歡音樂、想記錄下來
<p align="center">卻對於作曲軟體的複雜介面無法理解而作罷的人
<p align="center">或者是喜歡分享，卻礙於檔案格式而讓對方覺得麻煩的人
<p align="center" class="colorCH">分享，沒有距離...
<p align="center" style="margin-top: 0; margin-bottom: 0"><br />
<script type="text/javascript">
	$(function() {
		$("#tabs").tabs();
	});
	</script>


<table width="918" align="center"><p align ="center"><img src="Ranking.png" width="918" height="81" align="middle" />
<tr>
<td>
<div class="demo">

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Newest</a></li>
		<li><a href="#tabs-2">Most Clicks</a></li>
		<li><a href="#tabs-3">Most Creates</a></li>
		<li><a href="#tabs-4">Most Messages</a></li>
	</ul>	
	<div id="tabs-1">
		<p><?php include "newest.php";?></p>
	</div>
	<div id="tabs-2">
		<p><?php include "topclick.php";?></p>
	</div>
	<div id="tabs-3">
		<p><?php include "topuser.php";?></p>
	</div>
	<div id="tabs-4">
		<p><?php include "topboard.php";?></p>
	</div>
</div>

</div>
</td>
</tr>
</table>
</body>
</html>


