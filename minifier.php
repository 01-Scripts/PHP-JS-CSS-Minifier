<?php
	/*
	 * JS and CSS Minifier 
	 * version: 1.0 (2013-08-26)
	 *
	 * This document is licensed as free software under the terms of the
	 * MIT License: http://www.opensource.org/licenses/mit-license.php
	 *
	 * Toni Almeida wrote this plugin, which proclaims:
	 * "NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK."
	 * 
	 * This plugin uses online webservices from javascript-minifier.com and cssminifier.com
	 * This services are property of Andy Chilton, http://chilts.org/
	 *
	 * Copyrighted 2013 by Toni Almeida, promatik.
	 *
	 * Edited 2015 by Michael Lorer, 01-Scripts.de
	 */
	
	/**
	 * Determines type and sends content to the minimize service
	 * @param $arr 			Array to js and css files to minimize
	 * @param $addpath 		Provide optional root path for the files in $arr
	 * @param $headcomment	Add an optional comment that is placed in front of the minimized files
	 */
	function minify($arr, $addpath="", $headcomment="") {
		foreach ($arr as $file) {
			$file = $addpath.$file;
			switch(FileExtension($file)){
				case "css":
				  $url = "https://cssminifier.com/raw";
				  break;
				case "js":
				  $url = "https://javascript-minifier.com/raw";
				  break;
				default:
				  $url = "";
			}

			if(empty($url)) continue;

			$handler = fopen($file, 'r+');
			if(!$handler) continue;

			$content = file_get_contents($file);
			ftruncate($handler, 0);
			$written = fwrite($handler, $headcomment.getMinified($url, $content));
			fclose($handler);

			if($written == 0 && !$content) return FALSE;

			//echo "File <a href='" . $file . "'>" . $file . "</a> done!<br />";
		}
	}
	
	function getMinified($url, $content) {
		$postdata = array('http' => array(
	        'method'  => 'POST',
	        'header'  => 'Content-type: application/x-www-form-urlencoded',
	        'content' => http_build_query( array('input' => $content) ) ) );
		return file_get_contents($url, false, stream_context_create($postdata));
	}

	function FileExtension($filestring){
		if(empty($filestring)) return "";

		$pathinfo = pathinfo($filestring);
		return strtolower($pathinfo['extension']);
	}
	
?>
