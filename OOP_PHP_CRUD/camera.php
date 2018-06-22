<!DOCTYPE html>
<html>
<head>
	<title>camera</title>
</head>
<body>

<video id="video"></video>
<canvas id="canvas"></canvas>
<button onclick="snap();">Snap</button>
<script type="text/javascript">
	var video = document.getElementById('video');
	var canvas = document.getElementById('canvas');
	var context = canvas.getContext('2d');

	navigator.getUserMedia = navigator.getUserMedia;

	if(navigator.getUserMedia)
	{
		navigator.getUserMedia({video:true},streamwebCam,throwError);
	}

	function streamwebCam(stream)
	{
		video.src = window.URL.createObjectURL(stream);
	}
	function throwError(e)
	{
		alert(e.name);
	}
	function snap()
	{
		canvas.width = video.clientWidth;
		canvas.height = video.clientHeight;
		canvas.drawImage(video,0,0);
	}
</script>
</body>
</html>