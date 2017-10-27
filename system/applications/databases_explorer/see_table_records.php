<?php

/**
 * Tables records.
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
		$records = get_database_table_records_array($_GET['table'], $server_name, $username, $password, $_GET['database'], $tables_prefix);
	
		// TEMPLATE
		require("interface/templates/".$template_applications."/see_table_records.php");
	}
	else
	{
		header("location: ../../../administration/denied.php");
	}
}

?>



