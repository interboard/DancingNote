<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>蒼時弦也 Real-time Chatroom @ http://frost.tw/</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">

function showChat(){
 $.ajax({
 url: 'chat_server.php',
 global: false,
 dataType: 'text',
 type: 'GET',
 success: function(data){
 $('#chatMsg').append('<div>'+data+'</div>');
 this.noerror = true;
 },
 complete: function(obj, status){
 if(!this.noerror){
 setTimeout(function(){ showChat(); }, 5000);
 }else{
 showChat();
 }
 }
 });
}

function submitMsg(){
 var nick = $("input[name='nick']").val();
 var say = $("input[name='say']").val();
 $.ajax({
 url: 'say.php',
 global: false,
 type: 'POST',
 dataTyep: 'html',
 data: ({
 'nick' : nick,
 'say' : say
 }),
 success: function(data){
 $("input[name='say']").val('');
 }
 });
}

$(document).ready(function(){
 showChat();
});

</script>
</head>

<body>
<div id="chatMsg">

</div>
<form action="" method="post" onsubmit="javascript:submitMsg(); return false;">
 <input type="text" name="nick" value="暱稱" size="10" />
 <input type="text" name="say" />
 <input type="submit" value="發言" />
</form>
</body>
</html>