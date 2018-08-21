<?php 
		ini_set('default_charset','utf-8');
	include("sqlconfig.php");
	if (mysqli_connect_errno())
	{
		exit;
	}
	$query = "select * from userid where userid='".$_GET['userid']."'";
	$result = $db->query($query);
	
	$query2 = "select * from song where userid='".$_GET['userid']."'";
	$result2 = $db->query($query2);
	$result3 = $db->query($query2);
	
	$songnum=$result2->num_rows;
	$row = $result->fetch_assoc();
	
		

?>
<html>

<head>
<meta http-equiv="Content-Language" content="zh-tw">
<title>介紹</title>
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
</head>

<body text="#333333">
<p align="center"> 　　<a href="index2.php"><img src="Logo.png" width="140" height="100" border="0" /></a>　　　　　　　　　　　　　　　　　　　　 　　　　　　　　　　　　<a href="map.php"><img src="Map.png" width="100" height="100" border="0" /></a><a href="box.php"><img src="Create.png" width="100" height="100" border="0" /></a><a href="Chat.html"><img src="Chat.png" width="100" height="100" border="0" /></a></p>
<p align="center">
    <input type="text" name="SearchBox" id="SearchBox" style="border:3px solid #000000; font-size: 12pt; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" size="29"/><input type="submit" name="Searchbtn" id="Searchbtn" value="Search" style="color: #FFFFFF; font-family: Gill Sans MT; border: 3.5px solid #000000; background-image: url('Searchbtn.png')" />
</p>
<br>
<br>
<table border="1" width="50%" id="table1" bordercolor="#000000" cellspacing="0" align=center>
	<tr>
		<td colspan="2">　</td>
			
			</tr>
	<tr>
		<td colspan="2">帳號：<?php echo $_GET['userid'];?></td>
		
	</tr>
	<tr>
		<td colspan="2">信箱：<?php echo $row['usermail'];?></td>
		
	</tr>
	<tr>
		<td>作品：<br>
		<?php 
			for ($i=0;$i<$songnum;$i++)
			{
				$songrow = $result2->fetch_assoc();
				echo "<a href =guestplay.php?songname=".$songrow['songname']."&userid=".$songrow['userid'].">".$songrow['songname']."</a><br>";
			}
		?>
		
		</td>
		<td>
		<br>
		<?php 
			for ($i=0;$i<$songnum;$i++)
			{
				$songrow = $result3->fetch_assoc();
				echo $songrow['click']."人次<br>";
			}
		?>
		
		
		</td>
		
		
		
			</tr>
	<tr>
		<td colspan="2">簡介：<br><?php 
		if ($row['userintro']==null)
			echo "本人無自我介紹資料";
		else
			echo nl2br(str_replace(" ","&nbsp;",htmlspecialchars($row['userintro'])));?></td>
			</tr>
</table>

</body>

</html>
