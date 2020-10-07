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
require("../../core/classes/Article.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../index.php");
}
else
{
	// PAGE DATA - variables
	$list_start_from = 0;

	if(isset($_GET['list_start_from']))
	{
		$list_start_from = $_GET['list_start_from'];
	}
	
	$next_page_starts_from = $list_start_from + $list_max_size;

	// system/functions
	$articles = get_articles_limited_list(
		$list_start_from,
		$list_max_size,
		$server_name,
		$username,
		$password,
		$database_name,
		$tables_prefix
	);
	
	// TEMPLATE
	require("interface/templates/".$template_applications."/index.php");
}

?>
