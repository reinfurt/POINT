// requires screenfull.js
//
//  #gallery
//      #gallery-square
//          #gallery-next
//          #gallery-prev
//          #gallery-close
//      #gallery-img
//      #gallery-caption
//
//  .thumb (launches gallery)
//
// var imgs[], dims[] passed via php json

var index;
var fullscreen;
var fullwindow;
var forcefullwindow = true;
var debug = true;
var thumbs = document.getElementsByClassName('thumb');
var gallery = document.getElementById('gallery');
var img = document.getElementById('gallery-img');
var next = document.getElementById('gallery-next');
var prev = document.getElementById('gallery-prev');
var close = document.getElementById('gallery-close');

// init

if (screenfull.enabled && !forcefullwindow) 
    fullscreen = true;
else 
    fullwindow = true;
if (screenfull.enabled) {
    document.addEventListener(screenfull.raw.fullscreenchange, function() {
        if (screenfull.isFullscreen)
            set();
        else
            reset();
    });
}
window.onorientationchange = readdeviceorientation;
for (var i = 0; i < thumbs.length; i++) {
    ( function () {
        // ( closure ) -- retains state of local variables
        // by making capturing context, here using j
        // + listener wrapped in function to pass variable
        var thumb = thumbs[i];
        var j = i;
        thumb.addEventListener('click', function() {
            launch(j);
        });
    })();
}
next.addEventListener('click', nextimg); 
prev.addEventListener('click', previmg); 
close.addEventListener('click', exit);

// control

function launch(thisimg) {
    if (fullscreen) {
        screenfull.request(gallery);
    } else {
        gallery.className = "fullwindow";
        if (!forcefullwindow)
            readdeviceorientation();
        set();
    }
    index = thisimg;
    img.src = imgs[index];
    img.className = dims[index];
    debuglog();
}

function nextimg() {
    index++;
    if (index >= imgs.length) 
        index = 0;
    img.src = imgs[index];
    img.className = dims[index];
    debuglog();
}

function previmg() {
    index--;
    if (index < 0)
        index = imgs.length - 1;
    img.src = imgs[index];
    img.className = dims[index];
    debuglog();
}

function exit() {
    img.src = "";
    gallery.style.display = "none";
    if (fullscreen)
        screenfull.exit();
    debuglog();
}

document.onkeydown = function(e) {
    if(screenfull.isFullscreen || fullwindow) {
        e = e || window.event;
        switch(e.which || e.keyCode) {
            case 37: // left
                previmg();
                break;
            case 39: // right
                nextimg();
                break;
            case 27: // esc
                exit();
                debuglog();
                break;
            default: return; // exit this handler for other keys
        }
        e.preventDefault();
     }
}

// utility

function set() {
    gallery.style.display = "block";
}

function reset() {
    img.src = "";
    gallery.style.display = "none";
    index = -1;
    }

function readdeviceorientation() {
    var thisimgcontainer = gallery.parentElement;
    if (Math.abs(window.orientation) === 90) {
        thisimgcontainer.style.display="block";
        document.getElementById("orientation").innerHTML = "LANDSCAPE";
    } else {
        thisimgcontainer.style.display="none";
        document.getElementById("orientation").innerHTML = "PORTRAIT";
    }
}

function debuglog() {
    if (debug) {
        console.log("+");
        console.log("index = " + index + " / " + imgs.length);
        console.log("img.src = " + img.src);   
        console.log("imgs.className = " + img.className);   
        console.log("gallery.style.display = " + gallery.style.display);   
    }
}
