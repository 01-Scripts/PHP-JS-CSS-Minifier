<body style="font-family: monospace;">
<?php
	include_once("minifier.php");
	
	/* FILES ARRAYs
	 * Provide path to files for minification */ 
	
	$jscss = array("js/application.js","js/main.js","css/application.css","css/main.css");
	
	minify($jscss);
?>
</body>
