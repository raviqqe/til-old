<!DOCTYPE html>
<html>
<head>
	<title>It's All Yours</title>
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<!--<meta content="width=device-width" name="viewport"/>-->
</head>
<body>
<canvas width="640" height="640" id="mainCanvas">Your browser doesn't support canvas tag.</canvas>

<script>

// constants
var CVSWIDTH = 320;
var CVSHEIGHT = 320;
var cvs = document.getElementById("mainCanvas");
var ctx = cvs.getContext("2d");
var mouse = {
	x : 0,
	y : 0
};
var clickedPiece = null;
var pieces = [];

//
// object definition
//

// pieces of the earth
var sky = {
	skyColor : "#0000ff",
	globeColor : "#00ff00",

	display : function () {
		var sky = cvs.getContext("2d");
		sky.fillStyle = this.skyColor;
		sky.fillRect(0, 0, CVSWIDTH, CVSHEIGHT);

		var globe = cvs.getContext("2d");
		globe.fillStyle = this.globeColor;
		globe.beginPath();
		globe.arc(cvs.width/2, cvs.height*2, cvs.height*7/4, 0, 2*Math.PI);
		globe.fill();
	}
};

function Piece (name) {
	this.name = name;
	this.x = 0;
	this.y = 0;
	this.z = 0;
	this.w = 16;
	this.h = 16;

	this.locate = function (x, y) {
		this.x = x;
		this.y = y;
		draw();
	};

	this.checkClicked = function () {
		// mouse on me?
		console.log(Math.abs(mouse.x - this.x));
		console.log(this.w / 2);
		console.log(Math.abs(mouse.y - this.y));
		console.log(this.h / 2);

		if (Math.abs(mouse.x - this.x) <= this.w / 2 && Math.abs(mouse.y - this.y) <= this.h / 2) {
			clickedPiece = this;
		}
	};

	this.display = function () {
		var ctx = cvs.getContext("2d");
		ctx.fillStyle = "#ff0000";
		ctx.fillRect(this.x - this.w / 2, this.y - this.h / 2, this.w, this.h);
	};

	this.getName = function () {
		return this.name;
	};
}

function Dynamic (name) {
	Piece.call(this, name);

	this.move = function () {
		console.log("moved to " + this.x + ', ' + this.y);
	};
}
Dynamic.prototype = new Piece ("DYNAMIC");

//
// initial instances
//

function addPiece (name, classname) {
	//eval("pieces.push(" + name + ")");
}

addPiece("hero", "Dynamic");
//eval("var " + "hero" + " = new " + "Dynamic" + " (" + "hero" + ")");

//
// main
//

cvs.addEventListener("mousedown", getPosition, false);

// set screen
cvs.setAttribute('width', CVSWIDTH);
cvs.setAttribute('height', CVSHEIGHT);
cvs.style.width = CVSWIDTH.toString().concat("px");
cvs.style.height = CVSHEIGHT.toString().concat("px");

// display pieces
function draw () {
	// what is clicked?
	clickedPiece = null;
	for (i in pieces) {
		//i.checkClicked();
	}	

	ctx.clearRect(0, 0, cvs.width, cvs.height);
	sky.display();
	hero.display();
};

function getPosition(event) {
	if (event.x != undefined && event.y != undefined) {
		mouse.x = event.x;
		mouse.y = event.y;
	} else {
		mouse.x = event.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
		mouse.y = event.clientY + document.body.scrollTop + document.documentElement.scrollTop;
	}

	mouse.x -= cvs.offsetLeft;
	mouse.y -= cvs.offsetTop;
	
	draw();

	console.log("mouse: " + mouse.x + ', ' + mouse.y);
	console.log(focus);
	console.log(pieces);
}

draw();
hero.locate(160,160);

// DEBUG
//function foo () { alert("alert"); }
//var bar = function () {};
//bar.func = foo;
//bar.func();
//console.log(bar);
//console.log(Piece);
//console.log(Dynamic.prototype);
//console.log(hero.getName());
//console.log(hero.move());
//alert("script done.");

</script>

</body>
</html>
