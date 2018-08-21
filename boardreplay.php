<?php
session_start();
ini_set('default_charset', 'utf-8');
include_once("sqlconfig.php");

if (mysqli_connect_errno())
{
  echo "資料庫連接失敗";
  exit;
}
//$rmemid=$_SESSION['memid'];
date_default_timezone_set("Asia/Taipei");
$rtime=time();


$query = "insert into board values 
(NULL,'".$_SESSION['userid']."', '".addslashes($_POST['msgtxt'])."','".$_GET['songname']."' ,'".$_GET['userid']."' , '".$rtime."')";
$result = $db->query($query);
if ($result)
  {
   //echo  $db->affected_rows.' 成功';
   header("Location: board.php?songname=".$_GET['songname']."&userid=".$_GET['userid']."");
   }
//
?>