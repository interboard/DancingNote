<?php
	session_start();
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>新增網頁1</title>

<style type="text/css">
<!--
body {
	margin-top: 30px;
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
<p align="center" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
<div align="center">
  <table border="0" width="69%" id="table1">
    <tr>
      <td>　	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="1000" height="500" id="scnew_s" align="middle">
        <param name="allowScriptAccess" value="sameDomain" />
        <param name="allowFullScreen" value="false" />
        <param name="movie" value="scnew_s.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" />	<embed src="scnew_s.swf" quality="high" bgcolor="#ffffff" width="1000" height="500" name="scnew_s" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
      </object></td>
    </tr>
    <tr>
      <td>
        <iframe name="I1" src="board.php?songname=<?php echo $_GET['songname'];?>&userid=<?php echo $_GET['userid'];?>" style="border-style: dashed; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px" border="0" frameborder="0" width="981" height="213">您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe></td>
    </tr>
    <tr>
      <td>
        <form method="POST" action="boardreplay.php?songname=<?php echo $_GET['songname'];?>&userid=<?php echo $_GET['userid'];?>" target="I1">
  <?php 
	if (isset($_SESSION['userid'])){
?>
          <p><?php echo $_SESSION['userid'];?>:<input type="text" name="msgtxt" size="94"><input type="submit" value="送出" name="B1" ></p>
  <?php 
	}else{
	
	}
	
?>
        </form>
	    <p>　</td>
    </tr>
  </table>
</div>
</body>

</html>