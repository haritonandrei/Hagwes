<?php

/**
 * Tool to make folders.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2020 Hariton Andrei Marius
 * @license    Proprietary/closed
**/

require("../../../../core/configuration.php");
require("../../../../core/functions.php");
require("../../../../core/modules/authentication/check.php");
require("../../../../core/modules/permissions/settings.php");
require("../../../../core/modules/permissions/check.php");
require("../configuration.php");

// system7core/modules
if(!$isAuthenticated)
{
	header("location: ../../../../../index.php");
}
else
{
	// system/core/modules
	if( has_permission("create", $website_name, $permissions) )
	{
		if (isset($_POST["folder_name"]))
		{
			$root = $_GET["path"];
			$path = "../../".$_GET["path"];
			$new_folder = $_POST["folder_name"];
			
			// MAKING FOLDER
			mkdir($path."/".$new_folder);
			header("location: ../../index.php?dir=".$root);
		}
	
	}
	else
	{
		header("location: ../../../../../administration/denied.php");
	}
}

?>