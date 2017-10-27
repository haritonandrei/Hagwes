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
		$template_name		= $_POST['template_name'];
		$template_directory	= "../../../../../interface/templates/".$template_name;

		// Removing template
		remove_directory($template_directory);
		
		// Redirect
		header("location: ../../index.php");
	}
	else
	{
		header("location: ../../../../../administration/denied.php");
	}
}

?>
