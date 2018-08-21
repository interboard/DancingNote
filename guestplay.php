<?php
	session_start();
	ini_set('default_charset','utf-8');
	include("sqlconfig.php");
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>新增網頁1</title>

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
-->
</style>
<link rel="shortcut icon" type="image/x-icon" href="http://l.yimg.com/e/serv/common/favicon.ico" />  
<link rel="stylesheet" href="http://l.yimg.com/e/serv/blog/css/top.css" type="text/css" /> 
<link rel="stylesheet" href="http://l.yimg.com/e/serv/common/css/sharing.css" type="text/css"> 
<link rel="stylesheet" type="text/css" href="http://l.yimg.com/e/serv/blog/css/antiPhishing.css">
<script type="text/javascript" src="http://yui.yahooapis.com/combo?2.5.2/build/yahoo-dom-event/yahoo-dom-event.js&2.5.2/build/imageloader/imageloader-min.js&2.5.2/build/get/get-min.js"></script> 
<script type="text/javascript"> 
var YUD = YAHOO.util.Dom, YUE = YAHOO.util.Event, YUG = YAHOO.util.Get, $ = YAHOO.util.Dom.get;
</script> 
</head>

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
      <td>　	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="1000" height="500" id="guestplay" align="middle">
        <param name="allowScriptAccess" value="sameDomain" />
        <param name="allowFullScreen" value="false" />
        <param name="movie" value="guestplay.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" />	<embed src="guestplay.swf" quality="high" bgcolor="#ffffff" width="1000" height="500" name="guestplay" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
      </object>
	 <p align=right> Artist：<?php echo $_GET['userid'];?><br>SongTitle：<?php echo $_GET['songname'];?><br></p>
	  <!--social sharing start--> 
<div id="bigcontainer" style="position: relative !important; zoom:1 !important;" > 
<div class="wsharing top" onmouseover="getElementsByTagName('div')[1].style.display = 'block';" onmouseout="getElementsByTagName('div')[1].style.display = 'none';"> 
  <div class="hd"> 
    <h5 title="分享出去" id="univshar-btn">分享</h5> 
    <span class="shortcut"> 
      <a target="_blank" title="分享到 Facebook" href="http://www.facebook.com/sharer.php?u=http://www.kimo.com.tw&t=奇摩" class="fb">Facebook</a> 
      <a target="_blank" title="分享到 Plurk" href="http://www.plurk.com/?qualifier=shares&status=http://www.kimo.com.tw+奇摩" class="plurk">Plurk</a> 
    </span> 
    <span class="endrc"></span> 
  </div> 
  
  <div class="bd"> 
    <ul> 
      <li class="fb"><a target="_blank" title="分享到 Facebook" href="http://www.facebook.com/sharer.php?u=http://www.kimo.com.tw&t=琴色和鳴">分享在我的 Facebook</a></li> 
      <li class="plurk"><a target="_blank" title="分享到 Plurk" href="http://www.plurk.com/?qualifier=shares&status=http://www.kimo.com.tw">分享在我的 Plurk</a></li> 
      
    </ul> 
  </div> 
  <div class="ft"></div> 
</div> 
</div>
<!--Social sharing end--> </td>
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