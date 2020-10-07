<?php

/**
 * New article page.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

require("../../core/configuration.php");
require("../../core/classes/User.php");
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
	// system/core/modules
	if( !has_permission("create", $website_name, $permissions) )
	{
		header("location: ../../../administration/denied.php");
	}
	else
	{
		if( has_permission("select_any_author", $website_name, $permissions) )
		{
			// application/functions
			$users = get_users($server_name, $username, $password, $database_name, $tables_prefix);
		}
		else
		{
			$decrypted_username = decrypt_username($_COOKIE[$website_name."-username"], $server_name, $username, $password, $database_name, $tables_prefix);
			$user = new User();
			$user->loadUserByUsername($decrypted_username, $server_name, $username, $password, $database_name, $tables_prefix);
			$users = array($user);
		}
		
		// TEMPLATE
		require("interface/templates/".$template_applications."/new.php");
	}
}

?>
