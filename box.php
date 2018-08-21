<?php
	session_start();
	ini_set('default_charset','utf-8');
	if (isset($_SESSION['userid']))
	{		
		include("sqlconfig.php");
		if (mysqli_connect_errno())
		{
			echo "資料庫連結錯誤";
			exit;
		}
		else{
			$userid = $_SESSION['userid'];

			//Create 的部分
			if((isset($_POST['input_str'])) && ($_POST['input_str'] != ""))
			{	
				$replace = str_replace(" ","_",$_POST['input_str']);
				$querysongkey = "select * from song where songname='".$replace."' and userid = '".$userid."'";
				$resultkey = $db->query($querysongkey);
				
				date_default_timezone_set("Asia/Taipei");
				$crtime = time();
				if ($resultkey->num_rows >0 )
				{
					echo "曲名重複!";
				}
				else
				{
					$query = "insert into song(songkey,songname,keysign,speed,userid,click,uptime) value (0,'".$replace."','0','120','".$userid."','0','".$crtime."')";
					//echo $query;
					$result =$db->query($query);
				}
			}
			//刪除部分
			if(isset($_POST['deletestr']))
			{
				$str =strchr($_POST['deletestr']," ");
				$str2 =trim($str);
				//抓key
				$querysongkey = "select * from song where songname='".$str2."' and userid = '".$userid."'";
				$result = $db->query($querysongkey);
				$row = $result->fetch_assoc();
				$songkey=$row['songkey'];
				//刪除song中的曲目
				$querydel ="delete from song where songkey = '".$songkey."'";
				$resultdel = $db->query($querydel);
				//刪除高音譜音符
				$queryhigh ="delete from musichigh where songkey ='".$songkey."'";
				$resulthigh = $db->query($queryhigh);
				//刪除低音譜音符
				$querylow ="delete from musiclow where songkey ='".$songkey."'";
				$resultlow = $db->query($querylow);
				//刪除高音譜 行 音符數
				$queryhighLC ="delete from linecount_high where songkey ='".$songkey."'";
				$resulthighLC = $db->query($queryhighLC);
				//刪除低音譜 行 音符數
				$querylowLC ="delete from linecount_low where songkey ='".$songkey."'";
				$resultlowLC = $db->query($querylowLC);
				//刪除高音譜 頁 音符數
				$queryhighPC ="delete from pagecount_high where songkey ='".$songkey."'";
				$resulthighPC = $db->query($queryhighPC);
				//刪除低音譜 頁 音符數
				$querylowPC ="delete from pagecount_low where songkey ='".$songkey."'";
				$resultlowPC = $db->query($querylowPC);
			}
			//更名的部分
			if((isset($_POST['changestr'])) && (isset($_POST['originalstr'])))
			{	
				//找到舊的歌是否存在
				$querysongkey = "select * from song where songkey='".$_POST['originalstr']."' and userid = '".$userid."'";
				$resultkey = $db->query($querysongkey);
				$row = $resultkey->fetch_assoc();
				//搜尋是否有新的這首歌存在
				$replaceN = str_replace(" ","_",$_POST['changestr']);
				$querysongnew = "select * from song where songname='".$replaceN."' and userid = '".$userid."'";
				$resultnew = $db->query($querysongnew);
				$row2 = $resultnew->fetch_assoc();
				
				if($resultnew -> num_rows > 0)
				{
					echo "曲名重複，請重新命名";
				}
				else if ($resultkey->num_rows >0 )
				{
					$query = "update song set songname = '".$replaceN."' where songkey = '".$_POST['originalstr']."'";
					$result =$db->query($query);
				}
			}
		} 
    ?>
		<html>
			<head>
				<meta http-equiv="Content-Language" content="en-us">
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<title>My Box</title>
				
				<script type ="text/javascript">
				function create()
				{//跳出視窗讓使用者編輯曲名
					//alert("create");
					var name;
					name =window.prompt("Please Enter The Name");
					if( name != null&& name!='null' && name !='')
					{//將取得的文字丟到form的input裡面，再重新執行網頁。
						box.input_str.value=name;
						box.submit();
					}
				}
				function deleted(str)
				{
					//alert("deleted");
					//跳出警告視窗是否刪除，是：則刪除，不是：則取消
					if(confirm(str)){
						box.deletestr.value=str;
						box.submit();
					}
					else
						window.location.replace(urls)
				}
				//更名
				function change(str)
				{
					var change;
					change =window.prompt("Please Enter The Name");
					if( change != null&& change!='null' && change !='')
					{
						box.changestr.value=change;
						box.originalstr.value=str;
						box.submit();
					}
				}
				</script>
			<style type="text/css">
				<!--
				body {
					background-image: url('../Recovered_JPEG_10795.jpg');
					margin-left: 175px;
					margin-right: 175px
				}
				body,td,th {
					font-family: 微軟正黑體;
				}
				a {
					color:#333333;
				}
				.colorCH {
					color: #999;
				}
				.TitleCH {
					color: #000;
					font-weight: bold;
					font-size: 20px;
				}
				-->
			</style></head>
		<body>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>

		<form name="box" method="POST" action="../box.php">
		<p align="left" style="margin-top: 0; margin-bottom: 0"> 　
			<input type="button" value="Create A Song" onClick="create()">
				<input type="hidden" name="input_str" value="">
				<input type="hidden" name="deletestr" value="">
				<input type="hidden" name="originalstr" value="">
				<input type="hidden" name="changestr" value=""></p>
		<p align="left" style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
		<p align="left" style="margin-top: 0; margin-bottom: 0">
<?php 
		$queryList = "select * from song where userid ='".$userid."'";
		$resultList=$db->query($queryList); 
    ?>
		</p>
			
		<table border="0" align="left" style="margin-left: 40">
		<tr>
		<img border="0" src="../Box.png" width="918" height="81"><p><br>
		</tr>
		<tr><td colspan="4"><p align="left"><span class="TitleCH">編輯器使用說明：</span><br>
			<p align="left">切換音符：使用滑鼠滾輪。<br>
			<p align="left">刪除音符：由滑鼠選取欲刪除的音符，之後點選屬性框中的Delete Note。<br>
			<p align="left">使用高八度線以及圓滑線之後必須點選Cancle取消此功能之後才可繼續編輯。
			<p align="left">調整速度之後，按下Enter即完成設定。
			<p align="left"><br></td></tr>
		<tr>
			<td width="100">No.</td>
			<td width="180">Song Title</td>
			<td width="220">Delete/Rename</td>
			<td width="180">Update Time</td>
			<td width="100">Hits</td>
		</tr>
				
<?php
		date_default_timezone_set("Asia/Taipei");
		if($resultList->num_rows  >0)
		{
			echo "<tr>";
			for($i = 1; $i <=$resultList->num_rows ;$i++)
			{
				$row = $resultList->fetch_assoc();
				echo "<td width=\"100\">".$i."</td>";
				echo "<td width=\"160\"><a href=testplay.php?songname=".$row['songname']."&userid=".$row['userid'].">".$row['songname']."</td>";
				echo "<td width=\"180\"><input name=\"deleteSong\" type=\"submit\" value=\"Delete\" onclick=\"deleted('確定刪除 ".$row['songname']."')\">";
				echo "<input type=\"button\" value=\"Rename\" onclick=\"change(".$row['songkey'].")\"> </td>";
				echo "<td width=\"200\">".date("Y-m-d H:i",$row['uptime'])."</td>";
				echo "<td>".$row['click']."</td></tr>";
			}			
		}
		else 
		{ 
			echo "<tr>";
			echo "您目前沒有歌曲唷！快來   <input type=\"button\" value=\"Create A Song\" onClick=\"create()\">   吧！";
			echo "</tr>";
		}
			
		echo "</table></form></body></html>";
	} 
	else { 
 ?>
			<html>
			<head>
				<meta http-equiv="Content-Language" content="en-us">
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<title>My Box</title>
			<style type="text/css">
			<!--
			body {
				background-image: url('../Recovered_JPEG_10795.jpg');
				margin-left: 175px;
				margin-right: 175px
			}
			a {
				color:#333333;
			}
			-->
			</style></head>
			<body>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<center>Please Login in</center>
			</body>
			</html>
<?php	
	}   


        	?>