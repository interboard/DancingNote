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
		$queryname = "SELECT userid, count(userid) FROM song GROUP BY userid";
		$resultname = $db->query($queryname);
		$num = $resultname->num_rows;
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
			switch ($num)
			{
			  case 1:  $g=1;  break;
			  case 2:  $g=2;  break;
			  default:  $g=3;  break;
			}
			for($j = 0;$j<$g ;$j++)
			{
				$row = $resultname->fetch_assoc();
				echo "<td  align=\"center\">";
				echo $row['userimg']."<br>";
				echo "Artist：";
				echo "<a href =intro.php?userid=".$row['userid'].">".$row['userid']."</a><br>";
				echo "創作數：".$row['count(userid)'];
				echo "</td>";
			}
			
			?>

		
		</tr>
	 <tr>
	<td>　</td><td>　</td><td>　</td><td>　</td>
	</tr>
		
		<tr>
					<?php
			switch ($num)
			{
			  case 1:  $g=0; break;
			  case 2:  $g=0; break;
			  case 3:  $g=0; break;
			  case 4:  $g=4;  break;
			  case 5:  $g=5;  break;
			  default:  $g=6;  break;
			}
			for($j = 3;$j<$g ;$j++)
			{
				$row = $resultname->fetch_assoc();
				echo "<td  align=\"center\">";
				echo $row['userimg']."<br>";
				echo "Artist：";
				echo "<a href =intro.php?userid=".$row['userid'].">".$row['userid']."</a><br>";
				echo "創作數：".$row['count(userid)'];
				echo "</td>";
			}
		}
		?>
	</tr>
	<tr>		
	</tr>
</table></div>