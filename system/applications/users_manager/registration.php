<?php

/**
 * New user page.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

require("../../core/configuration.php");

if($allow_guests_registration)
{
	// TEMPLATE
	require("interface/templates/".$template_applications."/registration.php");
}
else
{
	header("location: ../../../index.php");
}

?>
