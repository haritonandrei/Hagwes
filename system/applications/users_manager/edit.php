<?php

/**
 * Edit user page.
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
	// PAGE DATA
	$user = new User();
	
	if(isset($_GET['id']))
	{
		$user -> loadUserByID($_GET['id'], $server_name, $username, $password, $database_name, $tables_prefix);
	}
	else if(isset($_GET['username']))
	{
		$user -> loadUserByUsername($_GET['username'], $server_name, $username, $password, $database_name, $tables_prefix);
	}
	
	// system/core/modules
	if( has_permission("modify_reserved_data", $website_name, $permissions) )
	{
		// TEMPLATE
		require("interface/templates/".$template_applications."/edit.php");
	}
	else
	{
		// CHECKING THE USERNAME
		if( $_COOKIE[ $website_name."-username" ] == encrypt_string($user->getUsername()) )
		{
			// TEMPLATE
			require("interface/templates/".$template_applications."/edit.php");
		}
		else
		{
			header("location: ../../../administration/denied.php");
		}
	}
}

?>
