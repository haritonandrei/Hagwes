<?php

/**
 * Tool to save modified files.
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

// system/core/modules
if(!$isAuthenticated)
{
	header("location: ../../../../../index.php");
}
else
{
	// system/core/modules
	if( has_permission("modify_reserved_data", $website_name, $permissions) )
	{
		// SAVING
		$file_url = $_POST['file-url'];
		
		// FILE
		$file = fopen( "../../".$file_url , "w" ) or die( "Unable to open file!" );
		$file_content = $_POST['file-content'];
		fwrite($file, $file_content);
		fclose($file);
		
		// REDIRECT
		header("location: ../../index.php?file=".$file_url);
	}
	else
	{
		header("location: ../../../../../administration/denied.php");
	}
}

?>