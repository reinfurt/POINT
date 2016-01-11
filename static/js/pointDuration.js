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
var mid;
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

function initPointDuration(canvasId) 
{
	canvas = document.getElementById(canvasId);
	
	live = 
	{
		// width: canvas.width,
		// height: canvas.height
		width: window.innerWidth / 2,
		height: 250
	};
	u = live.height;
	

	// set canvas size
	canvas.width = live.width*2;
	canvas.height = live.height*2;
	canvas.style.width = live.width.toString().concat('px');
	canvas.style.height = live.height.toString().concat('px');

	mid = 
	{
		width: canvas.width / 2,
		height: canvas.height / 2
	}
	
	context = canvas.getContext("2d");
	context.strokeStyle = linecolor;
	context.lineWidth = linewidth;
	context.fillStyle = fillcolor;

	// canvas needs to have font immediately loaded in order to draw
	// and font loading is a background task, so loaded in dummy div of d-o-m
	
	// todo: adjust the font based on the viewport size
	context.font = "200px futura-book"; // [96]
	context.textAlign = "center"; 
	context.textBaseline = "middle"; // default = alphabetic
	updatePointDuration();
}


function updatePointDuration() 
{
	var now = new Date();
	var year = now.getFullYear();
	
// 	var hour = now.getHours();
// 	var minute = now.getMinutes();
// 	var second = now.getSeconds();
// 	var month = now.getMonth();
// 	var day = now.getDate();
// 	month = checkDigit(month);
// 	day = checkDigit(day);
// 	hour = checkDigit(hour);
// 	minute = checkDigit(minute);
// 	second = checkDigit(second);

// 	blink year, increment year?
// 	year = year - (counter % 3);
// 	console.log(counter % 3);

	yearstring = year + ".";
	yearstring = yearstring.replace("0", "O");
	// datestring = year + "." + month + "." + day;
	// timestring = hour + "." + minute + "." + second;

	context.clearRect(0, 0, canvas.width, canvas.height);
	context.fillText(yearstring, mid.width, mid.height);
	blinkYear = !Boolean(blinkYear);

	if(!Boolean(blinkYear)) 
	{
		yearstring = yearstring.replace(".", " ");
		context.clearRect(0, 0, canvas.width, canvas.height);
		context.fillText(yearstring, mid.width, mid.height);
	}
	
	counter++;
	timeout = setTimeout(function(){updatePointDuration();}, delay);
}


function checkDigit(i) 
{
	// add zero in front of numbers < 10
	if(i < 10)
		i = "0" + i;
	
	return i;
}

function selectYear(year) 
{
	clearTimeout(timeout);
	// flip through year to next one
	fillcolor="#F30";
    context.fillStyle = fillcolor;	

	// year = year - (counter % 3);
	yearstring = year + ".";
	yearstring = yearstring.replace("0", "O");

console.log(counter % 3);
console.log("year : " + year);

	context.clearRect(0, 0, canvas.width, canvas.height);
	context.fillText(yearstring, mid.width, mid.height);

	return year;
}

function displayYear(year)
{
	// flip through year to next one
	fillcolor="#000";
    context.fillStyle = fillcolor;	

	yearstring = year + ".";
	yearstring = yearstring.replace("0", "O");

console.log(counter % 3);
console.log("year : " + year);

	context.clearRect(0, 0, canvas.width, canvas.height);
	context.fillText(yearstring, mid.width, mid.height);

	timeout = setTimeout(function(){updatePointDuration();}, delay);
	
	return year;
}