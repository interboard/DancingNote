<?php
//發文處理
date_default_timezone_set("Asia/Taipei");
if($_POST['say'] && $_POST['nick']){
 /*$fp = fopen('chat.log', 'w+');
 if(filesize('chat.log') > 0){
 $msg = &nbsp;&nbsp; &nbsp;PHP_EOL."[{$_POST['nick']}] : {$_POST['say']} @ ".date('H:i:s');
 }else{
 $msg = &nbsp;&nbsp; &nbsp;"[{$_POST['nick']}] : {$_POST['say']} @ ".date('H:i:s');
 }
 fwrite($fp, $msg);
 fclose($fp);*/
 $msg = &nbsp;&nbsp; &nbsp;"[{$_POST['nick']}] : {$_POST['say']} @ ".date('H:i:s');
 file_put_contents('./chat.log', $msg);
 echo 'success';
}else{
 echo 'nodata!';&nbsp;&nbsp; &nbsp;
}
?>