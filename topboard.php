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
		$queryboard = "SELECT artist,songname, count(boardkey) as amount FROM board GROUP BY artist,songname order by amount desc";
		$resultboard = $db->query($queryboard);
		$num = $resultboard->num_rows;
		?>
		<div align="center">
		<table border="0" width="918" id="table1" style="border-collapse: collapse">
		<!--<tr>
			<td colspan="3">
			<p></td>

		</tr>
		<tr>
		
		</tr>-->
		<tr>
			

		<?php
		for($j = 0;$j<3 ;$j++)
		{
			$row = $resultboard->fetch_assoc();
			$querymail = "select * from userid where userid = '".$row['artist']."'";
			$resultmail = $db->query($querymail);
			$row2 =$resultmail->fetch_assoc();
	
			
				echo "<td  align=\"center\">";
				echo $row['userimg']."<br>";
				echo "Song Title：";
				echo "<a href =guestplay.php?songname=".$row['songname']."&userid=".$row['artist'].">".$row['songname']."</a><br>";
				echo "Artist：";
				echo "<a href =intro.php?userid=".$row['artist'].">".$row['artist']."</a><br>";
				echo "回應數：".$row['amount'];
				echo "</td>";
			


		}
		
		?>

		
		</tr>
	 <tr>
	<td>　</td><td>　</td><td>　</td><td>　</td>
	</tr>
		
		<tr>
					<?php
		for($j = 3;$j<6 ;$j++)
		{
			$row = $resultboard->fetch_assoc();
			$querymail = "select * from userid where userid = '".$row['artist']."'";
			$resultmail = $db->query($querymail);
			$row2 =$resultmail->fetch_assoc();

				echo "<td  align=\"center\">";
				echo $row['userimg']."<br>";
				echo "Song Title：";
				echo "<a href =guestplay.php?songname=".$row['songname']."&userid=".$row['artist'].">".$row['songname']."</a><br>";
				echo "Artist：";
				echo "<a href =intro.php?userid=".$row['artist'].">".$row['artist']."</a><br>";
				echo "回應數：".$row['amount'];
				echo "</td>";
		
			
		}
		}
		?>
	</tr>
	<tr>		
	</tr>
</table></div>