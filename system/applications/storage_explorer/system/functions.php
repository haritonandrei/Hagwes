<?php

/**
 * Functions file.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

/**
 * Scans an URL, and decides what to do
 *
 * @param	string		$directory	The current directory URL
 */

function scan($directory) {
	
	// DIRECTORY
	if(is_dir($directory)) {
		
		show_directory($directory);
	
	// FILE
	} else {
		
		// PNG
		if(strstr($directory,".png")) {
			
			show_image($directory);
			
		// JPG
		} else if(strstr($directory,".jpg")) {
			
			show_image($directory);
			
		// MP3
		} else if(strstr($directory,".mp3")) {
			
			show_audio($directory, "mp3");
			
		// MP4
		} else if(strstr($directory,".mp4")) {
			
			show_video($directory, "mp4");
		
		// TXT, XML, HTM, HTML, C, JAVA
		} else if(
			strstr($directory,".json") ||
			strstr($directory,".java") ||
			strstr($directory,".html") ||
			strstr($directory,".htm") ||
			strstr($directory,".xml") ||
			strstr($directory,".css") ||
			strstr($directory,".log") ||
			strstr($directory,".js") ||
			strstr($directory,".c")
			) {
			
			show_txt($directory);
			show_file($directory);
			
		// OTHER
		} else {
			
			show_file($directory);
			
		}
		
	}
	
}

/**
 * Shows a sub-directories and files list, located into a directory
 *
 * @param	string		$directory	The current directory URL
 */

function show_directory($directory) {
	
	$content = scandir($directory);
		
	for($i=0; $i<sizeof($content); $i++) {
		
		$subdirectory = $content[$i];
		
		if($directory != "/") { $subdirectory = "/".$content[$i]; }
		
		if(!($content[$i]=="." || $content[$i]=="..")) {
			
			echo(
				"<p>"."<a href=\"index.php?dir=".$directory.$subdirectory."\">".$content[$i]."</a>"."</p>"
			);
			
		}
		
	}
	
}

/**
 * Shows an image
 *
 * @param	string		$directory	The current file's URL
 */

function show_image($directory) {
	
	echo(
		"<img id=\"file-content\" src=\"system/tools/viewer.php?file=".$directory."\" />"
	);
	
}

/**
 * Shows a link to download a file of an unknown type
 *
 * @param	string		$directory	The current file's URL
 */

function show_file($directory) {
	
	echo(
		"<div id=\"file-download\"><a id=\"file-content\" href=\"system/tools/transferer.php?file=".$directory."\">Download</a></div>"
	);
	
}

/**
 * Streams an audio file
 *
 * @param	string		$directory	The current file's URL
 * @param	string		$type		The extension of the file
 */

function show_audio($directory, $type) {
	
	if($type == "mp3") {
		
		echo(
			"<div id=\"file-content-multimedia\"><audio controls><source src=\"system/tools/streamer.php?file=".$directory."\" type=\"audio/mpeg\">Your browser does not support the audio element.</audio></div>"
		);
		
	}
	
}

/**
 * Streams a video file
 *
 * @param	string		$directory	The current file's URL
 * @param	string		$type		The extension of the file
 */

function show_video($directory, $type) {
	
	if($type == "mp4") {
		
		echo(
			"<div id=\"file-content-multimedia\"><video controls><source src=\"system/tools/streamer.php?file=".$directory."\" type=\"video/mp4\">Your browser does not support the video element.</video></div>"
		);
		
	}
	
}

/**
 * Shows the content of a text file
 *
 * @param	string		$directory	The current file's URL
 */

function show_txt($directory) {
	
	$content = file_get_contents($directory);
	
	echo(
		"<textarea rows=\"30\" id=\"file-content\">".$content."</textarea>"
	);
	
}

/**
 * Shows and leaves to the user the possibility to change it
 *
 * @param	string		$directory	The current URL
 */

function show_url($directory) {
	
	echo(
		"
		<form method=\"get\" action=\"system/tools/change_url.php\">
			<input class=\"url\" name=\"dir\" type=\"text\" value=\"".$directory."\" />
			<input class=\"url-btn\" type=\"submit\" value=\"Go\" />
		</form>
		"
	);
	
}

?>