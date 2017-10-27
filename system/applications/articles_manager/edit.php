<?php

/**
 * Edit article page.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
**/

require("../../core/configuration.php");
require("../../core/functions.php");
require("../../core/modules/authentication/check.php");
require("../../core/modules/permissions/settings.php");
require("../../core/modules/permissions/check.php");
require("../../core/classes/Article.php");

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../index.php");
}
else
{
	if(isset($_GET['id']))
	{
		// system/core/classes
		$article = new Article();
		$article -> loadArticle($_GET['id'], $server_name, $username, $password, $database_name, $tables_prefix);
		
		// system/core/modules
		if( has_permission("modify", $website_name, $permissions) )
		{
			// TEMPLATE
			require("interface/templates/".$template_applications."/edit.php");
		}
		else
		{
			header("location: ../../../administration/denied.php");
		}
	}
	else
	{
		header("location: index.php");
	}
}

?>
