
//曲線
public var roundObject:MovieClip = new MovieClip(); 

//虛線
public var EvaLine:Sprite = new Sprite(); 

//記錄框框的起點座標
var areaMouseDownX;
var areaMouseDownY;

//碰撞偵測XY極值
var MaxX=0;
var MinX=9999;
var MaxY=0;
var MinY=9999;
var middlept=0;

//高八度線用XY
var EvaX=0;
var EvaY=0;

var Arrayi=0;

var re:Boolean;

 //trace("container="+container);

//記錄圈到的那些物件
var selectedMC :Array = new Array(); 
public var slurarray:Array=new Array(10);
public var slurI:int=0;
public var eightarray:Array=new Array(10);
public var eightI:int=0;

//框框的初始參數
public function selectinit(){
	
	for (var i:int=0;i<10;i++){
		slurarray[i]=new Array(100);
		eightarray[i]=new Array(100);
	}
	
	for (i=0;i<10;i++){
		for (var j=0;j<100;j++){
			slurarray[i][j]=new slurtype();
			eightarray[i][j]=new eighttype();
		}
	}
	
	this.removeChild(area);
	area.mouseEnabled = false;
}
/*//點點顏色不要一直亂抖 好嗎？
gotoAndStop1();*/

//高低八度、圓滑線開關
var SlurSwitch:Boolean=false;
var EightvaSwitch:Boolean=false;


function slur(e:MouseEvent):void{
	EightvaSwitch=false;
	SlurSwitch=true;
}

function Eva(e:MouseEvent):void{
	SlurSwitch=false;
	EightvaSwitch=true;
}




function DeleteHandler(e:MouseEvent):void{ //刪除增加
	for each(var MC:MovieClip in selectedMC){
		MC.parent.removeChild(MC);
	for (var nn:int=0; nn<10; nn++) {
		for (var bb:int=0; bb<3; bb++) {
			for (var vv:int=0; vv<64; vv++) {
				if ((mus[nn][bb][vv][0].xx==MC.x) && (mus[nn][bb][vv][0].yy==MC.y)) {
					
					for (var yy:int=0;yy<5;yy++)
						mus[nn][bb][vv][yy]=new musical();
					
					
					
					for(var gg:int=vv;gg<64;gg++){
						if (mus[nn][bb][gg][0]!=null)
						mus[nn][bb][gg]=mus[nn][bb][gg+1]
					}
				}
			}
		}
	}
	
	for (nn=0; nn<10; nn++) {
		for (bb=0; bb<3; bb++) {
			for (vv=0; vv<64; vv++) {
				if ((muslow[nn][bb][vv][0].xx==MC.x) && (muslow[nn][bb][vv][0].yy==MC.y)) {
					
					for (yy=0;yy<5;yy++)
						muslow[nn][bb][vv][yy]=new musical();
					
					
					
					for(gg=vv;gg<64;gg++){
						if (muslow[nn][bb][gg][0]!=null)
						muslow[nn][bb][gg]=muslow[nn][bb][gg+1]
					}
				}
			}
		}
	}
		
	}
	
		removeChild(container);
		container=new Sprite();
		init(page);
		trace("刪除container:"+container,"刪除page:"+page)
}


function CancelbtnHandler(e:MouseEvent):void{
	SlurSwitch=false;
	EightvaSwitch=false;
}

function StartSelect(e:MouseEvent):void{
	re=true;
	//拖曳滑鼠
	stage.addEventListener(MouseEvent.MOUSE_MOVE, Select);
	
	//XY極值初始化
	MaxX=0;
	MinX=9999;
	MaxY=0;
	MinY=9999;
	
	area.x = e.stageX;
	area.y = e.stageY;
	area.scaleX = 0;
	area.scaleY = 0;
	
	areaMouseDownX = area.x;
	areaMouseDownY = area.y;
	
	//顯示框框
	this.addChild(area);
}

function EndSelect(e:MouseEvent):void{
	if (re==true){
		//看看碰到哪些人
		selectedMC = hitTest();
		
		var firstY=0;
		var lastY=0;
		
		for(var i=0;i<Arrayi;i++)
		{
			trace(selectedMC[i].getBounds(this));
			trace(selectedMC[i].getRect(this).y); 
			
			if (selectedMC[i].x > MaxX)    MaxX = selectedMC[i].x;
			if (selectedMC[i].x < MinX)    MinX = selectedMC[i].x;
			if (selectedMC[i].getRect(this).y > MaxY)    MaxY = selectedMC[i].getRect(this).y;
			if (selectedMC[i].getRect(this).y < MinY)    MinY = selectedMC[i].getRect(this).y;
			
			if(i==1) firstY=selectedMC[i].getRect(this).y;
			lastY=selectedMC[i].getRect(this).y;
				
		}
		trace("firstY="+firstY);
		trace("lastY="+lastY);
		
		trace("MaxX="+MaxX);
		trace("MinX="+MinX);
		trace("MaxY="+MaxY);
		trace("MinY="+MinY);
		
		trace("Arrayi="+Arrayi/2);
		
		if(SlurSwitch==true && Arrayi>1)
		{
			trace("SlurSwitch="+SlurSwitch);
			middlept=(MaxX+MinX)/2;

			//roundObject.graphics.lineStyle(2, 00000000, .75); 
			//roundObject.graphics.moveTo(MinX+2,firstY-5); 
			//roundObject.graphics.curveTo(middlept, MaxY-30, MaxX+2, lastY-5); 
			//selectcontainer.addChild(roundObject);
			var Slurtype:slurtype=new slurtype();
			Slurtype.MaxX=MaxX;
			Slurtype.MinX=MinX;
			Slurtype.firstY=firstY;
			Slurtype.middlept=middlept;
			Slurtype.MaxY=MaxY;
			Slurtype.MaxX=MaxX;
			Slurtype.lastY=lastY;
			
			while(slurarray[page][slurI].middlept!=0){
				slurI++;
			}
			slurarray[page][slurI]=Slurtype;
			removeChild(container);
			container=new Sprite();
			init(page);
		}
		
		if(EightvaSwitch==true && Arrayi>1)
		{
			trace("EightvaSwitch="+EightvaSwitch);
			
			var n=(MaxX-MinX)/12;
			EvaX=MinX;
			JudgeMethod();
			
			/*var EvaHead:MovieClip=new Eva_head ;
			selectcontainer.addChild(EvaHead);
			EvaHead.x=MinX;
			EvaHead.y=EvaY;
			
			var EvaTale:MovieClip=new Eva_tale ;
			selectcontainer.addChild(EvaTale);
			EvaTale.x=MaxX;
			EvaTale.y=EvaY;*/
			
			
			var Eighttype:eighttype=new eighttype();
			Eighttype.n=n;
			Eighttype.MaxX=MaxX;
			Eighttype.MinX=MinX;
			Eighttype.EvaY=EvaY;
			Eighttype.EvaX=EvaX;
			while(eightarray[page][eightI].n!=0){
				eightI++;
			}
			eightarray[page][eightI]=Eighttype;

			for each(var MC:MovieClip in selectedMC){
		
	for (var nn:int=0; nn<10; nn++) {
		for (var bb:int=0; bb<3; bb++) {
			for (var vv:int=0; vv<64; vv++) {
				if ((mus[nn][bb][vv][0].xx==MC.x) && (mus[nn][bb][vv][0].yy==MC.y)) {
					
					for (var yy:int=0;yy<5;yy++)
						mus[nn][bb][vv][yy].a_pitch=mus[nn][bb][vv][yy].a_pitch+7;
					
					
				}
			}
		}
	}
	
	for (nn=0; nn<10; nn++) {
		for (bb=0; bb<3; bb++) {
			for (vv=0; vv<64; vv++) {
				if ((muslow[nn][bb][vv][0].xx==MC.x) && (muslow[nn][bb][vv][0].yy==MC.y)) {
					
					for (yy=0;yy<5;yy++)
						muslow[nn][bb][vv][yy].a_pitch=muslow[nn][bb][vv][yy].a_pitch+7;
				}
			}
		}
	}
		
	}
			
			
			
			removeChild(container);
			container=new Sprite();
			init(page);
			
			
			
/*			for(i=0;i<=n;i++){
				EvaX=EvaX+12;
				EvaLine.graphics.lineStyle(2, 00000000, .75); 
				EvaLine.graphics.moveTo(EvaX,EvaY);
				EvaLine.graphics.lineTo(EvaX+7,EvaY);
				
				selectcontainer.addChild(EvaLine);
			}*/
							
		}
		
		/*else
		{
			//停止拖曳滑鼠
			stage.removeEventListener(MouseEvent.MOUSE_MOVE, Select);
	
			//移走框框
			this.removeChild(area);
			
			re=false;
		}*/
		
		//停止拖曳滑鼠
		stage.removeEventListener(MouseEvent.MOUSE_MOVE, Select);
	
		//移走框框
		this.removeChild(area);
			
		re=false;
		
		Arrayi=0;
	}
}

function Select(e:MouseEvent):void{
	//變形
	area.scaleX = (e.stageX - areaMouseDownX)/100;
	area.scaleY = (e.stageY - areaMouseDownY)/100;
	//看看碰到哪些人
	var array:Array = hitTest();
	Arrayi=0;
	//取消變色
		gotoAndStop1();
	
	//變色
	var CFN=0;
	for each(var MC2:MovieClip in array){
/*	    //MC2.gotoAndStop(MC2.currentFrame + 30);
		CFN=MC2.currentFrame+30;
		trace("CFN="+CFN);
		MC2.gotoAndStop(CFN);*/
		setColor(MC2,255,0,0);
	}
}

/*function setColor(target:DisplayObject, r:int, g:int, b:int):void
{
	var matrix:Array = new Array();
    matrix = matrix.concat([0, 0, 0, 0, r]); // red
    matrix = matrix.concat([0, 0, 0, 0, g]); // green
    matrix = matrix.concat([0, 0, 0, 0, b]); // blue
	matrix = matrix.concat([0, 0, 0, 1, 0]); // alpha

	var filter:ColorMatrixFilter = new ColorMatrixFilter(matrix);
    var filters:Array = new Array();
    filters.push(filter);
    target.filters = filters;
}*/

//傳回碰到的那些物件
function hitTest():Array{
	var array:Array = new Array();
	for(var i = 0 ; i < container.numChildren ; i++)
	{
		var MC = container.getChildAt(i) as MovieClip;
		if(area.hitTestObject(MC)){
			array.push(MC);
			Arrayi=Arrayi+1;
		}
	}	
	return array;
}

//取消變色
function gotoAndStop1(){
	for(var i = 0 ; i < container.numChildren ; i++)
	{
		var MC1 = container.getChildAt(i) as MovieClip;
		setColor(MC1,0,0,0);
	}
}

function JudgeMethod(){
	
	var x=stage.mouseX;
	var y=stage.mouseY;
	
	if (y>57.3&&y<129.3) {
		linejudge=1;
		EvaY=69;
	}
	if (y>135.3&&y<198.3) {
		linejudge=2;
		EvaY=147;
	}
	if (y>198.3&&y<261.3) {
		linejudge=3;
		EvaY=201;
	}
	if (y>267.3&&y<330.3) {
		linejudge=4;
		EvaY=279;
	}
	if (y>330.3&&y<393.3) {
		linejudge=5;
		EvaY=333;
	}
	if (y>399.3&&y<471.3) {
		linejudge=6;
		EvaY=411;
	}
	
	return EvaY;
	
	
}