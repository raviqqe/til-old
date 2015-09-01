<!DOCTYPE html>
<html>
<head>
	<title>It's All Yours</title>
	<link type="text/css" href="style.css" rel="stylesheet"/>
	<!--<meta content="width=device-width" name="viewport"/>-->
</head>
<body>
<div class="wrapper">
<canvas width="640" height="640" id="mainCanvas">Your browser doesn't support canvas tag.</canvas>
</div>

<script>

var c = document.getElementById("mainCanvas");
var ctx = c.getContext("2d");
ctx.fillStyle = "#ff0000";
ctx.fillRect(10, 10, 10, 10);

</script>

</body>
</html>
