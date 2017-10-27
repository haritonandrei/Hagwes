<?php

/**
 * Disinstall tool.
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
	if( has_permission("disinstall", $website_name, $permissions) )
	{
		$theme_name			= $_POST['theme_name'];
		$theme_directory	= "../../../../../interface/themes/".$theme_name;

		// Removing theme
		remove_directory($theme_directory);
		
		// Redirect
		header("location: ../../index.php");
	}
	else
	{
		header("location: ../../../../../administration/denied.php");
	}
}

?>