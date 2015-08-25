// pointDuration
//
// adapted from animateX.js
// and http://www.w3schools.com/canvas/tryit.asp?filename=trycanvas_clock_start
//
// display : {id}
// animate : {true, false}	
// delay : ## [50]

// globals

var u;
var bgcolor = "#FFF";
var linecolor = "#000";
var fillcolor = "#000";
var linewidth = 1;
var timeout;
var canvas;
var context;
var delay = 500;
var blinkYear = true;

function initPointDuration(canvasId) {

        canvas = document.getElementById(canvasId);
        live = {
                width: canvas.width,
                height: canvas.height
        };

        u = live.height;

        context = canvas.getContext("2d");
        context.strokeStyle = linecolor;
        context.lineWidth = linewidth;
        context.fillStyle = fillcolor; 
	// canvas needs to have font immediately loaded in order to draw
	// and font loading is a background task, so loaded in dummy div of d-o-m
	context.font = "96px futura-book"; 
	context.textAlign = "left"; 
	context.textBaseline = "bottom"; // default = alphabetic
	updatePointDuration();
}


function updatePointDuration() {

	var now = new Date();
	var hour = now.getHours();
	var minute = now.getMinutes();
	var second = now.getSeconds();

	var month = now.getMonth();
	var day = now.getDate();
	var year = now.getFullYear();

	month = checkDigit(month);
	day = checkDigit(day);
	hour = checkDigit(hour);
	minute = checkDigit(minute);
	second = checkDigit(second);

	blinkYear = !Boolean(blinkYear);

	if (!Boolean(blinkYear)) {
		// year = ". . . . ";
		year = year - 1;
		// context.clearRect(0, 0, canvas.width-360, canvas.height/2);
		// context.clearRect(0, 0, canvas.width/1.42, canvas.height/2);
	} 

	datestring = year + "." + month + "." + day;
	timestring = hour + "." + minute + "." + second;

	context.clearRect(0, 0, canvas.width, canvas.height);
	context.fillText(datestring, canvas.width/2, canvas.height/2);
	context.fillText(timestring, canvas.width/2, canvas.height);


	timeout = setTimeout(function(){updatePointDuration();}, delay);
}


function checkDigit(i) {

	// add zero in front of numbers < 10
    
	if ( i < 10 ) {	

		i = "0" + i
	};  
	return i;
}



