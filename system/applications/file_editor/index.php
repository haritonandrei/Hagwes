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
require("../../core/modules/permissions/settings.php");
require("../../core/modules/permissions/check.php");
require("system/configuration.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../index.php");	
}
else
{
	// system/core/modules
	if( has_permission("modify_reserved_data", $website_name, $permissions) )
	{
		if (isset($_GET["file"]) && !empty($_GET["file"]))
		{
			$actual_file_url = $_GET["file"];
		}
		
		// FILE CONTENT
		$file_content = file_get_contents($actual_file_url);
		
		// TEMPLATE
		require("interface/templates/".$template_applications."/index.php");
	}
	else
	{
		header("location: ../../../administration/denied.php");
	}
}

?>



