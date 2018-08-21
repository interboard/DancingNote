function CFunction(event:MouseEvent):void {
	removeChild(keysigncontainer);
	keysigncontainer=new Sprite();
	removeChild(container);
	container=new Sprite();

	keysign=0;
	var keychange:keyedit=new keyedit();
	keychange.edit(keysign,keysigncontainer);

	init(page);
}

function GFunction(event:MouseEvent):void {
	removeChild(keysigncontainer);
	keysigncontainer=new Sprite();
	removeChild(container);
	container=new Sprite();
	keysign=1;
	var keychange:keyedit=new keyedit();
	keychange.edit(keysign,keysigncontainer);
	init(page);
}

function DFunction(event:MouseEvent):void {
	removeChild(keysigncontainer);
	keysigncontainer=new Sprite();
	removeChild(container);
	container=new Sprite();
	keysign=2;
	var keychange:keyedit=new keyedit();
	keychange.edit(keysign,keysigncontainer);
	init(page);
}


function AFunction(event:MouseEvent):void {
	removeChild(keysigncontainer);
	keysigncontainer=new Sprite();
	removeChild(container);
	container=new Sprite();
	keysign=3;
	var keychange:keyedit=new keyedit();
	keychange.edit(keysign,keysigncontainer);
	init(page);
}
function EFunction(event:MouseEvent):void {
	removeChild(keysigncontainer);
	keysigncontainer=new Sprite();
	removeChild(container);
	container=new Sprite();
	keysign=4;
	var keychange:keyedit=new keyedit();
	keychange.edit(keysign,keysigncontainer);
	init(page);
}
function FFunction(event:MouseEvent):void {
		removeChild(keysigncontainer);
	keysigncontainer=new Sprite();
	removeChild(container);
	container=new Sprite();
	keysign=-1;
	var keychange:keyedit=new keyedit();
	keychange.edit(keysign,keysigncontainer);
	init(page);
	
}
function F_flatFunction(event:MouseEvent):void {
	removeChild(keysigncontainer);
	keysigncontainer=new Sprite();
	removeChild(container);
	container=new Sprite();
	keysign=-2;
	var keychange:keyedit=new keyedit();
	keychange.edit(keysign,keysigncontainer);
	init(page);
}
function E_flatFunction(event:MouseEvent):void {
	removeChild(keysigncontainer);
	keysigncontainer=new Sprite();
	removeChild(container);
	container=new Sprite();
	keysign=-3;
	var keychange:keyedit=new keyedit();
	keychange.edit(keysign,keysigncontainer);
	init(page);
}
function A_flatFunction(event:MouseEvent):void {
	removeChild(keysigncontainer);
	keysigncontainer=new Sprite();
	removeChild(container);
	container=new Sprite();
	keysign=-4;
	var keychange:keyedit=new keyedit();
	keychange.edit(keysign,keysigncontainer);
	init(page);
}
function D_flatFunction(event:MouseEvent):void {
	removeChild(keysigncontainer);
	keysigncontainer=new Sprite();
	removeChild(container);
	container=new Sprite();
	keysign=-5;
	var keychange:keyedit=new keyedit();
	keychange.edit(keysign,keysigncontainer);
	init(page);
}