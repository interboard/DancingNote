<?php
session_start();
ini_set('default_charset', 'utf-8');
include_once("sqlconfig.php");

if (mysqli_connect_errno())
{
  echo "資料庫連接失敗";
  exit;
}
else
{
?>

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
<table border="0" width="100%" id="table1"  cellspacing="0" cellpadding="0">
<?php 
date_default_timezone_set("Asia/Taipei");
		//增加click數
		if($_SESSION['userid'] != $_GET['userid'])
		{
			$sql = "UPDATE song SET click = click + 1 WHERE songname='".$_GET['songname']."' and userid='".$_GET['userid']."'";
			$result = $db ->query($sql);
		}
		//讀取留言板內容
		$query ="select * from board where songname = '".$_GET['songname']."' and artist = '".$_GET['userid']."' order by boardkey asc";
		$result = $db->query($query);
		$num=$result->num_rows;
		echo "留言板";
		if ($num!=0)
		{
			for ($i=0; $i<$num ; $i++)
			{
				$row = $result->fetch_assoc();
?>	
				<tr>
						<td width="175"><?php echo "<a href =intro.php?userid=".$row['msguser']." target=_blank>".$row['msguser']."</a>";?>：</td>
						<td><?php echo $row['msgtxt'];?></td>
						<td width="125"><?php echo date("m-d H:i",$row['msgtime']);?></td>
				</tr>
<?php 
			}
		}
	}
?>
</table>