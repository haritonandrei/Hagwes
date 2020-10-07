<?php

/**
 * Database tables.
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
		$tables = get_database_tables_array($_GET['database'], $server_name, $username, $password, $database_name, $tables_prefix);
	
		// TEMPLATE
		require("interface/templates/".$template_applications."/see_database_tables.php");
	}
	else
	{
		header("location: ../../../administration/denied.php");
	}
}

?>



