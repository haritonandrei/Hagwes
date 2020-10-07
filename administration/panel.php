<?php

/**
 * Administration panel.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

require("../system/core/configuration.php");
require("../system/core/functions.php");
require("../system/core/information.php");
require("../system/core/modules/authentication/check.php");
require("../system/core/modules/visibility/check.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../index.php");	
}
else
{
	// system/core/functions
	$applications = get_subfolders_array("../system/applications");
	
	// TEMPLATE
	require("../interface/templates/".$template_administration."/administration/panel.php");
}

?>
