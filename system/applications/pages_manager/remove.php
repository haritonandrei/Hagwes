<?php

/**
 * Page remover.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

require("../../core/configuration.php");
require("../../core/functions.php");
require("../../core/modules/authentication/check.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../index.php");
}
else
{
	// TEMPLATE
	require("interface/templates/".$template_applications."/remove.php");
}

?>
