function sendSpecialCmd(ctl,splCmd,subCmd,parameter){
	var message =[0x9c,0xc0,0x00,parameter.length+4,0x00,0x01,ctl,0xff,splCmd,subCmd];
	for(i=0;i<parameter.length;i++){
		message.push(parameter[i]);
	}
	message.push(0x36);
	$.ajax({
		type: "POST",
		data: {"Bytes" : message},				
		url:"templates/send.php",  
		success:function(data) {
			//alert(data);
		},
		error:function(a,b,c){
		alert(b);
		}
	});
}

//draw
function showColor(r,g,b){
	var parameter = [r,g,b];
	sendSpecialCmd(0x80,0x01,0x01,parameter);
}

function setPixel(x,y,r,g,b){
	var parameter = [x,y,r,g,b];
	sendSpecialCmd(0x80,0x01,0x02,parameter);
}

function setLine(x1,y1,x2,y2,r,g,b){
	var parameter = [x1,y1,x2,y2,r,g,b];
	sendSpecialCmd(0x80,0x01,0x03,parameter);
}

function setRect(x1,y1,x2,y2,r,g,b){
	var parameter = [x1,y1,x2,y2,r,g,b];
	sendSpecialCmd(0x80,0x01,0x04,parameter);
}

function setCirc(x1,y1,r,r,g,b){
	var parameter = [x1,y1,x2,r,g,b];
	sendSpecialCmd(0x80,0x01,0x05,parameter);
}

//ani
function invader(skipFrame,dimmer,saturation){
	var parameter = [skipFrame,dimmer,saturation];
	sendSpecialCmd(0x80,0x03,0x01,parameter);
}

function fadeDirection(skipFrame,delta,direction,dimmer,saturation){
	var parameter = [skipFrame,delta,direction,dimmer,saturation];
	sendSpecialCmd(0x80,0x03,0x02,parameter);
}

function fadeScreen(skipFrame,delta,dimmer,saturation){
	var parameter = [skipFrame,delta,dimmer,saturation];
	sendSpecialCmd(0x80,0x03,0x03,parameter);
}

function pulseColor(skipFrame,delta/*,r,g,b*/){
	var parameter = [skipFrame,delta/*,r,g,b*/];
	sendSpecialCmd(0x80,0x03,0x04,parameter);
}

function rotor(skipFrame,antiAliasing,width,px,py/*,r,g,b,br,bg,bb*/){
	var parameter = [skipFrame,antiAliasing,width,px,py/*,r,g,b,br,bg,bb*/];
	sendSpecialCmd(0x80,0x03,0x05,parameter);
}

function drop(skipFrame,antiAliasing,width/*,r,g,b,br,bg,bb*/){
	var parameter = [skipFrame,antiAliasing,width/*,r,g,b,br,bg,bb*/];
	sendSpecialCmd(0x80,0x03,0x06,parameter);
}

function fadePixel(skipFrame,num,speed/*,r,g,b*/){
	var parameter = [skipFrame,0x0,num,speed/*,r,g,b*/];
	sendSpecialCmd(0x80,0x03,0x07,parameter);
}

function fallingPixel(skipFrame,num,length,direction,diff/*,r,g,b*/){
	var parameter = [skipFrame,num,length,direction,diff/*,r,g,b*/];
	sendSpecialCmd(0x80,0x03,0x08,parameter);
}

function plasma(skipFrame,dimmer,saturation){
	var parameter = [skipFrame,dimmer,saturation];
	sendSpecialCmd(0x80,0x03,0x09,parameter);
}

function paletteClear(){
	sendSpecialCmd(0x80,0x06,0x01,[]);
}

function paletteAppend(r,g,b){
	var parameter = [r,g,b];
	sendSpecialCmd(0x80,0x06,0x02,parameter);
}

function paletteUpdate(r,g,b){
	var parameter = [r,g,b];
	sendSpecialCmd(0x80,0x06,0x03,parameter);
}

function sysShutdown(){
	endSpecialCmd(0x80,0xFE,0x01,[]);
}

function sysReboot(){
	var parameter = [];
	sendSpecialCmd(0x80,0xFE,0x02,[]);
}