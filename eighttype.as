package {
        import flash.display.*;
        import flash.events.*;
        import flash.utils.*;
        public class eighttype extends Sprite{
			public var MinX:int;
			public var EvaY:int;
			public var MaxX:int;
			public var EvaX:int;
			public var n:int;
			public var EvaHead:MovieClip=new Eva_head;
			public var EvaTale:MovieClip=new Eva_tale;
			
			public function eighttype()
			{
				this.addChild(EvaHead);
				this.addChild(EvaTale);
			}
			
			public function draw():void{
				EvaHead.x= MinX;
				EvaHead.y= EvaY;
				EvaTale.x=MaxX;
				EvaTale.y=EvaY;
				
				this.graphics.clear();
				this.graphics.lineStyle(2, 00000000, .75);
				for (var i=0; i<= n; i++) 
				{
					this.graphics.moveTo(EvaX + 12*i ,EvaY);
					this.graphics.lineTo(EvaX + 12*i + 7,EvaY);
				}							
			}
        }
}
