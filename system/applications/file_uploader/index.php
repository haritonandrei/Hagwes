<?php

/**
 * Index.
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

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../index.php");
}
else
{
	if( has_permission("upload", $website_name, $permissions) )
	{
		// TEMPLATE
		require("interface/templates/".$template_applications."/index.php");
	}
	else
	{
		header("location: ../../../administration/denied.php");
	}
}

?>
