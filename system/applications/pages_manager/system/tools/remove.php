<?php

/**
 * Tool to remove a page.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
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
	if( has_permission("delete", $website_name, $permissions) )
	{
		$id			= $_POST['id'];
		$is_removed	= remove_page($id, $server_name, $username, $password, $database_name, $tables_prefix);
		
		if( !$is_removed )
		{
			header("location: ../../../../../administration/denied.php");
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