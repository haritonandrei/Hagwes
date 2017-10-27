<?php

/**
 * Index.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

require("../../core/configuration.php");
require("../../core/functions.php");
require("../../core/modules/authentication/check.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../index.php");
}
else
{
	$message = "";
	
	if ($_GET['done']=="yes")
	{
		$message .= "Your file is uploaded.";
	}
	else
	{
		$message .= "There was an error uploading your file.";
	}
	
	// TEMPLATE
	require("interface/templates/".$template_applications."/uploader.php");
}

?>
