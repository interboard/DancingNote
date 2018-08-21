public function sendvar(){
	
	Export_btn.addEventListener(MouseEvent.MOUSE_DOWN,sn);
	var connection:NetConnection; //宣告NetConnection物件
	var responder:Responder;  //宣告 Responder物件
	 
	//建立物件實體
	responder = new Responder(onResult, onFault);  //資料傳送成功或失敗
	connection = new NetConnection; 
	
	//設定Service連線
	var gateway:String = "/amfphp/gateway.php"; 
	connection.connect(gateway);  //連接amfphp資料夾裡的gateway.php
	
	//var songname:String = new String("star2468");
	//var keysign:int = 0;
	//var speed:int = 120;
	
	
	
	
	//資料傳送成功時
	function onResult(Result:String):void { 
		//msg_txt.text=Result;
		abc.text="存檔完成";
	}
	//資料傳送失敗時
	function onFault(Result:Object):void {  
	   // msg_txt.text="錯誤";
	   abc.text="存檔失敗 請再試ㄧ次";
	}
	
	
	function sn(event:MouseEvent){
		abc.text="存檔中";
		//connection.call("writenote.songname",responder,songname,keysign,speed);
		for (var nn:int=0; nn<10; nn++) {
			for (var bb:int=0; bb<3; bb++) {
				for (var vv:int=0; vv<64; vv++) {
					for (var kk:int=0; kk<5; kk++) {
						if (mus[nn][bb][vv][kk].a_tempo!=null){
							connection.call("writenote.addnote_high",null,songname,nn,bb,vv,kk,mus[nn][bb][vv][kk].xx,mus[nn][bb][vv][kk].yy,mus[nn][bb][vv][kk].cc,mus[nn][bb][vv][kk].a_tempo,mus[nn][bb][vv][kk].a_pitch,mus[nn][bb][vv][kk].sign,mus[nn][bb][vv][kk].sharpflat);
						}
					}
				}
			}
		}
		for (var pagetemp:int=0;pagetemp<10;pagetemp++){
			for (var linetemp:int=0;linetemp<3;linetemp++){
				connection.call("writenote.addcount_high",null,songname,pagetemp,linetemp,sa_linecount[pagetemp][linetemp],pagecounthigh[pagetemp]);
			}
		}
		
		for (pagetemp=0;pagetemp<10;pagetemp++)
		for (linetemp=0;linetemp<3;linetemp++)
		connection.call("writenote.addcount_low",null,songname,pagetemp,linetemp,sb_linecount[pagetemp][linetemp],pagecountlow[pagetemp]);
		
		for ( nn=0; nn<10; nn++) {
			for (bb=0; bb<3; bb++) {
				for (vv=0; vv<64; vv++) {
					for (kk=0; kk<5; kk++) {
						if (muslow[nn][bb][vv][kk].a_tempo!=null)
							connection.call("writenote.addnote_low",null,songname,nn,bb,vv,kk,muslow[nn][bb][vv][kk].xx,muslow[nn][bb][vv][kk].yy,muslow[nn][bb][vv][kk].cc,muslow[nn][bb][vv][kk].a_tempo,muslow[nn][bb][vv][kk].a_pitch,muslow[nn][bb][vv][kk].sign,muslow[nn][bb][vv][kk].sharpflat);
					}
				}
			}
		}
		
	
	
	for (pagetemp=0;pagetemp<10;pagetemp++){
		for (var eightinit=0; eightinit<100; eightinit++) {
			if (eightarray[pagetemp][eightinit].n!=0)
			connection.call("writenote.addeight",null,songname,pagetemp,eightinit,eightarray[pagetemp][eightinit].MinX,eightarray[pagetemp][eightinit].EvaY,eightarray[pagetemp][eightinit].MaxX,eightarray[pagetemp][eightinit].EvaX,eightarray[pagetemp][eightinit].n);
		}
	}
	
	for (pagetemp=0;pagetemp<10;pagetemp++){
		for (var slurinit=0; slurinit<100; slurinit++) {
			if (slurarray[pagetemp][slurinit].middlept!=0)
			connection.call("writenote.addslur",null,songname,pagetemp,slurinit,slurarray[pagetemp][slurinit].MinX,slurarray[pagetemp][slurinit].MaxX,slurarray[pagetemp][slurinit].firstY,slurarray[pagetemp][slurinit].middlept,slurarray[pagetemp][slurinit].MaxY,slurarray[pagetemp][slurinit].lastY);
		}
	}
	connection.call("writenote.addkeyspeed",responder,songname,keysign,speed);
	
	}

}