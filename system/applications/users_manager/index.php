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
require("../../core/classes/User.php");

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
		// PAGE DATA
		$users = get_users($server_name, $username, $password, $database_name, $tables_prefix);
		
		// TEMPLATE
		require("interface/templates/".$template_applications."/index.php");
	}
	else
	{
		header("location: edit.php?username=".decrypt_username($_COOKIE[ $website_name."-username" ], $server_name, $username, $password, $database_name, $tables_prefix));
	}
}

?>
