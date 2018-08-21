
		public function loadvar() {
			abc.text="讀取中";
			var connection:NetConnection=new NetConnection;//宣告NetConnection物件
		var responder:Responder;//宣告 Responder物件
				
				//pagemsg.text="pp:"+page;
				//建立物件實體
				var responderlineH=new Responder(onResultlineH,onFaultlineH);
				var responderlineL=new Responder(onResultlineL,onFaultlineL);

				var responderpageH=new Responder(onResultpageH,onFaultpageH);
				var responderpageL=new Responder(onResultpageL,onFaultpageL);

				var responderhigh=new Responder(onResulthigh,onFaulthigh);
				var responderlow=new Responder(onResultlow,onFaultlow);
				
				var responderkey=new Responder(onResultkey,onFaultkey);
				var responderspeed=new Responder(onResultspeed,onFaultspeed);

				var respondereight=new Responder(onResulteight,onFaulteight);
				var responderslur=new Responder(onResultslur,onFaultslur);


				//設定Service連線
				var gateway:String="/amfphp/gateway.php";

				//var songname:String=new String("star2468");
				connection.connect(gateway);//連接amfphp資料夾裡的gateway.php
				//sum="false";
				///////////////////////////////////////////////////////////////////////////
				//var dispatcher:CustomDispatcher = new CustomDispatcher();
				addEventListener("1",actionHandler);
				addEventListener("2",actionHandler);
				addEventListener("3",actionHandler);
				addEventListener("4",actionHandler);
				addEventListener("5",actionHandler);
				addEventListener("6",actionHandler);
				addEventListener("7",actionHandler);
				addEventListener("8",actionHandler);
				addEventListener("9",actionHandler);
				addEventListener("10",actionHandler);
				addEventListener("test",actionHandler2);
				//addEventListener("1","2","3",actionHandler);

				connection.call("guestread.readline_high",responderlineH,songname,userid);
				connection.call("guestread.readline_low",responderlineL,songname,userid);

				connection.call("guestread.readpage_high",responderpageH,songname,userid);
				connection.call("guestread.readpage_low",responderpageL,songname,userid);

				connection.call("guestread.readnote_high",responderhigh,songname,userid);
				connection.call("guestread.readnote_low",responderlow,songname,userid);
				
				connection.call("guestread.readkey",responderkey,songname,userid);
				connection.call("guestread.readspeed",responderspeed,songname,userid);

				connection.call("guestread.readeight",respondereight,songname,userid);
				connection.call("guestread.readslur",responderslur,songname,userid);

				var uu=0;
				function onResultlineH(ResultlineH:String):void {

					
					if (ResultlineH!=null){
					
						var hightemp=ResultlineH.substring(0,ResultlineH.length - 1).split("_");
						for (var ww:int=0; ww <= hightemp.length - 1; ww++) {
							//var highs:Array=hightemp[ww].substring(0,hightemp[ww].length - 1).split(":");
							var highs:Array=hightemp[ww].split(":");
							//pagemsg.text=":"+highs[0]+highs[1]+highs[2];
							//for (uu=0;uu <= highs.length-1;uu+){
								if (highs[0]==undefined){
									sa_linecount[ww][0]=-1;
								}else if (highs[1]==undefined){
									sa_linecount[ww][1]=-1;
								}else if (highs[2]==undefined){
									sa_linecount[ww][2]=-1;
								}
									//if (ww==0)
										//abc.text=String(sa_linecount[0][1]);
								
								sa_linecount[ww][0]=Number(highs[0]);
								sa_linecount[ww][1]=Number(highs[1]);
								sa_linecount[ww][2]=Number(highs[2]);
							//}
						}
						//pagemsg.text=":"+sa_linecount[0][0]+":"+sa_linecount[0][1];
					}
					dispatchEvent(new Event("1"));
					//sa_linecount[page][flag1]=Number(ResultlineH);
					
				}
				var flag2=0;
				function onResultlineL(ResultlineL:String):void {
					
					//sb_linecount[page][flag2]=Number(ResultlineL);
					
					if (ResultlineL!=null){
						var lowtemp=ResultlineL.substring(0,ResultlineL.length - 1).split("_");
						for (var ww:int=0; ww <= lowtemp.length - 1; ww++) {
							var lows:Array=lowtemp[ww].split(":");
							
							//for (var ee:int=0;ee <= lows.length-1;ee+) {
								//sb_linecount[ww][ee]=lows[ee];
							//}
							if (lows[0]==undefined){
								sb_linecount[ww][0]=-1;
							}else if (lows[1]==undefined){
								sb_linecount[ww][1]=-1;
							}else if (lows[2]==undefined){
								sb_linecount[ww][2]=-1;
							}
							
							//if (ww==0)
								//abc.text=String(sa_linecount[0][1]);
							
								sb_linecount[ww][0]=Number(lows[0]);
								sb_linecount[ww][1]=Number(lows[1]);
								sb_linecount[ww][2]=Number(lows[2]);
						}
					}
				dispatchEvent(new Event("2"));
				}
				function onResultpageH(ResultpageH:Object):void {
				//分號不可用"_" , pagecounthigh會變成字串陣列 要轉換
				
					//pagecounthigh[page]=Number(ResultpageH);
					//msg.text=pagecounthigh[page];
					if (ResultpageH!=null){
						var temphp:Array=ResultpageH.substring(0,ResultpageH.length-1).split("_");
						pagecounthigh=temphp;
					}
					dispatchEvent(new Event("3"));
				}

				function onResultpageL(ResultpageL:String):void {
					
					//pagecountlow[page]=Number(ResultpageL);
					//msg.text="test4+"+ResultpageL;
					if (ResultpageL!=null){
						var temphp:Array=ResultpageL.substring(0,ResultpageL.length-1).split("_");
						pagecountlow=temphp;
					}
					dispatchEvent(new Event("4"));
					
				}
				function onResulthigh(Resulthigh:Object):void {
					
					if (Resulthigh != null) {
						//abc.text="cc";
						var notehightemp=Resulthigh.substring(0,Resulthigh.length - 1).split("=");
						for (var ww:int=0; ww <= notehightemp.length - 1; ww++) {
							var notehighs:Array=notehightemp[ww].substring(0,notehightemp[ww].length - 1).split("_");
							for (var ee:int=0; ee <= notehighs.length - 1; ee++) {
							var notehigh:Array=notehighs[ee].substring(0,notehighs[ee].length - 1).split(":");
								mus[notehigh[0]][notehigh[1]][notehigh[2]][notehigh[3]].xx=Number(notehigh[4]);
								mus[notehigh[0]][notehigh[1]][notehigh[2]][notehigh[3]].yy=Number(notehigh[5]);
								mus[notehigh[0]][notehigh[1]][notehigh[2]][notehigh[3]].cc=Number(notehigh[6]);
								mus[notehigh[0]][notehigh[1]][notehigh[2]][notehigh[3]].a_pitch=Number(notehigh[7]);
								mus[notehigh[0]][notehigh[1]][notehigh[2]][notehigh[3]].a_tempo=notehigh[8];
								mus[notehigh[0]][notehigh[1]][notehigh[2]][notehigh[3]].sign=notehigh[9];
								mus[notehigh[0]][notehigh[1]][notehigh[2]][notehigh[3]].sharpflat=notehigh[10];
								trace("ok");
							}
						}
					}
					dispatchEvent(new Event("5"));
				}
				function onResultlow(Resultlow:String):void {
					
					if (Resultlow!=null) {
						//abc.text=Resultlow;
						var notelowtemp=Resultlow.substring(0,Resultlow.length - 1).split("=");
						//abc.text=notelowtemp[0];
						for (var ww:int=0; ww <= notelowtemp.length - 1; ww++) {
							//abc.text=notelowtemp[0];
							var notelows:Array=notelowtemp[ww].substring(0,notelowtemp[ww].length - 1).split("_");
							//abc.text=notelows[0];
							for (var ee:int=0; ee <= notelows.length - 1; ee++) {
							var notelow:Array=notelows[ee].substring(0,notelows[ee].length - 1).split(":");
							//abc.text=notelow[0];
								muslow[notelow[0]][notelow[1]][notelow[2]][notelow[3]].xx=Number(notelow[4]);
								muslow[notelow[0]][notelow[1]][notelow[2]][notelow[3]].yy=Number(notelow[5]);
								muslow[notelow[0]][notelow[1]][notelow[2]][notelow[3]].cc=Number(notelow[6]);
								muslow[notelow[0]][notelow[1]][notelow[2]][notelow[3]].a_pitch=Number(notelow[7]);
								muslow[notelow[0]][notelow[1]][notelow[2]][notelow[3]].a_tempo=notelow[8];
								muslow[notelow[0]][notelow[1]][notelow[2]][notelow[3]].sign=notelow[9];
								muslow[notelow[0]][notelow[1]][notelow[2]][notelow[3]].sharpflat=notelow[10];
								trace("ok");
							}
						}
					}
					
					dispatchEvent(new Event("6"));
				}
				
				
				function onResultkey(Resultkey:String):void {
					
					keysign=Number(Resultkey);
					
					dispatchEvent(new Event("7"));
				}
				
				function onResultspeed(Resultspeed:String):void {
					
					speed=Number(Resultspeed);
					
					dispatchEvent(new Event("8"));
				}
				
				function onResulteight(Resulteight:String):void {
					if (Resulteight!=null){
						var noteeights:Array=Resulteight.substring(0,Resulteight.length - 1).split("_");
							//abc.text=notelows[0];
							for (var ee:int=0; ee <= noteeights.length - 1; ee++) {
							var noteeight:Array=noteeights[ee].substring(0,noteeights[ee].length).split(":");
							//abc.text=notelow[0];
								eightarray[noteeight[0]][noteeight[1]].MinX=Number(noteeight[2]);
								eightarray[noteeight[0]][noteeight[1]].EvaY=Number(noteeight[3]);
								eightarray[noteeight[0]][noteeight[1]].MaxX=Number(noteeight[4]);
								eightarray[noteeight[0]][noteeight[1]].EvaX=Number(noteeight[5]);
								eightarray[noteeight[0]][noteeight[1]].n=Number(noteeight[6]);
								trace("ok");
								//abc.text=noteeight[6];
							}
					}
					//speed=Number(Resultspeed);
					
					dispatchEvent(new Event("9"));
				}
				
				function onResultslur(Resultslur:String):void {
					if (Resultslur!=null){
						var noteslurs:Array=Resultslur.substring(0,Resultslur.length - 1).split("_");
							//abc.text=notelows[0];
							for (var ee:int=0; ee <= noteslurs.length - 1; ee++) {
							var noteslur:Array=noteslurs[ee].substring(0,noteslurs[ee].length).split(":");
							//abc.text=notelow[0];
								slurarray[noteslur[0]][noteslur[1]].MinX=Number(noteslur[2]);
								slurarray[noteslur[0]][noteslur[1]].MaxX=Number(noteslur[3]);
								slurarray[noteslur[0]][noteslur[1]].firstY=Number(noteslur[4]);
								slurarray[noteslur[0]][noteslur[1]].middlept=Number(noteslur[5]);
								slurarray[noteslur[0]][noteslur[1]].MaxY=Number(noteslur[6]);
								slurarray[noteslur[0]][noteslur[1]].lastY=Number(noteslur[7]);
								trace("ok");
								
							}
					}
					
					//speed=Number(Resultspeed);
					//abc.text=Resultslur+":";
					dispatchEvent(new Event("10"));
				}
				
				
				
				
				
				
				//資料傳送失敗時
				function onFaultlineH(ResultlineH:String):void {
					//msg.text="xxxx1";
				}
				function onFaultlineL(ResultlineL:String):void {
					//msg.text="xxxx2";
				}
				function onFaultpageH(ResultpageH:String):void {
					//msg.text="xxxx3";
				}
				function onFaultpageL(ResultpageL:String):void {
					//msg.text="xxx4";
				}
				function onFaulthigh(Resulthigh:String):void {
					//msg.text="xxx5";
				}
				function onFaultlow(Resultlow:String):void {
					//msg.text="xx6";
				}
				function onFaultkey(Resultkey:String):void {
					//msg.text="xx6";
				}
				function onFaultspeed(Resultspeed:String):void {
					//msg.text="xx6";
				}
				function onFaulteight(Resulteight:String):void {
					//msg.text="xx6";
				}
				function onFaultslur(Resultslur:String):void {
					//msg.text="xx6";
				}

				function actionHandler(event:Event):void {
					//abc.text=event.type;
					if (Number(event.type)==10) {
						//sum="true";
						//trace(sum);
						dispatchEvent(new Event("test"));
					}
				}
				function actionHandler2(event:Event):void {
					//trace(sum);
					abc.text="讀取完成";
					init(page);
				}
			}