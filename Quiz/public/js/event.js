
function patEvent(){
var listeners = {};
function addEventListener(event, closure){
if(!listeners[event]){
	listeners[event] = [];
}
listeners[event].push(closure);
}
function deployEvent(event){
if(listeners[event.type]){
	for(var i in listeners[event.type]){
		event.target = this;
		listeners[event.type][i].call(null,event);
	}
}
}
return { addEventListener:addEventListener, deployEvent:deployEvent};
}


function panel(testCell,testAn,img,testSelect,indicator){
	Object.assign(panel.prototype,patEvent());

        img.setAttribute("height","75");
        img.setAttribute("width","100");

	var self = this;
this.__defineGetter__("TestAnswerListCell",
function(){
	self.deployEvent("TestAnswerListCell");
	return testCell;
});
this.__defineGetter__("TestAnswerName",
function(){
	self.deployEvent("TestAnswerName");
	return testAn;
});
this.__defineGetter__("photo",
function(){
	self.deployEvent("photo");
	return img;
});
this.__defineGetter__("TestAnswerSelect",
function(){
	self.deployEvent("TestAnswerSelect");
	return testSelect;
});
this.__defineGetter__("Indicator",
function(){
	self.deployEvent("Indicator");
	return indicator;
});

    }


function patWeb(url,toUpdate){
Object.assign(patWeb.prototype,patEvent());
var self = this;
var ws = new WebSocket(url);
ws.onclose= function(event){
	self.deployEvent("close");
	alert(event.code);
}
ws.onmessage = function(mes){
	console.log(mes.data);
	var dat = JSON.parse(mes.data);
		switch(dat.type){
			//NOTE list of potential events
			case "connected":
				self.deployEvent({type:"connected",message:dat});
				break;
			case "Focus":
				self.deployEvent({type:"Focus",message:dat});
				break;
			case "Page":
				self.deployEvent({type:"Page",message:dat});
				break;
			case "Test":
				self.deployEvent({type:"Test",message:dat});
				break;
                	default:
                    console.log(dat);
                           }
        };
function send(mes){
	ws.send(JSON.stringify(new Message(null,null,"broadcast",mes)));
}


}
