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
<form method="POST" action="search.php">
<p align="center"> 　　
<a href="index2.php"><img src="Logo.png" width="140" height="100" border="0" /></a>　　　　　　　　　　　　　　　　　　　　 　　　　　　　　　　　　<a href="map.php"><img src="Map.png" width="100" height="100" border="0" /></a><a href="box.php"><img src="Create.png" width="100" height="100" border="0" /></a>
<a href="Chat.html"><img src="Chat.png" width="100" height="100" border="0" /></a></p>
<p align="center">
    <input type="text" name="SearchBox" id="SearchBox" style="border:3px solid #000000; font-size: 12pt; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" size="29"/>
	<input type="submit" name="Searchbtn" id="Searchbtn" value="Search" style="color: #FFFFFF; font-family: Gill Sans MT; border: 3.5px solid #000000; background-image: url('Searchbtn.png')" />
</p>
</form>
<table align="center">
<?php 
	ini_set('default_charset', 'utf-8');
	include_once("sqlconfig.php");
	if (mysqli_connect_errno())
	{
	  echo "資料庫連接失敗";
	  exit;
	}
	else
	{
	$querysearch = "SELECT *  FROM `song` WHERE  `songname` LIKE '%".$_POST['SearchBox']."%' ";
	$resultnew = $db->query($querysearch);
	$num = $resultnew->num_rows;
	echo "<center>共".$num."筆資料 </center>";
	if ($_POST['SearchBox']==null){ 
		echo "<center>請輸入曲子!</center>";
		exit;
	}
	if ($num==0) echo "<center>找不到曲子!!</center>";
			for($j = 0;$j<$num ;$j++)
		{
			$row = $resultnew->fetch_assoc();
		?>
		
		<tr>
				<td  align="left">Song Title：<a href =guestplay.php?songname=<?php echo $row['songname'];?>&userid=<?php echo $row['userid'];?>><?php echo $row['songname'];?></a>        
				Artist：
				<a href =intro.php?userid=<?php echo $row['userid'];?>><?php echo $row['userid'];?></a>     
				Hits：<?php echo $row['click'];?>
				<br>
				<br>
				</td>
		</tr>
<?php 
		}
	}




?>
</table>