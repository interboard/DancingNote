<?php
ini_set('default_charset', 'utf-8');
$db = new mysqli('localhost','root','123','music');
$tempresult = $db->query("SET NAMES 'utf8'");
$tempresult = $db->query("SET CHARACTER_SET_CLIENT=utf8");
$tempresult = $db->query("SET CHARACTER_SET_RESULTS=utf8");
?>