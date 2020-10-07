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

	// PNG
	if(strstr($root,"png")) {
		
		$im = imagecreatefrompng($root);

		header('Content-Type: image/png');

		imagepng($im);
		imagedestroy($im);
		
	// JPG
	} else if(strstr($root,"jpg")) {
		
		$im = imagecreatefromjpeg($root);

		header('Content-Type: image/jpeg');

		imagejpeg($im);
		imagedestroy($im);
		
	}
	
}

?>