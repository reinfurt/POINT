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
var counter = 0;
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
	context.font = "196px futura-book"; // [96]
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

	// blink year, increment year?

	// year = year - (counter % 3);
	// console.log(counter % 3);

	yearstring = year + ".";
	datestring = year + "." + month + "." + day;
	timestring = hour + "." + minute + "." + second;

	context.clearRect(0, 0, canvas.width, canvas.height);
	context.fillText(yearstring, 0, canvas.height);
 	// context.fillText(datestring, 0, canvas.height/2);
	// context.fillText(timestring, 0, canvas.height);

	blinkYear = !Boolean(blinkYear);

	if (!Boolean(blinkYear)) {
		// year = ". . . . ";
		// year = year - 1;
		// context.clearRect(0, 0, canvas.width/1.25, canvas.height);
		context.clearRect(canvas.width/1.25, 0, canvas.width, canvas.height);
		// context.clearRect(0, 0, canvas.width/1.42, canvas.height/2);
	} 


	counter++;
	timeout = setTimeout(function(){updatePointDuration();}, delay);
}


function checkDigit(i) {

	// add zero in front of numbers < 10
    
	if ( i < 10 ) {	

		i = "0" + i
	};  
	return i;
}


function selectYear(year) {

	// flip through year to next one

	fillcolor="#F30";
        context.fillStyle = fillcolor;	

        // year = year - (counter % 3);
        year = year - 1;
	yearstring = year + ".";

        console.log(counter % 3);
        console.log("year : " + year);

	context.clearRect(0, 0, canvas.width, canvas.height);
	context.fillText(yearstring, 0, canvas.height);

	return year;
}


function displayYear(year) {

	// flip through year to next one

	fillcolor="#000";
        context.fillStyle = fillcolor;	

        // year = year - (counter % 3);
        year = year - 1;
	yearstring = year + ".";

        console.log(counter % 3);
        console.log("year : " + year);

	context.clearRect(0, 0, canvas.width, canvas.height);
	context.fillText(yearstring, 0, canvas.height);

	return year;
}




