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
require("system/functions.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../index.php");
}
else
{
	// system/core/functions
	$themes = get_subfolders_array("../../../interface/themes");
	
	// TEMPLATE
	require("interface/templates/".$template_applications."/index.php");
}

?>
