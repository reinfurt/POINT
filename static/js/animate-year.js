// globals
var year = 
	{
		min: 2012,
		max: 2016,
		sel: 2016
	};
var year_div;
var digit_spans;

var year_delay = 1000;
var year_timer;
var url;

function init_year(year_id, year_sel)
{
	year_div = document.getElementById(year_id);
	if(year_sel)
		year.sel = year_sel;
	else
	{
		var dt = new Date();
		year.sel = dt.getFullYear();
	}
	
	digit_spans = year_div.childNodes;
	replace_year(digit_spans, year.sel);
}

function init_cycle(year_id, year_sel, u)
{
	// deal with variables
	year_div = document.getElementById(year_id); 
	if(year_sel)
		year.sel = year_sel;
	else
	{
		var dt = new Date();
		year.sel = dt.getFullYear();
	}
	url = u + "annual-reports/";
	
	// set other variables
	year.display = year.sel;
	
	digit_spans = year_div.childNodes;
	
	year_div.style.color = "red";
	
	if(!year_timer)
		year_timer = setInterval(function(){cycle();}, year_delay);
	else
		console.log('running');

}

function stop_cycle()
{
	clearInterval(year_timer);
	year_timer = null;
	replace_year(digit_spans, year.sel);
	year_div.style.color = "black";
}

function cycle()
{
	if(year.display == year.min)
		year.display = year.max;
	else
		year.display--;
	
	replace_year(digit_spans, year.display);
	
	year_div.onclick = function(){
		stopCycle();
		location.href = url + year.display;
	};
}

function replace_year(digits, y)
{
	y_str = y.toString();
	y_str = y_str.replace(/0/g, "O");
	for(i = 0; i < y_str.length; i++)
	{
		digits[i].innerHTML = y_str[i];
	}
}