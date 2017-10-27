<?php

/**
 * New user page.
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

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../index.php");
}
else
{
	// system/core/modules
	if( has_permission("create_reserved_data", $website_name, $permissions) )
	{
		// TEMPLATE
		require("interface/templates/".$template_applications."/new.php");
	}
	else
	{
		header("location: ../../../administration/denied.php");
	}
}

?>
