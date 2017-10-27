<?php

/**
 * Tool to upload files.
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
	// SETTINGS IN "php.ini"
	ini_set('post_max_size', '128M');
	ini_set('upload_max_filesize', '128M');
	ini_set('memory_limit', '256M');
	ini_set('max_execution_time', '300');

	// system/core/modules
	if( has_permission("upload", $website_name, $permissions) )
	{
		// FILENAME
		$filename = str_replace(" ", "_", basename($_FILES["file"]["name"]));
		
		$chars_to_delete = array(
			"#", "@", "§", "^", "'", "=", "&", "!", "£", "+", "?", ",", "\\",
			"$", "€", "%", "(", ")", "[", "]", ";", "*", ";", ":", "°", "/"
		);
		
		for($i=0; $i<count($chars_to_delete); $i++)
		{
			$filename = str_replace($chars_to_delete[$i], "", $filename);
		}
		
		// UPLOAD
		$target_dir = "../../../../../uploads/".$_POST["directory"];	// DIRECTORY
		$target_file = $target_dir . $filename;							// FILE

		$upload_ok = 1;
		$file_type = pathinfo($target_file,PATHINFO_EXTENSION);

		// Check if file already exists
		if (file_exists($target_file))
		{
			$upload_ok = 0;
		}

		// Check if $upload_ok is set to 0 by an error
		if ($upload_ok == 0)
		{
			header("location: ../../uploader.php?done=no");
		}
		else
		{
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
			{
				header("location: ../../uploader.php?done=yes");
			}
			else
			{
				header("location: ../../uploader.php?done=no");
			}
		}
	}
	else
	{
		header("location: ../../../../../administration/denied.php");
	}
}

?>