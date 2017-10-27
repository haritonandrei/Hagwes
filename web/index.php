<?php

/**
 * Homepage of the web area.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

require("../system/core/configuration.php");
require("../system/core/functions.php");
require("../system/core/modules/installation/check.php");
require("../system/core/classes/Page.php");
require("../system/core/classes/Article.php");

// INSTALLATION
if(!$isInstalled)
{
	// REDIRECT
	header("location: install.php");
}

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

// PAGE DATA - page or articles
if($index_page_enabled)
{
	$page = new Page();
	$page -> loadPage("1", $server_name, $username, $password, $database_name, $tables_prefix);
}
else
{
	$articles = get_articles_limited_list(
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
require("../interface/templates/".$template_web."/web/index.php");

?>
