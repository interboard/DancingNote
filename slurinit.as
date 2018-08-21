for (var slurinit=0;slurinit<100;slurinit++){
	if (slurarray[page][slurinit].middlept!=0){
	roundObject=new MovieClip();
	roundObject.graphics.lineStyle(2, 00000000, .75); 
	
	roundObject.graphics.moveTo(slurarray[page][slurinit].MinX+2,slurarray[page][slurinit].firstY-5); 
	roundObject.graphics.curveTo(slurarray[page][slurinit].middlept, slurarray[page][slurinit].MaxY-30, slurarray[page][slurinit].MaxX+2, slurarray[page][slurinit].lastY-5); 
	selectcontainer.addChild(roundObject);
	}
}