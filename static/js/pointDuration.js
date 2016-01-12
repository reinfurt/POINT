// pointDuration
//
// adapted from animateX.js
// and http://www.w3schools.com/canvas/tryit.asp?filename=trycanvas_clock_start
//
// display : {id}
// animate : {true, false}	
// delay : ## [50]

// globals

// canvas settings
var bgcolor = "#FFF";
var linecolor = "#000";
var fillcolor = "#000";
var linewidth = 1;

// canvas vars
var canvas_container;
var canvas_mid;
var canvas;
var context;

// timing variables
var dot_delay = 500;
var dot_timer;

var yearDelay = 1000;
var yearTimer;

var dot_blink = true;

// set these programmatically based on db (php)
var year =
	{
		min: 2012,
		max: 2016
	};
// var url = "http://local.org.dev/point/annual-reports/";

function initPointDuration(canvasId) 
{
	canvas = document.getElementById(canvasId);
	
	live = 
	{
		width: window.innerWidth / 2,
		height: 250
	};
	
	// set canvas size
	canvas.width = live.width*2;
	canvas.height = live.height*2;
	canvas.style.width = live.width.toString().concat('px');
	canvas.style.height = live.height.toString().concat('px');

	canvas_mid = 
	{
		width: canvas.width / 2,
		height: canvas.height / 2
	}
	
	context = canvas.getContext("2d");
	context.strokeStyle = linecolor;
	context.lineWidth = linewidth;
	context.fillStyle = fillcolor;
	
	// todo: adjust the font based on the viewport size
	context.font = "200px futura-book"; // [96]
	context.textAlign = "center"; 
	context.textBaseline = "middle"; // default = alphabetic
	updatePointDuration();
}


function updatePointDuration() 
{
	var now = new Date();
	year.now = now.getFullYear();

	year.string = year.now + ".";
	year.string = year.string.replace("0", "O");

	context.clearRect(0, 0, canvas.width, canvas.height);
	context.fillText(year.string, canvas_mid.width, canvas_mid.height);
	dot_blink = !Boolean(dot_blink);

	if(!Boolean(dot_blink)) 
	{
		year.string = year.string.replace(".", " ");
		context.clearRect(0, 0, canvas.width, canvas.height);
		context.fillText(year.string, canvas_mid.width, canvas_mid.height);
	}
	
	dot_timer = setTimeout(function(){updatePointDuration();}, dot_delay);
}

function initCanvasCycle(u)
{
	var now = new Date();
	url = u + "annual-reports/";
	year.now = now.getFullYear();
	year.display = year.now;
	canvas_container = document.getElementById('clock');
	clearTimeout(dot_timer);
	
	canvasCycle();
	
	if(!yearTimer)
		yearTimer = setInterval(function(){canvasCycle();}, yearDelay);
	else
		console.log('running');
}

function canvasCycle()
{
	if(year.display == year.min)
		year.display = year.max;
	else
		year.display--;
		
	fillcolor = "#F30";
	context.fillStyle = fillcolor;
	
	year.string = year.display + ".";
	year.string = year.string.replace("0", "O");
	
	context.clearRect(0, 0, canvas.width, canvas.height);
	context.fillText(year.string, canvas_mid.width, canvas_mid.height);
	
	canvas_container.onclick = function(){
		stopCycle();
		location.href = url + year.display;
	};
}

function stopCycle()
{
	clearInterval(yearTimer);
	yearTimer = null;
}

/* old functions

function selectYear(year) 
{
	var d = document.getElementById('clock');
	
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
	context.fillText(yearstring, canvas_mid.width, canvas_mid.height);
	
	d.onclick = function() {location.href = "http://local.org.dev/point/annual-reports/2013"};
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
	context.fillText(yearstring, canvas_mid.width, canvas_mid.height);

	timeout = setTimeout(function(){updatePointDuration();}, delay);
	
	return year;
}


function checkDigit(i) 
{
	// add zero in front of numbers < 10
	if(i < 10)
		i = "0" + i;
	
	return i;
}
*/