<html>

<head>
	<meta http-equiv="Content-Language" content="en-us">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>註冊頁</title>
	<style type="text/css">
<!--
body {
	margin-left: 175px;
	margin-right: 175px;
	background-image: url(SignupBG.jpg);
	background-repeat: no-repeat;
}
body,td,th {
	font-family: 微軟正黑體;
}
-->
</style></head>

<body>    
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
        
            $userid=$_POST['userid'];
            $userpw=$_POST['userpw'];
            $usermail=$_POST['usermail'];
			$userabout=$_POST['S1'];
			//**************************上傳檔案還沒寫*************************
           // include("upload.php");
			echo $_FILES['userfile']['name'];
			$userimg=$_FILES['userfile']['name'];
            ini_set('default_charset','utf-8');
			include_once("sqlconfig.php");
            if (mysqli_connect_errno())
			{
			  echo "資料庫連接失敗";
			  exit;
			}
			else
			{
				$query="select * from userid where userid ='".$userid."'";
				$result=$db->query($query);
				$num=$result->num_rows;
				if($num > 0)
				{
					echo "此帳號已有人使用";
					exit;
				}
				else
				{   //新增資料
					$query = "insert into userid values('".$userid."','".$userpw."','".$usermail."','".$userimg."','".$userabout."')";
					$result = $db->query($query);
				}
				if ($result)
					echo "新增帳號完成"; 
			}
        ?>
		</body>
</html>