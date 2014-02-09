<?php
function header(){
	?>

	<body>
		<div id="col1">
			<a href="index.html" class="box">previous</a><br>
		</div>
		
<?php
}
function body(){
?>
	<div id="col2">
		<video width="600" height="400" controls autoplay>
	  		<source src="videoClip.mp4" type="video/mp4">
				Your browser does not support the video tag.
			</video>
	</div>
	<div id="col3">
		<a href="page3.html" class="box">next</a>
	</div>
	</body>
	</html>
<?php
}
?>

