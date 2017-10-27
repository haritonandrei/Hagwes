<?php

/**
 * Tool to remove a user.
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
require("../functions.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../../../index.php");
}
else
{
	// system/core/modules
	if(
		((has_permission("delete", $website_name, $permissions)
		&& $_COOKIE[$website_name."-username"] != encrypt_string($_POST['username']))
		
		||
		
		(!has_permission("delete", $website_name, $permissions)
		&& $_COOKIE[$website_name."-username"] == encrypt_string($_POST['username'])))
		
		&&
		
		check_id_matches_username(
			$_POST['id'],
			$_POST['username'],
			$server_name,
			$username,
			$password,
			$database_name,
			$tables_prefix
		)
	)
	{
		$is_removed	= remove_user($_POST['id'], $server_name, $username, $password, $database_name, $tables_prefix);
		
		if( !$is_removed )
		{
			header("location: ../../remove.php?id=".$_POST['id']."&username=".$_POST['username']);
		}
		else
		{
			header("location: ../../index.php");
		}
	}
	else
	{
		header("location: ../../../../../administration/denied.php");
	}
}

?>
