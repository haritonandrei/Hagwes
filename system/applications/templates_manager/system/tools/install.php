<?php

/**
 * Install tool.
 *
 * @author     Hariton Andrei Marius <andreimariushariton@gmail.com>
 * @copyright  2016-2017 Hariton Andrei Marius
 * @license    http://opensource.org/licenses/mit-license.php  MIT license
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
	// system7core/modules
	if( has_permission("install", $website_name, $permissions) )
	{
		// THEME NAME
		$template = str_replace(".zip", "", basename($_FILES["file"]["name"]));
		$template = str_replace(" ", "-", $template);

		$chars_to_delete = array(
			"#", "@", "§", "^", "'", "=", "&", "!", "£", "+", "?", ",", "\\",
			"$", "€", "%", "(", ")", "[", "]", ";", "*", ";", ":", "°", "/"
		);

		for($i=0; $i<count($chars_to_delete); $i++) {
			$template = str_replace($chars_to_delete[$i], "", $template);
		}
		
		// OTHER VARIABLES
		$tmp_file			= $_FILES['file']['tmp_name'];
		$file_directory		= "../../../../../interface/templates/".$template.".zip";
		$template_directory	= "../../../../../interface/templates/".$template;

		// UPLOADING THE ZIP
		copy($tmp_file, $file_directory);
		unlink($tmp_file);

		// EXTRACTING FROM THE ZIP
		$zip = new ZipArchive;
		if ($zip->open($file_directory) === TRUE) {
			$zip->extractTo($template_directory);
			$zip->close();
		}

		// DELETING THE ZIP
		unlink($file_directory);

		// REDIRECTING TO THE INDEX
		header("location: ../../index.php");

	}
	else
	{
		header("location: ../../../../../administration/denied.php");
	}
}

?>
