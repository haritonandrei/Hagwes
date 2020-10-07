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
require("../../core/classes/Page.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../index.php");	
}
else
{
	// application/functions
	$pages = get_pages($server_name, $username, $password, $database_name, $tables_prefix);
	
	// TEMPLATE
	require("interface/templates/".$template_applications."/index.php");	
}

?>
