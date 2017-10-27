<?php

/**
 * Tool.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
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

	if (file_exists($root)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($root).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($root));
		readfile($root);
		exit;
	}
	
}

?>