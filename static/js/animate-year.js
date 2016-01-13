// globals

// + year.min
// + year.max 
//	 explanatory (should be read in from the db, though).
// + year.sel
// 	 the year of the annual report being displayed, if there is a report being 
//   displayed, otherwise it is the current year.
// + year.display
//   year.sel when inactive, rotates through all the years when active.
var year = 
	{
		min: 2012,
		max: 2016,
		sel: 2016
	};
	
// the dom div that holds the year
var year_div;
// child spans of year_div; each one holds a single digit of the year
var digit_spans;

// base url for annual reports
var url; 

// timer variables
var year_delay = 1000;
var year_timer;

// settings
var color =
	{
		active: "red",
		inactive: "black"
	};


function init_year(year_id, year_sel)
{
	year_div = document.getElementById(year_id);
	digit_spans = year_div.childNodes;
	if(year_sel)
	{
		year.sel = year_sel;
	
		for(var i = 0; i < digit_spans.length; i++)
			digit_spans[i].className = digit_spans[i].className.replace( /(?:^|\s)invisible(?!\S)/g , ' visible' );
		// calling this function here makes the very dangerous assumption that
		// digit_spans is of length at least 4 (number of digits in year.sel)
		// and the first four spans correspond to the four digits of a year.
		// should probably make calling it safer somehow.
		
	}

	replace_year(digit_spans, year.sel);
}

function init_cycle(year_id, year_sel, u)
{
	// deal with function parameters
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
	
	year_div.style.color = color.active;
	
	if(!year_timer)
		year_timer = setInterval(function(){cycle();}, year_delay);
}

function stop_cycle()
{
	clearInterval(year_timer);
	year_timer = null;
	replace_year(digit_spans, year.sel);
	year_div.style.color = color.inactive;
}

function cycle()
{
	// this seems to need to go before replace_year
	if(year.display == year.min)
		year.display = year.max;
	else
		year.display--;
	
	// change display year
	replace_year(digit_spans, year.display);

	// make href to year of report
	// this could be cleaner by making an *actual* href instead of onclick
	year_div.onclick = function(){
		clearInterval(year_timer);
		location.href = url + year.display;
	};
}

function replace_year(digits, y)
{
	// replace zeros with capital 'o's
	y_str = y.toString();
	y_str = y_str.replace(/0/g, "O");
	
	var i;
	// change year
	for(i = 0; i < y_str.length; i++)
		digits[i].innerHTML = y_str[i];
	digits[i].innerHTML = '.';
}

function show_reports()
{
	var reports = document.getElementsByClassName("report-container");
	for(var i = 0; i < reports.length; i++)
		reports[i].className = reports[i].className.replace( /(?:^|\s)hidden(?!\S)/g , ' visible' );
}

function hide_reports()
{
	var reports = document.getElementsByClassName("report-container");
	for(var i = 0; i < reports.length; i++)
		reports[i].className = reports[i].className.replace( /(?:^|\s)hidden(?!\S)/g , ' invisible' );
}