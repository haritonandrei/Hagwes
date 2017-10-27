<?php

/**
 * Tool to delete files or folders.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

require("../../../../core/configuration.php");
require("../../../../core/functions.php");
require("../../../../core/modules/authentication/check.php");
require("../../../../core/modules/permissions/settings.php");
require("../../../../core/modules/permissions/check.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../../../index.php");
}
else
{
	// system/core/modules
	if( has_permission("delete", $website_name, $permissions) )
	{
		include("../configuration.php");
		include("../functions.php");
		if(isset($_GET["path"]))
		{
			$root = "../../".$_GET["path"];
		}

		if (file_exists($root))
		{
			// DELETING FILE OR FOLDER
			if(is_dir($root))	{ remove_directory($root); }
			else				{ unlink($root); }
			
			header("location: ../../index.php");
		}
	
	}
	else
	{
		header("location: ../../../../../administration/denied.php");
	}
}

?>