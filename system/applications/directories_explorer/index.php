<?php

/**
 * Index.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

require("../../core/configuration.php");
require("../../core/functions.php");
require("../../core/modules/authentication/check.php");
require("../../core/modules/permissions/settings.php");
require("../../core/modules/permissions/check.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../index.php");
}
else
{
	if( has_permission("explore_directories", $website_name, $permissions) )
	{
		require("system/configuration.php");
		require("system/functions.php");

		if(isset($_GET["dir"])&&!empty($_GET["dir"]))
		{
			$root = $_GET["dir"];
		}
		
		// VARIABLES NEEDED INTO TEMPLATE
		$content = get_content($root);
		
		// TEMPLATE
		require("interface/templates/".$template_applications."/index.php");
	}
	else
	{
		header("location: ../../../administration/denied.php");
	}
}

?>



