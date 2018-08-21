<?php
	session_start();

	if (isset($_SESSION['userid']))
	{		
		ini_set('default_charset','utf-8');
		include("sqlconfig.php");
		if (mysqli_connect_errno())
		{
			exit;
		}
		else{
			$userid = $_SESSION['userid'];
		}
	}
?>
<!--<html>    
    <head>
	<meta http-equiv="Content-Language" content="en-us">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Memeber</title>
    </head>
    
    <body>
        <form name="memberUP.php">紹銘註解掉-->
        <?php

            $userpw=$_POST['T1'];
			$userNewpw=$_POST['T2'];
			$userCHpw=$_POST['T3'];
            $usermail=$_POST['T4'];	
			$userimg=$_POST['F1'];
            $userabout=$_POST['S1'];
            ini_set('default_charset','utf-8');
			include_once("sqlconfig.php");
            if (mysqli_connect_errno())
			{
			  echo "資料庫連接失敗";
			  exit;
			}
			
			$query = "SELECT * FROM userid WHERE userid = '".$userid."' AND userpw = '".$userpw."'";
			$result = $db->query($query);
			$row = $result->fetch_assoc();
			if($row['userpw'] == $userpw)
			{
				if(($userNewpw == $userCHpw) && ($userNewpw != ""))
				{
					$queryCheck = "SELECT * FROM userid WHERE userid = '".$userid."' AND userpw = '".$userpw."'";
					$resultCheck = $db->query($queryCheck);
					if ($resultCheck->num_rows >0 )
					{
						$query="update userid set userpw = '".$userNewpw."' where userid = '".$userid."'";
						$result=$db->query($query);
						if($result)
							echo "密碼變更成功";
					}						
				}
				else if($userNewpw != $userCHpw)
				{
					echo "Please Type again";
				}
				if($usermail != "") 
				{
					$queryCheck = "SELECT * FROM userid WHERE userid = '".$userid."'";
					$resultCheck = $db->query($queryCheck);
					if ($resultCheck->num_rows >0 )
					{
						$query="update userid set  usermail = '".$usermail."' where userid = '".$userid."'";
						$result=$db->query($query);
						if($result)
							echo "Email變更成功";
					}	
				}
				if($userimg != "")
				{
					$img = strchr($userimg,'.');
					if(($img == '.jpg') || ($img == '.jpeg'))
					{
						$queryimg ="update userid set userimg = '".$userimg."' where userid = '".$userid."'";
						$result=$db->query($queryimg);
						if($result)
							echo "圖片上傳成功";
					}
					else
					{
						echo "It is not jpg or jpeg, please upload again";
					}
				
				}
				/* else
				{
					echo "失敗，請重新上傳";
					echo $userimg."test";
				} */
				//header("Location: index2.php");
				
				if ($userabout != "")
				{
					$queryCheck = "SELECT * FROM userid WHERE userid = '".$userid."'";
					$resultCheck = $db->query($queryCheck);
					if ($resultCheck->num_rows >0 )
					{
						$query="update userid set userintro = '".addslashes($userabout)."' where userid = '".$userid."'";
						$result=$db->query($query);
						if($result)
							echo "自我介紹更新成功";
					}
				
				
				}
				
				
			}
			else
			{
				echo "You have a wrong password!!!";
			}
			
			
	    ?>
 <!--       </form>
    </body>
</html>-->