<?php

/**
 * Search of the web area.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

require("../system/core/configuration.php");
require("../system/core/functions.php");
require("../system/core/classes/Page.php");
require("../system/core/classes/Article.php");

// PAGE DATA - variables
$list_start_from = 0;

if(isset($_GET['list_start_from']))
{
	$list_start_from = $_GET['list_start_from'];
}

$next_page_starts_from = $list_start_from + $list_max_size;

// PAGE DATA - pages menu or only administration
if($pages_menu_enabled)
{
	$pages = get_pages($server_name, $username, $password, $database_name, $tables_prefix);
}

if(isset($_GET['query']))
{
	// PAGE DATA
	$search_articles = get_search_articles_limited_list(
		filter_string($_GET['query']),
		$list_start_from,
		$list_max_size,
		$server_name,
		$username,
		$password,
		$database_name,
		$tables_prefix
	);
}

// TEMPLATE
require("../interface/templates/".$template_web."/web/search.php");

?>
