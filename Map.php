<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Map</title>
<style type="text/css">
<!--
body {
	margin-top: 30px;
	background-image: url(SignupBG.jpg);
	background-repeat: no-repeat;
}

body,td,th {
	font-family: 微軟正黑體;
}
.colorCH {
	color: #999;
}
.TitleCH {
	color: #000;
	font-weight: bold;
	font-size: 24px;
}
-->
</style></head>

<body>
<form method="POST" action="search.php">

<p align="center"> 　　
<a href="index2.php"><img src="Logo.png" width="140" height="100" border="0" /></a>　　　　　　　　　　　　　　　　　　　　 　　　　　　　　　　　　<a href="map.php"><img src="Map.png" width="100" height="100" border="0" /></a><a href="box.php"><img src="Create.png" width="100" height="100" border="0" /></a>
<a href="Chat.html"><img src="Chat.png" width="100" height="100" border="0" /></a></p>
<p align="center">
    <input type="text" name="SearchBox" id="SearchBox" style="border:3px solid #000000; font-size: 12pt; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" size="29"/>
	<input type="submit" name="Searchbtn" id="Searchbtn" value="Search" style="color: #FFFFFF; font-family: Gill Sans MT; border: 3.5px solid #000000; background-image: url('Searchbtn.png')" />
</p>
</form>
<p align="center" style="margin-top: 0; margin-bottom: 0"><span class="TitleCH">網頁說明 </span>　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　 
<p align="center" style="margin-top: 0; margin-bottom: 0"><br />
<p align="center">
<p align="center">Account：需要登入才能使用的功能。　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
<p align="center" style="margin-top: 0; margin-bottom: 0">在這裡可以修改會員的基本資料以及密碼。　　　　　　　　　　　　　　　　　　　　　
<p align="center" style="margin-top: 0; margin-bottom: 0"><br />
<p align="center">
<p align="center">Box：需要登入才能使用的功能。　　　　　　 　　　　　　　　　　　　　　　　　　　　　　　　　　　　
<p align="center" style="margin-top: 0; margin-bottom: 0">在這裡可以創作自己的音樂，或者是將自己曾經創作過的音樂再繼續做編輯。　　　　　　　　
<p align="center" style="margin-top: 0; margin-bottom: 0"><br />
<p align="center">
<p align="center">Chat：提供使用者一個交流的空間，無需登入，簡潔的介面，沒有發文的限制，也無須表達自己的身分　　　　
<p align="center">使用者可以在裡面閒聊，或者是當網站出了問題，可以在這裡即時反應　　　　　　　　　
<p align="center">是一個相當自由的發言空間。　　　　　　　　　　　　　　　　　　　　　　　　　　　
<p align="center">
<p align="center"><img src="Map_flame.png" width="918" height="81" align="middle" />
<p align="center"><?php include "map2.php"; ?>

</body>
</html>