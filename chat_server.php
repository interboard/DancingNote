<?php
//後端
date_default_timezone_set("Asia/Taipei");
set_time_limit(0);
$_GET['first'] = $_GET['first'] ? $_GET['first'] : false;
if(is_file('chat.log')){
 $now = time();
 $modify = filemtime('chat.log');
 while($modify <= $now && !$_GET['first']){
 usleep(10000);
 clearstatcache();
 $modify = filemtime('chat.log');
 }
 $array = file_get_contents('chat.log');
 echo $array;
}

flush();
?>