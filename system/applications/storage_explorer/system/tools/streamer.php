<?php

/**
 * Tool.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

require("../../../../core/configuration.php");
require("../../../../core/functions.php");
require("../../../../core/modules/authentication/check.php");

// system/core/modules
if(!$isAuthenticated) {
	
	header("location: ../../../../../index.php");
	
} else {
	
	require("../config.php");
	if(isset($_GET["file"])) { $root = $_GET["file"]; }

	$bitrate = 128;

	// MP3
	if(strstr($root,"mp3")) {
		
		set_time_limit(0);
		$filePath = $root;
		$strContext=stream_context_create(
			array(
				'http' => array(
					'method'	=>'GET',
					'header'	=>"Accept-language: en\r\n"
				)
			)
		);


		header('Content-type: audio/mpeg');
		header("Content-Transfer-Encoding: binary");
		header("Pragma: no-cache");
		header("icy-br: ".$bitrate);

		$fpOrigin=fopen($filePath, 'rb', false, $strContext);
		while(!feof($fpOrigin)){
			$buffer=fread($fpOrigin, 4096);
			echo $buffer;
			flush();
		}
		fclose($fpOrigin);
		
	// MP4
	} else if(strstr($root,"mp4")) {
		
		set_time_limit(0);
		$filePath = $root;
		$strContext=stream_context_create(
			array(
				'http' => array(
					'method'	=>'GET',
					'header'	=>"Accept-language: en\r\n"
				)
			)
		);


		header('Content-type: video/mp4');
		header("Content-Transfer-Encoding: binary");
		header("Pragma: no-cache");
		header("icy-br: ".$bitrate);

		$fpOrigin=fopen($filePath, 'rb', false, $strContext);
		while(!feof($fpOrigin)){
			$buffer=fread($fpOrigin, 8192);
			echo $buffer;
			flush();
		}
		fclose($fpOrigin);
		
	}

}
	
?>