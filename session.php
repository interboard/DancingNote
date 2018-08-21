<?php
 session_start();
   if (!isset($_SESSION['snum']))
  {
	echo "你還沒登入";
	exit;
  }
 
 
?>