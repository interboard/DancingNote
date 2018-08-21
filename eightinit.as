for (var eightinit=0; eightinit<100; eightinit++) {
	//EvaLine = new Sprite();
	if (eightarray[page][eightinit].n!=0) {
		eightarray[page][eightinit].draw();
		selectcontainer.addChild(eightarray[page][eightinit]);
	}
}