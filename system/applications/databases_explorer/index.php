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
require("system/functions.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../index.php");	
}
else
{
	// system/core/modules
	if( has_permission("see_reserved_data", $website_name, $permissions) )
	{
		// application/functions
		$databases = get_databases_array($server_name, $username, $password, $database_name, $tables_prefix);
	
		// TEMPLATE
		require("interface/templates/".$template_applications."/index.php");
	}
	else
	{
		header("location: ../../../administration/denied.php");
	}
}

?>



