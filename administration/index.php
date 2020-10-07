<?php

/**
 * Homepage of the administration area.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

require("../system/core/configuration.php");
require("../system/core/functions.php");
require("../system/core/modules/authentication/check.php");
require("../system/core/modules/installation/check.php");

// system/core/modules
if(!$isInstalled) {
	
	require("../system/core/modules/installation/install.php");
}

// system/core/modules
if(!$isAuthenticated)
{
	header("location: login.php");
}
else
{
	header("location: panel.php");
}

?>