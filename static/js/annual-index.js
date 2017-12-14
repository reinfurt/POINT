// event listener (index)

var annualindexselect = document.getElementById('annual-index-select');
var annualindex = document.getElementById('annual-index');
var report = document.getElementById('report');

// alert(annualindexselect.innerHTML);
// alert(annualindex);

annualindexselect.addEventListener("click", function(e) {

    if (annualindex && annualindex.style.display != "block") {
        annualindex.style.display = "block";
        //annualindexselect.innerHTML = "Report";
        annualindexselect.style.backgroundColor = "#F00";
        annualindexselect.style.color = "#FFF";
        report.style.display = "none";
    } else {
        annualindex.style.display = "none";
        annualindexselect.style.backgroundColor = "#FFF";
        annualindexselect.style.color = "#F00";
        report.style.display = "block";
    }
}, false);


