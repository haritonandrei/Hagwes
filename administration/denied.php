<?php

/**
 * Denied action page.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

require("../system/core/configuration.php");
require("../system/core/functions.php");
require("../system/core/information.php");
include("../system/core/modules/authentication/check.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../index.php");
}
else
{
	// TEMPLATE
	require("../interface/templates/".$template_administration."/administration/denied.php");
}

?>
