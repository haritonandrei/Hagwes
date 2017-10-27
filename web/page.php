<?php

/**
 * Page viewer for the web area.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

require("../system/core/configuration.php");
require("../system/core/functions.php");
require("../system/core/classes/Page.php");
require("../system/core/classes/Article.php");

// PAGE DATA - pages menu or only administration
if($pages_menu_enabled)
{
	$pages = get_pages($server_name, $username, $password, $database_name, $tables_prefix);
}

if(isset($_GET['id']) && is_numeric($_GET['id']))
{
	// PAGE DATA
	$page = new Page();
	$page -> loadPage($_GET['id'], $server_name, $username, $password, $database_name, $tables_prefix);

	// TEMPLATE
	require("../interface/templates/".$template_web."/web/page.php");
}
else
{
	header("location: index.php");
}

?>
